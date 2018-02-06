<?php

App::uses('AppShell', 'Console/Command');

class MakeMoneyShell extends AppShell {

    public function main() {

    	$this->out('<info>Empezando las operaciones</info>');

        $Movimiento   = ClassRegistry::init('Movimiento');

        $cantMovimientos = $Movimiento->find('count');

        $cantInicial = 100;

        $operacionParaGuardar = 'https://bittrex.com/api/v1.1/public/getmarketsummary?market=usdt-neo';

        $json = file_get_contents($operacionParaGuardar);
		$cur  = json_decode($json);
		$c    = get_object_vars($cur);

        if( empty( $cantMovimientos ) ){

        	$this->out('<success>.............................. . . .</success>');
        	$this->out('<success>.............................. . . .</success>');
        	$this->out('<success>.............................. . . .</success>');
        	$this->out('<success>Iniciando el proceso de compra . . .</success>');
        	$this->out('<success>.............................. . . .</success>');
        	$this->out('<success>.............................. . . .</success>');
        	$this->out('<success>.............................. . . .</success>');


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

        	$movimientoParaAnalizar = $Movimiento->find('first',array(
        		'recursive' => -1,
        		'limit' => 1,
        		'order' => array(
        			'Movimiento.id DESC'
        		)
        	));


        }


    }

    public function calcularPorcentaje( $precioCompra,$precioBitrex ){

    	$seGano = false;

    	$porcentaje = $precioBitrex * CIEN_PORCIENTO / $precioCompra;

		$porcentaje = $porcentaje - CIEN_PORCIENTO;

		// Por ahora para probar es un 2% fijo
		if( $porcentaje > 2 ){
			$seGano = $porcentaje;			
		}

		return $seGano;

    }



}