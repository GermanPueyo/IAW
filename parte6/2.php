<?php
session_start();

if (!isset($_SESSION["numero"])) {
    $_SESSION["numero"] = rand(1,100);
    $_SESSION["intentos"] = 0;
}

$mensaje = "";

if (isset($_POST["numero"])) {
    $intento = (int)$_POST["numero"];
    $_SESSION["intentos"]++;

    if ($intento < $_SESSION["numero"]) {
        $mensaje = "El número es mayor";
    }
    elseif ($intento > $_SESSION["numero"]) {
        $mensaje = "El número es menor";
    }
    else {
        $mensaje = "¡CORRECTO! Intentos: " . $_SESSION["intentos"];
        $_SESSION["numero"] = rand(1,100);
        $_SESSION["intentos"] = 0;
    }
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Adivinar</title></head>
<body>

<h2>Adivina un número del 1 al 100</h2>

<form method="post">
    <input type="number" name="numero" min="1" max="100" required>
    <button>Adivinar</button>
</form>

<p><?= $mensaje ?></p>
<p>Intentos: <?= $_SESSION["intentos"] ?></p>

</body>
</html>
