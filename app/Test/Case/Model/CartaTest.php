<?php
App::uses('Carta', 'Model');

/**
 * Carta Test Case
 */
class CartaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.carta'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Carta = ClassRegistry::init('Carta');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Carta);

		parent::tearDown();
	}

}
