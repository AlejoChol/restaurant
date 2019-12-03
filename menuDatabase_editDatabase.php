<?php
	ini_set('display_startup_errors',true);
	error_reporting(E_ALL);
	ini_set('display_errors',true);
	//Conexion a base de datos

	

	ini_set('display_errors', 1);
	error_reporting(E_ALL ^ E_NOTICE);

	$error=0;


	if($_POST['action']){
		$action=$_POST['action'];
		if($action == "categoria_editar"){
			$CategoriaID=$_POST['ID'];
			$CategoriaName=$_POST['Name'];
			categoria_editar($CategoriaID,$CategoriaName);
		}
		if($action == "item_editar"){
			$ItemID=$_POST['ID'];
			$ItemName=$_POST['Name'];
			$ItemPrecio=$_POST['Precio'];
			$ItemImgPath=$_POST['ImgPath'];
			item_editar($ItemID,$ItemName,$ItemPrecio,$ItemImgPath);
		}
		if($action == "opcion_editar"){
			$OpcionID=$_POST['ID'];
			$OpcionName=$_POST['Name'];
			opcion_editar($OpcionID,$OpcionName);
		}
		if($action == "opcionItem_editar"){
			$opcionItemID=$_POST['ID'];
			$opcionItemName=$_POST['Name'];
			opcionItem_editar($opcionItemID,$opcionItemName);
		}
		if($action == "categoria_agregar"){
			categoria_agregar();
		}
		if($action == "item_agregar"){
			$CategoriaID=$_POST['ID'];
			item_agregar($CategoriaID);
		}
		if($action == "opcion_agregar"){
			$itemID=$_POST['ID'];
			opcion_agregar($itemID);
		}
		if($action == "opcionItem_agregar"){
			$opcionID=$_POST['ID'];
			opcionItem_agregar($opcionID);
		}
		if($action == "categoria_borrar"){
			$CategoriaID=$_POST['ID'];
			categoria_borrar($CategoriaID);
		}
		if($action == "item_borrar"){
			$ItemID=$_POST['ID'];
			item_borrar($ItemID);
		}
		if($action == "opcion_borrar"){
			$OpcionID=$_POST['ID'];
			opcion_borrar($OpcionID,$OpcionName);
		}
		if($action == "opcionItem_borrar"){
			$opcionItemID=$_POST['ID'];
			opcionItem_borrar($opcionItemID);
		}
	}

	function categoria_editar($CategoriaID,$CategoriaName){
		$dbhost = 'localhost';
		$dbuser = 'poli_uno';
		$dbpass = 'poli1';
		$dbname = 'poli_dos';
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		
		if(mysqli_query($conn,"UPDATE menu_categorias SET Nombre = '$CategoriaName' WHERE id_categoria='$CategoriaID'")){
			echo "New record created successfully";
		} else {
			$error=1;
			echo "Error: <br>" . mysqli_error($conn);
		}
	}

	
	function item_editar($ItemID,$ItemName,$ItemPrecio,$ItemImgPath){
		$dbhost = 'localhost';
		$dbuser = 'poli_uno';
		$dbpass = 'poli1';
		$dbname = 'poli_dos';
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		
		if(mysqli_query($conn,"UPDATE menu_items SET Nombre = '$ItemName', Precio='$ItemPrecio', ImgPath='$ItemImgPath' WHERE id_item='$ItemID'")){
			echo "New record created successfully";
		} else {
			$error=1;
			echo "Error: <br>" . mysqli_error($conn);
		}
	}

	
	function opcion_editar($OpcionID,$OpcionName){
		$dbhost = 'localhost';
		$dbuser = 'poli_uno';
		$dbpass = 'poli1';
		$dbname = 'poli_dos';
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

		echo $OpcionName;
		
		if(mysqli_query($conn,"UPDATE menu_opciones SET Nombre = '$OpcionName' WHERE id_opcion='$OpcionID'")){
			echo "New record created successfully";
		} else {
			$error=1;
			echo "Error: <br>" . mysqli_error($conn);
		}
	}

	
	function opcionItem_editar($opcionItemID,$opcionItemName){
		$dbhost = 'localhost';
		$dbuser = 'poli_uno';
		$dbpass = 'poli1';
		$dbname = 'poli_dos';
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		
		if(mysqli_query($conn,"UPDATE menu_opcionesItem SET Nombre = '$opcionItemName' WHERE id_opcionItem='$opcionItemID'")){
			echo "New record created successfully";
		} else {
			$error=1;
			echo "Error: <br>" . mysqli_error($conn);
		}
	}

	function categoria_agregar(){
		$dbhost = 'localhost';
		$dbuser = 'poli_uno';
		$dbpass = 'poli1';
		$dbname = 'poli_dos';
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

		$categoriaName="Categoria Sin Nombre";

		if(mysqli_query($conn,"INSERT INTO menu_categorias (Nombre) VALUES('$categoriaNombre');")){
			$categoriaID=mysqli_insert_id($conn);

			echo	"<div class=\"MenuSection_Item\" style=\"width:97%; height:auto\">";
			echo	"<table style='width:100%' class=\"w3-table\"><tr class=\"w3-teal\" id=\"menu_$categoriaID\">";
			echo	"<td class=\"w3-text-white\" style=\"width: 10%;  vertical-align: text-bottom;\" name=\"ID\">$categoriaID</td>";
			echo	"<td class=\"w3-text-white\" style=\"width: 60%;  vertical-align: text-bottom;\" name=\"Name\">$categoriaNombre</td>";
			echo	"<td><button class=\"w3-btn w3-round w3-white\" style=\"line-height: 60%;\" onclick=\"Categoria_Editar('$categoriaID');\">Editar Categoria</button></td>";
			echo	"<td><button class=\"w3-btn w3-block w3-round w3-btn w3-padding-small w3-red\"style=\"line-height:70%;\"onclick=\"Categoria_Borrar('$categoriaID');\">&times;</button></td>";
			echo	"</tr></table>";
			echo	"<span class=\"w3-btn w3-block w3-round w3-btn w3-padding-small w3-green\" style=\"line-height: 80%;\" name='collapser'>&or;</span>";
			echo	"<div style=\"display:none\" >";
			echo	"<button class=\"w3-btn w3-block w3-round w3-btn w3-padding-small w3-orange\"style=\"height:auto;\"onclick=\"Elemento_Agregar('$categoriaID');\">+</button>";
			echo	"<table class=\"w3-table w3-striped\" id=\"menuItems_$categoriaID\">";
			echo	"</table>";
			echo	"</div>";
			echo	"</div>";

		} else {
			$error=1;
			echo "<script>";
			echo "alert(";
			echo "Error: <br>" . mysqli_error($conn);
			echo ");";
			echo "</script>";
		}
	}

	function item_agregar($categoriaID){
		$dbhost = 'localhost';
		$dbuser = 'poli_uno';
		$dbpass = 'poli1';
		$dbname = 'poli_dos';
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

		$itemNombre="Item Sin Nombre";
		$itemPrecio="0";
		$itemImgPath="Sin Imagen";

		if(mysqli_query($conn,"INSERT INTO menu_items (id_categoria, Nombre, Precio, ImgPath) VALUES('$categoriaID','$itemNombre',$itemPrecio,'$itemImgPath');")){
			$itemID=mysqli_insert_id($conn);

			echo 	"<tr id=\"item_$itemID\">";
			echo	"<td name=\"ID\" style=\"width:5%\">$itemID</td>";
			echo	"<td name=\"Name\" style=\"width:35%\">$itemNombre</td>";
			echo	"<td name=\"ImgPath\" style=\"width:55%\">$itemImgPath</td>";
			echo	"<td name=\"Precio\" style=\"width:5%\">$itemPrecio</td>";
			echo	"<td><button class=\"w3-btn w3-round w3-light-blue\" style=\"line-height: 60%;\" onclick=\"Item_Editar('$itemID');\">Editar Item</button></td>";
			echo	"<td><button class=\"w3-btn w3-block w3-round w3-btn w3-padding-small w3-red\"style=\"line-height:70%;\"onclick=\"Item_Borrar('$itemID');\">&times;</button></td>";
			echo 	"</tr>";

		} else {
			$error=1;
			echo "<script>";
			echo "alert(";
			echo "Error: <br>" . mysqli_error($conn);
			echo ");";
			echo "</script>";
		}
	}

	function opcion_agregar($itemID){
		$dbhost = 'localhost';
		$dbuser = 'poli_uno';
		$dbpass = 'poli1';
		$dbname = 'poli_dos';
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

		$opcionNombre="Opcion Sin Nombre";

		if(mysqli_query($conn,"INSERT INTO menu_opciones (id_item, Nombre) VALUES($itemID,'$opcionNombre');")){
			$opcionID=mysqli_insert_id($conn);

			echo "<table class=\"w3-table \" id=\"opcion_$opcionID\">";
			echo "<tr class=\"w3-green\">";
			echo "<td name=\"ID\"><input type=\"hidden\" name=\"ID\" value=\"$opcionID\">$opcionID</td>";
			echo "<td name=\"Name\"><input type=\"text\" name=\"Name\" value=\"$opcionNombre\"></input></td>";
			echo "<td><button class=\"w3-btn w3-block w3-round w3-btn w3-padding-small w3-light-blue\"style=\"line-height:70%;\"onclick=\"Opcion_Editar('opcion_$opcionID');\">Editar</button></td>";
			echo "<td><button class=\"w3-btn w3-block w3-round w3-btn w3-padding-small w3-red\"style=\"line-height:70%;\"onclick=\"Opcion_Borrar('$opcionID');\">&times;</button></td>";
			echo "</tr>";
			echo "</table>";
			echo "<button class=\"w3-btn w3-block w3-round w3-btn w3-padding-small w3-orange\"style=\"height:auto;\"onclick=\"OpcionItem_Agregar('$opcionID');\">Agregar Item</button>";
			echo "<table class=\"w3-table w3-striped\" id=\"OptionItemList_$opcionID\">";
			echo "</table>";

		} else {
			$error=1;
			echo "<script>";
			echo "alert(";
			echo "Error: <br>" . mysqli_error($conn);
			echo ");";
			echo "</script>";
		}
	}
	
	function opcionItem_agregar($opcionID){
		$dbhost = 'localhost';
		$dbuser = 'poli_uno';
		$dbpass = 'poli1';
		$dbname = 'poli_dos';
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

		$opcionItemNombre="Item Sin Nombre";

		if(mysqli_query($conn,"INSERT INTO menu_opcionesItem (id_opcion, Nombre) VALUES($opcionID,'$opcionItemNombre');")){
			$opcionItemID=mysqli_insert_id($conn);

			echo "<tr id=\"opcionItem_$opcionItemID\">";
			echo "<td name=\"ID\"><input type=\"hidden\" name=\"ID\" value=\"$opcionItemID\"></input>$opcionItemID</td>";
			echo "<td name=\"Name\"><input type=\"text\" name=\"Name\" value=\"$opcionItemNombre\"></input></td>";
			echo "<td><button class=\"w3-btn w3-block w3-round w3-btn w3-padding-small w3-light-blue\"style=\"line-height:70%;\"onclick=\"OpcionItem_Editar('opcionItem_$opcionItemID');\">Editar</button></td>";
			echo "<td><button class=\"w3-btn w3-block w3-round w3-btn w3-padding-small w3-red\"style=\"line-height:70%;\"onclick=\"OpcionItem_Borrar('$opcionItemID');\">&times;</button></td>";
			echo "</tr>";

		} else {
			$error=1;
			echo "<script>";
			echo "alert(";
			echo "Error: <br>" . mysqli_error($conn);
			echo ");";
			echo "</script>";
		}
	}
	
	function categoria_borrar($CategoriaID){
		$dbhost = 'localhost';
		$dbuser = 'poli_uno';
		$dbpass = 'poli1';
		$dbname = 'poli_dos';
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		
		if(mysqli_query($conn,"DELETE FROM menu_categorias WHERE id_categoria='$CategoriaID'")){
			echo "New record created successfully";
		} else {
			$error=1;
			echo "Error: <br>" . mysqli_error($conn);
		}
	}

	
	function item_borrar($ItemID){
		$dbhost = 'localhost';
		$dbuser = 'poli_uno';
		$dbpass = 'poli1';
		$dbname = 'poli_dos';
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		
		if(mysqli_query($conn,"DELETE FROM menu_items WHERE id_item='$ItemID'")){
			echo "New record created successfully";
		} else {
			$error=1;
			echo "Error: <br>" . mysqli_error($conn);
		}
	}

	function opcion_borrar($OpcionID){
		$dbhost = 'localhost';
		$dbuser = 'poli_uno';
		$dbpass = 'poli1';
		$dbname = 'poli_dos';
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

		echo $OpcionName;
		
		if(mysqli_query($conn,"DELETE FROM menu_opciones WHERE id_opcion='$OpcionID'")){
			echo "New record created successfully";
		} else {
			$error=1;
			echo "Error: <br>" . mysqli_error($conn);
		}
	}

	
	function opcionItem_borrar($opcionItemID){
		$dbhost = 'localhost';
		$dbuser = 'poli_uno';
		$dbpass = 'poli1';
		$dbname = 'poli_dos';
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		
		if(mysqli_query($conn,"DELETE FROM menu_opcionesItem WHERE id_opcionItem='$opcionItemID'")){
			echo "New record created successfully";
		} else {
			$error=1;
			echo "Error: <br>" . mysqli_error($conn);
		}
	}

?>
