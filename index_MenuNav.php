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
		echo "<div class=\"MenuNav_Item\" id=\"nav_$categoriaID\" style=\"z-index: $categoriaID\">";
		echo "<input type=\"button\" class=\"w3-btn w3-teal\" style=\"width:100%;\"value=\"$categoriaName\" id = \"$categoriaID\"onclick=\"menuNav(this.id)\"></div>";
	}
		
	

?>
