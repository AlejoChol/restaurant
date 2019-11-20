<html>
<head>
  <link rel="stylesheet" href="format_index.css">
  <link rel="stylesheet" href="w3.css">
</head>
<body>
   <div class="Header"><h1>Restaurante "Polibar"</h1></div>
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

	//Consigue todos los pedidos No entregados
	$result = mysqli_query($conn,"SELECT * FROM pedidos WHERE entregado='No'");

	//Arma un array de todos los Id de pedidos no entregados, para pedir sus detalles respectivos
	while ($row = $result->fetch_assoc()){
		$Id_pedido_noEntregado[]=$row['Id_pedido'];
	}

	//Pide los detalles de cada pedido no entregado
	$result2 = mysqli_query($conn,'SELECT * FROM pedido_detalle WHERE Id_pedido IN (' . implode(',', array_map('intval', $Id_pedido_noEntregado)) . ')');

	//Array tridimensional, donde primer eje es el Id_pedido, el segundo es item y tercero es cada espicificacion del item
	$ID_pedidoActual=0;
	while ($row = $result2->fetch_assoc()){ //Nombre, Cant, Precio
		if($ID_pedidoActual != $row['Id_pedido']){
			$numeroItem=0;
		}
		$pedidos_detalles[$ID_pedidoActual][$numeroItem]['Nombre']	= $row['Nombre'];
		$pedidos_detalles[$ID_pedidoActual][$numeroItem]['Cant']	= $row['Cant'];
		$pedidos_detalles[$ID_pedidoActual][$numeroItem]['Precio']	= $row['Precio'];
		$numeroItem++;
	}
	$result = mysqli_query($conn,"SELECT * FROM pedidos WHERE entregado='No'");
	while ($row = $result->fetch_assoc()){
		echo "<table style='width:100%' class='interact'><tr>" .
			'<td>' . $row['Id_pedido']	 . '</td>' .
			'<td>' . $row['Id_mesa']	 . '</td>' .
			'<td>' . $row['fecha']		 . '</td>' .
			'<td>' . $row['entregado']	 . '</td>' .
			"<td>" . "<button class='collapsible'>Contenido del pedido</button>" .
		'</tr></table>';
		echo "<table class='collapsible'style='width:90%'>"; 
		for ($i = 0; $i < count($pedidos_detalles[$i]); $i++){
			echo '<tr>' .
				'<td>' . $pedidos_detalles[$row['Id_pedido']][$i]['Nombre'] . '</td>' .
				'<td>' . $pedidos_detalles[$row['Id_pedido']][$i]['Cant'] . '</td>' .
				'<td>' . $pedidos_detalles[$row['Id_pedido']][$i]['Precio'] . '</td>' .
			'</tr></table>';
		}
	}
?>

</body>
