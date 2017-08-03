<?php
include("Conexion.php");

$CodigoProducto=$_POST['CodigoProducto'];
$CodigoCliente=$_POST['CodigoCliente'];
$CodigoCarrito=$_POST['CodigoCarrito'];
$Limite=$_POST['Limite'];
$Cantidad=$_POST['Cantidad'];
$Pago=$_POST['Pago'];
$Envio=$_POST['Envio'];
$Estado='Solicitado';

$consulta=$cn->prepare('INSERT INTO esta_en(codigo_carrito,codigo_producto,limite_tiempo,estado,fecha_adicionado,pago_seleccionado,cantidad,envio_seleccionado)
VALUES(:codigo_carrito,:codigo_producto,:limite_tiempo,:estado,CURDATE(),:pago_seleccionado,:cantidad,:envio_seleccionado)');

$consulta->execute(array(
':codigo_carrito'=>$CodigoCarrito,
':codigo_producto'=>$CodigoProducto,
':limite_tiempo'=>$Limite,
':estado'=>$Estado,
':pago_seleccionado'=>$Pago,
':cantidad'=>$Cantidad,
':envio_seleccionado'=>$Envio));
$resultado=$consulta->fetch();

?>