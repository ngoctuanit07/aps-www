<?php
App::uses('AppController', 'Controller');
/**
 * FacebookProjects Controller
 *
 * @property FacebookProject $FacebookProject
 * @property PaginatorComponent $Paginator
 */
class FacebookProjectsController extends AppController {

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
		$this->FacebookProject->recursive = 0;
		$this->set('facebookProjects', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookProject->exists($id)) {
			throw new NotFoundException(__('Invalid facebook project'));
		}
		$options = array('conditions' => array('FacebookProject.' . $this->FacebookProject->primaryKey => $id));
		$this->set('facebookProject', $this->FacebookProject->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookProject->create();
			if ($this->FacebookProject->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook project has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook project could not be saved. Please, try again.'));
			}
		}
		$facebookUsers = $this->FacebookProject->FacebookUser->find('list');
		$this->set(compact('facebookUsers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookProject->exists($id)) {
			throw new NotFoundException(__('Invalid facebook project'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookProject->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook project has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook project could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookProject.' . $this->FacebookProject->primaryKey => $id));
			$this->request->data = $this->FacebookProject->find('first', $options);
		}
		$facebookUsers = $this->FacebookProject->FacebookUser->find('list');
		$this->set(compact('facebookUsers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookProject->id = $id;
		if (!$this->FacebookProject->exists()) {
			throw new NotFoundException(__('Invalid facebook project'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookProject->delete()) {
			$this->Session->setFlash(__('The facebook project has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook project could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookProject->recursive = 0;
		$this->set('facebookProjects', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookProject->exists($id)) {
			throw new NotFoundException(__('Invalid facebook project'));
		}
		$options = array('conditions' => array('FacebookProject.' . $this->FacebookProject->primaryKey => $id));
		$this->set('facebookProject', $this->FacebookProject->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookProject->create();
			if ($this->FacebookProject->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook project has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook project could not be saved. Please, try again.'));
			}
		}
		$facebookUsers = $this->FacebookProject->FacebookUser->find('list');
		$this->set(compact('facebookUsers'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookProject->exists($id)) {
			throw new NotFoundException(__('Invalid facebook project'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookProject->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook project has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook project could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookProject.' . $this->FacebookProject->primaryKey => $id));
			$this->request->data = $this->FacebookProject->find('first', $options);
		}
		$facebookUsers = $this->FacebookProject->FacebookUser->find('list');
		$this->set(compact('facebookUsers'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookProject->id = $id;
		if (!$this->FacebookProject->exists()) {
			throw new NotFoundException(__('Invalid facebook project'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookProject->delete()) {
			$this->Session->setFlash(__('The facebook project has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook project could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
