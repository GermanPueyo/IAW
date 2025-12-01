<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Año bisiesto</title>
</head>
<body>

<form method="post">
    <input type="number" name="anio" placeholder="Introduce un año">
    <button type="submit">Comprobar</button>
</form>

<?php
if (isset($_REQUEST["anio"])) {
    $anio = $_REQUEST["anio"];

    if ($anio == "") {
        echo "Error: El campo está vacío";
        exit;
    }

    if (!is_numeric($anio)) {
        echo "Error: Debes introducir un número";
        exit;
    }

    if (($anio % 4 == 0 && $anio % 100 != 0) || ($anio % 400 == 0)) {
        echo "El año $anio es bisiesto";
    } else {
        echo "El año $anio no es bisiesto";
    }
}
?>

</body>
</html>
