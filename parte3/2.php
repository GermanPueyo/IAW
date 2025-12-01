<?php
$tamano = 8; // puedes cambiar el tamaño del tablero

echo "<table border='1' cellspacing='0' cellpadding='20'>";

for ($fila = 1; $fila <= $tamano; $fila++) {
    echo "<tr>";
    for ($col = 1; $col <= $tamano; $col++) {
        // Determina el color de la celda
        if (($fila + $col) % 2 == 0) {
            $color = "#FFFFFF"; // blanco
        } else {
            $color = "#000000"; // negro
        }
        echo "<td bgcolor='$color'></td>";
    }
    echo "</tr>";
}

echo "</table>";
?>
