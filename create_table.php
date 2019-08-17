<?php

//Conexion a base de datos
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = "restaurant";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);  

//Sube informacion a la base de datos

//TABLA pedidos: Id_pedido, Id_mesa, fecha, entregado
$query = "SELECT Id_pedido FROM pedidos";
$result = mysqli_query($conn, $query);

if(empty($result)) {
                $query = "CREATE TABLE pedidos (
                          Id_pedido int AUTO_INCREMENT KEY,
                          Id_mesa int,
                          fecha date,
                          entregado VARCHAR (10),
                          )";
                $result = mysqli_query($dbConnection, $query);
}


//TABLA pedido_detalle: Id_pedido, Nombre, Cant, Precio

$query = "SELECT Id_pedido FROM pedido_detalle";
$result = mysqli_query($conn, $query);

if(empty($result)) {
                $query = "CREATE TABLE pedido_detalle (
                          Id_pedido int,
                          Nombre VARCHAR (255),
                          Cant int,
                          Precio int,
                          )";
                $result = mysqli_query($dbConnection, $query);
}
?>