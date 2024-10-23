<?php
    include "conexion.php"; 
    $consulta_sql = "SELECT * FROM alumno";
    $resultado = $conexion->query($consulta_sql);
    $count = mysqli_num_rows($resultado);

    echo "<table border='2'>
        <tr style='background-color: #94F3FF;'>
            <th>Usuario</th>
            <th>No. de Cuenta Institucional</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Correo Electrónico</th>
            <th>Contraseña</th>
            <th>Fecha de Registro</th>
            <th>Permisos</th>
        </tr>";

    if ($count > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<tr style='background-color: #DFF4F7;'>";
                echo "<td>".$row['nombre_usuario']."</td>";
                echo "<td>".$row['no_cuenta']."</td>";
                echo "<td>".$row['direccion']."</td>";
                echo "<td>".$row['telefono']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['password']."</td>";
                echo "<td>".$row['fecha_registro']."</td>";
                echo "<td>".$row['permisos']."</td>";
            echo "</tr>";
        }
    }
?>