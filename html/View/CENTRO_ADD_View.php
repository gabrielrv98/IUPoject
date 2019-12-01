<?php
//Clase : CENTRO_ADD_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra unos campos para ser rellenados y los manda por post al controlador
//-------------------------------------------------------
	class CENTRO_ADD{

		var $datos;
		var $datosAux;

		function __construct($datos){	
			session_start();

			$this->datos = $datos->fetch_array();
			$this->datosAux = $datos; 
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
			<h1 class="addCenter"><?php echo $strings['addCenter']; ?></h1>	
			<form name = 'Form' action='../Controller/CENTRO_Controller.php?action=ADD' method='post' onsubmit="return comprobarCentro(this);">

				<div class="form-group">
				 	<label class="CodCentro" for="centro"><?php echo $strings['CodCentro'] ?> </label>  
				 	<input class="form-control" type = 'text' name = 'centro' id = 'centro' placeholder = 'Letras y numeros' size = '10' onblur="comprobarAlfabetico(this,10);" required>
				 	<label class="errormsg letrasynumeros" for="centro" id="centro_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label class="NomEdificio" for="edificio"><?php echo $strings['NomEdificio'] ?> </label>  
				 	 <select name ='edificio' id='edificio' required>

				 			<?php while ($this->datos != null ){ ?>
				 		<option  value="<?php echo $this->datos['CODEDIFICIO']; ?>" >
				 			<?php echo $this->datos['NOMBREEDIFICIO']; ?>
				 		</option>

				 			<?php $this->datos = $this->datosAux->fetch_array(); } ?>
				 	</select>
				 	<label class="errormsg letrasynumeros" for="edificio" id="edificio_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="nombre" class="NomCentro"><?php echo $strings['NomCentro'] ?> </label>  
				 	<input class="form-control" type = 'text' name = 'nombre' id = 'nombre' placeholder = '<?php echo $strings['textonly'] ?>' size = '50' onblur="comprobarTexto(this,50)" required>
				 	<label class="errormsg textonly" for="nombre" id="nombre_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="direccion DirCentro"><?php echo $strings['DirCentro'] ?> </label>  
				 	<input class="form-control" type = 'text' name = 'direccion' id = 'direccion' placeholder = 'Letras y numeros' size = '50' value = '' onblur="comprobarAlfabetico(this,150)" required>
				 	<label class="errormsg letrasynumeros" for="direccion" id="direccion_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp; 
 
				<div class="form-group">
				 	<label for="responsable" class="RespCentro"><?php echo $strings['RespCentro'] ?> </label>  
				 	
				 	<input class="form-control" type = 'text' name = 'responsable' id = 'responsable' placeholder = 'Solo letras' size = '60' value = '' onblur="comprobarTexto(this,60)" required>
				 	<label class="errormsg textonly" for="responsable" id="responsable_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp; 
				
				<button type="submit" name='action' class="btn btn-primary" value="ADD" >
					<?php echo $strings['submit'] ; ?>
				</button>
			</form>
				
			<a href='../Controller/CENTRO_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>