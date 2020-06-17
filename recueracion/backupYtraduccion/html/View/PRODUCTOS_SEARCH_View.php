<?php
//Clase : PRODUCTOS_ADD_View
//Creado el : 3-06-2020
//Creado por: grvidal
//Muestra unos campos para ser rellenados y los manda por post al controlador
//-------------------------------------------------------

	class PRODUCTOS_SEARCH{


		function __construct(){	
			//session_start();
			$this->render();
		}

		function render(){
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<title class="Tsearch"> Buscar</title>
		</head>
		
		<?php include '../View/Header.php'; //header necesita los strings 
			include_once '../Model/USUARIOS_Model.php';
					$usuario = new USUARIOS_Model($_SESSION['login'],'','','','','','','','','','','','','');//Recuperamos el usuario que esta operando
					$usuariosProductos = $usuario->getUsuariosConProductos();//recuperamos los nombres de las personas con productos en oferta?>
			<h1 class="searchProducto"></h1>	
			<form name = 'Form' action='../Controller/PRODUCTOS_Controller.php?action=SEARCH' method='post' onsubmit="return comprobarProductoSearch(this);" enctype="multipart/form-data">
				 	
				<div class="form-group">
				 	<label for="titulo" class="tituloProducto"><?php echo $strings['tituloProducto'] ?> </label> 
				 	<br> 
				 	<input class="form-control" type = 'text' name = 'titulo' id = 'titulo' placeholder = 'Letras y numeros' size = '30' onblur="comprobarAlfabeticoVacio(this,50);">
				 	<label class="errormsg letrasynumeros" for="titulo" id="titulo_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				 	<label class="errormsg tooShortNoNum" for="titulo" id="titulo_errorLength" > <?php echo $strings['tooShortNoNum'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="vendedorDNI" class="persona"><?php echo $strings['persona'] ?>  </label>
				 	<select name="vendedorDNI" >
				 		<?php  foreach ($usuariosProductos as $key) { 
				 			$patata = $key; ?>
				 			<option value="<?php echo $key['DNI']; ?>" > <?php echo $key['NOMBRE'], "-",$key['APELLIDOS'] ; ?></option>

				 		<?php } ?>
						<option value="" class="mix" selected> <?php echo $strings['mix'] ; ?></option>
					</select>
					<label class="errormsg vendedorDNIError" for="vendedorDNI" id="vendedorDNI_error" > <?php echo $strings['vendedorDNIError'] ?> </label>
				</div>&nbsp;&nbsp;
				<?php 
					if($usuario->isAdmin()){ // si el usuario es administrador es le ofrece busqeuda por otros usuarios
				?>

				

				<div class="form-group">
				 	<label for="estado" class="disponibilidad">Disponibilidad </label>
				 	<select name="estado" >
						<option value="" class="indiferente" selected> <?php echo $strings['indiferente'] ; ?></option>
						<option value="tramite" class="tramite" > <?php echo $strings['tramite'] ; ?></option>
						<option value="vendido" class="vendido" > <?php echo $strings['vendido'] ; ?></option>
					</select>
					<label class="errormsg estadoError" for="estado" id="estado_error" > <?php echo $strings['estadoError'] ?> </label>
				</div>&nbsp;&nbsp;

			<?php }  ?>

				<div class="form-group">
				 	<label for="descripcion" class="descripcionProducto"><?php echo $strings['descripcionProducto'] ?> </label>
				 	<br> 
				 	<textarea class="form-control" type = 'text' name = 'descripcion' id = 'descripcion' cols='100' rows='5' placeholder = 'letras y numeros' size = '50' value = '' onblur="comprobarAlfabeticoVacio(this,200)" rows="5" ></textarea> 
				 	<label class="errormsg letrasynumeros" for="descripcion" id="descripcion_error" > <?php echo $strings['letrasynumeros'] ?>  </label>
				 	<label class="errormsg tooShortNoNum" for="descripcion" id="descripcion_errorLength" > <?php echo $strings['tooShortNoNum'] ?> </label>
				</div>&nbsp;

				<button type="submit" name='action' class="btn btn-primary submit" value="SEARCH" >
					<?php echo $strings['submit'] ; ?>
				</button>

			</form>

			
			<a href='../Controller/PRODUCTOS_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
			<br><br>
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>