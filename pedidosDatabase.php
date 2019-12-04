<?php
	session_start();
	//Chequea que el chef tenga la sesión iniciada
	if (!isset($_SESSION['loggedin'])) {
		header('Location: index.html');
		exit();
	}
?>

<html>
<head>
  <link rel="stylesheet" href="format_index.css">
  <link rel="stylesheet" href="w3.css">
  <script type="text/javascript" src="XmlHttpRequest.js"></script>
  <script>
	//var databaseDisplay_timer = setInterval(do_xhr, 3000,"GET","pedidosDatabase_getPedidos.php",0,databaseDisplay_PosRequest);

	var PUBLIC_displayLocation;

	do_xhr("GET","pedidosDatabase_getPedidos.php",0,databaseDisplay_PosRequest);

	function databaseDisplay_PosRequest(str){
		document.getElementById("textObjective").innerHTML = str;
		var coll = document.getElementsByClassName("collapser");
		var i;
  
		for (i = 0; i < coll.length; i++) {
			coll[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var content = this.nextElementSibling;
			if (content.style.display === "block") {
				content.style.display = "none";
			} else {
				content.style.display = "block";
				}
			});
		} 
	}

	function Pedido_CambiarEstado(PedidoActual_ID,PedidoActual_Estado){
		var PedidoNuevo_Estado;

		if(PedidoActual_Estado=='Si'){
			PedidoNuevo_Estado='No';
		}
		else{
			PedidoNuevo_Estado='Si';
		}
		var str="PedidoActual_ID="+PedidoActual_ID+"&PedidoNuevo_Estado="+PedidoNuevo_Estado;
		PUBLIC_displayLocation="pedido_"+PedidoActual_ID;
		do_xhr("POST","pedidosDatabase_cambiarEstado.php",str,Display_MenuSection_CambiarEstado);

	}
	
	function Pedido_BorrarPedido(PedidoActual_ID){
		var str="PedidoActual_ID="+PedidoActual_ID;
		PUBLIC_displayLocation="pedido_"+PedidoActual_ID;
		do_xhr("POST","pedidosDatabase_BorrarPedido.php",str,Display_MenuSection_Borrar);
	}
	function Display_MenuSection_Borrar(str){
		var NodeToRemove=document.getElementById(PUBLIC_displayLocation);
		NodeToRemove.parentNode.removeChild(NodeToRemove);
		alert(str);
	}
	function Display_MenuSection_CambiarEstado(str){
		var NodeToChange=document.getElementById(PUBLIC_displayLocation).querySelector("[name=\"entregado\"]");
		NodeToChange.innerHTML = str;
	}

	function Pedido_VerDetalles(PedidoActual_ID){
		var str="PedidoActual_ID="+PedidoActual_ID;
		do_xhr("POST","pedidosDatabase_getPedidoDetails.php",str,Display_MenuAside);
	}
	function Display_MenuAside(str){
		var NodeToChange=document.getElementById("detalles");
		NodeToChange.innerHTML = str;
	}




  </script>
</head>
<body>

<div class="Header"><div style="height:15%;"><button style="background-color: Transparent; background-repeat:no-repeat; border: none;cursor:pointer; overflow: hidden; outline:none;" onclick= "window.location.href = 'logout.php' ;"></button></div><h1>Restaurante "Polibar"</h1></div>
<div id="textObjective" class="MenuSection" style="width:70%;height:82%"></div>
<div id="detalles" class="MenuAside" style="width:28%;height:82%"></div>
</body>

</html> 