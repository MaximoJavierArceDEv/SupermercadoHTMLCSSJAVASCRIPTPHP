<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sixtyfour+Convergence&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sixtyfour+Convergence&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
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
     <div>
        <h1>Datos del producto</h1>
     </div>
   
    <?php
    //Recuperamos en variable los datos que vinen en la URL de la pagina index 
    $codigo = $_GET["codigo"];
    $descrip = $_GET["descrip"];
    $precio = $_GET["precio"];
    $foto = $_GET["foto"];
    $stock = $_GET["stock"];

    //Armamos la estructura de divs y mostramos dichas variables 
    echo"
    <div class='producto_amp'>
        <div class='foto_amp'>
        <img src = 'fotos/grandes/$foto' alt='foto'>
        </div>


        <div class='texto_amp'>
        <p>codigo. $codigo</p>
        <p>$descrip</p>
        <p>$ $precio</p>
        <p>stock: $stock unidades.</p>
        <a href='index.php' titile='Volver al listado' class='boton'>Volver</a>
        </div>
    </div>
     ";



   
 ?>


 </main>
 
 <footer>
 </footer>


    
</body>
</html>