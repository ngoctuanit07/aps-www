<?php
App::uses('AppController', 'Controller');
/**
 * FacebookComments Controller
 *
 * @property FacebookComment $FacebookComment
 * @property PaginatorComponent $Paginator
 */
class FacebookCommentsController extends AppController {

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
		$this->FacebookComment->recursive = 0;
		$this->set('facebookComments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookComment->exists($id)) {
			throw new NotFoundException(__('Invalid facebook comment'));
		}
		$options = array('conditions' => array('FacebookComment.' . $this->FacebookComment->primaryKey => $id));
		$this->set('facebookComment', $this->FacebookComment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookComment->create();
			if ($this->FacebookComment->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook comment could not be saved. Please, try again.'));
			}
		}
		$achivements = $this->FacebookComment->Achivement->find('list');
		$albums = $this->FacebookComment->Album->find('list');
		$comments = $this->FacebookComment->Comment->find('list');
		$links = $this->FacebookComment->Link->find('list');
		$milestones = $this->FacebookComment->Milestone->find('list');
		$photos = $this->FacebookComment->Photo->find('list');
		$posts = $this->FacebookComment->Post->find('list');
		$statuses = $this->FacebookComment->Status->find('list');
		$users = $this->FacebookComment->User->find('list');
		$videos = $this->FacebookComment->Video->find('list');
		$this->set(compact('achivements', 'albums', 'comments', 'links', 'milestones', 'photos', 'posts', 'statuses', 'users', 'videos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookComment->exists($id)) {
			throw new NotFoundException(__('Invalid facebook comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookComment->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookComment.' . $this->FacebookComment->primaryKey => $id));
			$this->request->data = $this->FacebookComment->find('first', $options);
		}
		$achivements = $this->FacebookComment->Achivement->find('list');
		$albums = $this->FacebookComment->Album->find('list');
		$comments = $this->FacebookComment->Comment->find('list');
		$links = $this->FacebookComment->Link->find('list');
		$milestones = $this->FacebookComment->Milestone->find('list');
		$photos = $this->FacebookComment->Photo->find('list');
		$posts = $this->FacebookComment->Post->find('list');
		$statuses = $this->FacebookComment->Status->find('list');
		$users = $this->FacebookComment->User->find('list');
		$videos = $this->FacebookComment->Video->find('list');
		$this->set(compact('achivements', 'albums', 'comments', 'links', 'milestones', 'photos', 'posts', 'statuses', 'users', 'videos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookComment->id = $id;
		if (!$this->FacebookComment->exists()) {
			throw new NotFoundException(__('Invalid facebook comment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookComment->delete()) {
			$this->Session->setFlash(__('The facebook comment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook comment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookComment->recursive = 0;
		$this->set('facebookComments', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookComment->exists($id)) {
			throw new NotFoundException(__('Invalid facebook comment'));
		}
		$options = array('conditions' => array('FacebookComment.' . $this->FacebookComment->primaryKey => $id));
		$this->set('facebookComment', $this->FacebookComment->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookComment->create();
			if ($this->FacebookComment->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook comment could not be saved. Please, try again.'));
			}
		}
		$achivements = $this->FacebookComment->Achivement->find('list');
		$albums = $this->FacebookComment->Album->find('list');
		$comments = $this->FacebookComment->Comment->find('list');
		$links = $this->FacebookComment->Link->find('list');
		$milestones = $this->FacebookComment->Milestone->find('list');
		$photos = $this->FacebookComment->Photo->find('list');
		$posts = $this->FacebookComment->Post->find('list');
		$statuses = $this->FacebookComment->Status->find('list');
		$users = $this->FacebookComment->User->find('list');
		$videos = $this->FacebookComment->Video->find('list');
		$this->set(compact('achivements', 'albums', 'comments', 'links', 'milestones', 'photos', 'posts', 'statuses', 'users', 'videos'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookComment->exists($id)) {
			throw new NotFoundException(__('Invalid facebook comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookComment->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookComment.' . $this->FacebookComment->primaryKey => $id));
			$this->request->data = $this->FacebookComment->find('first', $options);
		}
		$achivements = $this->FacebookComment->Achivement->find('list');
		$albums = $this->FacebookComment->Album->find('list');
		$comments = $this->FacebookComment->Comment->find('list');
		$links = $this->FacebookComment->Link->find('list');
		$milestones = $this->FacebookComment->Milestone->find('list');
		$photos = $this->FacebookComment->Photo->find('list');
		$posts = $this->FacebookComment->Post->find('list');
		$statuses = $this->FacebookComment->Status->find('list');
		$users = $this->FacebookComment->User->find('list');
		$videos = $this->FacebookComment->Video->find('list');
		$this->set(compact('achivements', 'albums', 'comments', 'links', 'milestones', 'photos', 'posts', 'statuses', 'users', 'videos'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookComment->id = $id;
		if (!$this->FacebookComment->exists()) {
			throw new NotFoundException(__('Invalid facebook comment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookComment->delete()) {
			$this->Session->setFlash(__('The facebook comment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook comment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
