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
		'precio_compra' =>  array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '65,12','unsigned' => false),
		'precio_venta' =>  array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '65,12','unsigned' => false),
		'cant_monedas' =>  array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '65,12','unsigned' => false),
		'moneda_de_intercambio' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 64, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'porcentaje' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 64, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'cantidad_inicial' =>  array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '65,12','unsigned' => false),
		'cantidad_final' =>  array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '65,12','unsigned' => false),
		'compra_o_venta' => array('type' => 'boolean', 'null' => false, 'default' => false),
		'updated' 	 	=> array('type' => 'datetime', 'null' => true, 'default' => null),
        'created' 	 	=> array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'precio_compra' => 50.12,
			'precio_venta' => 80,
			'moneda_de_intercambio' => 'Lorem ipsum dolor sit amet',
			'porcentaje' => 5,
			'cantidad_inicial' => 100.00,
			'cant_monedas' => 5,
			'cantidad_final' => 120.00
		),
	);

}
