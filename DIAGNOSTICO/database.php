<?php
// Configuración de la base de datos
$servername = "localhost"; // Servidor (puede ser localhost o una IP)
$username = "root";  // Cambia por tu nombre de usuario
$password = ""; // Cambia por tu contraseña
$database = "DIAGNOSTICO";  // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

echo "Conexión exitosa a la base de datos DIAGNOSTICO";

// Aquí puedes ejecutar consultas
// Por ejemplo:
// $sql = "SELECT * FROM tu_tabla";
// $result = $conn->query($sql);

// Cerrar la conexión
$conn->close();
?>
