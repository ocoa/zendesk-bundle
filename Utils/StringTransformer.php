<?php

namespace ZendeskBundle\Utils;

/**
 * String transformation utilities
 * 
 */
class StringTransformer
{
	/**
	 * Transform to camel case
	 * 
	 * @param  string $string
	 * @return string
	 */
	static public function toCamelCase($string)
	{
		return lcfirst(static::toMixedCase($string));
	}
	
	/**
	 * Transform to mixed case
	 * 
	 * @param  string $string
	 * @return string
	 */
	static public function toMixedCase($string)
	{
		$string = str_replace('_', ' ', $string);
		$string = ucwords($string);
		
		return str_replace(' ', '', $string);
	}
	
	/**
	 * Transform to underscore
	 * 
	 * @param  string $string
	 * @return string
	 */
	static public function toUnderscore($string)
	{
		return strtolower(static::toTitlescore($string));
	}
	
	/**
	 * Transform to capitalized underscore
	 * 
	 * @param  string $string
	 * @return string
	 */
	static public function toTitlescore($string)
	{
		return preg_replace(
			['~[\s\-]+~', '~([a-z])([A-Z0-9])~'],
			['_', '$1_$2'],
			ucwords($string)
		);
	}
	
	/**
	 * Make a technical string human readable
	 * 
	 * @param  string $string
	 * @return string
	 */
	static public function humanize($string)
	{
		$string = preg_replace(
			['~[\s_]+~', '~([a-z])([A-Z])~'],
			[' ', '$1 $2'],
			$string
		);
		
		return ucfirst(strtolower($string));
	}

	/**
	* Return a string with all lower case characaters 
	* and numbers 
	*/
	static public function normalize($string){
		return preg_replace('/[^A-Za-z0-9]/', '',strtolower($string));
	}

	static public function removeNumbers($string){
		return preg_replace('/[0-9]/', '', $string);
	}

}

