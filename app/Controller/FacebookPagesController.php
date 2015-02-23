<?php
App::uses('AppController', 'Controller');
/**
 * FacebookPages Controller
 *
 * @property FacebookPage $FacebookPage
 * @property PaginatorComponent $Paginator
 */
class FacebookPagesController extends AppController {

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
		$this->FacebookPage->recursive = 0;
		$this->set('facebookPages', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookPage->exists($id)) {
			throw new NotFoundException(__('Invalid facebook page'));
		}
		$options = array('conditions' => array('FacebookPage.' . $this->FacebookPage->primaryKey => $id));
		$this->set('facebookPage', $this->FacebookPage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookPage->create();
			if ($this->FacebookPage->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook page has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook page could not be saved. Please, try again.'));
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
		if (!$this->FacebookPage->exists($id)) {
			throw new NotFoundException(__('Invalid facebook page'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookPage->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook page has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook page could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookPage.' . $this->FacebookPage->primaryKey => $id));
			$this->request->data = $this->FacebookPage->find('first', $options);
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
		$this->FacebookPage->id = $id;
		if (!$this->FacebookPage->exists()) {
			throw new NotFoundException(__('Invalid facebook page'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookPage->delete()) {
			$this->Session->setFlash(__('The facebook page has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook page could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookPage->recursive = 0;
		$this->set('facebookPages', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookPage->exists($id)) {
			throw new NotFoundException(__('Invalid facebook page'));
		}
		$options = array('conditions' => array('FacebookPage.' . $this->FacebookPage->primaryKey => $id));
		$this->set('facebookPage', $this->FacebookPage->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookPage->create();
			if ($this->FacebookPage->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook page has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook page could not be saved. Please, try again.'));
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
		if (!$this->FacebookPage->exists($id)) {
			throw new NotFoundException(__('Invalid facebook page'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookPage->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook page has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook page could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookPage.' . $this->FacebookPage->primaryKey => $id));
			$this->request->data = $this->FacebookPage->find('first', $options);
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
		$this->FacebookPage->id = $id;
		if (!$this->FacebookPage->exists()) {
			throw new NotFoundException(__('Invalid facebook page'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookPage->delete()) {
			$this->Session->setFlash(__('The facebook page has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook page could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
