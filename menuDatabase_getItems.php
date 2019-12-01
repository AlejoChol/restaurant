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

	

	ini_set('display_errors', 1);
	error_reporting(E_ALL ^ E_NOTICE);



//Consigue todas las categorias
//TABLA menu_categorias: id_categoria, Nombre
	$resultCategorias = mysqli_query($conn,"SELECT * FROM menu_categorias");

	while ($row = $resultCategorias->fetch_assoc()){
		$menu_categorias[$row['id_categoria']]['Nombre']=$row['Nombre'];
	}

//Printea los botones
	foreach($menu_categorias as $categoriaID => $categoria){
		$categoriaName=$categoria['Nombre'];
		echo	"<div class=\"MenuSection_Item\" style=\"width:100%; height:auto\"id=\"menu_$categoriaID\">";
		echo	"<table style='width:100%' class='collapser'><tr>";
		echo	"<td class=\"Table_ID\">$categoriaID</td>";
		echo	"<td class=\"Table_Name\">$categoriaName</td>";
		echo	"<td><button onclick=\"Categoria_Editar('$categoriaID');\">Editar Categoria</button></td>";
		echo	"</tr></table>";
		echo	"</div>";
	}
		
	/*
	
		echo	"<table style='width:100%' class='collapser'><tr>";
		echo	'<td>' . $row['Id_pedido']	 . '</td>';
		echo	'<td>' . $row['Id_mesa']	 . '</td>';
		echo	'<td>' . $row['fecha']		 . '</td>';
		echo	"<td><button onclick=\"CambiarEstado($ID_pedidoActual,'" .$row['entregado']. "');\" >" . $row['entregado']	 . '</button></td>';
		echo	"<td><button onclick=\"BorrarPedido($ID_pedidoActual);\">Borrar Pedido</button>";
		echo	'</tr></table>';

	*/

?>
