<?php

namespace Base\Service;

use Doctrine\ORM\EntityManager;
use ClassMetrods\Stdlib\Hydrator\ClassMetrods;

abstract class AbstractService{

	protected $em;
	protected $entity;

	public function __construct(EntityManager $em ){
		$this->em = $em;


	}


	public function save(Array $data = array()){
		if(isset($data['id'])){//traz um registro, armazena na isntancia entity
			$entity = $this->em->getReference($this->entity, $data['id']);

			$hydrator = new ClassMetrods();
			$hydrator->hydrate($data, $entity);

		}else
		{
			$entity = new $this->entity($data);
		}
		$this->em->persist($entity);
		$this->em->flush();

		return $entity;
	}

	public function remove(Array $data = array()){
		//vai no repositorio e busca o registro unico
		$entity = $this->em->getRepository($this->entity)->findOneBy($data);
		if($entity){
			$this->em->remove($entity);
			$this->em->flush();//quse igual ao commit
			return $entity;
		}
		return false;
	}


}