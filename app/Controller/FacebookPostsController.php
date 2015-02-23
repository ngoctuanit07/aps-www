<?php
App::uses('AppController', 'Controller');
/**
 * FacebookPosts Controller
 *
 * @property FacebookPost $FacebookPost
 * @property PaginatorComponent $Paginator
 */
class FacebookPostsController extends AppController {

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
		$this->FacebookPost->recursive = 0;
		$this->set('facebookPosts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookPost->exists($id)) {
			throw new NotFoundException(__('Invalid facebook post'));
		}
		$options = array('conditions' => array('FacebookPost.' . $this->FacebookPost->primaryKey => $id));
		$this->set('facebookPost', $this->FacebookPost->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookPost->create();
			if ($this->FacebookPost->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook post could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookPost->User->find('list');
		$pages = $this->FacebookPost->Page->find('list');
		$groups = $this->FacebookPost->Group->find('list');
		$events = $this->FacebookPost->Event->find('list');
		$applications = $this->FacebookPost->Application->find('list');
		$photos = $this->FacebookPost->Photo->find('list');
		$videos = $this->FacebookPost->Video->find('list');
		$this->set(compact('users', 'pages', 'groups', 'events', 'applications', 'photos', 'videos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookPost->exists($id)) {
			throw new NotFoundException(__('Invalid facebook post'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookPost->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookPost.' . $this->FacebookPost->primaryKey => $id));
			$this->request->data = $this->FacebookPost->find('first', $options);
		}
		$users = $this->FacebookPost->User->find('list');
		$pages = $this->FacebookPost->Page->find('list');
		$groups = $this->FacebookPost->Group->find('list');
		$events = $this->FacebookPost->Event->find('list');
		$applications = $this->FacebookPost->Application->find('list');
		$photos = $this->FacebookPost->Photo->find('list');
		$videos = $this->FacebookPost->Video->find('list');
		$this->set(compact('users', 'pages', 'groups', 'events', 'applications', 'photos', 'videos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookPost->id = $id;
		if (!$this->FacebookPost->exists()) {
			throw new NotFoundException(__('Invalid facebook post'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookPost->delete()) {
			$this->Session->setFlash(__('The facebook post has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook post could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookPost->recursive = 0;
		$this->set('facebookPosts', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookPost->exists($id)) {
			throw new NotFoundException(__('Invalid facebook post'));
		}
		$options = array('conditions' => array('FacebookPost.' . $this->FacebookPost->primaryKey => $id));
		$this->set('facebookPost', $this->FacebookPost->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookPost->create();
			if ($this->FacebookPost->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook post could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookPost->User->find('list');
		$pages = $this->FacebookPost->Page->find('list');
		$groups = $this->FacebookPost->Group->find('list');
		$events = $this->FacebookPost->Event->find('list');
		$applications = $this->FacebookPost->Application->find('list');
		$photos = $this->FacebookPost->Photo->find('list');
		$videos = $this->FacebookPost->Video->find('list');
		$this->set(compact('users', 'pages', 'groups', 'events', 'applications', 'photos', 'videos'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookPost->exists($id)) {
			throw new NotFoundException(__('Invalid facebook post'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookPost->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookPost.' . $this->FacebookPost->primaryKey => $id));
			$this->request->data = $this->FacebookPost->find('first', $options);
		}
		$users = $this->FacebookPost->User->find('list');
		$pages = $this->FacebookPost->Page->find('list');
		$groups = $this->FacebookPost->Group->find('list');
		$events = $this->FacebookPost->Event->find('list');
		$applications = $this->FacebookPost->Application->find('list');
		$photos = $this->FacebookPost->Photo->find('list');
		$videos = $this->FacebookPost->Video->find('list');
		$this->set(compact('users', 'pages', 'groups', 'events', 'applications', 'photos', 'videos'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookPost->id = $id;
		if (!$this->FacebookPost->exists()) {
			throw new NotFoundException(__('Invalid facebook post'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookPost->delete()) {
			$this->Session->setFlash(__('The facebook post has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook post could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
