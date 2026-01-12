<?php
include "practica_comprobar.php";
$hayPreferencias = true;
$array = null;

if(hayCookie() == false){
    if(hayGet() == false){
        $hayPreferencias = false;
    } else {
        $array = $_GET;
    }
} else {
    $array = $_COOKIE;
}

if($hayPreferencias == false){
    header("location:practica_index.php");
    exit;
} else {
    foreach($array as $indice => $valor){
        $$indice = $valor;
    }
    $expira = time() + (60*60*24*30);
    setcookie("name", $name, $expira);
    setcookie("surnames", $surnames, $expira);
    setcookie("fondo", $fondo, $expira);
    setcookie("frente", $frente, $expira);
    setcookie("letra", $letra, $expira);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Bienvenido | Bizi Zaragoza</title>
    <link rel="stylesheet" media="all" href="style-back.css" />
    <link rel="stylesheet" media="all" href="bootstrap.min.css" />
    <link rel="stylesheet" media="all" href="style.css" />
    <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light|Slabo+27px|Roboto' rel='stylesheet' type='text/css'>
    <style>
        body {
            background-color: <?=$fondo?> !important;
            color: <?=$frente?> !important;
            font-family: <?=$letra?> !important;
        }
        .card-saludo { background: white; padding: 50px; border-radius: 15px; color: #333; }
    </style>
</head>
<body>
    <div class="container text-center mt-5">
        <div class="card-saludo shadow">
            <img src="bizi.svg" width="120" class="mb-4">
            <h1>Hola <?="$name $surnames"?></h1>
            <p>Tus preferencias estéticas se han aplicado a toda la web.</p>
            <p><a href="practica_borrar.php" class="btn btn-danger">Borrar cookies y volver</a></p>
        </div>
    </div>
</body>
</html>