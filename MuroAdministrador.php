<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Muro Administrador</title>

<link rel="stylesheet" href="css/MuroAdministrador.css" type="text/css"/> 

<script type="text/javascript">
	$(document).ready(function() 
	{							
		CargarMuro();	
		function CargarMuro()
		{  	$("#Medio").load('Secciones.php');	}
	});


$(document).ready(function()
{
   $("p a").each(function(){
      var href = $(this).attr("href");
	 
	  $(this).attr({ href: "#"});
      $(this).click(function(){	    
	  $("#Medio").load(href);		 
		 
      });
   });
});
</script>

</head>

<body>
<?php   
include('Conexion.php');
  $cod=$_POST['CodigoCuenta'];  
 
  $sql=$cn->prepare('SELECT * FROM cuenta WHERE codigo_cuenta=:Codigo');
  $sql->execute(array(':Codigo'=>$cod));
  $op=$sql->fetch(); 
?>

<div class="Menudiv">
  <span><img src=<?php echo $op['foto'];?> width="130" height="106" class="foto1" /></span>
  <p class="letra1"><strong>Administracion Personalizada</strong></p>
		 
	
<p><a href="RegistrarAdministrador.php" class="letra2">Registrar Administrador</a></p>
<p><a href="RegistrarAlmacen.php" class="letra2">Registrar Almacen</a></p>
	
	<p><a href="RegistrarAlmacenadoEn.php" class="letra2">Registrar Almacenado En</a>	</p>
	
		<p><a href="RegistrarATrabaja.php" class="letra2">Registrar A Trabaja</a>	</p>
	
		<p><a href="RegistrarCarrito.php" class="letra2">Registrar Carrito</a>	</p
	
	>
		<p><a href="RegistrarCliente.php" class="letra2">Registrar Cliente</a>	</p>
	
	
		<p><a href="RegistrarContrato.php" class="letra2">Registrar Contrato</a>	</p>
	
	<p><a href="RegistrarCuenta.php" class="letra2">Registrar Cuenta</a>	</p>
	
	<p><a href="RegistrarDepartamento.php" class="letra2">Registrar Departamento</a>	</p>
	
	
		<p><a href="RegistrarEmpleado.php" class="letra2">Registrar Empleado</a>	</p>
	
		<p><a href="RegistrarEmpresa.php" class="letra2">Registrar Empresa</a>	</p>
	
		<p><a href="RegistrarEnvio.php" class="letra2">Registrar Envio</a>	</p>
	
		
			<p><a href="RegistrarEstaEn.php" class="letra2">Registrar Esta En</a>	</p>
	
			<p><a href="RegistrarESupervisa.php" class="letra2">Registrar E Supervisa</a>	</p>
				<p><a href="RegistrarETrabaja.php" class="letra2">Registrar E Trabaja</a>	</p>
	
			<p><a href="RegistrarLista.php" class="letra2">Registrar Lista</a>	</p>
	
				<p><a href="RegistrarOferta.php" class="letra2">Registrar Oferta</a>	</p>
	
					<p><a href="RegistrarPago.php" class="letra2">Registrar Pago</a>	</p>
	
			<p><a href="RegistrarPersona.php" class="letra2">Registrar Persona</a>	</p>
	
			<p><a href="RegistrarPersonaActiva.php" class="letra2">Registrar Persona Activa</a>	</p>
	
	
			<p><a href="RegistrarPersonaPasiva.php" class="letra2">Registrar Persona Pasiva</a>	</p>
				<p><a href="RegistrarPertenece.php" class="letra2">Registrar Pertenece</a>	</p>
	
	
			<p><a href="RegistrarProducto.php" class="letra2">Registrar Producto</a>	</p>
	
	
				<p><a href="RegistrarProvee.php" class="letra2">Registrar Provee</a>	</p>
	
			<p><a href="RegistrarProveedor.php" class="letra2">Registrar Proveedor</a>	</p>
	
	
					<p><a href="RegistrarPTiene.php" class="letra2">Registrar P Tiene</a>	</p>
	
	
						<p><a href="RegistrarPublicidad.php" class="letra2">Registrar Publicidad</a>	</p>
	
					<p><a href="RegistrarRestriccion.php" class="letra2">Registrar Restriccion</a>	</p>
	
				<p><a href="RegistrarSeccion.php" class="letra2">Registrar Seccion</a>	</p>
	
	
				<p><a href="RegistrarServicio.php" class="letra2">Registrar Servicio</a>	</p>
	
					<p><a href="RegistrarSucursal.php" class="letra2">Registrar Sucursal</a>	</p>
	
					<p><a href="RegistrarTarjeta.php" class="letra2">Registrar Tarjeta</a>	</p>
	
						<p><a href="RegistrarTieneMetodo.php" class="letra2">Registrar Tiene Metodo</a>	</p>
	
	<p><a href="RegistrarTienePago.php" class="letra2">Registrar Tiene Pago</a>	</p>
	
					<p><a href="RegistrarTieneProducto.php" class="letra2">Registrar Tiene Producto</a>	</p>
	
						<p><a href="RegistrarTrabajador.php" class="letra2">Registrar Trabajador</a>	</p>
	
</div>

<div id="Medio" style="width:1040px; margin:10px; padding:0px; float:left; margin-left:5px;border:1px #E5E5E5 solid;">					 
</div>

</body>
</html>
