<?php
App::uses('AppController', 'Controller');
/**
 * FacebookFormats Controller
 *
 * @property FacebookFormat $FacebookFormat
 * @property PaginatorComponent $Paginator
 */
class FacebookFormatsController extends AppController {

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
		$this->FacebookFormat->recursive = 0;
		$this->set('facebookFormats', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookFormat->exists($id)) {
			throw new NotFoundException(__('Invalid facebook format'));
		}
		$options = array('conditions' => array('FacebookFormat.' . $this->FacebookFormat->primaryKey => $id));
		$this->set('facebookFormat', $this->FacebookFormat->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookFormat->create();
			if ($this->FacebookFormat->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook format has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook format could not be saved. Please, try again.'));
			}
		}
		$videos = $this->FacebookFormat->Video->find('list');
		$this->set(compact('videos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookFormat->exists($id)) {
			throw new NotFoundException(__('Invalid facebook format'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookFormat->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook format has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook format could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookFormat.' . $this->FacebookFormat->primaryKey => $id));
			$this->request->data = $this->FacebookFormat->find('first', $options);
		}
		$videos = $this->FacebookFormat->Video->find('list');
		$this->set(compact('videos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookFormat->id = $id;
		if (!$this->FacebookFormat->exists()) {
			throw new NotFoundException(__('Invalid facebook format'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookFormat->delete()) {
			$this->Session->setFlash(__('The facebook format has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook format could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookFormat->recursive = 0;
		$this->set('facebookFormats', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookFormat->exists($id)) {
			throw new NotFoundException(__('Invalid facebook format'));
		}
		$options = array('conditions' => array('FacebookFormat.' . $this->FacebookFormat->primaryKey => $id));
		$this->set('facebookFormat', $this->FacebookFormat->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookFormat->create();
			if ($this->FacebookFormat->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook format has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook format could not be saved. Please, try again.'));
			}
		}
		$videos = $this->FacebookFormat->Video->find('list');
		$this->set(compact('videos'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookFormat->exists($id)) {
			throw new NotFoundException(__('Invalid facebook format'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookFormat->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook format has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook format could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookFormat.' . $this->FacebookFormat->primaryKey => $id));
			$this->request->data = $this->FacebookFormat->find('first', $options);
		}
		$videos = $this->FacebookFormat->Video->find('list');
		$this->set(compact('videos'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookFormat->id = $id;
		if (!$this->FacebookFormat->exists()) {
			throw new NotFoundException(__('Invalid facebook format'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookFormat->delete()) {
			$this->Session->setFlash(__('The facebook format has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook format could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
