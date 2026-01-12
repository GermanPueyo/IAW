<?php
include "practica_comprobar.php";
if(hayCookie()){
    header("location:practica_saludo.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Registro de usuario | Bizi Zaragoza</title>
    <link rel="stylesheet" media="all" href="style-back.css" />
    <link rel="stylesheet" media="all" href="bootstrap.min.css" />
    <link rel="stylesheet" media="all" href="style.css" />
    <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light|Slabo+27px|Roboto' rel='stylesheet' type='text/css'>
</head>
<body>
    <main role="main">
        <div class="background-grey">
            <div class="container">
                <form class="alta-form" action="practica_saludo.php" method="get">
                    <h1 class="fs32 text-center mb50">Escoge tu plan y personaliza tu estilo</h1>
                    
                    <div class="row mb25">
                        <div class="col-sm-6 mb20">
                            <label>Nombre*</label>
                            <input type="text" name="name" class="form-control" required />
                        </div>
                        <div class="col-sm-6 mb20">
                            <label>Apellidos*</label>
                            <input type="text" name="surnames" class="form-control" required />
                        </div>
                    </div>

                    <div class="card-tarifa p-4 mb-4" style="background: white; padding: 20px; border-radius: 10px;">
                        <h3 class="text-center mb-4">Preferencias de Visualización</h3>
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Color de fondo</label>
                                <input type="color" name="fondo" class="form-control" value="#FFFFFF" />
                            </div>
                            <div class="col-sm-4">
                                <label>Color de letra</label>
                                <input type="color" name="frente" class="form-control" value="#54A097" />
                            </div>
                            <div class="col-sm-4">
                                <label>Tipo de letra</label>
                                <select name="letra" class="form-control">
                                    <option value="'Roboto', sans-serif">Roboto (Bizi)</option>
                                    <option value="'Shadows Into Light', cursive">Shadows Into Light</option>
                                    <option value="'Slabo 27px', serif">Slabo 27px</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <input class="btn button" type="submit" value="Pagar y Guardar Preferencias" />
                    </div>
                </form>
            </div>
        </div>
    </main>
    </body>
</html>