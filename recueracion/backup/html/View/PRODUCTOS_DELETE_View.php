<?php
//Clase : PRODUCTOS_DELETE_View
//Creado el : 2-06-2020
//Creado por: grvidal
//Muestra unos campos para ser rellenados y los manda por post al controlador
//-------------------------------------------------------

		class PRODUCTOS_DELETE{

		var $valores;

		function __construct($valores){	
			//session_start();
			$this->valores = $valores;
			$this->render();
		}

		function render(){

			include '../Locale/Strings_' . $_SESSION['idioma'] . '.php'; 
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<title class="Tedit"> <?php echo $strings['Tedit']; ?></title>
		</head>
		
		<?php include '../View/Header.php'; //header necesita los strings 
		
		$_SESSION['id'] = $this->valores['ID'];//se asigna el id para no perderlo
		$usuario = new USUARIOS_Model('','','','','',$this->valores['VENDEDOR_DNI'],'','','','','','','','');//Recuperamos el usuario  
		$nombre =  $usuario->getNombre();//obtenemos su nombre y apellidos
		$nombre = $nombre['NOMBRE'] . ' ' . $nombre['APELLIDOS'] .'-';// y los colocamos visualmente
		 ?>
			<h1 class="eliminarProducto"><?php echo $strings['eliminarProducto']; ?></h1>	
			<form name = 'Form' action='../Controller/PRODUCTOS_Controller.php?action=DELETE' method='post' onsubmit="return comprobarProducto(this);" enctype="multipart/form-data">
				 	
				<div class="form-group">
				 	<label for="titulo" class="tituloProducto"><?php echo $strings['tituloProducto'] ?> </label> 
				 	<br> 
				 	<input class="form-control" type = 'text' name = 'titulo' id = 'titulo' placeholder = 'Letras y numeros' size = '30' onblur="comprobarAlfabetico(this,50);" value = '<?php echo $this->valores['TITULO']; ?>' readonly>
				 	<label class="errormsg letrasynumeros" for="titulo" id="titulo_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				 	<label class="errormsg tooShortNoNum" for="titulo" id="titulo_errorLength" > <?php echo $strings['tooShortNoNum'] ?> </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="descripcion" class="descripcionProducto"><?php echo $strings['descripcionProducto'] ?> </label>
				 	<br> 
				 	<textarea class="form-control" type = 'text' name = 'descripcion' id = 'descripcion' cols='100' rows='5' placeholder = 'letras y numeros' size = '50' value = '' onblur="comprobarAlfabetico(this,200)"  rows="5" readonly ><?php echo $this->valores['DESCRIPCION']; ?> </textarea> 
				 	<label class="errormsg letrasynumeros" for="descripcion" id="descripcion_error" > <?php echo $strings['letrasynumeros'] ?>  </label>
				 	<label class="errormsg tooShortNoNum" for="descripcion" id="descripcion_errorLength" > <?php echo $strings['tooShortNoNum'] ?> </label>
				</div>&nbsp;


				<div class="form-group">
				 	<label for="foto" class="picture"><?php echo $strings['picture'] ?>  </label><br> 
					<img src="<?php echo $this->valores['FOTO'];?>" height="42" width="42">
				 	<label class="errormsg fotoError" for="foto" id="foto_error" > <?php echo $strings['fotoError'] ?> </label>
				</div>&nbsp;&nbsp;


				<div class="form-group">
				 	<label for="vendedorDNI" class="persona"><?php echo $strings['persona'] ?>  </label>
				 	<input class="form-control" type = 'text'  value = '<?php echo $nombre; ?>' readonly>
					<input class="form-control" type = 'text' name = 'vendedorDNI' id = 'vendedorDNI' placeholder = 'Letras y numeros' size = '9'  value = '<?php echo $this->valores['VENDEDOR_DNI']; ?>' readonly>
					<label class="errormsg vendedorDNIError" for="vendedorDNI" id="vendedorDNI_error" > <?php echo $strings['vendedorDNIError'] ?> </label>
				</div>&nbsp;&nbsp;


				<div class="form-group">
				 	<label for="estado" class="estado"><?php echo $strings['estado'] ?>  </label>
				 	<input class="form-control" type = 'text' name = 'estado' id = 'estado' placeholder = 'Letras y numeros' size = '9'  value = '<?php echo $this->valores['ESTADO']; ?>' readonly>
					<label class="errormsg estadoError" for="estado" id="estado_error" > <?php echo $strings['estadoError'] ?> </label>
				</div>&nbsp;&nbsp;


				<button type="submit" name='action' class="btn btn-primary submit" value="DELETE" >
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