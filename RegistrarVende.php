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
                "codigo_persona" : $('#CodigoPersona').val(),
                "codigo_producto" : $('#CodigoProducto').val()		
        };
        $.ajax({
                data:  parametros,
                url:   'CrearVende.php',
                type:  'post',
                success:  function() {   alert('Registrado con Exito');  }
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

$consulta1=$cn->prepare('SELECT * FROM cliente ');
$consulta1->execute();

$consulta2=$cn->prepare('SELECT * FROM producto WHERE codigo_producto NOT IN ( SELECT codigo_producto FROM provee ) ');
$consulta2->execute();


?>





<fieldset>
<legend><strong>Informacion Vende</strong></legend>
<table width="487" height="74" border="0" cellpadding="2" cellspacing="0">
          
 <tr>
   <td scope="row">&nbsp;</td>
   <td height="26" scope="row"><label for="label2">Codigo Persona:</label></td>
   <td><select size="1" name="select2" id="CodigoPersona">
     <?php 
		
	while($result1=$consulta1->fetch())
	{
	?>
     <option value="<?php echo $result1['codigo_persona']?>"><?php echo $result1['codigo_persona'];?></option>
     <?php 
	}
	?>
   </select></td>
   <td>&nbsp;</td>
 </tr>
 <tr>
     <td width="16" scope="row">&nbsp;</td>
     <td width="180" height="26" scope="row"><label for="label">Codigo Producto:</label></td>
     <td width="246"><select size="1" name="select" id="CodigoProducto">
     <?php 
		
	while($result2=$consulta2->fetch())
	{
	?>
     <option value="<?php echo $result2['codigo_producto']?>"><?php echo $result2['nombre'];?></option>
     <?php 
	}
	?>
   </select></td>
     <td width="29">&nbsp;</td>
 </tr>
          
 <tr>
     <td height="22" scope="row">&nbsp;</td>
     <td scope="row"></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
 </tr>
</table>
</fieldset>
	
 <fieldset>
 <table width="495" height="34" border="0" cellpadding="0" cellspacing="0">
   
 <tr>
  <td width="25" height="32" scope="row">&nbsp;</td>
  <td width="96"><input type="button" href="javascript:;" onclick="realizaProceso();return false;" value="Registrar" class="submit"/></td>
  <td width="28">&nbsp;</td>
  <td width="99"><input type="reset" name="submit12"id="submit12"value="Limpiar"class="submit"/></td>
  <td width="247">&nbsp;</td>
 </tr>
 </table>
 </fieldset>




<div style="width:700px; margin:10px auto;">

<table width="639"  border="0" id="example">
  <thead>
    <tr >
	  <td width="128" height="25"><span class="Estilo15">Codigo Persona</span></td>
      <td width="106"><span class="Estilo15">Codigo Producto</span></td>
	     
     
	  
    </tr>
  </thead>
  <tfoot>
    <tr>
  <td width="128" height="25"><span class="Estilo15">Codigo Persona</span></td>
      <td width="106"><span class="Estilo15">Codigo Producto</span></td>
     
    </tr>
  </tfoot>
  <tbody>
    <?php 


	$sql=$cn->prepare('SELECT * FROM vende');	
	$sql->execute();		
	
  while($op=$sql->fetch())	 	
   { ?>
 


<tr>
  <td><span class="Estilo3"><?php echo $op['codigo_persona'];?></span></td>
  <td><span class="Estilo3"><?php echo $op['codigo_producto'];?></span></td>
 
  
</tr>

<?php		
}	
?>
  </tbody>
</table>

</div>



</body>
</html>
