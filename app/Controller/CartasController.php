<?php
App::uses('AppController', 'Controller');
/**
 * Cartas Controller
 *
 * @property Carta $Carta
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class CartasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

	public function beforeFilter(){
		parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('todas_las_cartas');
		$this->response->header([
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Headers' => 'Origin, X-Requested-With, Content-Type, Accept',
            'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE',
        ]);
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Carta->recursive = 0;
		$this->set('cartas', $this->Paginator->paginate());
	}

	public function todas_las_cartas() {
		$this->layout = false;
		$cartas = $this->Carta->find('all',array(
			'limit' => 12,
			'order' => 'rand()',
		));
		$valores = array();
		foreach($cartas as $c){
			$valores[] = $c['Carta']['valor'];
		}
		foreach( $cartas as &$c ){
			$c['Carta']['minimo'] = min($valores);
			$c['Carta']['maximo'] = max($valores);
		}
		$this->set('cartas', $cartas);
		$this->set('_serialize', array('cartas'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Carta->exists($id)) {
			throw new NotFoundException(__('Invalid carta'));
		}
		$options = array('conditions' => array('Carta.' . $this->Carta->primaryKey => $id));
		$this->set('carta', $this->Carta->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Carta->create();
			if ($this->Carta->save($this->request->data)) {
				$this->Flash->success(__('The carta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The carta could not be saved. Please, try again.'));
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
		if (!$this->Carta->exists($id)) {
			throw new NotFoundException(__('Invalid carta'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Carta->save($this->request->data)) {
				$this->Flash->success(__('The carta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The carta could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Carta.' . $this->Carta->primaryKey => $id));
			$this->request->data = $this->Carta->find('first', $options);
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
		$this->Carta->id = $id;
		if (!$this->Carta->exists()) {
			throw new NotFoundException(__('Invalid carta'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Carta->delete()) {
			$this->Flash->success(__('The carta has been deleted.'));
		} else {
			$this->Flash->error(__('The carta could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Carta->recursive = 0;
		$this->set('cartas', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Carta->exists($id)) {
			throw new NotFoundException(__('Invalid carta'));
		}
		$options = array('conditions' => array('Carta.' . $this->Carta->primaryKey => $id));
		$this->set('carta', $this->Carta->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Carta->create();
			if ($this->Carta->save($this->request->data)) {
				$this->Flash->success(__('The carta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The carta could not be saved. Please, try again.'));
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
		if (!$this->Carta->exists($id)) {
			throw new NotFoundException(__('Invalid carta'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Carta->save($this->request->data)) {
				$this->Flash->success(__('The carta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The carta could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Carta.' . $this->Carta->primaryKey => $id));
			$this->request->data = $this->Carta->find('first', $options);
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
		$this->Carta->id = $id;
		if (!$this->Carta->exists()) {
			throw new NotFoundException(__('Invalid carta'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Carta->delete()) {
			$this->Flash->success(__('The carta has been deleted.'));
		} else {
			$this->Flash->error(__('The carta could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
