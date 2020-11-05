<?php
App::uses('Coin', 'Model');

/**
 * Coin Test Case
 */
class CoinTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.coin'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Coin = ClassRegistry::init('Coin');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Coin);

		parent::tearDown();
	}

}
