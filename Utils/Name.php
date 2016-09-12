<?php

namespace ZendeskBundle\Utils;


class Name
{
	/**
	 * Name parts
	 *
	 * @var array
	 */
	private $parts;
	
	/**
	 * Plural enabled
	 *
	 * @var bool 
	 */
	private $plural = false;
	
	/**
	 * Constructor
	 * 
	 * @param string $name
	 */
	public function __construct($name)
	{
		$this->parts = $this->disassemble($name);
	}
	
	/**
	 * Disassemble name
	 * 
	 * @param  string $name
	 * @return array
	 */
	protected function disassemble($name)
	{
		$name  = preg_replace(['~\s+~', '~([a-z])([A-Z])~'], ['_', '$1_$2'], $name);
		$parts = array_map('trim', explode('_', $name));
		
		return array_map('strtolower', $parts);
	}
	
	/**
	 * Append value
	 * 
	 * @param  string $value
	 * @return Name
	 */
	public function append($value)
	{
		if ($value instanceof Name) {
			return $this->merge($value);
		}
		
		$this->parts = array_merge($this->parts, $this->disassemble($value));
		
		return $this;
	}
	
	/**
	 * Prepend value
	 * 
	 * @param  string $value
	 * @return Name
	 */
	public function prepend($value)
	{	
		if ($value instanceof Name) {
			$this->parts = array_merge($value->getRawParts(), $this->parts);
			
			return $this;
		}
		
		$this->parts = array_merge($this->disassemble($value), $this->parts);
		
		return $this;
	}
	
	/**
	 * Remove top element
	 * 
	 * @return Name
	 */
	public function pop()
	{
		array_pop($this->parts);
		
		return $this;
	}
	
	/**
	 * Pop elements from the top while value equals to element
	 * 
	 * @param  string $value
	 * @return Name
	 */
	public function popWhileEq($value)
	{
		while ($this->parts[count($this->parts) - 1] === $value) {
			array_pop($this->parts);
		}
		
		return $this;
	}
	
	/**
	 * Remove first element
	 * 
	 * @return Name
	 */
	public function shift()
	{
		array_shift($this->parts);
		
		return $this;
	}
	
	/**
	 * Remove elements from the begining while value equals to element
	 * 
	 * @param  string $value
	 * @return Name
	 */
	public function shiftWhileEq($value)
	{
		while ($this->parts[0] === $value) {
			array_shift($this->parts);
		}
		
		return $this;
	}
	
	/**
	 * Merge name
	 * 
	 * @param  Name $name
	 * @return Name
	 */
	public function merge(Name $name) {
		$this->parts = array_merge($this->parts, $name->getRawParts());
		
		return $this;
	}
	
	/**
	 * Substract part(s)
	 * 
	 * @param  string | array $parts
	 * @return Name
	 */
	public function substract($parts)
	{
		if ($parts instanceof Name) {
			$parts = $parts->getRawParts();
		}
		
		$this->parts = array_diff($this->parts, (array) $parts);
		
		return $this;
	}
	
	/**
	 * Assemble camelcase
	 * 
	 * @return string
	 */
	public function assembleCamelcase()
	{
		$name = implode('', array_map('ucfirst', $this->parts));
		
		if ($this->plural) {
			$name = $this->processPlural($name);
		}
		
		return lcfirst($name);
	}
	
	/**
	 * Assemble underscore
	 * 
	 * @return string
	 */
	public function assembleUnderscore()
	{
		$name = implode('_', $this->parts);
		
		if ($this->plural) {
			$name = $this->processPlural($name);
		}
		
		return $name;
	}
	
	/**
	 * Assemble humanized name
	 */
	public function assembleHumanized()
	{
		$name = implode(' ', $this->parts);
		
		if ($this->plural) {
			$name = $this->processPlural($name);
		}
		
		return ucfirst($name);
	}
	
	/**
	 * Get raw name's parts
	 * 
	 * @return array
	 */
	public function getRawParts()
	{
		return $this->parts;
	}
	
	/**
	 * Enable plural
	 * 
	 * @return Name
	 */
	public function applyPlural()
	{
		$this->plural = true;
		
		return $this;
	}
	
	/**
	 * Process plural
	 * 
	 * @param  string $word
	 * @return string
	 */
	public function processPlural($word)
	{
		if (substr($word, -1) === 's') {
			if (substr($word, -2, 2) === 'ss' )
					return $word . 'es';
			else
					return $word;	
		}
		
		if (substr($word, -1) === 'y') {
			return substr($word, 0, strlen($word) - 1) . 'ies';
		}
			
		return $word . 's';
	}
	
	/**
	 * Represent as a string
	 * 
	 * @return string
	 */
	public function __toString()
	{
		return $this->assembleCamelcase();
	}
}
