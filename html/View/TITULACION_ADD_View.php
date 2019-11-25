<?php
//Clase : TITULACION_ADD_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra unos campos para ser rellenados y los manda por post al controlador
//-------------------------------------------------------

	class TITULACION_ADD{


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
			<title> <?php echo $strings['Tadd']; ?></title>
		</head>
		<?php include '../View/Header.php'; //header necesita los strings ?>
			
			<h1><?php echo $strings['addTitulation']; ?></h1>	
			<form name = 'Form' action='../Controller/TITULACION_Controller.php?action=ADD' method='post' onsubmit=" return comprobarTitulacion(this); ">

				<div class="form-group">
				 	<label for="titulacion"><?php echo $strings['CODTITULACION'] ?> </label>  
				 	<input class="form-control" type = 'text' name = 'titulacion' id = 'titulacion' placeholder = 'letras y numeros' size = '10' onblur="comprobarAlfabetico(this,10);" required>
				 	<label class="errormsg" for="titulacion" id="titulacion_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="centro"><?php echo $strings['NomCentro'] ?> </label> 
				 	<select name="centro" id="centro" required>
										<?php while ($this->datos != null ){ ?>
				 								<option value="<?php echo $this->datos['CODCENTRO']; ?>" >
				 									<?php echo $this->datos['NOMBRECENTRO'] ; ?>
				 								</option>

				 							<?php $this->datos = $this->datosAux->fetch_array(); } ?>
				 	</select>
				 	<label class="errormsg" for="centro" id="centro_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="nameT"><?php echo $strings['nameTitulation'] ?>  </label> 
				 	<input class="form-control" type = 'text' name = 'nameT' id = 'nameT' placeholder = 'Solo letras' size = '20' onblur="comprobarTexto(this,50)" required >
				 	<label class="errormsg" for="nameT" id="nameT_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp;
 
 				<div class="form-group">
				 	<label for="responsable"><?php echo $strings['responsableTitulation'] ?>  </label>

				 	<input class="form-control" type = 'text' name = 'responsable' id = 'responsable' placeholder = 'Solo letras' size = '20' value = '' onblur="comprobarTexto(this,60)" required >
				 	<label class="errormsg" for="responsable" id="responsable_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp;

				<button type="submit" name='action' class="btn btn-primary" value="ADD" >
					<?php echo $strings['submit'] ; ?>
				</button>

			</form>
				
			
			<a href='../Controller/Index_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>