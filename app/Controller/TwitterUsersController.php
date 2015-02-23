<?php
App::uses('AppController', 'Controller');
/**
 * TwitterUsers Controller
 *
 * @property TwitterUser $TwitterUser
 * @property PaginatorComponent $Paginator
 */
class TwitterUsersController extends AppController {

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
		$this->TwitterUser->recursive = 0;
		$this->set('twitterUsers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TwitterUser->exists($id)) {
			throw new NotFoundException(__('Invalid twitter user'));
		}
		$options = array('conditions' => array('TwitterUser.' . $this->TwitterUser->primaryKey => $id));
		$this->set('twitterUser', $this->TwitterUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TwitterUser->create();
			if ($this->TwitterUser->save($this->request->data)) {
				$this->Session->setFlash(__('The twitter user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The twitter user could not be saved. Please, try again.'));
			}
		}
		$users = $this->TwitterUser->User->find('list');
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
		if (!$this->TwitterUser->exists($id)) {
			throw new NotFoundException(__('Invalid twitter user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TwitterUser->save($this->request->data)) {
				$this->Session->setFlash(__('The twitter user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The twitter user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TwitterUser.' . $this->TwitterUser->primaryKey => $id));
			$this->request->data = $this->TwitterUser->find('first', $options);
		}
		$users = $this->TwitterUser->User->find('list');
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
		$this->TwitterUser->id = $id;
		if (!$this->TwitterUser->exists()) {
			throw new NotFoundException(__('Invalid twitter user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TwitterUser->delete()) {
			$this->Session->setFlash(__('The twitter user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The twitter user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TwitterUser->recursive = 0;
		$this->set('twitterUsers', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TwitterUser->exists($id)) {
			throw new NotFoundException(__('Invalid twitter user'));
		}
		$options = array('conditions' => array('TwitterUser.' . $this->TwitterUser->primaryKey => $id));
		$this->set('twitterUser', $this->TwitterUser->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TwitterUser->create();
			if ($this->TwitterUser->save($this->request->data)) {
				$this->Session->setFlash(__('The twitter user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The twitter user could not be saved. Please, try again.'));
			}
		}
		$users = $this->TwitterUser->User->find('list');
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
		if (!$this->TwitterUser->exists($id)) {
			throw new NotFoundException(__('Invalid twitter user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TwitterUser->save($this->request->data)) {
				$this->Session->setFlash(__('The twitter user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The twitter user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TwitterUser.' . $this->TwitterUser->primaryKey => $id));
			$this->request->data = $this->TwitterUser->find('first', $options);
		}
		$users = $this->TwitterUser->User->find('list');
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
		$this->TwitterUser->id = $id;
		if (!$this->TwitterUser->exists()) {
			throw new NotFoundException(__('Invalid twitter user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TwitterUser->delete()) {
			$this->Session->setFlash(__('The twitter user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The twitter user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
