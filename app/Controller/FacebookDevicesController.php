<?php
App::uses('AppController', 'Controller');
/**
 * FacebookDevices Controller
 *
 * @property FacebookDevice $FacebookDevice
 * @property PaginatorComponent $Paginator
 */
class FacebookDevicesController extends AppController {

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
		$this->FacebookDevice->recursive = 0;
		$this->set('facebookDevices', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookDevice->exists($id)) {
			throw new NotFoundException(__('Invalid facebook device'));
		}
		$options = array('conditions' => array('FacebookDevice.' . $this->FacebookDevice->primaryKey => $id));
		$this->set('facebookDevice', $this->FacebookDevice->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookDevice->create();
			if ($this->FacebookDevice->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook device has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook device could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookDevice->User->find('list');
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
		if (!$this->FacebookDevice->exists($id)) {
			throw new NotFoundException(__('Invalid facebook device'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookDevice->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook device has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook device could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookDevice.' . $this->FacebookDevice->primaryKey => $id));
			$this->request->data = $this->FacebookDevice->find('first', $options);
		}
		$users = $this->FacebookDevice->User->find('list');
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
		$this->FacebookDevice->id = $id;
		if (!$this->FacebookDevice->exists()) {
			throw new NotFoundException(__('Invalid facebook device'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookDevice->delete()) {
			$this->Session->setFlash(__('The facebook device has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook device could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookDevice->recursive = 0;
		$this->set('facebookDevices', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookDevice->exists($id)) {
			throw new NotFoundException(__('Invalid facebook device'));
		}
		$options = array('conditions' => array('FacebookDevice.' . $this->FacebookDevice->primaryKey => $id));
		$this->set('facebookDevice', $this->FacebookDevice->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookDevice->create();
			if ($this->FacebookDevice->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook device has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook device could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookDevice->User->find('list');
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
		if (!$this->FacebookDevice->exists($id)) {
			throw new NotFoundException(__('Invalid facebook device'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookDevice->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook device has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook device could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookDevice.' . $this->FacebookDevice->primaryKey => $id));
			$this->request->data = $this->FacebookDevice->find('first', $options);
		}
		$users = $this->FacebookDevice->User->find('list');
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
		$this->FacebookDevice->id = $id;
		if (!$this->FacebookDevice->exists()) {
			throw new NotFoundException(__('Invalid facebook device'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookDevice->delete()) {
			$this->Session->setFlash(__('The facebook device has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook device could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
