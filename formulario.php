<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta charset="UTF-8">
        <title>Registro con Arrays</title>
    </head>
    <body>
        <h1>Formulario de Registro</h1>

        <form action="procesar_registro.php" method="POST">

            <label>Usuario (> 3 chars):</label><br>
            <input type="text" name="datos[user]" required><br><br>
            
            <label>Contraseña (> 5 chars>):</label><br>
            <input type="password" name="datos[pass]" required><br><br>
            
            <input type="submit" value="Registrar">
        </form>
    </body>
</html>