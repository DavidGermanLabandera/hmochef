<?php

class ControladorVentas{

	/*=============================================
	MOSTRAR TOTAL VENTAS
	=============================================*/

	static public function ctrMostrarTotalVentas(){

		$tabla = "compras";

		$respuesta = ModeloVentas::mdlMostrarTotalVentas($tabla);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function ctrMostrarVentas(){

		$tabla = "compras";

		$respuesta = ModeloVentas::mdlMostrarVentas($tabla);

		return $respuesta;

	}

}