<?php
//Clase : PRODUCTOS_DELETE_View
//Creado el : 2-06-2020
//Creado por: grvidal
//Muestra los atributos de un producto antes de eliminarlo
//-------------------------------------------------------

		class PRODUCTOS_DELETE{

		var $valores;
		var $eliminable;

		function __construct($valores,$eliminable){	
			
			$this->valores = $valores;
			$this->eliminable = $eliminable;
			$this->render();
		}

		function render(){
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<title class="Tedit">  Tedit </title>
		</head>
		
		<?php include '../View/Header.php'; //header necesita los strings 
		
		$_SESSION['id'] = $this->valores['ID'];//se asigna el id para no perderlo
		$usuario = new USUARIOS_Model('','','','','',$this->valores['VENDEDOR_DNI'],'','','','','','','','');//Recuperamos el usuario  
		$nombre =  $usuario->getNombre();//obtenemos su nombre y apellidos
		$nombre = $nombre['NOMBRE'] . ' ' . $nombre['APELLIDOS'] .'-';// y los colocamos visualmente
		 ?>
			<h1 class="eliminarProducto"></h1>	
			<form name = 'Form' action='../Controller/PRODUCTOS_Controller.php?action=DELETE' method='post' onsubmit="return comprobarProductos(this);" enctype="multipart/form-data">


				<?php if($this->eliminable == 'false'){ ?>
					<label class="ProdNoEliminable tituloStyle errormsg" style="visibility: visible;"></label><br><br>
				<?php } ?>
				 	
				<div class="form-group">
					<label class="idProducto">ID del producto</label>
					<input type="text" name="id" value="<?php echo $this->valores['ID']; ?>" onblur="comprobarEntero(this);" readonly>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="titulo" class="tituloProducto"> tituloProducto  </label> 
				 	<br> 
				 	<input class="form-control" type = 'text' name = 'titulo' id = 'titulo' placeholder = 'Letras y numeros' size = '30' onblur="comprobarAlfabetico(this,50);" value = '<?php echo $this->valores['TITULO']; ?>' readonly>
				 	<label class="errormsg letrasynumeros" for="titulo" id="titulo_error" >  letrasynumeros  </label>
				 	<label class="errormsg tooShortNoNum" for="titulo" id="titulo_errorLength" >  tooShortNoNum  </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="descripcion" class="descripcionProducto"> descripcionProducto  </label>
				 	<br> 
				 	<textarea class="form-control" type = 'text' name = 'descripcion' id = 'descripcion' cols='100' rows='5' placeholder = 'letras y numeros' size = '50' value = '' onblur="comprobarAlfabetico(this,200)"  rows="5" readonly > DESCRIPCION  </textarea> 
				 	<label class="errormsg letrasynumeros" for="descripcion" id="descripcion_error" >  letrasynumeros   </label>
				 	<label class="errormsg tooShortNoNum" for="descripcion" id="descripcion_errorLength" > tooShortNoNum  </label>
				</div>&nbsp;


				<div class="form-group">
				 	<label for="foto" class="picture"> picture  </label><br> 
					<img src="<?php echo $this->valores['FOTO'];?>" id="foto" height="42" width="42">
				 	<label class="errormsg fotoError" for="foto" id="foto_error" >  fotoError </label>
				</div>&nbsp;&nbsp;


				<div class="form-group">
				 	<label for="vendedorDNI" class="persona"> persona   </label>
				 	<input class="form-control" type = 'text' onblur="comprobarAlfabetico(this,200)" value = '<?php echo $nombre; ?>' readonly>
					<input class="form-control" type = 'text' name = 'vendedorDNI' id = 'vendedorDNI'  onblur="comprobarDni(this)"  size = '9'  value = '<?php echo $this->valores['VENDEDOR_DNI']; ?>' readonly>
					<label class="errormsg vendedorDNIError" for="vendedorDNI" id="vendedorDNI_error" >vendedorDNIError </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
					<label class="origen" for="origen">Origen</label>
					<select name="origen" onchange="comprobarOrigen(this);" required>
				 			<option value="fabricado_a_mano" class="fabricado_a_mano"  <?php if( $this->valores['ORIGEN'] != 'fabricado_a_mano') echo "disabled" ?> > Fabricado a mano</option>
				 			<option value="cultivado" class="cultivado" <?php if( $this->valores['ORIGEN'] != 'cultivado') echo "disabled" ?>> cultivado</option>
				 			<option value="trabajo" class="trabajo" <?php if( $this->valores['ORIGEN'] != 'trabajo') echo "disabled" ?> >trabajo</option>
					</select>
					<label class="errormsg origenError" for="origen" id="origen_error" > Error en oirgen </label>
				</div>
				<br>

				<div class="form-group">
					<label for="horasUnidades" class="horasUnidades">Horas o unidades</label>
					<input type="number" name="horasUnidades" onblur="comprobarEntero(this);" value="<?php echo $this->valores['HORAS_UNIDADES'] ?>" readonly="">
					<label class="errormsg numberError" for="horasUnidades" id="horasUnidades_error" > Solo numeros </label>
					<label class="errormsg tooshort" for="horasUnidades" id="horasUnidades_errorLength" > Al menos un numero </label>
				</div>
				<br>


				<div class="form-group">
				 	<label for="estado" class="estado">Estado </label>
				 	<input class="form-control" type = 'text' name = 'estado' id = 'estado' placeholder = 'Letras y numeros' size = '9'  value = '<?php echo $this->valores['ESTADO']; ?>' onblur="comprobarEstado(this)" readonly>
					<label class="errormsg estadoError" for="estado" id="estado_error" > estado error </label>
				</div>&nbsp;&nbsp;


				<button type="submit" name='action' class="btn btn-primary submit" value="DELETE" >
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