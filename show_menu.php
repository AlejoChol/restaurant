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

	//Consigue todas las categorias
	$resultCategorias = mysqli_query($conn,"SELECT * FROM menu_categorias");

	while ($row = $resultCategorias->fetch_assoc()){
		$menu_categorias[$row['id_categoria']]['Nombre']=$row['Nombre'];
	}

	//Consigue los items de todas las categorias
	
	$resultItems = mysqli_query($conn,"SELECT * FROM menu_items");

	while ($row = $resultItems->fetch_assoc()){
		$menu_items[$row['id_categoria']][] = $row['id_item'];

		$idInterno = sizeof($menu_items[$row['id_categoria']]);

		$menu_items[$row['id_categoria']][$idInterno]['Nombre']		=$row['Nombre'];
		$menu_items[$row['id_categoria']][$idInterno]['Precio']		=$row['Precio'];
		$menu_items[$row['id_categoria']][$idInterno]['ImgPath']	=$row['ImgPath'];
	}
	var_dump($menu_items);

	//Consigue los items de todas las categorias
	
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

	foreach($menu_items as $categoria){
		foreach($categoria as $item){
			$itemStr=$categoria."-".$item;
			$itemPath=$menu_items[$categoria][$item]['ImgPath'];
			$itemName=$menu_items[$categoria][$item]['Nombre'];
			echo "<div class=\"MenuSection_Item\" name=\"$categoria\"";
			echo "onclick=\"document.getElementById('$itemStr').style.display='block'\">";
			echo "<img src=\"$itemPath\" alt=\"b8nhip9w6oj01.jpg\" width=\"100%\" height=\"80%\" style='padding: 8px 4px'>";
			echo "<p>$itemName</p>";

		}
	}
		
	

?>
