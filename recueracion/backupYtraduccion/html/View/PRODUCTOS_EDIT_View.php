<?php
//Clase : PRODUCTOS_EDIT_View
//Creado el : 3-06-2020
//Creado por: grvidal
//Muestra unos campos para ser rellenados y los manda por post al controlador
//-------------------------------------------------------

	class PRODUCTOS_EDIT{

		var $valores;
		var $categorias;
		var $misCategorias;

		function __construct($valores,$categorias,$misCategorias){	
			
			$this->misCategorias = $misCategorias;
			$this->categorias = $categorias;
			$this->valores = $valores;
			$this->render();
		}

		function render(){
			include_once '../Model/USUARIOS_Model.php';
			$usuario = new USUARIOS_Model($_SESSION['login'],'','','','','','','','','','','','','');//Recuperamos el usuario que esta 
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<title class="Tedit"> <?php echo $strings['Tedit']; ?></title>
		</head>
		
		<?php include '../View/Header.php'; //header necesita los strings ?>
			<h1 class="editProducto"></h1>	
			<form name = 'Form' action='../Controller/PRODUCTOS_Controller.php?action=EDIT' method='post' onsubmit="return comprobarProductos(this);" enctype="multipart/form-data">

				<div class="form-group">
					<label class="idProducto">ID del producto</label>
					<input type="text" name="id" value="<?php echo $this->valores['ID']; ?>" readonly>
				</div>&nbsp;&nbsp;
				 	
				<div class="form-group">
				 	<label for="titulo" class="tituloProducto"><?php echo $strings['tituloProducto'] ?> </label> 
				 	<br> 
				 	<input class="form-control" type = 'text' name = 'titulo' id = 'titulo' placeholder = 'Letras y numeros' size = '30' onblur="comprobarAlfabetico(this,50);" value = '<?php echo $this->valores['TITULO']; ?>' required>
				 	<label class="errormsg letrasynumeros" for="titulo" id="titulo_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				 	<label class="errormsg tooShortNoNum" for="titulo" id="titulo_errorLength" > <?php echo $strings['tooShortNoNum'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="descripcion" class="descripcionProducto"><?php echo $strings['descripcionProducto'] ?> </label>
				 	<br> 
				 	<textarea class="form-control" type = 'text' name = 'descripcion' id = 'descripcion' cols='100' rows='5' placeholder = 'letras y numeros' size = '50' value = '' onblur="comprobarAlfabeticoEnter(this,200)"  rows="5" required ><?php echo $this->valores['DESCRIPCION']; ?> </textarea> 
				 	<label class="errormsg letrasynumeros" for="descripcion" id="descripcion_error" > <?php echo $strings['letrasynumeros'] ?>  </label>
				 	<label class="errormsg tooShortNoNum" for="descripcion" id="descripcion_errorLength" > <?php echo $strings['tooShortNoNum'] ?> </label>
				</div>&nbsp;


				<div class="form-group">
					<img src="<?php echo $this->valores['FOTO'];?>" height="42" width="42"><br>
				 	<label for="foto" class="picture"><?php echo $strings['picture'] ?>  </label><br>
				 	<input type = 'file' name = 'foto' id = 'foto' onchange="comprobarExtension(this)" > 
				 	<label class="errormsg fotoError" for="foto" id="foto_error" > <?php echo $strings['fotoError'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
					<label class="origen" for="origen">Origen</label>
					<select name="origen" onchange="comprobarOrigen(this);" required>
				 			<option value="fabricado_a_mano" class="fabricado_a_mano" <?php if( $this->valores['ORIGEN'] == 'fabricado_a_mano') echo "selected" ?> > Fabricado a mano</option>
				 			<option value="cultivado" class="cultivado" <?php if( $this->valores['ORIGEN'] == 'cultivado') echo "selected" ?>> cultivado</option>
				 			<option value="trabajo" class="trabajo" <?php if( $this->valores['ORIGEN'] == 'trabajo') echo "selected" ?>> trabajo</option>
					</select>
					<label class="errormsg origenError" for="origen" id="origen_error" > Error en oirgen </label>
				</div>
				<br>

				<div class="form-group">
					<label for="horasUnidades" class="horasUnidades">Horas o unidades</label>
					<input type="number" name="horasUnidades" onblur="comprobarEntero(this);colocarEstado(this);" value="<?php echo $this->valores['HORAS_UNIDADES'] ?>">
					<label class="errormsg numberError" for="horasUnidades" id="horasUnidades_error" > Solo numeros </label>
					<label class="errormsg tooshort" for="horasUnidades" id="horasUnidades_errorLength" > Al menos un numero </label>
				</div>
				<br>


				<?php 
					if($usuario->isAdmin()){ // si el usuario es administrador es le ofrece busqeuda por otros usuarios
						$usuariosProductos = $usuario->getUsuarios();
				?>

				<div class="form-group">
				 	<label for="vendedorDNI" class="persona"><?php echo $strings['persona'] ?>  </label>
				 	<select name="vendedorDNI" >
				 		<?php  foreach ($usuariosProductos as $key) { 
				 			$patata = $key; ?>
				 			<option value="<?php echo $key['DNI']; ?>" <?php if( $this->valores['VENDEDOR_DNI'] == $key['DNI'] ) echo "selected"  ?> > <?php echo $key['NOMBRE'], "-",$key['APELLIDOS'] ; ?></option>

				 		<?php } ?>
						<option value="" class="yo"> <?php echo $strings['yo'] ; ?></option>
					</select>
					<label class="errormsg vendedorDNIError" for="vendedorDNI" id="vendedorDNI_error" > <?php echo $strings['vendedorDNIError'] ?> </label>
				</div>&nbsp;&nbsp;


				<div class="form-group">
				 	<label for="estado" class="estado"><?php echo $strings['estado'] ?>  </label>
				 	<select name="estado" id="estado" >
				 		<option value="tramite" class="tramite" <?php if( $this->valores['ESTADO'] == 'tramite') echo "selected"  ?> > <?php echo $strings['tramite'] ; ?></option>

						<option value="vendido" class="vendido" <?php if( $this->valores['ESTADO'] == 'vendido') echo "selected"  ?> > <?php echo $strings['vendido'] ; ?></option>
					</select>
					<label class="errormsg estadoError" for="estado" id="estado_error" > <?php echo $strings['estadoError'] ?> </label>
				</div>&nbsp;&nbsp;

				<?php } ?>

				<div class="form-group">
					<label class="categorias" style="font-size: 150%; text-decoration: underline;">Categorias</label><br><br>
				<?php foreach ($this->categorias as $key ) { ?>
					<label> <?php echo $key['NOMBRE_CATEGORIA']; ?> </label>
					<input type="checkbox" name="categorias[]" value="<?php echo $key['ID'] ?>" 
					<?php  foreach($this->misCategorias as $misCat){ 
						if($misCat['ID_CATEGORIA'] == $key['ID'])  echo "checked"; 
					}  ?> ><br>

				<?php } ?>
				</div><br>


				<button type="submit" name='action' class="btn btn-primary submit" value="EDIT" >
					<?php echo $strings['submit'] ; ?>
				</button>

			</form>

			
			<a href='../Controller/PRODUCTOS_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
			<br><br>
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin edit

?>