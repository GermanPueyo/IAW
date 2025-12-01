<?php
$dado = rand(1, 6);
echo "<h2>Ha salido el número: $dado</h2>";

if ($dado == 1) {
    $imagen = "https://upload.wikimedia.org/wikipedia/commons/1/1b/Dice-1-b.svg";
} elseif ($dado == 2) {
    $imagen = "https://upload.wikimedia.org/wikipedia/commons/5/5f/Dice-2-b.svg";
} elseif ($dado == 3) {
    $imagen = "https://upload.wikimedia.org/wikipedia/commons/b/b1/Dice-3-b.svg";
} elseif ($dado == 4) {
    $imagen = "https://upload.wikimedia.org/wikipedia/commons/f/fd/Dice-4-b.svg";
} elseif ($dado == 5) {
    $imagen = "https://upload.wikimedia.org/wikipedia/commons/0/08/Dice-5-b.svg";
} else {
    $imagen = "https://upload.wikimedia.org/wikipedia/commons/2/26/Dice-6-b.svg";
}

echo "<img src='$imagen' alt='Dado $dado' width='200'>";
?>
