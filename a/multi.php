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
<script src="multi.js"></script>
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

    <!--- Menu de busqueda -->
    <div class="formulario">
        <select name="menu" id="menu" onchange="activar()">
            <option value="1">Por codigo</option>
            <option value="2">Por descripcion</option>
            <option value="3">Por Marca</option>
            <option value="4">Por Precio</option>
        </select>
    </div>

    <div class="formCod" id="formCod">
        <form action="multi.php" method='post'>
            <p>Ingrese codigo a buscar 
                <input type="number" name="codigo">
                 <button type="submit" name="boton_cod">buscar</button></p>
        </form>
    </div>



    <div class="formDesc" id="formDesc">
        <form action="multi.php" method='post'>
            <p>Ingrese descrip <input type="text" name="descrip">
        <button type="submit" name="boton_desc">buscar</button>
        </p>
        </form>
    </div>


    <div class="formMarca" id="formMarca">
        <form action="multi.php" method='post'>
            <p>Por marca <input type="text" name="marca">
        <button type="submit" name="boton_marca">buscar</button>
        </p>
        </form>
    </div>



    
    <div class="formPrecio" id="formPrecio">
        <form action="multi.php" method='post'>
            <p>Precio desde $ <input type="number" name="precio_min">
            Hasta $: <input type="number" name="precio_max" >
        <button type="submit" name="boton_precio">buscar</button>
        </p>
        </form>
    </div>


    <?php
   include("funciones.php");
    //Si se precio el botón del codigo
    if (isset($_POST["boton_cod"]))
    buscarCod();
    else
      //Si se presiono el boton de la discripcion 
    if(isset($_POST["boton_desc"]))
     buscarDesc();
    else    
    //Buscar marca
    if(isset($_POST["boton_marca"]))
    buscarMarca();
    else
    if(isset($_POST["boton_precio"]))
    buscarPrecio();
    
    
     ?>
 </div>
 </main>
 


    
</body>
</html>