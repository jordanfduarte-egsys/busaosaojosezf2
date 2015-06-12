<?php

namespace Base\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Pagiantor\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;

abstract class AbstractController extends AbstractActionController{

	protected $em;
	protected $entity;
	protected $controller;
	protected $route;
	protected $form;

	abstract function __construct();
	/**
	*Listar Resultados
	*/
	public function indexAction(){
		//retorna todos os resultados do repositorio da entidade
		$list = $this->getEm()->getRepository($this->entity)->findAll();

		$page = $this->params()->fromRoute('page');//pagína atual
		$pagiantor = new pagiantor(new ArrayAdapter($list));
		$paginator->setCurrentpageNumber($page);//pagina que estamos
		$pagiantor->setDefaultItemCountPorPage(10);
		//ligação entre a controller e a view
		return new ViewModel(array('data'=>$list, 'page'=>$page));
	}
	/** 
	* Inserir
	*/
	public function inserirAction(){
		if(is_string($this->form))
			$form = new $this->form;
		else
			$form = $this->form;

		$request = $this->getRequest();

		if($request->isPost()){

			$form->setData($request->getPost());
			if($form->isValid()){
				$service = $this->getServiceLocator()->get($this->service);

				if($service->save($request->getPost()->toArray())){
					$this->flashMessenger()->addSuccessMessage('Cadastrado com  suceso!');
				}else{
					$this->flashMessenger()->addErrorMessage('Não foi possivel cadasterar!');
				}

				return $this->redirect()->toRoute($this->route, array('controller'=>$this->controller));
			}
		}

		if($this->flashMessenger()->hasSuccesMessanger())
			return new ViewModel(array(
						"form"=>$form,
						"success"=>$this->flashMessenger()->getSuccessMessager()));

		if($this->flashMessenger()->hasErrorMessanger())
			return new ViewModel(array(
						"form"=>$form,
						"error"=>$this->flashMessenger()->getErrorMessager()));
		$this->flashMessenger()->clearMessages();
		return new ViewModel(array("form"=>$form));
	}
	/**
	*Editar
	*/
	public function editarAction(){
		if(is_string($this->form))
			$form = new $this->form;
		else
			$form = $this->form;

		$request = $this->getRequest();
		$param = $this->params()->fromRoute('id',0);

		$repository = $this->getEm()->getReposity($this->entity)->find($param);

		if($repository)
		{

			$array = array();
			foreach($repository->toArray() as $key => $value){
				if($value instanceof \DateTime)
					$array[$key] = $value->format('d/m/Y');
				else
					$array[$key] = $value;
			}
			$form->setData($array);

			if($request->isPost()){

				$form->setData($request->getPost());
				if($form->isValid()){
					$service = $this->getServiceLocator()->get($this->service);
					$data['id']  = (int)$param;

					if($service->save($data)){
						$this->flashMessenger()->addSuccessMessage('Atualizado com  suceso!');
					}else{
						$this->flashMessenger()->addErrorMessage('Não foi possivel atualizar!');
					}

					return $this->redirect()->toRoute($this->route, array('controller'=>$this->controller));
				}
			}

		}else{
			$this->flashMessenger()->addInfoMessage('Registro não foi encotrado!');
			return $this->redirect()->toRoute($this->route, array('controller'=>$this->controller));
		}

		if($this->flashMessenger()->hasSuccesMessanger())
			return new ViewModel(array(
						"form"=>$form,
						"success"=>$this->flashMessenger()->getSuccessMessager(),
						"id"=>$param));

		if($this->flashMessenger()->hasErrorMessanger())
			return new ViewModel(array(
						"form"=>$form,
						"error"=>$this->flashMessenger()->getErrorMessager(),			
						"id"=>$param));

		if($this->flashMessenger()->hasInfoMessanger())
			return new ViewModel(array(
						"form"=>$form,
						"warning"=>$this->flashMessenger()->getInfoMessager(),			
						"id"=>$param));
		$this->flashMessenger()->clearMessages();
		return new ViewModel(array("form"=>$form,'id'=>$param));

	}
	/**
	*Excluir
	*/
	public function excluirAction(){
		$service = $this->getServiceLocator()->get($this->service);
		$id = $this->params()->fromRoute('id',0);

		if($service->remove(array("id"=>$id)))
			$this->flashMessenger()->addSuccessMessage('Registro deletado com sucesso!');
		else
			$this->flashMessenger()->addErrorMessage('Não foi possível deletar o registro!');

		return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
	}
	/**
	*Get Entity manager
	*/
	public function getEM(){
		if($this->em == null){
			$this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		}
		return $this->em;
	}
}