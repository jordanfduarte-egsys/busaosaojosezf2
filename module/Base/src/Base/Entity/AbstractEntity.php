<?php

namespace Base\Entity;

use Zend\Stdlib\Hydrator\ClassMethods;

abstract class AbstractEntity{

	public function __construct(Array $options = array()){
		$hydrator = new ClassMethods();
		$this->hydrate($options, $this);
	}

	public function toArray(){
		$hydrator = new ClassMethods();
		return $hydrator->extract($this);
	}

}