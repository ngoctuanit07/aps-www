<?php
App::uses('AppController', 'Controller');
/**
 * FacebookPostsPrivacies Controller
 *
 * @property FacebookPostsPrivacy $FacebookPostsPrivacy
 * @property PaginatorComponent $Paginator
 */
class FacebookPostsPrivaciesController extends AppController {

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
		$this->FacebookPostsPrivacy->recursive = 0;
		$this->set('facebookPostsPrivacies', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookPostsPrivacy->exists($id)) {
			throw new NotFoundException(__('Invalid facebook posts privacy'));
		}
		$options = array('conditions' => array('FacebookPostsPrivacy.' . $this->FacebookPostsPrivacy->primaryKey => $id));
		$this->set('facebookPostsPrivacy', $this->FacebookPostsPrivacy->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookPostsPrivacy->create();
			if ($this->FacebookPostsPrivacy->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook posts privacy has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook posts privacy could not be saved. Please, try again.'));
			}
		}
		$posts = $this->FacebookPostsPrivacy->Post->find('list');
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
		if (!$this->FacebookPostsPrivacy->exists($id)) {
			throw new NotFoundException(__('Invalid facebook posts privacy'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookPostsPrivacy->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook posts privacy has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook posts privacy could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookPostsPrivacy.' . $this->FacebookPostsPrivacy->primaryKey => $id));
			$this->request->data = $this->FacebookPostsPrivacy->find('first', $options);
		}
		$posts = $this->FacebookPostsPrivacy->Post->find('list');
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
		$this->FacebookPostsPrivacy->id = $id;
		if (!$this->FacebookPostsPrivacy->exists()) {
			throw new NotFoundException(__('Invalid facebook posts privacy'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookPostsPrivacy->delete()) {
			$this->Session->setFlash(__('The facebook posts privacy has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook posts privacy could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookPostsPrivacy->recursive = 0;
		$this->set('facebookPostsPrivacies', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookPostsPrivacy->exists($id)) {
			throw new NotFoundException(__('Invalid facebook posts privacy'));
		}
		$options = array('conditions' => array('FacebookPostsPrivacy.' . $this->FacebookPostsPrivacy->primaryKey => $id));
		$this->set('facebookPostsPrivacy', $this->FacebookPostsPrivacy->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookPostsPrivacy->create();
			if ($this->FacebookPostsPrivacy->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook posts privacy has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook posts privacy could not be saved. Please, try again.'));
			}
		}
		$posts = $this->FacebookPostsPrivacy->Post->find('list');
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
		if (!$this->FacebookPostsPrivacy->exists($id)) {
			throw new NotFoundException(__('Invalid facebook posts privacy'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookPostsPrivacy->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook posts privacy has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook posts privacy could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookPostsPrivacy.' . $this->FacebookPostsPrivacy->primaryKey => $id));
			$this->request->data = $this->FacebookPostsPrivacy->find('first', $options);
		}
		$posts = $this->FacebookPostsPrivacy->Post->find('list');
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
		$this->FacebookPostsPrivacy->id = $id;
		if (!$this->FacebookPostsPrivacy->exists()) {
			throw new NotFoundException(__('Invalid facebook posts privacy'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookPostsPrivacy->delete()) {
			$this->Session->setFlash(__('The facebook posts privacy has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook posts privacy could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
