<?php

class BootstrapTest extends CakeTestCase {

	public function testCalcularPorcentaje(){

		$porcentaje = calcularPorcentaje( $precioCompra = 2,$precioBittrex=4 );

		$this->assertEquals( 100,$porcentaje );

		$porcentaje = calcularPorcentaje( $precioCompra = 2,$precioBittrex=3 );

		$this->assertEquals( 50,$porcentaje );

		$porcentaje = calcularPorcentaje( $precioCompra = 2,$precioBittrex=1 );

		$this->assertFalse( $porcentaje );


	}


}