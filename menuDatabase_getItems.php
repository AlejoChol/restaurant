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

//Consigue los items de todas las categorias
//TABLA menu_items: id_item, id_categoria, Nombre, Precio, ImgPath
	
$resultItems = mysqli_query($conn,"SELECT * FROM menu_items");

while ($row = $resultItems->fetch_assoc()){

	$menu_items[$row['id_categoria']][$row['id_item']]['Nombre']	=$row['Nombre'];
	$menu_items[$row['id_categoria']][$row['id_item']]['Precio']	=$row['Precio'];
	$menu_items[$row['id_categoria']][$row['id_item']]['ImgPath']	=$row['ImgPath'];
}

//Printea los botones
	echo	"<div class=\"MenuSection_Item\" style=\"width:100%; height:auto\"id=\"Categoria_Agregar\">";
	echo	"<button class=\"w3-btn w3-block w3-round w3-btn w3-padding-small w3-orange\" style=\"height:auto;\"onclick=\"Categoria_Agregar()\">Agregar Categoria</button>";
	echo	"<table style='width:100%' class=\"w3-table w3-striped\"><tr class=\"w3-white\">";
	echo	"<td class=\"w3-text-black\" style=\"width: 10%;  vertical-align: text-bottom;\" name=\"ID\">ID</td>";
	echo	"<td class=\"w3-text-black\" style=\"width: 60%;  vertical-align: text-bottom;\" name=\"Name\">Nombre de Categoria</td>";
	echo	"<td class=\"w3-block\"></td>";
	echo	"</tr></table>";
	echo	"</div>";
	echo	"<div class=\"MenuSection\" id=\"Lista_Categoria\" style=\"width:100%; height:auto\">";
	foreach($menu_categorias as $categoriaID => $categoria){
		$categoriaName=$categoria['Nombre'];
		echo	"<div class=\"MenuSection_Item\" style=\"width:97%; height:auto\" id=\"Categoria_$categoriaID\">";
		echo	"<table style='width:100%' class=\"w3-table\"><tr class=\"w3-teal\" >";
		echo	"<td class=\"w3-text-white\" style=\"width: 10%;  vertical-align: text-bottom;\" name=\"ID\">$categoriaID</td>";
		echo	"<td class=\"w3-text-white\" style=\"width: 60%;  vertical-align: text-bottom;\" name=\"Name\">$categoriaName</td>";
		echo	"<td><button class=\"w3-btn w3-round w3-white\" style=\"line-height: 60%;\" onclick=\"Categoria_Editar('$categoriaID');\">Editar Categoria</button></td>";
		echo	"<td><button class=\"w3-btn w3-block w3-round w3-btn w3-padding-small w3-red\"style=\"line-height:70%;\"onclick=\"Categoria_Borrar('$categoriaID');\">&times;</button></td>";
		echo	"</tr></table>";

		echo	"<span class=\"w3-btn w3-block w3-round w3-btn w3-padding-small w3-green\" style=\"line-height: 80%;\" name='collapser'>&or;</span>";
		echo	"<div style=\"display:none\" >";
		echo	"<button class=\"w3-btn w3-block w3-round w3-btn w3-padding-small w3-orange\"style=\"height:auto;\"onclick=\"Item_Agregar('$categoriaID');\">+</button>";
		echo	"<table class=\"w3-table w3-striped\" id=\"ItemList_$categoriaID\">";
		foreach($menu_items[$categoriaID] as $itemID => $item){
			$item_Nombre=$item['Nombre'];
			$item_Precio=$item['Precio'];
			$item_ImgPath=$item['ImgPath'];
			echo 	"<tr id=\"Item_$itemID\">";
			echo	"<td name=\"ID\" style=\"width:5%\">$itemID</td>";
			echo	"<td name=\"Name\" style=\"width:35%\">$item_Nombre</td>";
			echo	"<td name=\"ImgPath\" style=\"width:55%\">$item_ImgPath</td>";
			echo	"<td name=\"Precio\" style=\"width:5%\">$item_Precio</td>";
			echo	"<td><button class=\"w3-btn w3-round w3-light-blue\" style=\"line-height: 60%;\" onclick=\"Item_Editar('$itemID');\">Editar Item</button></td>";
			echo	"<td><button class=\"w3-btn w3-block w3-round w3-btn w3-padding-small w3-red\"style=\"line-height:70%;\"onclick=\"Item_Borrar('$itemID');\">&times;</button></td>";
		}
		echo	"</table>";
		echo	"</div>";

		echo	"</div>";
	}
	echo	"</div>";
		
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
