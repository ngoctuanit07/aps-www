<?php
App::uses('AppController', 'Controller');
/**
 * FacebookSharedposts Controller
 *
 * @property FacebookSharedpost $FacebookSharedpost
 * @property PaginatorComponent $Paginator
 */
class FacebookSharedpostsController extends AppController {

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
		$this->FacebookSharedpost->recursive = 0;
		$this->set('facebookSharedposts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookSharedpost->exists($id)) {
			throw new NotFoundException(__('Invalid facebook sharedpost'));
		}
		$options = array('conditions' => array('FacebookSharedpost.' . $this->FacebookSharedpost->primaryKey => $id));
		$this->set('facebookSharedpost', $this->FacebookSharedpost->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookSharedpost->create();
			if ($this->FacebookSharedpost->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook sharedpost has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook sharedpost could not be saved. Please, try again.'));
			}
		}
		$albums = $this->FacebookSharedpost->Album->find('list');
		$videos = $this->FacebookSharedpost->Video->find('list');
		$statuses = $this->FacebookSharedpost->Status->find('list');
		$posts = $this->FacebookSharedpost->Post->find('list');
		$this->set(compact('albums', 'videos', 'statuses', 'posts'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookSharedpost->exists($id)) {
			throw new NotFoundException(__('Invalid facebook sharedpost'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookSharedpost->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook sharedpost has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook sharedpost could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookSharedpost.' . $this->FacebookSharedpost->primaryKey => $id));
			$this->request->data = $this->FacebookSharedpost->find('first', $options);
		}
		$albums = $this->FacebookSharedpost->Album->find('list');
		$videos = $this->FacebookSharedpost->Video->find('list');
		$statuses = $this->FacebookSharedpost->Status->find('list');
		$posts = $this->FacebookSharedpost->Post->find('list');
		$this->set(compact('albums', 'videos', 'statuses', 'posts'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookSharedpost->id = $id;
		if (!$this->FacebookSharedpost->exists()) {
			throw new NotFoundException(__('Invalid facebook sharedpost'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookSharedpost->delete()) {
			$this->Session->setFlash(__('The facebook sharedpost has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook sharedpost could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookSharedpost->recursive = 0;
		$this->set('facebookSharedposts', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookSharedpost->exists($id)) {
			throw new NotFoundException(__('Invalid facebook sharedpost'));
		}
		$options = array('conditions' => array('FacebookSharedpost.' . $this->FacebookSharedpost->primaryKey => $id));
		$this->set('facebookSharedpost', $this->FacebookSharedpost->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookSharedpost->create();
			if ($this->FacebookSharedpost->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook sharedpost has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook sharedpost could not be saved. Please, try again.'));
			}
		}
		$albums = $this->FacebookSharedpost->Album->find('list');
		$videos = $this->FacebookSharedpost->Video->find('list');
		$statuses = $this->FacebookSharedpost->Status->find('list');
		$posts = $this->FacebookSharedpost->Post->find('list');
		$this->set(compact('albums', 'videos', 'statuses', 'posts'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookSharedpost->exists($id)) {
			throw new NotFoundException(__('Invalid facebook sharedpost'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookSharedpost->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook sharedpost has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook sharedpost could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookSharedpost.' . $this->FacebookSharedpost->primaryKey => $id));
			$this->request->data = $this->FacebookSharedpost->find('first', $options);
		}
		$albums = $this->FacebookSharedpost->Album->find('list');
		$videos = $this->FacebookSharedpost->Video->find('list');
		$statuses = $this->FacebookSharedpost->Status->find('list');
		$posts = $this->FacebookSharedpost->Post->find('list');
		$this->set(compact('albums', 'videos', 'statuses', 'posts'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookSharedpost->id = $id;
		if (!$this->FacebookSharedpost->exists()) {
			throw new NotFoundException(__('Invalid facebook sharedpost'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookSharedpost->delete()) {
			$this->Session->setFlash(__('The facebook sharedpost has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook sharedpost could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
