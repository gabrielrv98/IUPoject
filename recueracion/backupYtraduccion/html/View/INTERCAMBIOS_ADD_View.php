<?php
//Clase : INTERCAMBIOS_ADD_View
//Creado el : 15-06-2020
//Creado por: grvidal
//Muestra unos campos para ser rellenados y los manda por post al controlador
//-------------------------------------------------------

	class INTERCAMBIOS_ADD{

		var $productos;

		//funcion que guarda los parametros y construye la interfaz
		//$productos- lista de productos para intercambiar
		function __construct($productos){
			$this->productos =$productos;
			$this->render();
		}

		function render(){
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<title class="Tadd"> <?php echo $strings['Tadd']; ?></title>
		</head>
		
		<?php include '../View/Header.php'; 
		?>

			<h1 class="addInter"></h1>	


			<form name = 'Form' action='../Controller/INTERCAMBIOS_Controller.php?action=ADD' method='post' onsubmit="return comprobarIntercambio(this);" enctype="multipart/form-data">

				<label class="tituloStyle producto"></label><label class="tituloStyle"> 1</label><br><br>
				 	
				<div class="form-group">
				 	<label for="idProd1" class="tituloProducto">Titulo producto</label>
				 	<br> 
				 	<select name="idProd1" id="idProd1" onchange="checkEquals(2,this); setMax(1)" required>
				 		<?php $maxInicial;// el valor maximo inicialmente ( el maximo del primer Producto)
				 				$control = 0; // control para asegurar que cogemos el primero
				 		foreach ($this->productos as $key ) { //recorremos todos los productos
				 			if ( $control == 0 ) $maxInicial = $key['HORAS_UNIDADES']; // si es la primera vez se coge el valor
				 			$control = 1;// se modifica la variable de control para no guardar otros valores
				 			?>
				 			<option value="<?php echo $key['ID'];?>"><?php echo $key['TITULO'], " - Max :",$key['HORAS_UNIDADES']; ?></option>
				 		<?php  } ?>
				 	</select>
				 	<label class="errormsg idRepetidos" for="idProd1" id="idProd1_error" >Error en el producto </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="unidades1" class="horasUnidades">Horas</label><label> Max </label><label id="unid1Max" > <?php echo $maxInicial; ?></label>
				 	<br> 
				 	<input type="number" name="unidades1" id="unidades1" onblur="comprobarEntero(this);noMayor(this,1)" required>
				 	<label class="errormsg noMayor" for="unidades1" id="unidades1_error" >Error en el producto </label>
				 	<label class="errormsg tooshort" for="unidades1" id="unidades1_errorLength" > Al menos un numero </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="accept1" class="accept1">Accept</label>
				 	<br> 
				 	<select id="accept1" name="accept1" onchange="comprobarAccept(this);" required>
				 		<option value="aceptado" class="aceptado"> Aceptado</option>
				 		<option value="denegado" class="denegado" selected>Denegado</option>
				 		
				 	</select>
				 	<label class="errormsg acceptError" for="accept1" id="accept1_error" >Error en el estado de aceptacion </label>
				</div>&nbsp;&nbsp;

				<br><br>
				<label class="tituloStyle producto"></label><label class="tituloStyle"> 2</label><br><br>

				<div class="form-group">
				 	<label for="idProd2" class="tituloProducto">Titulo producto</label><label> 2</label>
				 	<br> 
				 	<select name="idProd2" id="idProd2" onchange="checkEquals(1,this); setMax(2)" required>
				 		<?php foreach ($this->productos as $key ) { //recorremos todos los productos ?>
				 			<option value="<?php echo $key['ID'];?>"><?php echo $key['TITULO'], " - Max :",$key['HORAS_UNIDADES']; ?></option>
				 		<?php } ?>
				 	</select>
				 	<label class="errormsg idRepetidos" for="idProd2" id="idProd2_error" >Error en el producto </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="unidades2" class="horasUnidades">Horas</label><label> Max </label><label id="unid2Max"> <?php echo $maxInicial; ?></label>
				 	<br> 
				 	<input type="number" name="unidades2" id="unidades2" onblur="comprobarEntero(this); noMayor(this,2)" required>
				 	<label class="errormsg noMayor" for="unidades2" id="unidades2_error" >Error en el producto </label>
				 	<label class="errormsg tooshort" for="unidades2" id="unidades2_errorLength" > Al menos un numero </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="accept2" class="accept2">Accept</label>
				 	<br> 
				 	<select id="accept2" name="accept2" onchange="comprobarAccept(this);" required>
				 		<option value="aceptado" class="aceptado"> Aceptado</option>
				 		<option value="denegado" class="denegado" selected>Denegado</option>				 		
				 	</select>
				 	<label class="errormsg acceptError" for="accept2" id="accept2_error" >Error en el estado de aceptacion </label>
				</div>&nbsp;&nbsp;

				<button type="submit" name='action' class="btn btn-primary submit" value="ADD" >
					Aceptar
				</button>

			</form>

			
			<a href='../Controller/INTERCAMBIOS_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
			<br><br>
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>