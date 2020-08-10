<!-- //Clase : users_menuSuperior
//Creado el : 1-06-20
//Creado por: grvidal
//Muestra un menu superior propio de los usuarios
//------------------------------------------------------- -->
	<nav style="margin-top: 20px">

		<div id="menuLateralMain" class="menuLateralMain">
			<input type="checkbox" id="btn-menu">
			<label for="btn-menu" class="open" >Abrir</label>

			<div id="menuLateral" class="menuLateral">
				<ul>
					<li>
						<a class="IndexViewLink" href='../Controller/Index_Controller.php'>
							Index Controller
						</a>
					</li>
					<li>
						<a class="Gestión Usuarios" href='../Controller/USUARIOS_Controller.php'>
							Gestión Usuarios
						</a>
					</li>
					<li>
						<a class="Gestión Productos" href='../Controller/PRODUCTOS_Controller.php'>
							Gestión Productos
						</a>
					</li>
					<li>
						<a class="Gestión Categorias" href='../Controller/CATEGORIAS_Controller.php'>
							Gestión Categorias
						</a>
					</li>
					<li>
						<a class="intercambios" href='../Controller/INTERCAMBIOS_Controller.php'>
							Intercambios
						</a>
					</li>
					<li>
						<a class="Misintercambios" href='../Controller/INTERCAMBIOS_Controller.php?person=me'>
							Mis intercambios
						</a>
					</li>
					<li>
						<a class="mensajes" href='../Controller/MENSAJES_Controller.php'>
							mensajes
						</a>
					</li>
					<li>
						<a class="valoraciones" href='../Controller/VALORACIONES_Controller.php'>
							valoraciones
						</a>
					</li>
					<li>
						<a class="Gestión MiPerfil" href='../Controller/USUARIOS_Controller.php?action=SHOWCURRENT&&login=<?php echo $_SESSION['login']; ?>'>
							Mi perfil
						</a>
					</li>

				</ul>
				
			</div>
		</div>
		

	</nav>