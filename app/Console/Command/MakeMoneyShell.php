<?php

class MakeMoneyShell extends AppShell {

    public function main() {

    	$this->out('<info>Empezando las operaciones</info>');

        $Movimiento   = ClassRegistry::init('Movimiento');

        $cantMovimientos = $Movimiento->find('count');

        if( empty( $cantMovimientos ) ){

        	$this->out('<success>.............................. . . .</success>');
        	$this->out('<success>.............................. . . .</success>');
        	$this->out('<success>.............................. . . .</success>');
        	$this->out('<success>Iniciando el proceso de compra . . .</success>');
        	$this->out('<success>.............................. . . .</success>');
        	$this->out('<success>.............................. . . .</success>');
        	$this->out('<success>.............................. . . .</success>');

	        $cantInicial = 100;

	        $operacionParaGuardar = 'https://bittrex.com/api/v1.1/public/getmarketsummary?market=usdt-neo';

	        $json = file_get_contents($operacionParaGuardar);
			$cur  = json_decode($json);
			$c    = get_object_vars($cur);

			$guardarMovimiento = array(
				'Movimiento' => array(
					'moneda_de_intercambio' => $c['result'][0]->MarketName,
					'precio_compra'         => $c['result'][0]->Last,
					'cantidad_inicial'      => $cantInicial,
				)
			);

			if( ! $Movimiento->save( $guardarMovimiento ) ){
				$this->out('<error>No se pudo inicializar las operaciones</error>');
			}

        }else{
        	$this->out('<info>.............................. . . .</info>');
        	$this->out('<info>.............................. . . .</info>');
        	$this->out('<info>.............................. . . .</info>');
        	$this->out('<info>Ya se hizo una compra, voy a analizar si se gano plata o no ..</info>');
        	$this->out('<info>.............................. . . .</info>');
        	$this->out('<info>.............................. . . .</info>');
        	$this->out('<info>.............................. . . .</info>');

        }


		

    	

    }

}