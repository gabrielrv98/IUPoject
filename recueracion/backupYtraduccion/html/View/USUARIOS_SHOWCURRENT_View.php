<?php
//Clase : USUARIO_SHOWCURRENT_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra todos los campos con los datos del usuario
//-------------------------------------------------------

class USUARIOS_SHOWCURRENT {

	var $lista;
	var $productos;


	function __construct($lista,$productos){ 
		$this->lista = $lista;
		$this->productos = $productos;
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
			<th class="DNI">
				DNI
			</th>
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
			<th class="alergias">
				Alergias
			</th>
			<th class="direccion">
				Direccion
			</th>
			<th class="cp">
				CP
			</th>
			<th class="sexo">
				Sexo
			</th>
			<th class="tipo_usuario">
				tipo
			</th>
			<th class="activado">
				activado
			</th>
			<tr>
				<td>
					<?php echo $this->lista['LOGIN'] ; ?>
				</td>
				<td>
					<?php echo $this->lista['DNI']; ?>
				</td>
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
				<td>
					<?php echo $this->lista['ALERGIAS']; ?>
				</td>
				<td>
					<?php echo $this->lista['DIRECCION']; ?>
				</td>
				<td>
					<?php echo $this->lista['CODIGO_POSTAL']; ?>
				</td>
				<td class="<?php echo $this->lista['SEXO']; ?>">
					sexo
				</td>
				<td class="<?php echo $this->lista['TIPO_USUARIO']; ?>">
					tipo
				</td>
				<td class="<?php echo $this->lista['ACTIVADO']; ?>">
					activado
				</td>
			</tr>

		</table>
		<br>

		<div>
			<label class="ofertas" style="font-size: 150%; text-decoration: underline;"> Ofertas</label><br>

			<?php foreach ($this->productos as $key) { ?>
				<a href="../Controller/PRODUCTOS_Controller.php?action=SHOWCURRENT&&id=<?php echo $key['ID']; ?>"> <?php echo $key['TITULO'] ?> </a><br>
			 <?php } ?>

		</div>

		<div>
			<label class="transacciones" style="font-size: 150%; text-decoration: underline;"> transacciones</label>
			
		</div>

		<a href='../Controller/USUARIOS_Controller.php'> <img src="../View/icon/back.ico" height="32" width="32"> </a>
		<br><br>

		<?php
		include '../View/Footer.php';
	}

}

?>