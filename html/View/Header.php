<?php
	include_once '../Functions/Authentication.php';
	if (!isset($_COOKIE['idioma'])) {
		$_COOKIE['idioma'] = 'SPANISH';
	}
	else{
	}
	include '../Locale/Strings_' . $_COOKIE['idioma'] . '.php';
?>
<html>
<head>
<meta charset="UTF-8"> 
	<script type="text/javascript" src="../View/js/tcal.js"></script> 
	<script type="text/javascript" src="../View/js/md5.js"></script>
	<script type="text/javascript" src="../View/js/validaciones.js"></script> 
	<script type="text/javascript" src='../View/js/traduccion.js'></script>

</head>
<body onload="traducirIU('');">
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
			<h1 class="Portal_de_Gestión">
	<?php
				echo $strings['Portal_de_Gestión'];
	?>
			</h1>
		</p>
	</div>
	

	<button onclick="traducirIU('ENGLISH');">
		<img src="../View/icon/english.png" style="height: 32px; width: 32px">
	</button> 
	<button onclick="traducirIU('SPANISH');">
		<img alt="" src="../View/icon/spain.jpg"   style="height: 32px; width: 32px" />
	</button> 
	<button onclick="traducirIU('GALLAECIAN');">
		<img alt="" src="../View/icon/galicia.jpg"   style="height: 32px; width: 32px" />
	</button> <br>

<?php
	
	if (IsAuthenticated()){
?>
	<div>
		<label class="Usuario"> <?php echo $strings['Usuario'] ?> </label> <label class="dosP">:</label> <label> <?php echo $_SESSION['login']; ?></label>
	</div>
	<br>
	<div width: 50%; align="right" style="margin-right:20px">
		<a href='../Functions/Desconectar.php'>
			<img src='../View/icon/exit.ico'>
		</a>
	</div>

<?php
	
	}
	else{
?>
		<label class="Usuario_no_autenticado" > <?php echo $strings['Usuario_no_autenticado']; ?> </label>
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
