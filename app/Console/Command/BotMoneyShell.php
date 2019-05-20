<?php 

class BotMoneyShell extends AppShell {

    public function main() {

		$apiIndicador = 'https://api.taapi.io/macd?secret=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJlbWFpbCI6Im1kcGlsb25lQGdtYWlsLmNvbSIsImlhdCI6MTU1NzI1ODYwOSwiZXhwIjoxNTg4Nzk0NjA5fQ.7pHDKwkxzC6yul9XUKW8pyAeSo6WDoNwVtRUBFihmCA&exchange=binance&symbol=BTCUSDT&interval=1h';

		$json = file_get_contents($apiIndicador);
        $cur  = json_decode($json);
        $c    = get_object_vars($cur);

		debug( $c );        


    }

}





