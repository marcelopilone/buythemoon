<?php
App::uses('AppController', 'Controller');
/**
 * Coins Controller
 *
 * @property Coin $Coin
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class CoinsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Coin->recursive = 0;
		$this->set('coins', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Coin->exists($id)) {
			throw new NotFoundException(__('Invalid coin'));
		}
		$options = array('conditions' => array('Coin.' . $this->Coin->primaryKey => $id));
		$this->set('coin', $this->Coin->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Coin->create();
			if ($this->Coin->save($this->request->data)) {
				$this->Flash->success(__('The coin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The coin could not be saved. Please, try again.'));
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
		if (!$this->Coin->exists($id)) {
			throw new NotFoundException(__('Invalid coin'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Coin->save($this->request->data)) {
				$this->Flash->success(__('The coin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The coin could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Coin.' . $this->Coin->primaryKey => $id));
			$this->request->data = $this->Coin->find('first', $options);
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
		$this->Coin->id = $id;
		if (!$this->Coin->exists()) {
			throw new NotFoundException(__('Invalid coin'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Coin->delete()) {
			$this->Flash->success(__('The coin has been deleted.'));
		} else {
			$this->Flash->error(__('The coin could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
