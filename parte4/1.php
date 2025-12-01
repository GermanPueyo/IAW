<?php

$numeros = [];

for ($i = 0; $i < 10; $i++) {
    $numeros[] = rand(1, 30);
}


echo "<h2>Valores del array:</h2>";

foreach ($numeros as $valor) {
    echo $valor . "<br>";
}
?>
