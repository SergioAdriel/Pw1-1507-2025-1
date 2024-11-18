<?php
// Incluir archivo de conexión a la base de datos
include "./conexion.php";
// Incluir encabezado de la página
include "../header.php";
// Establecer el conjunto de caracteres de la conexión a 'utf8' para evitar problemas con caracteres especiales
mysqli_set_charset($conexion, 'utf8');

// Obtener los datos enviados por el formulario (nombre, letra de edificio, número de departamento, email, teléfono y contraseña)
$nombreUser = $_POST['nombre_usuario'];
$letraEdificio = $_POST['letra_edificio'];
$numeroDepartamento = $_POST['numero_departamento'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$password = $_POST['password'];

// Verificar si el nombre de usuario ya existe en la base de datos
$buscarUsuario = "SELECT * FROM residente WHERE nombre_usuario = ?";
// Preparar la consulta para prevenir inyecciones SQL
$stmt = $conexion->prepare($buscarUsuario);
// Vincular el parámetro de la consulta (nombre de usuario)
$stmt->bind_param("s", $nombreUser);
// Ejecutar la consulta
$stmt->execute();
// Obtener el resultado de la consulta
$resultadoUsuario = $stmt->get_result();
// Contar cuántos registros con ese nombre de usuario existen
$countUsuario = $resultadoUsuario->num_rows;

// Verificar si el número de teléfono ya existe en la base de datos
$buscarTelefono = "SELECT * FROM residente WHERE telefono = ?";
// Preparar la consulta para prevenir inyecciones SQL
$stmtTelefono = $conexion->prepare($buscarTelefono);
// Vincular el parámetro de la consulta (número de teléfono)
$stmtTelefono->bind_param("s", $telefono);
// Ejecutar la consulta
$stmtTelefono->execute();
// Obtener el resultado de la consulta
$resultadoTelefono = $stmtTelefono->get_result();
// Contar cuántos registros con ese número de teléfono existen
$countTelefono = $resultadoTelefono->num_rows;

?>

<div class="row">
    <div class="col s12 m5 offset-m3">
        <div class="card">
            <div class="card-content center-align">

<?php
// Si el nombre de usuario ya está registrado, mostrar mensaje de error
if ($countUsuario > 0) {
    echo "<span class='card-title red-text text-darken-2'>Error de Registro</span>";
    echo "<p>El nombre de usuario ya está registrado.</p>";
    echo "<a href='../registro.php' class='btn waves-effect waves-light blue'>Volver al formulario</a>";
} 
// Si el número de teléfono ya está registrado, mostrar mensaje de error
elseif ($countTelefono > 0) {
    echo "<span class='card-title red-text text-darken-2'>Error de Registro</span>";
    echo "<p>El número de teléfono ya está registrado.</p>";
    echo "<a href='../registro.php' class='btn waves-effect waves-light blue'>Volver al formulario</a>";
} else {
    // Si el nombre de usuario y teléfono no existen, intentar insertar el nuevo registro
    try {
        // Consulta SQL para insertar un nuevo registro en la tabla 'residente'
        $insertar = "INSERT INTO residente (nombre_usuario, letra_edificio, numero_departamento, email, telefono, password) 
                     VALUES ('$_POST[nombre_usuario]', '$_POST[letra_edificio]', '$_POST[numero_departamento]', '$_POST[email]', '$_POST[telefono]', '$_POST[password]')";
        
        // Ejecutar la consulta de inserción
        if ($conexion->query($insertar) === TRUE) {
            // Si se inserta correctamente, mostrar mensaje de éxito
            echo "<span class='card-title green-text text-darken-2'>¡Usuario registrado con éxito!</span>";
            echo "<p>El usuario ha sido registrado correctamente.</p>";
            echo "<a href='../Principal.php' class='btn waves-effect waves-light blue'>Ver registros</a>";
        } else {
            // Si ocurre un error al insertar, lanzar una excepción
            throw new Exception("Error al registrar el usuario: " . $stmtInsertar->error);
        }
    } catch (Exception $e) {
        // Si ocurre una excepción, mostrar mensaje de error
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

<?php 
// Incluir pie de página
include "../footer.php"; 
?>