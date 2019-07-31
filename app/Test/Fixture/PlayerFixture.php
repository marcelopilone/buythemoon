<?php
/**
 * Player Fixture
 */
class PlayerFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => true, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 64, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'amount_usd' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '65,12', 'unsigned' => false),
		'amount_btc' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '65,12', 'unsigned' => false),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'deleted' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'deleted_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'name' => 'Lorem ipsum dolor sit amet',
			'amount_usd' => '',
			'amount_btc' => '',
			'updated' => '2019-07-31 17:34:53',
			'created' => '2019-07-31 17:34:53',
			'deleted' => 1,
			'deleted_date' => '2019-07-31 17:34:53'
		),
	);

}
