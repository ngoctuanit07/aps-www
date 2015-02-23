<?php
App::uses('AppController', 'Controller');
/**
 * FacebookVideos Controller
 *
 * @property FacebookVideo $FacebookVideo
 * @property PaginatorComponent $Paginator
 */
class FacebookVideosController extends AppController {

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
		$this->FacebookVideo->recursive = 0;
		$this->set('facebookVideos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookVideo->exists($id)) {
			throw new NotFoundException(__('Invalid facebook video'));
		}
		$options = array('conditions' => array('FacebookVideo.' . $this->FacebookVideo->primaryKey => $id));
		$this->set('facebookVideo', $this->FacebookVideo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookVideo->create();
			if ($this->FacebookVideo->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook video could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookVideo->User->find('list');
		$pages = $this->FacebookVideo->Page->find('list');
		$groups = $this->FacebookVideo->Group->find('list');
		$events = $this->FacebookVideo->Event->find('list');
		$applications = $this->FacebookVideo->Application->find('list');
		$facebookUsers = $this->FacebookVideo->FacebookUser->find('list');
		$this->set(compact('users', 'pages', 'groups', 'events', 'applications', 'facebookUsers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookVideo->exists($id)) {
			throw new NotFoundException(__('Invalid facebook video'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookVideo->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook video could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookVideo.' . $this->FacebookVideo->primaryKey => $id));
			$this->request->data = $this->FacebookVideo->find('first', $options);
		}
		$users = $this->FacebookVideo->User->find('list');
		$pages = $this->FacebookVideo->Page->find('list');
		$groups = $this->FacebookVideo->Group->find('list');
		$events = $this->FacebookVideo->Event->find('list');
		$applications = $this->FacebookVideo->Application->find('list');
		$facebookUsers = $this->FacebookVideo->FacebookUser->find('list');
		$this->set(compact('users', 'pages', 'groups', 'events', 'applications', 'facebookUsers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookVideo->id = $id;
		if (!$this->FacebookVideo->exists()) {
			throw new NotFoundException(__('Invalid facebook video'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookVideo->delete()) {
			$this->Session->setFlash(__('The facebook video has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook video could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookVideo->recursive = 0;
		$this->set('facebookVideos', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookVideo->exists($id)) {
			throw new NotFoundException(__('Invalid facebook video'));
		}
		$options = array('conditions' => array('FacebookVideo.' . $this->FacebookVideo->primaryKey => $id));
		$this->set('facebookVideo', $this->FacebookVideo->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookVideo->create();
			if ($this->FacebookVideo->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook video could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookVideo->User->find('list');
		$pages = $this->FacebookVideo->Page->find('list');
		$groups = $this->FacebookVideo->Group->find('list');
		$events = $this->FacebookVideo->Event->find('list');
		$applications = $this->FacebookVideo->Application->find('list');
		$facebookUsers = $this->FacebookVideo->FacebookUser->find('list');
		$this->set(compact('users', 'pages', 'groups', 'events', 'applications', 'facebookUsers'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookVideo->exists($id)) {
			throw new NotFoundException(__('Invalid facebook video'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookVideo->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook video could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookVideo.' . $this->FacebookVideo->primaryKey => $id));
			$this->request->data = $this->FacebookVideo->find('first', $options);
		}
		$users = $this->FacebookVideo->User->find('list');
		$pages = $this->FacebookVideo->Page->find('list');
		$groups = $this->FacebookVideo->Group->find('list');
		$events = $this->FacebookVideo->Event->find('list');
		$applications = $this->FacebookVideo->Application->find('list');
		$facebookUsers = $this->FacebookVideo->FacebookUser->find('list');
		$this->set(compact('users', 'pages', 'groups', 'events', 'applications', 'facebookUsers'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookVideo->id = $id;
		if (!$this->FacebookVideo->exists()) {
			throw new NotFoundException(__('Invalid facebook video'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookVideo->delete()) {
			$this->Session->setFlash(__('The facebook video has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook video could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
