<?php
App::uses('AppController', 'Controller');
/**
 * FacebookPhotosFacebookMilestones Controller
 *
 * @property FacebookPhotosFacebookMilestone $FacebookPhotosFacebookMilestone
 * @property PaginatorComponent $Paginator
 */
class FacebookPhotosFacebookMilestonesController extends AppController {

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
		$this->FacebookPhotosFacebookMilestone->recursive = 0;
		$this->set('facebookPhotosFacebookMilestones', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookPhotosFacebookMilestone->exists($id)) {
			throw new NotFoundException(__('Invalid facebook photos facebook milestone'));
		}
		$options = array('conditions' => array('FacebookPhotosFacebookMilestone.' . $this->FacebookPhotosFacebookMilestone->primaryKey => $id));
		$this->set('facebookPhotosFacebookMilestone', $this->FacebookPhotosFacebookMilestone->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookPhotosFacebookMilestone->create();
			if ($this->FacebookPhotosFacebookMilestone->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook photos facebook milestone has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook photos facebook milestone could not be saved. Please, try again.'));
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
		if (!$this->FacebookPhotosFacebookMilestone->exists($id)) {
			throw new NotFoundException(__('Invalid facebook photos facebook milestone'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookPhotosFacebookMilestone->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook photos facebook milestone has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook photos facebook milestone could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookPhotosFacebookMilestone.' . $this->FacebookPhotosFacebookMilestone->primaryKey => $id));
			$this->request->data = $this->FacebookPhotosFacebookMilestone->find('first', $options);
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
		$this->FacebookPhotosFacebookMilestone->id = $id;
		if (!$this->FacebookPhotosFacebookMilestone->exists()) {
			throw new NotFoundException(__('Invalid facebook photos facebook milestone'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookPhotosFacebookMilestone->delete()) {
			$this->Session->setFlash(__('The facebook photos facebook milestone has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook photos facebook milestone could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookPhotosFacebookMilestone->recursive = 0;
		$this->set('facebookPhotosFacebookMilestones', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookPhotosFacebookMilestone->exists($id)) {
			throw new NotFoundException(__('Invalid facebook photos facebook milestone'));
		}
		$options = array('conditions' => array('FacebookPhotosFacebookMilestone.' . $this->FacebookPhotosFacebookMilestone->primaryKey => $id));
		$this->set('facebookPhotosFacebookMilestone', $this->FacebookPhotosFacebookMilestone->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookPhotosFacebookMilestone->create();
			if ($this->FacebookPhotosFacebookMilestone->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook photos facebook milestone has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook photos facebook milestone could not be saved. Please, try again.'));
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
		if (!$this->FacebookPhotosFacebookMilestone->exists($id)) {
			throw new NotFoundException(__('Invalid facebook photos facebook milestone'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookPhotosFacebookMilestone->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook photos facebook milestone has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook photos facebook milestone could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookPhotosFacebookMilestone.' . $this->FacebookPhotosFacebookMilestone->primaryKey => $id));
			$this->request->data = $this->FacebookPhotosFacebookMilestone->find('first', $options);
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
		$this->FacebookPhotosFacebookMilestone->id = $id;
		if (!$this->FacebookPhotosFacebookMilestone->exists()) {
			throw new NotFoundException(__('Invalid facebook photos facebook milestone'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookPhotosFacebookMilestone->delete()) {
			$this->Session->setFlash(__('The facebook photos facebook milestone has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook photos facebook milestone could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
