<?php
App::uses('AppController', 'Controller');
/**
 * FacebookMilestones Controller
 *
 * @property FacebookMilestone $FacebookMilestone
 * @property PaginatorComponent $Paginator
 */
class FacebookMilestonesController extends AppController {

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
		$this->FacebookMilestone->recursive = 0;
		$this->set('facebookMilestones', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookMilestone->exists($id)) {
			throw new NotFoundException(__('Invalid facebook milestone'));
		}
		$options = array('conditions' => array('FacebookMilestone.' . $this->FacebookMilestone->primaryKey => $id));
		$this->set('facebookMilestone', $this->FacebookMilestone->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookMilestone->create();
			if ($this->FacebookMilestone->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook milestone has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook milestone could not be saved. Please, try again.'));
			}
		}
		$pages = $this->FacebookMilestone->Page->find('list');
		$facebookPhotos = $this->FacebookMilestone->FacebookPhoto->find('list');
		$this->set(compact('pages', 'facebookPhotos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookMilestone->exists($id)) {
			throw new NotFoundException(__('Invalid facebook milestone'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookMilestone->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook milestone has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook milestone could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookMilestone.' . $this->FacebookMilestone->primaryKey => $id));
			$this->request->data = $this->FacebookMilestone->find('first', $options);
		}
		$pages = $this->FacebookMilestone->Page->find('list');
		$facebookPhotos = $this->FacebookMilestone->FacebookPhoto->find('list');
		$this->set(compact('pages', 'facebookPhotos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookMilestone->id = $id;
		if (!$this->FacebookMilestone->exists()) {
			throw new NotFoundException(__('Invalid facebook milestone'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookMilestone->delete()) {
			$this->Session->setFlash(__('The facebook milestone has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook milestone could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookMilestone->recursive = 0;
		$this->set('facebookMilestones', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookMilestone->exists($id)) {
			throw new NotFoundException(__('Invalid facebook milestone'));
		}
		$options = array('conditions' => array('FacebookMilestone.' . $this->FacebookMilestone->primaryKey => $id));
		$this->set('facebookMilestone', $this->FacebookMilestone->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookMilestone->create();
			if ($this->FacebookMilestone->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook milestone has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook milestone could not be saved. Please, try again.'));
			}
		}
		$pages = $this->FacebookMilestone->Page->find('list');
		$facebookPhotos = $this->FacebookMilestone->FacebookPhoto->find('list');
		$this->set(compact('pages', 'facebookPhotos'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookMilestone->exists($id)) {
			throw new NotFoundException(__('Invalid facebook milestone'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookMilestone->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook milestone has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook milestone could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookMilestone.' . $this->FacebookMilestone->primaryKey => $id));
			$this->request->data = $this->FacebookMilestone->find('first', $options);
		}
		$pages = $this->FacebookMilestone->Page->find('list');
		$facebookPhotos = $this->FacebookMilestone->FacebookPhoto->find('list');
		$this->set(compact('pages', 'facebookPhotos'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookMilestone->id = $id;
		if (!$this->FacebookMilestone->exists()) {
			throw new NotFoundException(__('Invalid facebook milestone'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookMilestone->delete()) {
			$this->Session->setFlash(__('The facebook milestone has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook milestone could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
