<?php
App::uses('MakeMoneyShell', 'Console/Command');
App::uses('ConsoleOutput', 'Console');
App::uses('ConsoleInput', 'Console');
App::uses('Shell', 'Console');

/**
 * Currency Test Case
 */
class MakeMoneyShellTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.currency',
		'app.movimiento',
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
        $out = $this->getMock('ConsoleOutput', array(), array(), '', false);
        $in = $this->getMock('ConsoleInput', array(), array(), '', false);
		$this->MakeMoneyShell = new MakeMoneyShell;
	}

/**
 * tearDown method
 *
 * @return void
 */


	public function testAnalizarComprarSiNo(){

		$operacionParaGuardar = 'https://bittrex.com/api/v1.1/public/getmarketsummary?market=usdt-neo';

        $json = file_get_contents($operacionParaGuardar);
		$cur  = json_decode($json);
		$c    = get_object_vars($cur);
		$c['result'][0]->Last = 109.80878345;
		$resultado = $this->MakeMoneyShell->analizarComprarSiNo( $c );

		$this->assertFalse( $resultado );

		$c['result'][0]->Last = 20;
		$resultado = $this->MakeMoneyShell->analizarComprarSiNo( $c );

		$this->assertNotEmpty( $resultado );


	}

	public function testCalcularPorcentajeGanado(){

		$args = array(
			0 => 4,
 		);

		$resultado = $this->MakeMoneyShell->calcularPorcentajeGanado( $args );

		$this->assertFalse( $resultado );

		$args = array(
			0 => 100,
 		);
 		
		$resultado = $this->MakeMoneyShell->calcularPorcentajeGanado( $args );

		$this->assertNotEmpty( $resultado );



	}

}
