<?php
error_reporting(0); // Desactiva la notificación de errores
ini_set('display_errors', 0); // Evita que los errores se muestren en pantalla  
// Incluir la conexión a la base de datos
include("funciones.php"); // Esto incluye un archivo externo donde probablemente esté la conexión a la base de datos y las funciones necesarias para interactuar con ella.

// Definir las variables que controlarán la lógica
$mostrarFormulario = false; // Esta variable controla si se debe mostrar el formulario de agregar un nuevo producto.
$codigoExistente = false; // Esta variable indica si el código ingresado ya existe en la base de datos.
$codigo = ""; // Esta variable guardará el código del producto ingresado.

// Verificar si el usuario ha enviado el formulario con un código
if (isset($_POST["codigo"])) { // Verificamos si el código fue enviado a través del formulario.
    $codigo = $_POST["codigo"]; // Guardamos el código enviado en la variable $codigo.
    $consulta = "SELECT * FROM productos WHERE codigo = $codigo"; // Preparamos la consulta para verificar si el código existe en la base de datos.
    $resultado = baseDatos($consulta); // Ejecutamos la consulta y guardamos el resultado.

    // Si no hay resultados, significa que el código no existe en la base de datos
    if (mysqli_num_rows($resultado) == 0) { // Si no hay productos con el código ingresado
        $mostrarFormulario = true; // Entonces mostramos el formulario para agregar un nuevo producto
    } else {
        // Si el código ya existe, obtenemos los datos del producto
        $codigoExistente = true; // Establecemos que el código ya existe.
        $fila = mysqli_fetch_array($resultado); // Obtenemos los datos del producto existente.
        // Guardamos los detalles del producto en variables para usarlas más adelante.
        $descrip = $fila["descrip"];
        $stock = $fila["stock"];
        $precio = $fila["precio"];
        $foto = $fila["foto"];
        // Mover la foto a una carpeta de tu servidor
    

    // Consulta SQL para insertar el nuevo producto en la base de datos
    $consultaInsert = "DELETE FROM productos (codigo, descrip, stock, precio, marca, foto) 
                       VALUES ('$codigo', '$descrip', '$stock', '$precio', '$marca', '$foto')";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link type="text/css" rel="stylesheet" href="estilo.css"> <!-- Link a la hoja de estilo CSS -->
    <script>
        // Función JavaScript para mostrar el formulario solo cuando el código sea nuevo
        function verificarCodigo() {
            var codigo = document.getElementById("codigo").value; // Obtenemos el valor del código ingresado.
            if (codigo !== "") { // Si el código no está vacío
                document.getElementById("form").style.display = "block"; // Mostramos el formulario
            }
        }
    </script>
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
        <h1 id="titu">Complete los datos del producto</h1> <!-- Título principal de la página -->
    </div>

    <!-- Formulario para ingresar el código -->
    <div id="ingresarcod">
        <p class="ingresarcod">
          <p class="pepe"> Ingrese el código nuevo:</p> 
            <form class="formularioo" action="agregar.php" method="POST" onsubmit="verificarCodigo(); return false;"> <!-- Enviar el formulario sin recargar la página -->
            <!-- return false; impide que el formulario se envíe de la forma estándar (que sería recargar la página y enviar los datos a la URL del formulario). -->
                <input type="number" name="codigo" id="codigo" required> <!-- Campo para ingresar el código del producto -->
                <button type="submit" name="boton">Enviar</button> <!-- Botón para enviar el código -->
            </form>
        </p>
    </div>

    <?php if ($codigoExistente): ?> <!-- Si el código ya existe en la base de datos y acepta esta condicion si codigoExistente es true que lo cambiamos arriba-->
        
        <p>El código de producto ya existe</p>
        <div class="producto_amp">
            <div class="foto_amp">
                <a href="fotos/grandes/<?php echo $foto; ?>" title="foto" target="blank">
                    <img src="fotos/grandes/<?php echo $foto; ?>" alt="foto_del_producto"> <!-- Muestra la foto del producto -->
                </a>
            </div>
            <div class="texto_amp">
                <p>Codigo: <?php echo $codigo; ?></p> <!-- Muestra el código del producto -->
                <p><?php echo $descrip; ?></p> <!-- Muestra la descripción del producto -->
                <p class="pre">$<?php echo $precio; ?></p> <!-- Muestra el precio del producto -->
                <p>Stock: <?php echo $stock; ?> u.</p> <!-- Muestra el stock del producto -->
                <a class="volveruwu" href="buscar.php" title="Volver">Cerrar</a> <!-- Enlace para volver a la búsqueda -->
            </div>
        </div>
    <?php elseif ($mostrarFormulario): 
    $agregar = true;
    ?>
        <!-- Si el código es nuevo (no existe en la base de datos), mostrar el formulario para agregar el producto -->
        <div class="formulario" id="form">
            <form action="agregar2.php" method="POST" enctype="multipart/form-data">
                <!-- Mostrar el código ingresado en el formulario -->
                <p>Código Nuevo:
                    <input type="number" name="codigo" value="<?php echo $codigo; ?>" readonly> <!-- Mostrar el código ingresado, solo lectura -->
                </p>

                <p>Ingrese la descripción:
                    <input type="text" name="descrip" autofocus required> <!-- Campo para ingresar la descripción -->
                </p>

                <p>Ingrese el stock:
                    <input type="number" name="stock" required> <!-- Campo para ingresar el stock -->
                </p>

                <p>Ingrese el precio:
                    <input type="number" name="precio" required> <!-- Campo para ingresar el precio -->
                </p>

                <p>Ingrese la marca:
                    <input type="text" name="marca" required> <!-- Campo para ingresar la marca del producto -->
                </p>

                <p>Ingrese la foto:
                    <input type="file" name="foto" required> <!-- Campo para subir la foto del producto -->
                </p>

                <button type="submit" name="boton">Enviar</button> <!-- Botón para enviar los datos del nuevo producto -->
            </form>
        </div>
        
    <?php endif; ?><!-- Fin del formulario -->

  


</main>

</body>

</html>