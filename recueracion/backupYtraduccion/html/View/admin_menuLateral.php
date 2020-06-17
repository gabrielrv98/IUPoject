
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
					<?php echo $strings['Gestión Usuarios']; ?>
				</a>

				<a class="Gestión Productos" href='../Controller/PRODUCTOS_Controller.php'>
					<?php echo $strings['Gestión Productos']; ?>
				</a>

				<a class="Gestión Categorias" href='../Controller/CATEGORIAS_Controller.php'>
					<?php echo $strings['Gestión Categorias']; ?>
				</a>

				<a class="Gestión Productos-Categorias" href='../Controller/PRODUCTOS_CATEGORIAS_Controller.php'>
					<?php echo $strings['Gestión Productos-Categorias']; ?>
				</a>
			</div>
			
			<span class="menuBut open" onclick="openNav()"></span>

		</div>
		

	</nav>