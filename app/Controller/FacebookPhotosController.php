<?php
App::uses('AppController', 'Controller');
/**
 * FacebookPhotos Controller
 *
 * @property FacebookPhoto $FacebookPhoto
 * @property PaginatorComponent $Paginator
 */
class FacebookPhotosController extends AppController {

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
		$this->FacebookPhoto->recursive = 0;
		$this->set('facebookPhotos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid facebook photo'));
		}
		$options = array('conditions' => array('FacebookPhoto.' . $this->FacebookPhoto->primaryKey => $id));
		$this->set('facebookPhoto', $this->FacebookPhoto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookPhoto->create();
			if ($this->FacebookPhoto->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook photo could not be saved. Please, try again.'));
			}
		}
		$albums = $this->FacebookPhoto->Album->find('list');
		$users = $this->FacebookPhoto->User->find('list');
		$pages = $this->FacebookPhoto->Page->find('list');
		$pageStories = $this->FacebookPhoto->PageStory->find('list');
		$facebookMilestones = $this->FacebookPhoto->FacebookMilestone->find('list');
		$facebookUsers = $this->FacebookPhoto->FacebookUser->find('list');
		$this->set(compact('albums', 'users', 'pages', 'pageStories', 'facebookMilestones', 'facebookUsers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid facebook photo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookPhoto->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook photo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookPhoto.' . $this->FacebookPhoto->primaryKey => $id));
			$this->request->data = $this->FacebookPhoto->find('first', $options);
		}
		$albums = $this->FacebookPhoto->Album->find('list');
		$users = $this->FacebookPhoto->User->find('list');
		$pages = $this->FacebookPhoto->Page->find('list');
		$pageStories = $this->FacebookPhoto->PageStory->find('list');
		$facebookMilestones = $this->FacebookPhoto->FacebookMilestone->find('list');
		$facebookUsers = $this->FacebookPhoto->FacebookUser->find('list');
		$this->set(compact('albums', 'users', 'pages', 'pageStories', 'facebookMilestones', 'facebookUsers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookPhoto->id = $id;
		if (!$this->FacebookPhoto->exists()) {
			throw new NotFoundException(__('Invalid facebook photo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookPhoto->delete()) {
			$this->Session->setFlash(__('The facebook photo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook photo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookPhoto->recursive = 0;
		$this->set('facebookPhotos', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid facebook photo'));
		}
		$options = array('conditions' => array('FacebookPhoto.' . $this->FacebookPhoto->primaryKey => $id));
		$this->set('facebookPhoto', $this->FacebookPhoto->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookPhoto->create();
			if ($this->FacebookPhoto->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook photo could not be saved. Please, try again.'));
			}
		}
		$albums = $this->FacebookPhoto->Album->find('list');
		$users = $this->FacebookPhoto->User->find('list');
		$pages = $this->FacebookPhoto->Page->find('list');
		$pageStories = $this->FacebookPhoto->PageStory->find('list');
		$facebookMilestones = $this->FacebookPhoto->FacebookMilestone->find('list');
		$facebookUsers = $this->FacebookPhoto->FacebookUser->find('list');
		$this->set(compact('albums', 'users', 'pages', 'pageStories', 'facebookMilestones', 'facebookUsers'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid facebook photo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookPhoto->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook photo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook photo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookPhoto.' . $this->FacebookPhoto->primaryKey => $id));
			$this->request->data = $this->FacebookPhoto->find('first', $options);
		}
		$albums = $this->FacebookPhoto->Album->find('list');
		$users = $this->FacebookPhoto->User->find('list');
		$pages = $this->FacebookPhoto->Page->find('list');
		$pageStories = $this->FacebookPhoto->PageStory->find('list');
		$facebookMilestones = $this->FacebookPhoto->FacebookMilestone->find('list');
		$facebookUsers = $this->FacebookPhoto->FacebookUser->find('list');
		$this->set(compact('albums', 'users', 'pages', 'pageStories', 'facebookMilestones', 'facebookUsers'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookPhoto->id = $id;
		if (!$this->FacebookPhoto->exists()) {
			throw new NotFoundException(__('Invalid facebook photo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookPhoto->delete()) {
			$this->Session->setFlash(__('The facebook photo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook photo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
