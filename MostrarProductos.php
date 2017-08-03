<html>
<head>
<meta charset="utf-8">
<title>Productos</title>

<script src="js/jquery-1.11.0.min.js"></script>

<script type="text/javascript">
$(document).ready(function()
{
   $(".comprar").each(function(){
      var href = $(this).attr("href");		   
	  $(this).attr({ href: "#"});	  
      $(this).click(function(){		  
	  $("#Cuerpo").load(href);		 
      });
   });
});		
</script>
</head>

<body>
<?php	   
  include('Conexion.php');
  $cod=$_GET['id'];
  
  
  $sql=$cn->prepare('SELECT * FROM producto WHERE codigo_seccion=:Codigo');
  $sql->execute(array(':Codigo' => $cod ));
 	
	      
         while($op=$sql->fetch())
	
	 	
    {?>
            
         
       
<div style="width:195px; height:400px; float:left; border:1px #DFDFDF solid; margin:2px; padding:3px;">

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


<label style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:13px;  color:#000000;">

<a href="Comprar.php?CodigoCuenta=<?php echo $_GET['CodigoCuenta'];?>&CodigoProducto=<?php echo $op['codigo_producto'];?>" class="comprar">Comprar</a>
<input type="text" value=<?php echo $_GET['CodigoCuenta'];?>  name="CodigoCliente" style="visibility:hidden" />

<input type="text" value=<?php echo $op['codigo_producto'];?>  name="CodigoProducto" style="visibility:hidden" />
</label>




	
	  
	  </br><label style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:11px;  color:#000000; "></label>
</div>


    </div>

	<?php 
	
	}
	?>


</body>
</html>
