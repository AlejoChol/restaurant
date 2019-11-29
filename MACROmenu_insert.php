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


$error=0;

if(mysqli_query($conn,"INSERT INTO menu_items (id_categoria, Nombre, Precio, ImgPath) VALUES('0','Empanadas','$25','Assets/Images/Entradas/EmpanadasArabes.jpg');")){
    echo "New record created successfully";
} else {
	$error=1;
    echo "Error: <br>" . mysqli_error($conn);
}  


if(mysqli_query($conn,"INSERT INTO menu_items (id_categoria, Nombre, Precio, ImgPath) VALUES('1','Farfalle','$230','Assets/Images/Pastas/Farfalle.jpg');")){
    echo "New record created successfully";
} else {
	$error=1;
    echo "Error: <br>" . mysqli_error($conn);
}  


?>
</body>
</html>