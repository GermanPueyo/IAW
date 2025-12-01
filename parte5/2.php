<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Piedra Papel Tijera</title>
</head>
<body>

<form method="post">
    <select name="jugador">
        <option value="">Selecciona</option>
        <option value="Piedra">Piedra</option>
        <option value="Papel">Papel</option>
        <option value="Tijera">Tijera</option>
    </select>
    <button type="submit">Jugar</button>
</form>

<?php
if (isset($_REQUEST["jugador"])) {
    $jugador = $_REQUEST["jugador"];
    $opciones = ["Piedra", "Papel", "Tijera"];

    if ($jugador == "") {
        echo "Error: Debes elegir una opción";
        exit;
    }

    if (!in_array($jugador, $opciones)) {
        echo "Error: Opción no válida";
        exit;
    }

    $maquina = $opciones[array_rand($opciones)];

    echo "Jugador: $jugador <br>";
    echo "Ordenador: $maquina <br><br>";

    if ($jugador == $maquina) {
        echo "Empate";
    } elseif (
        ($jugador == "Piedra" && $maquina == "Tijera") ||
        ($jugador == "Papel" && $maquina == "Piedra") ||
        ($jugador == "Tijera" && $maquina == "Papel")
    ) {
        echo "Jugador gana";
    } else {
        echo "Ordenador gana";
    }
}
?>

</body>
</html>
