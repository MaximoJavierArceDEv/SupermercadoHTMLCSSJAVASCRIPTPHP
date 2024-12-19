<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sixtyfour+Convergence&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sixtyfour+Convergence&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
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
        <h1>LOS PRODUCTOS DEL AÑO,COMPRA YA </h1>
    <div class=productos>

    <?php
    //vinculamos el archivo php que tiene la funcion
    include("funciones.php");
    //Armo la consulta SQL
    $consulta="select * from productos order by descrip";
    //Llamo a la función que ejecuta esta consulta
    $resultado=baseDatos($consulta);

    //Calculamos la cantidad de filas que tiene $resultados(para el for)
    $n=mysqli_num_rows($resultado);
    for ($i=0;$i<$n;$i++)
    {
     // Nos posicionamos en la fila i
     mysqli_data_seek($resultado, $i);
     //Guardo esta fila en un array (vector)
     $fila = mysqli_fetch_array($resultado);

     //separo en variables cada dato de la fila 
     $codigo=$fila["codigo"];
     $descrip=$fila["descrip"];
     $stock=$fila["stock"];
     $precio=$fila["precio"];
     $foto=$fila["foto"];
     //Imprimo los datos dentro de los divs
     echo"<div class='item'>
        <div class='foto'>
        <a href = 'ampliar.php?codigo=$codigo&descrip=$descrip&stock=$stock&precio=$precio&foto=$foto' title = 'Mas Info'>
        <img src='fotos/muestras/$foto' alt='foto'>
        </a>
        </div>
        <div class='texto'>
         <p>$descrip</p>
         <p>$$precio</p>
        </div>
     </div>
     
     
     
     
     ";
    }

 ?>
 </div>
 </main>
 


    
</body>
</html>