<?php
App::uses('AppController', 'Controller');
/**
 * FacebookEvents Controller
 *
 * @property FacebookEvent $FacebookEvent
 * @property PaginatorComponent $Paginator
 */
class FacebookEventsController extends AppController {

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
		$this->FacebookEvent->recursive = 0;
		$this->set('facebookEvents', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookEvent->exists($id)) {
			throw new NotFoundException(__('Invalid facebook event'));
		}
		$options = array('conditions' => array('FacebookEvent.' . $this->FacebookEvent->primaryKey => $id));
		$this->set('facebookEvent', $this->FacebookEvent->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookEvent->create();
			if ($this->FacebookEvent->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook event has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook event could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookEvent->User->find('list');
		$pages = $this->FacebookEvent->Page->find('list');
		$groups = $this->FacebookEvent->Group->find('list');
		$facebookUsers = $this->FacebookEvent->FacebookUser->find('list');
		$this->set(compact('users', 'pages', 'groups', 'facebookUsers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookEvent->exists($id)) {
			throw new NotFoundException(__('Invalid facebook event'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookEvent->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook event has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook event could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookEvent.' . $this->FacebookEvent->primaryKey => $id));
			$this->request->data = $this->FacebookEvent->find('first', $options);
		}
		$users = $this->FacebookEvent->User->find('list');
		$pages = $this->FacebookEvent->Page->find('list');
		$groups = $this->FacebookEvent->Group->find('list');
		$facebookUsers = $this->FacebookEvent->FacebookUser->find('list');
		$this->set(compact('users', 'pages', 'groups', 'facebookUsers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookEvent->id = $id;
		if (!$this->FacebookEvent->exists()) {
			throw new NotFoundException(__('Invalid facebook event'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookEvent->delete()) {
			$this->Session->setFlash(__('The facebook event has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook event could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookEvent->recursive = 0;
		$this->set('facebookEvents', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookEvent->exists($id)) {
			throw new NotFoundException(__('Invalid facebook event'));
		}
		$options = array('conditions' => array('FacebookEvent.' . $this->FacebookEvent->primaryKey => $id));
		$this->set('facebookEvent', $this->FacebookEvent->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookEvent->create();
			if ($this->FacebookEvent->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook event has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook event could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookEvent->User->find('list');
		$pages = $this->FacebookEvent->Page->find('list');
		$groups = $this->FacebookEvent->Group->find('list');
		$facebookUsers = $this->FacebookEvent->FacebookUser->find('list');
		$this->set(compact('users', 'pages', 'groups', 'facebookUsers'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookEvent->exists($id)) {
			throw new NotFoundException(__('Invalid facebook event'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookEvent->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook event has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook event could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookEvent.' . $this->FacebookEvent->primaryKey => $id));
			$this->request->data = $this->FacebookEvent->find('first', $options);
		}
		$users = $this->FacebookEvent->User->find('list');
		$pages = $this->FacebookEvent->Page->find('list');
		$groups = $this->FacebookEvent->Group->find('list');
		$facebookUsers = $this->FacebookEvent->FacebookUser->find('list');
		$this->set(compact('users', 'pages', 'groups', 'facebookUsers'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookEvent->id = $id;
		if (!$this->FacebookEvent->exists()) {
			throw new NotFoundException(__('Invalid facebook event'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookEvent->delete()) {
			$this->Session->setFlash(__('The facebook event has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook event could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
