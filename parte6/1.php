<?php
session_start();

if (isset($_POST["reiniciar"])) {
    session_destroy();
    header("Location: contador.php");
    exit;
}

if (!isset($_SESSION["contador"])) {
    $_SESSION["contador"] = 1;
} else {
    $_SESSION["contador"]++;
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Contador</title></head>
<body>

<h2>Has recargado esta página: <?= $_SESSION["contador"] ?> veces</h2>

<form method="post">
    <button name="reiniciar">Reiniciar sesión</button>
</form>

</body>
</html>
