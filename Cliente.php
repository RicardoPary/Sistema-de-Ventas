<html>
<head>
<meta charset="utf-8" />

<title>Cuenta Cliente</title>
<link rel="stylesheet" href="css/Cliente.css" type="text/css" />	

<script src="js/jquery.js"></script>
<script src="js/jquery-1.11.0.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() 
	{								
		setInterval(CargarComprado,2000);		
		function CargarComprado()
		{				
		$("#Comprado").load('Comprado.php',{CodigoCuenta:<?php echo $_GET['CodigoCuenta']; ?>});					
		}									
	});	     	
	
	function realizaBusqueda(){    
        var codigo = $('#Buscar').val(); 
		CargarBusqueda();			
		function CargarBusqueda()
		{  	
		$("#Cuerpo").load('Busqueda.php',{CodigoCuenta:<?php echo $_GET['CodigoCuenta']; ?>,Texto:codigo});		
		}	       
}
		
	$(document).ready(function() 
	{							
		CargarCuerpo();			
		function CargarCuerpo()
		{  	
		$("#Cuerpo").load('ListaDepartamentos.php',{CodigoCuenta:<?php echo $_GET['CodigoCuenta'];?>});		
		}					
	});
	
	$(document).ready(function()
{
   $(".MostrarSeccion").each(function(){
      var href = $(this).attr("href");		   
	  $(this).attr({ href: "#"});	  
      $(this).click(function(){	     
         $("#Cuerpo").load(href);		 
      });
   });
});	

$(document).ready(function()
{
   $("#cliente").each(function(){
      var href = $(this).attr("href");		   
	  $(this).attr({ href: "#"});
	  
      $(this).click(function(){
         $("#Cuerpo").load(href,{CodigoCuenta:<?php echo $_GET['CodigoCuenta'];?>});		 
      });
   });
});	
	
</script>	
	
</head>

<body>	
<?php	   
  include('Conexion.php');
  $CodigoCuenta=$_GET['CodigoCuenta'];
  
  $sql=$cn->prepare('SELECT * FROM cuenta WHERE codigo_cuenta=:Codigo');
  $sql->execute(array(':Codigo' => $CodigoCuenta ));
  $op= $sql->fetch();

  $CI=$op['codigo_persona']; 
  
  $sql2=$cn->prepare('SELECT *,(persona_productos_carrito(codigo_persona))productos FROM persona WHERE codigo_persona=:ci');
  $sql2->execute(array(':ci'=>$CI));
  $op2=$sql2->fetch();   
?>
  
<div class="cabeza"> 
<ul id="menu">
 
<table width="100%" border="0" cellspacing="0" cellpadding="0">   
<tr>	 
<td width="49" ></td>	   
<td width="141">&nbsp;</td>
<td width="272">
	
	     <input name="Buscar" id="Buscar" type="text" placeholder="                            Busca productos " style="width:330px;" onClick="realizaBusqueda();"  />	      </td>
	   
<td width="55">&nbsp;</td>  
<td width="57">&nbsp;</td>  	   
<td width="50">&nbsp;</td>
<td width="42">&nbsp;</td>
	   	   
<td width="42"><img src=<?php echo $op['foto'];?> width="43" height="37" class="foto2"/></td>	   
<td width="68">
  <a href="" style="text-decoration:none; font-family:Geneva, Arial, Helvetica, sans-serif; font-size:15px; color:#FFFFFF; font-weight:bolder;margin-left:20px;"><img src="Imagenes/Carrito.jpg" width="48" height="31" class="foto2" style="float:right;"/></a>    </td>      
  <td width="65">	
  <div style="float:left; margin-left:-5px; margin-top:1px; border-radius:30px; background:#FFFFFF; width:30px; height:23px;border:1px #FF0000 solid;padding-top:9px;" id="Comprado">  </div>  
   </td>
       
<td width="100"> 
<li><strong><?php echo $op['nick'];?></strong></li> 
</td>
	   
  <td width="66">	  
  
    <li><strong>Inicio</strong>
     <ul id="lista1">
	 <li> <a href="">Departamentos</a></li>
	 <li> <a href="index.php" >Cerrar Sesion</a></li>
	 </ul>
  </li>
   </td>	 
  </tr>
  
  <tr>
  <td colspan="2">&nbsp;</td>
  <td colspan="5">&nbsp;</td>
  <td colspan="7">
   
     </td>
  </tr>
  </table>
</ul>  

 
</div> 
  
<div id="Cuerpo" class="Cuerpo">
</div>
 
 		
</body>
</html>