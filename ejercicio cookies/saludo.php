<?php
include "comprobar.php";
$hayPreferencias=true;
$array=null;

if(hayCookie()==false){ 
    if(hayGet()==false){ 
        $hayPreferencias=false; 
    } else {
        $array=$_GET; 
    }
} else {
    $array=$_COOKIE; 
}

if($hayPreferencias==false){
    header("location:index.php"); 
} else {
    foreach($array as $indice=>$valor){
        $$indice=$valor; 
    }
    
    setcookie("nombre",$nombre,time()+60*60*24*30);
    setcookie("apellidos",$apellidos,time()+60*60*24*30);
    setcookie("fondo",$fondo,time()+60*60*24*30);
    setcookie("frente",$frente,time()+60*60*24*30);
    setcookie("letra",$letra,time()+60*60*24*30);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="style.css">
    <style>
        
        body {
            background-image: none !important; 
            background-color: <?=$fondo?> !important; 
            color: <?=$frente?> !important; 
            font-family: <?=$letra?> !important; 
        }
        .login-card h1 { color: <?=$frente?>; }
        .reset-link { margin-top: 20px; font-weight: bold; color: #d13639; text-decoration: none; }
    </style>
</head>
<body>
    <div class="login-card">
        <h1>Hola <?="$nombre $apellidos"?></h1> 
        <a href="borrar.php" class="reset-link">Restablecer preferencias</a> 
    </div>
</body>
</html>