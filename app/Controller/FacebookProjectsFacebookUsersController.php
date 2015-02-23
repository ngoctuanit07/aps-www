<?php
App::uses('AppController', 'Controller');
/**
 * FacebookProjectsFacebookUsers Controller
 *
 * @property FacebookProjectsFacebookUser $FacebookProjectsFacebookUser
 * @property PaginatorComponent $Paginator
 */
class FacebookProjectsFacebookUsersController extends AppController {

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
		$this->FacebookProjectsFacebookUser->recursive = 0;
		$this->set('facebookProjectsFacebookUsers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookProjectsFacebookUser->exists($id)) {
			throw new NotFoundException(__('Invalid facebook projects facebook user'));
		}
		$options = array('conditions' => array('FacebookProjectsFacebookUser.' . $this->FacebookProjectsFacebookUser->primaryKey => $id));
		$this->set('facebookProjectsFacebookUser', $this->FacebookProjectsFacebookUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookProjectsFacebookUser->create();
			if ($this->FacebookProjectsFacebookUser->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook projects facebook user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook projects facebook user could not be saved. Please, try again.'));
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
		if (!$this->FacebookProjectsFacebookUser->exists($id)) {
			throw new NotFoundException(__('Invalid facebook projects facebook user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookProjectsFacebookUser->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook projects facebook user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook projects facebook user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookProjectsFacebookUser.' . $this->FacebookProjectsFacebookUser->primaryKey => $id));
			$this->request->data = $this->FacebookProjectsFacebookUser->find('first', $options);
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
		$this->FacebookProjectsFacebookUser->id = $id;
		if (!$this->FacebookProjectsFacebookUser->exists()) {
			throw new NotFoundException(__('Invalid facebook projects facebook user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookProjectsFacebookUser->delete()) {
			$this->Session->setFlash(__('The facebook projects facebook user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook projects facebook user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookProjectsFacebookUser->recursive = 0;
		$this->set('facebookProjectsFacebookUsers', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookProjectsFacebookUser->exists($id)) {
			throw new NotFoundException(__('Invalid facebook projects facebook user'));
		}
		$options = array('conditions' => array('FacebookProjectsFacebookUser.' . $this->FacebookProjectsFacebookUser->primaryKey => $id));
		$this->set('facebookProjectsFacebookUser', $this->FacebookProjectsFacebookUser->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookProjectsFacebookUser->create();
			if ($this->FacebookProjectsFacebookUser->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook projects facebook user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook projects facebook user could not be saved. Please, try again.'));
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
		if (!$this->FacebookProjectsFacebookUser->exists($id)) {
			throw new NotFoundException(__('Invalid facebook projects facebook user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookProjectsFacebookUser->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook projects facebook user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook projects facebook user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookProjectsFacebookUser.' . $this->FacebookProjectsFacebookUser->primaryKey => $id));
			$this->request->data = $this->FacebookProjectsFacebookUser->find('first', $options);
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
		$this->FacebookProjectsFacebookUser->id = $id;
		if (!$this->FacebookProjectsFacebookUser->exists()) {
			throw new NotFoundException(__('Invalid facebook projects facebook user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookProjectsFacebookUser->delete()) {
			$this->Session->setFlash(__('The facebook projects facebook user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook projects facebook user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
