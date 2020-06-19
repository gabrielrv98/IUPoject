
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
					<?php echo $strings['IndexViewLink']; ?>
				</a>

				<a class="Gestión Productos" href='../Controller/PRODUCTOS_Controller.php'>
					<?php echo $strings['Gestión Productos']; ?>
				</a>

				<a class="Gestión Categorias" href='../Controller/CATEGORIAS_Controller.php'>
					<?php echo $strings['Gestión Categorias']; ?>
				</a>
				<a class="intercambios" href='../Controller/INTERCAMBIOS_Controller.php'>
					Intercambios
				</a>
			</div>

			<span class="menuBut open" onclick="openNav()"> <?php echo $strings['open']; ?></span>

		</div>
		

	</nav>