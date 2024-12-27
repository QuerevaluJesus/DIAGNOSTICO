<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // Ajusta tu nombre de usuario
$password = ""; // Ajusta tu contraseña
$dbname = "DIAGNOSTICO"; // Nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id_usuario = $_POST['id_usuario']; // ID del usuario registrado (lo puedes obtener de sesión o de un campo oculto)
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    $q5 = $_POST['q5'];
    $q6 = $_POST['q6'];
    $q7 = $_POST['q7'];
    $q8 = $_POST['q8'];
    $q9 = $_POST['q9'];
    $q10 = $_POST['q10'];

    // Insertar los datos en la tabla de resultados
    $sql = "INSERT INTO resultados_test_tea (id_usuario, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10) 
            VALUES ('$id_usuario', '$q1', '$q2', '$q3', '$q4', '$q5', '$q6', '$q7', '$q8', '$q9', '$q10')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "Formulario enviado exitosamente. Redirigiendo...";
    } else {
        $error_message = "Error al guardar los datos: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Evaluación Inicial de Autismo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { font-family: Arial, sans-serif; }
    .form-image { background: url('https://via.placeholder.com/600x800') no-repeat center center; background-size: cover; height: 100vh; }
    footer { background-color: #f8f9fa; padding: 10px 0; text-align: center; }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container">
      <a class="navbar-brand" href="#">Evaluación TEA</a>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 form-image"></div>
      <div class="col-md-6 d-flex align-items-center">
        <div class="container py-5">
          <h1 class="text-center mb-4">Evaluación Inicial de TEA</h1>

          <!-- Mostrar mensaje de éxito o error -->
          <?php if (isset($success_message)) { ?>
            <div class="alert alert-success"><?php echo $success_message; ?></div>
            <script>
              setTimeout(function() {
                window.location.href = 'index.php'; // Redirigir a la página principal después de 3 segundos
              }, 3000);
            </script>
          <?php } ?>
          
          <?php if (isset($error_message)) { ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
          <?php } ?>

          <form id="autism-form" method="POST">
            <div class="mb-3">
              <label for="id_usuario" class="form-label">ID de Usuario</label>
              <input type="text" class="form-control" id="id_usuario" name="id_usuario" required>
            </div>
            <div class="mb-3">
              <label for="childName" class="form-label">Nombre del niño/a</label>
              <input type="text" class="form-control" id="childName" name="childName" required>
            </div>
            <div class="mb-3">
              <label for="birthDate" class="form-label">Fecha de nacimiento</label>
              <input type="date" class="form-control" id="birthDate" name="birthDate" required>
            </div>

            <!-- Preguntas del formulario -->
            <div class="mb-3">
              <label for="q1" class="form-label">¿Suele su hijo/a mirar directamente a los ojos durante las interacciones?</label>
              <select class="form-select" id="q1" name="q1" required>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="q2" class="form-label">¿Apunta su hijo/a con el dedo para indicar interés en algo?</label>
              <select class="form-select" id="q2" name="q2" required>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="q3" class="form-label">¿Su hijo/a responde cuando lo llaman por su nombre?</label>
              <select class="form-select" id="q3" name="q3" required>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="q4" class="form-label">¿Le gusta a su hijo/a jugar con otros niños?</label>
              <select class="form-select" id="q4" name="q4" required>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="q5" class="form-label">¿Imita su hijo/a a otros niños o adultos?</label>
              <select class="form-select" id="q5" name="q5" required>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="q6" class="form-label">¿Su hijo/a señala o mueve las manos para mostrar interés en algo?</label>
              <select class="form-select" id="q6" name="q6" required>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="q7" class="form-label">¿Sabe su hijo/a hacer cosas por sí mismo/a, como vestirse o comer solo/a?</label>
              <select class="form-select" id="q7" name="q7" required>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="q8" class="form-label">¿Parece que su hijo/a no comprende el lenguaje o las palabras de los demás?</label>
              <select class="form-select" id="q8" name="q8" required>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="q9" class="form-label">¿Su hijo/a tiene dificultades para hacer amigos o relacionarse con otros niños?</label>
              <select class="form-select" id="q9" name="q9" required>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="q10" class="form-label">¿Su hijo/a parece estar más interesado en objetos que en personas?</label>
              <select class="form-select" id="q10" name="q10" required>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <p>&copy; 2024 Evaluación TEA. Todos los derechos reservados.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
