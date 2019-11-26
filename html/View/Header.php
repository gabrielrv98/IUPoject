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
	<title>Ejemplo arquitectura IU</title>
<meta charset="UTF-8"> 
	<script type="text/javascript" src="../View/js/tcal.js"></script> 
	<script type="text/javascript" src="../View/js/md5.js"></script>
	<script type="text/javascript" src="../View/js/validaciones.js"></script> 

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
<header class="MainHeader">
	<div>
		<p style="text-align:center">
			<h1>
	<?php
				echo $strings['Portal de Gestión'];
	?>
			</h1>
		</p>
	</div>
	

	<div width: 50%; align="left">
		<form name='idiomaform' action="../Functions/CambioIdioma.php" method="post">
			<?php echo $strings['idioma']; ?>
			<br>
			<img alt="" src="../View/icon/english.png"   style="height: 32px; width: 32px" />
			<input type="radio" name="idioma" value="ENGLISH" onChange='this.form.submit()'>
			<br>

			<img alt="" src="../View/icon/spain.jpg"   style="height: 32px; width: 32px" />
			<input type="radio" name="idioma" value="SPANISH" onChange='this.form.submit()'>
			<br>

			<img alt="" src="../View/icon/galicia.jpg"   style="height: 32px; width: 32px" />
			<input type="radio" name="idioma" value="GALLAECIAN" onChange='this.form.submit()'>
			<br>
		</form>
	</div>

<?php
	
	if (IsAuthenticated()){
?>

<?php
		echo $strings['Usuario'] . ' : ' . $_SESSION['login'] . '<br>';
?>			
	<div width: 50%; align="right" style="margin-right:20px">
		<a href='../Functions/Desconectar.php'>
			<img src='../View/icon/exit.ico'>
		</a>
	</div>

<?php
	
	}
	else{
		echo $strings['Usuario no autenticado']; 
?>
		<a  href='../Controller/Register_Controller.php'> <img src="../View/icon/register.png" height="32" width="32"> </a>
<?php
	}	
?>


</header>

<div id = 'main' class="MainDiv">
<?php
	//session_start();
	if (IsAuthenticated()){
		include '../View/users_menuLateral.php';
	}
?>
<article>
