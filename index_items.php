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



//Consigue los items de todas las categorias
//TABLA menu_items: id_item, id_categoria, Nombre, Precio, ImgPath

$resultItems = mysqli_query($conn,"SELECT * FROM menu_items");

while ($row = $resultItems->fetch_assoc()){

	$menu_items[$row['id_item']]['Nombre']	=$row['Nombre'];
	$menu_items[$row['id_item']]['Precio']	=$row['Precio'];
	$menu_items[$row['id_item']]['ImgPath']	=$row['ImgPath'];
	$menu_items[$row['id_item']]['id_categoria']	=$row['id_categoria'];
}

//Consigue los items de todas las categorias
//TABLA menu_opciones: id_opcion, id_item, Nombre

$resultOpciones = mysqli_query($conn,'SELECT * FROM menu_opciones');

while ($row = $resultOpciones->fetch_assoc()){
	$menu_opciones[$row['id_item']][$row['id_opcion']]['Nombre'] = $row['Nombre'];
}
//Consigue los items de todas las categorias
//TABLA menu_opcionesItem: id_opcionItem, id_opcion, Nombre

$resultOpcionesItem = mysqli_query($conn,'SELECT * FROM menu_opcionesItem');

while ($row = $resultOpcionesItem->fetch_assoc()){
	$menu_opcionesItem[$row['id_opcion']][$row['id_opcionItem']]['Nombre'] = $row['Nombre'];
}

foreach($menu_items as $items_ID => $item){
	$item_FullID=$item['id_categoria']."-".$items_ID;
	$item_ImgPath=$item['ImgPath'];
	$item_Nombre=$item['Nombre'];
	$item_Precio=$item['Precio'];

	echo "<div id=\"item_$item_FullID\" class=\"w3-modal\"><div class=\"w3-modal-content w3-animate-zoom\"><div class=\"w3-container\">";

	echo "<span onclick=\"document.getElementById('item_$item_FullID').style.display='none'\" class=\"w3-button w3-display-topright\">&times;</span>";

	echo "<div class=\"MenuSection_Item\"><p><img src=\"$item_ImgPath\" alt=\"65711492-man-looks-at-burger-with-gun.jpg\" width=\"100%\" height=\"100%\"></p></div>";

	echo "<div class=\"simpleCart_shelfItem\"><h2 class=\"item_name\">$item_Nombre</h2>";

	echo "<p class=\"w3-text-black w3-half\">Precio: <span class=\"item_price\">$$item_Precio</span></p><br>";

	if(array_key_exists($items_ID,$menu_opciones)){
		foreach($menu_opciones[$items_ID] as $opcion_ID => $opcion){
			if(array_key_exists($opcion_ID,$menu_opcionesItem)){
				echo "<div class=\"w3-third\">";
				$opcion_Nombre=$opcion['Nombre'];
				$opcion_NombreWithoutSpaces=preg_replace('/\s+/', '-', $opcion_Nombre);
				echo "<label class=\"w3-text-black\">$opcion_Nombre</label>";
				echo "<select class=\"item_$opcion_NombreWithoutSpaces w3-select\">";
				foreach($menu_opcionesItem[$opcion_ID] as $opcion_ItemID => $opcionItem){
					$opcionItem_Nombre=$opcionItem['Nombre'];
					echo "<option value=\"$opcionItem_Nombre\"> $opcionItem_Nombre </option>";
				}
				echo "</select>";
				echo "</div>";
			}
		}
	}

	echo "<div class=\"w3-third\"><label class=\"w3-text-black\">Cantidad</label><input type=\"text\" value=\"1\" class=\"item_quantity w3-input\"></div>";

	echo "<input type=\"button\" class=\"item_add  w3-btn w3-block w3-green\" value=\" Agregar al Carro \" id = \" Add to Cart \" href=\"javascript:;\" ></input>";

	echo "</div></div></div></div>";
}
/*
	RESULTADO EJEMPLO
	<div id="1-1" class="w3-modal">
		<div class="w3-modal-content w3-animate-zoom">
			<div class="w3-container">
				<span onclick="document.getElementById('1-1').style.display='none'" class="w3-button w3-display-topright">&times;</span>
				<div class="MenuSection_Item">
					<p>
						<img src="Assets/Images/Entradas/EmpanadasArabes.jpg" alt="65711492-man-looks-at-burger-with-gun.jpg" width="100%" height="100%">
					</p>
				</div>      
				<div class="simpleCart_shelfItem">
					<h2 class="item_name">Empanadas</h2>
					<select class="item_Relleno">
						<option value="Jamon y Queso"> Jamon y Queso </option>
						<option value="Carne con Aceitunas"> Carne con Aceitunas </option>
					</select>
					<input type="text" value="1" class="item_quantity">
					<p>Precio: <span class="item_price">$25</span></p>
					<a class="item_add" href="javascript:;"> Agregar a la orden</a>
					<input type="button" class="item_add" value=" Add to Cart " id = " Add to Cart " href="javascript:;" ></input>
				</div>
			</div>
		</div>
	</div>
*/
	

?>
