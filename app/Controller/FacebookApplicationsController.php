<?php
App::uses('AppController', 'Controller');
/**
 * FacebookApplications Controller
 *
 * @property FacebookApplication $FacebookApplication
 * @property PaginatorComponent $Paginator
 */
class FacebookApplicationsController extends AppController {

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
		$this->FacebookApplication->recursive = 0;
		$this->set('facebookApplications', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookApplication->exists($id)) {
			throw new NotFoundException(__('Invalid facebook application'));
		}
		$options = array('conditions' => array('FacebookApplication.' . $this->FacebookApplication->primaryKey => $id));
		$this->set('facebookApplication', $this->FacebookApplication->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookApplication->create();
			if ($this->FacebookApplication->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook application has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook application could not be saved. Please, try again.'));
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
		if (!$this->FacebookApplication->exists($id)) {
			throw new NotFoundException(__('Invalid facebook application'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookApplication->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook application has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook application could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookApplication.' . $this->FacebookApplication->primaryKey => $id));
			$this->request->data = $this->FacebookApplication->find('first', $options);
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
		$this->FacebookApplication->id = $id;
		if (!$this->FacebookApplication->exists()) {
			throw new NotFoundException(__('Invalid facebook application'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookApplication->delete()) {
			$this->Session->setFlash(__('The facebook application has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook application could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookApplication->recursive = 0;
		$this->set('facebookApplications', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookApplication->exists($id)) {
			throw new NotFoundException(__('Invalid facebook application'));
		}
		$options = array('conditions' => array('FacebookApplication.' . $this->FacebookApplication->primaryKey => $id));
		$this->set('facebookApplication', $this->FacebookApplication->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookApplication->create();
			if ($this->FacebookApplication->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook application has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook application could not be saved. Please, try again.'));
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
		if (!$this->FacebookApplication->exists($id)) {
			throw new NotFoundException(__('Invalid facebook application'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookApplication->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook application has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook application could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookApplication.' . $this->FacebookApplication->primaryKey => $id));
			$this->request->data = $this->FacebookApplication->find('first', $options);
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
		$this->FacebookApplication->id = $id;
		if (!$this->FacebookApplication->exists()) {
			throw new NotFoundException(__('Invalid facebook application'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookApplication->delete()) {
			$this->Session->setFlash(__('The facebook application has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook application could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
