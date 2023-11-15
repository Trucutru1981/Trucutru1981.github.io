<?php
// Función para mostrar mensajes de error
function mostrarError($campo, $mensaje) {
    echo "<p style='color: red;'>Error en el campo $campo: $mensaje</p>";
}

// Función para validar el formato de la fecha
function validarFecha($fecha) {
    $patron = "/^\d{4}-\d{2}-\d{2}$/";
    return preg_match($patron, $fecha);
}

// Procesar formulario cuando se envíe
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombres'];
    $apellidoPaterno = $_POST['apellido_paterno'];
    $apellidoMaterno = $_POST['apellido_materno'];
    $curp = $_POST['curp'];
    $rfc = $_POST['rfc'];
    $tipoMembresia = $_POST['tipo_membresia'];
    $inicioMembresia = $_POST['inicio_membresia'];
    $finMembresia = $_POST['fin_membresia'];
    $direccion = $_POST['direccion'];

    $errores = array();

    // Validar campos y agregar errores si es necesario
    if (!preg_match("/^[A-Za-z\s]+$/", $nombre)) {
        $errores['nombres'] = "Solo se permiten palabras (cadena de caracteres)";
    }

    if (!preg_match("/^[A-Za-z\s]+$/", $apellidoPaterno)) {
        $errores['apellido_paterno'] = "Solo se permiten palabras (cadena de caracteres)";
    }

    if (!preg_match("/^[A-Za-z\s]+$/", $apellidoMaterno)) {
        $errores['apellido_materno'] = "Solo se permiten palabras (cadena de caracteres)";
    }

    if (!preg_match("/^[A-Za-z0-9]{18}$/", $curp)) {
        $errores['curp'] = "El campo deberá tener una longitud exacta de 18 caracteres alfanuméricos";
    }

    if (!preg_match("/^[A-Za-z0-9]{13}$/", $rfc)) {
        $errores['rfc'] = "El campo deberá tener una longitud exacta de 13 caracteres alfanuméricos";
    }

    if (empty($tipoMembresia)) {
        $errores['tipo_membresia'] = "Este campo no puede estar vacío";
    }

    if (!validarFecha($inicioMembresia)) {
        $errores['inicio_membresia'] = "Solo se permiten fechas con un carácter de separador, ej. AAA-MM-DD";
    }

    if (!validarFecha($finMembresia)) {
        $errores['fin_membresia'] = "Solo se permiten fechas con un carácter de separador, ej. AAA-MM-DD";
    }

    // Mostrar mensajes de error si existen
    if (!empty($errores)) {
        echo "<div style='color: red;'>";
        foreach ($errores as $campo => $mensaje) {
            mostrarError($campo, $mensaje);
        }
        echo "</div>";
    } else {
        // Redirigir si no hay errores
        header("Location: Catálogo_películas_php.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Bienvenido Estimado Suscriptor - CineStream</title>
    <link rel="stylesheet" type="text/css" href="Bienvenida.css">
    <script>
        function mostrarFormulario() {
            document.getElementById("formularioOculto").style.display = "block";
        }
    </script>
</head>
<body>
    <h1>Bienvenido a CineStream, Estimado Suscriptor</h1>

    <p>Aquí encontrarás una amplia selección de películas para disfrutar.</p>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset>
            <legend>Información del Suscriptor</legend>

            <!-- Mensaje y botón para desplegar el resto del formulario -->
            <p style="color: green;">Por favor registrese antes de ir al Catálogo de películas</p>
            <button type="button" onclick="mostrarFormulario()">Registrarse</button>

            <!-- Campos ocultos del formulario -->
            <div id="formularioOculto" style="display: none;">
                <label for="nombres">Nombre(s):</label>
                <input type="text" id="nombres" name="nombres" pattern="[A-Za-z\s]+" title="Solo se permiten palabras (cadena de caracteres)" required><br>

                <label for="apellido-paterno">Apellido Pat:</label>
                <input type="text" id="apellido-paterno" name="apellido_paterno" pattern="[A-Za-z\s]+" title="Solo se permiten palabras (cadena de caracteres)" required><br>

                <label for="apellido-materno">Apellido Mat:</label>
                <input type="text" id="apellido-materno" name="apellido_materno" pattern="[A-Za-z\s]+" title="Solo se permiten palabras (cadena de caracteres)" required><br>

                <label for="curp">CURP:</label>
                <input type="text" id="curp" name="curp" pattern="[A-Za-z0-9]{18}" title="El campo deberá tener una longitud exacta de 18 caracteres alfanuméricos" required><br>

                <label for="rfc">RFC:</label>
                <input type="text" id="rfc" name="rfc" pattern="[A-Za-z0-9]{13}" title="El campo deberá tener una longitud exacta de 13 caracteres alfanuméricos" required><br>

                <label for="tipo-membresia">Tipo de membresía:</label>

 <input type="text" id="tipo-membresia" name="tipo_membresia" required><br>

                <label for="inicio-membresia">Inicio membresía:</label>
                <input type="text" id="inicio-membresia" name="inicio_membresia" pattern="\d{4}-\d{2}-\d{2}" title="Solo se permiten fechas con un carácter de separador, ej. AAA-MM-DD" required><br>

                <label for="fin-membresia">Fin membresía:</label>
                <input type="text" id="fin-membresia" name="fin_membresia" pattern="\d{4}-\d{2}-\d{2}" title="Solo se permiten fechas con un carácter de separador, ej. AAA-MM-DD" required><br>

                

                <input type="submit" value="Ir al Catálogo de películas">
            </div>
        </fieldset>
    </form>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <footer>
        EAGG – PW1 – Noviembre/2023
    </footer>

    <script>
        function mostrarFormulario() {
            document.getElementById("formularioOculto").style.display = "block";
        }
    </script>
</body>
</html>