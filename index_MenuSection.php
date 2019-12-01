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

	//Consigue los items de todas las categorias

//Printea los items para MenuSection

	foreach($menu_items as $categoriaID => $categoria){
		foreach($categoria as $itemID => $item){
			$itemStr=$categoriaID."-".$itemID;
			$itemPath=$item['ImgPath'];
			$itemName=$item['Nombre'];
			echo "<div class=\"MenuSection_Item\" id=\"menu_$itemStr\" name=\"$categoriaID\" style=\"display:none\"";
			echo "onclick=\"document.getElementById('item_$itemStr').style.display='block'\">";
			echo "<img src=\"$itemPath\" alt=\"b8nhip9w6oj01.jpg\" width=\"100%\" height=\"80%\" style='padding: 8px 4px'>";
			echo "<p>$itemName</p>";
			echo "</div>";
		}
	}
		
	

?>
