
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

				<a class="buildingManager" href='../Controller/EDIFICIO_Controller.php'>
					<?php echo $strings['buildingManager']; ?>
				</a>
				<a class="centerManager" href='../Controller/CENTRO_Controller.php'>
					<?php echo $strings['centerManager']; ?>
				</a>
				<a class="TitulationManager" href='../Controller/TITULACION_Controller.php'>
					<?php echo $strings['TitulationManager']; ?>
				</a>
				<a class="P_TManager" href='../Controller/PROF_TITULACION_Controller.php'>
					<?php echo $strings['P_TManager']; ?>
				</a>
				<a class="profesorManager" href='../Controller/PROFESOR_Controller.php'>
					<?php echo $strings['profesorManager']; ?>
				</a>
				<a class="PEmanager" href='../Controller/PROF_ESPACIO_Controller.php'>
					<?php echo $strings['PEmanager']; ?>
				</a>
				<a class="spaceManager" href='../Controller/ESPACIO_Controller.php'>
					<?php echo $strings['spaceManager']; ?>
				</a>
				<a class="Gestión Usuarios" href='../Controller/USUARIOS_Controller.php'>
					<?php echo $strings['Gestión Usuarios']; ?>
				</a>
			</div>
<?php 
			include '../Locale/Strings_' . $_COOKIE['idioma'] . '.php'; ?>
			<span class="menuBut open" onclick="openNav()"> <?php echo $strings['open']; ?></span>

		</div>
		

	</nav>