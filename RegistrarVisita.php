<?php 
include('Conexion.php');
$cod=$_GET['id'];

		$sql2=$cn->prepare('SELECT * FROM publicidad WHERE codigo_empresa=:Codigo');	
	    $sql2->execute(array(':Codigo' => $cod));	
		$op=$sql2->fetch();
	    
		$es=$op['nombre'];

	
		$sql=$cn->prepare('UPDATE publicidad SET nombre=:Nombre WHERE codigo_empresa=:Codigo');	
	    $sql->execute(array(':Codigo' => $cod,':Nombre' => $es ));	
	    header('Location: index.php');	
?>
