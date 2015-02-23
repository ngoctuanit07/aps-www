<?php
App::uses('AppController', 'Controller');
/**
 * FacebookNamesTags Controller
 *
 * @property FacebookNamesTag $FacebookNamesTag
 * @property PaginatorComponent $Paginator
 */
class FacebookNamesTagsController extends AppController {

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
		$this->FacebookNamesTag->recursive = 0;
		$this->set('facebookNamesTags', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookNamesTag->exists($id)) {
			throw new NotFoundException(__('Invalid facebook names tag'));
		}
		$options = array('conditions' => array('FacebookNamesTag.' . $this->FacebookNamesTag->primaryKey => $id));
		$this->set('facebookNamesTag', $this->FacebookNamesTag->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookNamesTag->create();
			if ($this->FacebookNamesTag->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook names tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook names tag could not be saved. Please, try again.'));
			}
		}
		$photos = $this->FacebookNamesTag->Photo->find('list');
		$users = $this->FacebookNamesTag->User->find('list');
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
		if (!$this->FacebookNamesTag->exists($id)) {
			throw new NotFoundException(__('Invalid facebook names tag'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookNamesTag->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook names tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook names tag could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookNamesTag.' . $this->FacebookNamesTag->primaryKey => $id));
			$this->request->data = $this->FacebookNamesTag->find('first', $options);
		}
		$photos = $this->FacebookNamesTag->Photo->find('list');
		$users = $this->FacebookNamesTag->User->find('list');
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
		$this->FacebookNamesTag->id = $id;
		if (!$this->FacebookNamesTag->exists()) {
			throw new NotFoundException(__('Invalid facebook names tag'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookNamesTag->delete()) {
			$this->Session->setFlash(__('The facebook names tag has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook names tag could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookNamesTag->recursive = 0;
		$this->set('facebookNamesTags', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookNamesTag->exists($id)) {
			throw new NotFoundException(__('Invalid facebook names tag'));
		}
		$options = array('conditions' => array('FacebookNamesTag.' . $this->FacebookNamesTag->primaryKey => $id));
		$this->set('facebookNamesTag', $this->FacebookNamesTag->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookNamesTag->create();
			if ($this->FacebookNamesTag->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook names tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook names tag could not be saved. Please, try again.'));
			}
		}
		$photos = $this->FacebookNamesTag->Photo->find('list');
		$users = $this->FacebookNamesTag->User->find('list');
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
		if (!$this->FacebookNamesTag->exists($id)) {
			throw new NotFoundException(__('Invalid facebook names tag'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookNamesTag->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook names tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook names tag could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookNamesTag.' . $this->FacebookNamesTag->primaryKey => $id));
			$this->request->data = $this->FacebookNamesTag->find('first', $options);
		}
		$photos = $this->FacebookNamesTag->Photo->find('list');
		$users = $this->FacebookNamesTag->User->find('list');
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
		$this->FacebookNamesTag->id = $id;
		if (!$this->FacebookNamesTag->exists()) {
			throw new NotFoundException(__('Invalid facebook names tag'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookNamesTag->delete()) {
			$this->Session->setFlash(__('The facebook names tag has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook names tag could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
