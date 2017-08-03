<?php
include("Conexion.php");

	$CorreoElectronico=$_POST['T1'];
	$Contrasena=$_POST['T2'];
		
	$sql=$cn->prepare('SELECT * FROM cuenta WHERE correo_electronico=:Correo AND contrasena=:Contrasena');	
	$sql->execute(array(':Correo' => $CorreoElectronico,':Contrasena' => $Contrasena ));		
	$resultado=$sql->fetch();	
	$tam=count($resultado);	
	$CodigoCuenta=$resultado['codigo_cuenta'];    
	$Tipo=$resultado['tipo'];	
						
	if($tam>1)		
	{
			if($Tipo == "Administrador")
			{	header('Location: Administrador.php?CodigoCuenta='.$CodigoCuenta);		}	
		
			if($Tipo == "Cliente")
			{  	header('Location: Cliente.php?CodigoCuenta='.$CodigoCuenta);			}			
	}
	else
	{	header('Location: index.php');   }	
?>
