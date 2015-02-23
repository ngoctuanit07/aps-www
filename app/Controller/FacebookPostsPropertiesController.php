<?php
App::uses('AppController', 'Controller');
/**
 * FacebookPostsProperties Controller
 *
 * @property FacebookPostsProperty $FacebookPostsProperty
 * @property PaginatorComponent $Paginator
 */
class FacebookPostsPropertiesController extends AppController {

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
		$this->FacebookPostsProperty->recursive = 0;
		$this->set('facebookPostsProperties', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookPostsProperty->exists($id)) {
			throw new NotFoundException(__('Invalid facebook posts property'));
		}
		$options = array('conditions' => array('FacebookPostsProperty.' . $this->FacebookPostsProperty->primaryKey => $id));
		$this->set('facebookPostsProperty', $this->FacebookPostsProperty->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookPostsProperty->create();
			if ($this->FacebookPostsProperty->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook posts property has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook posts property could not be saved. Please, try again.'));
			}
		}
		$posts = $this->FacebookPostsProperty->Post->find('list');
		$this->set(compact('posts'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookPostsProperty->exists($id)) {
			throw new NotFoundException(__('Invalid facebook posts property'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookPostsProperty->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook posts property has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook posts property could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookPostsProperty.' . $this->FacebookPostsProperty->primaryKey => $id));
			$this->request->data = $this->FacebookPostsProperty->find('first', $options);
		}
		$posts = $this->FacebookPostsProperty->Post->find('list');
		$this->set(compact('posts'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookPostsProperty->id = $id;
		if (!$this->FacebookPostsProperty->exists()) {
			throw new NotFoundException(__('Invalid facebook posts property'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookPostsProperty->delete()) {
			$this->Session->setFlash(__('The facebook posts property has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook posts property could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookPostsProperty->recursive = 0;
		$this->set('facebookPostsProperties', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookPostsProperty->exists($id)) {
			throw new NotFoundException(__('Invalid facebook posts property'));
		}
		$options = array('conditions' => array('FacebookPostsProperty.' . $this->FacebookPostsProperty->primaryKey => $id));
		$this->set('facebookPostsProperty', $this->FacebookPostsProperty->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookPostsProperty->create();
			if ($this->FacebookPostsProperty->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook posts property has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook posts property could not be saved. Please, try again.'));
			}
		}
		$posts = $this->FacebookPostsProperty->Post->find('list');
		$this->set(compact('posts'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookPostsProperty->exists($id)) {
			throw new NotFoundException(__('Invalid facebook posts property'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookPostsProperty->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook posts property has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook posts property could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookPostsProperty.' . $this->FacebookPostsProperty->primaryKey => $id));
			$this->request->data = $this->FacebookPostsProperty->find('first', $options);
		}
		$posts = $this->FacebookPostsProperty->Post->find('list');
		$this->set(compact('posts'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookPostsProperty->id = $id;
		if (!$this->FacebookPostsProperty->exists()) {
			throw new NotFoundException(__('Invalid facebook posts property'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookPostsProperty->delete()) {
			$this->Session->setFlash(__('The facebook posts property has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook posts property could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
