<?php
include "practica-comprobar.php";
$hayPreferencias = true;
$array = null;
if (hayCookie()==false){
    if(hayGet()==false){
        $hayPreferencias = false;
    }
    else{
        $array=$_GET;
    }
}
else{
    $array=$_COOKIE;
}
if($hayPreferencias == false){
    header("location:practica-index.php");
}
else{
    foreach($array as $indice=>$valor){
        $$indice=$valor;
    }
    setcookie("nombre", $nombre, time()*60*60*24*30);
    setcookie("apellido", $apellido, time()*60*60*24*30);
    setcookie("color_deseado_fondo", $color_deseado_fondo, time()*60*60*24*30);
    setcookie("color_deseado_letra", $color_deseado_fondo, time()*60*60*24*30);
    setcookie("eleccion", $eleccion, time()*60*60*24*30);
}