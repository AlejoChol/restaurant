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

		$idInterno = sizeof($menu_items[$row['id_categoria']]);

		$menu_items[$row['id_categoria']][$idInterno]['id_item']	=$row['id_item'];
		$menu_items[$row['id_categoria']][$idInterno]['Nombre']		=$row['Nombre'];
		$menu_items[$row['id_categoria']][$idInterno]['Precio']		=$row['Precio'];
		$menu_items[$row['id_categoria']][$idInterno]['ImgPath']	=$row['ImgPath'];
	}

	//Consigue los items de todas las categorias
	/*
	$resultOpciones = mysqli_query($conn,'SELECT * FROM menu_opciones');
	
	while ($row = $resultOpciones->fetch_assoc()){
		$menu_opciones[$row['id_item']][] = $row['id_opcion'];

		$idInterno = sizeof($menu_opciones[$row['id_item']]);

		$menu_opciones[$row['id_item']][$idInterno]['Nombre']		=$row['Nombre'];
	}
	//Consigue los items de todas las categorias
	
	$resultOpcionesItem = mysqli_query($conn,'SELECT * FROM menu_opcionesItem');

	while ($row = $resultOpcionesItem->fetch_assoc()){
		$menu_opcionesItem[$row['id_opcion']][] = $row['id_opcionItem'];

		$idInterno = sizeof($menu_opcionesItem[$row['id_opcion']]);

		$menu_opcionesItem[$row['id_opcion']][$idInterno]['Nombre']		=$row['Nombre'];
	}
	*/

//Printea los items para MenuSection

	foreach($menu_items as $key => $categoria){
		foreach($categoria as $categoria_nombre => $item){
			$itemStr=$key."-".$categoria_nombre;
			$itemPath=$item['ImgPath'];
			$itemName=$item['Nombre'];
			echo "<div class=\"MenuSection_Item\" id=\"menu_$itemStr\"";
			echo "onclick=\"document.getElementById('item_$itemStr').style.display='block'\">";
			echo "<img src=\"$itemPath\" alt=\"b8nhip9w6oj01.jpg\" width=\"100%\" height=\"80%\" style='padding: 8px 4px'>";
			echo "<p>$itemName</p>";
			echo "</div>";
		}
	}
		
	

?>
