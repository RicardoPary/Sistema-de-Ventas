<html>
<head>
<meta charset="utf-8" />
<title>Lista Departamentos</title>
</head>

<body>
<script type="text/javascript">
$(document).ready(function()
{
   $(".MostrarSeccion").each(function(){
      var href = $(this).attr("href");		   
	  $(this).attr({ href: "#"});	  
      $(this).click(function(){	
	  $("#Cuerpo").load(href,{CodigoCuenta:<?php echo $_POST['CodigoCuenta'];?>});		 
      });
   });
});		
</script>




<?php 
	$CodigoCuenta=$_POST['CodigoCuenta'];
	include("Conexion.php");

	$sql=$cn->prepare('SELECT * FROM departamento');	
	$sql->execute();		
	
    while($op=$sql->fetch())	 	
    {?>
	<div style="width:280px; float:left; margin-top:10px; margin-left:30px;">
	<div>
	<label style="font-family:Geneva, Arial, Helvetica, sans-serif; font-size:15px; font-weight:bold; color:#DF7000"><?php echo $op['nombre']; ?></label>
	</div>   
            
        <ul style=" list-style:none;">

		<?php 
 	    $sql2=$cn->prepare('SELECT * FROM seccion WHERE codigo_departamento=:CodigoDepartamento ');	
	    $sql2->execute(array(':CodigoDepartamento'=>$op['codigo_departamento']));		
         while($op2=$sql2->fetch())	 	
         {?>
 
       
	
		 <li><a href="MostrarProductos.php?id=<?php  echo $op2['codigo_seccion'];?>&CodigoCuenta=<?php  echo $CodigoCuenta;?>" style="color:#004891; font-family:Geneva, Arial, Helvetica, sans-serif; font-size:12px;" class="MostrarSeccion"><?php echo $op2['nombre']; ?> </a> </li>
	  


	     <?php 
	     }
		
	     ?>
         </ul>


    </div>
	<?php 
	
	}
	?>
	
	
	</body>
	</html>