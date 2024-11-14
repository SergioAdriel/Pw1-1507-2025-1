<?php include "./header.php"; ?>

<div class="container" style="max-width: 600px; margin-top: 20px;">
    <h4 class="center-align blue-text text-darken-2">Registro de Usuario</h4>
    
    <form action="./Controlador/enviarRegistro.php" method="post" style="margin-top: 20px;">
        <div class="input-field">
            <label for="nombre_usuario">Nombre de Usuario:</label>
            <input type="text" name="nombre_usuario" required maxlength="100" placeholder="Ingresa tu Nombre">
        </div>
        
        <div class="input-field">
            <label for="carrera">Carrera:</label>
            <input type="text" name="carrera" required maxlength="100" placeholder="Ingresa tu carrera">
        </div>
        
        <div class="input-field">
            <label for="email">Correo:</label>
            <input type="email" name="email" required maxlength="100" placeholder="Ingresa tu correo">
        </div>
        
        <div class="input-field">
            <label for="no_cuenta">Número de Cuenta:</label>
            <input type="text" name="no_cuenta" required maxlength="100" placeholder="Ingresa tu número de cuenta">
        </div>
        
        <div class="input-field">
            <label for="direccion">Dirección Particular:</label>
            <input type="text" name="direccion" required maxlength="100" placeholder="Ingresa tu dirección particular">
        </div>
        
        <div class="input-field">
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" required maxlength="10" placeholder="Ingresa tu teléfono">
        </div>
        
        <div class="input-field">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required maxlength="8" placeholder="Ingresa tu contraseña">
        </div>
        
        <div class="center-align" style="margin-top: 20px;">
            <button type="submit" name="submit" class="btn waves-effect waves-light blue lighten-1">Enviar Registro</button>
        </div>
    </form>

         <!-- Enlace adicional -->
    <div class="center-align" style="margin-top: 20px;">
        <a href="Principal.php" class="btn waves-effect waves-light teal lighten-1">Regresar</a>
    </div>
</div>


<?php include "./footer.php"; ?>
