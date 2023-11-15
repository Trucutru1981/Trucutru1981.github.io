<?php
// Credenciales válidas
$usuario_valido = "EAGG";
$contrasena_valida = "ES1921026206";

// Mensaje de error inicialmente vacío
$error_message = "";

// Verificar si se ha enviado un formulario (POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si se han enviado las credenciales
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Verificar las credenciales
        if ($username == $usuario_valido && $password == $contrasena_valida) {
            // Inicio de sesión exitoso, redirigir al menú principal
            header("Location: menu_principal_php.php.php");
            exit();
        } else {
            // Credenciales incorrectas, asignar el mensaje de error
            $error_message = "Credenciales incorrectas. Inténtalo de nuevo.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" type="text/css" href="login_estilo.css">
</head>
<body>
    <h2>Iniciar Sesión</h2>

    <?php
    // Mostrar mensaje de error si existe
    if (!empty($error_message)) {
        echo "<p class='error-message'>$error_message</p>";
    }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required value="EAGG"><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required value="ES1921026206"><br>

        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>