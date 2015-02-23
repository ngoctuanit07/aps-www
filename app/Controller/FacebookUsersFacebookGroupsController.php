<?php
App::uses('AppController', 'Controller');
/**
 * FacebookUsersFacebookGroups Controller
 *
 * @property FacebookUsersFacebookGroup $FacebookUsersFacebookGroup
 * @property PaginatorComponent $Paginator
 */
class FacebookUsersFacebookGroupsController extends AppController {

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
		$this->FacebookUsersFacebookGroup->recursive = 0;
		$this->set('facebookUsersFacebookGroups', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookUsersFacebookGroup->exists($id)) {
			throw new NotFoundException(__('Invalid facebook users facebook group'));
		}
		$options = array('conditions' => array('FacebookUsersFacebookGroup.' . $this->FacebookUsersFacebookGroup->primaryKey => $id));
		$this->set('facebookUsersFacebookGroup', $this->FacebookUsersFacebookGroup->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookUsersFacebookGroup->create();
			if ($this->FacebookUsersFacebookGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook users facebook group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook users facebook group could not be saved. Please, try again.'));
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
		if (!$this->FacebookUsersFacebookGroup->exists($id)) {
			throw new NotFoundException(__('Invalid facebook users facebook group'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookUsersFacebookGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook users facebook group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook users facebook group could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookUsersFacebookGroup.' . $this->FacebookUsersFacebookGroup->primaryKey => $id));
			$this->request->data = $this->FacebookUsersFacebookGroup->find('first', $options);
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
		$this->FacebookUsersFacebookGroup->id = $id;
		if (!$this->FacebookUsersFacebookGroup->exists()) {
			throw new NotFoundException(__('Invalid facebook users facebook group'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookUsersFacebookGroup->delete()) {
			$this->Session->setFlash(__('The facebook users facebook group has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook users facebook group could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookUsersFacebookGroup->recursive = 0;
		$this->set('facebookUsersFacebookGroups', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookUsersFacebookGroup->exists($id)) {
			throw new NotFoundException(__('Invalid facebook users facebook group'));
		}
		$options = array('conditions' => array('FacebookUsersFacebookGroup.' . $this->FacebookUsersFacebookGroup->primaryKey => $id));
		$this->set('facebookUsersFacebookGroup', $this->FacebookUsersFacebookGroup->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookUsersFacebookGroup->create();
			if ($this->FacebookUsersFacebookGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook users facebook group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook users facebook group could not be saved. Please, try again.'));
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
		if (!$this->FacebookUsersFacebookGroup->exists($id)) {
			throw new NotFoundException(__('Invalid facebook users facebook group'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookUsersFacebookGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook users facebook group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook users facebook group could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookUsersFacebookGroup.' . $this->FacebookUsersFacebookGroup->primaryKey => $id));
			$this->request->data = $this->FacebookUsersFacebookGroup->find('first', $options);
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
		$this->FacebookUsersFacebookGroup->id = $id;
		if (!$this->FacebookUsersFacebookGroup->exists()) {
			throw new NotFoundException(__('Invalid facebook users facebook group'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookUsersFacebookGroup->delete()) {
			$this->Session->setFlash(__('The facebook users facebook group has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook users facebook group could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
