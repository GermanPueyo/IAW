<?php
session_start();

$palabras = [ "ARBOL","TIGRE","PLAYA","MANGO","RUEDA","LUNES","GALLO","NIEVE","MOVER",
"DULCE","CARTA","LLAVE","BRUMA","SILLA","FRESA","CANTO","BORDE","FLACO","BARCO",
"CLARA","CAMPO","VOTAR","SALTA","PARED","TENIS","JUGAR","VIENTO","MESA","BROMA",
"RAMPA","BISTE","LLORO","VERDE","HUEVO","TRAGO","ZORRO","RESTO","COPAS","REZAR",
"MANTO","NUBES","MAREA","LEJOS","GLOBO","JUNTO","NACER","NADAR","ZEBRA","ROSAS",
"LIBRO","PARDO","CREMA","MANOS","MURAL","VACIO","PUNTO","CIELO","METAL","GIRAR",
"TRUCO","RISAS","BESAR","GRANO","RONDA","LUZCO","CERCA","BANDA","MORRO","PATIO",
"BURRO","LARGO","JOVEN","FRENO","SUELO","BOSCO","VOLAR","RAPID","GRABA","REINA" ];

if (!isset($_SESSION["palabra"])) {
    $_SESSION["palabra"] = $palabras[array_rand($palabras)];
    $_SESSION["descubierta"] = array_fill(0, 5, "_");
    $_SESSION["puntos"] = 0;
}

if (isset($_POST["letra"])) {
    $letra = strtoupper($_POST["letra"]);
    $correcta = false;

    for ($i = 0; $i < 5; $i++) {
        if ($_SESSION["palabra"][$i] == $letra) {
            $_SESSION["descubierta"][$i] = $letra;
            $correcta = true;
        }
    }

    if ($correcta) $_SESSION["puntos"] += 10;
    else $_SESSION["puntos"] -= 2;
}

$mostrar = implode(" ", $_SESSION["descubierta"]);

if (!in_array("_", $_SESSION["descubierta"])) {
    $final = "¡HAS GANADO! Palabra: " . $_SESSION["palabra"];
    session_destroy();
}

?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Wordle</title></head>
<body>

<h2><?= $mostrar ?></h2>
<h3>Puntos: <?= $_SESSION["puntos"] ?? 0 ?></h3>

<form method="post">
    <input type="text" name="letra" maxlength="1" required>
    <button>Probar letra</button>
</form>

<h3><?= $final ?? "" ?></h3>

</body>
</html>
