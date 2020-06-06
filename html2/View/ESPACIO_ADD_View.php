<?php
//Clase : ESPACIO_ADD_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra unos campos para ser rellenados y los manda por post al controlador
//-------------------------------------------------------
	class ESPACIO_ADD{


		var $centros;//array con los nombres  y codigos de los edificios
		var $centrosAux; //array auxiliar que ayuda a recorer el array

		var $edificios;//array con los nombres  y codigos de los edificios
		var $edificiosAux; //array auxiliar que ayuda a recorer el array
		


		function __construct($centros,$edificios){	
			session_start();

			//creo el array de centros y un auxiliar para recorrerlo mas facilmente
			$this->centros = $centros->fetch_array();
			$this->centrosAux = $centros; 

			$this->edificios = $edificios->fetch_array();
			$this->edificiosAux = $edificios;
			$this->render();
		}

		function render(){

			include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<script type="text/javascript" src='../js/validaciones.js'></script>
			<title class="Tadd"> <?php echo $strings['Tadd']; ?></title>
		</head>
		<?php include '../View/Header.php'; //header necesita los strings ?>

			<h1 class="addEspacio"><?php echo $strings['addEspacio']; ?></h1>	
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php?action=ADD' method='post' onsubmit="return comprobarEspacio(this);">

				<div class="form-group">
				 	<label for="espacio" class="CodEspacio"><?php echo $strings['CodEspacio'] ?> </label>  
				 	<input class="form-control" type = 'text' name = 'espacio' id = 'espacio' placeholder = 'Letras y numeros' size = '10' onblur="comprobarAlfabetico(this,10);" required>
				 	<label class="errormsg letrasynumeros" for="espacio" id="espacio_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="edificio" class="NomEdificio"><?php echo $strings['NomEdificio'] ?> </label>  
				 	
				 	<select name="edificio" id="edificio" required>
							<?php while ($this->edificios != null ){ ?>
				 		<option value="<?php echo $this->edificios['CODEDIFICIO']; ?>" >
				 			<?php echo $this->edificios['NOMBREEDIFICIO'] ; ?>
				 		</option>

				 			<?php $this->edificios = $this->edificiosAux->fetch_array(); } ?>
				 	</select>
				 	<label class="errormsg letrasynumeros" for="edificio" id="edificio_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="centro" class="NomCentro"><?php echo $strings['NomCentro'] ?> </label>  
				 	<select name="centro" id="centro" >
				 						<option value=""> <?php echo $strings['noCenter'] ?> </option>
										<?php while ($this->centros != null ){ ?>
				 								<option value="<?php echo $this->centros['CODCENTRO']; ?>" >
				 									<?php echo $this->centros['NOMBRECENTRO'] ; ?>
				 								</option>

				 							<?php $this->centros = $this->centrosAux->fetch_array(); } ?>
				 						</select>
				 	<label class="errormsg letrasynumeros" for="centro" id="centro_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="tipo" class="tipo"><?php echo $strings['tipo'] ?> </label>  
				 	<select name="tipo" required>
						<option value="DESPACHO"> <?php echo $strings['despacho'] ; ?> </option>
						<option value="LABORATORIO"> <?php echo $strings['laboratorio'] ; ?> </option>
						<option value="PAS"> PAS </option>
					</select>
					<label class="errormsg tipoError" for="tipo" id="tipo_error" > <?php echo $strings['tipoError'] ?> </label>
				</div>&nbsp;&nbsp; 

				<div class="form-group">
				 	<label for="superficie" class="supEspacio"><?php echo $strings['supEspacio'] ?> </label>  
				 	<input type = 'text' name = 'superficie' id = 'superficie' placeholder = 'Solo numeros' size = '4' onblur="   comprobarNum(this,4)" required>
				 	<label class="errormsg numberError" for="superficie" id="superficie_error" > <?php echo $strings['numberError'] ?>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="nInventario" class="nInventary"><?php echo $strings['nInventary'] ?> </label>  
				 	<input type = 'text' name = 'nInventario' id = 'nInventario' placeholder = 'Solo numeros' size = '8' onblur="   comprobarNum(this,8)" required>
				 	<label class="errormsg numberError" for="nInventario" id="nInventario_error" > <?php echo $strings['numberError'] ?> 
				 </label>
				</div>&nbsp;&nbsp;


				<button type="submit" name='action' class="btn btn-primary" value="ADD" >
					<?php echo $strings['submit'] ; ?>
				</button>
			</form>
				
		
			<a href='../Controller/ESPACIO_Controller.php'> <img src="../View/icon/back.ico" height="32" width="32"> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>