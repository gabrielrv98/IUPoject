<?php
	include_once '../Functions/Authentication.php';
	if (!isset($_SESSION['idioma'])) {
		$_SESSION['idioma'] = 'SPANISH';
	}
	else{
	}
	include '../Locale/Strings_' . $_SESSION['idioma'] . '.php';
?>
<html>
<head>
	<title>
		Ejemplo arquitectura IU
	</title>
	<meta charset="UTF-8"> 
	<script type="text/javascript" src="../View/js/tcal.js"></script> 
	<script type="text/javascript" src="../View/js/md5.js"></script>
	<script type="text/javascript" src="../View/js/validaciones.js"></script> 
	 
	<!--<script type="text/javascript" src="../View/js/comprobar.js"></script> -->
	<link rel="stylesheet" type="text/css" href="../View/css/JulioCSS-2.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../View/css/tcal.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../View/css/modal.css" />
</head>
<body>
		<div id="modal" style="display:none">
	  		<div id="contenido-interno">
	  			<div id="aviso"><img src="../View/Icons/sign-error.png" name="aviso"/></div>
	  			<div id="mensajeError"></div>
				<a id="cerrar" href="#" onclick="cerrarModal();">
		       		<img style="cursor: pointer" alt="" src="../View/Icons/salir.png" width="25"/>
				</a>
			</div>
		</div>
<header>
	<p style="text-align:center">
		<h1>
<?php
			echo $strings['Portal de Gestión'];
?>
		</h1>
	</p>
	
	<div width: 50%; align="left">
		<form name='idiomaform' action="../Functions/CambioIdioma.php" method="post">
			<?php echo $strings['idioma']; ?>
			<select name="idioma" onChange='this.form.submit()'>
				<option value="ENGLISH"
					<?php if ($_SESSION['idioma'] == "ENGLISH") echo 'selected'; ?> 
					><?php echo $strings['INGLES']; ?></option>

		        <option value="SPANISH"
		        	<?php if ($_SESSION['idioma'] == "SPANISH") echo 'selected'; ?>
		        	><?php echo $strings['ESPAÑOL']; ?></option>

		        <option value="GALLAECIAN"
		        	<?php if ($_SESSION['idioma'] == "GALLAECIAN") echo 'selected'; ?>
		        	><?php echo $strings['GALLAECIAN']; ?></option>

			</select>
		</form>
	</div>
<?php
	
	if (IsAuthenticated()){
?>

<?php
		echo $strings['Usuario'] . ' : ' . $_SESSION['login'] . '<br>';
?>			
	<div width: 50%; align="right">
		<a href='../Functions/Desconectar.php'>
			<img src='../View/icon/exit.ico'>
		</a>
	</div>

<?php
	
	}
	else{
		echo $strings['Usuario no autenticado']; 
?>
		<a href='../Controller/Register_Controller.php'> <img src="../View/icon/register.png" height="32" width="32"> </a>
<?php
	}	
?>


</header>

<div id = 'main'>
<?php
	//session_start();
	if (IsAuthenticated()){
		include '../View/users_menuLateral.php';
	}
?>
<article>
