<?php
App::uses('AppController', 'Controller');
/**
 * FacebookTelevisions Controller
 *
 * @property FacebookTelevision $FacebookTelevision
 * @property PaginatorComponent $Paginator
 */
class FacebookTelevisionsController extends AppController {

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
		$this->FacebookTelevision->recursive = 0;
		$this->set('facebookTelevisions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookTelevision->exists($id)) {
			throw new NotFoundException(__('Invalid facebook television'));
		}
		$options = array('conditions' => array('FacebookTelevision.' . $this->FacebookTelevision->primaryKey => $id));
		$this->set('facebookTelevision', $this->FacebookTelevision->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookTelevision->create();
			if ($this->FacebookTelevision->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook television has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook television could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookTelevision->User->find('list');
		$pages = $this->FacebookTelevision->Page->find('list');
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
		if (!$this->FacebookTelevision->exists($id)) {
			throw new NotFoundException(__('Invalid facebook television'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookTelevision->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook television has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook television could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookTelevision.' . $this->FacebookTelevision->primaryKey => $id));
			$this->request->data = $this->FacebookTelevision->find('first', $options);
		}
		$users = $this->FacebookTelevision->User->find('list');
		$pages = $this->FacebookTelevision->Page->find('list');
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
		$this->FacebookTelevision->id = $id;
		if (!$this->FacebookTelevision->exists()) {
			throw new NotFoundException(__('Invalid facebook television'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookTelevision->delete()) {
			$this->Session->setFlash(__('The facebook television has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook television could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookTelevision->recursive = 0;
		$this->set('facebookTelevisions', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookTelevision->exists($id)) {
			throw new NotFoundException(__('Invalid facebook television'));
		}
		$options = array('conditions' => array('FacebookTelevision.' . $this->FacebookTelevision->primaryKey => $id));
		$this->set('facebookTelevision', $this->FacebookTelevision->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookTelevision->create();
			if ($this->FacebookTelevision->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook television has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook television could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookTelevision->User->find('list');
		$pages = $this->FacebookTelevision->Page->find('list');
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
		if (!$this->FacebookTelevision->exists($id)) {
			throw new NotFoundException(__('Invalid facebook television'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookTelevision->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook television has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook television could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookTelevision.' . $this->FacebookTelevision->primaryKey => $id));
			$this->request->data = $this->FacebookTelevision->find('first', $options);
		}
		$users = $this->FacebookTelevision->User->find('list');
		$pages = $this->FacebookTelevision->Page->find('list');
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
		$this->FacebookTelevision->id = $id;
		if (!$this->FacebookTelevision->exists()) {
			throw new NotFoundException(__('Invalid facebook television'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookTelevision->delete()) {
			$this->Session->setFlash(__('The facebook television has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook television could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
