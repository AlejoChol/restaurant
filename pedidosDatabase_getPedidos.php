<?php
	
	session_start();
	//Chequea que el chef tenga la sesión iniciada
	if (!isset($_SESSION['loggedin'])) {
		header('Location: index.php');
		exit();
	}
	
	ini_set('display_startup_errors',true);
	error_reporting(E_ALL);
	ini_set('display_errors',true);
	//Conexion a base de datos
	$dbhost = 'localhost';
	$dbuser = 'poli_uno';
	$dbpass = 'poli1';
	$dbname = 'poli_dos';
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	
	/*$result2 = mysqli_query($conn,'SELECT * FROM pedido_detalle');

	//Array tridimensional, donde primer eje es el Id_pedido, el segundo es item y tercero es cada espicificacion del item
	
	$pedidoActual_Id_pedido=0;
	$numeroItem=0;
	while ($row = $result2->fetch_assoc()){ //Nombre, Cant, detalles, Precio
		if($pedidoActual_Id_pedido != $row['Id_pedido']){
			$pedidoActual_Id_pedido=$row['Id_pedido'];
			$numeroItem=0;
		}


		if(empty($row)){
			$pedidos_detalles[$pedidoActual_Id_pedido][$numeroItem]['Nombre']	= "Nada";
			$pedidos_detalles[$pedidoActual_Id_pedido][$numeroItem]['Cant']	= 0;
			$pedidos_detalles[$pedidoActual_Id_pedido][$numeroItem]['detalles']= 0;
			$pedidos_detalles[$pedidoActual_Id_pedido][$numeroItem]['Precio']	= 0;
		}


		$pedidos_detalles[$pedidoActual_Id_pedido][$numeroItem]['Nombre']	= $row['Nombre'];
		$pedidos_detalles[$pedidoActual_Id_pedido][$numeroItem]['Cant']	= $row['Cant'];
		$pedidos_detalles[$pedidoActual_Id_pedido][$numeroItem]['detalles']= $row['detalles'];
		$pedidos_detalles[$pedidoActual_Id_pedido][$numeroItem]['Precio']	= $row['Precio'];
		$numeroItem++;
	}*/
	
	$result = mysqli_query($conn,"SELECT * FROM pedidos");

	echo	"<table style=\"width:100%\" class=\"w3-striped\" id=\"pedidoList\">";
	
	while ($row = $result->fetch_assoc()){

		$pedidoActual_Id_pedido=$row['Id_pedido'];
		$pedidoActual_Id_mesa=$row['Id_mesa'];
		$pedidoActual_fecha=$row['fecha'];
		$pedidoActual_entregado=$row['entregado'];

		echo	"<tr id=\"pedido_$pedidoActual_Id_pedido\">";

		echo	"<td style=\"width:5%\" name=\"Id_pedido\">$pedidoActual_Id_pedido</td>";
		echo	"<td style=\"width:40%\" name=\"Id_mesa\">$pedidoActual_Id_mesa</td>";
		echo	"<td style=\"width:15%\" name=\"fecha\">$pedidoActual_fecha</td>";
		echo	"<td style=\"width:15%\"><button class=\"w3-btn w3-block w3-round w3-blue\" onclick=\"Pedido_VerDetalles($pedidoActual_Id_pedido);\">Ver Detalles</button>";
		if($pedidoActual_entregado=='Si'){
			echo	"<td style=\"width:5%\" name=\"entregado\"><button class=\"w3-btn w3-block w3-round w3-green\" onclick=\"Pedido_CambiarEstado($pedidoActual_Id_pedido,'$pedidoActual_entregado');\" >$pedidoActual_entregado</button></td>";
		}
		else{
			echo	"<td style=\"width:5%\" name=\"entregado\"><button class=\"w3-btn w3-block w3-round w3-yellow\" onclick=\"Pedido_CambiarEstado($pedidoActual_Id_pedido,'$pedidoActual_entregado');\" >$pedidoActual_entregado</button></td>";
		}
		echo	"<td style=\"width:10%\"><button class=\"w3-btn w3-block w3-round w3-red\" onclick=\"Pedido_BorrarPedido($pedidoActual_Id_pedido);\">Borrar Pedido</button>";
		echo	"</tr>";

		/*echo	"<div class= 'collapsible'><table style='width:90%'>"; 

		
		if (!(array_key_exists($ID_pedidoActual, $pedidos_detalles))) {		//Si el pedido no tiene items del carrito (se hizo un pedido vacio)
			echo	'<tr>';
			echo	'<td>' . "Vacio" . '</td>';
			echo	'</tr>';
		}

		else{
			for ($i = 0; $i < count($pedidos_detalles[$ID_pedidoActual]); $i++){
				echo	'<tr>';
				echo	'<td>' . $pedidos_detalles[$ID_pedidoActual][$i]['Nombre'] . '</td>';
				echo	'<td>' . $pedidos_detalles[$ID_pedidoActual][$i]['Cant'] . '</td>';
				echo	'<td>' . $pedidos_detalles[$ID_pedidoActual][$i]['detalles'] . '</td>';
				echo	'<td>' . $pedidos_detalles[$ID_pedidoActual][$i]['Precio'] . '</td>';
				echo	'</tr>';
			}
		}
		echo '</table></div>';*/
	}
	echo "</table>";
?>
