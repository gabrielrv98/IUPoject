<?php
//Clase : INTERCAMBIOS_EDIT_View
//Creado el : 19-06-2020
//Creado por: grvidal
//Muestra el formulario de añadir intercambios, que consta de el producto, las unidades y el estado de aceptacion, de ambas partes
// Luego envia los parametros por post a Intercambios Controller
//-------------------------------------------------------

	class INTERCAMBIOS_EDIT{

		var $valores;
		var $productos;
		var $propiedad;
		var $dni;

		//valores- los valores de la tupla de intercambios correspondiente
		//productos- todos los productos para ser mostrados en un select
		//propiedad- 0 = el usuario es admin, 1 = dueño del producto 1, 2= dueño del producto 2
		//dni- el dni del usuario, si es admin, esta vacio
		function __construct($valores,$productos,$propiedad,$dni){	

			$this->propiedad = $propiedad;
			$this->productos = $productos;
			$this->valores = $valores;
			$this->dni= $dni;		
			$this->render();
		}

		function render(){
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<title class="Tedit"> Tedit</title>
		</head>
		
		<?php include '../View/Header.php'; //header necesita los strings ?>
			<h1 class="editInter"></h1>	
			<form name = 'Form' action='../Controller/INTERCAMBIOS_Controller.php?action=EDIT' method='post' onsubmit="return comprobarIntercambio(this);" enctype="multipart/form-data">

				<div class="form-group">
					<label for="id" >ID </label>
					<input type="text" id="id" name="id"  value="<?php echo $this->valores['ID'] ?>" readonly>
				</div>&nbsp;&nbsp;

				<div class="form-group">
					<label class="tituloStyle noPodraDeshacerse">ADVERTENCIA </label>
				</div>&nbsp;&nbsp;


				<br><br>
				<label class="tituloStyle producto"></label><label class="tituloStyle"> 1</label><br><br>
				 	
				<div class="form-group">
				 	<label for="idProd1" class="tituloProducto">Titulo producto</label>
				 	<br> 
				 	<?php $encontrado = false;//variable que se pone a true si el producto marcado en el intercambio aparece en el record de productos
				 		if ($this->propiedad == '0'){//se le muestran todos los productos?>

				 		<select name="idProd1" id="idProd1" onchange="checkEquals(2,this); setMax(1)" required>
					 		<?php $maxInicial;// el valor maximo inicialmente ( el maximo del producto anteriormente seleccionado)
					 				
					 		foreach ($this->productos as $key ) { //recorremos todos los productos				 			
					 			if ( $this->valores['ID_PRODUCTO1'] == $key['ID'] ) $maxInicial = $key['HORAS_UNIDADES']; // si es el prodcto anteriormente seleccionado se guarda su maximo?>

						 			<option value="<?php echo $key['ID'];?>" <?php if($this->valores['ID_PRODUCTO1'] == $key['ID']){ echo "selected"; $encontrado = true; }?> ><?php echo $key['TITULO'], " - Max :",$key['HORAS_UNIDADES']; ?></option>


						 		<?php  } ?>
						</select>
				 		
					<?php } else if ($this->propiedad == '1'){//se le muestran solo sus productos ?>

						<select name="idProd1" id="idProd1" onchange="checkEquals(2,this); setMax(1)" required>
						<?php 	$maxInicial;// el valor maximo inicialmente ( el maximo del primer Producto)
					 		foreach ($this->productos as $key ) { //recorremos todos los productos	
						 		if($key['VENDEDOR_DNI'] == $this->dni){ //si el producto es suyo		

					 				if ( $this->valores['ID_PRODUCTO1'] == $key['ID'] ) $maxInicial = $key['HORAS_UNIDADES']; // si es el prodcto anteriormente seleccionado se guarda su maximo 
						 				if($key['ESTADO'] != 'vendido'){ ?>

							 				<option value="<?php echo $key['ID'];?>" <?php if($this->valores['ID_PRODUCTO1'] == $key['ID']){ echo "selected"; $encontrado = true; } ?> ><?php echo $key['TITULO'], " - Max :",$key['HORAS_UNIDADES']; ?></option>
							 			<?php } ?>

						 			<?php  } ?>	
						 		<?php  } ?>
						</select> 
						 	<?php } else { 
						 		foreach($this->productos as $key ) {
						 			if ($key['ID'] == $this->valores['ID_PRODUCTO1']){ 
						 				$encontrado = true; ?>

						 				<input type="text" id="idProd1" name="idProd1" value="<?php echo $key['ID'] ?>"  readonly><label> <?php echo $key['TITULO'] ?></label>
						 			<?php $maxInicial = $key['HORAS_UNIDADES'];
						 			} 
						 		} ?>
						 		

						 	<?php } ?>

					 	<label class="errormsg idRepetidos" for="idProd1" id="idProd1_error" >Error en el producto </label>
				</div>&nbsp;&nbsp;

				<?php if (!$encontrado) { ?>
					<div>
						<label class="productoNoEnLaLista tituloStyle errormsg" style="visibility: visible;"></label><br>
						<label class="productoNoEnLaLista2 errormsg" style="visibility: visible;"></label><br><br>
					</div>
					
				<?php } ?>

				<div class="form-group">
				 	<label for="unidades1" class="horasUnidades">Horas</label><label> Max </label><label id="unid1Max" > <?php echo $maxInicial; ?></label>
				 	<br> 
				 	<input type="number" name="unidades1" id="unidades1" onblur="comprobarEntero(this);noMayor(this,1)" value="<?php echo $this->valores['UNIDADES1'] ?>" <?php if($this->propiedad == '2') echo "readonly"; ?> required>
				 	<label class="errormsg noMayor" for="unidades1" id="unidades1_error" >Error en el producto </label>
				 	<label class="errormsg tooshort" for="unidades1" id="unidades1_errorLength" > Al menos un numero </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="accept1" class="accept1">Accept</label>
				 	<br> 
				 	<?php $encontrado = false;//variable que se pone a true si el producto marcado en el intercambio aparece en el record de productos
				 	if ($this->propiedad != '2'){ ?>
					 	<select id="accept1" name="accept1" onchange="comprobarAccept(this);" required>
					 		<option value="aceptado" class="aceptado" <?php if($this->valores['ACCEPT1'] == 'aceptado') echo "selected" ?> > Aceptado</option>
					 		<option value="denegado" class="denegado" <?php if($this->valores['ACCEPT1'] == 'denegado') echo "selected" ?>>Denegado</option>
					 		
					 	</select>
					<?php }else { ?>
						<input type="text" id="accept1" name="accept1" value="<?php echo $this->valores['ACCEPT1'] ?>" readonly>
					<?php } ?>
				 	<label class="errormsg acceptError" for="accept1" id="accept1_error" >Error en el estado de aceptacion </label>
				</div>&nbsp;&nbsp;

				<br><br>
				<label class="tituloStyle producto"></label><label class="tituloStyle"> 2</label><br><br>

				<div class="form-group">
				 	<label for="idProd2" class="tituloProducto">Titulo producto</label>
				 	<br> 
				 	<?php if ($this->propiedad == '0'){//se le muestran todos los productos?>

				 		<select name="idProd2" id="idProd2" onchange="checkEquals(1,this); setMax(2)" required>
					 		<?php $maxInicial;// el valor maximo inicialmente del producto seleccionado
					 			
					 		foreach ($this->productos as $key ) { //recorremos todos los productos				 			
					 			if ( $this->valores['ID_PRODUCTO2'] == $key['ID'] ) $maxInicial = $key['HORAS_UNIDADES']; // si es el prodcto anteriormente seleccionado se guarda su maximo
						 			?>
						 			<option value="<?php echo $key['ID'];?>" <?php if($this->valores['ID_PRODUCTO2'] == $key['ID']){ echo "selected"; $encontrado = true; } ?> ><?php echo $key['TITULO'], " - Max :",$key['HORAS_UNIDADES']; ?></option>
						 		<?php  } ?>
						</select>
				 		
					<?php } else if ($this->propiedad == '2'){//se le muestran solo sus productos ?>

						<select name="idProd2" id="idProd2" onchange="checkEquals(1,this); setMax(2)" required>
						<?php 	$maxInicial;// el valor maximo inicialmente ( el maximo del primer Producto)
						
					 		foreach ($this->productos as $key ) { //recorremos todos los productos	
						 		if($key['VENDEDOR_DNI'] == $this->dni){ //si el producto es suyo		

					 				if ( $this->valores['ID_PRODUCTO2'] == $key['ID'] ) $maxInicial = $key['HORAS_UNIDADES']; // si es el prodcto anteriormente seleccionado se guarda su maximo
					 					if($key['ESTADO'] != 'vendido'){ ?> ?>

						 				<option value="<?php echo $key['ID'];?>" <?php if($this->valores['ID_PRODUCTO2'] == $key['ID']){ echo "selected"; $encontrado = true; } ?> ><?php echo $key['TITULO'], " - Max :",$key['HORAS_UNIDADES']; ?></option>
						 				<?php } ?>
						 			<?php  } ?>	
						 		<?php  } ?>
						</select> 
						 	<?php } else { 
						 		foreach($this->productos as $key ) {
						 			if ($key['ID'] == $this->valores['ID_PRODUCTO2']){ 
						 				$encontrado = true; ?>
						 				<input type="text" id="idProd2" name="idProd2" value="<?php echo $key['ID'] ?>" readonly><label> <?php echo $key['TITULO'] ?></label>
						 			<?php $maxInicial = $key['HORAS_UNIDADES'];
						 			} 
						 		} ?>
						 		

						 	<?php } ?>

					 	<label class="errormsg idRepetidos" for="idProd2" id="idProd2_error" >Error en el producto </label>
				</div>&nbsp;&nbsp;


				<?php //si el producto no esta en la lista porque se ha agotado se muestra un mensaje explicativo
					if (!$encontrado) { ?>
					<div>
						<label class="productoNoEnLaLista tituloStyle errormsg" style="visibility: visible;"></label><br>
						<label class="productoNoEnLaLista2  errormsg" style="visibility: visible;"></label><br><br>
					</div>
					
				<?php } ?>

				<div class="form-group">
				 	<label for="unidades2" class="horasUnidades">Horas</label><label> Max </label><label id="unid2Max"> <?php echo $maxInicial; ?></label>
				 	<br> 
				 	<input type="number" name="unidades2" id="unidades2" onblur="comprobarEntero(this); noMayor(this,2)" value="<?php echo $this->valores['UNIDADES2'] ?>" <?php if($this->propiedad == '1') echo "readonly"; ?> required>
				 	<label class="errormsg noMayor" for="unidades2" id="unidades2_error" >Error en el producto </label>
				 	<label class="errormsg tooshort" for="unidades2" id="unidades2_errorLength" > Al menos un numero </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="accept2" class="accept2">Accept</label>
				 	<br> 
				 	<?php if ($this->propiedad != '1'){ ?>
				 	<select id="accept2" name="accept2" onchange="comprobarAccept(this);" required>
				 		<option value="aceptado" class="aceptado" <?php if($this->valores['ACCEPT2'] == 'aceptado') echo "selected" ?> > Aceptado</option>
				 		<option value="denegado" class="denegado" <?php if($this->valores['ACCEPT2'] == 'denegado') echo "selected" ?> > Denegado</option>				 		
				 	</select>
				 	<?php }else { ?>
				 		<input type="text"  id="accept2" name="accept2" value="<?php echo $this->valores['ACCEPT2'] ?>" readonly></label>
					<?php } ?>
				 	<label class="errormsg acceptError" for="accept2" id="accept2_error" >Error en el estado de aceptacion </label>
				</div>&nbsp;&nbsp;


				<button type="submit" name='action' class="btn btn-primary submit" value="EDIT" >
					submit
				</button>

			</form>

			
			<a href='../Controller/INTERCAMBIOS_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
			<br><br>
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin edit

?>