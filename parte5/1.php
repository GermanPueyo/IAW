<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Romano a decimal</title>
</head>
<body>

<form method="post">
    <input type="text" name="romano" placeholder="Número romano">
    <button type="submit">Convertir</button>
</form>

<?php
if (isset($_REQUEST["romano"])) {
    $romano = strtoupper(trim($_REQUEST["romano"]));

    if ($romano == "") {
        echo "Error: El campo está vacío";
        exit;
    }

    if (!preg_match('/^[IVXLCDM]+$/', $romano)) {
        echo "Error: Solo se permiten números romanos (I, V, X, L, C, D, M)";
        exit;
    }

    $valores = [
        'I'=>1, 'V'=>5, 'X'=>10, 'L'=>50,
        'C'=>100, 'D'=>500, 'M'=>1000
    ];

    $decimal = 0;
    for ($i = 0; $i < strlen($romano); $i++) {
        $actual = $valores[$romano[$i]];
        $siguiente = $valores[$romano[$i + 1]] ?? 0;

        if ($actual < $siguiente) {
            $decimal -= $actual;
        } else {
            $decimal += $actual;
        }
    }

    echo "Número romano: $romano <br>";
    echo "Valor decimal: $decimal";
}
?>

</body>
</html>
