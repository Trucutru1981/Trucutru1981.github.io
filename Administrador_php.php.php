<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Bienvenido Administrador - CineStream</title>
  <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
  <h1>Bienvenido Administrador</h1>
  <p>Aquí encontrarás herramientas de administración y configuración para gestionar CineStream.</p>

  <?php
  // Función para mostrar mensajes de error con excepciones
  function mostrarErrorConExcepcion($campo, $mensaje, $excepcion) {
    echo "<script>alert('Error en el campo $campo: $mensaje (Excepción: $excepcion)');</script>";
  }

  // Validar campos manualmente
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['agregarManualmente'])) {
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $curp = $_POST['curp'];
    $rfc = $_POST['rfc'];
    $tipoMembresia = $_POST['tipoMembresia'];
    $inicioMembresia = $_POST['inicioMembresia'];
    $finMembresia = $_POST['finMembresia'];

    $errores = array();

    // Validar campos y agregar errores si es necesario
    if (empty($nombres)) {
      mostrarErrorConExcepcion('nombres', 'El campo Nombre(s) no puede estar vacío', '');
    }

    if (empty($apellidos)) {
      mostrarErrorConExcepcion('apellidos', 'El campo Apellidos no puede estar vacío', '');
    }

    if (empty($curp) || !preg_match("/^[A-Za-z0-9]{18}$/", $curp)) {
      mostrarErrorConExcepcion('curp', 'El campo CURP debe tener una longitud exacta de 18 caracteres alfanuméricos', '');
    }

    if (empty($rfc) || !preg_match("/^[A-Za-z0-9]{13}$/", $rfc)) {
      mostrarErrorConExcepcion('rfc', 'El campo RFC debe tener una longitud exacta de 13 caracteres alfanuméricos', '');
    }

    if (empty($tipoMembresia)) {
      mostrarErrorConExcepcion('tipoMembresia', 'El campo Tipo de membresía no puede estar vacío', '');
    }

    // Puedes agregar más validaciones según tus necesidades

    // Mostrar mensaje de éxito si no hay errores
    if (empty($errores)) {
      echo "<script>alert('Datos agregados manualmente con éxito.');</script>";
    }
  }
  ?>

  <form method="post" action="">
    <label for="idCliente">ID Cliente:</label>
    <input type="text" id="idCliente" name="idCliente">
    <input type="submit" value="Buscar"> <!-- Botón "Buscar" -->
    <br>

    <h2>Información del Cliente</h2>
    
    <label for="nombres">Nombre(s):</label>
    <input type="text" id="nombres" name="nombres">

    <label for="apellidos">Apellidos:</label>
    <input type="text" id="apellidos" name="apellidos">

    <label for="curp">CURP:</label>
    <input type="text" id="curp" name="curp">

    <label for="rfc">RFC:</label>
    <input type="text" id="rfc" name="rfc">
    <br>
    
    <label for="tipoMembresia">Tipo de membresía:</label>
    <input type="text" id="tipoMembresia" name="tipoMembresia">

    <label for="inicioMembresia">Inicio membresía:</label>
    <input type="text" id="inicioMembresia" name="inicioMembresia">

    <label for="finMembresia">Fin membresía:</label>
    <input type="text" id="finMembresia" name="finMembresia">

    <!-- Botón de agregar manualmente sin redirigir -->
    <input type="submit" name="agregarManualmente" value="Agregar manualmente">
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
</body>
</html>