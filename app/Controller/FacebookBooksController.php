<?php
App::uses('AppController', 'Controller');
/**
 * FacebookBooks Controller
 *
 * @property FacebookBook $FacebookBook
 * @property PaginatorComponent $Paginator
 */
class FacebookBooksController extends AppController {

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
		$this->FacebookBook->recursive = 0;
		$this->set('facebookBooks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookBook->exists($id)) {
			throw new NotFoundException(__('Invalid facebook book'));
		}
		$options = array('conditions' => array('FacebookBook.' . $this->FacebookBook->primaryKey => $id));
		$this->set('facebookBook', $this->FacebookBook->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookBook->create();
			if ($this->FacebookBook->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook book has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook book could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookBook->User->find('list');
		$pages = $this->FacebookBook->Page->find('list');
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
		if (!$this->FacebookBook->exists($id)) {
			throw new NotFoundException(__('Invalid facebook book'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookBook->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook book has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook book could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookBook.' . $this->FacebookBook->primaryKey => $id));
			$this->request->data = $this->FacebookBook->find('first', $options);
		}
		$users = $this->FacebookBook->User->find('list');
		$pages = $this->FacebookBook->Page->find('list');
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
		$this->FacebookBook->id = $id;
		if (!$this->FacebookBook->exists()) {
			throw new NotFoundException(__('Invalid facebook book'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookBook->delete()) {
			$this->Session->setFlash(__('The facebook book has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook book could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookBook->recursive = 0;
		$this->set('facebookBooks', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookBook->exists($id)) {
			throw new NotFoundException(__('Invalid facebook book'));
		}
		$options = array('conditions' => array('FacebookBook.' . $this->FacebookBook->primaryKey => $id));
		$this->set('facebookBook', $this->FacebookBook->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookBook->create();
			if ($this->FacebookBook->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook book has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook book could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookBook->User->find('list');
		$pages = $this->FacebookBook->Page->find('list');
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
		if (!$this->FacebookBook->exists($id)) {
			throw new NotFoundException(__('Invalid facebook book'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookBook->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook book has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook book could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookBook.' . $this->FacebookBook->primaryKey => $id));
			$this->request->data = $this->FacebookBook->find('first', $options);
		}
		$users = $this->FacebookBook->User->find('list');
		$pages = $this->FacebookBook->Page->find('list');
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
		$this->FacebookBook->id = $id;
		if (!$this->FacebookBook->exists()) {
			throw new NotFoundException(__('Invalid facebook book'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookBook->delete()) {
			$this->Session->setFlash(__('The facebook book has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook book could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
