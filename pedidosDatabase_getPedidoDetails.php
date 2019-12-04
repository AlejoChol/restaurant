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

	$pedidoActual_Id_pedido=$_POST['Id_pedido'];
	
	$result2 = mysqli_query($conn,"SELECT * FROM pedido_detalle WHERE Id_pedido='$pedidoActual_Id_pedido'");

	//Array tridimensional, donde primer eje es el Id_pedido, el segundo es item y tercero es cada espicificacion del item
	
	$pedidoActual_Id_pedido=0;
	$numeroItem=0;
	while ($row = $result2->fetch_assoc()){ //Id_pedido, Nombre, Cant, detalles, Precio

		if(empty($row)){
			$pedidos_detalles[$numeroItem]['Nombre']	= "Nada";
			$pedidos_detalles[$numeroItem]['Cant']	= 0;
			$pedidos_detalles[$numeroItem]['detalles']= 0;
			$pedidos_detalles[$numeroItem]['Precio']	= 0;
		}


		$pedidos_detalles[$numeroItem]['Nombre']	= $row['Nombre'];
		$pedidos_detalles[$numeroItem]['Cant']	= $row['Cant'];
		$pedidos_detalles[$numeroItem]['detalles']= $row['detalles'];
		$pedidos_detalles[$numeroItem]['Precio']	= $row['Precio'];
		$numeroItem++;
	}
	
	$result = mysqli_query($conn,"SELECT * FROM pedidos");
	
	while ($row = $result->fetch_assoc()){

		$ID_pedidoActual=$row['Id_pedido'];


		echo	"<table style='width:100%' class='collapser'><tr>";
		echo	'<td>' . $row['Id_pedido']	 . '</td>';
		echo	'<td>' . $row['Id_mesa']	 . '</td>';
		echo	'<td>' . $row['fecha']		 . '</td>';
		echo	"<td><button onclick=\"CambiarEstado($ID_pedidoActual,'" .$row['entregado']. "');\" >" . $row['entregado']	 . '</button></td>';
		echo	"<td><button onclick=\"BorrarPedido($ID_pedidoActual);\">Borrar Pedido</button>";
		echo	'</tr></table>';

		echo	"<div class= 'collapsible'><table style='width:90%'>"; 

		
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
		echo '</table></div>';
	}
?>