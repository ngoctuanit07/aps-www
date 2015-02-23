<?php
App::uses('AppController', 'Controller');
/**
 * TwitterStatuses Controller
 *
 * @property TwitterStatus $TwitterStatus
 * @property PaginatorComponent $Paginator
 */
class TwitterStatusesController extends AppController {

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
		$this->TwitterStatus->recursive = 0;
		$this->set('twitterStatuses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TwitterStatus->exists($id)) {
			throw new NotFoundException(__('Invalid twitter status'));
		}
		$options = array('conditions' => array('TwitterStatus.' . $this->TwitterStatus->primaryKey => $id));
		$this->set('twitterStatus', $this->TwitterStatus->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TwitterStatus->create();
			if ($this->TwitterStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The twitter status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The twitter status could not be saved. Please, try again.'));
			}
		}
		$users = $this->TwitterStatus->User->find('list');
		$inReplyToUsers = $this->TwitterStatus->InReplyToUser->find('list');
		$inReplyToStatuses = $this->TwitterStatus->InReplyToStatus->find('list');
		$this->set(compact('users', 'inReplyToUsers', 'inReplyToStatuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TwitterStatus->exists($id)) {
			throw new NotFoundException(__('Invalid twitter status'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TwitterStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The twitter status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The twitter status could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TwitterStatus.' . $this->TwitterStatus->primaryKey => $id));
			$this->request->data = $this->TwitterStatus->find('first', $options);
		}
		$users = $this->TwitterStatus->User->find('list');
		$inReplyToUsers = $this->TwitterStatus->InReplyToUser->find('list');
		$inReplyToStatuses = $this->TwitterStatus->InReplyToStatus->find('list');
		$this->set(compact('users', 'inReplyToUsers', 'inReplyToStatuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TwitterStatus->id = $id;
		if (!$this->TwitterStatus->exists()) {
			throw new NotFoundException(__('Invalid twitter status'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TwitterStatus->delete()) {
			$this->Session->setFlash(__('The twitter status has been deleted.'));
		} else {
			$this->Session->setFlash(__('The twitter status could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TwitterStatus->recursive = 0;
		$this->set('twitterStatuses', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TwitterStatus->exists($id)) {
			throw new NotFoundException(__('Invalid twitter status'));
		}
		$options = array('conditions' => array('TwitterStatus.' . $this->TwitterStatus->primaryKey => $id));
		$this->set('twitterStatus', $this->TwitterStatus->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TwitterStatus->create();
			if ($this->TwitterStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The twitter status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The twitter status could not be saved. Please, try again.'));
			}
		}
		$users = $this->TwitterStatus->User->find('list');
		$inReplyToUsers = $this->TwitterStatus->InReplyToUser->find('list');
		$inReplyToStatuses = $this->TwitterStatus->InReplyToStatus->find('list');
		$this->set(compact('users', 'inReplyToUsers', 'inReplyToStatuses'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->TwitterStatus->exists($id)) {
			throw new NotFoundException(__('Invalid twitter status'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TwitterStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The twitter status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The twitter status could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TwitterStatus.' . $this->TwitterStatus->primaryKey => $id));
			$this->request->data = $this->TwitterStatus->find('first', $options);
		}
		$users = $this->TwitterStatus->User->find('list');
		$inReplyToUsers = $this->TwitterStatus->InReplyToUser->find('list');
		$inReplyToStatuses = $this->TwitterStatus->InReplyToStatus->find('list');
		$this->set(compact('users', 'inReplyToUsers', 'inReplyToStatuses'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->TwitterStatus->id = $id;
		if (!$this->TwitterStatus->exists()) {
			throw new NotFoundException(__('Invalid twitter status'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TwitterStatus->delete()) {
			$this->Session->setFlash(__('The twitter status has been deleted.'));
		} else {
			$this->Session->setFlash(__('The twitter status could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
