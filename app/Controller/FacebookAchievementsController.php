<?php
App::uses('AppController', 'Controller');
/**
 * FacebookAchievements Controller
 *
 * @property FacebookAchievement $FacebookAchievement
 * @property PaginatorComponent $Paginator
 */
class FacebookAchievementsController extends AppController {

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
		$this->FacebookAchievement->recursive = 0;
		$this->set('facebookAchievements', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookAchievement->exists($id)) {
			throw new NotFoundException(__('Invalid facebook achievement'));
		}
		$options = array('conditions' => array('FacebookAchievement.' . $this->FacebookAchievement->primaryKey => $id));
		$this->set('facebookAchievement', $this->FacebookAchievement->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookAchievement->create();
			if ($this->FacebookAchievement->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook achievement has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook achievement could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookAchievement->User->find('list');
		$applications = $this->FacebookAchievement->Application->find('list');
		$this->set(compact('users', 'applications'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookAchievement->exists($id)) {
			throw new NotFoundException(__('Invalid facebook achievement'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookAchievement->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook achievement has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook achievement could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookAchievement.' . $this->FacebookAchievement->primaryKey => $id));
			$this->request->data = $this->FacebookAchievement->find('first', $options);
		}
		$users = $this->FacebookAchievement->User->find('list');
		$applications = $this->FacebookAchievement->Application->find('list');
		$this->set(compact('users', 'applications'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookAchievement->id = $id;
		if (!$this->FacebookAchievement->exists()) {
			throw new NotFoundException(__('Invalid facebook achievement'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookAchievement->delete()) {
			$this->Session->setFlash(__('The facebook achievement has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook achievement could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookAchievement->recursive = 0;
		$this->set('facebookAchievements', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookAchievement->exists($id)) {
			throw new NotFoundException(__('Invalid facebook achievement'));
		}
		$options = array('conditions' => array('FacebookAchievement.' . $this->FacebookAchievement->primaryKey => $id));
		$this->set('facebookAchievement', $this->FacebookAchievement->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookAchievement->create();
			if ($this->FacebookAchievement->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook achievement has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook achievement could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookAchievement->User->find('list');
		$applications = $this->FacebookAchievement->Application->find('list');
		$this->set(compact('users', 'applications'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookAchievement->exists($id)) {
			throw new NotFoundException(__('Invalid facebook achievement'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookAchievement->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook achievement has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook achievement could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookAchievement.' . $this->FacebookAchievement->primaryKey => $id));
			$this->request->data = $this->FacebookAchievement->find('first', $options);
		}
		$users = $this->FacebookAchievement->User->find('list');
		$applications = $this->FacebookAchievement->Application->find('list');
		$this->set(compact('users', 'applications'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookAchievement->id = $id;
		if (!$this->FacebookAchievement->exists()) {
			throw new NotFoundException(__('Invalid facebook achievement'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookAchievement->delete()) {
			$this->Session->setFlash(__('The facebook achievement has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook achievement could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
