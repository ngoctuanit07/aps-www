<?php
App::uses('AppController', 'Controller');
/**
 * FacebookUserFeeds Controller
 *
 * @property FacebookUserFeed $FacebookUserFeed
 * @property PaginatorComponent $Paginator
 */
class FacebookUserFeedsController extends AppController {

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
		$this->FacebookUserFeed->recursive = 0;
		$this->set('facebookUserFeeds', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookUserFeed->exists($id)) {
			throw new NotFoundException(__('Invalid facebook user feed'));
		}
		$options = array('conditions' => array('FacebookUserFeed.' . $this->FacebookUserFeed->primaryKey => $id));
		$this->set('facebookUserFeed', $this->FacebookUserFeed->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookUserFeed->create();
			if ($this->FacebookUserFeed->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook user feed has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook user feed could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookUserFeed->User->find('list');
		$links = $this->FacebookUserFeed->Link->find('list');
		$posts = $this->FacebookUserFeed->Post->find('list');
		$statuses = $this->FacebookUserFeed->Status->find('list');
		$this->set(compact('users', 'links', 'posts', 'statuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookUserFeed->exists($id)) {
			throw new NotFoundException(__('Invalid facebook user feed'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookUserFeed->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook user feed has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook user feed could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookUserFeed.' . $this->FacebookUserFeed->primaryKey => $id));
			$this->request->data = $this->FacebookUserFeed->find('first', $options);
		}
		$users = $this->FacebookUserFeed->User->find('list');
		$links = $this->FacebookUserFeed->Link->find('list');
		$posts = $this->FacebookUserFeed->Post->find('list');
		$statuses = $this->FacebookUserFeed->Status->find('list');
		$this->set(compact('users', 'links', 'posts', 'statuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookUserFeed->id = $id;
		if (!$this->FacebookUserFeed->exists()) {
			throw new NotFoundException(__('Invalid facebook user feed'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookUserFeed->delete()) {
			$this->Session->setFlash(__('The facebook user feed has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook user feed could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookUserFeed->recursive = 0;
		$this->set('facebookUserFeeds', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookUserFeed->exists($id)) {
			throw new NotFoundException(__('Invalid facebook user feed'));
		}
		$options = array('conditions' => array('FacebookUserFeed.' . $this->FacebookUserFeed->primaryKey => $id));
		$this->set('facebookUserFeed', $this->FacebookUserFeed->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookUserFeed->create();
			if ($this->FacebookUserFeed->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook user feed has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook user feed could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookUserFeed->User->find('list');
		$links = $this->FacebookUserFeed->Link->find('list');
		$posts = $this->FacebookUserFeed->Post->find('list');
		$statuses = $this->FacebookUserFeed->Status->find('list');
		$this->set(compact('users', 'links', 'posts', 'statuses'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookUserFeed->exists($id)) {
			throw new NotFoundException(__('Invalid facebook user feed'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookUserFeed->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook user feed has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook user feed could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookUserFeed.' . $this->FacebookUserFeed->primaryKey => $id));
			$this->request->data = $this->FacebookUserFeed->find('first', $options);
		}
		$users = $this->FacebookUserFeed->User->find('list');
		$links = $this->FacebookUserFeed->Link->find('list');
		$posts = $this->FacebookUserFeed->Post->find('list');
		$statuses = $this->FacebookUserFeed->Status->find('list');
		$this->set(compact('users', 'links', 'posts', 'statuses'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookUserFeed->id = $id;
		if (!$this->FacebookUserFeed->exists()) {
			throw new NotFoundException(__('Invalid facebook user feed'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookUserFeed->delete()) {
			$this->Session->setFlash(__('The facebook user feed has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook user feed could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
