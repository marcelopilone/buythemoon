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
		$this->MakeMoneyShell = ClassRegistry::init('Console/Command');
	}

/**
 * tearDown method
 *
 * @return void
 */


	public function testPruebaDos(){

		


	}

}
