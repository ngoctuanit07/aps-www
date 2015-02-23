<?php
App::uses('AppController', 'Controller');
/**
 * FacebookEventFeeds Controller
 *
 * @property FacebookEventFeed $FacebookEventFeed
 * @property PaginatorComponent $Paginator
 */
class FacebookEventFeedsController extends AppController {

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
		$this->FacebookEventFeed->recursive = 0;
		$this->set('facebookEventFeeds', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookEventFeed->exists($id)) {
			throw new NotFoundException(__('Invalid facebook event feed'));
		}
		$options = array('conditions' => array('FacebookEventFeed.' . $this->FacebookEventFeed->primaryKey => $id));
		$this->set('facebookEventFeed', $this->FacebookEventFeed->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookEventFeed->create();
			if ($this->FacebookEventFeed->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook event feed has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook event feed could not be saved. Please, try again.'));
			}
		}
		$events = $this->FacebookEventFeed->Event->find('list');
		$links = $this->FacebookEventFeed->Link->find('list');
		$posts = $this->FacebookEventFeed->Post->find('list');
		$statuses = $this->FacebookEventFeed->Status->find('list');
		$this->set(compact('events', 'links', 'posts', 'statuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookEventFeed->exists($id)) {
			throw new NotFoundException(__('Invalid facebook event feed'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookEventFeed->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook event feed has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook event feed could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookEventFeed.' . $this->FacebookEventFeed->primaryKey => $id));
			$this->request->data = $this->FacebookEventFeed->find('first', $options);
		}
		$events = $this->FacebookEventFeed->Event->find('list');
		$links = $this->FacebookEventFeed->Link->find('list');
		$posts = $this->FacebookEventFeed->Post->find('list');
		$statuses = $this->FacebookEventFeed->Status->find('list');
		$this->set(compact('events', 'links', 'posts', 'statuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookEventFeed->id = $id;
		if (!$this->FacebookEventFeed->exists()) {
			throw new NotFoundException(__('Invalid facebook event feed'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookEventFeed->delete()) {
			$this->Session->setFlash(__('The facebook event feed has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook event feed could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookEventFeed->recursive = 0;
		$this->set('facebookEventFeeds', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookEventFeed->exists($id)) {
			throw new NotFoundException(__('Invalid facebook event feed'));
		}
		$options = array('conditions' => array('FacebookEventFeed.' . $this->FacebookEventFeed->primaryKey => $id));
		$this->set('facebookEventFeed', $this->FacebookEventFeed->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookEventFeed->create();
			if ($this->FacebookEventFeed->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook event feed has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook event feed could not be saved. Please, try again.'));
			}
		}
		$events = $this->FacebookEventFeed->Event->find('list');
		$links = $this->FacebookEventFeed->Link->find('list');
		$posts = $this->FacebookEventFeed->Post->find('list');
		$statuses = $this->FacebookEventFeed->Status->find('list');
		$this->set(compact('events', 'links', 'posts', 'statuses'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookEventFeed->exists($id)) {
			throw new NotFoundException(__('Invalid facebook event feed'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookEventFeed->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook event feed has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook event feed could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookEventFeed.' . $this->FacebookEventFeed->primaryKey => $id));
			$this->request->data = $this->FacebookEventFeed->find('first', $options);
		}
		$events = $this->FacebookEventFeed->Event->find('list');
		$links = $this->FacebookEventFeed->Link->find('list');
		$posts = $this->FacebookEventFeed->Post->find('list');
		$statuses = $this->FacebookEventFeed->Status->find('list');
		$this->set(compact('events', 'links', 'posts', 'statuses'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookEventFeed->id = $id;
		if (!$this->FacebookEventFeed->exists()) {
			throw new NotFoundException(__('Invalid facebook event feed'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookEventFeed->delete()) {
			$this->Session->setFlash(__('The facebook event feed has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook event feed could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
