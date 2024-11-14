<?php include "./header.php"; ?>

<div class="row">
    <div class="col s12 m5 offset-m3">
        <div class="card">
            <div class="card-content">
                <span class="card-title center-align teal-text text-darken-2">Login de Sistema</span>
                <form method="POST" action="Controlador/loguear.php">
                    <div class="input-field">
                        <input type="text" name="no_cuenta" id="no_cuenta" placeholder="Número de Cuenta" required />
                        <label for="no_cuenta">Número de Cuenta</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="clave" id="clave" placeholder="Contraseña" required />
                        <label for="clave">Contraseña</label>
                    </div>
                    <!-- Centro el botón aquí -->
                    <div class="center-align">
                        <button type="submit" class="btn-large waves-effect waves-light teal lighten-1" style="margin-right: 10px;">Iniciar Sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "./footer.php"; ?>
