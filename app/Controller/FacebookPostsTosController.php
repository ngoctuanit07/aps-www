<?php
App::uses('AppController', 'Controller');
/**
 * FacebookPostsTos Controller
 *
 * @property FacebookPostsTo $FacebookPostsTo
 * @property PaginatorComponent $Paginator
 */
class FacebookPostsTosController extends AppController {

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
		$this->FacebookPostsTo->recursive = 0;
		$this->set('facebookPostsTos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookPostsTo->exists($id)) {
			throw new NotFoundException(__('Invalid facebook posts to'));
		}
		$options = array('conditions' => array('FacebookPostsTo.' . $this->FacebookPostsTo->primaryKey => $id));
		$this->set('facebookPostsTo', $this->FacebookPostsTo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookPostsTo->create();
			if ($this->FacebookPostsTo->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook posts to has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook posts to could not be saved. Please, try again.'));
			}
		}
		$posts = $this->FacebookPostsTo->Post->find('list');
		$users = $this->FacebookPostsTo->User->find('list');
		$pages = $this->FacebookPostsTo->Page->find('list');
		$groups = $this->FacebookPostsTo->Group->find('list');
		$events = $this->FacebookPostsTo->Event->find('list');
		$applications = $this->FacebookPostsTo->Application->find('list');
		$this->set(compact('posts', 'users', 'pages', 'groups', 'events', 'applications'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookPostsTo->exists($id)) {
			throw new NotFoundException(__('Invalid facebook posts to'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookPostsTo->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook posts to has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook posts to could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookPostsTo.' . $this->FacebookPostsTo->primaryKey => $id));
			$this->request->data = $this->FacebookPostsTo->find('first', $options);
		}
		$posts = $this->FacebookPostsTo->Post->find('list');
		$users = $this->FacebookPostsTo->User->find('list');
		$pages = $this->FacebookPostsTo->Page->find('list');
		$groups = $this->FacebookPostsTo->Group->find('list');
		$events = $this->FacebookPostsTo->Event->find('list');
		$applications = $this->FacebookPostsTo->Application->find('list');
		$this->set(compact('posts', 'users', 'pages', 'groups', 'events', 'applications'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookPostsTo->id = $id;
		if (!$this->FacebookPostsTo->exists()) {
			throw new NotFoundException(__('Invalid facebook posts to'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookPostsTo->delete()) {
			$this->Session->setFlash(__('The facebook posts to has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook posts to could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookPostsTo->recursive = 0;
		$this->set('facebookPostsTos', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookPostsTo->exists($id)) {
			throw new NotFoundException(__('Invalid facebook posts to'));
		}
		$options = array('conditions' => array('FacebookPostsTo.' . $this->FacebookPostsTo->primaryKey => $id));
		$this->set('facebookPostsTo', $this->FacebookPostsTo->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookPostsTo->create();
			if ($this->FacebookPostsTo->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook posts to has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook posts to could not be saved. Please, try again.'));
			}
		}
		$posts = $this->FacebookPostsTo->Post->find('list');
		$users = $this->FacebookPostsTo->User->find('list');
		$pages = $this->FacebookPostsTo->Page->find('list');
		$groups = $this->FacebookPostsTo->Group->find('list');
		$events = $this->FacebookPostsTo->Event->find('list');
		$applications = $this->FacebookPostsTo->Application->find('list');
		$this->set(compact('posts', 'users', 'pages', 'groups', 'events', 'applications'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookPostsTo->exists($id)) {
			throw new NotFoundException(__('Invalid facebook posts to'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookPostsTo->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook posts to has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook posts to could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookPostsTo.' . $this->FacebookPostsTo->primaryKey => $id));
			$this->request->data = $this->FacebookPostsTo->find('first', $options);
		}
		$posts = $this->FacebookPostsTo->Post->find('list');
		$users = $this->FacebookPostsTo->User->find('list');
		$pages = $this->FacebookPostsTo->Page->find('list');
		$groups = $this->FacebookPostsTo->Group->find('list');
		$events = $this->FacebookPostsTo->Event->find('list');
		$applications = $this->FacebookPostsTo->Application->find('list');
		$this->set(compact('posts', 'users', 'pages', 'groups', 'events', 'applications'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookPostsTo->id = $id;
		if (!$this->FacebookPostsTo->exists()) {
			throw new NotFoundException(__('Invalid facebook posts to'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookPostsTo->delete()) {
			$this->Session->setFlash(__('The facebook posts to has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook posts to could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
