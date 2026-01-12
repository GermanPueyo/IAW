<?php
setcookie("name", false, time() - 3600);
setcookie("surnames", false, time() - 3600);
setcookie("fondo", false, time() - 3600);
setcookie("frente", false, time() - 3600);
setcookie("letra", false, time() - 3600);
header("location:practica_index.php");
?>