<?php
//Clase : MENSAJES_ADD_View
//Creado el : 20-06-2020
//Creado por: grvidal
//Muestra unos campos para ser rellenados y los manda por post al controlador
//-------------------------------------------------------

	class MENSAJES_ADD{

		var $intercambios;
		var $usuario;

		// añadir variable que sea 1 o 2 para prod1 o 2
		function __construct($intercambios,$usuario){
			$this->intercambios = $intercambios;
			$this->usuario = $usuario;
			$this->render();
		}

		function render(){
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<title class="Tadd"> añadir</title>
		</head>
		
		<?php include '../View/Header.php'; //header necesita los strings ?>
			<h1 class="addMSG"></h1>	
			<form name = 'Form' action='../Controller/MENSAJES_Controller.php?action=ADD' method='post' onsubmit="return comprobarMensajes(this);" enctype="multipart/form-data">
				 	
				<div class="form-group">
				 	<label for="idInter" class="intercambios">Intercambio </label> 
				 	<br> 
				 	<select id="idInter" name="idInter" onchange="colocarUsuarios(this)" required>
				 		<?php 
				 		foreach ($this->intercambios as $inter) { // se recorren todos los intercambios
				 		 	?>
				 				 <option value="<?php echo $inter['ID'] ?>"><?php echo $inter['TITULO1']," <-> ",$inter['TITULO2']; ?></option>
				 				 	
				 		<?php } ?>
				 	</select>
				</div>&nbsp;&nbsp;

				
					<?php 

					if($this->usuario->isAdmin()){ // si es administrador se le da la opcion de elegir por quien habla

					
						$control = 0;
						 foreach ($this->intercambios as $inter) { // se recorren todos los intercambios  
						 	if($control == 0) $name = $inter['LOGIN1']; ?>

					<div class="form-group" id="<?php echo $inter['ID'] ?>" <?php if($control == 1) echo "style=\"position: absolute; margin-left: -10000px\"" ?> >
						<input type="checkbox" name="<?php echo $inter['ID'],"-id1"; ?>" id="<?php echo $inter['ID'],"-id1"; ?>" onchange="desactivarCheckBoxID(this);" checked="true" ><label id="<?php echo $inter['ID'],"-label1"; ?>"   ><?php echo $inter['LOGIN1']; ?></label><br>

					 	<input type="checkbox" name="<?php echo $inter['ID'],"-id2"; ?>" id="<?php echo $inter['ID'],"-id2"; ?>" onchange="desactivarCheckBoxID(this);"><label id="<?php echo $inter['ID'],"-label2"; ?>"  ><?php echo $inter['LOGIN2']; ?></label><br>
					</div>&nbsp;&nbsp;

						<?php $control = 1; } 

					} else {
						$name = $this->usuario->RellenaDatos()['LOGIN'];
					} ?>
				

				<div class="form-group">
					<label for="loginUser" class="usuario"> </label> 
				 	<br> 
				 	<input type="text" name="loginUser" id="loginUser" value="<?php echo $name ?>" size="1" readonly>
				</div>

				<div class="form-group">
					<label for="contenido" class="coment"> </label> 
				 	<br> 
				 	<textarea name="contenido" id="contenido" cols='80' rows='3' onblur="comprobarAlfabeticoEnter(this,200);" ></textarea> 
				 	<label class="errormsg letrasynumeros" for="contenido" id="contenido_error" > letras y numeros  </label>
				 	<label class="errormsg tooShortNoNum" for="contenido" id="contenido_errorLength" >demasiado corto sin numeros</label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="dia" class="fecha">Fecha</label>
				 	<input class="form-control" type = 'date' name = 'dia' id = 'dia' onblur="comprobarFechaNacimiento(this);" value="<?php echo date("Y-m-d") ?>" onkeydown="return false" <?php if (!$usuario->isAdmin()) echo "readonly"; ?> required>
				 	<label class="errormsg fechaNacimientoError" for="dia" id="dia_error" > fechaNacimientoError </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="hora" class="hora">Hora</label>
				 	<input class="form-control" type = 'time' name = 'hora' id = 'hora' onblur="comprobarHora(this);" value="<?php echo date("H:i") ?>" onkeydown="return false" <?php if (!$usuario->isAdmin()) echo "readonly"; ?> required>
				 	<label class="errormsg horaError" for="hora" id="hora_error" > error con la fecha </label><br>
				 	<?php if ($usuario->isAdmin()){ ?>
				 		<label class="timeHelp"></label>
				 	<?php } ?>
				 	
				</div>&nbsp;&nbsp;

				
				<button type="submit" name='action' class="btn btn-primary submit" value="ADD" >
					 submit 
				</button>

			</form>

			
			<a href='../Controller/MENSAJES_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
			<br><br>
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>