<?php

function tabla_multiplicar($numero) {
    echo "<h3>Tabla del $numero</h3>";

    for ($i = 1; $i <= 10; $i++) {
        echo "$numero x $i = " . ($numero * $i) . "<br>";
    }
}

tabla_multiplicar(7);

?>
