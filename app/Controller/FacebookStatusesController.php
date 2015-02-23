<?php
App::uses('AppController', 'Controller');
/**
 * FacebookStatuses Controller
 *
 * @property FacebookStatus $FacebookStatus
 * @property PaginatorComponent $Paginator
 */
class FacebookStatusesController extends AppController {

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
		$this->FacebookStatus->recursive = 0;
		$this->set('facebookStatuses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookStatus->exists($id)) {
			throw new NotFoundException(__('Invalid facebook status'));
		}
		$options = array('conditions' => array('FacebookStatus.' . $this->FacebookStatus->primaryKey => $id));
		$this->set('facebookStatus', $this->FacebookStatus->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookStatus->create();
			if ($this->FacebookStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook status could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookStatus->User->find('list');
		$pages = $this->FacebookStatus->Page->find('list');
		$groups = $this->FacebookStatus->Group->find('list');
		$events = $this->FacebookStatus->Event->find('list');
		$applications = $this->FacebookStatus->Application->find('list');
		$this->set(compact('users', 'pages', 'groups', 'events', 'applications'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookStatus->exists($id)) {
			throw new NotFoundException(__('Invalid facebook status'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook status could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookStatus.' . $this->FacebookStatus->primaryKey => $id));
			$this->request->data = $this->FacebookStatus->find('first', $options);
		}
		$users = $this->FacebookStatus->User->find('list');
		$pages = $this->FacebookStatus->Page->find('list');
		$groups = $this->FacebookStatus->Group->find('list');
		$events = $this->FacebookStatus->Event->find('list');
		$applications = $this->FacebookStatus->Application->find('list');
		$this->set(compact('users', 'pages', 'groups', 'events', 'applications'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookStatus->id = $id;
		if (!$this->FacebookStatus->exists()) {
			throw new NotFoundException(__('Invalid facebook status'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookStatus->delete()) {
			$this->Session->setFlash(__('The facebook status has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook status could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookStatus->recursive = 0;
		$this->set('facebookStatuses', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookStatus->exists($id)) {
			throw new NotFoundException(__('Invalid facebook status'));
		}
		$options = array('conditions' => array('FacebookStatus.' . $this->FacebookStatus->primaryKey => $id));
		$this->set('facebookStatus', $this->FacebookStatus->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookStatus->create();
			if ($this->FacebookStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook status could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookStatus->User->find('list');
		$pages = $this->FacebookStatus->Page->find('list');
		$groups = $this->FacebookStatus->Group->find('list');
		$events = $this->FacebookStatus->Event->find('list');
		$applications = $this->FacebookStatus->Application->find('list');
		$this->set(compact('users', 'pages', 'groups', 'events', 'applications'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookStatus->exists($id)) {
			throw new NotFoundException(__('Invalid facebook status'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook status could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookStatus.' . $this->FacebookStatus->primaryKey => $id));
			$this->request->data = $this->FacebookStatus->find('first', $options);
		}
		$users = $this->FacebookStatus->User->find('list');
		$pages = $this->FacebookStatus->Page->find('list');
		$groups = $this->FacebookStatus->Group->find('list');
		$events = $this->FacebookStatus->Event->find('list');
		$applications = $this->FacebookStatus->Application->find('list');
		$this->set(compact('users', 'pages', 'groups', 'events', 'applications'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookStatus->id = $id;
		if (!$this->FacebookStatus->exists()) {
			throw new NotFoundException(__('Invalid facebook status'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookStatus->delete()) {
			$this->Session->setFlash(__('The facebook status has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook status could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
