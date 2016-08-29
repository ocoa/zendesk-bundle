<?php

namespace ZendeskBundle\Utils;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;

trait EntityHandling
{	
	/**
	 * Convert the entity
	 * 
	 * @see http://jmsyst.com/libs/serializer
	 * 
	 * @param  mixed  $entity
	 * @return string
	 */
	protected function convertEntity($entity)
	{			
		$encoder = array(new JsonEncoder());
		$normalizer = new ObjectNormalizer(null, new CamelCaseToSnakeCaseNameConverter());

		$normalizer->setCircularReferenceHandler(function ($object) {
            return method_exists($object, 'getId')? $object->getId() : '';
        });

		$serializer = new Serializer(array($normalizer), $encoder);
		$jsonContent = $serializer->serialize($entity, 'json');

		return json_decode($jsonContent);	
	
	}
	
}