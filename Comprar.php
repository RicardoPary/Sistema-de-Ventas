<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Comprar Producto</title>
<link rel="stylesheet" type="text/css" href="DataTables/jquery.dataTables.css"/>
<script type="text/javascript" language="javascript" src="DataTables/jquery.js"></script>
<script type="text/javascript" language="javascript" src="DataTables/jquery.dataTables.js"></script>


<script>
function realizaProceso(){
        var parametros = {
                "CodigoProducto" : $('#CodigoProducto').val(),
				"CodigoCliente" : $('#CodigoCliente').val(),
				"CodigoCarrito" : $('#CodigoCarrito').val(),
				"Limite" : $('#Limite').val(),
				"Cantidad" : $('#Cantidad').val(),
				"Pago" : $('#Pago').val(),
				"Envio" : $('#Envio').val()
        };
        $.ajax({
                data:  parametros,
                url:   'CrearCompra.php',
                type:  'post',
                success:  function() {   alert('Producto Comprado con Exito');  }
        });
}
</script>
		


<script>
$(document).ready(function() {
    $('#example').dataTable( {
        "language": {         	
	"processing": "Bitte warten...",
	"lengthMenu": "",
	"zeroRecords": "Nothing found - sorry",
	"info": "Showing page _PAGE_ of _PAGES_",
	"infoEmpty": "No records available",
	"infoFiltered": "(filtered from _MAX_ total records)",
	"infoPostFix": "",
	"search": null,
	"url": "",
	"paginate": {
		"first":    "Erster",
		"previous": "Anterior",
		"next":     "Siguiente",
		"last":     "Letzter"
				}			
        }
    } );
} );
</script>

<style type="text/css">
<!--
.Estilo4 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo5 {font-size: 12px}
.Estilo11 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #7C7C7C; }
-->
tr {
border-bottom:1px #000000 solid;

}
.Estilo12 {font-family: Vrinda}
.Estilo22 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
.Estilo24 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; font-size: 14px; }
</style>
</head>

<body>

<?php
include('Conexion.php');
$CodigoProducto=$_GET['CodigoProducto'];
$CodigoCuenta=$_GET['CodigoCuenta'];

$sql15=$cn->prepare("SELECT * FROM cuenta WHERE codigo_cuenta=:Codigo"); 
$sql15->execute(array(':Codigo'=>$CodigoCuenta));
$DatosCuenta15=$sql15->fetch();
	

$sql=$cn->prepare("SELECT * FROM producto WHERE codigo_producto=:Codigo"); 
$sql->execute(array(':Codigo'=>$CodigoProducto));
$DatosCuenta=$sql->fetch();


$sql2=$cn->prepare("SELECT * FROM pago P,p_tiene T WHERE P.codigo_pago=T.codigo_pago AND T.codigo_producto=:Codigo"); 
$sql2->execute(array(':Codigo'=>$CodigoProducto));


$sql3=$cn->prepare("SELECT * FROM tiene_metodo T,envio E WHERE T.codigo_envio=E.codigo_envio AND T.codigo_producto=:Codigo"); 
$sql3->execute(array(':Codigo'=>$CodigoProducto));


$sql4=$cn->prepare("SELECT * FROM carrito WHERE codigo_persona=:Codigo"); 
$sql4->execute(array(':Codigo'=>$DatosCuenta15['codigo_persona']));
$result10=$sql4->fetch();
?>



<div style="width:800px; margin:0 auto;">
  <table width="802" height="483" border="0" cellpadding="0" cellspacing="0" style="margin-top:20px;" id="example" class="display compact">
    <thead>
      <tr>
        <th height="38" scope="row">&nbsp;</th>
        <td colspan="5"><div align="center"><span class="Estilo24">Datos del Producto </span></div>
<input type="text" value=<?php echo $CodigoProducto;?> name=""  id="CodigoProducto" style="visibility:hidden;height:2px;"/>
<input type="text" value=<?php echo $DatosCuenta15['codigo_persona']?> name=""  id="CodigoCliente" style="visibility:hidden;height:2px;"/>		
<input type="text" value=<?php echo $result10['codigo_carrito'];?> name=""  id="CodigoCarrito" style="visibility:hidden;height:2px;"/>		</td>
        <td>&nbsp;</td>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th scope="row">&nbsp;</th>
        <td colspan="5">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </tfoot>
    <tr>
      <th width="14" height="35" scope="row"><span class="Estilo12"></span></th>
      <td width="154"><span class="Estilo22">Nombre Producto</span></td>
      <td width="12"><span class="Estilo5"></span></td>
      <td width="128"><span class="Estilo11"><?php echo $DatosCuenta['nombre']?></span></td>
      <td width="8"><span class="Estilo5"></span></td>
      <td width="63"><span class="Estilo4"><a href=""></a><a href=""></a></span></td>
      <td width="10">&nbsp;</td>
    </tr>
    <tr>
      <th height="32" scope="row"><span class="Estilo12"></span></th>
      <td><span class="Estilo22">Precio</span></td>
      <td><span class="Estilo5"></span></td>
      <td><span class="Estilo11"><?php echo $DatosCuenta['precio']?></span></td>
      <td><span class="Estilo5"></span></td>
      <td><span class="Estilo4"><a href=""></a><a href=""></a></span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th height="36" scope="row"><span class="Estilo12"></span></th>
      <td><span class="Estilo22">Stock</span></td>
      <td><span class="Estilo5"></span></td>
      <td><span class="Estilo11"><?php echo $DatosCuenta['stock']?></span></td>
      <td><span class="Estilo5"></span></td>
      <td><span class="Estilo4"><a href=""></a><a href=""></a></span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th height="32" scope="row"><span class="Estilo12"></span></th>
      <td><span class="Estilo22">Tipo de Producto</span></td>
      <td><span class="Estilo5"></span></td>
      <td><span class="Estilo11"><?php echo $DatosCuenta['tipo']?></span></td>
      <td><span class="Estilo5"></span></td>
      <td><span class="Estilo4"><a href=""></a><a href=""></a></span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th height="30" scope="row">&nbsp;</th>
      <td><span class="Estilo22">Valoracion</span></td>
      <td>&nbsp;</td>
      <td><span class="Estilo11"><?php echo $DatosCuenta['valoracion']?></span></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th height="30" scope="row">&nbsp;</th>
      <td><span class="Estilo22">Limite de Tiempo</span></td>
      <td>&nbsp;</td>
      <td><input type="text" id="Limite" name=""/></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th height="30" scope="row">&nbsp;</th>
      <td><span class="Estilo22">Cantidad</span></td>
      <td>&nbsp;</td>
      <td><input type="text" id="Cantidad" name=""/></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th height="30" scope="row">&nbsp;</th>
      <td><span class="Estilo22">Metodos de Pago</span></td>
      <td>&nbsp;</td>
      <td>
	  
	  <select size="1" name="Genero" id="Pago">
	
	<?php 
		
	while($result=$sql2->fetch())
	{
	?>
	<option value="<?php echo $result['nombre']?>"><?php echo $result['nombre'].'  ( '.$result['tipo'].' )';?></option>
    <?php 
	}
	?>
      </select>	  </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th height="30" scope="row"><span class="Estilo12"></span></th>
      <td><span class="Estilo22">Metodos de Envio</span></td>
      <td><span class="Estilo5"></span></td>
      <td>
	  <select size="1" name="Genero" id="Envio">
	
	<?php 
		
	while($result3=$sql3->fetch())
	{
	?>
	<option value="<?php echo $result3['nombre']?>"><?php echo $result3['nombre'].'  ( '.$result3['tipo'].' )';?></option>
    <?php 
	}
	?>
      </select>	  </td>
      <td><span class="Estilo5"></span></td>
      <td><span class="Estilo4"><a href=""></a><a href=""></a></span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th height="141" scope="row"><span class="Estilo12"></span></th>
      <td><span class="Estilo22">Imagen</span></td>
      <td><span class="Estilo5"></span></td>
      <td><dl class="Estilo4">
        <img src="<?php echo $DatosCuenta['imagen']?>"  width="178" height="152" style="  border:1px #999999 solid; padding:2px; "/>
      </dl>      </td>
      <td><span class="Estilo5"></span></td>
      <td><span class="Estilo4"><a href=""></a><a href="">
      <input name="button" type="button" class="submit" onclick="realizaProceso();return false;" value="Comprar" href="javascript:;"/>
      </a></span></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
</body>
</html>





