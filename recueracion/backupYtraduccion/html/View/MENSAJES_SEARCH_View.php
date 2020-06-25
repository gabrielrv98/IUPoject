<?php
//Clase : MENSAJES_SEARCH_View
//Creado el : 21-06-2020
//Creado por: grvidal
//Muestra unos campos para ser rellenados y los manda por post al controlador
//-------------------------------------------------------

	class MENSAJES_SEARCH{

		var $intercambios;
		function __construct($intercambios){	
			$this->intercambios = $intercambios ;
			$this->render();
		}

		function render(){ 
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<title class="Tsearch"> Buscar</title>
		</head>
		
		<?php include '../View/Header.php'; //header necesita los strings ?>
			<h1 class="searchProducto"></h1>	
			<form name = 'Form' action='../Controller/MENSAJES_Controller.php?action=SEARCH' method='post' onsubmit="return comprobarCategoriasSearch(this);" enctype="multipart/form-data">
				 	
				<div class="form-group">
				 	<label for="idInter" class="intercambios">Intercambio </label> 
				 	<br> 
				 	<select id="idInter" name="idInter" onchange="colocarUsuarios(this)" required>
				 		<?php 
				 		foreach ($this->intercambios as $inter) { // se recorren todos los intercambios
				 		 	?>
				 				 <option value="<?php echo $inter['ID'] ?>"><?php echo $inter['TITULO1']," <-> ",$inter['TITULO2']; ?></option>
				 				 	
				 		<?php } ?>
				 		 <option value="" class="indiferente"></option>
				 	</select>
				</div>&nbsp;&nbsp;

				<?php 
						$control = 0;
						 foreach ($this->intercambios as $inter) { // se recorren todos los intercambios  
						 	if($control == 0) $name = $inter['LOGIN1']; ?>

				<div class="form-group" id="<?php echo $inter['ID'] ?>" <?php if($control == 1) echo "style=\"position: absolute; margin-left: -10000px\"" ?> >
					<input type="checkbox" name="<?php echo $inter['ID'],"-id1"; ?>" id="<?php echo $inter['ID'],"-id1"; ?>" onchange="desactivarCheckBoxID(this);" checked="true" ><label id="<?php echo $inter['ID'],"-label1"; ?>"   ><?php echo $inter['LOGIN1']; ?></label><br>

					 <input type="checkbox" name="<?php echo $inter['ID'],"-id2"; ?>" id="<?php echo $inter['ID'],"-id2"; ?>" onchange="desactivarCheckBoxID(this);"><label id="<?php echo $inter['ID'],"-label2"; ?>"  ><?php echo $inter['LOGIN2']; ?></label><br>
				</div>&nbsp;&nbsp;

				<?php $control = 1; }  ?>

				<div class="form-group" >

					 <input type="checkbox" name="" id="" value="" onchange="desactivarCheckBoxIndiferente(this);"><label class="indiferente"  ></label><br>
				</div>&nbsp;&nbsp;

				<div class="form-group">
					<label for="loginUser" class="usuario"> </label> 
				 	<br> 
				 	<input type="text" name="loginUser" id="loginUser" value="<?php echo $name ?>" size="1" >
				</div>


				<div class="form-group">
					<label for="contenido" class="coment"> </label> 
				 	<br> 
				 	<textarea name="contenido" id="contenido" cols='80' rows='3' onblur="comprobarAlfabeticoEnter(this,200);" ></textarea> 
				 	<label class="errormsg letrasynumeros" for="contenido" id="contenido_error" > letras y numeros  </label>
				 	<label class="errormsg tooShortNoNum" for="contenido" id="contenido_errorLength" >demasiado corto sin numeros</label>
				</div>&nbsp;&nbsp;

				<label class="fechaSearchAdvice tituloStyle">Advertencia</label><br><br>

				<div class="form-group">
				 	<label for="dia" class="fecha">Fecha</label>
				 	<input class="form-control" type = 'date' name = 'dia' id = 'dia' onblur="comprobarFechaNacimiento(this);"  onkeydown="return false" >
				 	<label class="errormsg fechaNacimientoError" for="dia" id="dia_error" > fechaNacimientoError </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="hora" class="hora">Hora</label>
				 	<input class="form-control" type = 'time' name = 'hora' id = 'hora' onblur="comprobarHora(this);"  onkeydown="return false" >
				 	<label class="errormsg horaError" for="hora" id="hora_error" > error con la fecha </label><br>
				 		<label class="timeHelp"></label>				 	
				</div>&nbsp;&nbsp;


				<button type="submit" name='action' class="btn btn-primary submit" value="SEARCH" >
					<?php echo $strings['submit'] ; ?>
				</button>

			</form>

			
			<a href='../Controller/MENSAJES_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
			<br><br>
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>