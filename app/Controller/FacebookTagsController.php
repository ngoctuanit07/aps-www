<?php
App::uses('AppController', 'Controller');
/**
 * FacebookTags Controller
 *
 * @property FacebookTag $FacebookTag
 * @property PaginatorComponent $Paginator
 */
class FacebookTagsController extends AppController {

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
		$this->FacebookTag->recursive = 0;
		$this->set('facebookTags', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookTag->exists($id)) {
			throw new NotFoundException(__('Invalid facebook tag'));
		}
		$options = array('conditions' => array('FacebookTag.' . $this->FacebookTag->primaryKey => $id));
		$this->set('facebookTag', $this->FacebookTag->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookTag->create();
			if ($this->FacebookTag->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook tag could not be saved. Please, try again.'));
			}
		}
		$photos = $this->FacebookTag->Photo->find('list');
		$users = $this->FacebookTag->User->find('list');
		$this->set(compact('photos', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookTag->exists($id)) {
			throw new NotFoundException(__('Invalid facebook tag'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookTag->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook tag could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookTag.' . $this->FacebookTag->primaryKey => $id));
			$this->request->data = $this->FacebookTag->find('first', $options);
		}
		$photos = $this->FacebookTag->Photo->find('list');
		$users = $this->FacebookTag->User->find('list');
		$this->set(compact('photos', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookTag->id = $id;
		if (!$this->FacebookTag->exists()) {
			throw new NotFoundException(__('Invalid facebook tag'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookTag->delete()) {
			$this->Session->setFlash(__('The facebook tag has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook tag could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookTag->recursive = 0;
		$this->set('facebookTags', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookTag->exists($id)) {
			throw new NotFoundException(__('Invalid facebook tag'));
		}
		$options = array('conditions' => array('FacebookTag.' . $this->FacebookTag->primaryKey => $id));
		$this->set('facebookTag', $this->FacebookTag->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookTag->create();
			if ($this->FacebookTag->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook tag could not be saved. Please, try again.'));
			}
		}
		$photos = $this->FacebookTag->Photo->find('list');
		$users = $this->FacebookTag->User->find('list');
		$this->set(compact('photos', 'users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookTag->exists($id)) {
			throw new NotFoundException(__('Invalid facebook tag'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookTag->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook tag could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookTag.' . $this->FacebookTag->primaryKey => $id));
			$this->request->data = $this->FacebookTag->find('first', $options);
		}
		$photos = $this->FacebookTag->Photo->find('list');
		$users = $this->FacebookTag->User->find('list');
		$this->set(compact('photos', 'users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookTag->id = $id;
		if (!$this->FacebookTag->exists()) {
			throw new NotFoundException(__('Invalid facebook tag'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookTag->delete()) {
			$this->Session->setFlash(__('The facebook tag has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook tag could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
