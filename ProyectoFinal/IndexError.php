<?php include "./header.php"; ?>

<?php
// Verificar si hay un mensaje de error pasado en la URL
$error_message = isset($_GET['error']) ? $_GET['error'] : '';
?>

<div class="row">
    <div class="col s12 m5 offset-m3">
        <div class="card">
            <div class="card-content">
                <span class="card-title center-align teal-text text-darken-2">Error de Login</span>

                <!-- Mostrar el mensaje de error si existe -->
                <?php if ($error_message): ?>
                    <div class="error-message" style="color: red; text-align: center; margin-bottom: 20px;">
                        <strong><?php echo $error_message; ?></strong>
                    </div>
                <?php endif; ?>

                <p>Vuelve a intentarlo con tus datos correctos.</p>
                <a href="login.php" class="btn-large waves-effect waves-light teal lighten-1">Regresar al login</a>
            </div>
        </div>
    </div>
</div>

<?php include "./footer.php"; ?>
