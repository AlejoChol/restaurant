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


//INSERTAR DATO
//TABLA menu_opciones: id_opcion, id_item, Nombre
//TABLA menu_opcionesItem: id_opcionItem, id_opcion, Nombre
if(mysqli_query($conn,"INSERT INTO menu_opciones (id_item, Nombre) VALUES('1','Relleno');")){
    echo "New record created successfully";
} else {
	$error=1;
    echo "Error: <br>" . mysqli_error($conn);
}
if(mysqli_query($conn,"INSERT INTO menu_opcionesItem (id_opcion, Nombre) VALUES('1','Jamon y Queso');")){
    echo "New record created successfully";
} else {
	$error=1;
    echo "Error: <br>" . mysqli_error($conn);
}
if(mysqli_query($conn,"INSERT INTO menu_opcionesItem (id_opcion, Nombre) VALUES('1','Carne con Aceitunas');")){
    echo "New record created successfully";
} else {
	$error=1;
    echo "Error: <br>" . mysqli_error($conn);
}


/*
//MODIFICAR COLUMNA
if(mysqli_query($conn,"ALTER TABLE menu_items MODIFY COLUMN ImgPath VARCHAR(120);")){
    echo "New record created successfully";
} else {
	$error=1;
    echo "Error: <br>" . mysqli_error($conn);
}*/

/*
//MODIFICAR DATO
if(mysqli_query($conn,"UPDATE menu_items SET id_categoria = '2' WHERE id_categoria='1'")){
    echo "New record created successfully";
} else {
	$error=1;
    echo "Error: <br>" . mysqli_error($conn);
}*/


?>
</body>
</html>