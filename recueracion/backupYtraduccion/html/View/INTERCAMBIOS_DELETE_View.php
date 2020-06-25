<?php
//Clase : INTERCAMBIOS_DELETE_View
//Creado el : 15-06-2020
//Creado por: grvidal
//Muestra el formulario de eliminar intercambios, que consta de el producto, las unidades y el estado de aceptacion, de ambas partes
// Luego envia los parametros por post a Intercambios Controller con la accion DELETE
//-------------------------------------------------------

	class INTERCAMBIOS_DELETE{

		var $valores;
		var $eliminable;
		
		//funcion que guarda los parametros y construye la interfaz
		//$valores- lista de productos para intercambiar
		function __construct($valores,$eliminable){
			$this->eliminable =$eliminable;
			$this->valores =$valores;
			$this->render();
		}

		function render(){
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<title class="Tdelete"> Delete</title>
		</head>
		
		<?php include '../View/Header.php'; 
		?>

			<h1 class="deleteInter"></h1>	


			<form name = 'Form' action='../Controller/INTERCAMBIOS_Controller.php?action=DELETE' method='post' onsubmit="return comprobarIntercambio(this);" enctype="multipart/form-data">

				<?php if($this->eliminable == 'false'){ ?>
					<label class="ProdNoEliminable tituloStyle errormsg" style="visibility: visible;"></label><br><br>
				<?php } ?>

				<div class="form-group">
					<label for="id" >ID </label>
					<input type="text" id="id" name="id"  value="<?php echo $this->valores['ID'] ?>" readonly>
				</div>&nbsp;&nbsp;<br>

				<label class="tituloStyle producto"></label><label class="tituloStyle"> 1</label><br><br>
				 	
				<div class="form-group">
				 	<label for="idProd1" class="tituloProducto">Titulo producto</label>
				 	<br> 
				 	<input type="text" name="idProd1" id="idProd1" onblur="checkEquals(2,this)" value="<?php echo $this->valores['ID_PRODUCTO1'] ?>"   readonly><label> <?php echo $this->valores['TITULO1']; ?></label>
				 	<label class="errormsg idRepetidos" for="idProd1" id="idProd1_error" >Error en el producto </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="unidades1" class="horasUnidades">Horas</label>
				 	<br> 
				 	<input type="number" name="unidades1" id="unidades1" value="<?php echo $this->valores['UNIDADES1'] ?>" onblur="comprobarEntero(this);" readonly>
				 	<label class="errormsg noMayor" for="unidades1" id="unidades1_error" >Error en el producto </label>
				 	<label class="errormsg tooshort" for="unidades1" id="unidades1_errorLength" > Al menos un numero </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="accept1" class="accept1">Accept</label>
				 	<br> 

				 	<select id="accept1" name="accept1" onchange="comprobarAccept(this);" required>
				 		<option value="aceptado" class="aceptado" <?php if($this->valores['ACCEPT1'] != 'aceptado') echo "disabled" ?>> Aceptado</option>
				 		<option value="denegado" class="denegado" <?php if($this->valores['ACCEPT1'] != 'denegado') echo "disabled" ?>>Denegado</option>				 		
				 	</select>

				 	<label class="errormsg acceptError" for="accept1" id="accept1_error" >Error en el estado de aceptacion </label>
				</div>&nbsp;&nbsp;

				<br><br>
				<label class="tituloStyle producto"></label><label class="tituloStyle"> 2</label><br><br>

				<div class="form-group">
				 	<label for="idProd2" class="tituloProducto">Titulo producto</label><label> 2</label>
				 	<br> 
				 	<input type="text" name="idProd2" id="idProd2" onblur="checkEquals(1,this)" value="<?php echo $this->valores['ID_PRODUCTO2'] ?>"   readonly><label> <?php echo $this->valores['TITULO2']; ?></label>
				 	<label class="errormsg idRepetidos" for="idProd2" id="idProd2_error" >Error en el producto </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="unidades2" class="horasUnidades">Horas</label>
				 	<br> 
				 	<input type="number" name="unidades2" id="unidades2" value="<?php echo $this->valores['UNIDADES2'] ?>" onblur="comprobarEntero(this);" readonly>
				 	<label class="errormsg noMayor" for="unidades2" id="unidades2_error" >Error en el producto </label>
				 	<label class="errormsg tooshort" for="unidades2" id="unidades2_errorLength" > Al menos un numero </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="accept2" class="accept2">Accept</label>
				 	<br> 
				 	<select id="accept2" name="accept2" onchange="comprobarAccept(this);" required>
				 		<option value="aceptado" class="aceptado" <?php if($this->valores['ACCEPT2'] != 'aceptado') echo "disabled" ?>> Aceptado</option>
				 		<option value="denegado" class="denegado" <?php if($this->valores['ACCEPT2'] != 'denegado') echo "disabled" ?>>Denegado</option>				 		
				 	</select>
				 	<label class="errormsg acceptError" for="accept2" id="accept2_error" >Error en el estado de aceptacion </label>
				</div>&nbsp;&nbsp;

				<button type="submit" name='action' class="btn btn-primary submit" value="DELETE" >
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