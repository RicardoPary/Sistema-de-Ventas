<html>
<head>
<meta charset="utf-8">
<title>Secciones</title>
</head>

<body>

    <?php 
    include("Conexion.php");
	$sql=$cn->prepare('SELECT * FROM producto');	
	$sql->execute();			
    while($op=$sql->fetch())	 	
    {?>
	
<div style="float:left; border:1px #DFDFDF solid; margin:2px; padding:3px; height:400px;">

<table width="195" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="18">&nbsp;</td>
    <td width="86">&nbsp;</td>
    <td width="8">&nbsp;</td>
    <td width="63">&nbsp;</td>
    <td width="14">&nbsp;</td>
  </tr>
  <tr>
    <td height="46" colspan="5"> <label style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:11px;  color:#000000;"><?php echo $op['nombre']; ?></label></td>
    </tr>
  <tr>
    <td colspan="5"><img src=<?php echo $op['imagen'];?> width="190" height="175" style="margin-top:25px;"/></td>
    </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><label style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:11px;  color:#000000;">Precio</label></td>
    <td>&nbsp;</td>
    <td><label style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:11px;  color:#000000;"><?php echo $op['precio']; ?> </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:11px;  color:#000000;">Stock</label></td>
    <td>&nbsp;</td>
    <td><label style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:11px;  color:#000000;"><?php echo $op['stock']; ?></label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5"><p style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:11px;  color:#000000; ">
	 <?php echo $op['descripcion']; ?>

    </p></td>
    </tr>
</table>
	
</div>
	<?php 
	
	}
	?>

</body>
</html>
