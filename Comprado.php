<?php

  include('Conexion.php');
  $cod=$_POST['CodigoCuenta'];
  
  $sql=$cn->prepare('SELECT * FROM cuenta WHERE codigo_cuenta=:Codigo');
  $sql->execute(array(':Codigo' => $cod ));
  $op= $sql->fetch();

  $CI=$op['codigo_persona']; 
  
  $sql2=$cn->prepare('SELECT *,(productos_comprados_persona(codigo_persona))productos FROM persona WHERE codigo_persona=:ci');
  $sql2->execute(array(':ci'=>$CI));
  $op2=$sql2->fetch();   


echo "<label style='color:#FF0000; font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold; margin-left:9px;'>"
. utf8_encode($op2['productos']) .  "</label>";

 
?>