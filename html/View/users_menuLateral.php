
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

				<a href='../Controller/EDIFICIO_Controller.php'>
					<?php echo $strings['buildingManager']; ?>
				</a>
				<a href='../Controller/CENTRO_Controller.php'>
					<?php echo $strings['centerManager']; ?>
				</a>
				<a href='../Controller/TITULACION_Controller.php'>
					<?php echo $strings['TitulationManager']; ?>
				</a>
				<a href='../Controller/PROF_TITULACION_Controller.php'>
					<?php echo $strings['P_TManager']; ?>
				</a>
				<a href='../Controller/PROFESOR_Controller.php'>
					<?php echo $strings['profesorManager']; ?>
				</a>
				<a href='../Controller/PROF_ESPACIO_Controller.php'>
					<?php echo $strings['PEmanager']; ?>
				</a>
				<a href='../Controller/ESPACIO_Controller.php'>
					<?php echo $strings['spaceManager']; ?>
				</a>
				<a href='../Controller/USUARIOS_Controller.php'>
					<?php echo $strings['Gestión Usuarios']; ?>
				</a>
			</div>
			<?php include '../Locale/Strings_' . $_SESSION['idioma'] . '.php'; ?>
			<span class="menuBut" onclick="openNav()">&#9776; <?php echo $strings['open']; ?></span>

		</div>
		

	</nav>