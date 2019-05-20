<?php 

class BotMoneyShell extends AppShell {

    public function main() {

    	
    	$indicator = $this->valorIndicador( $tipoIndicador = 'rsi',$exchange = 'binance' );
 

 		//BTCUSDT

		 debug( $this->precioMoneda( $pares = 'BTCUSDT' ) );


    }

    
    public function valorIndicador( $tipoIndicador,$exchange ){


    	$apiInicial = 'https://api.taapi.io/'.$tipoIndicador.'?secret=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJlbWFpbCI6Im1kcGlsb25lQGdtYWlsLmNvbSIsImlhdCI6MTU1NzI1ODYwOSwiZXhwIjoxNTg4Nzk0NjA5fQ.7pHDKwkxzC6yul9XUKW8pyAeSo6WDoNwVtRUBFihmCA';

		$apiIndicador = $apiInicial.'&exchange='.$exchange.'&symbol=BTCUSDT&interval=1h';

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

}





