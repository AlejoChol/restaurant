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

//TABLA menu_categorias: id_categoria, Nombre

$query = "SELECT id_categoria FROM menu_categorias";
$result = mysqli_query($conn, $query);

if(empty($result)) {
                $query = "CREATE TABLE IF NOT EXISTS menu_categorias (
                          id_categoria int AUTO_INCREMENT KEY,
                          Nombre VARCHAR (255)
                          )";
                $result = mysqli_query($conn, $query);
}

//TABLA menu_items: id_item, id_categoria, Nombre, Precio, ImgPath

$query = "SELECT id_item FROM menu_items";
$result = mysqli_query($conn, $query);

if(empty($result)) {
    
                echo "Error: <br>" . mysqli_error($conn);
                $query = "CREATE TABLE IF NOT EXISTS menu_items (
                          id_item int AUTO_INCREMENT KEY,
                          id_categoria int,
                          Nombre VARCHAR (40),
                          Precio int,
                          ImgPath VARCHAR (40)
                          )";
                $result = mysqli_query($conn, $query);
                echo "Error: <br>" . mysqli_error($conn);
}

//TABLA menu_opciones: id_opcion, id_item, Nombre

$query = "SELECT id_opcion FROM menu_opciones";
$result = mysqli_query($conn, $query);

if(empty($result)) {
                $query = "CREATE TABLE IF NOT EXISTS id_opcion (
                          id_opcion int AUTO_INCREMENT KEY,
                          id_item int,
                          Nombre VARCHAR (255)
                          )";
                $result = mysqli_query($conn, $query);
}

//TABLA menu_opcionesItem: id_opcionItem, id_opcion, Nombre

$query = "SELECT id_opcionItem FROM menu_opcionesItem";
$result = mysqli_query($conn, $query);

if(empty($result)) {
                $query = "CREATE TABLE IF NOT EXISTS id_opcionItem (
                          id_opcionItem int AUTO_INCREMENT KEY,
                          id_opcion int,
                          Nombre VARCHAR (255)
                          )";
                $result = mysqli_query($conn, $query);
}

?>