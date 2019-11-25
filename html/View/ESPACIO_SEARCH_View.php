<?php
//Clase : ESPACIO_SEARCH_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra unos campos para ser rellenados y busca espacios que coincidan con esos datos
//-------------------------------------------------------
	class ESPACIO_SEARCH{

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
				<title><?php echo $strings['Tsearch']; ?></title>
			</head>

			<?php include '../View/Header.php'; //header necesita los strings ?>
			<h1><?php echo $strings['searchEspacio']; ?></h1>	
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php?action=SEARCH' method='post' onsubmit="return comprobarEspacioSearch(this);">

				<!-- Division buscar por codigo de espacio  -->
				 	<div class="form-group">
				 	<label for="espacio"><?php echo $strings['CodEspacio'] ?> </label>  
				 	<input class="form-control" type = 'text' name = 'espacio' id = 'espacio' placeholder = 'Letras y numeros' size = '10' onblur="comprobarAlfabetico(this,10);">
				 	<label class="errormsg" for="espacio" id="espacio_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp;

				<!-- Division buscar por codigo de edificio ( al usuario le aparece el nombre)  -->
				<div class="form-group">
				 	<label for="edificio"><?php echo $strings['NomEdificio'] ?> </label>  
				 	
				 	<select name="edificio" id="edificio">
				 			<option value=""> <?php echo $strings['mix'] ?> </option>
							<?php while ($this->edificios != null ){ ?>
				 		<option value="<?php echo $this->edificios['CODEDIFICIO']; ?>" >
				 			<?php echo $this->edificios['NOMBREEDIFICIO'] ; ?>
				 		</option>

				 			<?php $this->edificios = $this->edificiosAux->fetch_array(); } ?>
				 	</select>
				 	<label class="errormsg" for="edificio" id="edificio_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp;

				<!-- Division buscar por codigo de centro  ( al usuario le aparece el nombre) -->
				<div class="form-group">
				 	<label for="centro"><?php echo $strings['NomCentro'] ?> </label>  
				 	<select name="centro" id="centro">
				 						<option value=""> <?php echo $strings['noCenter'] ?> </option>
										<?php while ($this->centros != null ){ ?>
				 								<option value="<?php echo $this->centros['CODCENTRO']; ?>" >
				 									<?php echo $this->centros['NOMBRECENTRO'] ; ?>
				 								</option>

				 							<?php $this->centros = $this->centrosAux->fetch_array(); } ?>
				 						</select>
				 	 <label class="errormsg" for="centro" id="centro_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp;

				<!-- Division buscar por tipo -->
				<div class="form-group">
				 	<label for="tipo"><?php echo $strings['tipo'] ?> </label>  
				 	<select name="tipo">
				 		<option value=""> <?php echo $strings['mix'] ; ?> </option>
						<option value="DESPACHO"> <?php echo $strings['despacho'] ; ?> </option>
						<option value="LABORATORIO"> <?php echo $strings['laboratorio'] ; ?> </option>
						<option value="PAS"> PAS </option>
					</select>
				 	 <label class="errormsg" for="tipo" id="tipo_error" > <?php echo $strings['tipoError'] ?> </label>
				</div>&nbsp;&nbsp; 

				<!-- Division buscar por superficie -->
				<div class="form-group">
				 	<label for="superficie"><?php echo $strings['supEspacio'] ?> </label>  
				 	<input type = 'text' name = 'superficie' id = 'superficie' placeholder = 'Solo numeros' size = '4' onblur="   comprobarNum(this,4)">
				 	<label class="errormsg" for="superficie" id="superficie_error" > <?php echo $strings['numberError'] ?> </label>
				</div>&nbsp;&nbsp;

				<!-- Division buscar por nInventario -->
				<div class="form-group">
				 	<label for="nInventario"><?php echo $strings['nInventary'] ?> </label>  
				 	<input type = 'text' name = 'nInventario' id = 'nInventario' placeholder = 'Solo numeros' size = '8' onblur="   comprobarNum(this,8)">
				 	<label class="errormsg" for="nInventario" id="nInventario_error" > <?php echo $strings['numberError'] ?> </label>
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