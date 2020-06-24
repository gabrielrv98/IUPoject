<?php
//Clase : USUARIO_SHOWCURRENT_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra todos los campos con los datos del usuarios si eres administrador o propietario, si eres un usuario se esconden los privados
//-------------------------------------------------------

class USUARIOS_SHOWCURRENT {

	var $lista;
	var $productos;
	var $intercambios;
	var $usuarioApto;


	function __construct($lista,$productos,$usuario,$intercambios){ 
		$this->lista = $lista;
		$this->productos = $productos;
		$this->intercambios = $intercambios;

		
		if ( $usuario->isAdmin() || $usuario->RellenaDatos()['LOGIN'] == $lista['LOGIN']) {
			$this->usuarioApto = true;
		}else $this->usuarioApto = false;
		$this->render();
	}

	function render(){	

		?>
		<head>
			<title class="TShowC"><?php echo $strings['TShowC']; ?></title>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
		</head>

		<?php include '../View/Header.php'; //header necesita los strings ?>

		<h1 class="TShowC"></h1>
		<table border="1">
			<th class="Login">
				Login
			</th>
		<?php if ($this->usuarioApto) { ?>
			<th class="DNI">
				DNI
			</th>
		<?php } ?>
			<th class="name">
				nombre
			</th>
			<th class="surname">
				apellido
			</th>
			<th class="tlf">
				tlf
			</th>
			<th class="email">
				Email
			</th>
			<th class="bDate">
				Nacimiento
			</th>
		<?php if ($this->usuarioApto) { ?>
			<th class="alergias">
				Alergias
			</th>
			<th class="direccion">
				Direccion
			</th>
			<th class="cp">
				CP
			</th>
		<?php } ?>
			<th class="sexo">
				Sexo
			</th>
		<?php if ($this->usuarioApto) { ?>
			<th class="tipo_usuario">
				tipo
			</th>
			<th class="activado">
				activado
			</th>
		<?php } ?>
			<tr>
				<td>
					<?php echo $this->lista['LOGIN'] ; ?>
				</td>
			<?php if ($this->usuarioApto) { ?>
				<td>
					<?php echo $this->lista['DNI']; ?>
				</td>
			<?php } ?>
				<td>
					<?php echo $this->lista['NOMBRE'] ; ?>
				</td>					
				<td>
					<?php echo $this->lista['APELLIDOS'] ; ?>
				</td>
				<td>
					<?php echo $this->lista['TELEFONO']; ?>
				</td>
				<td>
					<?php echo $this->lista['EMAIL']; ?>
				</td>
				<td>
					<?php $date = explode("-",$this->lista['FECHANACIMIENTO']);
					echo $date[2].'-'.$date[1].'-'.$date[0]; ?>
				</td>
			<?php if ($this->usuarioApto) { ?>
				<td>
					<?php echo $this->lista['ALERGIAS']; ?>
				</td>
				<td>
					<?php echo $this->lista['DIRECCION']; ?>
				</td>
				<td>
					<?php echo $this->lista['CODIGO_POSTAL']; ?>
				</td>
			<?php } ?>
				<td class="<?php echo $this->lista['SEXO']; ?>">
					sexo
				</td>
			<?php if ($this->usuarioApto) { ?>
				<td class="<?php echo $this->lista['TIPO_USUARIO']; ?>">
					tipo
				</td>
				<td class="<?php echo $this->lista['ACTIVADO']; ?>">
					activado
				</td>
			<?php } ?>
			</tr>

		</table>
		<br>

		<div>
		<label   class="ofertas" style="font-size: 150%; text-decoration: underline;"></label> <br><br>
		<table border = ¨0¨>
				<?php $columnas = 0;
					foreach ($this->productos as $key ) { 
						if ($columnas == 0) { ?>

					<tr>
					<?php	 } ?>
				<td>		
					<div>
						<a href="../Controller/PRODUCTOS_Controller.php?action=SHOWCURRENT&&id=<?php echo $key['ID']; ?>">
							<img src='../View/icon/showuser.ico'>
						</a>
						<img src="<?php echo $key['FOTO'];?>" height="42" width="42">
						<br>
						<label> 
							<?php echo $key['TITULO']; ?>
						</label>
						<br>
						<label size ="10">
							<?php echo strlen($key['DESCRIPCION']) > 25 ? substr($key['DESCRIPCION'], 0,25): $key['DESCRIPCION'] ; ?>
						</label>
					</div>
				</td>
			<?php $columnas = $columnas + 1;
				if( $columnas == 5){
					$columnas = 0;  ?>
				</tr>
				<?php } 
				} ?>
		</table>
	</div><br><br>

		<div>
			<label class="transacciones" style="font-size: 150%; text-decoration: underline;"> transacciones</label><br>
			<?php foreach ($this->intercambios as $key) { ?>
				<a href="../Controller/INTERCAMBIOS_Controller.php?action=SHOWCURRENT&&id=<?php echo $key['ID']; ?>"> <?php echo $key['TITULO1'], " <-> ",$key['TITULO2'] ?> </a><br>
			 <?php } ?>
		</div>
		<br><br>
		<a href='../Controller/USUARIOS_Controller.php'> <img src="../View/icon/back.ico" height="32" width="32"> </a>
		<br><br>

		<?php
		include '../View/Footer.php';
	}

}

?>