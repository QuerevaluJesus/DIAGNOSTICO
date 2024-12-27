<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Principal</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
  <!-- Navbar -->
  <nav class="bg-white shadow">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
      <a href="#" class="text-xl font-semibold text-gray-800">Diagnostico Clinico</a>
      <div>
        <a href="#" class="text-gray-800 hover:text-gray-600 px-3">Inicio</a>
        <a href="#" class="text-gray-800 hover:text-gray-600 px-3">Acerca</a>
        <a href="resultado.php" class="text-gray-800 hover:text-gray-600 px-3">Resultado</a>
      </div>
    </div>
  </nav>

  <!-- Contenido principal -->
  <main class="flex flex-col md:flex-row items-center justify-center h-screen container mx-auto px-6">
    <!-- Imagen -->
    <div class="w-full md:w-1/2 h-64 md:h-auto">
      <img src="img/principal.jpg" alt="Imagen bonita" class="w-full h-full object-cover rounded-md shadow-md">
    </div>

    <!-- Texto y botón -->
    <div class="w-full md:w-1/2 mt-6 md:mt-0 md:ml-10">
      <h1 class="text-3xl font-bold mb-4">Bienvenido a tu Diagnostico Clinico</h1>
      <p class="text-gray-700 mb-6">
        Gracias por visitar nuestra plataforma. Este sitio está diseñado para ayudarte a completar un formulario que contribuye a un diagnóstico clínico del autismo. Nuestro objetivo es proporcionar herramientas precisas y fáciles de usar para apoyar la evaluación y el diagnóstico, siempre priorizando tu privacidad y la seguridad de tus datos.

Por favor, dedica unos minutos a completar el formulario con la mayor honestidad y detalle posible. Esto nos permitirá generar un informe preliminar que puede ser útil en la consulta con un profesional de salud especializado.

Si tienes alguna pregunta o necesitas ayuda durante el proceso, no dudes en contactarnos. Estamos aquí para apoyarte.

Tu bienestar y confianza son nuestra prioridad.


      </p>
      <form action="registro.php">
      <button class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
        Empezar
      </button>
      </form>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-white shadow mt-10">
    <div class="container mx-auto px-6 py-4 text-center text-gray-600">
      &copy; 2024 Mi Página. Todos los derechos reservados.
    </div>
  </footer>
</body>
</html>
