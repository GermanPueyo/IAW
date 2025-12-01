<?php
$numero = rand(1, 7);

switch ($numero) {
    case 1:
        $dia = "Lunes";
        break;
    case 2:
        $dia = "Martes";
        break;
    case 3:
        $dia = "Miércoles";
        break;
    case 4:
        $dia = "Jueves";
        break;
    case 5:
        $dia = "Viernes";
        break;
    case 6:
        $dia = "Sábado";
        break;
    case 7:
        $dia = "Domingo";
        break;
    default:
        $dia = "Número inválido";
}

echo "<h2>Número generado: $numero</h2>";
echo "Día de la semana: $dia";
?>
