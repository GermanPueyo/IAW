<?php
$nombre="";
$apellido= "";
$edad="";
$salario= "";
$nuevoSalario=null
$mensaje="";


//Comprobar que se ha enviado el formulario:

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $salario = floatval($_POST["salario"]);
    $edad = intval($_POST["edad"]);

if ($salario>200) {
    $nuevoSalario = $salario;
    $mensaje = "El salario no cambia.";
} elseif ($salario>=1000 && $salario<= 2000) {
    if ($edad> 45) {
    $nuevoSalario = $salario * 1.03;
    $mensaje = "Se aplica un aumento del 3% (Edad > 45).";
    }else {
        $nuevoSalario = $salario * 1.10;
        $mensaje = "Se aplica un aumento del 10% (Edad <= 45);
    }
} elseif($salario