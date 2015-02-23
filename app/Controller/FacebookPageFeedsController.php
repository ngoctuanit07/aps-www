<?php
App::uses('AppController', 'Controller');
/**
 * FacebookPageFeeds Controller
 *
 * @property FacebookPageFeed $FacebookPageFeed
 * @property PaginatorComponent $Paginator
 */
class FacebookPageFeedsController extends AppController {

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
		$this->FacebookPageFeed->recursive = 0;
		$this->set('facebookPageFeeds', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookPageFeed->exists($id)) {
			throw new NotFoundException(__('Invalid facebook page feed'));
		}
		$options = array('conditions' => array('FacebookPageFeed.' . $this->FacebookPageFeed->primaryKey => $id));
		$this->set('facebookPageFeed', $this->FacebookPageFeed->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookPageFeed->create();
			if ($this->FacebookPageFeed->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook page feed has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook page feed could not be saved. Please, try again.'));
			}
		}
		$pages = $this->FacebookPageFeed->Page->find('list');
		$links = $this->FacebookPageFeed->Link->find('list');
		$posts = $this->FacebookPageFeed->Post->find('list');
		$statuses = $this->FacebookPageFeed->Status->find('list');
		$this->set(compact('pages', 'links', 'posts', 'statuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookPageFeed->exists($id)) {
			throw new NotFoundException(__('Invalid facebook page feed'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookPageFeed->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook page feed has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook page feed could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookPageFeed.' . $this->FacebookPageFeed->primaryKey => $id));
			$this->request->data = $this->FacebookPageFeed->find('first', $options);
		}
		$pages = $this->FacebookPageFeed->Page->find('list');
		$links = $this->FacebookPageFeed->Link->find('list');
		$posts = $this->FacebookPageFeed->Post->find('list');
		$statuses = $this->FacebookPageFeed->Status->find('list');
		$this->set(compact('pages', 'links', 'posts', 'statuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookPageFeed->id = $id;
		if (!$this->FacebookPageFeed->exists()) {
			throw new NotFoundException(__('Invalid facebook page feed'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookPageFeed->delete()) {
			$this->Session->setFlash(__('The facebook page feed has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook page feed could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookPageFeed->recursive = 0;
		$this->set('facebookPageFeeds', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookPageFeed->exists($id)) {
			throw new NotFoundException(__('Invalid facebook page feed'));
		}
		$options = array('conditions' => array('FacebookPageFeed.' . $this->FacebookPageFeed->primaryKey => $id));
		$this->set('facebookPageFeed', $this->FacebookPageFeed->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookPageFeed->create();
			if ($this->FacebookPageFeed->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook page feed has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook page feed could not be saved. Please, try again.'));
			}
		}
		$pages = $this->FacebookPageFeed->Page->find('list');
		$links = $this->FacebookPageFeed->Link->find('list');
		$posts = $this->FacebookPageFeed->Post->find('list');
		$statuses = $this->FacebookPageFeed->Status->find('list');
		$this->set(compact('pages', 'links', 'posts', 'statuses'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookPageFeed->exists($id)) {
			throw new NotFoundException(__('Invalid facebook page feed'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookPageFeed->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook page feed has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook page feed could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookPageFeed.' . $this->FacebookPageFeed->primaryKey => $id));
			$this->request->data = $this->FacebookPageFeed->find('first', $options);
		}
		$pages = $this->FacebookPageFeed->Page->find('list');
		$links = $this->FacebookPageFeed->Link->find('list');
		$posts = $this->FacebookPageFeed->Post->find('list');
		$statuses = $this->FacebookPageFeed->Status->find('list');
		$this->set(compact('pages', 'links', 'posts', 'statuses'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookPageFeed->id = $id;
		if (!$this->FacebookPageFeed->exists()) {
			throw new NotFoundException(__('Invalid facebook page feed'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookPageFeed->delete()) {
			$this->Session->setFlash(__('The facebook page feed has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook page feed could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
