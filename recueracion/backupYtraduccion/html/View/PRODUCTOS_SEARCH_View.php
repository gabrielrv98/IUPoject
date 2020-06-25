<?php
//Clase : PRODUCTOS_SEARCH_View
//Creado el : 3-06-2020
//Creado por: grvidal
//Muestra ofrece un formulario para buscar productos
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
				 	<label for="titulo" class="tituloProducto"> tituloProducto  </label> 
				 	<br> 
				 	<input class="form-control" type = 'text' name = 'titulo' id = 'titulo' placeholder = 'Letras y numeros' size = '30' onblur="comprobarAlfabeticoVacio(this,50);">
				 	<label class="errormsg letrasynumeros" for="titulo" id="titulo_error" >  letrasynumeros  </label>
				 	<label class="errormsg tooShortNoNum" for="titulo" id="titulo_errorLength" >  tooShortNoNum  </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="vendedorDNI" class="persona"> persona  </label>
				 	<select name="vendedorDNI" >
				 		<?php  foreach ($usuariosProductos as $key) { 
				 			$patata = $key; ?>
				 			<option value="<?php echo $key['DNI']; ?>" > <?php echo $key['NOMBRE'], "-",$key['APELLIDOS'] ; ?></option>

				 		<?php } ?>
						<option value="" class="mix" selected>  mix </option>
					</select>
					<label class="errormsg vendedorDNIError" for="vendedorDNI" id="vendedorDNI_error" >  vendedorDNIError  </label>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="estado" class="disponibilidad">Disponibilidad </label>
				 	<select name="estado" >
						<option value="" class="indiferente" selected> indiferente</option>
						<option value="tramite" class="tramite" > tramite</option>
						<option value="vendido" class="vendido" > vendido</option>
					</select>
					<label class="errormsg estadoError" for="estado" id="estado_error" >estadoError </label>
				</div>&nbsp;&nbsp;


				<div class="form-group">
				 	<label for="descripcion" class="descripcionProducto">descripcionProducto</label>
				 	<br> 
				 	<textarea class="form-control" type = 'text' name = 'descripcion' id = 'descripcion' cols='100' rows='5' placeholder = 'letras y numeros' size = '50' value = '' onblur="comprobarAlfabeticoVacio(this,200)" rows="5" ></textarea> 
				 	<label class="errormsg letrasynumeros" for="descripcion" id="descripcion_error" > letrasynumeros   </label>
				 	<label class="errormsg tooShortNoNum" for="descripcion" id="descripcion_errorLength" >  tooShortNoNum  </label>
				</div>&nbsp;

				<div class="form-group">
					<label class="origen" for="origen">Origen</label>
					<select name="origen" onchange="comprobarOrigen(this);" >
							<option value="" class="indiferente"> indiferente</option>
				 			<option value="fabricado_a_mano" class="fabricado_a_mano"> Fabricado a mano</option>
				 			<option value="cultivado" class="cultivado"> cultivado</option>
				 			<option value="trabajo" class="trabajo"> trabajo</option>
					</select>
					<label class="errormsg origenError" for="origen" id="origen_error" > Error en oirgen </label>
				</div>
				<br>

				<div class="form-group">
					<label for="horasUnidades" class="horasUnidades">Horas o unidades</label>
					<input type="number" name="horasUnidades" onblur="comprobarEnteroVacio(this);">
					<label class="errormsg numberError" for="horasUnidades" id="horasUnidades_error" > Solo numeros </label>
				</div>
				<br>

				<button type="submit" name='action' class="btn btn-primary submit" value="SEARCH" >
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