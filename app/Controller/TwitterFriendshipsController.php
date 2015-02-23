<?php
App::uses('AppController', 'Controller');
/**
 * TwitterFriendships Controller
 *
 * @property TwitterFriendship $TwitterFriendship
 * @property PaginatorComponent $Paginator
 */
class TwitterFriendshipsController extends AppController {

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
		$this->TwitterFriendship->recursive = 0;
		$this->set('twitterFriendships', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TwitterFriendship->exists($id)) {
			throw new NotFoundException(__('Invalid twitter friendship'));
		}
		$options = array('conditions' => array('TwitterFriendship.' . $this->TwitterFriendship->primaryKey => $id));
		$this->set('twitterFriendship', $this->TwitterFriendship->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TwitterFriendship->create();
			if ($this->TwitterFriendship->save($this->request->data)) {
				$this->Session->setFlash(__('The twitter friendship has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The twitter friendship could not be saved. Please, try again.'));
			}
		}
		$users = $this->TwitterFriendship->User->find('list');
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
		if (!$this->TwitterFriendship->exists($id)) {
			throw new NotFoundException(__('Invalid twitter friendship'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TwitterFriendship->save($this->request->data)) {
				$this->Session->setFlash(__('The twitter friendship has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The twitter friendship could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TwitterFriendship.' . $this->TwitterFriendship->primaryKey => $id));
			$this->request->data = $this->TwitterFriendship->find('first', $options);
		}
		$users = $this->TwitterFriendship->User->find('list');
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
		$this->TwitterFriendship->id = $id;
		if (!$this->TwitterFriendship->exists()) {
			throw new NotFoundException(__('Invalid twitter friendship'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TwitterFriendship->delete()) {
			$this->Session->setFlash(__('The twitter friendship has been deleted.'));
		} else {
			$this->Session->setFlash(__('The twitter friendship could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TwitterFriendship->recursive = 0;
		$this->set('twitterFriendships', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TwitterFriendship->exists($id)) {
			throw new NotFoundException(__('Invalid twitter friendship'));
		}
		$options = array('conditions' => array('TwitterFriendship.' . $this->TwitterFriendship->primaryKey => $id));
		$this->set('twitterFriendship', $this->TwitterFriendship->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TwitterFriendship->create();
			if ($this->TwitterFriendship->save($this->request->data)) {
				$this->Session->setFlash(__('The twitter friendship has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The twitter friendship could not be saved. Please, try again.'));
			}
		}
		$users = $this->TwitterFriendship->User->find('list');
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
		if (!$this->TwitterFriendship->exists($id)) {
			throw new NotFoundException(__('Invalid twitter friendship'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TwitterFriendship->save($this->request->data)) {
				$this->Session->setFlash(__('The twitter friendship has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The twitter friendship could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TwitterFriendship.' . $this->TwitterFriendship->primaryKey => $id));
			$this->request->data = $this->TwitterFriendship->find('first', $options);
		}
		$users = $this->TwitterFriendship->User->find('list');
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
		$this->TwitterFriendship->id = $id;
		if (!$this->TwitterFriendship->exists()) {
			throw new NotFoundException(__('Invalid twitter friendship'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TwitterFriendship->delete()) {
			$this->Session->setFlash(__('The twitter friendship has been deleted.'));
		} else {
			$this->Session->setFlash(__('The twitter friendship could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
