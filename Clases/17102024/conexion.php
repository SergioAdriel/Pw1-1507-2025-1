<?php
    $host_db = "127.0.0.1:3306";
    $user_name = "root";
    $user_pass = "123456";
    $db_name= "fes_aragon";

    $conexion= new mysqli($host_db,$user_name,$user_pass,$db_name);
    if($conexion -> connect_error){
        echo "Tenemos permisso";
    }

?>
