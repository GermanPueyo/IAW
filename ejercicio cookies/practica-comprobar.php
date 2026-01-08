<?php
function hayCookie(){
    return isset($_COOKIE["nombre"]) && isset($_COOKIE["apellido"]) && isset($_COOKIE["color_deseado_fondo"]) && isset($_COOKIE["color_deseado_letra"]) && isset($_COOKIE["eleccion"]) && isset($_COOKIE["tipo de letra"]);
}
function hayGet(){
    return isset($_GET["nombre"]) && isset($_GET["apellido"]) && isset($_GET["color_deseado_fondo"]) && isset($_GET["color_deseado_letra"]) && isset($_GET["eleccion"]) && isset($_GET["tipo de letra"]);
}
?>
