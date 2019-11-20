<?php

//Conexion a base de datos
$dbhost = 'localhost';
$dbuser = 'poli_uno';
$dbpass = 'poli1';
$dbname = "poli_dos";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);  

//Sube informacion a la base de datos

//TABLA pedidos: Id_pedido, Id_mesa, fecha, entregado
$query = "SELECT Id_pedido FROM pedidos";
$result = mysqli_query($conn, $query);

if(empty($result)) {
                $query = "CREATE TABLE IF NOT EXISTS pedidos (
                          Id_pedido int AUTO_INCREMENT KEY,
                          Id_mesa int,
                          fecha date,
                          entregado VARCHAR (10)
                          )";
                $result = mysqli_query($conn, $query);
}


//TABLA pedido_detalle: Id_pedido, Nombre, Cant, detalles, Precio

$query = "SELECT Id_pedido FROM pedido_detalle";
$result = mysqli_query($conn, $query);

if(empty($result)) {
                $query = "CREATE TABLE IF NOT EXISTS pedido_detalle (
                          Id_pedido int,
                          Nombre VARCHAR (255),
                          Cant int,
                          detalles VARCHAR(30),
                          Precio int
                          )";
                $result = mysqli_query($conn, $query);
}


//TABLA menu: Id_orden, Nombre, Cant, Precio
?>