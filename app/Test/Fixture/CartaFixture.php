<?php
/**
 * Carta Fixture
 */
class CartaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => true, 'key' => 'primary'),
		'path_img' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 64, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'valor' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => true),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'path_img' => 'Lorem ipsum dolor sit amet',
			'valor' => 1,
			'updated' => '2020-11-04 21:34:57',
			'created' => '2020-11-04 21:34:57'
		),
	);

}
