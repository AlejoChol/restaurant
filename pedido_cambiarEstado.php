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
    $PedidoActual_ID=$_POST["PedidoActual_ID"];
    }
    if(isset($_POST['PedidoNuevo_Estado'])){
    $PedidoNuevo_Estado=$_POST["PedidoNuevo_Estado"];
    }


    if($PedidoNuevo_Estado=='No'){
        $strToOutput="<button class=\"w3-btn w3-block w3-round w3-yellow\" onclick=\"Pedido_CambiarEstado($PedidoActual_ID,'$PedidoNuevo_Estado');\" >$PedidoNuevo_Estado</button>";
    }
    else if($PedidoNuevo_Estado=='Si'){
        $strToOutput="<button class=\"w3-btn w3-block w3-round w3-green\" onclick=\"Pedido_CambiarEstado($PedidoActual_ID,'$PedidoNuevo_Estado');\" >$PedidoNuevo_Estado</button>";
    }

    if(!mysqli_query($conn,"UPDATE pedidos SET entregado = '$PedidoNuevo_Estado' WHERE id_pedido = $PedidoActual_ID")){
        echo $strToOutput;
    }
    else{
        echo "<script>";
        echo "alert(";
        echo "Error: <br>" . mysqli_error($conn);
        echo ");";
        echo "</script>";
    }
    
    exit();
?>
