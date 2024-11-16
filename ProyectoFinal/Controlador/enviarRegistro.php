<?php
include "./conexion.php";
include "../header.php";
mysqli_set_charset($conexion, 'utf8');

$nombreUser    = $_POST['nombre_usuario'];
$noCuenta = $_POST['no_cuenta'];

// Verificar si el nombre de usuario ya existe
$buscarUsuario = "SELECT * FROM alumno WHERE nombre_usuario = '$nombreUser '";
$resultadoUsuario = $conexion->query($buscarUsuario);
$countUsuario = mysqli_num_rows($resultadoUsuario);

// Verificar si el número de cuenta ya existe
$buscarCuenta = "SELECT * FROM alumno WHERE no_cuenta = '$noCuenta'";
$resultadoCuenta = $conexion->query($buscarCuenta);
$countCuenta = mysqli_num_rows($resultadoCuenta);

?>

<div class="row">
    <div class="col s12 m5 offset-m3">
        <div class="card">
            <div class="card-content center-align">

<?php
if ($countUsuario > 0) {
    echo "<span class='card-title red-text text-darken-2'>Error de Registro</span>";
    echo "<p>El nombre de usuario ya está registrado.</p>";
    echo "<a href='../registro.php' class='btn waves-effect waves-light blue'>Volver al formulario</a>";
} elseif ($countCuenta > 0) {
    echo "<span class='card-title red-text text-darken-2'>Error de Registro</span>";
    echo "<p>El número de cuenta ya está registrado.</p>";
    echo "<a href='../registro.php' class='btn waves-effect waves-light blue'>Volver al formulario</a>";
} else {
    // Intentar insertar el nuevo registro
    try {
        $insertar = "INSERT INTO alumno (nombre_usuario, carrera, no_cuenta, direccion, telefono, email, password)
                     VALUES ('$_POST[nombre_usuario]', '$_POST[carrera]', '$_POST[no_cuenta]', '$_POST[direccion]', '$_POST[telefono]', '$_POST[email]', '$_POST[password]')";
        
        if ($conexion->query($insertar) === TRUE) {
            echo "<span class='card-title green-text text-darken-2'>¡Usuario registrado con éxito!</span>";
            echo "<p>El usuario ha sido registrado correctamente.</p>";
            echo "<a href='../Principal.php' class='btn waves-effect waves-light blue'>Ver registros</a>";
        } else {
            throw new Exception("Error al registrar el usuario: " . $conexion->error);
        }
    } catch (Exception $e) {
        echo "<span class='card-title red-text text-darken-2'>Error de Registro</span>";
        echo "<p>Error: " . $e->getMessage() . "</p>";
        echo "<a href='../registro.php' class='btn waves-effect waves-light blue'>Volver al formulario</a>";
    }
}
?>

            </div>
        </div>
    </div>
</div>

<?php include "../footer.php"; ?>