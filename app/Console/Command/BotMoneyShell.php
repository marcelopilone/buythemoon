<?php 

App::uses('AppShell', 'Console/Command');

class BotMoneyShell extends AppShell {

    public $uses = array(
        'Movimiento',
    );

    public function main() {
    	
    	$valorIndicador = $this->valorIndicador( $tipoIndicador = 'rsi',$exchange = 'binance',$cambio = 'BTCUSDT' );

		$precioMoneda = $this->precioMoneda( $pares = 'BTCUSDT' );

        $this->comprar_si_o_no_rsi( $valorIndicador,$precioMoneda );

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

    /**
     * devuelve el precio de la moneda
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
    /**
     * [comprar_si_o_no description]
     * @param  [array] $valorIndicador [description]
     * @return [type]                 [description]
     */
    public function comprar_si_o_no_rsi( $valorIndicador,$precioMoneda ){

        $value = $valorIndicador['value'];
        $ultimaOperacion = $this->dameUltimaOperacion();

        //vendo si comparado con el ultimo precio ya bajo un 5%
        $this->venderSiBajoUn5PorcientoDelUltimoPrecio( $ultimaOperacion );


        if( $value <= 30 ){
            // dameUltimoMovimiento
            // comprar si la ultima operacion no es una compra
            if( $ultimaOperacion['Movimiento']['compra_o_venta'] != TIPO_COMPRA ){
                $this->comprar( $valorIndicador,$precioMoneda );
                // poner stop loss si el ultimo valor del movimiento de compra es un 5% menos esto tiene que interactuar con la api
                // $this->ponerStopLoss();
            }
        }
        if( $value >= 55 ){
            // vender si la ultima operacion no es una venta
            // return 
        }

    }

    /**
     * guarda el movimiento de compra
     * @param  [int] $valorIndicador [description]
     * @param  [int] $precioMoneda   [description]
     * @return [true]                 save
     */
    public function comprar( $valorIndicador,$precioMoneda ){

        $ultimaCantInicial = $this->dameUltimaOperacion();
        $cantInicial = CANTIDAD_INICIAL;
        if( !empty( $ultimaCantInicial ) ){
            $cantInicial = $ultimaCantInicial['Movimiento']['cantidad_inicial'];
        }

        $comprar = array(
            'Movimiento' => array(
                'cantidad_inicial' =>  $cantInicial,
                'cant_monedas' =>  $this->dameCantidadDeMonedas( $cantInicial,$precioMoneda ),
                'precio_compra' => $precioMoneda,
                'moneda_de_intercambio' => 'BTCUSDT',
                'compra_o_venta' => TIPO_COMPRA,
                'rsi' =>  $valorIndicador,
            )
        );


        if( !( $this->Movimiento->save( $comprar ) ) ){
            throw new Exception("Error al guardar");
        }else{
            return true;
        }

    }

    public function vender(  ){
        
            
    }

    /**
     * Devuelve la cant de monedas segun la cant inicial
     * @param  [int] $cantInicial  [description]
     * @param  [int] $precioMoneda [description]
     * @return int
     */
    public function dameCantidadDeMonedas( $cantInicial,$precioMoneda ){

        return $cantInicial / $precioMoneda;

    }

    /**
     * Devuelve el ultimo movimiento
     * @return [array] [description]
     */
    public function dameUltimaOperacion(){

        $ultimaOperacion = $this->Movimiento->find('first',array(
            'limit' => 1,
            'order' => array(
                'Movimiento.id DESC'
            )
        ));

        return $ultimaOperacion;

    }




}





