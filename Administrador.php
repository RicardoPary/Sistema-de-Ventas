<html>
<head>
<meta charset="utf-8"/>
<title>Cuenta Administrador</title>
<link rel="stylesheet" href="css/Administrador.css" type="text/css" />	

<script src="js/jquery.js"></script>
<script src="js/jquery-1.11.0.min.js"></script>

<script>
function realizaBusqueda(){
    
        var codigo = $('#Buscar').val(); 
		CargarBusqueda();			
		function CargarBusqueda()
		{  	$("#Medio").load('BusquedaAdministrador.php',{CodigoCuenta:<?php echo $_GET['CodigoCuenta'];?>,Texto:codigo});	}	
       
}
</script>		

<script type="text/javascript">
	$(document).ready(function() 
	{							
		CargarCuerpo();		
		function CargarCuerpo()
		{  
		$("#Cuerpo").load('MuroAdministrador.php',{CodigoCuenta:<?php echo $_GET['CodigoCuenta']; ?>});		
		}							
	});
		     	
	</script>	

<script type="text/javascript">
$(document).ready(function()
{
   $("#nav a").each(function(){
      var href = $(this).attr("href");		   
	  $(this).attr({ href: "#"});
	  
      $(this).click(function(){
	     var codigo=<?php echo $_GET['CodigoCuenta'];?>;
         $("#Cuerpo").load(href,{id:codigo});		 
      });
   });
});		
</script>

			
</head>

<body>	
<?php	   
  include('Conexion.php');
  $cod=$_GET['CodigoCuenta'];
  
  $sql=$cn->prepare("SELECT * FROM cuenta WHERE codigo_cuenta=:Codigo");
  $sql->execute(array(':Codigo' => $cod ));
  $op= $sql->fetch();

  $codigo_persona=$op['codigo_persona']; 
  
  $sql3=$cn->prepare("SELECT * FROM persona WHERE codigo_persona=:codigo_persona");
  $sql3->execute(array(':codigo_persona'=>$codigo_persona));
  $op3=$sql3->fetch();   
?>
  
<div class="cabeza"> 
<ul id="menu">
 
   <table width="100%" border="0" cellspacing="0" cellpadding="0">   
     <tr>	 
       <td width="176" >&nbsp;</td>	   
       <td width="25"></td>
	   <td width="272"><input name="Buscar" id="Buscar" type="text" placeholder="                   Busca productos " style="width:250px;" onClick="realizaBusqueda();"/></td> 
	   
  <td width="139"><a href=""></a></td>  
  <td width="29">&nbsp;</td>  	   
  <td width="29">&nbsp;</td>  	   
  <td width="29">&nbsp;</td>	   	   
  <td width="29">&nbsp;</td>	   
  <td width="71">&nbsp;</td>      
  <td width="65">	
    
  <li><strong><?php echo $op['nick'];?></strong></li>  </td>
       
  <td width="100">
  <li><strong>Contacto</strong>
    <ul id="lista1">     
      <li> <a href="index.php" >Cerrar Sesion</a></li>
    </ul>
  </li>   </td>
	   
  <td width="65">
   <li><strong>Inicio</strong>	     
         <ul id="nav">
           <li> <a href="Configuracion.php">Configuracion</a></li>
         </ul>
	   </li>  </td>	 
  </tr>
  </table>
</ul>  
 
</div>  
  
<div id="Cuerpo" class="Cuerpo">
</div>	
		
</body>
</html>