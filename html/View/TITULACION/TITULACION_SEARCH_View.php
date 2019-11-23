<?php
//Clase : TITULACION_SEARCH_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra unos campos para ser rellenados y busca titulaciones que coincidan con esos datos
//-------------------------------------------------------
	class TITULACION_SEARCH{

		var $lista;
		var $datos;

		function __construct($datos){	
			session_start();
			$this->lista = $datos->fetch_array();
			$this->datos = $datos; 
			$this->render();
		}

		function render(){

			include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<script type="text/javascript" src='../js/validaciones.js'></script>
			<title> <?php echo $strings['Tsearch']; ?></title>
		</head>
		<?php include '../View/Header.php'; //header necesita los strings ?>

			<h1><?php echo $strings['searchTitulation']; ?></h1>	
			<form name = 'Form' action='../Controller/TITULACION_Controller.php?action=SEARCH' method='post' onsubmit="return comprobarTitulacionSearch(this);">

				<div class="form-group">
				 	<label for="titulacion"><?php echo $strings['CODTITULACION'] ?> </label>  
				 	<input class="form-control" type = 'text' name = 'titulacion' id = 'titulacion' placeholder = 'letras y numeros' size = '10' onblur="comprobarAlfabetico(this,10);">
				 	<label class="errormsg" for="titulacion" id="titulacion_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="centro"><?php echo $strings['NomCentro'] ?> </label> 
				 	<select name="centro" id="centro">
				 								<option value="">
				 									<?php echo $strings['empty'] ; ?>
				 								</option>
										<?php while ($this->lista != null ){ ?>
				 								<option value="<?php echo $this->lista['CODCENTRO']; ?>" >
				 									<?php echo $this->lista['NOMBRECENTRO'] ; ?>
				 								</option>

				 							<?php $this->lista = $this->datos->fetch_array(); } ?>
				 	</select>
				 	<label class="errormsg" for="centro" id="centro_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="nameT"><?php echo $strings['nameTitulation'] ?>  </label> 
				 	<input class="form-control" type = 'text' name = 'nameT' id = 'nameT' placeholder = 'Solo letras' size = '20' onblur="comprobarTexto(this,50)" >
				 	<label class="errormsg" for="nameT" id="nameT_error" > <?php echo $strings['textonly'] ?> </label>
				</div>&nbsp;&nbsp;
 
 				<div class="form-group">
				 	<label for="responsable"><?php echo $strings['responsableTitulation'] ?>  </label>

				 	<input class="form-control" type = 'text' name = 'responsable' id = 'responsable' placeholder = 'Solo letras' size = '20' value = '' onblur="comprobarTexto(this,60)" >
				 	<label class="errormsg" for="responsable" id="responsable_error" > <?php echo $strings['textonly'] ?> </label>
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