<?php
App::uses('AppController', 'Controller');
/**
 * FacebookWorks Controller
 *
 * @property FacebookWork $FacebookWork
 * @property PaginatorComponent $Paginator
 */
class FacebookWorksController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->FacebookWork->recursive = 0;
		$this->set('facebookWorks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookWork->exists($id)) {
			throw new NotFoundException(__('Invalid facebook work'));
		}
		$options = array('conditions' => array('FacebookWork.' . $this->FacebookWork->primaryKey => $id));
		$this->set('facebookWork', $this->FacebookWork->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookWork->create();
			if ($this->FacebookWork->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook work has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook work could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookWork->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookWork->exists($id)) {
			throw new NotFoundException(__('Invalid facebook work'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookWork->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook work has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook work could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookWork.' . $this->FacebookWork->primaryKey => $id));
			$this->request->data = $this->FacebookWork->find('first', $options);
		}
		$users = $this->FacebookWork->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookWork->id = $id;
		if (!$this->FacebookWork->exists()) {
			throw new NotFoundException(__('Invalid facebook work'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookWork->delete()) {
			$this->Session->setFlash(__('The facebook work has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook work could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookWork->recursive = 0;
		$this->set('facebookWorks', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookWork->exists($id)) {
			throw new NotFoundException(__('Invalid facebook work'));
		}
		$options = array('conditions' => array('FacebookWork.' . $this->FacebookWork->primaryKey => $id));
		$this->set('facebookWork', $this->FacebookWork->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookWork->create();
			if ($this->FacebookWork->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook work has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook work could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookWork->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookWork->exists($id)) {
			throw new NotFoundException(__('Invalid facebook work'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookWork->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook work has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook work could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookWork.' . $this->FacebookWork->primaryKey => $id));
			$this->request->data = $this->FacebookWork->find('first', $options);
		}
		$users = $this->FacebookWork->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookWork->id = $id;
		if (!$this->FacebookWork->exists()) {
			throw new NotFoundException(__('Invalid facebook work'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookWork->delete()) {
			$this->Session->setFlash(__('The facebook work has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook work could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
