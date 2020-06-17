<?php
//Clase : PRODUCTOS_ADD_View
//Creado el : 2-06-2020
//Creado por: grvidal
//Muestra unos campos para ser rellenados y los manda por post al controlador
//-------------------------------------------------------

	class PRODUCTOS_ADD{

		var $categorias;

		function __construct($categorias){	
			$this->categorias = $categorias;
			$this->render();
		}

		function render(){ 
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<title class="Tadd"> <?php echo $strings['Tadd']; ?></title>
		</head>
		
		<?php include '../View/Header.php'; //header necesita los strings ?>
			<h1 class="addProducto"><?php echo $strings['addProducto']; ?></h1>	
			<form name = 'Form' action='../Controller/PRODUCTOS_Controller.php?action=ADD' method='post' onsubmit="return comprobarProductos(this);" enctype="multipart/form-data">
				 	
				<div class="form-group">
				 	<label for="titulo" class="tituloProducto"><?php echo $strings['tituloProducto'] ?> </label> 
				 	<br> 
				 	<input class="form-control" type = 'text' name = 'titulo' id = 'titulo' placeholder = 'Letras y numeros' size = '30' onblur="comprobarAlfabetico(this,50);" required>
				 	<label class="errormsg letrasynumeros" for="titulo" id="titulo_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				 	<label class="errormsg tooShortNoNum" for="titulo" id="titulo_errorLength" > <?php echo $strings['tooShortNoNum'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="descripcion" class="descripcionProducto"><?php echo $strings['descripcionProducto'] ?> </label>
				 	<br> 
				 	<textarea class="form-control" type = 'text' name = 'descripcion' id = 'descripcion' cols='100' rows='5' placeholder = 'letras y numeros' size = '50' value = '' onblur="comprobarAlfabeticoEnter(this,200)" rows="5" required ></textarea> 
				 	<label class="errormsg letrasynumeros" for="descripcion" id="descripcion_error" > <?php echo $strings['letrasynumeros'] ?>  </label>
				 	<label class="errormsg tooShortNoNum" for="descripcion" id="descripcion_errorLength" > <?php echo $strings['tooShortNoNum'] ?> </label>
				</div>&nbsp;

				<?php include_once '../Model/USUARIOS_Model.php';
					$usuario = new USUARIOS_Model($_SESSION['login'],'','','','','','','','','','','','','');//Recuperamos el usuario que esta 
					if($usuario->isAdmin()){ // si el usuario es administrador es le ofrece busqeuda por otros usuarios
						$usuariosProductos = $usuario->getUsuarios();
				?>

				<div class="form-group">
				 	<label for="vendedorDNI" class="persona"><?php echo $strings['persona'] ?>  </label>
				 	<select name="vendedorDNI" >
				 		<?php  foreach ($usuariosProductos as $key) { 
				 			$patata = $key; ?>
				 			<option value="<?php echo $key['DNI']; ?>" > <?php echo $key['NOMBRE'], "-",$key['APELLIDOS'] ; ?></option>

				 		<?php } ?>
						<option value="" class="yo" selected> <?php echo $strings['yo'] ; ?></option>
					</select>
					<label class="errormsg vendedorDNIError" for="vendedorDNI" id="vendedorDNI_error" > <?php echo $strings['vendedorDNIError'] ?> </label>
				</div>&nbsp;&nbsp;

				<?php } ?>

				<div class="form-group">
				 	<label for="foto" class="picture"><?php echo $strings['picture'] ?>  </label><br>
				 	<input type = 'file' name = 'foto' id = 'foto' onchange="comprobarExtension(this)">
				 	<label class="errormsg fotoError" for="foto" id="foto_error" > <?php echo $strings['fotoError'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
					<label class="categorias" style="font-size: 150%; text-decoration: underline;">Categorias</label><br><br>
					<?php foreach ($this->categorias as $key ) { ?>
					<label> <?php echo $key['NOMBRE_CATEGORIA']; ?> </label>
					<input type="checkbox" name="categorias[]" value="<?php echo $key['ID'] ?>" ><br>

					<?php } ?>
				</div><br>
				<button type="submit" name='action' class="btn btn-primary submit" value="ADD" >
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