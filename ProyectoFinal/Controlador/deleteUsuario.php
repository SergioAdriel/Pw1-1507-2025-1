<?php
// Incluir el archivo de conexión a la base de datos
require "conexion.php";

// Configurar el conjunto de caracteres para la conexión a la base de datos (UTF-8 asegura compatibilidad con caracteres especiales)
mysqli_set_charset($conexion, 'utf8');

// Obtener el número de teléfono enviado por POST, que se usará para eliminar el registro
$registroEliminado = $_POST['telefono'];

// Crear la consulta SQL para eliminar un registro de la tabla 'residente' según el número de teléfono proporcionado
$consulta = "DELETE FROM residente WHERE telefono = ";

// Ejecutar la consulta utilizando la conexión, concatenando el teléfono recibido con la consulta
mysqli_query($conexion, $consulta . $registroEliminado);

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

// Redirigir al usuario a la página 'eliminarUsuario.php' ubicada en un directorio anterior
header('Location: ../eliminarUsuario.php');
?>