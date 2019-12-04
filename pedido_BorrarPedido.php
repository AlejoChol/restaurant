<?php
	ini_set('display_startup_errors',true);
	error_reporting(E_ALL);
	ini_set('display_errors',true);
	//Conexion a base de datos
	$dbhost = 'localhost';
	$dbuser = 'poli_uno';
	$dbpass = 'poli1';
	$dbname = 'poli_dos';
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if(isset($_GET['PedidoActual_ID'])){
    $pedidoACambiar_ID=$_GET["PedidoActual_ID"];
    }

    
    $sql = "DELETE FROM pedidos WHERE id_pedido = $pedidoACambiar_ID";

    if(!mysqli_query($conn,"DELETE FROM pedidos WHERE id_pedido = $pedidoACambiar_ID")){
        echo "Error: <br>" . mysqli_error($conn);
    }
    
    if(!mysqli_query($conn,"DELETE FROM pedido_detalle WHERE id_pedido = $pedidoACambiar_ID")){
        echo "Error: <br>" . mysqli_error($conn);
    }

    echo "Hola";
    var_dump($sql);
    exit();
?>
