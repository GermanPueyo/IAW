<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta charset="UTF-8">
        <title>Tienda Simple</title>
    </head>
    <body>
        <h1>Selecciona tus productos</h1>

        <form method="POST">
            <input type="checkbox" name="artículos[]" value="Camiseta">
            <label>Camiseta (20€)</label><br>

            <input type="checkbox" name="articulos[]" value="Pantalón">
            <label>Pantalón (30€)</label><br>

            <input type="checkbox" name="articulos[]" value="Zapatos">
            <label>Zapatos (50€)</label><br>

            <br>
            <input type="submit" value="Comprar">
        </form>
        <hr>

        <?php
        // Base de datos de precios (arrays)
        // HTML nos manda el nombre ("Camiseta"), php necesita saber
        // cuanto vale, por lo que hay que crear una referencia es decir: "Nombre" => Precio
        $precios = [
            "Camiseta" => 20,
            "Pantalón" => 30,
            "Zapatos" => 50,
        ];

        // Ahora viene la lógica de recepción

        // Utilizo isset para comprobar si la variable existe
        // $_POST['articulos'] es la lista que llega del formulario
        
        if (isset($_POST['articulos'])) {
            echo "<h3>Detalle de la compra:</h3>";

            // Tenemos que poner la cuenta a 0 antes de empezar a sumar
            $total = 0;
            // Guardamos la lista que llegó del formulario en una variable más cómoda
            $seleccionados = $_POST['articulos'];

            echo "<ul>";

            //Creamos el bucle
            //Utilizo foreach para dividirlo
            foreach ($seleccioanados as $item) {

                // Recupero los precios
                $precio_actual = $precios[$item];

                //mostramos en pantalla qué producto es y cuánto vale
                echo "<li> Has comprado: <b>$item</b> - Precio: $precio_actual € </li>";

                // Suma total
                $total = $total + $precio_actual;
            }

            echo "</ul>";

            echo "<h3>Total a pagar: " . $total . "€</h3>";
        }
        // Una pequeña gestión de errores
        // Si no entró en el if de arriba
        elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<b styler='color:red'>Por favor, selecciona al menos un producto.</b>";
        }
        ?>
    </body>
</html>