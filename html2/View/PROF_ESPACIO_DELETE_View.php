<?php
//Clase : PROF_ESPACIO_DELETE_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra los campos de la tupla antes de eliminarlo
//-------------------------------------------------------
	class PROF_ESPACIO_DELETE{

		var $values;
		var $nombre;
		var $nombreAux;
		var $codigo;
		var $codigoAux;


		function __construct($values,$nombre,$codigo){	
			session_start();
			include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';

			$this->values = $values;
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
				<link rel="stylesheet" type="text/css" href="../css/estilo.css"> 
				<script type="text/javascript" src='../js/validaciones.js'></script>
				<title class="Tdelete"> <?php echo $strings['Tdelete']; ?> </title>
			</head> 

			<?php include '../View/Header.php'; //header necesita los strings ?>
			<h1 class="deletePROF_TIT"><?php echo $strings['deletePROF_TIT']; ?></h1>	
			<form name = 'Form' action='../Controller/PROF_ESPACIO_Controller.php?action=DELETE' method='post' >

				<div class="form-group">
				 	<label for="DNI" class="profName"><?php echo $strings['profName'] ?> </label>  
				 	<select name='DNI' required>

				 			<?php while ($this->nombre != null ){ ?>
    					<option value='<?php echo $this->nombre['DNI']; ?>' 
    						<?php if ($this->values['DNI'] != $this->nombre['DNI']) echo 'disabled'; ?> >
    						 <?php  echo $this->nombre['NOMBREPROFESOR'] ." ". $this->nombre['APELLIDOSPROFESOR']; ?>
    					</option>

    						<?php $this->nombre= $this->nombreAux->fetch_array(); } ?>
					</select>
				</div>&nbsp;&nbsp;

				<div class="form-group">
				 	<label for="codESPACIO" class="CodEspacio"><?php echo $strings['CodEspacio'] ?> </label> 
				 	<select name='codESPACIO' required>

				 				<?php while ($this->codigo != null ){ ?>
    							<option value='<?php echo $this->codigo['CODESPACIO']; ?>'
    								<?php if ($this->values['CODESPACIO'] != $this->codigo['CODESPACIO']) echo 'disabled';?>
    								>
    							 <?php  echo $this->codigo['CODESPACIO'] ; ?>
    								
    							</option>

    							<?php $this->codigo= $this->codigoAux->fetch_array(); } ?>
    							
							</select>
				</div>&nbsp;&nbsp;

				<button type="submit" class="submit" name='action' class="btn btn-primary" value="DELETE" >
					<?php echo $strings['submit'] ; ?>
				</button> 

			</form>
				
		
			<a href='../Controller/PROF_ESPACIO_Controller.php'><img src="../View/icon/back.ico" height="32" width="32"> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>