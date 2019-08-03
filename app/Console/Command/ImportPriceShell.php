<?php 

App::uses('AppShell', 'Console/Command');

class ImportPriceShell extends AppShell {

    public $uses = array(
        'Coin',
    );

    public function main() {
    	
		$precioMoneda = $this->precioMoneda( $pares = 'BTCUSDT' );

        $this->Coin->clear();
        $updatePriceBit = array(
            'Coin' => array(
                'id' => 1,
                'amount_usd' => $precioMoneda
            )
        );
        if( $this->Coin->save( $updatePriceBit ) ){
            $this->out('Se actualizo el precio');
        }else{
            throw new Exception("Error in update");
        }

    }
  
    /**
     * devuelve el precio de la moneda en binance
     * @param  [string] $pares [description]
     * @return [int]        [description]
     */
    public function precioMoneda( $pares ){

    	$precio = 'https://api.binance.com/api/v1/ticker/price?symbol='.$pares;

    	$json         = file_get_contents($precio);
        $cur          = json_decode($json);
        $p            = get_object_vars($cur);

        return $p['price'];

    }

}





