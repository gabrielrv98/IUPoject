<!--  
Clase : admin_menuHorizontal
Creado el : 8-06-2020
Creado por: grvidal
Controla y administra las acciones del menu horizontal para la vista de los administradores
-------------------------------------------------------
-->
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
					Index Controller
				</a>

				<a class="Gestión Usuarios" href='../Controller/USUARIOS_Controller.php'>
					'Gestión Usuarios
				</a>

				<a class="Gestión Productos" href='../Controller/PRODUCTOS_Controller.php'>
					Gestión Productos
				</a>

				<a class="Gestión Categorias" href='../Controller/CATEGORIAS_Controller.php'>
					Gestión Categorias
				</a>

				<a class="Gestión Productos-Categorias" href='../Controller/PRODUCTOS_CATEGORIAS_Controller.php'>
					Productos-Categorias
				</a>

				<a class="intercambios" href='../Controller/INTERCAMBIOS_Controller.php'>
					Intercambios
				</a>
				<a class="mensajes" href='../Controller/MENSAJES_Controller.php'>
					mensajes
				</a>
				<a class="valoraciones" href='../Controller/VALORACIONES_Controller.php'>
					valoraciones
				</a>
			</div>
			
			<span class="menuBut open" onclick="openNav()"></span>

		</div>
		

	</nav>