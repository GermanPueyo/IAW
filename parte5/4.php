<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Tabla de multiplicar</title>
</head>
<body>

<form method="post">
    <input type="number" name="numero" min="1" max="10" placeholder="1 - 10">
    <button type="submit">Mostrar</button>
</form>

<?php
if (isset($_REQUEST["numero"])) {
    $numero = $_REQUEST["numero"];

    if ($numero == "") {
        echo "Error: El campo está vacío";
        exit;
    }

    if ($numero < 1 || $numero > 10) {
        echo "Error: Debe ser un número entre 1 y 10";
        exit;
    }

    echo "Tabla del $numero <br><br>";

    for ($i = 1; $i <= 10; $i++) {
        echo "$numero x $i = " . ($numero * $i) . "<br>";
    }
}
?>

</body>
</html>
