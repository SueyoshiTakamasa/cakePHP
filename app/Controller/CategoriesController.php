<?php 
App::uses('AppController', 'Controller');

/******************************************
* カテゴリーページ
*******************************************/
class CategoriesController extends AppController {
	public $uses = array('Category');

	//
	//初期画面
	//
	public function index() {
		$this->Category->recursive = 0;
		$this->set('categories', $this->Category->find('all'));
	}

	//
	//カテゴリー追加
	//
	public function add() {
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Flash->success(__('The category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The category could not be saved. Please, try again.'));
			}
		}
	}

	//
	//カテゴリービュー
	//
	public function view($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
		$this->set('category', $this->Category->find('first', $options));
	}

	//
	//カテゴリー編集
	//
	public function edit($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Category->save($this->request->data)) {
				$this->Flash->success(__('The category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
		}
	}

	//
	//カテゴリー削除
	//
	public function delete($id = null){
			if($this->request->is('get')){
				throw new MethodNotAllowedException();
			}
			$this->Category->id = $id;
			if(!$this->Category->exists()){
				throw new NotFoundException(__('Invalid category'));
			}
			if($this->Category->delete()){
				$this->Flash->success(__('Category deleted'));
				return $this->redirect(array('action'=>'index'));
			}else {
				$this->Flash->error(
					__('The category with id: %s could not be deleted.',h($id))
				);
			}
	}

}