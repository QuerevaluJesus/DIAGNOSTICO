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

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_usuario'])) {
    // Obtener el ID del usuario
    $id_usuario = $_POST['id_usuario'];

    // Obtener los resultados del formulario de la tabla resultados_test_tea
    $sql = "SELECT * FROM resultados_test_tea WHERE id_usuario = '$id_usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Recuperar los datos de la tabla
        $row = $result->fetch_assoc();
        
        // Obtener las respuestas de las preguntas
        $q1 = $row['q1'];
        $q2 = $row['q2'];
        $q3 = $row['q3'];
        $q4 = $row['q4'];
        $q5 = $row['q5'];
        $q6 = $row['q6'];
        $q7 = $row['q7'];
        $q8 = $row['q8'];
        $q9 = $row['q9'];
        $q10 = $row['q10'];

        // Ponderación de respuestas y cálculo del puntaje
        $score = 0;
        if ($q1 == "No") $score += 1;
        if ($q2 == "Sí") $score += 1;
        if ($q3 == "No") $score += 1;
        if ($q4 == "No") $score += 1;
        if ($q5 == "Sí") $score += 1;
        if ($q6 == "Sí") $score += 1;
        if ($q7 == "No") $score += 1;
        if ($q8 == "Sí") $score += 1;
        if ($q9 == "Sí") $score += 1;
        if ($q10 == "Sí") $score += 1;

        // Definir umbrales para diagnóstico
        $diagnosis = "Sin diagnóstico claro";
        if ($score >= 8) {
            $diagnosis = "Posible Trastorno del Espectro Autista (TEA). Se recomienda evaluación profesional.";
        } elseif ($score >= 5) {
            $diagnosis = "Indicadores de TEA. Requiere una evaluación más detallada.";
        } else {
            $diagnosis = "No se observan indicadores significativos de TEA.";
        }

        // Actualizar el campo 'resultado' de la tabla 'usuarios' con el diagnóstico
        $update_sql = "UPDATE usuarios SET resultado = '$diagnosis' WHERE id_usuario = '$id_usuario'";
        if ($conn->query($update_sql) === TRUE) {
            $success_message = "El diagnóstico ha sido guardado exitosamente.";
        } else {
            $error_message = "Error al guardar el diagnóstico: " . $conn->error;
        }

    } else {
        $error_message = "No se encontraron resultados para este usuario.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Evaluación TEA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { font-family: Arial, sans-serif; }
    .form-image { background: url('https://via.placeholder.com/600x800') no-repeat center center; background-size: cover; height: 100vh; }
    footer { background-color: #f8f9fa; padding: 10px 0; text-align: center; }
    .row { display: flex; align-items: center; justify-content: center; height: 100vh; }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container">
      <a class="navbar-brand" href="index.php">Evaluación TEA</a>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <!-- Columna de Imagen -->
      <div class="col-md-6 form-image"></div>

      <!-- Columna del Formulario -->
      <div class="col-md-6">
        <h1 class="text-center mb-4">Buscar Resultados de Diagnóstico</h1>

        <!-- Mostrar mensajes de éxito o error -->
        <?php if (isset($success_message)) { ?>
          <div class="alert alert-success"><?php echo $success_message; ?></div>
        <?php } ?>
        
        <?php if (isset($error_message)) { ?>
          <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php } ?>

        <!-- Formulario para buscar resultados -->
        <form method="POST">
          <div class="mb-3">
            <label for="id_usuario" class="form-label">ID del Usuario</label>
            <input type="text" class="form-control" id="id_usuario" name="id_usuario" required>
          </div>
          
          <button type="submit" class="btn btn-primary">Buscar Resultados</button>
        </form>

        <!-- Mostrar diagnóstico (si hay algún resultado) -->
        <?php if (isset($diagnosis)) { ?>
          <h3 class="mt-4">Resultado del Diagnóstico:</h3>
          <p><?php echo $diagnosis; ?></p>
        <?php } ?>
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
