<?php
App::uses('AppController', 'Controller');
/**
 * FacebookCategories Controller
 *
 * @property FacebookCategory $FacebookCategory
 * @property PaginatorComponent $Paginator
 */
class FacebookCategoriesController extends AppController {

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
		$this->FacebookCategory->recursive = 0;
		$this->set('facebookCategories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookCategory->exists($id)) {
			throw new NotFoundException(__('Invalid facebook category'));
		}
		$options = array('conditions' => array('FacebookCategory.' . $this->FacebookCategory->primaryKey => $id));
		$this->set('facebookCategory', $this->FacebookCategory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookCategory->create();
			if ($this->FacebookCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook category could not be saved. Please, try again.'));
			}
		}
		$pages = $this->FacebookCategory->Page->find('list');
		$this->set(compact('pages'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookCategory->exists($id)) {
			throw new NotFoundException(__('Invalid facebook category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookCategory.' . $this->FacebookCategory->primaryKey => $id));
			$this->request->data = $this->FacebookCategory->find('first', $options);
		}
		$pages = $this->FacebookCategory->Page->find('list');
		$this->set(compact('pages'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookCategory->id = $id;
		if (!$this->FacebookCategory->exists()) {
			throw new NotFoundException(__('Invalid facebook category'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookCategory->delete()) {
			$this->Session->setFlash(__('The facebook category has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook category could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookCategory->recursive = 0;
		$this->set('facebookCategories', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookCategory->exists($id)) {
			throw new NotFoundException(__('Invalid facebook category'));
		}
		$options = array('conditions' => array('FacebookCategory.' . $this->FacebookCategory->primaryKey => $id));
		$this->set('facebookCategory', $this->FacebookCategory->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookCategory->create();
			if ($this->FacebookCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook category could not be saved. Please, try again.'));
			}
		}
		$pages = $this->FacebookCategory->Page->find('list');
		$this->set(compact('pages'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookCategory->exists($id)) {
			throw new NotFoundException(__('Invalid facebook category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookCategory.' . $this->FacebookCategory->primaryKey => $id));
			$this->request->data = $this->FacebookCategory->find('first', $options);
		}
		$pages = $this->FacebookCategory->Page->find('list');
		$this->set(compact('pages'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookCategory->id = $id;
		if (!$this->FacebookCategory->exists()) {
			throw new NotFoundException(__('Invalid facebook category'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookCategory->delete()) {
			$this->Session->setFlash(__('The facebook category has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook category could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
