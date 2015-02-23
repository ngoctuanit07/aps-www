<?php
App::uses('AppController', 'Controller');
/**
 * FacebookLikes Controller
 *
 * @property FacebookLike $FacebookLike
 * @property PaginatorComponent $Paginator
 */
class FacebookLikesController extends AppController {

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
		$this->FacebookLike->recursive = 0;
		$this->set('facebookLikes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookLike->exists($id)) {
			throw new NotFoundException(__('Invalid facebook like'));
		}
		$options = array('conditions' => array('FacebookLike.' . $this->FacebookLike->primaryKey => $id));
		$this->set('facebookLike', $this->FacebookLike->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookLike->create();
			if ($this->FacebookLike->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook like has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook like could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookLike->User->find('list');
		$events = $this->FacebookLike->Event->find('list');
		$albums = $this->FacebookLike->Album->find('list');
		$pages = $this->FacebookLike->Page->find('list');
		$posts = $this->FacebookLike->Post->find('list');
		$statuses = $this->FacebookLike->Status->find('list');
		$achivements = $this->FacebookLike->Achivement->find('list');
		$comments = $this->FacebookLike->Comment->find('list');
		$links = $this->FacebookLike->Link->find('list');
		$milestones = $this->FacebookLike->Milestone->find('list');
		$photos = $this->FacebookLike->Photo->find('list');
		$videos = $this->FacebookLike->Video->find('list');
		$this->set(compact('users', 'events', 'albums', 'pages', 'posts', 'statuses', 'achivements', 'comments', 'links', 'milestones', 'photos', 'videos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookLike->exists($id)) {
			throw new NotFoundException(__('Invalid facebook like'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookLike->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook like has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook like could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookLike.' . $this->FacebookLike->primaryKey => $id));
			$this->request->data = $this->FacebookLike->find('first', $options);
		}
		$users = $this->FacebookLike->User->find('list');
		$events = $this->FacebookLike->Event->find('list');
		$albums = $this->FacebookLike->Album->find('list');
		$pages = $this->FacebookLike->Page->find('list');
		$posts = $this->FacebookLike->Post->find('list');
		$statuses = $this->FacebookLike->Status->find('list');
		$achivements = $this->FacebookLike->Achivement->find('list');
		$comments = $this->FacebookLike->Comment->find('list');
		$links = $this->FacebookLike->Link->find('list');
		$milestones = $this->FacebookLike->Milestone->find('list');
		$photos = $this->FacebookLike->Photo->find('list');
		$videos = $this->FacebookLike->Video->find('list');
		$this->set(compact('users', 'events', 'albums', 'pages', 'posts', 'statuses', 'achivements', 'comments', 'links', 'milestones', 'photos', 'videos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookLike->id = $id;
		if (!$this->FacebookLike->exists()) {
			throw new NotFoundException(__('Invalid facebook like'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookLike->delete()) {
			$this->Session->setFlash(__('The facebook like has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook like could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookLike->recursive = 0;
		$this->set('facebookLikes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookLike->exists($id)) {
			throw new NotFoundException(__('Invalid facebook like'));
		}
		$options = array('conditions' => array('FacebookLike.' . $this->FacebookLike->primaryKey => $id));
		$this->set('facebookLike', $this->FacebookLike->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookLike->create();
			if ($this->FacebookLike->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook like has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook like could not be saved. Please, try again.'));
			}
		}
		$users = $this->FacebookLike->User->find('list');
		$events = $this->FacebookLike->Event->find('list');
		$albums = $this->FacebookLike->Album->find('list');
		$pages = $this->FacebookLike->Page->find('list');
		$posts = $this->FacebookLike->Post->find('list');
		$statuses = $this->FacebookLike->Status->find('list');
		$achivements = $this->FacebookLike->Achivement->find('list');
		$comments = $this->FacebookLike->Comment->find('list');
		$links = $this->FacebookLike->Link->find('list');
		$milestones = $this->FacebookLike->Milestone->find('list');
		$photos = $this->FacebookLike->Photo->find('list');
		$videos = $this->FacebookLike->Video->find('list');
		$this->set(compact('users', 'events', 'albums', 'pages', 'posts', 'statuses', 'achivements', 'comments', 'links', 'milestones', 'photos', 'videos'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookLike->exists($id)) {
			throw new NotFoundException(__('Invalid facebook like'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookLike->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook like has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook like could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookLike.' . $this->FacebookLike->primaryKey => $id));
			$this->request->data = $this->FacebookLike->find('first', $options);
		}
		$users = $this->FacebookLike->User->find('list');
		$events = $this->FacebookLike->Event->find('list');
		$albums = $this->FacebookLike->Album->find('list');
		$pages = $this->FacebookLike->Page->find('list');
		$posts = $this->FacebookLike->Post->find('list');
		$statuses = $this->FacebookLike->Status->find('list');
		$achivements = $this->FacebookLike->Achivement->find('list');
		$comments = $this->FacebookLike->Comment->find('list');
		$links = $this->FacebookLike->Link->find('list');
		$milestones = $this->FacebookLike->Milestone->find('list');
		$photos = $this->FacebookLike->Photo->find('list');
		$videos = $this->FacebookLike->Video->find('list');
		$this->set(compact('users', 'events', 'albums', 'pages', 'posts', 'statuses', 'achivements', 'comments', 'links', 'milestones', 'photos', 'videos'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookLike->id = $id;
		if (!$this->FacebookLike->exists()) {
			throw new NotFoundException(__('Invalid facebook like'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookLike->delete()) {
			$this->Session->setFlash(__('The facebook like has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook like could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
