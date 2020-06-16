<?php
//Clase : Header.php
//Creado el : 2-10-2019
//Creado por: grvidal
//Pie de la plataforma con la hora y el alias del creador
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
	<div>
		<p style="text-align:center">
			<h1 class="Intercambio de tiempo">
				Intercambio de tiempo (titulo)
			</h1>
		</p>
	</div>
	
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
	
	if (IsAuthenticated()){
?>
	<div>
		<label class="Usuario"> </label> <label class="dosP">:</label> <label> <?php echo $_SESSION['login']; ?></label>
	</div>
	<br>
	<div width: 50%; align="left" style="margin-left:20px">
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
		include_once '../Model/USUARIOS_Model.php'; 
		$usuario = new USUARIOS_Model($_SESSION['login'],'','','','','','','','','','','','','');// se Crea el nuevo usuario
		if ($usuario->isAdmin()){// se comprueba si es admin
			include '../View/admin_menuLateral.php';
		}else	{
			include '../View/users_menuLateral.php';
		}

	}
?>
<article>