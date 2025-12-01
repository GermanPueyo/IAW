<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Calculadora</title>
</head>
<body>

<form method="post">
    <input type="number" name="num1" step="any" placeholder="Número 1">

    <select name="operacion">
        <option value="+">+</option>
        <option value="-">−</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>

    <input type="number" name="num2" step="any" placeholder="Número 2">
    <button type="submit">Calcular</button>
</form>

<?php
if (isset($_REQUEST["num1"]) && isset($_REQUEST["num2"]) && isset($_REQUEST["operacion"])) {

    $num1 = $_REQUEST["num1"];
    $num2 = $_REQUEST["num2"];
    $op = $_REQUEST["operacion"];

    if ($num1 === "" || $num2 === "") {
        echo "Error: Hay campos vacíos";
        exit;
    }

    if (!is_numeric($num1) || !is_numeric($num2)) {
        echo "Error: Introduce números válidos";
        exit;
    }

    if ($op == "+") $res = $num1 + $num2;
    elseif ($op == "-") $res = $num1 - $num2;
    elseif ($op == "*") $res = $num1 * $num2;
    elseif ($op == "/") {
        if ($num2 == 0) {
            echo "Error: No se puede dividir entre 0";
            exit;
        }
        $res = $num1 / $num2;
    } else {
        echo "Operación no válida";
        exit;
    }

    echo "Tu operación: $num1 $op $num2 = $res";
}
?>

</body>
</html>
