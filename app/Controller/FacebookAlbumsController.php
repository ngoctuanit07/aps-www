<?php
App::uses('AppController', 'Controller');
/**
 * FacebookAlbums Controller
 *
 * @property FacebookAlbum $FacebookAlbum
 * @property PaginatorComponent $Paginator
 */
class FacebookAlbumsController extends AppController {

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
		$this->FacebookAlbum->recursive = 0;
		$this->set('facebookAlbums', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookAlbum->exists($id)) {
			throw new NotFoundException(__('Invalid facebook album'));
		}
		$options = array('conditions' => array('FacebookAlbum.' . $this->FacebookAlbum->primaryKey => $id));
		$this->set('facebookAlbum', $this->FacebookAlbum->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookAlbum->create();
			if ($this->FacebookAlbum->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook album has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook album could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookAlbum->User->find('list');
		$facebookUsers = $this->FacebookAlbum->FacebookUser->find('list');
		$this->set(compact('users', 'facebookUsers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookAlbum->exists($id)) {
			throw new NotFoundException(__('Invalid facebook album'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookAlbum->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook album has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook album could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookAlbum.' . $this->FacebookAlbum->primaryKey => $id));
			$this->request->data = $this->FacebookAlbum->find('first', $options);
		}
		$users = $this->FacebookAlbum->User->find('list');
		$facebookUsers = $this->FacebookAlbum->FacebookUser->find('list');
		$this->set(compact('users', 'facebookUsers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookAlbum->id = $id;
		if (!$this->FacebookAlbum->exists()) {
			throw new NotFoundException(__('Invalid facebook album'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookAlbum->delete()) {
			$this->Session->setFlash(__('The facebook album has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook album could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookAlbum->recursive = 0;
		$this->set('facebookAlbums', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookAlbum->exists($id)) {
			throw new NotFoundException(__('Invalid facebook album'));
		}
		$options = array('conditions' => array('FacebookAlbum.' . $this->FacebookAlbum->primaryKey => $id));
		$this->set('facebookAlbum', $this->FacebookAlbum->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookAlbum->create();
			if ($this->FacebookAlbum->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook album has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook album could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookAlbum->User->find('list');
		$facebookUsers = $this->FacebookAlbum->FacebookUser->find('list');
		$this->set(compact('users', 'facebookUsers'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookAlbum->exists($id)) {
			throw new NotFoundException(__('Invalid facebook album'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookAlbum->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook album has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook album could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookAlbum.' . $this->FacebookAlbum->primaryKey => $id));
			$this->request->data = $this->FacebookAlbum->find('first', $options);
		}
		$users = $this->FacebookAlbum->User->find('list');
		$facebookUsers = $this->FacebookAlbum->FacebookUser->find('list');
		$this->set(compact('users', 'facebookUsers'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookAlbum->id = $id;
		if (!$this->FacebookAlbum->exists()) {
			throw new NotFoundException(__('Invalid facebook album'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookAlbum->delete()) {
			$this->Session->setFlash(__('The facebook album has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook album could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
