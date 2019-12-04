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

    if(isset($_POST['PedidoActual_ID'])){
    $pedidoACambiar_ID=$_POST["PedidoActual_ID"];
    }

    
    $sql = "DELETE FROM pedidos WHERE id_pedido = $pedidoACambiar_ID";

    if(mysqli_query($conn,"DELETE FROM pedidos WHERE id_pedido = $pedidoACambiar_ID")){
        echo "Borrado Exitoso de tabla de pedidos";
        if(mysqli_query($conn,"DELETE FROM pedido_detalle WHERE id_pedido = $pedidoACambiar_ID")){
            echo "<br>Borrado Exitoso de tabla de pedipedido_detalledo";
        }
        else{
            echo "Error: <br>" . mysqli_error($conn);
        }
    }
    else{
        echo "Error: <br>" . mysqli_error($conn);
    }
    

    var_dump($sql);
    exit();
?>
