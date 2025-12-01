<?php
// Genera un número aleatorio: 0 o 1
$moneda = rand(0, 1);

if ($moneda == 0) {
    echo "<h2>Ha salido cara</h2>";
    echo '<img src="https://upload.wikimedia.org/wikipedia/commons/2/2e/Euro_coin_2_euros_obverse_common_2007.png" alt="Cara" width="200">';
} else {
    echo "<h2>Ha salido cruz</h2>";
    echo '<img src="https://upload.wikimedia.org/wikipedia/commons/5/55/2_euros_common_reverse_2007.png" alt="Cruz" width="200">';
}
?>
