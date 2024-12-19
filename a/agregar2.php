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
  
<?php

include("funciones.php");

                $descrip = $_POST["descrip"];
                $stock = $_POST["stock"];
                $precio = $_POST["precio"];
                $foto = $_FILES["foto"]["name"];
                $codigo = $_POST["codigo"];
                $marca = $_POST["marca"];
                $sector = $_POST["sector"];

                $consulta="INSERT INTO productos (descrip, stock, precio, foto, codigo, marca, sector) VALUES ('$descrip', '$stock', '$precio', '$foto', '$codigo', '$marca', '$sector')";
                $resultado=baseDatos($consulta);
                if($resultado="")
                {

                    echo"<script>alert('EL PRODUCTO NO SE PUDO AGREGAR');window.location='agregar.php';</script>";

                }
                else
                {

                    echo"<script>alert('EL PRODUCTO SE PUDO AGREGAR');window.location='agregar.php';</script>";
                    


                }

?>









 </main>
 


    
</body>
</html>