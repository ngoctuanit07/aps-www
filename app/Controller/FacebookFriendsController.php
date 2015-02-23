<?php
App::uses('AppController', 'Controller');
/**
 * FacebookFriends Controller
 *
 * @property FacebookFriend $FacebookFriend
 * @property PaginatorComponent $Paginator
 */
class FacebookFriendsController extends AppController {

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
		$this->FacebookFriend->recursive = 0;
		$this->set('facebookFriends', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookFriend->exists($id)) {
			throw new NotFoundException(__('Invalid facebook friend'));
		}
		$options = array('conditions' => array('FacebookFriend.' . $this->FacebookFriend->primaryKey => $id));
		$this->set('facebookFriend', $this->FacebookFriend->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookFriend->create();
			if ($this->FacebookFriend->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook friend has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook friend could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookFriend->User->find('list');
		$friendlists = $this->FacebookFriend->Friendlist->find('list');
		$this->set(compact('users', 'friendlists'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookFriend->exists($id)) {
			throw new NotFoundException(__('Invalid facebook friend'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookFriend->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook friend has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook friend could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookFriend.' . $this->FacebookFriend->primaryKey => $id));
			$this->request->data = $this->FacebookFriend->find('first', $options);
		}
		$users = $this->FacebookFriend->User->find('list');
		$friendlists = $this->FacebookFriend->Friendlist->find('list');
		$this->set(compact('users', 'friendlists'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookFriend->id = $id;
		if (!$this->FacebookFriend->exists()) {
			throw new NotFoundException(__('Invalid facebook friend'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookFriend->delete()) {
			$this->Session->setFlash(__('The facebook friend has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook friend could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookFriend->recursive = 0;
		$this->set('facebookFriends', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookFriend->exists($id)) {
			throw new NotFoundException(__('Invalid facebook friend'));
		}
		$options = array('conditions' => array('FacebookFriend.' . $this->FacebookFriend->primaryKey => $id));
		$this->set('facebookFriend', $this->FacebookFriend->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookFriend->create();
			if ($this->FacebookFriend->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook friend has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook friend could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookFriend->User->find('list');
		$friendlists = $this->FacebookFriend->Friendlist->find('list');
		$this->set(compact('users', 'friendlists'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookFriend->exists($id)) {
			throw new NotFoundException(__('Invalid facebook friend'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookFriend->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook friend has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook friend could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookFriend.' . $this->FacebookFriend->primaryKey => $id));
			$this->request->data = $this->FacebookFriend->find('first', $options);
		}
		$users = $this->FacebookFriend->User->find('list');
		$friendlists = $this->FacebookFriend->Friendlist->find('list');
		$this->set(compact('users', 'friendlists'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookFriend->id = $id;
		if (!$this->FacebookFriend->exists()) {
			throw new NotFoundException(__('Invalid facebook friend'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookFriend->delete()) {
			$this->Session->setFlash(__('The facebook friend has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook friend could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
