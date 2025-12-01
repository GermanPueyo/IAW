<?php
require("2.php");

$numeros = [12, 5, 8, 30, 3, 22, 9, 14];

echo "<h2>Array original</h2>";
imprimir_array($numeros);

echo "<br>";

echo "Media: " . calcular_media($numeros) . "<br>";
echo "Máximo: " . calcular_maximo($numeros) . "<br>";
echo "Mínimo: " . calcular_minimo($numeros) . "<br>";

?>
