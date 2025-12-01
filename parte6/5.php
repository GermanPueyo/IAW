<?php
session_start();

$productos = [
    "Pan" => 1.20,
    "Leche" => 1.00,
    "Huevos" => 2.50,
    "Queso" => 3.30,
    "Arroz" => 1.80
];

if (!isset($_SESSION["carrito"])) {
    $_SESSION["carrito"] = [];
}

if (isset($_POST["producto"])) {
    $prod = $_POST["producto"];
    $cant = (int)$_POST["cantidad"];

    if (isset($productos[$prod])) {
        if (!isset($_SESSION["carrito"][$prod])) {
            $_SESSION["carrito"][$prod] = 0;
        }
        $_SESSION["carrito"][$prod] += $cant;
    }
}

if (isset($_GET["eliminar"])) {
    unset($_SESSION["carrito"][$_GET["eliminar"]]);
}

if (isset($_POST["vaciar"])) {
    $_SESSION["carrito"] = [];
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"></head>
<body>

<h2>Productos</h2>

<form method="post">
    <select name="producto">
        <?php foreach($productos as $p => $precio): ?>
            <option value="<?= $p ?>"><?= $p ?> - <?= $precio ?> €</option>
        <?php endforeach; ?>
    </select>
    <input type="number" name="cantidad" value="1" min="1">
    <button>Añadir</button>
</form>

<h2>Carrito</h2>

<?php
$total = 0;

foreach ($_SESSION["carrito"] as $prod => $cant) {
    $precio = $productos[$prod];
    $subtotal = $precio * $cant;
    $total += $subtotal;

    echo "$prod | Cant: $cant | Subtotal: $subtotal € 
    <a href='?eliminar=$prod'>Eliminar</a><br>";
}

echo "<br><strong>Total: $total €</strong>";
?>

<form method="post">
    <button name="vaciar">Vaciar carrito</button>
</form>

</body>
</html>
