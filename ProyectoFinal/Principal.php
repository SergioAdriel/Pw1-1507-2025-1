<?php include "./header.php"; ?>
<?php
session_start();
$no_cuenta = $_SESSION['usermane']; // 413112576

if (!isset($no_cuenta)) {
    header("location: ./index.php");
} else {
    // Mensaje de bienvenida con estilos
    echo "<div class='container center-align' style='margin-top: 20px;'>
            <h4 class='blue-text text-darken-2'>¡Bienvenido!</h4>
            <h5>Tu número de cuenta es <span class='teal-text'>$no_cuenta</span></h5>
          </div>";

    echo "<div class='container center-align' style='margin-top: 20px;'>
            <a href='Controlador/salir.php' class='btn waves-effect waves-light teal lighten-1'>Salir</a>
          </div>";
    // Se usa el require para si se necesita el archivo de conexión
    require "./Controlador/conexion.php";
    mysqli_set_charset($conexion, 'utf8');

    // Generar el query
    $consulta_sql = "SELECT * FROM alumno";

    // Mandar el query por medio de la conexión y almacenar el resultado en una variable
    $resultado = $conexion->query($consulta_sql);

    // Retorna el número de filas del resultado
    $count = mysqli_num_rows($resultado);

    // Envolvemos la tabla en un contenedor con desplazamiento horizontal
    echo "<div class='container' style='overflow-x:auto; margin-top: 20px;'>";
    echo "<table class='highlight bordered responsive-table centered'>
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>No Cuenta Institucional</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo Electrónico</th>
                    <th>Contraseña</th>
                    <th>Fecha de Registro</th>
                    <th>Permisos</th>
                </tr>
            </thead>
            <tbody>";

    if ($count > 0) {
        // Aquí se pintan los registros de la DB
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['nombre_usuario']) . "</td>";
            echo "<td>" . htmlspecialchars($row['no_cuenta']) . "</td>";
            echo "<td>" . htmlspecialchars($row['direccion']) . "</td>";
            echo "<td>" . htmlspecialchars($row['telefono']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['password']) . "</td>";
            echo "<td>" . htmlspecialchars($row['fecha_registro']) . "</td>";
            echo "<td>" . htmlspecialchars($row['permisos']) . "</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<h5 class='center-align red-text'>Sin ningún registro</h5>";
    }

    echo "</div>"; // Cierra el contenedor de la tabla

    // Enlaces de eliminación y registro
    echo "<div class='container center-align' style='margin-top: 20px;'>
            <a href='EliminarUsuario.php' class='btn waves-effect waves-light red lighten-1' style='margin-right: 10px;'>Eliminar Usuario</a>
            <a href='Registro.php' class='btn waves-effect waves-light blue lighten-1'>Registro</a>
          </div>";
}
?>
<?php include "./footer.php"; ?>