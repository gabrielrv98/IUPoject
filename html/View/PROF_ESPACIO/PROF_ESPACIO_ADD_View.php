<?php
//Clase : PROF_ESPACIO_ADD_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra unos campos para ser rellenados y los manda por post al controlador
//-------------------------------------------------------
	class PROF_ESPACIO_ADD{

		var $nombre;
		var $nombreAux;
		var $codigo;
		var $codigoAux;


		function __construct($nombre,$codigo){	
			session_start();

			$this->nombre = $nombre->fetch_array();
			$this->nombreAux = $nombre;
			$this->codigo = $codigo->fetch_array();
			$this->codigoAux = $codigo;
			$this->render();
		}

		function render(){ 
			
			include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
		?>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
			<script type="text/javascript" src='../js/validaciones.js'></script>
			<title> <?php echo $strings['Tadd']; ?></title>
		</head>
		<?php include '../View/Header.php'; //header necesita los strings ?>
			<h1><?php echo $strings['addPROF_ESP']; ?></h1>	
			<form name = 'Form'action='../Controller/PROF_ESPACIO_Controller.php?action=ADD' method='post' onsubmit="return comprobarProf_Espacio(this);">

				<!-- Division añadir el DNI ( al usuario le aparece el nombre) -->
				<div class="form-group">
				 	<label for="DNI"><?php echo $strings['profName'] ?> </label>  
				 	<select name='DNI' required>

				 			<?php while ($this->nombre != null ){ ?>
    					<option value='<?php echo $this->nombre['DNI']; ?>'>
    						 <?php  echo $this->nombre['NOMBREPROFESOR'] ." ". $this->nombre['APELLIDOSPROFESOR']; ?>
    					</option>

    						<?php $this->nombre= $this->nombreAux->fetch_array(); } ?>
					</select>
					<label class="errormsg" for="DNI" id="DNI_error" > <?php echo $strings['dniError'] ?> </label>
				</div>&nbsp;&nbsp;
				
				<!-- Division añadir el codigo de espacio ( al usuario le aparece el nombre) -->
				<div class="form-group">
				 	<label for="codESPACIO"><?php echo $strings['CodEspacio'] ?> </label> 
				 	<select name='codESPACIO' required>

				 				<?php while ($this->codigo != null ){ ?>
    							<option value='<?php echo $this->codigo['CODESPACIO']; ?>'>
    							 <?php  echo $this->codigo['CODESPACIO'] ; ?>
    								
    							</option>

    							<?php $this->codigo= $this->codigoAux->fetch_array(); } ?>
    							
					</select>
					<label class="errormsg" for="codESPACIO" id="codESPACIO_error" > <?php echo $strings['letrasynumeros'] ?> </label>
				</div>&nbsp;&nbsp;

				<button type="submit" name='action' class="btn btn-primary" value="ADD" >
					<?php echo $strings['submit'] ; ?>
				</button>

			</form>	 
				
		
			<a href='../Controller/Index_Controller.php'> <?php echo $strings['Volver']; ?> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER  . " " . echo $nombre['APELLIDOSPROFESOR'];


/*
Nombre del profesor: <select name='DNI' >

				 				<?php $i = 0; 
				 				 while ($this->nombre != 'null'){ ?>
    							<option value="<?php echo $this->nombre['DNI']; ?>">
    							 <?php  echo $this->nombre['NOMBREPROFESOR'] ." ". $i ." ". $this->nombre['APELLIDOSPROFESOR']; ?>
    								
    							</option>

    							<?php  $this->nombre->fetch_array(); 
    							$i++;} ?>
							</select>*/


?>