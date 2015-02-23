<?php
App::uses('AppController', 'Controller');
/**
 * FacebookEducations Controller
 *
 * @property FacebookEducation $FacebookEducation
 * @property PaginatorComponent $Paginator
 */
class FacebookEducationsController extends AppController {

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
		$this->FacebookEducation->recursive = 0;
		$this->set('facebookEducations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookEducation->exists($id)) {
			throw new NotFoundException(__('Invalid facebook education'));
		}
		$options = array('conditions' => array('FacebookEducation.' . $this->FacebookEducation->primaryKey => $id));
		$this->set('facebookEducation', $this->FacebookEducation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookEducation->create();
			if ($this->FacebookEducation->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook education has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook education could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookEducation->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookEducation->exists($id)) {
			throw new NotFoundException(__('Invalid facebook education'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookEducation->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook education has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook education could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookEducation.' . $this->FacebookEducation->primaryKey => $id));
			$this->request->data = $this->FacebookEducation->find('first', $options);
		}
		$users = $this->FacebookEducation->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookEducation->id = $id;
		if (!$this->FacebookEducation->exists()) {
			throw new NotFoundException(__('Invalid facebook education'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookEducation->delete()) {
			$this->Session->setFlash(__('The facebook education has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook education could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookEducation->recursive = 0;
		$this->set('facebookEducations', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookEducation->exists($id)) {
			throw new NotFoundException(__('Invalid facebook education'));
		}
		$options = array('conditions' => array('FacebookEducation.' . $this->FacebookEducation->primaryKey => $id));
		$this->set('facebookEducation', $this->FacebookEducation->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookEducation->create();
			if ($this->FacebookEducation->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook education has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook education could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookEducation->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookEducation->exists($id)) {
			throw new NotFoundException(__('Invalid facebook education'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookEducation->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook education has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook education could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookEducation.' . $this->FacebookEducation->primaryKey => $id));
			$this->request->data = $this->FacebookEducation->find('first', $options);
		}
		$users = $this->FacebookEducation->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookEducation->id = $id;
		if (!$this->FacebookEducation->exists()) {
			throw new NotFoundException(__('Invalid facebook education'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookEducation->delete()) {
			$this->Session->setFlash(__('The facebook education has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook education could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
