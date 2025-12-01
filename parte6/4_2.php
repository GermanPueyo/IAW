<?php
session_start();

if (!isset($_SESSION["login"])) {
    echo "PROHIBIDO";
    exit;
}

if (isset($_POST["cerrar"])) {
    session_destroy();
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"></head>
<body>

<h1>Zona secreta</h1>

<form method="post">
    <button name="cerrar">Cerrar sesión</button>
</form>

</body>
</html>
