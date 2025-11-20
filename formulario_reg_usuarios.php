<?php
// archivo donde guardaremos los datos
$fichero = 'users.json';
$mensaje = "";

// Lógica php
if (isset($_POST['datos'])) {
    //El siguiente comando se utiliza para recoger el array completo del formulario
    
    $registro = $_POST['datos'];
    // Ahora $registro es un array
    // utilizamos trim() para eliminar espacios en blanco al inicio y al final
    $usuario = trim($registro['user']);
    $password = trim($registro['pass']);
    

    //Ahora vamos a validar que el usuario tenga la longitud necesaria:
    if (strlen($usuario) <=3) {
        $mensaje = "El usuario debe tener más de 3 caracteres.";
    } elseif (strlen($password) <= 5) {
        $mensaje = "La contraseña debe tener más de 5 caracteres.";
    } else{
        $listaUsuarios = [];

        if (file_exists($fichero)) {
            $jsonActual = file_get_contents($fichero);
            $listaUsuarios = json_decode($jsonActual, true) ?? [];
        }
        //creamos el nuevo usuario que vamos a guardar.
        $nuevoUsuario = [
            "user" => $usuario,
            // utilizo password_has() para encriptar al contraseña de forma segura
            // PASSWORD_DEFAULT le dice a PHP que use el algoritmo más seguro actual
            "pass" => password_hash($password, PASSWORD_DEFAULT)
        ];
        $listaUsuarios[] = $nuevoUsuario;
        // Utilizamos json_encode() para hacer el contrario que decode, PHP -> JSON
        $datosParaGuardar = json_encode($listaUsuarios, JSON_PRETTY_PRINT);

        if (file_put_contents($fichero, $datosParaGuardar)) {
            $mensaje = "Usuario registrado correctamente";
        } else {
            $mensaje = "Error al guardar el archivo.";
        }
    }    
}
?>



<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta charset="UTF-8">
        <title>Registro con Arrays</title>
    </head>
    <body>
        <h1>Formulario de Registro</h1>

        <?php if ($mensaje != ""): ?>
            <p style="color: blue; font-weight: bold;">
                <?php echo $mensaje; ?>
            </p>
        <?php endif; ?>
        
        <form action="" method="POST">
            <label>Usuario (> 3 chars):</label><br>
            <input type="text" name="datos[user]" required><br><br>
            <label>Contraseña (> 5 chars>:</label><br>
            <input type="password" name="datos[pass]" required><br><br>
            
            <input type="submit" value="Registrar">
        </form>
    </body>
</html>