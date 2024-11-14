<?php
include "./conexion.php";
mysqli_set_charset($conexion,'utf8');

$buscarusuario="SELECT * FROM alumno WHERE nombre_usuario ='$_POST[nombre_usuario]'";

$resultado = $conexion -> query($buscarusuario);
$count =mysqli_num_rows($resultado);
if($count==1){
    echo"El usuario ya esta Registrado";
    echo "<hr>";
    echo "<a href='./Registro.php' style='text-align: center;'>Al inicio</a>";

}else{

    mysqli_query($conexion,"INSERT INTO persona(
        nombre_usuario,carrera,no_cuenta,direccion,telefono,email,password)
        VALUES(
            '$_POST[nombre_usuario]',
            '$_POST[carrera]',
            '$_POST[no_cuenta]',
            '$_POST[direccion]',
            '$_POST[telefono]',
            '$_POST[email]',
            '$_POST[password]'
        )");
        echo "<br> <h1 style='text-align: center;'>Usuario creado con exito</h1>";
        echo "<hr>";
        echo "<a href='./index.php.php'>Al inicio</a>";
}

?>