<?php
//Clase : Header.php
//Creado el : 2-06-2020
//Creado por: grvidal
//Cabecera de la plataforma, añade los scripts de traduccion y los botones para traducir. Muestra el titulo de la web y el login del usuario connectado
// junto con un boton para desconectarse
//---------------------------------------------------------
	include_once '../Functions/Authentication.php';
	if (!isset($_COOKIE['idioma'])) {
		$_COOKIE['idioma'] = 'SPANISH';
	}
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>
		Intercambio de tiempo
	</title>
	<script type="text/javascript" src="../View/js/validaciones.js"></script> 
	<script type="module" src='../Locale/strings_SPANISH.js'></script>
	<script type="module" src='../Locale/strings_ENGLISH.js'></script>
	<script type="module" src='../Locale/strings_GALLAECIAN.js'></script>
	<script type="module" src='../View/js/cambioIdioma.js'></script>
	<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
</head>
<body onload="traducirIU('');">

	
<header class="MainHeader">
	<!-- Titulo de la pagina -->
	<div>
		<p style="text-align:center">
			<h1 class="Intercambio de tiempo">
				Intercambio de tiempo
			</h1>
		</p>
	</div>
	
	<!-- Botones de traduccion -->
	<button  onclick="traducirIU('ENGLISH');">
		<img  src="../View/icon/english.png" style="height: 32px; width: 32px">
	</button> 
	<button onclick="traducirIU('SPANISH');">
		<img alt="" src="../View/icon/spain.jpg"   style="height: 32px; width: 32px" />
	</button> 
	<button onclick="traducirIU('GALLAECIAN');">
		<img alt="" src="../View/icon/galicia.jpg"   style="height: 32px; width: 32px" />
	</button> <br>
<?php
	
	if (IsAuthenticated()){// si no esta autentificado se le envia a la vista de login
?>
	<!-- Login del usuario -->
	<div>
		<label class="usuario"> </label> <label class="dosP">:</label> <label> <?php echo $_SESSION['login']; ?></label>
	</div>
	<br>
	<div width: 50%; align="left" style="margin-left:20px">
		<a href='../Functions/Desconectar.php'>
			<img src='../View/icon/exit.ico'>
		</a>
	</div>

<?php
	
	}
	else{// vista si el usuariio no esta autentificado
?>
		<label class="Usuario_no_autenticado" > usuario no autentificado </label>
		<a  href='../Controller/Register_Controller.php'> <img src="../View/icon/register.png" height="32" width="32"> </a>
<?php
	}	
?>


</header>
<!-- Menu superior, dependiendo de los permisos del usuario se muestran diferentes vistas -->
<div id = 'main' class="MainDiv">
<?php
		//seleccion del menu
	if (IsAuthenticated()){
		include_once '../Model/USUARIOS_Model.php'; 
		$usuario = new USUARIOS_Model($_SESSION['login'],'','','','','','','','','','','','','');// se Crea el nuevo usuario
		if ($usuario->isAdmin()){// se comprueba si es admin
			include '../View/admin_menuSuperior.php';
		}else	{
			include '../View/users_menuSuperior.php';
		}

	}
?>
<article>