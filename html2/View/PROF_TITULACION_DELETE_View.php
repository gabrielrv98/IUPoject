<?php
//Clase : PROF_TITULACION_DELETE_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra los campos de la tupla antes de eliminarlo
//-------------------------------------------------------
	class PROF_TITULACION_DELETE{

		var $valores;
		var $nombre;
		var $nombreAux;
		var $codigo;
		var $codigoAux;


		function __construct($valores,$nombre,$codigo){	
			session_start();
			include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';

			$this->valores = $valores;
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
				<link rel="stylesheet" type="text/css" href="../css/estilo.css"> 
				<script type="text/javascript" src='../js/validaciones.js'></script>
				<title class="Tdelete"> <?php echo $strings['Tdelete']; ?> </title>
			</head> 

			<?php include '../View/Header.php'; //header necesita los strings ?>
			<h1 class="deletePROF_TIT"><?php echo $strings['deletePROF_TIT']; ?></h1>	
			<form name = 'Form' action='../Controller/PROF_TITULACION_Controller.php?action=DELETE' method='post'>

				 <div class="form-group">
				 	<label for="DNI" class="profName"><?php echo $strings['profName'] ?> </label>  
				 	<select name='DNI' readonly>

				 			<?php while ($this->nombre != null ){ ?>
    					<option value='<?php echo $this->nombre['DNI']; ?>'
    						<?php if ($this->valores['DNI'] != $this->nombre['DNI']) echo 'disabled'; ?>>
    						 <?php  echo $this->nombre['NOMBREPROFESOR'] ." ". $this->nombre['APELLIDOSPROFESOR']; ?>
    					</option>

    						<?php $this->nombre= $this->nombreAux->fetch_array(); } ?>
					</select>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="codTitulacion" class="CODTITULACION"><?php echo $strings['CODTITULACION'] ?> </label> 
				 	<select name='codTitulacion' readonly >
				 			<?php while ($this->codigo != null ){ ?>

    					<option value='<?php echo $this->codigo['CODTITULACION']; ?>'
    						<?php if ($this->valores['CODTITULACION'] != $this->codigo['CODTITULACION']) echo 'disabled';?>
    						>
    						 <?php  echo $this->codigo['NOMBRETITULACION'] ; ?>
    					</option>

    						<?php $this->codigo= $this->codigoAux->fetch_array(); } ?>
						</select>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="anhoAcademico" class="ANHOACADEMICO"><?php echo $strings['ANHOACADEMICO'] ?> </label> 
				 	 <input class="form-control" type="text" name="anhoAcademico" id="anhoAcademico" value="<?php echo $this->valores['ANHOACADEMICO'] ?>" placeholder = '2018-2019' onblur="comprobarAnho(this);" readonly >
				</div>&nbsp;&nbsp;

				<button type="submit" class="submit" name='action' class="btn btn-primary" value="DELETE" >
					<?php echo $strings['submit'] ; ?>
				</button>

			</form>
				
		
			<a href='../Controller/PROF_TITULACION_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>