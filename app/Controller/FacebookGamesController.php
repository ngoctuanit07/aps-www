<?php
App::uses('AppController', 'Controller');
/**
 * FacebookGames Controller
 *
 * @property FacebookGame $FacebookGame
 * @property PaginatorComponent $Paginator
 */
class FacebookGamesController extends AppController {

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
		$this->FacebookGame->recursive = 0;
		$this->set('facebookGames', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookGame->exists($id)) {
			throw new NotFoundException(__('Invalid facebook game'));
		}
		$options = array('conditions' => array('FacebookGame.' . $this->FacebookGame->primaryKey => $id));
		$this->set('facebookGame', $this->FacebookGame->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookGame->create();
			if ($this->FacebookGame->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook game has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook game could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookGame->User->find('list');
		$pages = $this->FacebookGame->Page->find('list');
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
		if (!$this->FacebookGame->exists($id)) {
			throw new NotFoundException(__('Invalid facebook game'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookGame->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook game has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook game could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookGame.' . $this->FacebookGame->primaryKey => $id));
			$this->request->data = $this->FacebookGame->find('first', $options);
		}
		$users = $this->FacebookGame->User->find('list');
		$pages = $this->FacebookGame->Page->find('list');
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
		$this->FacebookGame->id = $id;
		if (!$this->FacebookGame->exists()) {
			throw new NotFoundException(__('Invalid facebook game'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookGame->delete()) {
			$this->Session->setFlash(__('The facebook game has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook game could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookGame->recursive = 0;
		$this->set('facebookGames', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookGame->exists($id)) {
			throw new NotFoundException(__('Invalid facebook game'));
		}
		$options = array('conditions' => array('FacebookGame.' . $this->FacebookGame->primaryKey => $id));
		$this->set('facebookGame', $this->FacebookGame->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookGame->create();
			if ($this->FacebookGame->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook game has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook game could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookGame->User->find('list');
		$pages = $this->FacebookGame->Page->find('list');
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
		if (!$this->FacebookGame->exists($id)) {
			throw new NotFoundException(__('Invalid facebook game'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookGame->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook game has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook game could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookGame.' . $this->FacebookGame->primaryKey => $id));
			$this->request->data = $this->FacebookGame->find('first', $options);
		}
		$users = $this->FacebookGame->User->find('list');
		$pages = $this->FacebookGame->Page->find('list');
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
		$this->FacebookGame->id = $id;
		if (!$this->FacebookGame->exists()) {
			throw new NotFoundException(__('Invalid facebook game'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookGame->delete()) {
			$this->Session->setFlash(__('The facebook game has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook game could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
