<?php
App::uses('AppController', 'Controller');
/**
 * FacebookLinks Controller
 *
 * @property FacebookLink $FacebookLink
 * @property PaginatorComponent $Paginator
 */
class FacebookLinksController extends AppController {

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
		$this->FacebookLink->recursive = 0;
		$this->set('facebookLinks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookLink->exists($id)) {
			throw new NotFoundException(__('Invalid facebook link'));
		}
		$options = array('conditions' => array('FacebookLink.' . $this->FacebookLink->primaryKey => $id));
		$this->set('facebookLink', $this->FacebookLink->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookLink->create();
			if ($this->FacebookLink->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook link has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook link could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookLink->User->find('list');
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
		if (!$this->FacebookLink->exists($id)) {
			throw new NotFoundException(__('Invalid facebook link'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookLink->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook link has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook link could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookLink.' . $this->FacebookLink->primaryKey => $id));
			$this->request->data = $this->FacebookLink->find('first', $options);
		}
		$users = $this->FacebookLink->User->find('list');
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
		$this->FacebookLink->id = $id;
		if (!$this->FacebookLink->exists()) {
			throw new NotFoundException(__('Invalid facebook link'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookLink->delete()) {
			$this->Session->setFlash(__('The facebook link has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook link could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookLink->recursive = 0;
		$this->set('facebookLinks', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookLink->exists($id)) {
			throw new NotFoundException(__('Invalid facebook link'));
		}
		$options = array('conditions' => array('FacebookLink.' . $this->FacebookLink->primaryKey => $id));
		$this->set('facebookLink', $this->FacebookLink->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookLink->create();
			if ($this->FacebookLink->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook link has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook link could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookLink->User->find('list');
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
		if (!$this->FacebookLink->exists($id)) {
			throw new NotFoundException(__('Invalid facebook link'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookLink->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook link has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook link could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookLink.' . $this->FacebookLink->primaryKey => $id));
			$this->request->data = $this->FacebookLink->find('first', $options);
		}
		$users = $this->FacebookLink->User->find('list');
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
		$this->FacebookLink->id = $id;
		if (!$this->FacebookLink->exists()) {
			throw new NotFoundException(__('Invalid facebook link'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookLink->delete()) {
			$this->Session->setFlash(__('The facebook link has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook link could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
