<?php

/*=============================================
PAGO PAYU
=============================================*/

if(isset($_POST["response_code_pol"]) && $_POST["response_code_pol"] == 1 && isset( $_GET['payu']) && $_GET['payu'] === 'true'){ 

   $productos = explode("-", $_GET['productos']);
   $cantidad = explode("-", $_GET['cantidad']);
   $pago = explode("-", $_GET['pago']);
   $idUsuario = $_GET["idUsuario"];

   #Actualizamos la base de datos
   for($i = 0; $i < count($productos); $i++){

      $datos = array("idUsuario"=>$idUsuario,
                     "idProducto"=>$productos[$i],
                     "metodo"=>"payu",
                     "email"=>$_POST['email_buyer'],
                     "direccion"=>$_POST["shipping_address"],
                     "pais"=>$_POST["shipping_country"],
                     "cantidad"=>$cantidad[$i],
                     "detalle"=>"",
                     "pago"=>$pago[$i]);
      
      $respuesta = ControladorCarrito::ctrNuevasCompras($datos);

      $ordenar = "id";
      $item = "id";
      $valor = $productos[$i];

      $productosCompra = ControladorProductos::ctrListarProductos($ordenar, $item, $valor);

      foreach ($productosCompra as $key => $value) {

         $item1 = "ventas";
         $valor1 = $value["ventas"] + $cantidad[$i];
         $item2 = "id";
         $valor2 =$value["id"];

         $actualizarCompra = ControladorProductos::ctrActualizarProducto($item1, $valor1, $item2, $valor2);
         
      }

   }


}