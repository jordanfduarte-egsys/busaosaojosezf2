<?php

namespace Bairro\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Bairro\Form\Bairro\BairroForm;

class IndexController extends AbstractActionController{

	public function indexAction(){
		$form = new BairroForm();

		return new ViewModel(array("form"=>$form));
	}
}