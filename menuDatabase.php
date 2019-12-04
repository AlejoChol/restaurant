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
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="format_index.css">
<script type="text/javascript" src="XmlHttpRequest.js"></script>
	<script>
	//var databaseDisplay_timer = setInterval(do_xhr, 3000,"GET","menuDatabase_getItems.php",0,databaseDisplay_PosRequest);

	//function databaseDisplay(){
	do_xhr("GET","menuDatabase_getItems.php",0,databaseDisplay_PosRequest);

	var PUBLIC_displayLocation;
	//}
	function CreateFormTemplate(containerInit){
		containerInit.className="w3-modal";
		containerInit.style="display:block";
		containerInit.id="currentForm";

		var containerTempElement=document.createElement("div");
		containerTempElement.className="w3-modal-content w3-animate-zoom";
		containerTempElement.style="height:auto";
		containerInit.appendChild(containerTempElement);
		
		var containerBase=document.createElement("div");
		containerBase.className="w3-container";
		containerBase.id="currentForm_Interior";
		containerTempElement.appendChild(containerBase);

		var containerCloseButton=document.createElement("span");
		containerCloseButton.className="w3-button w3-display-topright";
		containerCloseButton.innerHTML="&times;";
		containerCloseButton.addEventListener("click", function() {
			var FormToDelete=document.getElementById("currentForm");
			FormToDelete.parentNode.removeChild(FormToDelete);
		});
		containerBase.appendChild(containerCloseButton);


		return containerBase;
	}
//----------------------------------------------------------------------------------------------------
//MODIFICAR
//----------------------------------------------------------------------------------------------------
	function Categoria_Editar(categoriaID){
		var containerInit=document.createElement("div");
		var containerBase=CreateFormTemplate(containerInit);

		var categoriaFullID="menu_"+categoriaID;

		var FormElement=document.createElement("form");
		FormElement.id="categoria_form";
		FormElement.action="javascript:;";
		FormElement.onsubmit= function() {
			var args=dataRow_getArgs("categoria_form",categoriaFullID,1);
			do_xhr('POST',"menuDatabase_editDatabase.php",args,tempEnd);
		};
		containerBase.appendChild(FormElement);

		var categoriaElement=document.getElementById(categoriaFullID);
		var categoriaName=categoriaElement.querySelector('td[name="Name"]').innerHTML;
		
		var inputElement=document.createElement("input");
		inputElement.type="hidden";
		inputElement.name="action";
		inputElement.value="categoria_editar";
		FormElement.appendChild(inputElement);
		
		var inputElement=document.createElement("input");
		inputElement.type="hidden";
		inputElement.name="ID";
		inputElement.value=categoriaID;
		FormElement.appendChild(inputElement);
		
		var inputLabel=document.createElement("label");
		inputLabel.innerHTML="<b>Nombre de categoria</b>";
		inputLabel.className="w3-text-black";
		FormElement.appendChild(inputLabel);

		var inputElement=document.createElement("input");
		inputElement.className="w3-input";
		inputElement.type="text";
		inputElement.name="Name";
		inputElement.value=categoriaName;
		FormElement.appendChild(inputElement);

		var inputElement=document.createElement("input");
		inputElement.className="w3-btn w3-green";
		inputElement.type="submit";
		inputElement.name="submit";
		inputElement.value="Actualizar";
		FormElement.appendChild(inputElement);

		document.body.appendChild(containerInit);
	}

	function Item_Editar(itemID){
		var itemFullID="Item_"+itemID;

		var containerInit=document.createElement("div");
		var containerBase=CreateFormTemplate(containerInit);

		var FormElement=document.createElement("form");
		FormElement.id="item_form";
		FormElement.action="javascript:;";
		FormElement.onsubmit= function() {
			var args=dataRow_getArgs("item_form",itemFullID,1);
			do_xhr('POST',"menuDatabase_editDatabase.php",args,tempEnd);
		};
		containerBase.appendChild(FormElement);

		var itemElement=document.getElementById(itemFullID);
		var itemName=itemElement.querySelector('td[name="Name"]').innerHTML;
		var itemPrecio=itemElement.querySelector('td[name="Precio"]').innerHTML;
		var itemImgPath=itemElement.querySelector('td[name="ImgPath"]').innerHTML;
		
		var inputElement=document.createElement("input");
		inputElement.type="hidden";
		inputElement.name="action";
		inputElement.value="item_editar";
		FormElement.appendChild(inputElement);
		
		var inputElement=document.createElement("input");
		inputElement.type="hidden";
		inputElement.name="ID";
		inputElement.value=itemID;
		FormElement.appendChild(inputElement);
		


		var inputLabel=document.createElement("label");
		inputLabel.innerHTML="<b>Nombre</b>";
		inputLabel.className="w3-text-black";
		FormElement.appendChild(inputLabel);

		var inputElement=document.createElement("input");
		inputElement.className="w3-input";
		inputElement.type="text";
		inputElement.name="Name";
		inputElement.value=itemName;
		FormElement.appendChild(inputElement);



		var inputLabel=document.createElement("label");
		inputLabel.innerHTML="<b>Precio</b>";
		inputLabel.className="w3-text-black";
		FormElement.appendChild(inputLabel);

		var inputElement=document.createElement("input");
		inputElement.className="w3-input";
		inputElement.type="text";
		inputElement.name="Precio";
		inputElement.value=itemPrecio;
		FormElement.appendChild(inputElement);



		var inputLabel=document.createElement("label");
		inputLabel.innerHTML="<b>Direccion Local de Imagen</b>";
		inputLabel.className="w3-text-black";
		FormElement.appendChild(inputLabel);

		var inputElement=document.createElement("input");
		inputElement.className="w3-input";
		inputElement.type="text";
		inputElement.name="ImgPath";
		inputElement.value=itemImgPath;
		FormElement.appendChild(inputElement);

		var inputElement=document.createElement("input");
		inputElement.className="w3-btn w3-green";
		inputElement.type="submit";
		inputElement.name="submit";
		inputElement.value="Actualizar";
		FormElement.appendChild(inputElement);

		document.body.appendChild(containerInit);

		var str="ID="+itemID;

		do_xhr('POST',"menuDatabase_getItemOptions.php",str,appendToForm);

	}

	function Opcion_Editar(opcionID){
		var argStr=dataRow_getArgs(opcionID);
		argStr+="&action=opcion_editar";
		do_xhr('POST',"menuDatabase_editDatabase.php",argStr,tempEnd);
	}
	
	function OpcionItem_Editar(opcionID){
		var argStr=dataRow_getArgs(opcionID);
		argStr+="&action=opcionItem_editar";
		do_xhr('POST',"menuDatabase_editDatabase.php",argStr,tempEnd);
	}
//----------------------------------------------------------------------------------------------------
//AGREGAR A LA BASE DE DATOS
//----------------------------------------------------------------------------------------------------
	function Categoria_Agregar(){
		PUBLIC_displayLocation="Lista_Categoria";
		do_xhr('POST',"menuDatabase_editDatabase.php","action=categoria_agregar",Agregar_Display);
	}
	function Item_Agregar(ID){
		PUBLIC_displayLocation="ItemList_"+ID;
		do_xhr('POST',"menuDatabase_editDatabase.php",("action=item_agregar&ID="+ID),Agregar_Display);
	}
	
	function Opcion_Agregar(ID){
		PUBLIC_displayLocation="OptionList_"+ID;
		do_xhr('POST',"menuDatabase_editDatabase.php",("action=opcion_agregar&ID="+ID),Agregar_Display);
	}
	
	function OpcionItem_Agregar(ID){
		PUBLIC_displayLocation="OptionItemList_"+ID;
		do_xhr('POST',"menuDatabase_editDatabase.php",("action=opcionItem_agregar&ID="+ID),Agregar_Display);
	}
//----------------------------------------------------------------------------------------------------
//BORRAR DE LA BASE DE DATOS
//----------------------------------------------------------------------------------------------------
	function Categoria_Borrar(ID){
		PUBLIC_displayLocation="Categoria_"+ID;
		do_xhr('POST',"menuDatabase_editDatabase.php",("action=categoria_borrar&ID="+ID),Borrar_Display);
	}

	function Item_Borrar(ID){
		PUBLIC_displayLocation="Item_"+ID;
		do_xhr('POST',"menuDatabase_editDatabase.php",("action=item_borrar&ID="+ID),Borrar_Display);
	}

	function Opcion_Borrar(ID){
		PUBLIC_displayLocation="opcion_"+ID;
		do_xhr('POST',"menuDatabase_editDatabase.php",("action=opcion_borrar&ID="+ID),Borrar_Display);
	}

	function OpcionItem_Borrar(ID){
		PUBLIC_displayLocation="opcionItem__"+ID;
		do_xhr('POST',"menuDatabase_editDatabase.php",("action=opcionItem_borrar&ID="+ID),Borrar_Display);
	}



	function Agregar_Display(str){
  		console.log(PUBLIC_displayLocation);
		document.getElementById(PUBLIC_displayLocation).innerHTML+=str;


		var coll = document.getElementsByName("collapser");
		var i;
		for (i = 0; i < coll.length; i++) {
			coll[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var content = this.nextElementSibling;
			if (content.style.display != "none") {
				content.style.display = "none";
				this.innerHTML="&or;";
			} else {
				content.style.display = "block";
				this.innerHTML="&and;";
				}
			});
		} 
	}

	function Borrar_Display(str){
		var NodeToRemove=document.getElementById(PUBLIC_displayLocation);
		NodeToRemove.parentNode.removeChild(NodeToRemove);
		alert(str);
	}


	function appendToForm(str){
		var currentForm_Interior =document.getElementById("currentForm_Interior");
		var currentForm_inputToAppend=document.createElement("div");
		currentForm_inputToAppend.innerHTML=str;
		currentForm_Interior.appendChild(currentForm_inputToAppend);
	}

	function tempEnd(str){
		alert(str);
	}

	function cerrarVentana(){
			var FormToDelete=document.getElementById("currentForm");
			FormToDelete.parentNode.removeChild(FormToDelete);
	}
	function databaseDisplay_PosRequest(str){
		document.getElementById("textObjective").innerHTML = str;

		var coll = document.getElementsByName("collapser");
		var i;
		for (i = 0; i < coll.length; i++) {
			coll[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var content = this.nextElementSibling;
			if (content.style.display != "none") {
				content.style.display = "none";
				this.innerHTML="&or;";
			} else {
				content.style.display = "block";
				this.innerHTML="&and;";
				}
			});
		} 
	}

	function dataRow_getArgs(newData_ID,oldData_ID,isReplaced){
		var newData_dataLocation=document.getElementById(newData_ID);

		var newDataList = newData_dataLocation.querySelectorAll('input');
		var newDataList = Array.prototype.slice.call(newDataList);

		if(typeof isReplaced!="undefined"){
			isReplaced=1;
			var oldData_dataLocation=document.getElementById(oldData_ID);
		}
		else{isReplaced=0;}

		var argStr="";

		for(var i=0;i<newDataList.length;i++){
			if(i!=0){argStr+="&";}
			argStr+=newDataList[i].name;
			argStr+="=";
			argStr+=newDataList[i].value;

			var queryStr="[name="+newDataList[i].name+"]";
			var oldData_selected;
			if(isReplaced){
				if((oldData_selected=oldData_dataLocation.querySelector(queryStr))!=null){
					oldData_selected.innerHTML=newDataList[i].value		
				}
			}
		}
  		console.log(argStr);
		return argStr;
	}

  </script>
</head>
<body>

<div class="Header"><div style="height:15%;"><button style="background-color: Transparent; background-repeat:no-repeat; border: none;cursor:pointer; overflow: hidden; outline:none;" onclick= "window.location.href = 'logout.php' ;"></button></div><h1>Restaurante "Polibar"</h1></div>
<div id="textObjective"></div>
</body>

</html> 