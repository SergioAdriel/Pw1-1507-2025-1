<?php
    $host_db="127.0.0.1:3307";
    $user_name="root";
    $user_pass="200477";
    $db_name="fes_aragon";

    $conexion = new mysqli($host_db,$user_name,$user_pass,$db_name);
    
    if($conexion->connect_error){
      }
      else{
        echo "<h4 style='text-align: left;'>Conexión realizada</h4>";
      } 
?>