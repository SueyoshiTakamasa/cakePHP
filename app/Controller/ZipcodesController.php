<?php
App::uses('AppController','Controller');
class ZipcodesController extends AppController{
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('search');
	}

	public function search(){
		if(!$this->request->is('post')){
			throw new MethodNotAllowedException();
		}
		$this->autoRender = false;

		if($this->request->is('ajax')) {
		    $result = $this->Zipcode->find('all',array(
			    'conditions'=>array(
			         'zipcode'=>$this->request->data['zipcode'],
				),
			));
		}

		return json_encode($result);
	}

	public function index(){

	}
}