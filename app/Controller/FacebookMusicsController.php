<?php
App::uses('AppController', 'Controller');
/**
 * FacebookMusics Controller
 *
 * @property FacebookMusic $FacebookMusic
 * @property PaginatorComponent $Paginator
 */
class FacebookMusicsController extends AppController {

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
		$this->FacebookMusic->recursive = 0;
		$this->set('facebookMusics', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookMusic->exists($id)) {
			throw new NotFoundException(__('Invalid facebook music'));
		}
		$options = array('conditions' => array('FacebookMusic.' . $this->FacebookMusic->primaryKey => $id));
		$this->set('facebookMusic', $this->FacebookMusic->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookMusic->create();
			if ($this->FacebookMusic->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook music has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook music could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookMusic->User->find('list');
		$pages = $this->FacebookMusic->Page->find('list');
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
		if (!$this->FacebookMusic->exists($id)) {
			throw new NotFoundException(__('Invalid facebook music'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookMusic->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook music has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook music could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookMusic.' . $this->FacebookMusic->primaryKey => $id));
			$this->request->data = $this->FacebookMusic->find('first', $options);
		}
		$users = $this->FacebookMusic->User->find('list');
		$pages = $this->FacebookMusic->Page->find('list');
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
		$this->FacebookMusic->id = $id;
		if (!$this->FacebookMusic->exists()) {
			throw new NotFoundException(__('Invalid facebook music'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookMusic->delete()) {
			$this->Session->setFlash(__('The facebook music has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook music could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookMusic->recursive = 0;
		$this->set('facebookMusics', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookMusic->exists($id)) {
			throw new NotFoundException(__('Invalid facebook music'));
		}
		$options = array('conditions' => array('FacebookMusic.' . $this->FacebookMusic->primaryKey => $id));
		$this->set('facebookMusic', $this->FacebookMusic->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookMusic->create();
			if ($this->FacebookMusic->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook music has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook music could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookMusic->User->find('list');
		$pages = $this->FacebookMusic->Page->find('list');
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
		if (!$this->FacebookMusic->exists($id)) {
			throw new NotFoundException(__('Invalid facebook music'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookMusic->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook music has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook music could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookMusic.' . $this->FacebookMusic->primaryKey => $id));
			$this->request->data = $this->FacebookMusic->find('first', $options);
		}
		$users = $this->FacebookMusic->User->find('list');
		$pages = $this->FacebookMusic->Page->find('list');
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
		$this->FacebookMusic->id = $id;
		if (!$this->FacebookMusic->exists()) {
			throw new NotFoundException(__('Invalid facebook music'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookMusic->delete()) {
			$this->Session->setFlash(__('The facebook music has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook music could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
