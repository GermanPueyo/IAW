<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Resumen de Registro</title>
</head>
<body

    <?php
    // 1. Leer de la SESIÓN (Teoría: $_SESSION)
    if (isset($_SESSION['nombre'])) {
        echo "<h1>Hola, " . htmlspecialchars($_SESSION['nombre']) . "</h1>";
    }

    // 2. Leer de la COOKIE simple
    if (isset($_COOKIE['dni_usuario'])) {
        echo "<p>Tu documento identificado es: " . $_COOKIE['dni_usuario'] . "</p>";
    }

    // 3. DESERIALIZACIÓN (Teoría: unserialize)
    if (isset($_COOKIE['direccion_usuario'])) {
        // Recuperamos el array que estaba convertido a texto
        $direccion = unserialize($_COOKIE['direccion_usuario']);
        echo "<h3>Datos de envío:</h3>";
        echo "Calle: " . $direccion['calle'] . "<br>";
        echo "Ciudad: " . $direccion['ciudad'] . "<br>";
        echo "Código Postal: " . $direccion['cp'];
    }
    ?>

    <br><br>
    <a href="clon_pagina_web.php">Volver al formulario</a>

</body>
</html>