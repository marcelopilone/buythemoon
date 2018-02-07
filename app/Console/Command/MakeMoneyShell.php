<?php

App::uses('AppShell', 'Console/Command');

class MakeMoneyShell extends AppShell {

	public $uses = array(
		'Movimiento',
	);


    public function main() {

    	$this->out('<info>Empezando las operaciones</info>');

        $cantMovimientos = $this->Movimiento->find('count');

        $cantInicial = 100;

        $operacionParaGuardar = 'https://bittrex.com/api/v1.1/public/getmarketsummary?market=usdt-neo';

        $json = file_get_contents($operacionParaGuardar);
		$cur  = json_decode($json);
		$c    = get_object_vars($cur);

        if( empty( $cantMovimientos ) ){

        	$this->out('<success>.............................. . . .</success>');
        	$this->out('<success>Iniciando el proceso de compra . . .</success>');
        	$this->out('<success>.............................. . . .</success>');

			$this->comprar( $c,$cantInicial );

        }else{
        	$this->out('<info>.............................. . . .</info>');
        	$this->out('<info>Ya se hizo una compra, voy a analizar si se gano plata o no ..</info>');
        	$this->out('<info>.............................. . . .</info>');

        	$this->MovimientoParaAnalizar = $this->Movimiento->find('first',array(
        		'recursive' => -1,
        		'limit' => 1,
        		'conditions' => array(
        			'Movimiento.compra_o_venta' => false
        		),
        	));
        	$precioCompra = $this->MovimientoParaAnalizar['Movimiento']['precio_compra'];
        	$precioBittrex = $this->MovimientoParaAnalizar['Movimiento']['precio_compra'];

        	$seGano = calcularPorcentaje( $precioCompra,$c['result'][0]->Last );

        	if( !empty( $seGano ) ){
        		$this->vender( $c,$seGano );

        		$this->out('<success>****************Se vendio************************</success>');

        	}else{
        		$this->out('<info>Todavia no hubo ganancia</info>');
        	}


        }


    }

    
    public function vender( $c,$seGano ){
    	
		$cantFinal = $c['result'][0]->Last * $this->MovimientoParaAnalizar['Movimiento']['cant_monedas'];
		$guardarMovimientoVenta = array(
			'Movimiento' => array(
				'id' => $this->MovimientoParaAnalizar['Movimiento']['id'],
				'precio_venta' => $c['result'][0]->Last,
				'porcentaje' => $seGano,
				'cantidad_final' => $cantFinal,
				'compra_o_venta' => true,
			),
		);

		return $this->Movimiento->save( $guardarMovimientoVenta );

    }

    public function comprar( $c,$cantInicial ){

    	$guardarMovimiento = array(
			'Movimiento' => array(
				'moneda_de_intercambio' => $c['result'][0]->MarketName,
				'precio_compra'         => $c['result'][0]->Last,
				'cantidad_inicial'      => $cantInicial,
				'cant_monedas'          => $cantInicial / $c['result'][0]->Last,
			)
		);

    	return $this->Movimiento->save( $guardarMovimiento );

    }


}