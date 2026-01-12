<?php
include "comprobar.php";
if(hayCookie()){
    header("location:saludo.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión - Riot Games</title>
    <link rel="stylesheet" href="style.css">
    <style>
        
        .pref-label { font-size: 10px; font-weight: 700; color: #111; margin-bottom: 5px; display: block; }
        .input-group select { width: 100%; height: 48px; background-color: #ededed; border-radius: 4px; border: none; padding: 0 10px; margin-bottom: 16px; }
    </style>
</head>
<body>
    <svg class="top-logo" viewBox="0 0 169 48">...</svg>

    <div class="login-card">
        <h1>Preferencias</h1>

        <form action="saludo.php" method="GET">
            <div class="input-group">
                <input type="text" name="nombre" placeholder="NOMBRE" required>
            </div>
            <div class="input-group">
                <input type="text" name="apellidos" placeholder="APELLIDOS" required>
            </div>

            <div class="input-group">
                <span class="pref-label">COLOR DE FONDO</span>
                <input type="color" name="fondo" value="#FFFFFF">
            </div>

            <div class="input-group">
                <span class="pref-label">COLOR DE TEXTO</span>
                <input type="color" name="frente" value="#000000">
            </div>

            <div class="input-group">
                <span class="pref-label">TIPO DE LETRA</span>
                <select name="letra">
                    <option value="Arial, sans-serif">Arial (Estándar)</option>
                    <option value="'Shadows Into Light', cursive">Shadows Into Light</option>
                    <option value="'Roboto', sans-serif">Roboto</option>
                </select>
            </div>

            <button class="btn-submit" type="submit">
                <svg viewBox="0 0 32 32">
                    <path d="M22.8011 14.75L14.2234 6.70971L16.0474 5L26.8695 15.1441C27.3732 15.6163 27.3732 16.3817 26.8695 16.8538L16.0474 26.998L14.2234 25.2883L22.7989 17.25H4.75V14.75H22.8011Z"></path>
                </svg>
            </button>
        </form>
    </div>
</body>
</html>