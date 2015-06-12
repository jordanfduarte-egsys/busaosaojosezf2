<?php

namespace Bairro\Form\Bairro;

use Zend\Form\Form;

class BairroForm extends Form
{

	public function __construct($name = null){

		parent::__construct('bairro');

		$this->add(array(
			'name' => 'idbairro',
			'type' => 'Hidden',
			));

		$this->add(array(
			'name' => 'nome',
			'type' => 'Text',
			'options' => array(
				'label' => 'Nome',
				)
			));

		$this->add(array(
			'name' => 'salvar',
			'type' => 'Submit',
			'options' => array(
				'label' => 'Salvar',
				)
			));

		$this->add(array(
			'name' => 'reset',
			'type' => 'Button',
			'options' => array(
				'label' => 'Limpar',
				)
			));

	}
}