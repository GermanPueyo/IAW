<?php
$numero = 7; // cambia este valor según el número que quieras multiplicar

echo "<h2>Tabla de multiplicar del $numero</h2>";

for ($i = 1; $i <= 10; $i++) {
    $resultado = $numero * $i;
    echo "$numero x $i = $resultado<br>";
}
?>
