<?php
App::uses('AppController', 'Controller');
/**
 * FacebookPostsWithTags Controller
 *
 * @property FacebookPostsWithTag $FacebookPostsWithTag
 * @property PaginatorComponent $Paginator
 */
class FacebookPostsWithTagsController extends AppController {

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
		$this->FacebookPostsWithTag->recursive = 0;
		$this->set('facebookPostsWithTags', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookPostsWithTag->exists($id)) {
			throw new NotFoundException(__('Invalid facebook posts with tag'));
		}
		$options = array('conditions' => array('FacebookPostsWithTag.' . $this->FacebookPostsWithTag->primaryKey => $id));
		$this->set('facebookPostsWithTag', $this->FacebookPostsWithTag->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookPostsWithTag->create();
			if ($this->FacebookPostsWithTag->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook posts with tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook posts with tag could not be saved. Please, try again.'));
			}
		}
		$posts = $this->FacebookPostsWithTag->Post->find('list');
		$users = $this->FacebookPostsWithTag->User->find('list');
		$pages = $this->FacebookPostsWithTag->Page->find('list');
		$groups = $this->FacebookPostsWithTag->Group->find('list');
		$events = $this->FacebookPostsWithTag->Event->find('list');
		$applications = $this->FacebookPostsWithTag->Application->find('list');
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
		if (!$this->FacebookPostsWithTag->exists($id)) {
			throw new NotFoundException(__('Invalid facebook posts with tag'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookPostsWithTag->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook posts with tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook posts with tag could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookPostsWithTag.' . $this->FacebookPostsWithTag->primaryKey => $id));
			$this->request->data = $this->FacebookPostsWithTag->find('first', $options);
		}
		$posts = $this->FacebookPostsWithTag->Post->find('list');
		$users = $this->FacebookPostsWithTag->User->find('list');
		$pages = $this->FacebookPostsWithTag->Page->find('list');
		$groups = $this->FacebookPostsWithTag->Group->find('list');
		$events = $this->FacebookPostsWithTag->Event->find('list');
		$applications = $this->FacebookPostsWithTag->Application->find('list');
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
		$this->FacebookPostsWithTag->id = $id;
		if (!$this->FacebookPostsWithTag->exists()) {
			throw new NotFoundException(__('Invalid facebook posts with tag'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookPostsWithTag->delete()) {
			$this->Session->setFlash(__('The facebook posts with tag has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook posts with tag could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookPostsWithTag->recursive = 0;
		$this->set('facebookPostsWithTags', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookPostsWithTag->exists($id)) {
			throw new NotFoundException(__('Invalid facebook posts with tag'));
		}
		$options = array('conditions' => array('FacebookPostsWithTag.' . $this->FacebookPostsWithTag->primaryKey => $id));
		$this->set('facebookPostsWithTag', $this->FacebookPostsWithTag->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookPostsWithTag->create();
			if ($this->FacebookPostsWithTag->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook posts with tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook posts with tag could not be saved. Please, try again.'));
			}
		}
		$posts = $this->FacebookPostsWithTag->Post->find('list');
		$users = $this->FacebookPostsWithTag->User->find('list');
		$pages = $this->FacebookPostsWithTag->Page->find('list');
		$groups = $this->FacebookPostsWithTag->Group->find('list');
		$events = $this->FacebookPostsWithTag->Event->find('list');
		$applications = $this->FacebookPostsWithTag->Application->find('list');
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
		if (!$this->FacebookPostsWithTag->exists($id)) {
			throw new NotFoundException(__('Invalid facebook posts with tag'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookPostsWithTag->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook posts with tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook posts with tag could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookPostsWithTag.' . $this->FacebookPostsWithTag->primaryKey => $id));
			$this->request->data = $this->FacebookPostsWithTag->find('first', $options);
		}
		$posts = $this->FacebookPostsWithTag->Post->find('list');
		$users = $this->FacebookPostsWithTag->User->find('list');
		$pages = $this->FacebookPostsWithTag->Page->find('list');
		$groups = $this->FacebookPostsWithTag->Group->find('list');
		$events = $this->FacebookPostsWithTag->Event->find('list');
		$applications = $this->FacebookPostsWithTag->Application->find('list');
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
		$this->FacebookPostsWithTag->id = $id;
		if (!$this->FacebookPostsWithTag->exists()) {
			throw new NotFoundException(__('Invalid facebook posts with tag'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookPostsWithTag->delete()) {
			$this->Session->setFlash(__('The facebook posts with tag has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook posts with tag could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
