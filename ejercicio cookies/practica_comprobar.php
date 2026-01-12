<?php
function hayCookie(){
    return isset($_COOKIE["name"]) && isset($_COOKIE["surnames"])
        && isset($_COOKIE["fondo"]) && isset($_COOKIE["frente"])
        && isset($_COOKIE["letra"]);
}
function hayGet(){
    return isset($_GET["name"]) && isset($_GET["surnames"])
        && isset($_GET["fondo"]) && isset($_GET["frente"])
        && isset($_GET["letra"]);
}
?>