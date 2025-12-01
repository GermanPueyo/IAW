<?php

function calcular_media($array) {
    if (count($array) == 0) return 0;
    return array_sum($array) / count($array);
}

function calcular_maximo($array) {
    if (count($array) == 0) return null;
    return max($array);
}

function calcular_minimo($array) {
    if (count($array) == 0) return null;
    return min($array);
}

function imprimir_array($array) {
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>Posición</th><th>Valor</th></tr>";

    foreach ($array as $posicion => $valor) {
        echo "<tr>";
        echo "<td>$posicion</td>";
        echo "<td>$valor</td>";
        echo "</tr>";
    }

    echo "</table>";
}

?>
