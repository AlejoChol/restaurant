<?php
	ini_set('display_startup_errors',true);
	error_reporting(E_ALL);
	ini_set('display_errors',true);
	//Conexion a base de datos

	

	ini_set('display_errors', 1);
	error_reporting(E_ALL ^ E_NOTICE);

	
	if($_POST['ID']){
		$itemID=$_POST['ID'];
		item_editar($itemID);
	}
	

	//Consigue los items de todas las categorias
	//TABLA menu_items: id_item, id_categoria, Nombre, Precio, ImgPath

function item_editar($itemID){
	$dbhost = 'localhost';
	$dbuser = 'poli_uno';
	$dbpass = 'poli1';
	$dbname = 'poli_dos';
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

	$resultItems = mysqli_query($conn,"SELECT * FROM menu_items WHERE id_item='$itemID'");

	while ($row = $resultItems->fetch_assoc()){
		$item['Nombre']	=$row['Nombre'];
		$item['Precio']	=$row['Precio'];
		$item['ImgPath']	=$row['ImgPath'];
		$item['id_categoria']	=$row['id_categoria'];
	}

	//Consigue los items de todas las categorias
	//TABLA menu_opciones: id_opcion, id_item, Nombre

	$isOptionsEmpty=1;
	$resultOpciones = mysqli_query($conn,"SELECT * FROM menu_opciones WHERE id_item='$itemID'");
	if($resultOpciones->num_rows > 0){
		$isOptionsEmpty=0;
		while ($row = $resultOpciones->fetch_assoc()){
			$menu_opciones[$row['id_opcion']]['Nombre'] = $row['Nombre'];
			$lista_opciones[] = $row['id_opcion'];
		}
		$opciones = join("','",$lista_opciones);
		$resultOpcionesItem = mysqli_query($conn,"SELECT * FROM menu_opcionesItem WHERE id_opcion IN ('$opciones')");

		while ($row = $resultOpcionesItem->fetch_assoc()){
				$menu_opcionesItem[$row['id_opcion']][$row['id_opcionItem']]['Nombre'] = $row['Nombre'];
		}
	}
	
	echo "<button class=\"w3-btn w3-block w3-round w3-btn w3-padding-small w3-orange\"style=\"height:auto;\"onclick=\"Opcion_Agregar('$itemID');\">Agregar Opcion</button>";
	echo "<div id=\"OptionList_$itemID\" style=\"margin-left: 1%; margin-top: 1%; overflow-y: scroll;\">";
	if(!$isOptionsEmpty){
		foreach($menu_opciones as $opcionID => $opcionData){
			$opcionNombre=$menu_opciones[$opcionID]['Nombre'];
			echo "<div style=\"margin-left: 1%; margin-top: 1%;\" id=\"opcion_$opcionID\" >";
			echo "<table class=\"w3-table \">";
			echo "<tr class=\"w3-green\">";
			echo "<td name=\"ID\"><input type=\"hidden\" name=\"ID\" value=\"$opcionID\">$opcionID</td>";
			echo "<td name=\"Name\"><input type=\"text\" name=\"Name\" value=\"$opcionNombre\"></input></td>";
			echo "<td><button class=\"w3-btn w3-block w3-round w3-btn w3-padding-small w3-light-blue\"style=\"line-height:70%;\"onclick=\"Opcion_Editar('opcion_$opcionID');\">Editar</button></td>";
			echo "<td><button class=\"w3-btn w3-block w3-round w3-btn w3-padding-small w3-red\"style=\"line-height:70%;\"onclick=\"Opcion_Borrar('$opcionID');\">&times;</button></td>";
			echo "</tr>";
			echo "</table>";
			echo "<button class=\"w3-btn w3-block w3-round w3-btn w3-padding-small w3-orange\"style=\"height:auto;\"onclick=\"OpcionItem_Agregar('$opcionID');\">Agregar Item</button>";
			echo "<table class=\"w3-table w3-striped\" id=\"OptionItemList_$opcionID\">";
			if(array_key_exists($opcionID,$menu_opcionesItem)){
				foreach($menu_opcionesItem[$opcionID] as $opcionItemID => $opcionItemData){
					$opcionItemNombre=$opcionItemData['Nombre'];
					echo "<tr id=\"opcionItem_$opcionItemID\">";
					echo "<td name=\"ID\"><input type=\"hidden\" name=\"ID\" value=\"$opcionItemID\"></input>$opcionItemID</td>";
					echo "<td name=\"Name\"><input type=\"text\" name=\"Name\" value=\"$opcionItemNombre\"></input></td>";
					echo "<td><button class=\"w3-btn w3-block w3-round w3-btn w3-padding-small w3-light-blue\"style=\"line-height:70%;\"onclick=\"OpcionItem_Editar('opcionItem_$opcionItemID');\">Editar</button></td>";
					echo "<td><button class=\"w3-btn w3-block w3-round w3-btn w3-padding-small w3-red\"style=\"line-height:70%;\"onclick=\"OpcionItem_Borrar('$opcionItemID');\">&times;</button></td>";
					echo "</tr>";
				}
			}
			echo "</table>";
			echo "</div>";
		}
	}
	echo "</div>";

	/*
	<div class="w3-modal" style="display: block;" id="currentForm">
		<div class="w3-modal-content w3-animate-zoom" style="height: auto;">
			<div class="w3-container">
				<span class="w3-button w3-display-topright">×</span>
				<form action="javascript:;">
				</form>
	<input type="hidden" name="action" value="categoria_editar">
	<input type="hidden" name="ID" value="1">
	<input type="text" name="name">
	<input type="submit" name="submit" value="Subir">
	</div>
	</div>
	</div>
	
	

	*/
}

?>
