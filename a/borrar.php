<?php
error_reporting(0); // Desactiva la notificación de errores
ini_set('display_errors', 0); // Evita que los errores se muestren en pantalla  

include("funciones.php"); // Incluir la conexión a la base de datos y funciones

$codigoExistente = false; // Controla si el código ingresado existe
$codigo = ""; // Almacena el código del producto
$eliminado = false; // Indica si el producto fue eliminado con éxito

if (isset($_POST["codigo"])) {
    $codigo = $_POST["codigo"]; // Captura el código ingresado

    // Verifica si el producto existe
    $consulta = "SELECT * FROM productos WHERE codigo = $codigo";
    $resultado = baseDatos($consulta);

    if (mysqli_num_rows($resultado) > 0) {
        $codigoExistente = true; // El código existe
        $fila = mysqli_fetch_array($resultado);

        // Almacena detalles del producto para mostrar al usuario
        $descrip = $fila["descrip"];
        $stock = $fila["stock"];
        $precio = $fila["precio"];
        $foto = $fila["foto"];
    } else {
        $codigoExistente = false; // El código no existe
    }
}

// Si el usuario confirma la eliminación
if (isset($_POST["confirmar_borrar"]) && isset($_POST["codigo"])) {
    $codigo = $_POST["codigo"]; // Captura el código

    // Consulta para eliminar el producto
    $consultaDelete = "DELETE FROM productos WHERE codigo = '$codigo'";
    if (baseDatos($consultaDelete)) {
        $eliminado = true;

        // Si es necesario, elimina la foto asociada
        if (!empty($foto) && file_exists("fotos/grandes/$foto")) {
            unlink("fotos/grandes/$foto");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Producto</title>
    <link type="text/css" rel="stylesheet" href="estilo.css">
</head>

<body>

<header>



    <nav>
    <a href="index.php"><img src="fotos/logo.png"></a>
            <ul>
                <li><a href="busqueda.php">Busqueda</a></li>
                <li><a href="agregar.php">Agregar</a></li>
                <li><a href="#">Modificar</a></li>
                <li><a href="borrar.php">Borrar</a></li>
                <li><a href="multi.php">multiBusqueda</a></li>
            </ul>
    </nav>
    
</header>

<main>
    <div class="titulo">
        <h1>Eliminar Producto</h1>
    </div>

    <!-- Formulario inicial para ingresar el código -->
    <div id="ingresarcod">
        <p class="pepe">Ingrese el código del producto a borrar:</p>
        <form action="borrar.php" method="POST" class="formularioo">
            <input type="number" name="codigo"  class="pepe2" required>
            <button type="submit" name="buscar" class="boton4">Buscar</button>
        </form>
    </div>

    <?php if ($codigoExistente): ?> <!-- Si el producto existe -->
        <div class="producto_amp">
            <h2>Detalles del Producto</h2>
            <div class="foto_amp">
                <img src="fotos/grandes/<?php echo $foto; ?>" alt="Foto del Producto">
            </div>
            <div class="texto_amp">
                <p>Código: <?php echo $codigo; ?></p>
                <p>Descripción: <?php echo $descrip; ?></p>
                <p>Precio: $<?php echo $precio; ?></p>
                <p>Stock: <?php echo $stock; ?> u.</p>
            </div>
        </div>

        <!-- Formulario para confirmar eliminación -->
        <form action="borrar.php" method="POST">
            <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
            <button type="submit" name="confirmar_borrar" class="boton3">Confirmar Eliminación</button>
        </form>

    <?php elseif (isset($_POST["buscar"])): ?> <!-- Si no se encuentra el producto -->
        <p class="pepe">No se encontró ningún producto con el código ingresado. Intente nuevamente.</p>

    <?php elseif ($eliminado): ?> <!-- Si el producto fue eliminado -->
        <p class="pepe">El producto con código <?php echo $codigo; ?> ha sido eliminado correctamente.</p>

    <?php endif; ?>
</main>

</body>

</html>