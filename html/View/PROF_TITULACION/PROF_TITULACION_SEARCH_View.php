<?php
//Clase : PROF_TITULACION_SEARCH_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra unos campos para ser rellenados y busca relaciones profesor-titulacion
//que coincidan con esos datos
//-------------------------------------------------------
	class PROF_TITULACION_SEARCH{

		var $nombre;
		var $nombreAux;
		var $codigo;
		var $codigoAux;


		function __construct($nombre,$codigo){	
			session_start();
			include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';

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
				<title><?php echo $strings['Tsearch']; ?></title>
			</head>

			<?php include '../View/Header.php'; //header necesita los strings ?>
			<h1><?php echo $strings['searchPROF_TIT']; ?></h1>	
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php?action=SEARCH' method='post' onsubmit="return comprobarProfTituSearch(this);">
				<!-- Division para buscar por DNI ( al usuario le aparecen los nombres) -->
				 <div class="form-group">
				 	<label for="DNI"><?php echo $strings['profName'] ?> </label>  
				 	<select name='DNI' >
				 		<option value=""><?php  echo $strings['empty']; ?> </option>
				 			<?php while ($this->nombre != null ){ ?>
    					<option value='<?php echo $this->nombre['DNI']; ?>'>
    						 <?php  echo $this->nombre['NOMBREPROFESOR'] ." ". $this->nombre['APELLIDOSPROFESOR']; ?>
    					</option>

    						<?php $this->nombre= $this->nombreAux->fetch_array(); } ?>
					</select>
					<label class="errormsg" for="DNI" id="DNI_error" > <?php echo $strings['dniError'] ?> </label>
				</div>&nbsp;&nbsp;

				<!-- Division para buscar Codigo de titulacion ( al usuario le aparecen los nombres) -->
				<div class="form-group">
				 	<label for="codTitulacion"><?php echo $strings['CODTITULACION'] ?> </label> 
				 	<select name='codTitulacion'  >
				 		<option value=""><?php  echo $strings['empty']; ?> </option>
				 			<?php while ($this->codigo != null ){ ?> 
    					<option value='<?php echo $this->codigo['CODTITULACION']; ?>'>
    						 <?php  echo $this->codigo['NOMBRETITULACION'] ; ?>
    					</option>

    						<?php $this->codigo= $this->codigoAux->fetch_array(); } ?>
						</select>
						<label class="errormsg" for="codTitulacion" id="codTitulacion_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp;

				<!-- Division para buscar por año academico -->
				<div class="form-group">
				 	<label for="anhoAcademico"><?php echo $strings['ANHOACADEMICO'] ?> </label> 
				 	 <input class="form-control" type="text" name="anhoAcademico" id="anhoAcademico" placeholder = '2018-2019' onblur="comprobarAnhoSearch(this);"  >
				 	 <label class="errormsg" for="anhoAcademico" id="anhoAcademico_error" > <?php echo $strings['anhoError'] ?> </label>
				</div>&nbsp;&nbsp;

				<button type="submit" name='action' class="btn btn-primary" value="SEARCH" >
					<?php echo $strings['submit'] ; ?>
				</button>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'> <?php echo $strings['Volver']; ?> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>