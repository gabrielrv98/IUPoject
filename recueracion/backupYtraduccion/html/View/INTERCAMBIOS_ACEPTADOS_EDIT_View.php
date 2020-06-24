<?php
//Clase : INTERCAMBIOS_ACEPTADOS_EDIT_View
//Creado el : 19-06-2020
//Creado por: grvidal
//Muestra el formulario de editar un intercambio que ha sido aceptado por ambas partes
//Solo un administrador puede entrar aqui
//-------------------------------------------------------

	class INTERCAMBIOS_ACEPTADOS_EDIT{

		var $valores;
		var $productos;

		//valores- los valores de la tupla de intercambios correspondiente
		//productos- todos los productos para ser mostrados en un select
		function __construct($valores,$productos){	

			$this->valores = $valores;
			$this->productos = $productos;
			$this->render();
		}

		function render(){
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<title class="Tedit"> <?php echo $strings['Tedit']; ?></title>
		</head>
		
		<?php include '../View/Header.php'; //header necesita los strings ?>
			<h1 class="editInter"></h1>	

			<!-- Inicio del formulario -->
			<form name = 'Form' action='../Controller/INTERCAMBIOS_Controller.php?action=EDIT' method='post' onsubmit="return comprobarIntercambio(this);" enctype="multipart/form-data">

				<div class="form-group">
					<label for="id" >ID </label>
					<input type="text" id="id" name="id"  value="<?php echo $this->valores['ID'] ?>" readonly>
				</div>&nbsp;&nbsp;

				<div class="form-group">
					<label class="tituloStyle noPodraDeshacerse">ADVERTENCIA </label>
				</div>&nbsp;&nbsp;

				<!-- Inicio del producto 1 -->
				<br><br>
				<label class="tituloStyle producto"></label><label class="tituloStyle"> 1</label><br><br>
				 	
				<div class="form-group">
				 	<label for="idProd1" class="tituloProducto">Titulo producto</label>
				 	<br> 
				 	<select name="idProd1" id="idProd1" onchange="checkEquals(2,this); setMax(1)" required>
					 		<?php $maxInicial;// el valor maximo inicialmente ( el maximo del producto anteriormente seleccionado)

					 		foreach ($this->productos as $key ) { //recorremos todos los productos				 			
					 			if ( $this->valores['ID_PRODUCTO1'] == $key['ID'] ){//si es el producto en cuestion
					 				$maxInicial = $key['HORAS_UNIDADES']+$this->valores['UNIDADES1']; // si es el prodcto anteriormente seleccionado se guarda su maximo
					 				$horasUnidades = $key['HORAS_UNIDADES'] + $this->valores['UNIDADES1'];// el maximo es las de la bd y las que se han quitado con el intercambio
					 			}else $horasUnidades = $key['HORAS_UNIDADES'];?>

						 			<option value="<?php echo $key['ID'];?>" <?php if($this->valores['ID_PRODUCTO1'] == $key['ID']) echo "selected"; ?> ><?php echo $key['TITULO'], " - Max :",$horasUnidades; ?></option>


						 		<?php  } ?>
						</select>

					 	<label class="errormsg idRepetidos" for="idProd1" id="idProd1_error" >Error en el producto </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="unidades1" class="horasUnidades">Horas</label><label> Max </label><label id="unid1Max" > <?php echo $maxInicial; ?></label>
				 	<br> 
				 	<input type="number" name="unidades1" id="unidades1" onblur="comprobarEntero(this);noMayor(this,1)" value="<?php echo $this->valores['UNIDADES1'] ?>" required>
				 	<label class="errormsg noMayor" for="unidades1" id="unidades1_error" >Error en el producto </label>
				 	<label class="errormsg tooshort" for="unidades1" id="unidades1_errorLength" > Al menos un numero </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="accept1" class="accept1">Accept</label>
				 	<br> 
				 	<select id="accept1" name="accept1" onchange="comprobarAccept(this);" required>
					 	<option value="aceptado" class="aceptado" <?php if($this->valores['ACCEPT1'] == 'aceptado') echo "selected" ?> > Aceptad</option>
					 	<option value="denegado" class="denegado" <?php if($this->valores['ACCEPT1'] == 'denegado') echo "selected" ?>>Denegado</option>
					 		
					 </select>
				 	<label class="errormsg acceptError" for="accept1" id="accept1_error" >Error en el estado de aceptacion </label>
				</div>&nbsp;&nbsp;

				<!-- Fin del producto 1 -->

				<!-- INicio del producto 2 -->
				<br><br>
				<label class="tituloStyle producto"></label><label class="tituloStyle"> 2</label><br><br>

				<div class="form-group">
				 	<label for="idProd2" class="tituloProducto">Titulo producto</label>
				 	<br> 
				 	<select name="idProd2" id="idProd2" onchange="checkEquals(1,this); setMax(2)" required>
					 		<?php $maxInicial;// el valor maximo inicialmente del producto seleccionado

					 		foreach ($this->productos as $key ) { //recorremos todos los productos				 			
					 			if ( $this->valores['ID_PRODUCTO2'] == $key['ID'] ){
					 				$maxInicial = $key['HORAS_UNIDADES'] + $this->valores['UNIDADES2']; // si es el prodcto anteriormente seleccionado se guarda su maximo
					 				$horasUnidades = $key['HORAS_UNIDADES'] + $this->valores['UNIDADES2'];// el maximo es las de la bd y las que se han quitado con el intercambio
					 			}else $horasUnidades = $key['HORAS_UNIDADES'];
						 			?>
						 			<option value="<?php echo $key['ID'];?>" <?php if($this->valores['ID_PRODUCTO2'] == $key['ID']) echo "selected"; ?> ><?php echo $key['TITULO'], " - Max :",$horasUnidades ?></option>
						 		<?php  } ?>
						</select>

					 	<label class="errormsg idRepetidos" for="idProd2" id="idProd2_error" >Error en el producto </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="unidades2" class="horasUnidades">Horas</label><label> Max </label><label id="unid2Max"> <?php echo $maxInicial; ?></label>
				 	<br> 
				 	<input type="number" name="unidades2" id="unidades2" onblur="comprobarEntero(this); noMayor(this,2)" value="<?php echo $this->valores['UNIDADES2'] ?>" required>
				 	<label class="errormsg noMayor" for="unidades2" id="unidades2_error" >Error en el producto </label>
				 	<label class="errormsg tooshort" for="unidades2" id="unidades2_errorLength" > Al menos un numero </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="accept2" class="accept2">Accept</label>
				 	<br> 
				 	<select id="accept2" name="accept2" onchange="comprobarAccept(this);" required>
				 		<option value="aceptado" class="aceptado" <?php if($this->valores['ACCEPT2'] == 'aceptado') echo "selected" ?> > Aceptado</option>
				 		<option value="denegado" class="denegado" <?php if($this->valores['ACCEPT2'] == 'denegado') echo "selected" ?> > Denegado</option>				 		
				 	</select>
				 	<label class="errormsg acceptError" for="accept2" id="accept2_error" >Error en el estado de aceptacion </label>
				</div>&nbsp;&nbsp;
				<!-- Fin del producto 2-->


				<button type="submit" name='action' class="btn btn-primary submit" value="EDIT" >
					<?php echo $strings['submit'] ; ?>
				</button>

			</form>

			
			<a href='../Controller/INTERCAMBIOS_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
			<br><br>
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin edit

?>