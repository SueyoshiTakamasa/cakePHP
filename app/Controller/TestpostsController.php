<?php
App::uses('AppController', 'Controller');
/**
 * Testposts Controller
 *
 * @property Testpost $Testpost
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class TestpostsController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Text');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

public function beforeFilter() {
        parent::beforeFilter();
    }

    public function index() {
        $this->Testpost->recursive = 0;
        $this->Paginator->settings = array(
            'conditions' => array(
                'Testpost.deleted' => 0
            )
        );
        $this->set('testposts', $this->Paginator->paginate());
        $this->set('title_for_layout', __('Testpost') . __('List'));
    }

    public function view($id = null) {
        if (!$this->Testpost->exists($id)) {
            throw new NotFoundException(__('Invalid Data'));
        }
        $options = array('conditions' => array('Testpost.id' => $id, 'Testpost.deleted' => 0));
        $this->set('testpost', $this->Testpost->find('first', $options));
        $this->set('title_for_layout', __('Testpost') . __('View'));
    }

    public function add() {
        if ($this->request->is(array('post', 'put'))) {
            $this->Testpost->create();
            if ($this->Testpost->save($this->request->data)) {
                $this->Session->setFlash(__('has been created.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('could not be created. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        $this->set('title_for_layout', __('Testpost') . __('Add'));
    }

    public function edit($id = null) {
        if (!$this->Testpost->exists($id)) {
            throw new NotFoundException(__('Invalid Data'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Testpost->save($this->request->data)) {
                $this->Session->setFlash(__('has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Testpost.id' => $id, 'Testpost.deleted' => 0));
            $this->request->data = $this->Testpost->find('first', $options);
        }
         $this->set('title_for_layout', __('Testpost') . __('Edit'));
    }

    public function delete($id = null) {
        $this->Testpost->id = $id;
        if (!$this->Testpost->exists()) {
            throw new NotFoundException(__('Invalid Data'));
        }
        $this->request->onlyAllow('post', 'delete');
        $this->Testpost->set(array('deleted' => 1));
        if ($this->Testpost->save()) {
            $this->Session->setFlash(__('has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
