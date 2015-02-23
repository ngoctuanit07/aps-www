<?php
App::uses('AppController', 'Controller');
/**
 * FacebookFamilies Controller
 *
 * @property FacebookFamily $FacebookFamily
 * @property PaginatorComponent $Paginator
 */
class FacebookFamiliesController extends AppController {

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
		$this->FacebookFamily->recursive = 0;
		$this->set('facebookFamilies', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookFamily->exists($id)) {
			throw new NotFoundException(__('Invalid facebook family'));
		}
		$options = array('conditions' => array('FacebookFamily.' . $this->FacebookFamily->primaryKey => $id));
		$this->set('facebookFamily', $this->FacebookFamily->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookFamily->create();
			if ($this->FacebookFamily->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook family has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook family could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookFamily->User->find('list');
		$familyUsers = $this->FacebookFamily->FamilyUser->find('list');
		$this->set(compact('users', 'familyUsers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookFamily->exists($id)) {
			throw new NotFoundException(__('Invalid facebook family'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookFamily->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook family has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook family could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookFamily.' . $this->FacebookFamily->primaryKey => $id));
			$this->request->data = $this->FacebookFamily->find('first', $options);
		}
		$users = $this->FacebookFamily->User->find('list');
		$familyUsers = $this->FacebookFamily->FamilyUser->find('list');
		$this->set(compact('users', 'familyUsers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookFamily->id = $id;
		if (!$this->FacebookFamily->exists()) {
			throw new NotFoundException(__('Invalid facebook family'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookFamily->delete()) {
			$this->Session->setFlash(__('The facebook family has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook family could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookFamily->recursive = 0;
		$this->set('facebookFamilies', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookFamily->exists($id)) {
			throw new NotFoundException(__('Invalid facebook family'));
		}
		$options = array('conditions' => array('FacebookFamily.' . $this->FacebookFamily->primaryKey => $id));
		$this->set('facebookFamily', $this->FacebookFamily->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookFamily->create();
			if ($this->FacebookFamily->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook family has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook family could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookFamily->User->find('list');
		$familyUsers = $this->FacebookFamily->FamilyUser->find('list');
		$this->set(compact('users', 'familyUsers'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookFamily->exists($id)) {
			throw new NotFoundException(__('Invalid facebook family'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookFamily->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook family has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook family could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookFamily.' . $this->FacebookFamily->primaryKey => $id));
			$this->request->data = $this->FacebookFamily->find('first', $options);
		}
		$users = $this->FacebookFamily->User->find('list');
		$familyUsers = $this->FacebookFamily->FamilyUser->find('list');
		$this->set(compact('users', 'familyUsers'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookFamily->id = $id;
		if (!$this->FacebookFamily->exists()) {
			throw new NotFoundException(__('Invalid facebook family'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookFamily->delete()) {
			$this->Session->setFlash(__('The facebook family has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook family could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
