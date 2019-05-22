<?php 

App::uses('AppShell', 'Console/Command');

class BotMoneyShell extends AppShell {

    public $uses = array(
        'Movimiento',
    );

    public function main() {
    	
    	$valorIndicador = $this->valorIndicador( $tipoIndicador = 'rsi',$exchange = 'binance',$cambio = 'BTCUSDT' );

		$precioMoneda = $this->precioMoneda( $pares = 'BTCUSDT' );

        $this->comprar_si_o_no_rsi( $valorIndicador );

    }

    /**
     * [valorIndicador devuelve el valor del indicador segun exchange y tipo de cambio]
     * @param  [string] $tipoIndicador 
     * @param  [string] $exchange      
     * @param  [string] $cambio      
     * @return [array]               
     */
    public function valorIndicador( $tipoIndicador,$exchange,$cambio ){

    	$apiInicial = API_GENERICA.$tipoIndicador.'?secret=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJlbWFpbCI6Im1kcGlsb25lQGdtYWlsLmNvbSIsImlhdCI6MTU1NzI1ODYwOSwiZXhwIjoxNTg4Nzk0NjA5fQ.7pHDKwkxzC6yul9XUKW8pyAeSo6WDoNwVtRUBFihmCA';

		$apiIndicador = $apiInicial.'&exchange='.$exchange.'&symbol='.$cambio.'&interval=1h';

		$json         = file_get_contents($apiIndicador);
        $cur          = json_decode($json);
        $indicator    = get_object_vars($cur);

        return $indicator;

    }

    public function precioMoneda( $pares ){

    	$precio = 'https://api.binance.com/api/v1/ticker/price?symbol='.$pares;

    	$json         = file_get_contents($precio);
        $cur          = json_decode($json);
        $p            = get_object_vars($cur);

        return $p['price'];

    }
    /**
     * [comprar_si_o_no description]
     * @param  [array] $valorIndicador [description]
     * @return [type]                 [description]
     */
    public function comprar_si_o_no_rsi( $valorIndicador ){

        $value = $valorIndicador['value'];
        if( $value <= 30 ){
            // comprar si la ultima operacion no es una compra
            // return 
        }
        if( $value >= 55 ){
            // vender si la ultima operacion no es una venta
            // return 
        }

    }

    public function comprar(  ){


    }

    public function vender(  ){
        
            
    }


    public function dameUltimoTipoDeOperacion(){

    }


}





