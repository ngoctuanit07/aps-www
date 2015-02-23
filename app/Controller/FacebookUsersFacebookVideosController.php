<?php
App::uses('AppController', 'Controller');
/**
 * FacebookUsersFacebookVideos Controller
 *
 * @property FacebookUsersFacebookVideo $FacebookUsersFacebookVideo
 * @property PaginatorComponent $Paginator
 */
class FacebookUsersFacebookVideosController extends AppController {

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
		$this->FacebookUsersFacebookVideo->recursive = 0;
		$this->set('facebookUsersFacebookVideos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookUsersFacebookVideo->exists($id)) {
			throw new NotFoundException(__('Invalid facebook users facebook video'));
		}
		$options = array('conditions' => array('FacebookUsersFacebookVideo.' . $this->FacebookUsersFacebookVideo->primaryKey => $id));
		$this->set('facebookUsersFacebookVideo', $this->FacebookUsersFacebookVideo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookUsersFacebookVideo->create();
			if ($this->FacebookUsersFacebookVideo->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook users facebook video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook users facebook video could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookUsersFacebookVideo->User->find('list');
		$videos = $this->FacebookUsersFacebookVideo->Video->find('list');
		$this->set(compact('users', 'videos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookUsersFacebookVideo->exists($id)) {
			throw new NotFoundException(__('Invalid facebook users facebook video'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookUsersFacebookVideo->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook users facebook video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook users facebook video could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookUsersFacebookVideo.' . $this->FacebookUsersFacebookVideo->primaryKey => $id));
			$this->request->data = $this->FacebookUsersFacebookVideo->find('first', $options);
		}
		$users = $this->FacebookUsersFacebookVideo->User->find('list');
		$videos = $this->FacebookUsersFacebookVideo->Video->find('list');
		$this->set(compact('users', 'videos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookUsersFacebookVideo->id = $id;
		if (!$this->FacebookUsersFacebookVideo->exists()) {
			throw new NotFoundException(__('Invalid facebook users facebook video'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookUsersFacebookVideo->delete()) {
			$this->Session->setFlash(__('The facebook users facebook video has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook users facebook video could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookUsersFacebookVideo->recursive = 0;
		$this->set('facebookUsersFacebookVideos', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookUsersFacebookVideo->exists($id)) {
			throw new NotFoundException(__('Invalid facebook users facebook video'));
		}
		$options = array('conditions' => array('FacebookUsersFacebookVideo.' . $this->FacebookUsersFacebookVideo->primaryKey => $id));
		$this->set('facebookUsersFacebookVideo', $this->FacebookUsersFacebookVideo->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookUsersFacebookVideo->create();
			if ($this->FacebookUsersFacebookVideo->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook users facebook video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook users facebook video could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookUsersFacebookVideo->User->find('list');
		$videos = $this->FacebookUsersFacebookVideo->Video->find('list');
		$this->set(compact('users', 'videos'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookUsersFacebookVideo->exists($id)) {
			throw new NotFoundException(__('Invalid facebook users facebook video'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookUsersFacebookVideo->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook users facebook video has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook users facebook video could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookUsersFacebookVideo.' . $this->FacebookUsersFacebookVideo->primaryKey => $id));
			$this->request->data = $this->FacebookUsersFacebookVideo->find('first', $options);
		}
		$users = $this->FacebookUsersFacebookVideo->User->find('list');
		$videos = $this->FacebookUsersFacebookVideo->Video->find('list');
		$this->set(compact('users', 'videos'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookUsersFacebookVideo->id = $id;
		if (!$this->FacebookUsersFacebookVideo->exists()) {
			throw new NotFoundException(__('Invalid facebook users facebook video'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookUsersFacebookVideo->delete()) {
			$this->Session->setFlash(__('The facebook users facebook video has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook users facebook video could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
