<?php
App::uses('BotMoneyShell', 'Console/Command');
App::uses('ConsoleOutput', 'Console');
App::uses('ConsoleInput', 'Console');
App::uses('Shell', 'Console');

/**
 * Currency Test Case
 */
class ImportShellTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.Movimiento',
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
		$this->BotMoney         = new BotMoneyShell;
	}

/**
 * tearDown method
 *
 * @return void
 */


	public function test__damePorcentajeDeGananciaActual(){

		$ultimaOperacion = array(
			'Movimiento' => array(
				'precio_compra' => 8
			),
		);

		$precioMoneda = 4;

		$ret = $this->BotMoney->damePorcentajeDeGananciaActual( $ultimaOperacion,$precioMoneda );

		$this->assertFalse($ret);

		$ultimaOperacion = array(
			'Movimiento' => array(
				'precio_compra' => 8
			),
		);

		$precioMoneda = 9;

		$ret = $this->BotMoney->damePorcentajeDeGananciaActual( $ultimaOperacion,$precioMoneda );

		$this->assertTrue($ret);

		$ultimaOperacion = array(
			'Movimiento' => array(
				'precio_compra' => 50
			),
		);

		$precioMoneda = 9;

		$ret = $this->BotMoney->damePorcentajeDeGananciaActual( $ultimaOperacion,$precioMoneda );

		$this->assertFalse($ret);

	}

	

}

