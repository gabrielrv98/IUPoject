<?php
//Clase : PRODUCTOS_ADD_View
//Creado el : 2-06-2020
//Creado por: grvidal
//Muestra el formulario de añadir un producto, que consta de el nombre, descripcion, foto, unidades y categorias, y los manda por post a CATEGORIAS_CONTROLLER con el action ADD
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
			<title class="Tadd">  Tadd </title>
		</head>
		
		<?php include '../View/Header.php'; //header necesita los strings ?>
			<h1 class="addProducto">Añadir producto</h1>	
			<form name = 'Form' action='../Controller/PRODUCTOS_Controller.php?action=ADD' method='post' onsubmit="return comprobarProductos(this);" enctype="multipart/form-data">
				 	
				<div class="form-group">
				 	<label for="titulo" class="tituloProducto">tituloProducto </label> 
				 	<br> 
				 	<input class="form-control" type = 'text' name = 'titulo' id = 'titulo' placeholder = 'Letras y numeros' size = '30' onblur="comprobarAlfabetico(this,50);" required>
				 	<label class="errormsg letrasynumeros" for="titulo" id="titulo_error" >  letrasynumeros  </label>
				 	<label class="errormsg tooShortNoNum" for="titulo" id="titulo_errorLength" >  tooShortNoNum </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="descripcion" class="descripcionProducto"> descripcionProducto  </label>
				 	<br> 
				 	<textarea class="form-control" type = 'text' name = 'descripcion' id = 'descripcion' cols='100' rows='5' placeholder = 'letras y numeros' size = '50' value = '' onblur="comprobarAlfabeticoEnter(this,200);" rows="5" required ></textarea> 
				 	<label class="errormsg letrasynumeros" for="descripcion" id="descripcion_error" >  letrasynumeros  </label>
				 	<label class="errormsg tooShortNoNum" for="descripcion" id="descripcion_errorLength" >  tooShortNoNum  </label>
				</div>&nbsp;

				<?php include_once '../Model/USUARIOS_Model.php';
					$usuario = new USUARIOS_Model($_SESSION['login'],'','','','','','','','','','','','','');//Recuperamos el usuario que esta 
					if($usuario->isAdmin()){ // si el usuario es administrador es le ofrece busqeuda por otros usuarios
						$usuariosProductos = $usuario->getUsuarios();
				?>

				<div class="form-group">
				 	<label for="vendedorDNI" class="persona"> persona   </label>
				 	<select name="vendedorDNI" >
				 		<?php  foreach ($usuariosProductos as $key) { ?>
				 			<option value="<?php echo $key['DNI']; ?>" > <?php echo $key['NOMBRE'], "-",$key['APELLIDOS'] ; ?></option>

				 		<?php } ?>
						<option value="" class="yo" selected> Yo</option>
					</select>
					<label class="errormsg vendedorDNIError" for="vendedorDNI" id="vendedorDNI_error" > Error en vendedor dni </label>
				</div>&nbsp;&nbsp;

				<?php } ?>

				<div class="form-group">
					<label class="origen" for="origen">Origen</label>
					<select name="origen" onchange="comprobarOrigen(this);" required>
				 			<option value="fabricado_a_mano" class="fabricado_a_mano"> Fabricado a mano</option>
				 			<option value="cultivado" class="cultivado"> cultivado</option>
				 			<option value="trabajo" class="trabajo"> trabajo</option>
					</select>
					<label class="errormsg origenError" for="origen" id="origen_error" > Error en oirgen </label>
				</div>
				<br>

				<div class="form-group">
					<label for="horasUnidades" class="horasUnidades">Horas o unidades</label>
					<input type="number" name="horasUnidades" value="1" onblur="comprobarEntero(this);mayorQueCero(this)">
					<label class="errormsg numberError" for="horasUnidades" id="horasUnidades_error" > Solo numeros </label>
					<label class="errormsg tooshort" for="horasUnidades" id="horasUnidades_errorLength" > Al menos un numero </label>
				</div>
				<br>

				<div class="form-group">
				 	<label for="foto" class="picture">Foto  </label><br>
				 	<input type='file' name='foto' id='foto'>
				 	<label class="errormsg fotoError" for="foto" id="FOTO_error" > Foto error </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="estado" class="estado">estado  </label>
				 	<select name="estado" >
				 		<option value="tramite" class="tramite" selected > tramite</option>

						<option value="vendido" class="vendido" <?php if( !$usuario->isAdmin()) echo "disabled"  ?> > vendido </option>
					</select>
					<label class="errormsg estadoError" for="estado" id="estado_error" > estadoError  </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
					<label class="categorias" style="font-size: 150%; text-decoration: underline;">Categorias</label><br><br>
					<?php foreach ($this->categorias as $key ) { ?>
					<label> <?php echo $key['NOMBRE_CATEGORIA']; ?> </label>
					<input type="checkbox" name="categorias[]" value="<?php echo $key['ID'] ?>" ><br>

					<?php } ?>
				</div>
				<br>

				<button type="submit" name='action' class="btn btn-primary submit" value="ADD" >
					 submit 
				</button>

			</form>

			
			<a href='../Controller/PRODUCTOS_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
			<br><br>
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>