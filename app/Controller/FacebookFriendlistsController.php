<?php
App::uses('AppController', 'Controller');
/**
 * FacebookFriendlists Controller
 *
 * @property FacebookFriendlist $FacebookFriendlist
 * @property PaginatorComponent $Paginator
 */
class FacebookFriendlistsController extends AppController {

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
		$this->FacebookFriendlist->recursive = 0;
		$this->set('facebookFriendlists', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookFriendlist->exists($id)) {
			throw new NotFoundException(__('Invalid facebook friendlist'));
		}
		$options = array('conditions' => array('FacebookFriendlist.' . $this->FacebookFriendlist->primaryKey => $id));
		$this->set('facebookFriendlist', $this->FacebookFriendlist->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookFriendlist->create();
			if ($this->FacebookFriendlist->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook friendlist has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook friendlist could not be saved. Please, try again.'));
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
		if (!$this->FacebookFriendlist->exists($id)) {
			throw new NotFoundException(__('Invalid facebook friendlist'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookFriendlist->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook friendlist has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook friendlist could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookFriendlist.' . $this->FacebookFriendlist->primaryKey => $id));
			$this->request->data = $this->FacebookFriendlist->find('first', $options);
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
		$this->FacebookFriendlist->id = $id;
		if (!$this->FacebookFriendlist->exists()) {
			throw new NotFoundException(__('Invalid facebook friendlist'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookFriendlist->delete()) {
			$this->Session->setFlash(__('The facebook friendlist has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook friendlist could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookFriendlist->recursive = 0;
		$this->set('facebookFriendlists', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookFriendlist->exists($id)) {
			throw new NotFoundException(__('Invalid facebook friendlist'));
		}
		$options = array('conditions' => array('FacebookFriendlist.' . $this->FacebookFriendlist->primaryKey => $id));
		$this->set('facebookFriendlist', $this->FacebookFriendlist->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookFriendlist->create();
			if ($this->FacebookFriendlist->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook friendlist has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook friendlist could not be saved. Please, try again.'));
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
		if (!$this->FacebookFriendlist->exists($id)) {
			throw new NotFoundException(__('Invalid facebook friendlist'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookFriendlist->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook friendlist has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook friendlist could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookFriendlist.' . $this->FacebookFriendlist->primaryKey => $id));
			$this->request->data = $this->FacebookFriendlist->find('first', $options);
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
		$this->FacebookFriendlist->id = $id;
		if (!$this->FacebookFriendlist->exists()) {
			throw new NotFoundException(__('Invalid facebook friendlist'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookFriendlist->delete()) {
			$this->Session->setFlash(__('The facebook friendlist has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook friendlist could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
