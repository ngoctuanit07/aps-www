<?php
App::uses('AppController', 'Controller');
/**
 * FacebookUsersFacebookAlbums Controller
 *
 * @property FacebookUsersFacebookAlbum $FacebookUsersFacebookAlbum
 * @property PaginatorComponent $Paginator
 */
class FacebookUsersFacebookAlbumsController extends AppController {

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
		$this->FacebookUsersFacebookAlbum->recursive = 0;
		$this->set('facebookUsersFacebookAlbums', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookUsersFacebookAlbum->exists($id)) {
			throw new NotFoundException(__('Invalid facebook users facebook album'));
		}
		$options = array('conditions' => array('FacebookUsersFacebookAlbum.' . $this->FacebookUsersFacebookAlbum->primaryKey => $id));
		$this->set('facebookUsersFacebookAlbum', $this->FacebookUsersFacebookAlbum->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookUsersFacebookAlbum->create();
			if ($this->FacebookUsersFacebookAlbum->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook users facebook album has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook users facebook album could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookUsersFacebookAlbum->exists($id)) {
			throw new NotFoundException(__('Invalid facebook users facebook album'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookUsersFacebookAlbum->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook users facebook album has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook users facebook album could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookUsersFacebookAlbum.' . $this->FacebookUsersFacebookAlbum->primaryKey => $id));
			$this->request->data = $this->FacebookUsersFacebookAlbum->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookUsersFacebookAlbum->id = $id;
		if (!$this->FacebookUsersFacebookAlbum->exists()) {
			throw new NotFoundException(__('Invalid facebook users facebook album'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookUsersFacebookAlbum->delete()) {
			$this->Session->setFlash(__('The facebook users facebook album has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook users facebook album could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookUsersFacebookAlbum->recursive = 0;
		$this->set('facebookUsersFacebookAlbums', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookUsersFacebookAlbum->exists($id)) {
			throw new NotFoundException(__('Invalid facebook users facebook album'));
		}
		$options = array('conditions' => array('FacebookUsersFacebookAlbum.' . $this->FacebookUsersFacebookAlbum->primaryKey => $id));
		$this->set('facebookUsersFacebookAlbum', $this->FacebookUsersFacebookAlbum->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookUsersFacebookAlbum->create();
			if ($this->FacebookUsersFacebookAlbum->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook users facebook album has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook users facebook album could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookUsersFacebookAlbum->exists($id)) {
			throw new NotFoundException(__('Invalid facebook users facebook album'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookUsersFacebookAlbum->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook users facebook album has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook users facebook album could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookUsersFacebookAlbum.' . $this->FacebookUsersFacebookAlbum->primaryKey => $id));
			$this->request->data = $this->FacebookUsersFacebookAlbum->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookUsersFacebookAlbum->id = $id;
		if (!$this->FacebookUsersFacebookAlbum->exists()) {
			throw new NotFoundException(__('Invalid facebook users facebook album'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookUsersFacebookAlbum->delete()) {
			$this->Session->setFlash(__('The facebook users facebook album has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook users facebook album could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
