<?php

//Clase : PROF_TITULACION_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra los campos de las relaciones profesor-titulacion
//como cadenas de texto y se pueden editar, luego se actualizan en la base de datos
//-------------------------------------------------------
	class PROF_TITULACION_EDIT{

		var $values;
		var $nombre;
		var $nombreAux;
		var $codigo;
		var $codigoAux;


		function __construct($values,$nombre,$codigo){	
			session_start();
			include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';

			$this->values = $values;
			$this->nombre = $nombre->fetch_array();
			$this->nombreAux = $nombre;
			$this->codigo = $codigo->fetch_array();
			$this->codigoAux = $codigo;
			$this->render();
		}
		function render(){

			include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
		?>
			<head>
				<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
				<script type="text/javascript" src='../js/validaciones.js'></script>
				<title> <?php echo $strings['Tedit']; ?> </title>
			</head>  

			<?php include '../View/Header.php'; //header necesita los strings ?>

			<h1><?php echo $strings['editPROF_TIT']; ?></h1>	
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php?action=EDIT' method='post' onsubmit="return comprobarProfTitu(this);">

				<div class="form-group">
				 	<label for="DNI"><?php echo $strings['profName'] ?> </label>  
				 	<select name='DNI' required>

				 			<?php while ($this->nombre != null ){ ?>
    					<option value='<?php echo $this->nombre['DNI']; ?>'
    						<?php if ($this->values['DNI'] != $this->nombre['DNI']) echo 'disabled'; ?>>
    						 <?php  echo $this->nombre['NOMBREPROFESOR'] ." ". $this->nombre['APELLIDOSPROFESOR']; ?>
    					</option>

    						<?php $this->nombre= $this->nombreAux->fetch_array(); } ?>
					</select>
					<label class="errormsg" for="DNI" id="DNI_error" > <?php echo $strings['dniError'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="codTitulacion"><?php echo $strings['CODTITULACION'] ?> </label> 
				 	<select name='codTitulacion' required >
				 			<?php while ($this->codigo != null ){ ?>

    					<option value='<?php echo $this->codigo['CODTITULACION']; ?>'
    						<?php if ($this->values['CODTITULACION'] != $this->codigo['CODTITULACION']) echo 'disabled';?>
    						>
    						 <?php  echo $this->codigo['NOMBRETITULACION'] ; ?>
    					</option>

    						<?php $this->codigo= $this->codigoAux->fetch_array(); } ?>
						</select>
						<label class="errormsg" for="codTitulacion" id="codTitulacion_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="anhoAcademico"><?php echo $strings['ANHOACADEMICO'] ?> </label> 
				 	 <input class="form-control" type="text" name="anhoAcademico" id="anhoAcademico" value="<?php echo $this->values['ANHOACADEMICO'] ?>" placeholder = '2018-2019' onblur="comprobarAnho(this);" required >
				 	 <label class="errormsg" for="anhoAcademico" id="anhoAcademico_error" > <?php echo $strings['anhoError'] ?> </label>
				</div>&nbsp;&nbsp;

				<button type="submit" name='action' class="btn btn-primary" value="EDIT" >
					<?php echo $strings['submit'] ; ?>
				</button>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'> <?php echo $strings['Volver']; ?> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?> 