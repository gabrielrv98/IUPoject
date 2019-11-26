<?php
//Clase : CENTRO_DELETE_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra los campos de la tupla antes de eliminarlo
//-------------------------------------------------------
	class CENTRO_DELETE{

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
				<title> <?php echo $strings['Tdelete']; ?> </title>
			</head> 

			<?php include '../View/Header.php'; //header necesita los strings ?>
			<h1><?php echo $strings['deleteCenter']; ?></h1>	
			<form name = 'Form' action='../Controller/CENTRO_Controller.php?action=DELETE' method='post'>

				 <div class="form-group">
				 	<label for="centro"><?php echo $strings['CodCentro'] ?> </label>  
				 	<input class="form-control" type = 'text' name = 'centro' id = 'centro' value = '<?php echo $this->valores['CODCENTRO']; ?>' placeholder = 'Letras y numeros' size = '10' onblur="comprobarAlfabetico(this,10);" readonly>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="edificio"><?php echo $strings['NomEdificio'] ?> </label>  
				 	 <input class="form-control" type = 'text' name = 'edificio' id = 'edificio' value = '<?php echo $this->valores['CODEDIFICIO']; ?>' placeholder = 'Letras y numeros' size = '10' readonly >
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="nombre"><?php echo $strings['NomCentro'] ?> </label>  
				 	<input class="form-control" type = 'text' name = 'nombre' id = 'nombre' value = '<?php echo $this->valores['NOMBRECENTRO']; ?>' placeholder = 'Solo letras' size = '50' onblur="comprobarTexto(this,50)" readonly>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="direccion"><?php echo $strings['DirCentro'] ?> </label>  
				 	<input class="form-control" type = 'text' name = 'direccion' id = 'direccion' value = '<?php echo $this->valores['DIRECCIONCENTRO']; ?>' placeholder = 'Letras y numeros' size = '50' value = '' onblur="comprobarAlfabetico(this,150)" readonly>
				</div>&nbsp;&nbsp; 
 
				<div class="form-group">
				 	<label for="responsable"><?php echo $strings['RespCentro'] ?> </label>  
				 	
				 	<input class="form-control" type = 'text' name = 'responsable' id = 'responsable' value = '<?php echo $this->valores['RESPONSABLECENTRO']; ?>' placeholder = 'Solo letras' size = '60' value = '' onblur="comprobarTexto(this,60)" readonly>
				</div>&nbsp;&nbsp; 
				
				<button type="submit" name='action' class="btn btn-primary" value="DELETE" >
					<?php echo $strings['submit'] ; ?>
				</button>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>