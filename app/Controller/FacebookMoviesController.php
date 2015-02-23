<?php
App::uses('AppController', 'Controller');
/**
 * FacebookMovies Controller
 *
 * @property FacebookMovie $FacebookMovie
 * @property PaginatorComponent $Paginator
 */
class FacebookMoviesController extends AppController {

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
		$this->FacebookMovie->recursive = 0;
		$this->set('facebookMovies', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookMovie->exists($id)) {
			throw new NotFoundException(__('Invalid facebook movie'));
		}
		$options = array('conditions' => array('FacebookMovie.' . $this->FacebookMovie->primaryKey => $id));
		$this->set('facebookMovie', $this->FacebookMovie->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookMovie->create();
			if ($this->FacebookMovie->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook movie has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook movie could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookMovie->User->find('list');
		$pages = $this->FacebookMovie->Page->find('list');
		$this->set(compact('users', 'pages'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookMovie->exists($id)) {
			throw new NotFoundException(__('Invalid facebook movie'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookMovie->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook movie has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook movie could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookMovie.' . $this->FacebookMovie->primaryKey => $id));
			$this->request->data = $this->FacebookMovie->find('first', $options);
		}
		$users = $this->FacebookMovie->User->find('list');
		$pages = $this->FacebookMovie->Page->find('list');
		$this->set(compact('users', 'pages'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookMovie->id = $id;
		if (!$this->FacebookMovie->exists()) {
			throw new NotFoundException(__('Invalid facebook movie'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookMovie->delete()) {
			$this->Session->setFlash(__('The facebook movie has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook movie could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookMovie->recursive = 0;
		$this->set('facebookMovies', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookMovie->exists($id)) {
			throw new NotFoundException(__('Invalid facebook movie'));
		}
		$options = array('conditions' => array('FacebookMovie.' . $this->FacebookMovie->primaryKey => $id));
		$this->set('facebookMovie', $this->FacebookMovie->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookMovie->create();
			if ($this->FacebookMovie->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook movie has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook movie could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookMovie->User->find('list');
		$pages = $this->FacebookMovie->Page->find('list');
		$this->set(compact('users', 'pages'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookMovie->exists($id)) {
			throw new NotFoundException(__('Invalid facebook movie'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookMovie->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook movie has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook movie could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookMovie.' . $this->FacebookMovie->primaryKey => $id));
			$this->request->data = $this->FacebookMovie->find('first', $options);
		}
		$users = $this->FacebookMovie->User->find('list');
		$pages = $this->FacebookMovie->Page->find('list');
		$this->set(compact('users', 'pages'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookMovie->id = $id;
		if (!$this->FacebookMovie->exists()) {
			throw new NotFoundException(__('Invalid facebook movie'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookMovie->delete()) {
			$this->Session->setFlash(__('The facebook movie has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook movie could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
