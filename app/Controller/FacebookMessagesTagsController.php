<?php
App::uses('AppController', 'Controller');
/**
 * FacebookMessagesTags Controller
 *
 * @property FacebookMessagesTag $FacebookMessagesTag
 * @property PaginatorComponent $Paginator
 */
class FacebookMessagesTagsController extends AppController {

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
		$this->FacebookMessagesTag->recursive = 0;
		$this->set('facebookMessagesTags', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FacebookMessagesTag->exists($id)) {
			throw new NotFoundException(__('Invalid facebook messages tag'));
		}
		$options = array('conditions' => array('FacebookMessagesTag.' . $this->FacebookMessagesTag->primaryKey => $id));
		$this->set('facebookMessagesTag', $this->FacebookMessagesTag->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FacebookMessagesTag->create();
			if ($this->FacebookMessagesTag->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook messages tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook messages tag could not be saved. Please, try again.'));
			}
		}
		$taggingPosts = $this->FacebookMessagesTag->TaggingPost->find('list');
		$users = $this->FacebookMessagesTag->User->find('list');
		$events = $this->FacebookMessagesTag->Event->find('list');
		$albums = $this->FacebookMessagesTag->Album->find('list');
		$pages = $this->FacebookMessagesTag->Page->find('list');
		$posts = $this->FacebookMessagesTag->Post->find('list');
		$statuses = $this->FacebookMessagesTag->Status->find('list');
		$achivements = $this->FacebookMessagesTag->Achivement->find('list');
		$comments = $this->FacebookMessagesTag->Comment->find('list');
		$links = $this->FacebookMessagesTag->Link->find('list');
		$milestones = $this->FacebookMessagesTag->Milestone->find('list');
		$photos = $this->FacebookMessagesTag->Photo->find('list');
		$videos = $this->FacebookMessagesTag->Video->find('list');
		$this->set(compact('taggingPosts', 'users', 'events', 'albums', 'pages', 'posts', 'statuses', 'achivements', 'comments', 'links', 'milestones', 'photos', 'videos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FacebookMessagesTag->exists($id)) {
			throw new NotFoundException(__('Invalid facebook messages tag'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookMessagesTag->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook messages tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook messages tag could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookMessagesTag.' . $this->FacebookMessagesTag->primaryKey => $id));
			$this->request->data = $this->FacebookMessagesTag->find('first', $options);
		}
		$taggingPosts = $this->FacebookMessagesTag->TaggingPost->find('list');
		$users = $this->FacebookMessagesTag->User->find('list');
		$events = $this->FacebookMessagesTag->Event->find('list');
		$albums = $this->FacebookMessagesTag->Album->find('list');
		$pages = $this->FacebookMessagesTag->Page->find('list');
		$posts = $this->FacebookMessagesTag->Post->find('list');
		$statuses = $this->FacebookMessagesTag->Status->find('list');
		$achivements = $this->FacebookMessagesTag->Achivement->find('list');
		$comments = $this->FacebookMessagesTag->Comment->find('list');
		$links = $this->FacebookMessagesTag->Link->find('list');
		$milestones = $this->FacebookMessagesTag->Milestone->find('list');
		$photos = $this->FacebookMessagesTag->Photo->find('list');
		$videos = $this->FacebookMessagesTag->Video->find('list');
		$this->set(compact('taggingPosts', 'users', 'events', 'albums', 'pages', 'posts', 'statuses', 'achivements', 'comments', 'links', 'milestones', 'photos', 'videos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FacebookMessagesTag->id = $id;
		if (!$this->FacebookMessagesTag->exists()) {
			throw new NotFoundException(__('Invalid facebook messages tag'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookMessagesTag->delete()) {
			$this->Session->setFlash(__('The facebook messages tag has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook messages tag could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookMessagesTag->recursive = 0;
		$this->set('facebookMessagesTags', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->FacebookMessagesTag->exists($id)) {
			throw new NotFoundException(__('Invalid facebook messages tag'));
		}
		$options = array('conditions' => array('FacebookMessagesTag.' . $this->FacebookMessagesTag->primaryKey => $id));
		$this->set('facebookMessagesTag', $this->FacebookMessagesTag->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookMessagesTag->create();
			if ($this->FacebookMessagesTag->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook messages tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook messages tag could not be saved. Please, try again.'));
			}
		}
		$taggingPosts = $this->FacebookMessagesTag->TaggingPost->find('list');
		$users = $this->FacebookMessagesTag->User->find('list');
		$events = $this->FacebookMessagesTag->Event->find('list');
		$albums = $this->FacebookMessagesTag->Album->find('list');
		$pages = $this->FacebookMessagesTag->Page->find('list');
		$posts = $this->FacebookMessagesTag->Post->find('list');
		$statuses = $this->FacebookMessagesTag->Status->find('list');
		$achivements = $this->FacebookMessagesTag->Achivement->find('list');
		$comments = $this->FacebookMessagesTag->Comment->find('list');
		$links = $this->FacebookMessagesTag->Link->find('list');
		$milestones = $this->FacebookMessagesTag->Milestone->find('list');
		$photos = $this->FacebookMessagesTag->Photo->find('list');
		$videos = $this->FacebookMessagesTag->Video->find('list');
		$this->set(compact('taggingPosts', 'users', 'events', 'albums', 'pages', 'posts', 'statuses', 'achivements', 'comments', 'links', 'milestones', 'photos', 'videos'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->FacebookMessagesTag->exists($id)) {
			throw new NotFoundException(__('Invalid facebook messages tag'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FacebookMessagesTag->save($this->request->data)) {
				$this->Session->setFlash(__('The facebook messages tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The facebook messages tag could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FacebookMessagesTag.' . $this->FacebookMessagesTag->primaryKey => $id));
			$this->request->data = $this->FacebookMessagesTag->find('first', $options);
		}
		$taggingPosts = $this->FacebookMessagesTag->TaggingPost->find('list');
		$users = $this->FacebookMessagesTag->User->find('list');
		$events = $this->FacebookMessagesTag->Event->find('list');
		$albums = $this->FacebookMessagesTag->Album->find('list');
		$pages = $this->FacebookMessagesTag->Page->find('list');
		$posts = $this->FacebookMessagesTag->Post->find('list');
		$statuses = $this->FacebookMessagesTag->Status->find('list');
		$achivements = $this->FacebookMessagesTag->Achivement->find('list');
		$comments = $this->FacebookMessagesTag->Comment->find('list');
		$links = $this->FacebookMessagesTag->Link->find('list');
		$milestones = $this->FacebookMessagesTag->Milestone->find('list');
		$photos = $this->FacebookMessagesTag->Photo->find('list');
		$videos = $this->FacebookMessagesTag->Video->find('list');
		$this->set(compact('taggingPosts', 'users', 'events', 'albums', 'pages', 'posts', 'statuses', 'achivements', 'comments', 'links', 'milestones', 'photos', 'videos'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->FacebookMessagesTag->id = $id;
		if (!$this->FacebookMessagesTag->exists()) {
			throw new NotFoundException(__('Invalid facebook messages tag'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FacebookMessagesTag->delete()) {
			$this->Session->setFlash(__('The facebook messages tag has been deleted.'));
		} else {
			$this->Session->setFlash(__('The facebook messages tag could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
