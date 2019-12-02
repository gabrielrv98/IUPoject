<?php
//Clase : PROF_ESPACIO_SEARCH_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra unos campos para ser rellenados y busca relacion profesor-espacio
//que coincidan con esos datos
//-------------------------------------------------------
	class PROF_ESPACIO_SEARCH{

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
				<title class="Tsearch"><?php echo $strings['Tsearch']; ?></title>
			</head>

			<?php include '../View/Header.php'; //header necesita los strings ?>
			<h1 class="searchPROF_TIT"><?php echo $strings['searchPROF_TIT']; ?></h1>	
			<form name = 'Form' action='../Controller/PROF_ESPACIO_Controller.php?action=SEARCH' method='post' onsubmit="return comprobarProf_EspacioSearch(this);">

 				<!-- Division buscar por dni ( al usuario le aparece el nombre)-->
				 <div class="form-group">
				 	<label for="DNI" class="profName"><?php echo $strings['profName'] ?> </label>  
				 	<select name='DNI' >
				 		<option value=""><?php  echo $strings['empty']; ?> </option>
				 			<?php while ($this->nombre != null ){ ?>
    					<option value='<?php echo $this->nombre['DNI']; ?>'>
    						 <?php  echo $this->nombre['NOMBREPROFESOR'] ." ". $this->nombre['APELLIDOSPROFESOR']; ?>
    					</option>

    						<?php $this->nombre= $this->nombreAux->fetch_array(); } ?>
					</select>
					<label class="errormsg dniError" for="DNI" id="DNI_error" > <?php echo $strings['dniError'] ?> </label>
				</div>&nbsp;&nbsp;

				<!-- Division buscar por codigo de espacio -->
				<div class="form-group">
				 	<label for="codESPACIO" class="CodEspacio"><?php echo $strings['CodEspacio'] ?> </label> 
				 	<select name='codESPACIO' >
				 				<option value=""><?php  echo $strings['empty']; ?> </option>
				 				<?php while ($this->codigo != null ){ ?>
    							<option value='<?php echo $this->codigo['CODESPACIO']; ?>'>
    							 <?php  echo $this->codigo['CODESPACIO'] ; ?>
    								
    							</option>

    							<?php $this->codigo= $this->codigoAux->fetch_array(); } ?>
    							
							</select>
					<label class="errormsg letrasynumeros" for="codESPACIO" id="codESPACIO_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp;

				<button type="submit" class="submit" name='action' class="btn btn-primary" value="SEARCH" >
					<?php echo $strings['submit'] ; ?>
				</button>

			</form>
				
		
			<a href='../Controller/PROF_ESPACIO_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>