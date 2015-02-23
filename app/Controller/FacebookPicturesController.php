<?php
App::uses('AppController', 'Controller');
/**
 * FacebookPictures Controller
 *
 * @property FacebookPicture $FacebookPicture
 * @property PaginatorComponent $Paginator
 */
class FacebookPicturesController extends AppController {

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
		$this->FacebookPicture->recursive = 0;
		$this->set('facebookPictures', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookPicture->exists($id)) {
			throw new NotFoundException(__('Invalid facebook picture'));
		}
		$options = array('conditions' => array('FacebookPicture.' . $this->FacebookPicture->primaryKey => $id));
		$this->set('facebookPicture', $this->FacebookPicture->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookPicture->create();
			if ($this->FacebookPicture->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook picture has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook picture could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookPicture->User->find('list');
		$events = $this->FacebookPicture->Event->find('list');
		$albums = $this->FacebookPicture->Album->find('list');
		$pages = $this->FacebookPicture->Page->find('list');
		$this->set(compact('users', 'events', 'albums', 'pages'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookPicture->exists($id)) {
			throw new NotFoundException(__('Invalid facebook picture'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookPicture->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook picture has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook picture could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookPicture.' . $this->FacebookPicture->primaryKey => $id));
			$this->request->data = $this->FacebookPicture->find('first', $options);
		}
		$users = $this->FacebookPicture->User->find('list');
		$events = $this->FacebookPicture->Event->find('list');
		$albums = $this->FacebookPicture->Album->find('list');
		$pages = $this->FacebookPicture->Page->find('list');
		$this->set(compact('users', 'events', 'albums', 'pages'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookPicture->id = $id;
		if (!$this->FacebookPicture->exists()) {
			throw new NotFoundException(__('Invalid facebook picture'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookPicture->delete()) {
			$this->Session->setFlash(__('The facebook picture has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook picture could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookPicture->recursive = 0;
		$this->set('facebookPictures', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookPicture->exists($id)) {
			throw new NotFoundException(__('Invalid facebook picture'));
		}
		$options = array('conditions' => array('FacebookPicture.' . $this->FacebookPicture->primaryKey => $id));
		$this->set('facebookPicture', $this->FacebookPicture->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookPicture->create();
			if ($this->FacebookPicture->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook picture has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook picture could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookPicture->User->find('list');
		$events = $this->FacebookPicture->Event->find('list');
		$albums = $this->FacebookPicture->Album->find('list');
		$pages = $this->FacebookPicture->Page->find('list');
		$this->set(compact('users', 'events', 'albums', 'pages'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookPicture->exists($id)) {
			throw new NotFoundException(__('Invalid facebook picture'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookPicture->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook picture has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook picture could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookPicture.' . $this->FacebookPicture->primaryKey => $id));
			$this->request->data = $this->FacebookPicture->find('first', $options);
		}
		$users = $this->FacebookPicture->User->find('list');
		$events = $this->FacebookPicture->Event->find('list');
		$albums = $this->FacebookPicture->Album->find('list');
		$pages = $this->FacebookPicture->Page->find('list');
		$this->set(compact('users', 'events', 'albums', 'pages'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookPicture->id = $id;
		if (!$this->FacebookPicture->exists()) {
			throw new NotFoundException(__('Invalid facebook picture'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookPicture->delete()) {
			$this->Session->setFlash(__('The facebook picture has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook picture could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
