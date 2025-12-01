<?php
$nota = rand(1, 10);
echo "<h2>Nota obtenida: $nota</h2>";

if ($nota < 5) {
    echo "Calificación: Insuficiente";
} elseif ($nota < 6) {
    echo "Calificación: Suficiente";
} elseif ($nota < 7) {
    echo "Calificación: Bien";
} elseif ($nota < 9) {
    echo "Calificación: Notable";
} else {
    echo "Calificación: Sobresaliente";
}
?>
