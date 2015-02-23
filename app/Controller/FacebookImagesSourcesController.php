<?php
App::uses('AppController', 'Controller');
/**
 * FacebookImagesSources Controller
 *
 * @property FacebookImagesSource $FacebookImagesSource
 * @property PaginatorComponent $Paginator
 */
class FacebookImagesSourcesController extends AppController {

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
		$this->FacebookImagesSource->recursive = 0;
		$this->set('facebookImagesSources', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookImagesSource->exists($id)) {
			throw new NotFoundException(__('Invalid facebook images source'));
		}
		$options = array('conditions' => array('FacebookImagesSource.' . $this->FacebookImagesSource->primaryKey => $id));
		$this->set('facebookImagesSource', $this->FacebookImagesSource->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookImagesSource->create();
			if ($this->FacebookImagesSource->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook images source has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook images source could not be saved. Please, try again.'));
			}
		}
		$photos = $this->FacebookImagesSource->Photo->find('list');
		$this->set(compact('photos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookImagesSource->exists($id)) {
			throw new NotFoundException(__('Invalid facebook images source'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookImagesSource->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook images source has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook images source could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookImagesSource.' . $this->FacebookImagesSource->primaryKey => $id));
			$this->request->data = $this->FacebookImagesSource->find('first', $options);
		}
		$photos = $this->FacebookImagesSource->Photo->find('list');
		$this->set(compact('photos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookImagesSource->id = $id;
		if (!$this->FacebookImagesSource->exists()) {
			throw new NotFoundException(__('Invalid facebook images source'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookImagesSource->delete()) {
			$this->Session->setFlash(__('The facebook images source has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook images source could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookImagesSource->recursive = 0;
		$this->set('facebookImagesSources', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookImagesSource->exists($id)) {
			throw new NotFoundException(__('Invalid facebook images source'));
		}
		$options = array('conditions' => array('FacebookImagesSource.' . $this->FacebookImagesSource->primaryKey => $id));
		$this->set('facebookImagesSource', $this->FacebookImagesSource->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookImagesSource->create();
			if ($this->FacebookImagesSource->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook images source has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook images source could not be saved. Please, try again.'));
			}
		}
		$photos = $this->FacebookImagesSource->Photo->find('list');
		$this->set(compact('photos'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookImagesSource->exists($id)) {
			throw new NotFoundException(__('Invalid facebook images source'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookImagesSource->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook images source has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook images source could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookImagesSource.' . $this->FacebookImagesSource->primaryKey => $id));
			$this->request->data = $this->FacebookImagesSource->find('first', $options);
		}
		$photos = $this->FacebookImagesSource->Photo->find('list');
		$this->set(compact('photos'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookImagesSource->id = $id;
		if (!$this->FacebookImagesSource->exists()) {
			throw new NotFoundException(__('Invalid facebook images source'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookImagesSource->delete()) {
			$this->Session->setFlash(__('The facebook images source has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook images source could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
