<?php

//Clase : ESPACIOS_EDIT_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra los campos de los espacios como cadenas de texto
// y se pueden editar, luego se actualizan en la base de datos
//-------------------------------------------------------
	class ESPACIO_EDIT{

		var $valores;
		var $centros;
		var $centrosAux;

		function __construct($valores,$centros){	
			session_start();
			$this->valores = $valores;
			//creo el array de centros y un auxiliar para recorrerlo mas facilmente
			$this->centros = $centros->fetch_array();
			$this->centrosAux = $centros;
			$this->render();
		}

		function render(){

			include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
		?>
			<head>
				<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
				<script type="text/javascript" src='../js/validaciones.js'></script>
				<title class="Tedit"> <?php echo $strings['Tedit']; ?> </title>
			</head> 
			<?php include '../View/Header.php'; //header necesita los strings ?>

			<h1 class="editTitulation"><?php echo $strings['editTitulation']; ?></h1>	
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php?action=EDIT' method='post' onsubmit="return comprobarEspacio(this);">

				<div class="form-group">
				 	<label for="espacio" class="CodEspacio"><?php echo $strings['CodEspacio'] ?> </label>  
				 	<input class="form-control" type = 'text' name = 'espacio' id = 'espacio' value = '<?php echo $this->valores['CODESPACIO']; ?>' placeholder = 'Letras y numeros' size = '10' onblur="comprobarAlfabetico(this,10);" readonly>
				 	<label class="errormsg letrasynumeros" for="espacio" id="espacio_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="edificio" class="NomEdificio"> <?php echo $strings['NomEdificio'] ?> </label>  
				 	
				 	<input type = 'text' name = 'edificio' id = 'edificio' placeholder = 'Letras y numeros' size = '10' value = '<?php echo $this->valores['CODEDIFICIO']; ?>' readonly>
				 	<label class="errormsg letrasynumeros" for="edificio" id="edificio_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="centro" class="NomCentro"><?php echo $strings['NomCentro'] ?> </label>  
				 	<select name="centro" id="centro">
				 	<option value=""> <?php echo $strings['noCenter'] ?> </option>
							<?php while ($this->centros != null ){ ?>
				 		<option value="<?php echo $this->centros['CODCENTRO']; ?>" 
				 			<?php if ($this->valores['CODCENTRO'] == $this->centros['CODCENTRO']) echo 'selected'; ?>>
				 				<?php echo $this->centros['NOMBRECENTRO'] ; ?>
				 		</option>

				 		<?php $this->centros = $this->centrosAux->fetch_array(); } ?>
				 	</select>
				 	<label class="errormsg letrasynumeros" for="centro" id="centro_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="tipo" class="tipo"><?php echo $strings['tipo'] ?> </label>  
				 	<select name="tipo" required>
						<option value="DESPACHO"
						<?php // si en la variable TIPO habia DESPACHO la opcion se marca como preseleccionada 
							if($this->valores['TIPO'] == 'DESPACHO' ) echo 'selected'; ?>>
							 <?php echo $strings['despacho'] ; ?> </option>
						<option value="LABORATORIO"
						<?php // si en la variable TIPO habia LABORATORIO la opcion se marca como preseleccionada 
							if($this->valores['TIPO'] == 'LABORATORIO' ) echo 'selected'; ?>>
							 <?php echo $strings['laboratorio'] ; ?> </option>
						<option value="PAS"
						<?php // si en la variable TIPO habia PAS la opcion se marca como preseleccionada 
							if($this->valores['TIPO'] == 'PAS' ) echo 'selected'; ?> > PAS </option>
					</select>
					<label class="errormsg tipoError" for="tipo" id="tipo_error" > <?php echo $strings['tipoError'] ?> </label>
				</div>&nbsp;&nbsp; 

				<div class="form-group">
				 	<label for="superficie" class="supEspacio"><?php echo $strings['supEspacio'] ?> </label>  
				 	<input type = 'text' name = 'superficie' id = 'superficie' value = '<?php echo $this->valores['SUPERFICIEESPACIO']; ?>' placeholder = 'Solo numeros' size = '4' onblur="   comprobarNum(this,4)" required>
				 	<label class="errormsg numberError" for="superficie" id="superficie_error" > <?php echo $strings['numberError'] ?>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="nInventario" class="nInventary"><?php echo $strings['nInventary'] ?> </label>  
				 	<input type = 'text' name = 'nInventario' id = 'nInventario' value = '<?php echo $this->valores['NUMINVENTARIOESPACIO']; ?>' placeholder = 'Solo numeros' size = '8' onblur="   comprobarNum(this,8)" required>
				 	<label class="errormsg numberError" for="nInventario" id="nInventario_error" > <?php echo $strings['numberError'] ?> 
				 </label>
				</div>&nbsp;&nbsp;

				<button type="submit" name='action' class="btn btn-primary" value="EDIT" >
					<?php echo $strings['submit'] ; ?>
				</button>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'> <img src="../View/icon/back.ico" height="32" width="32"> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?> 