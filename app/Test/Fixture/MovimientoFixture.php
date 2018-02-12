<?php
/**
 * Movimiento Fixture
 */
class MovimientoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => true, 'key' => 'primary'),
		'precio_compra' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '65,12', 'unsigned' => false),
		'precio_venta' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '65,12', 'unsigned' => false),
		'moneda' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 64, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'moneda_de_intercambio' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 64, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'porcentaje' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 64, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'cantidad_inicial' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '65,12', 'unsigned' => false),
		'cantidad_final' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '65,12', 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'precio_compra' => 50.12,
			'precio_venta' => 80,
			'moneda' => 'Lorem ipsum dolor sit amet',
			'moneda_de_intercambio' => 'Lorem ipsum dolor sit amet',
			'porcentaje' => 5,
			'cantidad_inicial' => 100.00,
			'cantidad_final' => 120.00
		),
	);

}
