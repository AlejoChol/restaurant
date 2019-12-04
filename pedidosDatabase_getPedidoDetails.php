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

	$pedidoActual_Id_pedido=$_POST['PedidoActual_ID'];
	
	$result2 = mysqli_query($conn,"SELECT * FROM pedido_detalle WHERE Id_pedido='$pedidoActual_Id_pedido'");

	//Array tridimensional, donde primer eje es el Id_pedido, el segundo es item y tercero es cada espicificacion del item
	
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
	
	$result = mysqli_query($conn,"SELECT * FROM pedidos WHERE Id_pedido='$pedidoActual_Id_pedido'");

	echo	"<table style=\"width:100%\" class=\"w3-table w3-striped\" id=\"pedido\">";
	$row = $result->fetch_assoc();
	$pedidoActual_Id_mesa=$row['Id_mesa'];
	$pedidoActual_fecha=$row['fecha'];
	$pedidoActual_entregado=$row['entregado'];
	echo	"<tr id=\"pedido_$pedidoActual_Id_pedido\" class=\"w3-teal\">";
	echo	"<td style=\"width:10%\" name=\"Id_pedido\">$pedidoActual_Id_pedido</td>";
	echo	"<td style=\"width:60%\" name=\"Id_mesa\">$pedidoActual_Id_mesa</td>";
	echo	"<td style=\"width:30%\" name=\"fecha\">$pedidoActual_fecha</td>";
	echo	"</tr>";
	echo	"</table>";

	echo	"<table style=\"width:100%\" class=\"w3-table w3-striped\" id=\"pedidoDetalleList\">";
	if (!(isset($pedidos_detalles))) {		//Si el pedido no tiene items del carrito (se hizo un pedido vacio)
		echo	"<tr>";
		echo	"<td>Vacio</td>";
		echo	"</tr>";
	}
	else{
		for ($i = 0; $i < count($pedidos_detalles); $i++){
			echo	"<tr>";
			echo	"<td style=\"width:30%\">" . $pedidos_detalles[$i]['Nombre'] . "</td>";
			echo	"<td style=\"width:10%\">" . $pedidos_detalles[$i]['Cant'] . "</td>";
			echo	"<td style=\"width:50%\">" . $pedidos_detalles[$i]['detalles'] . "</td>";
			echo	"<td style=\"width:10%\">" . $pedidos_detalles[$i]['Precio'] . "</td>";
			echo	"</tr>";
		}
	}
	echo '</table></div>';
?>
