<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
    $_SESSION['nombre'] = $_POST['name'];
    setcookie("dni_usuario", $_POST['dni_nie']);
    $datos_direccion = [
        "calle" => $_POST['address'],
        "ciudad" => $_POST['city'],
        "cp" => $_POST['zip_code']
    ];
    setcookie("direccion_usuario", serialize($datos_direccion));
    header("Location: saludo.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <title>Registro de usuario | Bizi Zaragoza</title>
    <link rel="stylesheet" media="all" href="style.css" />
    <link rel="stylesheet" media="all" href="formstyle.css" />
    </head>
  <body>
    <div class="layout-container">
      <main role="main">
        <div class="layout-content">
          <div class="background-grey">
            <div class="container">
              <div class="pos-rel form-type">
                
                <form class="alta-form" action="" method="post" id="alta-form">
                  
                  <div class="row mb50">
                    <h1 class="fs32 text-center mb50">Escoge tu plan</h1>
                    <div id="edit-product">
                      <input type="radio" name="product" value="1" checked> Abono Anual
                      <input type="radio" name="product" value="2"> Abono Mensual
                    </div>
                  </div>

                  <div id="register-inputs">
                    <div class="row mb25">
                      <div class="col-sm-6 mb20">
                        <label>Nombre*</label>
                        <input type="text" name="name" class="form-text required" required>
                      </div>
                      <div class="col-sm-6 mb20">
                        <label>Apellidos*</label>
                        <input type="text" name="surnames" class="form-text required" required>
                      </div>
                    </div>

                    <div class="row mb25">
                      <div class="col-sm-6 mb20">
                        <label>E-mail*</label>
                        <input type="email" name="e_mail" class="form-email required" required>
                      </div>
                      <div class="col-sm-6 mb20">
                        <label>DNI/NIE/Passport*</label>
                        <input type="text" name="dni_nie" class="form-text required" required>
                      </div>
                    </div>

                    <h1 class="fs32 mt45 mb20 text-center">Tu dirección de residencia</h1>
                    <div class="row">
                      <div class="col-xs-12 mb20">
                        <label>Dirección*</label>
                        <input type="text" name="address" class="form-text required" required>
                      </div>
                      <div class="col-sm-6 mb20">
                        <label>Ciudad*</label>
                        <input type="text" name="city" class="form-text required" required>
                      </div>
                      <div class="col-sm-6 mb20">
                        <label>Código postal*</label>
                        <input type="text" name="zip_code" class="form-text required" required>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-12 text-center">
                        <input class="btn button" type="submit" value="Pagar" />
                      </div>
                    </div>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </body>
</html>