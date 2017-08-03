<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Registro de Datos</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
.Estilo3 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo15 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #000099; font-weight: bold; }
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
}

</style>
<link rel="stylesheet" type="text/css" media="all" href="css/RegistrarCuenta.css" />
<link rel="stylesheet" type="text/css" href="DataTables/jquery.dataTables.css"/>
<link rel="stylesheet" type="text/css" href="DataTables/jquery.dataTables_themeroller.css"/>
<script src="js/jquery.js"></script>
<script src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" language="javascript" src="DataTables/jquery.dataTables.js"></script>

		
			
<script>
function realizaProceso(){
        var parametros = {
                "nombre" : $('#Nombre').val(),
				"tipo" : $('#Tipo').val()
        };
        $.ajax({
                data:  parametros,
                url:   'CrearPago.php',
                type:  'post',
                success:  function() {   alert('Pago Registrado con Exito');  }
        });
}
</script>
		
		
<script>
$(document).ready(function() {
    $('#example').dataTable( {
        "language": {         	
	"processing": "cargando......",
	"lengthMenu": "Mostrar _MENU_ registros",
	"zeroRecords": "No existen registros",
		"info": "pagina _PAGE_ de _PAGES_",
	"infoEmpty": "Ningun registro disponible",
	"infoFiltered": "(filtrado de  _MAX_ total registros)",
	"infoPostFix": "",
	"search": "Buscar",
	"url": "",
	"paginate": {
		"first":    "Primero",
		"previous": "Anterior",
		"next":     "Siguiente",
		"last":     "Ultimo"
				}				
        }
    } );
} );
</script>

</head>

<body>
<?php 
include('Conexion.php');

$consulta=$cn->prepare('SELECT * FROM cliente');
$consulta->execute();
?>





<fieldset>
<legend><strong>Informacion de Pago </strong></legend>
<table width="776" height="74" border="0" cellpadding="2" cellspacing="0">
          
 
 <tr>
     <td width="16" scope="row">&nbsp;</td>
     <td width="180" height="26" scope="row"><label for="label">Nombre:</label></td>
     <td width="246"><input type="text" name="T2"  size="30" maxlength="40" id="Nombre" /></td>
     <td width="29">&nbsp;</td>
 </tr>
          
 <tr>
     <td height="22" scope="row">&nbsp;</td>
     <td scope="row"><label for="label3">Tipo:</label></td>
     <td>
	  <select size="1" name="Tipo" id="Tipo">
	 
	 <option value="Efectivo">Efectivo</option>
	 <option value="Cheque">Cheque</option>
	 <option value="Transferencia">Transferencia</option>
	 <option value="Tarjeta de Credito">Tarjeta de Credito</option>
	 <option value="Monedero Electronico">Monedero Electronico</option>
	 <option value="Dinero Electronico">Dinero Electronico</option>
	 <option value="Tarjeta Digital">Tarjeta Digital</option>
	 <option value="Vales de Despensa">Vales de Despensa</option>
	 <option value="Bienes">Bienes</option>
	 <option value="Servicios">Servicios</option>
	 <option value="Por Cuenta de Terceros">Por Cuenta de Terceros</option>
	 <option value="Pago por Subrogacion">Pago por Subrogacion</option>
	 
	  <option value="Pago por Consignacion">Pago por Consignacion</option>
	 <option value="Condonacion">Condonacion</option>
	 <option value="Cancelacion">Cancelacion</option>
	 <option value="Otros">Otros</option>

		 
	 </select>   
	 
	 </td>
     <td>&nbsp;</td>
 </tr>
</table>
 </fieldset>
	
 <fieldset>
 <table width="776" height="34" border="0" cellpadding="0" cellspacing="0">
   
 <tr>
  <td width="25" height="32" scope="row">&nbsp;</td>
  <td width="96"><input type="button" href="javascript:;" onclick="realizaProceso();return false;" value="Registrar" class="submit"/></td>
  <td width="28">&nbsp;</td>
  <td width="99"><input type="reset" name="submit12"id="submit12"value="Limpiar"class="submit"/></td>
  <td width="247">&nbsp;</td>
 </tr>
 </table>
 </fieldset>




<div style="width:790px; margin:10px auto;">

<table width="788"  border="0" id="example">
  <thead>
    <tr >
	  <td width="128" height="25"><span class="Estilo15">Codigo Pago</span></td>
   
      <td width="116"><span class="Estilo15">Nombre</span></td>
      <td width="125"><span class="Estilo15">Tipo</span></td>
	  
    </tr>
  </thead>
  <tfoot>
    <tr>
    <td width="128" height="25"><span class="Estilo15">Codigo Pago</span></td>
   
      <td width="116"><span class="Estilo15">Nombre</span></td>
      <td width="125"><span class="Estilo15">Tipo</span></td>
    </tr>
  </tfoot>
  <tbody>
    <?php 


	$sql=$cn->prepare('SELECT * FROM pago');	
	$sql->execute();		
	
  while($op=$sql->fetch())	 	
   { ?>
 


<tr>
  <td><span class="Estilo3"><?php echo $op['codigo_pago'];?></span></td>

  <td><span class="Estilo3"><?php echo $op['nombre'];?></span></td>
  <td><span class="Estilo3"><?php echo $op['tipo'];?></span></td>
 
</tr>

<?php		
}	
?>
  </tbody>
</table>

</div>



</body>
</html>