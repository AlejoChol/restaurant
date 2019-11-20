<html>
<head>
  <link rel="stylesheet" href="format_form.css">
</head>
<body>
<?php

//Conexion a base de datos
$dbhost = 'localhost';
$dbuser = 'poli_uno';
$dbpass = 'poli1';
$dbname = "poli_dos";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);  

//Sube informacion a la base de datos

//TABLA pedidos: Id_pedido, Id_mesa, fecha, entregado


if ($_SERVER['REMOTE_ADDR'] == "127.0.0.1") {
   $mesa = 1;
}
else {
	$mesa = 0;
}											//Id de la mesa q realizo el pedido. 0 si no entiende q mesa es

$fecha = date ('Y-m-d');					//Fecha del pedido

$status = "No";				//Estado por defecto de cuando se sube un pedido, cuando este se lleve a cabo se actualizara a "Si"


$error=0;
if(mysqli_query($conn,"INSERT INTO pedidos (Id_mesa, fecha, entregado) VALUES('$mesa', '$fecha', '$status');")){
    echo "New record created successfully";
} else {
	$error=1;
    echo "Error: <br>" . mysqli_error($conn);
}  


$Id_max = mysqli_query($conn, "SELECT MAX( CAST( `Id_pedido` AS UNSIGNED) ) AS max FROM `pedidos`;");
$pedido_Num = implode($Id_max->fetch_array(MYSQLI_ASSOC));

//TABLA pedido_detalle: Id_pedido, Nombre, Cant, Precio

$items_Cant = ($_POST['itemCount']);		//Cantidad de Items

$i = 1;
for($i = 1;$i <= $items_Cant; $i++){
	$Nombre = ($_POST['item_name_'. $i]);
	$Cant = ($_POST['item_quantity_'. $i]);
	$Detalle = ($_POST['item_options_'. $i]);
	$Precio = ($_POST['item_price_'. $i]);
	mysqli_query($conn, "INSERT INTO pedido_detalle (Id_pedido, Nombre, Cant, detalles, Precio) VALUES('$pedido_Num','$Nombre', '$Cant','$Detalle', '$Precio');");
}
if(!$error){
	header("Location: http://ags.com.ar/DOS/index.php?redirect=yes");
}
?>
</body>
</html>