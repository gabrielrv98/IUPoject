<?php
//Clase : TITULACION_EDIT_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra los campos de las titulaciones como cadenas de texto
// y se pueden editar, luego se actualizan en la base de datos
//-------------------------------------------------------

	class TITULACION_EDIT{

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
				<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
				<script type="text/javascript" src='../js/validaciones.js'></script>
				<title> <?php echo $strings['Tedit']; ?> </title>
			</head> 
			<?php include '../View/Header.php'; //header necesita los strings ?>


			<h1><?php echo $strings['editTitulation']; ?></h1>	
			<form name = 'Form' action='../Controller/TITULACION_Controller.php?action=EDIT' method='post' onsubmit="return comprobarTitulacion(this);">

				<div class="form-group">
				 	<label for="titulacion"><?php echo $strings['CODTITULACION'] ?> </label>  
				 	<input class="form-control" type = 'text' name = 'titulacion' id = 'titulacion' value = '<?php echo $this->valores['CODTITULACION']; ?>' placeholder = 'letras y numeros' size = '10' onblur="comprobarAlfabetico(this,10);" readonly>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="centro"><?php echo $strings['NomCentro'] ?> </label> 
				 	<input type = 'text' name = 'centro' id = 'centro' placeholder = 'Letras y numeros' size = '10' value = '<?php echo $this->valores['CODCENTRO']; ?>' onblur="comprobarAlfabetico(this,10);" readonly>
				 	<label class="errormsg" for="centro" id="centro_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="nameT"><?php echo $strings['nameTitulation'] ?>  </label> 
				 	<input class="form-control" type = 'text' name = 'nameT' id = 'nameT' value = '<?php echo $this->valores['NOMBRETITULACION']; ?>' placeholder = 'Solo letras' size = '20' onblur="comprobarTexto(this,50)" required >
				 	<label class="errormsg" for="nameT" id="nameT_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp;
 
 				<div class="form-group">
				 	<label for="responsable"><?php echo $strings['responsableTitulation'] ?>  </label>

				 	<input class="form-control" type = 'text' name = 'responsable' id = 'responsable' value = '<?php echo $this->valores['RESPONSABLETITULACION']; ?>' placeholder = 'Solo letras' size = '20' value = '' onblur="comprobarTexto(this,60)" required >
				 	<label class="errormsg" for="responsable" id="responsable_error" > <?php echo $strings['textonly'] ?> </label>
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