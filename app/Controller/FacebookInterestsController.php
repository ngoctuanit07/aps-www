<?php
App::uses('AppController', 'Controller');
/**
 * FacebookInterests Controller
 *
 * @property FacebookInterest $FacebookInterest
 * @property PaginatorComponent $Paginator
 */
class FacebookInterestsController extends AppController {

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
		$this->FacebookInterest->recursive = 0;
		$this->set('facebookInterests', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookInterest->exists($id)) {
			throw new NotFoundException(__('Invalid facebook interest'));
		}
		$options = array('conditions' => array('FacebookInterest.' . $this->FacebookInterest->primaryKey => $id));
		$this->set('facebookInterest', $this->FacebookInterest->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookInterest->create();
			if ($this->FacebookInterest->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook interest has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook interest could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookInterest->User->find('list');
		$pages = $this->FacebookInterest->Page->find('list');
		$this->set(compact('users', 'pages'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookInterest->exists($id)) {
			throw new NotFoundException(__('Invalid facebook interest'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookInterest->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook interest has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook interest could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookInterest.' . $this->FacebookInterest->primaryKey => $id));
			$this->request->data = $this->FacebookInterest->find('first', $options);
		}
		$users = $this->FacebookInterest->User->find('list');
		$pages = $this->FacebookInterest->Page->find('list');
		$this->set(compact('users', 'pages'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookInterest->id = $id;
		if (!$this->FacebookInterest->exists()) {
			throw new NotFoundException(__('Invalid facebook interest'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookInterest->delete()) {
			$this->Session->setFlash(__('The facebook interest has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook interest could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookInterest->recursive = 0;
		$this->set('facebookInterests', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookInterest->exists($id)) {
			throw new NotFoundException(__('Invalid facebook interest'));
		}
		$options = array('conditions' => array('FacebookInterest.' . $this->FacebookInterest->primaryKey => $id));
		$this->set('facebookInterest', $this->FacebookInterest->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookInterest->create();
			if ($this->FacebookInterest->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook interest has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook interest could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookInterest->User->find('list');
		$pages = $this->FacebookInterest->Page->find('list');
		$this->set(compact('users', 'pages'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookInterest->exists($id)) {
			throw new NotFoundException(__('Invalid facebook interest'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookInterest->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook interest has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook interest could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookInterest.' . $this->FacebookInterest->primaryKey => $id));
			$this->request->data = $this->FacebookInterest->find('first', $options);
		}
		$users = $this->FacebookInterest->User->find('list');
		$pages = $this->FacebookInterest->Page->find('list');
		$this->set(compact('users', 'pages'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookInterest->id = $id;
		if (!$this->FacebookInterest->exists()) {
			throw new NotFoundException(__('Invalid facebook interest'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookInterest->delete()) {
			$this->Session->setFlash(__('The facebook interest has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook interest could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
