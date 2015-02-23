<?php
App::uses('AppController', 'Controller');
/**
 * FacebookUsers Controller
 *
 * @property FacebookUser $FacebookUser
 * @property PaginatorComponent $Paginator
 */
class FacebookUsersController extends AppController {

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
		$this->FacebookUser->recursive = 0;
		$this->set('facebookUsers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookUser->exists($id)) {
			throw new NotFoundException(__('Invalid facebook user'));
		}
		$options = array('conditions' => array('FacebookUser.' . $this->FacebookUser->primaryKey => $id));
		$this->set('facebookUser', $this->FacebookUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookUser->create();
			if ($this->FacebookUser->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook user could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookUser->User->find('list');
		$thirdParties = $this->FacebookUser->ThirdParty->find('list');
		$facebookProjects = $this->FacebookUser->FacebookProject->find('list');
		$facebookAlbums = $this->FacebookUser->FacebookAlbum->find('list');
		$facebookEvents = $this->FacebookUser->FacebookEvent->find('list');
		$facebookGroups = $this->FacebookUser->FacebookGroup->find('list');
		$facebookPhotos = $this->FacebookUser->FacebookPhoto->find('list');
		$facebookVideos = $this->FacebookUser->FacebookVideo->find('list');
		$this->set(compact('users', 'thirdParties', 'facebookProjects', 'facebookAlbums', 'facebookEvents', 'facebookGroups', 'facebookPhotos', 'facebookVideos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookUser->exists($id)) {
			throw new NotFoundException(__('Invalid facebook user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookUser->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookUser.' . $this->FacebookUser->primaryKey => $id));
			$this->request->data = $this->FacebookUser->find('first', $options);
		}
		$users = $this->FacebookUser->User->find('list');
		$thirdParties = $this->FacebookUser->ThirdParty->find('list');
		$facebookProjects = $this->FacebookUser->FacebookProject->find('list');
		$facebookAlbums = $this->FacebookUser->FacebookAlbum->find('list');
		$facebookEvents = $this->FacebookUser->FacebookEvent->find('list');
		$facebookGroups = $this->FacebookUser->FacebookGroup->find('list');
		$facebookPhotos = $this->FacebookUser->FacebookPhoto->find('list');
		$facebookVideos = $this->FacebookUser->FacebookVideo->find('list');
		$this->set(compact('users', 'thirdParties', 'facebookProjects', 'facebookAlbums', 'facebookEvents', 'facebookGroups', 'facebookPhotos', 'facebookVideos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookUser->id = $id;
		if (!$this->FacebookUser->exists()) {
			throw new NotFoundException(__('Invalid facebook user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookUser->delete()) {
			$this->Session->setFlash(__('The facebook user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookUser->recursive = 0;
		$this->set('facebookUsers', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookUser->exists($id)) {
			throw new NotFoundException(__('Invalid facebook user'));
		}
		$options = array('conditions' => array('FacebookUser.' . $this->FacebookUser->primaryKey => $id));
		$this->set('facebookUser', $this->FacebookUser->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookUser->create();
			if ($this->FacebookUser->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook user could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookUser->User->find('list');
		$thirdParties = $this->FacebookUser->ThirdParty->find('list');
		$facebookProjects = $this->FacebookUser->FacebookProject->find('list');
		$facebookAlbums = $this->FacebookUser->FacebookAlbum->find('list');
		$facebookEvents = $this->FacebookUser->FacebookEvent->find('list');
		$facebookGroups = $this->FacebookUser->FacebookGroup->find('list');
		$facebookPhotos = $this->FacebookUser->FacebookPhoto->find('list');
		$facebookVideos = $this->FacebookUser->FacebookVideo->find('list');
		$this->set(compact('users', 'thirdParties', 'facebookProjects', 'facebookAlbums', 'facebookEvents', 'facebookGroups', 'facebookPhotos', 'facebookVideos'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookUser->exists($id)) {
			throw new NotFoundException(__('Invalid facebook user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookUser->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookUser.' . $this->FacebookUser->primaryKey => $id));
			$this->request->data = $this->FacebookUser->find('first', $options);
		}
		$users = $this->FacebookUser->User->find('list');
		$thirdParties = $this->FacebookUser->ThirdParty->find('list');
		$facebookProjects = $this->FacebookUser->FacebookProject->find('list');
		$facebookAlbums = $this->FacebookUser->FacebookAlbum->find('list');
		$facebookEvents = $this->FacebookUser->FacebookEvent->find('list');
		$facebookGroups = $this->FacebookUser->FacebookGroup->find('list');
		$facebookPhotos = $this->FacebookUser->FacebookPhoto->find('list');
		$facebookVideos = $this->FacebookUser->FacebookVideo->find('list');
		$this->set(compact('users', 'thirdParties', 'facebookProjects', 'facebookAlbums', 'facebookEvents', 'facebookGroups', 'facebookPhotos', 'facebookVideos'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookUser->id = $id;
		if (!$this->FacebookUser->exists()) {
			throw new NotFoundException(__('Invalid facebook user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookUser->delete()) {
			$this->Session->setFlash(__('The facebook user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
