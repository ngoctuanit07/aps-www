<?php
App::uses('AppController', 'Controller');
/**
 * FacebookGroupFeeds Controller
 *
 * @property FacebookGroupFeed $FacebookGroupFeed
 * @property PaginatorComponent $Paginator
 */
class FacebookGroupFeedsController extends AppController {

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
		$this->FacebookGroupFeed->recursive = 0;
		$this->set('facebookGroupFeeds', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookGroupFeed->exists($id)) {
			throw new NotFoundException(__('Invalid facebook group feed'));
		}
		$options = array('conditions' => array('FacebookGroupFeed.' . $this->FacebookGroupFeed->primaryKey => $id));
		$this->set('facebookGroupFeed', $this->FacebookGroupFeed->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookGroupFeed->create();
			if ($this->FacebookGroupFeed->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook group feed has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook group feed could not be saved. Please, try again.'));
			}
		}
		$groups = $this->FacebookGroupFeed->Group->find('list');
		$links = $this->FacebookGroupFeed->Link->find('list');
		$posts = $this->FacebookGroupFeed->Post->find('list');
		$statuses = $this->FacebookGroupFeed->Status->find('list');
		$this->set(compact('groups', 'links', 'posts', 'statuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookGroupFeed->exists($id)) {
			throw new NotFoundException(__('Invalid facebook group feed'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookGroupFeed->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook group feed has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook group feed could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookGroupFeed.' . $this->FacebookGroupFeed->primaryKey => $id));
			$this->request->data = $this->FacebookGroupFeed->find('first', $options);
		}
		$groups = $this->FacebookGroupFeed->Group->find('list');
		$links = $this->FacebookGroupFeed->Link->find('list');
		$posts = $this->FacebookGroupFeed->Post->find('list');
		$statuses = $this->FacebookGroupFeed->Status->find('list');
		$this->set(compact('groups', 'links', 'posts', 'statuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookGroupFeed->id = $id;
		if (!$this->FacebookGroupFeed->exists()) {
			throw new NotFoundException(__('Invalid facebook group feed'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookGroupFeed->delete()) {
			$this->Session->setFlash(__('The facebook group feed has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook group feed could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookGroupFeed->recursive = 0;
		$this->set('facebookGroupFeeds', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookGroupFeed->exists($id)) {
			throw new NotFoundException(__('Invalid facebook group feed'));
		}
		$options = array('conditions' => array('FacebookGroupFeed.' . $this->FacebookGroupFeed->primaryKey => $id));
		$this->set('facebookGroupFeed', $this->FacebookGroupFeed->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookGroupFeed->create();
			if ($this->FacebookGroupFeed->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook group feed has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook group feed could not be saved. Please, try again.'));
			}
		}
		$groups = $this->FacebookGroupFeed->Group->find('list');
		$links = $this->FacebookGroupFeed->Link->find('list');
		$posts = $this->FacebookGroupFeed->Post->find('list');
		$statuses = $this->FacebookGroupFeed->Status->find('list');
		$this->set(compact('groups', 'links', 'posts', 'statuses'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookGroupFeed->exists($id)) {
			throw new NotFoundException(__('Invalid facebook group feed'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookGroupFeed->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook group feed has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook group feed could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookGroupFeed.' . $this->FacebookGroupFeed->primaryKey => $id));
			$this->request->data = $this->FacebookGroupFeed->find('first', $options);
		}
		$groups = $this->FacebookGroupFeed->Group->find('list');
		$links = $this->FacebookGroupFeed->Link->find('list');
		$posts = $this->FacebookGroupFeed->Post->find('list');
		$statuses = $this->FacebookGroupFeed->Status->find('list');
		$this->set(compact('groups', 'links', 'posts', 'statuses'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookGroupFeed->id = $id;
		if (!$this->FacebookGroupFeed->exists()) {
			throw new NotFoundException(__('Invalid facebook group feed'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookGroupFeed->delete()) {
			$this->Session->setFlash(__('The facebook group feed has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook group feed could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
