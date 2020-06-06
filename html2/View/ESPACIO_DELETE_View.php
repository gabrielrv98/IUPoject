<?php
//Clase : ESPACIO_DELETE_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra los campos de la tupla antes de eliminarlo
//-------------------------------------------------------
	class ESPACIO_DELETE{

		var $valores;

		function __construct($valores){	
			session_start();
			$this->valores = $valores;
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
			<h1 class="deleteEspacio"><?php echo $strings['deleteEspacio']; ?></h1>	
			<form name = 'Form' action='../Controller/ESPACIO_Controller.php?action=DELETE' method='post'>

				 	<div class="form-group">
				 	<label for="espacio" class="CodEspacio"><?php echo $strings['CodEspacio'] ?> </label>  
				 	<input class="form-control" type = 'text' name = 'espacio' id = 'espacio' value = '<?php echo $this->valores['CODESPACIO']; ?>'  size = '10' onblur="comprobarAlfabetico(this,10);" readonly>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="edificio" class="NomEdificio"> <?php echo $strings['NomEdificio'] ?> </label>  
				 	
				 	<input type = 'text' name = 'edificio' id = 'edificio'  size = '10' value = '<?php echo $this->valores['CODEDIFICIO']; ?>' readonly>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="centro" class="CodCentro"><?php echo $strings['CodCentro'] ?> </label>  
				 	<input type = 'text' name = 'centro' id = 'centro'  size = '10' value = '<?php echo $this->valores['CODCENTRO']; ?>' readonly>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="tipo" class="tipo"><?php echo $strings['tipo'] ?> </label>  
				 	<select name="tipo" >
						<option value="DESPACHO"
						<?php // si en la variable TIPO habia DESPACHO la opcion se marca como preseleccionada 
							if($this->valores['TIPO'] != 'DESPACHO' ) echo 'disabled'; ?>>
							 <?php echo $strings['despacho'] ; ?> </option>
						<option value="LABORATORIO"
						<?php // si en la variable TIPO habia LABORATORIO la opcion se marca como preseleccionada 
							if($this->valores['TIPO'] != 'LABORATORIO' ) echo 'disabled'; ?>>
							 <?php echo $strings['laboratorio'] ; ?> </option>
						<option value="PAS"
						<?php // si en la variable TIPO habia PAS la opcion se marca como preseleccionada 
							if($this->valores['TIPO'] != 'PAS' ) echo 'disabled'; ?> > PAS </option>
					</select>
				</div>&nbsp;&nbsp; 

				<div class="form-group">
				 	<label for="superficie" class="supEspacio"><?php echo $strings['supEspacio'] ?> </label>  
				 	<input type = 'text' name = 'superficie' id = 'superficie' value = '<?php echo $this->valores['SUPERFICIEESPACIO']; ?>' placeholder = 'Solo numeros' size = '4' onblur="   comprobarNum(this,4)" readonly>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="nInventario" class="nInventary"><?php echo $strings['nInventary'] ?> </label>  
				 	<input type = 'text' name = 'nInventario' id = 'nInventario' value = '<?php echo $this->valores['NUMINVENTARIOESPACIO']; ?>' placeholder = 'Solo numeros' size = '8' onblur="   comprobarNum(this,8)" readonly>
				</div>&nbsp;&nbsp;

				<button type="submit" name='action' class="btn btn-primary" value="DELETE" >
					<?php echo $strings['submit'] ; ?>
				</button>

			</form>
				
		
			<a href='../Controller/ESPACIO_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>