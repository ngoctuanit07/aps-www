<?php
App::uses('AppController', 'Controller');
/**
 * FacebookActivities Controller
 *
 * @property FacebookActivity $FacebookActivity
 * @property PaginatorComponent $Paginator
 */
class FacebookActivitiesController extends AppController {

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
		$this->FacebookActivity->recursive = 0;
		$this->set('facebookActivities', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookActivity->exists($id)) {
			throw new NotFoundException(__('Invalid facebook activity'));
		}
		$options = array('conditions' => array('FacebookActivity.' . $this->FacebookActivity->primaryKey => $id));
		$this->set('facebookActivity', $this->FacebookActivity->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookActivity->create();
			if ($this->FacebookActivity->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook activity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook activity could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookActivity->User->find('list');
		$pages = $this->FacebookActivity->Page->find('list');
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
		if (!$this->FacebookActivity->exists($id)) {
			throw new NotFoundException(__('Invalid facebook activity'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookActivity->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook activity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook activity could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookActivity.' . $this->FacebookActivity->primaryKey => $id));
			$this->request->data = $this->FacebookActivity->find('first', $options);
		}
		$users = $this->FacebookActivity->User->find('list');
		$pages = $this->FacebookActivity->Page->find('list');
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
		$this->FacebookActivity->id = $id;
		if (!$this->FacebookActivity->exists()) {
			throw new NotFoundException(__('Invalid facebook activity'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookActivity->delete()) {
			$this->Session->setFlash(__('The facebook activity has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook activity could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookActivity->recursive = 0;
		$this->set('facebookActivities', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookActivity->exists($id)) {
			throw new NotFoundException(__('Invalid facebook activity'));
		}
		$options = array('conditions' => array('FacebookActivity.' . $this->FacebookActivity->primaryKey => $id));
		$this->set('facebookActivity', $this->FacebookActivity->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookActivity->create();
			if ($this->FacebookActivity->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook activity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook activity could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookActivity->User->find('list');
		$pages = $this->FacebookActivity->Page->find('list');
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
		if (!$this->FacebookActivity->exists($id)) {
			throw new NotFoundException(__('Invalid facebook activity'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookActivity->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook activity has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook activity could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookActivity.' . $this->FacebookActivity->primaryKey => $id));
			$this->request->data = $this->FacebookActivity->find('first', $options);
		}
		$users = $this->FacebookActivity->User->find('list');
		$pages = $this->FacebookActivity->Page->find('list');
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
		$this->FacebookActivity->id = $id;
		if (!$this->FacebookActivity->exists()) {
			throw new NotFoundException(__('Invalid facebook activity'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookActivity->delete()) {
			$this->Session->setFlash(__('The facebook activity has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook activity could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
