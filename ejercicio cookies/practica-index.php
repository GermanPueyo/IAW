<?php
include "practica-comprobar.php";
if (hayCookie()){
    header("location:practica-saludo.php");
}
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Formulario de recohida de preferencias</title>
    </head>
    <body>
        <h1>Formulario de Registro</h1>

        <form action="practica-saludo.php" method="POST">

            <label>Nombre:</label><br>
            <input type="text" name="nombre" id="nombre" required><br><br>
            
            <label>Primer apellido:</label><br>
            <input type="text" name="apellido" id="apellido" required><br><br>
            
            <label>Color de fondo deseado:</label>
            <input type="text" name="color_deseado_fondo" id="color_deseado_fondo" required><br><br>
            
            <label for="tipo_de_letra">tipo de letra</label>
            <select name=""
            
            <input type="submit" value="Registrar">
        </form>
    </body>
</html>