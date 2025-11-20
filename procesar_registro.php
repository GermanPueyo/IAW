<?php
// CONFIGURACIÓN
$fichero = 'users.json';
$mensaje = "";

// LÓGICA
// 1. Verificamos si llegaron los datos
if (isset($_POST['datos'])) {
    
    $registro = $_POST['datos']; 
    $usuario = trim($registro['user']);
    $password = trim($registro['pass']);

    // 2. Validaciones
    if (strlen($usuario) <= 3) {
        $mensaje = "Error: El usuario debe tener más de 3 caracteres.";
    } elseif (strlen($password) <= 5) {
        $mensaje = "Error: La contraseña debe tener más de 5 caracteres.";
    } else {
        // 3. Guardar en JSON
        
        // Intentar leer datos existentes
        $listaUsuarios = [];
        if (file_exists($fichero)) {
            $content = file_get_contents($fichero);
            $listaUsuarios = json_decode($content, true) ?? [];
        }

        // Añadir nuevo usuario
        $listaUsuarios[] = [
            "user" => $usuario,
            "pass" => password_hash($password, PASSWORD_DEFAULT) 
        ];

        // Escribir en el archivo
        if (file_put_contents($fichero, json_encode($listaUsuarios, JSON_PRETTY_PRINT))) {
            $mensaje = "Usuario registrado con éxito";
        } else {
            $mensaje = "Error de permisos: No se pudo escribir en users.json";
        }
    }

} else {
    // Si alguien intenta entrar a esta página directamente sin enviar formulario
    $mensaje = "Acceso no válido. Debes venir del formulario.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Procesando...</title>
</head>
<body>

    <h2>Resultado del registro:</h2>
    
    <p><strong><?php echo $mensaje; ?></strong></p>

    <hr>
    <a href="formulario.php">Volver al formulario</a>

</body>
</html>