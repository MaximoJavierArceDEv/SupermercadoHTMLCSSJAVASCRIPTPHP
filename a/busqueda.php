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
        <h1>Búsqueda por codigo de barra</h1>
     </div>

    <div class="formulario">
        <form action="busqueda.php" method="post">
       <p>Ingrese Código a buscar 
            <input type="number" name="codigo" min="1111111111111" max="9999999999999"  autofocus required>
           <button type="submit" name="boton">Buscar</button>
           </p>
        </form>
    </div>



   
    <?php
    //Si el usuario presiono el boton buscar 
    if(isset($_POST["boton"]))
    {
     //Recupero el codigo del formulario 
     $codigo=$_POST["codigo"];
     $consulta="select * from productos where codigo=$codigo";
     include("funciones.php");
     $resultado = baseDatos($consulta);
     $n = mysqli_num_rows($resultado); //saber cuantas filas me trajo de la tabla
     if($n==1) //Si lo encontro 
    {
    mysqli_data_seek($resultado,0); // Me posiciono en la fila 0
    $fila=mysqli_fetch_array($resultado);
    $descrip=$fila["descrip"];
    $stock=$fila["stock"];
    $precio=$fila["precio"];
    $foto=$fila["foto"];
    

    
    //Recuperamos en variable los datos que vinen en la URL de la pagina index 
 
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

    
    } // del if($n==1) si lo encontró 
    else{
        echo"
        <div class='producto_amp'>
            <div class='foto_amp'>
            <img src = 'fotos/error.jpg' alt='foto'
            </div>
            <div class='texto_amp'>
            <p>El codigo buscado no figura en el sistema</p>
            <a href='busqueda.php' titile='cerrar' class='boton'>Cerrrar</a>
            </div>
        </div>
         ";  
    }
  }
 ?>
 </main>
 
 <footer>
 </footer>


    
</body>
</html>