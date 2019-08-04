<?php
App::uses('AppController', 'Controller');
/**
 * Players Controller
 *
 * @property Player $Player
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class PlayersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('start_game','playing','price_bitcoin','ranking');
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Player->recursive = 0;
		$this->set('players', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Player->exists($id)) {
			throw new NotFoundException(__('Invalid player'));
		}
		$options = array('conditions' => array('Player.' . $this->Player->primaryKey => $id));
		$this->set('player', $this->Player->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Player->create();
			if ($this->Player->save($this->request->data)) {
				$this->Flash->success(__('The player has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The player could not be saved. Please, try again.'));
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
		if (!$this->Player->exists($id)) {
			throw new NotFoundException(__('Invalid player'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Player->save($this->request->data)) {
				$this->Flash->success(__('The player has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The player could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Player.' . $this->Player->primaryKey => $id));
			$this->request->data = $this->Player->find('first', $options);
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
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid cuota mensuale'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Player->delete()) {
			$this->Flash->success(__('The cuota mensuale has been deleted.'));
		} else {
			$this->Flash->error(__('The cuota mensuale could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function start_game( ){
		if ($this->request->is('post')) {
			$startPlay = array(
				'Player' => array(
					'name' => $this->request->data['Player']['name'],
					'amount_usd' => 500.00,
					'ip_client' =>$_SERVER['REMOTE_ADDR']
				)
			);
			$this->Player->clear();
			if( $this->Player->save( $startPlay ) ){
				return $this->redirect(
					array('action' => 'playing',$this->Player->id)
				);
			}
		}


	}

	public function price_bitcoin() {
		$this->layout = false;
	}

	public function ranking( $idUser ){
		$this->layout = false;	
		$allPlayers = $this->Player->find('all',array(
			'recursive' => -1,
			'order' => array(
				'Player.amount_usd DESC'
			),
		));

		$ranking = $this->Player->find('all',array(
			'recursive' => -1,
			'order' => array(
				'Player.amount_usd DESC'
			),
			'limit' => 10
		));

		$rank = array();
		foreach( $allPlayers as $k=>$p ){
			$rank[$p['Player']['id']] = $k+1;
		}
		$rankPlayer = $rank[ $idUser ];

		$this->set(compact('player','ranking','rankPlayer'));
	}

	public function rules(  ){		
		
	}

	public function playing( $idUser ){

		$player = $this->Player->find('first',array(
			'recursive' => -1,
			'conditions' => array(
				'Player.id' => $idUser
			)
		));

		

		$this->set(compact('player','ranking','rankPlayer'));


	}

}
