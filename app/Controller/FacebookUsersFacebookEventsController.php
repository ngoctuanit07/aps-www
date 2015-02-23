<?php
App::uses('AppController', 'Controller');
/**
 * FacebookUsersFacebookEvents Controller
 *
 * @property FacebookUsersFacebookEvent $FacebookUsersFacebookEvent
 * @property PaginatorComponent $Paginator
 */
class FacebookUsersFacebookEventsController extends AppController {

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
		$this->FacebookUsersFacebookEvent->recursive = 0;
		$this->set('facebookUsersFacebookEvents', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookUsersFacebookEvent->exists($id)) {
			throw new NotFoundException(__('Invalid facebook users facebook event'));
		}
		$options = array('conditions' => array('FacebookUsersFacebookEvent.' . $this->FacebookUsersFacebookEvent->primaryKey => $id));
		$this->set('facebookUsersFacebookEvent', $this->FacebookUsersFacebookEvent->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookUsersFacebookEvent->create();
			if ($this->FacebookUsersFacebookEvent->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook users facebook event has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook users facebook event could not be saved. Please, try again.'));
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
		if (!$this->FacebookUsersFacebookEvent->exists($id)) {
			throw new NotFoundException(__('Invalid facebook users facebook event'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookUsersFacebookEvent->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook users facebook event has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook users facebook event could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookUsersFacebookEvent.' . $this->FacebookUsersFacebookEvent->primaryKey => $id));
			$this->request->data = $this->FacebookUsersFacebookEvent->find('first', $options);
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
		$this->FacebookUsersFacebookEvent->id = $id;
		if (!$this->FacebookUsersFacebookEvent->exists()) {
			throw new NotFoundException(__('Invalid facebook users facebook event'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookUsersFacebookEvent->delete()) {
			$this->Session->setFlash(__('The facebook users facebook event has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook users facebook event could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookUsersFacebookEvent->recursive = 0;
		$this->set('facebookUsersFacebookEvents', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookUsersFacebookEvent->exists($id)) {
			throw new NotFoundException(__('Invalid facebook users facebook event'));
		}
		$options = array('conditions' => array('FacebookUsersFacebookEvent.' . $this->FacebookUsersFacebookEvent->primaryKey => $id));
		$this->set('facebookUsersFacebookEvent', $this->FacebookUsersFacebookEvent->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookUsersFacebookEvent->create();
			if ($this->FacebookUsersFacebookEvent->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook users facebook event has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook users facebook event could not be saved. Please, try again.'));
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
		if (!$this->FacebookUsersFacebookEvent->exists($id)) {
			throw new NotFoundException(__('Invalid facebook users facebook event'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookUsersFacebookEvent->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook users facebook event has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook users facebook event could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookUsersFacebookEvent.' . $this->FacebookUsersFacebookEvent->primaryKey => $id));
			$this->request->data = $this->FacebookUsersFacebookEvent->find('first', $options);
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
		$this->FacebookUsersFacebookEvent->id = $id;
		if (!$this->FacebookUsersFacebookEvent->exists()) {
			throw new NotFoundException(__('Invalid facebook users facebook event'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookUsersFacebookEvent->delete()) {
			$this->Session->setFlash(__('The facebook users facebook event has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook users facebook event could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
