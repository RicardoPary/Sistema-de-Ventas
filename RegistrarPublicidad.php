<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Registro de Datos</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" media="all" href="css/RegistrarCuenta.css" />
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

<link rel="stylesheet" type="text/css" href="DataTables/jquery.dataTables.css"/>
<link rel="stylesheet" type="text/css" href="DataTables/jquery.dataTables_themeroller.css"/>
<script src="js/jquery.js"></script>
<script src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" language="javascript" src="DataTables/jquery.dataTables.js"></script>


     

  
    <script>
    $(function(){
        $("#formuploadajax").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("formuploadajax"));
            formData.append("dato", "valor");
            //formData.append(f.attr("name"), $(this)[0].files[0]);
            $.ajax({
                url: "CrearPublicidad.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	            processData: false,
				success:  function() {   alert('Cuenta Registrado con Exito');  }
            })               
        });
    });
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

<body bgcolor="#F4F4F4">
<?php 
include('Conexion.php');

$consulta=$cn->prepare('SELECT * FROM empresa');
$consulta->execute();
?>


<form enctype="multipart/form-data" id="formuploadajax" method="post">

<fieldset>
<legend><strong>Informacion Publicidad</strong></legend>
<table width="776" height="74" border="0" cellpadding="2" cellspacing="0">
          
 <tr>
   <td scope="row">&nbsp;</td>
   <td height="26" scope="row"><label for="label2">Codigo Empresa:</label></td>
   <td>
   
    <select size="1" name="codigo_empresa" id="codigo_empresa">
	
	<?php 
		
	while($result=$consulta->fetch())
	{
	?>
	<option value="<?php echo $result['codigo_empresa']?>"><?php echo $result['nombre'];?></option>
    <?php 
	}
	?>
      </select>    </td>
   <td>&nbsp;</td>
   <td><label for="label3">Costo:</label></td>
   <td><input type="text" name="costo"  size="30" maxlength="128" id="Stock"/></td>
   <td>&nbsp;</td>
  </tr>
 
 <tr>
     <td width="11" scope="row">&nbsp;</td>
     <td width="145" height="26" scope="row"><label for="label">Nombre:</label></td>
     <td width="180"><input type="text" name="nombre"  size="30" maxlength="100" id="Nombre" />	</td>
     <td width="21">&nbsp;</td>
     <td width="121"><label for="label3">Tipo:</label></td>
     <td width="180"><select size="1" name="tipo" id="Tipo">
       <option value="Publicidad de Marca">Publicidad de Marca</option>
       <option value="Publicidad Detallista o Local">Publicidad Detallista o Local</option>
       <option value="Publicidad de Respuesta Directa">Publicidad de Respuesta Directa</option>
       <option value="Publicidad de Negocio">Publicidad de Negocio</option>
       <option value="Publicidad Institucional">Publicidad Institucional</option>
       <option value="Publicidad de Servicio Publico">Publicidad de Servicio Publico</option>
     </select></td>
     <td width="22">&nbsp;</td>
  </tr>
 
 <tr>
     <td width="11" scope="row">&nbsp;</td>
     <td width="145" height="26" scope="row"><label for="label3">Imagen:</label></td>
     <td colspan="5"><input type="file" name="imagen" id="Foto"/></td>
    </tr>
          
 <tr>
     <td height="22" scope="row">&nbsp;</td>
     <td scope="row"></td>
     <td>&nbsp;</td>
	 
	 
	 
     <td>&nbsp;</td>
     <td></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
  </tr>
</table>
</fieldset>
	
	 <fieldset>
 <table width="776" height="34" border="0" cellpadding="0" cellspacing="0">
   
 <tr>
  <td width="25" height="32" scope="row">&nbsp;</td>
  <td width="96"><input type="submit" value="Registrar" class="submit"/></td>
  <td width="28">&nbsp;</td>
  <td width="99"><input type="reset" name="submit12"id="submit12"value="Limpiar"class="submit"/></td>
  <td width="247">&nbsp;</td>
 </tr>
 </table>
 </fieldset>

</form>



<div style="width:790px; margin:10px auto;">
  <table width="789"  border="0" id="example">
    <thead>
      <tr >
        <td width="67" height="25"><span class="Estilo15">Imagen</span></td>
        <td width="59" height="25"><span class="Estilo15">Codigo Publicidad</span></td>
        <td width="59"><span class="Estilo15">Codigo Empresa</span></td>
        <td width="52"><span class="Estilo15">Nombre</span></td>
        <td width="58"><span class="Estilo15">Tipo</span></td>
        <td width="46"><span class="Estilo15">Costo</span></td>
        
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td width="67" height="25"><span class="Estilo15">Imagen</span></td>
        <td width="59" height="25"><span class="Estilo15">Codigo Publicidad</span></td>
        <td width="59"><span class="Estilo15">Codigo Empresa</span></td>
        <td width="52"><span class="Estilo15">Nombre</span></td>
        <td width="58"><span class="Estilo15">Tipo</span></td>
        <td width="46"><span class="Estilo15">Costo</span></td>
	
      </tr>
    </tfoot>
    <tbody>
      <?php 


	$sql=$cn->prepare('SELECT * FROM publicidad');	
	$sql->execute();		
	
  while($op=$sql->fetch())	 	
   { ?>
      <tr>
	   <td><span class="Estilo3"><span class="Estilo3"><img src=<?php echo $op['imagen'];?> width="325" height="168"></span></span></td>
        <td><span class="Estilo3"><?php echo $op['codigo_publicidad'];?></span></td>
        <td><span class="Estilo3"><?php echo $op['codigo_empresa'];?></span></td>
        <td><span class="Estilo3"><?php echo $op['nombre'];?></span></td>
        <td><span class="Estilo3"><?php echo $op['tipo'];?></span></td>
		<td><span class="Estilo3"><?php echo $op['costo'];?></span></td>
	
	 
      </tr>
      <?php		
}	
?>
    </tbody>
  </table>
</div>




</body>
</html>