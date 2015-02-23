<?php
App::uses('AppController', 'Controller');
/**
 * FacebookConcentrations Controller
 *
 * @property FacebookConcentration $FacebookConcentration
 * @property PaginatorComponent $Paginator
 */
class FacebookConcentrationsController extends AppController {

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
		$this->FacebookConcentration->recursive = 0;
		$this->set('facebookConcentrations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookConcentration->exists($id)) {
			throw new NotFoundException(__('Invalid facebook concentration'));
		}
		$options = array('conditions' => array('FacebookConcentration.' . $this->FacebookConcentration->primaryKey => $id));
		$this->set('facebookConcentration', $this->FacebookConcentration->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookConcentration->create();
			if ($this->FacebookConcentration->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook concentration has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook concentration could not be saved. Please, try again.'));
			}
		}
		$educations = $this->FacebookConcentration->Education->find('list');
		$pages = $this->FacebookConcentration->Page->find('list');
		$this->set(compact('educations', 'pages'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookConcentration->exists($id)) {
			throw new NotFoundException(__('Invalid facebook concentration'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookConcentration->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook concentration has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook concentration could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookConcentration.' . $this->FacebookConcentration->primaryKey => $id));
			$this->request->data = $this->FacebookConcentration->find('first', $options);
		}
		$educations = $this->FacebookConcentration->Education->find('list');
		$pages = $this->FacebookConcentration->Page->find('list');
		$this->set(compact('educations', 'pages'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookConcentration->id = $id;
		if (!$this->FacebookConcentration->exists()) {
			throw new NotFoundException(__('Invalid facebook concentration'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookConcentration->delete()) {
			$this->Session->setFlash(__('The facebook concentration has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook concentration could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookConcentration->recursive = 0;
		$this->set('facebookConcentrations', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookConcentration->exists($id)) {
			throw new NotFoundException(__('Invalid facebook concentration'));
		}
		$options = array('conditions' => array('FacebookConcentration.' . $this->FacebookConcentration->primaryKey => $id));
		$this->set('facebookConcentration', $this->FacebookConcentration->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookConcentration->create();
			if ($this->FacebookConcentration->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook concentration has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook concentration could not be saved. Please, try again.'));
			}
		}
		$educations = $this->FacebookConcentration->Education->find('list');
		$pages = $this->FacebookConcentration->Page->find('list');
		$this->set(compact('educations', 'pages'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookConcentration->exists($id)) {
			throw new NotFoundException(__('Invalid facebook concentration'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookConcentration->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook concentration has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook concentration could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookConcentration.' . $this->FacebookConcentration->primaryKey => $id));
			$this->request->data = $this->FacebookConcentration->find('first', $options);
		}
		$educations = $this->FacebookConcentration->Education->find('list');
		$pages = $this->FacebookConcentration->Page->find('list');
		$this->set(compact('educations', 'pages'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookConcentration->id = $id;
		if (!$this->FacebookConcentration->exists()) {
			throw new NotFoundException(__('Invalid facebook concentration'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookConcentration->delete()) {
			$this->Session->setFlash(__('The facebook concentration has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook concentration could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
