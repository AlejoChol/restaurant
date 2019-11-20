<!DOCTYPE html>
<html lang="es">
	<script type="text/javascript" src="simpleCart.js"></script>
	<script type="text/javascript" src="jquery.js"></script>
	  <script>											//NECESITA TRABAJO
		var menuNav_LastSelected = 'Entradas';
		function menuNav(menuNav_Selected){
			var x = document.getElementsByName(menuNav_LastSelected);
			var i;
			for (i = 0; i < x.length; i++) {
				x[i].style.display = 'none';
			}
			x = document.getElementsByName(menuNav_Selected);
			var i;
			for (i = 0; i < x.length; i++) {
				x[i].style.display = 'block';
			}
			menuNav_LastSelected = menuNav_Selected;
		}
	  </script>
<header>
</header>
<head>
  <link rel="stylesheet" href="format_index.css">
  <link rel="stylesheet" href="w3.css">

	<div id="Entradas-01" class="w3-modal">
		<div class="w3-modal-content w3-animate-zoom">
			<div class="w3-container">
				<span onclick="document.getElementById('Entradas-01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
				<div class="MenuSection_Item">
					<p>
						<img src="Assets/Images/Entradas/EmpanadasArabes.jpg" alt="65711492-man-looks-at-burger-with-gun.jpg" width="100%" height="100%">
					</p>
				</div>      
				<div class="simpleCart_shelfItem">
					<h2 class="item_name">Empanadas</h2>
					<select class="item_size">
						<option value="jamon&Quesp"> Jamon y Queso </option>
						<option value="carne"> Carne con Aceitunas </option>
						<option value="carneDulce"> Carne Dulce </option>
						<option value="arabe"> Empanada Arabe </option>
					</select>
					<input type="text" value="1" class="item_quantity">
					<p>Precio: <span class="item_price">$25</span></p>
					<a class="item_add" href="javascript:;"> Agregar a la orden</a>
					<input type="button" class="item_add" value=" Add to Cart " id = " Add to Cart " href="javascript:;" ></input>
				</div>
			</div>
		</div>
	</div>
	<div id="Entradas-02" class="w3-modal">
		<div class="w3-modal-content w3-animate-zoom">
			<div class="w3-container">
				<span onclick="document.getElementById('Entradas-02').style.display='none'" class="w3-button w3-display-topright">&times;</span>
				<div class="MenuSection_Item">
					<p>
						<img src="Assets/Images/Entradas/Empanadas.jpg" alt="65711492-man-looks-at-burger-with-gun.jpg" width="100%" height="100%">
					</p>
				</div>      
				<div class="simpleCart_shelfItem">
					<h2 class="item_name">Empanadas Vegetarianas</h2>
					<select class="item_size">
						<option value="humita"> Humita </option>
						<option value="cebolla&Queso"> Carne con Aceitunas </option>
						<option value="roquefort"> Roquefort </option>
						<option value="margarita"> Margarita </option>
					</select>
					<input type="text" value="1" class="item_quantity">
					<p>Precio: <span class="item_price">$50</span></p>
					<a class="item_add" href="javascript:;"> Agregar a la orden</a>
					<input type="button" class="item_add" value=" Add to Cart " id = " Add to Cart " href="javascript:;" ></input>
				</div>
			</div>
		</div>
	</div>
	<div id="Entradas-03" class="w3-modal">
		<div class="w3-modal-content w3-animate-zoom">
			<div class="w3-container">
				<span onclick="document.getElementById('Entradas-03').style.display='none'" class="w3-button w3-display-topright">&times;</span>
				<div class="MenuSection_Item">
					<p>
						<img src="Assets/Images/Entradas/Picada.jpg" alt="65711492-man-looks-at-burger-with-gun.jpg" width="100%" height="100%">
					</p>
				</div>      
				<div class="simpleCart_shelfItem">
					<h2 class="item_name">Picada</h2>
					<select class="item_size">
						<option value="criolla"> Picada Criolla </option>
						<option value="frutosDeMar"> Picada de Frutos de Mar</option>
						<option value="vegetariana"> Picada Vegetariana</option>
					</select>
					<input type="text" value="1" class="item_quantity">
					<p>Precio: <span class="item_price">$420</span></p>
					<a class="item_add" href="javascript:;"> Agregar a la orden</a>
					<input type="button" class="item_add" value=" Add to Cart " id = " Add to Cart " href="javascript:;" ></input>
				</div>
			</div>
		</div>
	</div>
	<div id="Entradas-04" class="w3-modal">
		<div class="w3-modal-content w3-animate-zoom">
			<div class="w3-container">
				<span onclick="document.getElementById('Entradas-04').style.display='none'" class="w3-button w3-display-topright">&times;</span>
				<div class="MenuSection_Item">
					<p>
						<img src="Assets/Images/Entradas/Rabas.jpg" alt="65711492-man-looks-at-burger-with-gun.jpg" width="100%" height="100%">
					</p>
				</div>      
				<div class="simpleCart_shelfItem">
					<h2 class="item_name">Rabas</h2>
					<select class="item_size">
						<option value="provenzal"> Con Provenzal </option>
						<option value="salsaPicante"> Con salsa Picante </option>
						<option value="cheddar"> Con Queso Cheddar </option>
					</select>
					<input type="text" value="1" class="item_quantity">
					<p>Precio: <span class="item_price">$220</span></p>
					<a class="item_add" href="javascript:;"> Agregar a la orden</a>
					<input type="button" class="item_add" value=" Add to Cart " id = " Add to Cart " href="javascript:;" ></input>
				</div>
			</div>
		</div>
	</div>

	<div id="Pastas-01" class="w3-modal">
		<div class="w3-modal-content w3-animate-zoom">
			<div class="w3-container">
				<span onclick="document.getElementById('Pastas-01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
				<div class="MenuSection_Item">
					<p>
						<img src="Assets/Images/Pastas/Farfalle.jpg" alt="65711492-man-looks-at-burger-with-gun.jpg" width="100%" height="100%">
					</p>
				</div>      
				<div class="simpleCart_shelfItem">
					<h2 class="item_name">Farfalle</h2>
					<select class="item_size">
						<option value="pomarolla"> Con salsa Pomarolla </option>
						<option value="crema"> Con Crema </option>
						<option value="tuco"> Con salsa Tuco </option>
						<option value="filetto"> Con salsa Filetto </option>
					</select>
					<input type="text" value="1" class="item_quantity">
					<p>Precio: <span class="item_price">$230</span></p>
					<a class="item_add" href="javascript:;"> Agregar a la orden</a>
					<input type="button" class="item_add" value=" Add to Cart " id = " Add to Cart " href="javascript:;" ></input>
				</div>
			</div>
		</div>
	</div>
	<div id="Pastas-02" class="w3-modal">
		<div class="w3-modal-content w3-animate-zoom">
			<div class="w3-container">
				<span onclick="document.getElementById('Pastas-02').style.display='none'" class="w3-button w3-display-topright">&times;</span>
				<div class="MenuSection_Item">
					<p>
						<img src="Assets/Images/Pastas/Pasta bolognesa.jpg" alt="65711492-man-looks-at-burger-with-gun.jpg" width="100%" height="100%">
					</p>
				</div>      
				<div class="simpleCart_shelfItem">
					<h2 class="item_name">Pasta bolognesa</h2>
					<select class="item_size">
						<option value="pomarolla"> Con salsa Pomarolla </option>
						<option value="crema"> Con Crema </option>
						<option value="tuco"> Con salsa Tuco </option>
						<option value="filetto"> Con salsa Filetto </option>
					</select>
					<input type="text" value="1" class="item_quantity">
					<p>Precio: <span class="item_price">$250</span></p>
					<a class="item_add" href="javascript:;"> Agregar a la orden</a>
					<input type="button" class="item_add" value=" Add to Cart " id = " Add to Cart " href="javascript:;" ></input>
				</div>
			</div>
		</div>
	</div>
	<div id="Pastas-03" class="w3-modal">
		<div class="w3-modal-content w3-animate-zoom">
			<div class="w3-container">
				<span onclick="document.getElementById('Pastas-03').style.display='none'" class="w3-button w3-display-topright">&times;</span>
				<div class="MenuSection_Item">
					<p>
						<img src="Assets/Images/Pastas/Penne.jpg" alt="65711492-man-looks-at-burger-with-gun.jpg" width="100%" height="100%">
					</p>
				</div>      
				<div class="simpleCart_shelfItem">
					<h2 class="item_name">Penne</h2>
					<select class="item_size">
						<option value="pomarolla"> Con salsa Pomarolla </option>
						<option value="crema"> Con Crema </option>
						<option value="tuco"> Con salsa Tuco </option>
						<option value="filetto"> Con salsa Filetto </option>
					</select>
					<input type="text" value="1" class="item_quantity">
					<p>Precio: <span class="item_price">$180</span></p>
					<a class="item_add" href="javascript:;"> Agregar a la orden</a>
					<input type="button" class="item_add" value=" Add to Cart " id = " Add to Cart " href="javascript:;" ></input>
				</div>
			</div>
		</div>
	</div>
	<div id="Pastas-04" class="w3-modal">
		<div class="w3-modal-content w3-animate-zoom">
			<div class="w3-container">
				<span onclick="document.getElementById('Pastas-04').style.display='none'" class="w3-button w3-display-topright">&times;</span>
				<div class="MenuSection_Item">
					<p>
						<img src="Assets/Images/Pastas/Strozzapreti.jpg" alt="65711492-man-looks-at-burger-with-gun.jpg" width="100%" height="100%">
					</p>
				</div>      
				<div class="simpleCart_shelfItem">
					<h2 class="item_name">Strozzapreti</h2>
					<select class="item_size">
						<option value="pomarolla"> Con salsa Pomarolla </option>
						<option value="crema"> Con Crema </option>
						<option value="tuco"> Con salsa Tuco </option>
						<option value="filetto"> Con salsa Filetto </option>
					</select>
					<input type="text" value="1" class="item_quantity">
					<p>Precio: <span class="item_price">$250</span></p>
					<a class="item_add" href="javascript:;"> Agregar a la orden</a>
					<input type="button" class="item_add" value=" Add to Cart " id = " Add to Cart " href="javascript:;" ></input>
				</div>
			</div>
		</div>
	</div>
	
	<div id="Bebidas-01" class="w3-modal">
		<div class="w3-modal-content w3-animate-zoom">
			<div class="w3-container">
				<span onclick="document.getElementById('Bebidas-01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
				<div class="MenuSection_Item">
					<p>
						<img src="Assets/Images/Bebidas/7up.jpg" alt="65711492-man-looks-at-burger-with-gun.jpg" width="100%" height="100%">
					</p>
				</div>      
				<div class="simpleCart_shelfItem">
					<h2 class="item_name">Gaseosa</h2>
					<select class="item_size">
						<option value="pomarolla"> Pomelo </option>
						<option value="crema"> Fanta </option>
						<option value="tuco"> Coca Cola </option>
						<option value="filetto"> 7up </option>
					</select>
					<input type="text" value="1" class="item_quantity">
					<p>Precio: <span class="item_price">$120</span></p>
					<a class="item_add" href="javascript:;"> Agregar a la orden</a>
					<input type="button" class="item_add" value=" Add to Cart " id = " Add to Cart " href="javascript:;" ></input>
				</div>
			</div>
		</div>
	</div>
	<div id="Bebidas-02" class="w3-modal">
		<div class="w3-modal-content w3-animate-zoom">
			<div class="w3-container">
				<span onclick="document.getElementById('Bebidas-02').style.display='none'" class="w3-button w3-display-topright">&times;</span>
				<div class="MenuSection_Item">
					<p>
						<img src="Assets/Images/Bebidas/AguaEmbotellada.jpg" alt="65711492-man-looks-at-burger-with-gun.jpg" width="100%" height="100%">
					</p>
				</div>      
				<div class="simpleCart_shelfItem">
					<h2 class="item_name">Agua</h2>
					<select class="item_size">
						<option value="pomarolla"> Agua de la canilla </option>
					</select>
					<input type="text" value="1" class="item_quantity">
					<p>Precio: <span class="item_price">$80</span></p>
					<a class="item_add" href="javascript:;"> Agregar a la orden</a>
					<input type="button" class="item_add" value=" Add to Cart " id = " Add to Cart " href="javascript:;" ></input>
				</div>
			</div>
		</div>
	</div>
	<div id="Bebidas-03" class="w3-modal">
		<div class="w3-modal-content w3-animate-zoom">
			<div class="w3-container">
				<span onclick="document.getElementById('Bebidas-03').style.display='none'" class="w3-button w3-display-topright">&times;</span>
				<div class="MenuSection_Item">
					<p>
						<img src="Assets/Images/Bebidas/Pinta de Cerveza.jpg" alt="65711492-man-looks-at-burger-with-gun.jpg" width="100%" height="100%">
					</p>
				</div>      
				<div class="simpleCart_shelfItem">
					<h2 class="item_name">Pinta de Cerveza</h2>
					<select class="item_size">
						<option value="pomarolla"> Heineken </option>
						<option value="pomarolla"> Imperial </option>
						<option value="pomarolla"> Schneider </option>
						<option value="pomarolla"> Corona </option>
						<option value="pomarolla"> Santa Fe </option>
					</select>
					<input type="text" value="1" class="item_quantity">
					<p>Precio: <span class="item_price">$180</span></p>
					<a class="item_add" href="javascript:;"> Agregar a la orden</a>
					<input type="button" class="item_add" value=" Add to Cart " id = " Add to Cart " href="javascript:;" ></input>
				</div>
			</div>
		</div>
	</div>


</head>
<body>

<?
	
	if (!empty($_GET["redirect"])){
		echo "
			<div id=\"MensajeRedirigido\" class=\"w3-modal\" style=\"display:block\">
				<div class=\"w3-modal-content w3-animate-zoom\">
					<div class=\"w3-container\">
						<span onclick=\"document.getElementById('MensajeRedirigido').style.display='none'\" class=\"w3-button w3-display-topright\">&times;</span>
						
						<p>
								<h2>Gracias por ordenar!</h2>
						</p>
						
					</div>
				</div>
			</div>
		";
	}
?>
  <div class="Header"><h1>Restaurante "Polibar"</h1></div>
  <div class="MenuNav">
  <div class="MenuNav_Item",style='z-index: 1'>
    <input type="button" class="MenuNav_Item" value="Entradas" id = "navButton" onclick="menuNav(this.value)"></div>
  <div class="MenuNav_Item",style='z-index: 2'>
    <input type="button" class="MenuNav_Item"value="Pastas" id = "navButton" onclick="menuNav(this.value)"></div>
  <div class="MenuNav_Item",style='z-index: 3'>
    <input type="button" class="MenuNav_Item"value="Bebidas" id = "navButton" onclick="menuNav(this.value)"></div>
  </div>

  <div class="MenuSection">
  	  <div class="MenuSection_Item" name="Entradas" onclick="document.getElementById('Entradas-01').style.display='block'"><img src="Assets/Images/Entradas/EmpanadasArabes.jpg" alt="b8nhip9w6oj01.jpg" width="100%" height="80%" style='padding: 8px 4px'><p>Empanadas</p></div>
  	  <div class="MenuSection_Item" name="Entradas" onclick="document.getElementById('Entradas-02').style.display='block'"><img src="Assets/Images/Entradas/Empanadas.jpg" alt="b8nhip9w6oj01.jpg" width="100%" height="80%" style='padding: 8px 4px'><p>Empanadas Vegetarianas</p></div>
  	  <div class="MenuSection_Item" name="Entradas" onclick="document.getElementById('Entradas-03').style.display='block'"><img src="Assets/Images/Entradas/Picada.jpg" alt="b8nhip9w6oj01.jpg" width="100%" height="80%" style='padding: 8px 4px'><p>Picada</p></div>
  	  <div class="MenuSection_Item" name="Entradas" onclick="document.getElementById('Entradas-04').style.display='block'"><img src="Assets/Images/Entradas/Rabas.jpg" alt="b8nhip9w6oj01.jpg" width="100%" height="80%" style='padding: 8px 4px'><p>Rabas</p></div>
	  
  	  <div class="MenuSection_Item" name="Pastas" onclick="document.getElementById('Pastas-01').style.display='block'" style="display:none"><img src="Assets/Images/Pastas/Farfalle.jpg" alt="b8nhip9w6oj01.jpg" width="100%" height="80%" style='padding: 8px 4px'>		<p>Farfalle</p></div>
  	  <div class="MenuSection_Item" name="Pastas" onclick="document.getElementById('Pastas-02').style.display='block'" style="display:none"><img src="Assets/Images/Pastas/Pasta bolognesa.jpg" alt="b8nhip9w6oj01.jpg" width="100%" height="80%" style='padding: 8px 4px'>	<p>Pasta Bolognesa</p></div>
  	  <div class="MenuSection_Item" name="Pastas" onclick="document.getElementById('Pastas-03').style.display='block'" style="display:none"><img src="Assets/Images/Pastas/Penne.jpg" alt="b8nhip9w6oj01.jpg" width="100%" height="80%" style='padding: 8px 4px'>			<p>Penne</p></div>
  	  <div class="MenuSection_Item" name="Pastas" onclick="document.getElementById('Pastas-04').style.display='block'" style="display:none"><img src="Assets/Images/Pastas/Strozzapreti.jpg" alt="b8nhip9w6oj01.jpg" width="100%" height="80%" style='padding: 8px 4px'>	<p>Strozzapreti</p></div>
	  
  	  <div class="MenuSection_Item" name="Bebidas" onclick="document.getElementById('Bebidas-01').style.display='block'" style="display:none"><img src="Assets/Images/Bebidas/7up.jpg" alt="b8nhip9w6oj01.jpg" width="100%" height="80%" style='padding: 8px 4px'>	<p>Botella de Gaseosa</p></div>
  	  <div class="MenuSection_Item" name="Bebidas" onclick="document.getElementById('Bebidas-02').style.display='block'" style="display:none"><img src="Assets/Images/Bebidas/AguaEmbotellada.jpg" alt="b8nhip9w6oj01.jpg" width="100%" height="80%" style='padding: 8px 4px'>	<p>Botella de Agua</p></div>
  	  <div class="MenuSection_Item" name="Bebidas" onclick="document.getElementById('Bebidas-03').style.display='block'" style="display:none"><img src="Assets/Images/Bebidas/Pinta de Cerveza.jpg" alt="b8nhip9w6oj01.jpg" width="100%" height="80%" style='padding: 8px 4px'>	<p>Pinta de Cerveza</p></div>

  </div>
  
  
  <div class="MenuAside">
	<div class="MenuAside_Header"> <span class="simpleCart_items"></span></div>
	<div class="MenuAside_Footer">
		<a href="javascript:;" class="simpleCart_checkout" style="text-decoration:none"><div class="MenuAside_Checkout"><label>CHECKOUT</label></div></a>
		<a href="javascript:;" class="simpleCart_empty" style="text-decoration:none"><div class="MenuAside_Delete"><label>BORRAR</label></div></a>
	</div>
  </div>
</body>
<footer>
</footer>
</html>
