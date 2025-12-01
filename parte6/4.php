<?php
session_start();

if (isset($_POST["user"]) && isset($_POST["pass"])) {
    if ($_POST["user"] == "admin" && $_POST["pass"] == "1234") {
        $_SESSION["login"] = true;
        header("Location: secreta.php");
    } else {
        $error = "Datos incorrectos";
    }
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"></head>
<body>

<form method="post">
    <input type="text" name="user" placeholder="Usuario" required><br>
    <input type="password" name="pass" placeholder="Contraseña" required><br>
    <button>Entrar</button>
</form>

<p><?= $error ?? "" ?></p>

</body>
</html>
