<?php
//Clase : CATEGORIAS_EDIT_View
//Creado el : 8-06-2020
//Creado por: grvidal
//Muestra unos campos para ser rellenados y los manda por post al controlador
//-------------------------------------------------------

	class CATEGORIAS_EDIT{


		var $valores;

		function __construct($valores){	
			//session_start();
			$this->valores = $valores;
			$this->render();
		}

		function render(){
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<title class="Tedit"> <?php echo $strings['Tedit']; ?></title>
		</head>
		
		<?php include '../View/Header.php'; //header necesita los strings ?>
			<h1 class="editCategoria"></h1>	
			<form name = 'Form' action='../Controller/CATEGORIAS_Controller.php?action=EDIT' method='post' onsubmit="return comprobarCategoria(this);" enctype="multipart/form-data">

				<div class="form-group">
				 	<label for="id" class="idCategoria"><?php echo $strings['idCategoria'] ?> </label> 
				 	<br> 
				 	<input class="form-control" type = 'text' name = 'id' id = 'id' value="<?php echo $this->valores['ID'] ;?>" readonly>
				</div>&nbsp;&nbsp;
				 	
				<div class="form-group">
				 	<label for="nombre" class="nombreCategoria"><?php echo $strings['nombreCategoria'] ?> </label> 
				 	<br> 
				 	<input class="form-control" type = 'text' name = 'nombre' id = 'nombre' placeholder = 'Letras y numeros' size = '30' onblur="comprobarAlfabetico(this,50);" value="<?php echo $this->valores['NOMBRE_CATEGORIA'] ;?>" required>
				 	<label class="errormsg letrasynumeros" for="nombre" id="nombre_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				 	<label class="errormsg tooShortNoNum" for="nombre" id="nombre_errorLength" > <?php echo $strings['tooShortNoNum'] ?> </label>
				</div>&nbsp;&nbsp;
				
				<button type="submit" name='action' class="btn btn-primary submit" value="EDIT" >
					<?php echo $strings['submit'] ; ?>
				</button>

			</form>

			
			<a href='../Controller/CATEGORIAS_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
			<br><br>
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>