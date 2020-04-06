<?php 

App::uses('AppShell', 'Console/Command');

class DeletePlayersShell extends AppShell {

    public $uses = array(
        'Player',
    );

    public function main() {
    	
    	$now =  date('Y-m-d H:i:s');
		$time   = strtotime($now);
		$time   = $time - 86400; //secod of one day
		$beforeOneDay = date("Y-m-d H:i:s", $time);
		$playersMoreThan24Hous = $this->Player->find('list',array(
			'fields' => array(
				'Player.id',
				'Player.id',
			),
			'conditions' => array(
				'Player.created <='  => $beforeOneDay,
			)
		));
		foreach( $playersMoreThan24Hous as $player ){
			$this->Player->clear();
			$this->Player->id = $player;
			if( !( $this->Player->delete() ) ){
				throw new Exception("Error save");
			}
		}
		
    }

}





