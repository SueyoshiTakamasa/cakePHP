<?php
App::uses('AppController', 'Controller');
/**
 * Admins Controller
 *
 * @property Admin $Admin
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class AdminsController extends AppController {

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
        $this->Admin->recursive = 0;
        $this->Paginator->settings = array(
            'conditions' => array(
                'Admin.deleted' => 0
            )
        );
        $this->set('admins', $this->Paginator->paginate());
        $this->set('title_for_layout', __('Admin') . __('List'));
    }

    public function view($id = null) {
        if (!$this->Admin->exists($id)) {
            throw new NotFoundException(__('Invalid Data'));
        }
        $options = array('conditions' => array('Admin.id' => $id, 'Admin.deleted' => 0));
        $this->set('admin', $this->Admin->find('first', $options));
        $this->set('title_for_layout', __('Admin') . __('View'));
    }

    public function add() {
        if ($this->request->is(array('post', 'put'))) {
            $this->Admin->create();
            if ($this->Admin->save($this->request->data)) {
                $this->Session->setFlash(__('has been created.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('could not be created. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        $shops = $this->Admin->Shop->find('list', array('conditions' => array('deleted' => 0), 'recursive' => -1));
        $paymenttypes = $this->Admin->Paymenttype->find('list', array('conditions' => array('deleted' => 0), 'recursive' => -1));
$this->set(compact('shops', 'paymenttypes'));
        $this->set('title_for_layout', __('Admin') . __('Add'));
    }

    public function edit($id = null) {
        if (!$this->Admin->exists($id)) {
            throw new NotFoundException(__('Invalid Data'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Admin->save($this->request->data)) {
                $this->Session->setFlash(__('has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Admin.id' => $id, 'Admin.deleted' => 0));
            $this->request->data = $this->Admin->find('first', $options);
        }
        $shops = $this->Admin->Shop->find('list', array('conditions' => array('deleted' => 0), 'recursive' => -1));
        $paymenttypes = $this->Admin->Paymenttype->find('list', array('conditions' => array('deleted' => 0), 'recursive' => -1));
$this->set(compact('shops', 'paymenttypes'));
         $this->set('title_for_layout', __('Admin') . __('Edit'));
    }

    public function delete($id = null) {
        $this->Admin->id = $id;
        if (!$this->Admin->exists()) {
            throw new NotFoundException(__('Invalid Data'));
        }
        $this->request->onlyAllow('post', 'delete');
        $this->Admin->set(array('deleted' => 1));
        if ($this->Admin->save()) {
            $this->Session->setFlash(__('has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
