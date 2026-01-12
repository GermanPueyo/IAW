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

    if (isset($_SESSION['nombre'])) {
        echo "<h1>Hola, " . htmlspecialchars($_SESSION['nombre']) . "</h1>";
    }


    if (isset($_COOKIE['dni_usuario'])) {
        echo "<p>Tu documento identificado es: " . $_COOKIE['dni_usuario'] . "</p>";
    }

    if (isset($_COOKIE['direccion_usuario'])) {
        
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