<!-- //Clase : users_menuSuperior
//Creado el : 1-06-20
//Creado por: grvidal
//Muestra un menu superior propio de los usuarios
//------------------------------------------------------- -->
	<nav>
		<script>
		function openNav() {
		  document.getElementById("menuLateral").style.width = "250px";
		}

		function closeNav() {
		  document.getElementById("menuLateral").style.width = "0";
		}
		</script>
		<head>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css">
		</head>
		
		<div id="menuLateralMain" class="menuLateralMain">
			<div id="menuLateral" class="menuLateralCss">
				<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

				<a class="IndexViewLink" href='../Controller/Index_Controller.php'>
					IndexViewLink
				</a>

				<a class="VerUsuarios" href='../Controller/USUARIOS_Controller.php'>
					Ver usuario
				</a>

				<a class="VerProductos" href='../Controller/PRODUCTOS_Controller.php'>
					Ver Productos
				</a>

				<a class="Gestión Categorias" href='../Controller/CATEGORIAS_Controller.php'>
					Gestión Categorias
				</a>
				<a class="intercambios" href='../Controller/INTERCAMBIOS_Controller.php'>
					Intercambios
				</a>
				<a class="Misintercambios" href='../Controller/INTERCAMBIOS_Controller.php?person=me'>
					Mis intercambios
				</a>
				<a class="mensajes" href='../Controller/MENSAJES_Controller.php'>
					mensajes
				</a>
				<a class="valoraciones" href='../Controller/VALORACIONES_Controller.php'>
					valoraciones
				</a>
				<a class="Gestión MiPerfil" href='../Controller/USUARIOS_Controller.php?action=SHOWCURRENT&&login=<?php echo $_SESSION['login']; ?>'>
					Mi perfil
				</a>
			</div>

			<span class="menuBut open" onclick="openNav()"> Abrir </span>

		</div>
		

	</nav>