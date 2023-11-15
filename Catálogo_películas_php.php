<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Catálogo de Películas</title>
  <link rel="stylesheet" type="text/css" href="estilo_catalogo.css">
  <style>
    .error-message {
      color: red;
      font-size: 12px;
    }
  </style>
</head>
<body>
  <h1>Catálogo de Películas "CineStream"</h1>
  <h2>Explora nuestra selección de películas</h2>

  <div class="menu-categorias">
    <label for="categorias">Categoría:</label>
    <select id="categorias" name="categorias">
      <option value="estrenos">Estrenos</option>
      <option value="accion">Acción</option>
      <option value="ingles">Inglés</option>
      <option value="espanol">Español</option>
    </select>
  </div>

  <!-- Información de la película -->
  <div class="informacion-pelicula">
    <label for="actor">Actor:</label>
    <input type="text" id="actor" name="actor" value="">
    <div class="error-message" id="error-actor"></div>

    <label for="director">Director:</label>
    <input type="text" id="director" name="director" value="">
    <div class="error-message" id="error-director"></div>

    <label for="lanzamiento">Año de lanzamiento (AAAA):</label>
    <input type="text" id="lanzamiento" name="lanzamiento" value="">
    <div class="error-message" id="error-lanzamiento"></div>

    <label for="pais">País:</label>
    <input type="text" id="pais" name="pais" value="">
    <div class="error-message" id="error-pais"></div>

    <label for="actores-principales">Actores principales:</label>
    <input type="text" id="actores-principales" name="actores-principales" value="">
    <div class="error-message" id="error-actores-principales"></div>

    <label for="clasificacion">Clasificación:</label>
    <input type="text" id="clasificacion" name="clasificacion" value="">
    <div class="error-message" id="error-clasificacion"></div>

    <label for="imagen">Imagen:</label>
    <input type="text" id="imagen" name="imagen" value="">
    <div class="error-message" id="error-imagen"></div>
  </div>

  <div class="filtro-peliculas">
    <br>
    <label for="peliculas-vistas">Películas vistas:</label>
    <input type="checkbox" id="peliculas-vistas" name="peliculas-vistas">
  </div>

  <div id="peliculas-vistas-content" style="display: none;">
    <h3>Películas Vistas</h3>
    <ul>
      <li>Película 1</li>
      <li>Película 2</li>
    </ul>
  </div>

  <button id="guardar" type="submit" name="guardar">Guardar</button>

  <script>
    const checkbox = document.getElementById("peliculas-vistas");
    const peliculasVistasContent = document.getElementById("peliculas-vistas-content");

    checkbox.addEventListener("change", () => {
      if (checkbox.checked) {
        peliculasVistasContent.style.display = "block";
      } else {
        peliculasVistasContent.style.display = "none";
      }
    });

    document.getElementById("guardar").addEventListener("click", () => {
      // Lógica de validación aquí
      validateAndSave();
    });

    function validateAndSave() {
      // Limpiar mensajes de error
      const errorElements = document.querySelectorAll(".error-message");
      errorElements.forEach(element => element.innerText = "");

      let isValid = true;

      // Validar cada campo
      const actor = document.getElementById("actor").value;
      if (actor.trim() === "") {
        document.getElementById("error-actor").innerText = "Por favor, ingrese el actor.";
        isValid = false;
      }

      const director = document.getElementById("director").value;
      if (director.trim() === "") {
        document.getElementById("error-director").innerText = "Por favor, ingrese el director.";
        isValid = false;
      }

      const lanzamiento = document.getElementById("lanzamiento").value;
      if (!/^\d{4}$/.test(lanzamiento)) {
        document.getElementById("error-lanzamiento").innerText = "El año de lanzamiento debe ser AAAA (cuatro dígitos).";
        isValid = false;
      }

      const pais = document.getElementById("pais").value;
      if (pais.trim() === "") {
        document.getElementById("error-pais").innerText = "Por favor, ingrese el país.";
        isValid = false;
      }

      const actoresPrincipales = document.getElementById("actores-principales").value;
      if (actoresPrincipales.trim() === "") {
        document.getElementById("error-actores-principales").innerText = "Por favor, ingrese los actores principales.";
        isValid = false;
      }

      const clasificacion = document.getElementById("clasificacion").value;
      if (clasificacion.trim() === "") {
        document.getElementById("error-clasificacion").innerText = "Por favor, ingrese la clasificación.";
        isValid = false;
      }

      const imagen = document.getElementById("imagen").value;
      if (imagen.trim() === "") {
        document.getElementById("error-imagen").innerText = "Por favor, ingrese la URL de la imagen.";
        isValid = false;
      }

      // Puedes agregar más lógica de validación aquí

      // Si todo es válido, muestra el mensaje de éxito y limpia los campos
      if (isValid) {
        alert("Datos guardados correctamente");
        limpiarCampos();
      }
    }

    function limpiarCampos() {
      const campos = document.querySelectorAll(".informacion-pelicula input");
      campos.forEach(campo => campo.value = "");

      // También puedes restablecer el valor de otros elementos, como el selector de categorías
      // document.getElementById("categorias").value = "";
    }
  </script>

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