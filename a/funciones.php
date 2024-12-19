<?php
//Me conecto al servidor mysql
function baseDatos ($consulta){
$conexion = mysqli_connect('localhost', 'root','root', 'productos');
// Elijo la BD
mysqli_select_db($conexion, "productos");
//Ejecuto la consulta que viene desde la pagina principal
$resultado=mysqli_query($conexion, $consulta);
//Cierro la conexion con el servidor 
mysqli_close($conexion);
//Devuelvo el resultado de la conexion a la pagina principal
return $resultado;
}

function buscarCod(){
//Recupero el codigo del formulario 
$codigo=$_POST["codigo"];

$consulta="select * from productos where codigo=$codigo";
$resultado = baseDatos($consulta);
$n = mysqli_num_rows($resultado); //saber cuantas filas me trajo de la tabla

if($n==1){
    mysqli_data_seek($resultado,1); // Me posiciono en la fila 0
    $fila=mysqli_fetch_array($resultado);
    $descrip=$fila["descrip"];
    $stock=$fila["stock"];
    $precio=$fila["precio"];
    $foto=$fila["foto"];
    

    
    //Recuperamos en variable los datos que vinen en la URL de la pagina index 
 
    //Armamos la estructura de divs y mostramos dichas variables 
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
   

} //Si no lo encontro
else{
    echo"
    <div class='producto_amp'>
        <h1>Producto no encontrado</h1>
        </div>
    </div>
    ";

}

 
}

function BuscarDesc(){
 //Recupero el formulario
 $descrip=$_POST["descrip"];
 $consulta="select * from productos where descrip like'$descrip%'";
 $resultado = baseDatos($consulta);
 $n = mysqli_num_rows($resultado); //saber cuantas filas me trajo de la tabla
 if($n>=1){
    for($i=0;$i<$n;$i++){
         mysqli_data_seek($resultado,$i); // Me posiciono en la fila n
        $fila=mysqli_fetch_array($resultado);
        $descrip=$fila["descrip"];
        $codigo=$fila["codigo"];
        $stock=$fila["stock"];
         $precio=$fila["precio"];
        $foto=$fila["foto"];
 //Armamos la estructura de divs y mostramos dichas variables 
 echo"
 <div class='producto_amp'>
     <div class='foto_amp'>
     <img src = 'fotos/grandes/$foto' alt='foto'>
     </div>
     <div class='texto_amp'>
     <p>Código: $codigo</p>
     <p>$descrip</p>
     <p>$ $precio</p>
     <p>stock: $stock unidades.</p>
     <a href='multi.php' titile='cerrar' class='boton'>Cerrar</a>
     </div>
 </div>
  "; 
     
        }
 }
}

function buscarMarca(){
//Recupero el codigo del formulario 
$marca=$_POST["marca"];
// echo"<script>alert('$marca')</script>";
$consulta="select * from productos where marca like'$marca%'";
$resultado = baseDatos($consulta);
$n = mysqli_num_rows($resultado); //saber cuantas filas me trajo de la tabla

if($n>=1){
    //hacer un ciclo for para que se vaya agregando todos los tipos d epproductos 
     for($i=0;$i<$n;$i++){
        mysqli_data_seek($resultado,$i); // Me posiciono en la fila n
        $fila=mysqli_fetch_array($resultado);
        $codigo=$fila["codigo"];
        $descrip=$fila["descrip"];
        $stock=$fila["stock"];
        $precio=$fila["precio"];
        $foto=$fila["foto"];
//Armamos la estructura de divs y mostramos dichas variables 
    echo"
    <div class='producto_amp'>
        <div class='foto_amp'>
        <img src = 'fotos/grandes/$foto' alt='foto'>
        </div>
        <div class='texto_amp'>
        <p>Código: $codigo</p>
        <p>$descrip</p>
        <p>$ $precio</p>
        <p>stock: $stock unidades.</p>
        <a href='multi.php' titile='cerrar' class='boton'>Cerrar</a>
        </div>
    </div>
     "; 


     } 
}
else{
    echo"
    <div class='producto_amp'>
        <h1>Producto no encontrado</h1>
        </div>
    </div>
    ";
}



}



function buscarPrecio(){
    $min = $_POST["precio_min"];
    $max = $_POST["precio_max"];
    
    // Consulta SQL para obtener productos dentro del rango de precios
    $consulta = "SELECT * FROM productos WHERE precio BETWEEN $min AND $max ORDER BY precio";
    $resultado = baseDatos($consulta);
    $n = mysqli_num_rows($resultado); // Número de filas (productos) retornadas

    if ($n >= 1) {
        // Iterar sobre cada producto en los resultados
        for ($i = 0; $i < $n; $i++) {
            mysqli_data_seek($resultado, $i); // Posicionarse en la fila $i
            $producto = mysqli_fetch_array($resultado);  // Obtener los datos del producto como un array

            // Acceder a los valores del producto desde el array
            $codigo = $producto["codigo"];
            $descrip = $producto["descrip"];
            $stock = $producto["stock"];
            $precio = $producto["precio"];
            $foto = $producto["foto"];

            // Mostrar la información del producto en formato HTML
            echo "
            <div class='producto_amp'>
                <div class='foto_amp'>
                    <img src='fotos/grandes/$foto' alt='foto'>
                </div>
                <div class='texto_amp'>
                    <p>Código: $codigo</p>
                    <p>$descrip</p>
                    <p>$ $precio</p>
                    <p>stock: $stock unidades.</p>
                    <a href='multi.php' title='cerrar' class='boton'>Cerrar</a>
                </div>
            </div>
            ";
        }
    } else {
        echo "No se encontraron productos dentro de este rango de precios.";
    }

    function agregar(){
       
        include("funciones.php");
			
			$codigo=$_POST["codigo"];
			$descrip=$_POST["descrip"];
			$stock=$_POST["stock"];
			$precio=$_POST["precio"];
			$foto=$_POST["foto"];
			$marca=$_POST["marca"];
			
			$consulta="insert into productos (codigo, descrip, stock, precio, marca, foto) values ('$codigo', '$descrip', '$stock', '$precio', '$marca', '$foto')";
			$resultado=baseDatos($consulta);
			
			if ($resultado == true){
				
				
			echo " 
			
			<script>
			formulario=document.getElementById('form');
			formulario.style.display='none';
			</script>
			
			<script>
			titu=document.getElementById('titu');
			titu.style.display='none';
			</script>
			
				<p class='satis'>El producto ha sido agregado satisfactoriamente</p>
			<div class='producto_amp'>
				<div class='foto_amp'>
				<a href='fotos/grandes/$foto' title='foto' target='blank'>
				<img src='fotos/grandes/$foto' alt='foto_del_producto'></a>
				</div>
				<div class='texto_amp'>
				<p>Código: $codigo</p>
				<p>$descrip</p>
				<p class='pre'>$$precio</p>
				<p>Stock: $stock u.</p>
				<a class='volveruwu' href='buscar.php' title='Volver' >Cerrar</a>
				</div>
				</div>
			";}
			else
			{
				echo "nu";
			}
    }

        
}

?>