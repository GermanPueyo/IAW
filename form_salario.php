<?php

use Dom\DocumentType;
$nombre="";
$apellido= "";
$edad="";
$salario= "";
$nuevoSalario=null
$mensaje="";




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $salario = floatval($_POST["salario"]);
    $edad = intval($_POST["edad"]);

    
    if ($salario > 2000) {
        $nuevoSalario = $salario;
        $mensaje = "El salario no cambia.";
    } elseif ($salario >= 1000 && $salario <= 2000) {
        if ($edad > 45) {
            $nuevoSalario = $salario * 1.03;
            $mensaje = "Se aplica un aumento del 3% (edad > 45).";
        } else {
            $nuevoSalario = $salario * 1.10;
            $mensaje = "Se aplica un aumento del 10% (edad ≤ 45).";
        }
    } elseif ($salario<1000) { 
        if ($edad < 30) {
            $nuevoSalario = 1100;
            $mensaje = "Por ser menor de 30 años, el salario pasa a ser fijo de 1100€.";
        } elseif ($edad <= 45) {
            $nuevoSalario = $salario * 1.03;
            $mensaje = "Se aplica un aumento del 3% (edad entre 30 y 45).";
        } else {
            $nuevoSalario = $salario * 1.15;
            $mensaje = "Se aplica un aumento del 15% (edad > 45).";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Formulario Ejercicio</title>
    </head>
    <body>
        <div class="card">
            <h1>Calculo del nuevo salario</h1>
            <form method="post">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required value="<?php echo htmlspecialchars($nombre); ?>">
                
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="Apellidos" id="apellidos" required value="<?php echo htmlspecialchars($apellidos); ?>">
                
                <label for="salario">Salario(€):</label>
                <input type="number" name="salario" id="salario" step="0.01" required value="<?php echo htmlspecialchars($salario; ?>">
                
                <label for="edad">Edad:</label>
                <input type="number" name="edad" id="edad" required value="<?php echo htmlspecialchars($edad); ?>">

                <button type="submit">Calcular nuevo salario</button>
            </form>

            <?php if ($nuevoSalario !== null): ?>
                <div class="resultado">
                    <h3>Resultado:</h3>
                    <p><strong>Nombre:</strong><?php echo htmlspecialchars("$nombre $apellidos"); ?></p>
                    <p><strong>Salario anterior:</strong> <?php echo number_format($salario, 2, ',', '.'); ?> €</p>
                    <p><strong>Nuevo salario:</strong> <span style="color:#28a745;"><?php echo number_format($nuevoSalario, 2, ',', '.'); ?> €</span></p>
                    <p class="mensaje"><?php echo $mensaje; ?></p>
                </div>
            <?php endif; ?>
        </div>
    </body>
</html>


