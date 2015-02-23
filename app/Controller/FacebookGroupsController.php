<?php
App::uses('AppController', 'Controller');
/**
 * FacebookGroups Controller
 *
 * @property FacebookGroup $FacebookGroup
 * @property PaginatorComponent $Paginator
 */
class FacebookGroupsController extends AppController {

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
		$this->FacebookGroup->recursive = 0;
		$this->set('facebookGroups', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookGroup->exists($id)) {
			throw new NotFoundException(__('Invalid facebook group'));
		}
		$options = array('conditions' => array('FacebookGroup.' . $this->FacebookGroup->primaryKey => $id));
		$this->set('facebookGroup', $this->FacebookGroup->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookGroup->create();
			if ($this->FacebookGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook group could not be saved. Please, try again.'));
			}
		}
		$ownerUsers = $this->FacebookGroup->OwnerUser->find('list');
		$ownerPages = $this->FacebookGroup->OwnerPage->find('list');
		$parentGroups = $this->FacebookGroup->ParentGroup->find('list');
		$parentPages = $this->FacebookGroup->ParentPage->find('list');
		$parentUsers = $this->FacebookGroup->ParentUser->find('list');
		$facebookUsers = $this->FacebookGroup->FacebookUser->find('list');
		$this->set(compact('ownerUsers', 'ownerPages', 'parentGroups', 'parentPages', 'parentUsers', 'facebookUsers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookGroup->exists($id)) {
			throw new NotFoundException(__('Invalid facebook group'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook group could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookGroup.' . $this->FacebookGroup->primaryKey => $id));
			$this->request->data = $this->FacebookGroup->find('first', $options);
		}
		$ownerUsers = $this->FacebookGroup->OwnerUser->find('list');
		$ownerPages = $this->FacebookGroup->OwnerPage->find('list');
		$parentGroups = $this->FacebookGroup->ParentGroup->find('list');
		$parentPages = $this->FacebookGroup->ParentPage->find('list');
		$parentUsers = $this->FacebookGroup->ParentUser->find('list');
		$facebookUsers = $this->FacebookGroup->FacebookUser->find('list');
		$this->set(compact('ownerUsers', 'ownerPages', 'parentGroups', 'parentPages', 'parentUsers', 'facebookUsers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookGroup->id = $id;
		if (!$this->FacebookGroup->exists()) {
			throw new NotFoundException(__('Invalid facebook group'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookGroup->delete()) {
			$this->Session->setFlash(__('The facebook group has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook group could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookGroup->recursive = 0;
		$this->set('facebookGroups', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookGroup->exists($id)) {
			throw new NotFoundException(__('Invalid facebook group'));
		}
		$options = array('conditions' => array('FacebookGroup.' . $this->FacebookGroup->primaryKey => $id));
		$this->set('facebookGroup', $this->FacebookGroup->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookGroup->create();
			if ($this->FacebookGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook group could not be saved. Please, try again.'));
			}
		}
		$ownerUsers = $this->FacebookGroup->OwnerUser->find('list');
		$ownerPages = $this->FacebookGroup->OwnerPage->find('list');
		$parentGroups = $this->FacebookGroup->ParentGroup->find('list');
		$parentPages = $this->FacebookGroup->ParentPage->find('list');
		$parentUsers = $this->FacebookGroup->ParentUser->find('list');
		$facebookUsers = $this->FacebookGroup->FacebookUser->find('list');
		$this->set(compact('ownerUsers', 'ownerPages', 'parentGroups', 'parentPages', 'parentUsers', 'facebookUsers'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookGroup->exists($id)) {
			throw new NotFoundException(__('Invalid facebook group'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook group could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookGroup.' . $this->FacebookGroup->primaryKey => $id));
			$this->request->data = $this->FacebookGroup->find('first', $options);
		}
		$ownerUsers = $this->FacebookGroup->OwnerUser->find('list');
		$ownerPages = $this->FacebookGroup->OwnerPage->find('list');
		$parentGroups = $this->FacebookGroup->ParentGroup->find('list');
		$parentPages = $this->FacebookGroup->ParentPage->find('list');
		$parentUsers = $this->FacebookGroup->ParentUser->find('list');
		$facebookUsers = $this->FacebookGroup->FacebookUser->find('list');
		$this->set(compact('ownerUsers', 'ownerPages', 'parentGroups', 'parentPages', 'parentUsers', 'facebookUsers'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookGroup->id = $id;
		if (!$this->FacebookGroup->exists()) {
			throw new NotFoundException(__('Invalid facebook group'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookGroup->delete()) {
			$this->Session->setFlash(__('The facebook group has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook group could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
