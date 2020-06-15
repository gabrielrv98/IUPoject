<?php
//Clase : USUARIO_SHOWCURRENT_View
//Creado el : 2-10-2019
//Creado por: grvidal
//Muestra todos los campos con los datos del usuario
//-------------------------------------------------------

class USUARIOS_SHOWCURRENT {

	var $lista;
	var $datos;


	function __construct($lista){
		//session_start();
		$this->lista = $lista;
		$this->render();
	}

	function render(){
	
		include '../Locale/Strings_' . $_SESSION['idioma'] . '.php'; 

		?>
		<head>
			<title><?php echo $strings['TShowC']; ?></title>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
		</head>

		<?php include '../View/Header.php'; //header necesita los strings ?>

		<h1> <?php echo $strings['TShowC']; ?> </h1>
		<table border="1">
			<th class="Login">
				<?php echo $strings['Login']; ?>
			</th>
			<th class="DNI">
				DNI
			</th>
			<th class="name">
				<?php echo $strings['name']; ?>
			</th>
			<th class="surname">
				<?php echo $strings['surname']; ?>
			</th>
			<th class="tlf">
				<?php echo $strings['tlf']; ?>
			</th>
			<th class="email">
				Email
			</th>
			<th class="bDate">
				<?php echo $strings['bDate']; ?>
			</th>
			<th class="alergias">
				<?php echo $strings['alergias']; ?>
			</th>
			<th class="direccion">
				<?php echo $strings['direccion']; ?>
			</th>
			<th class="cp">
				<?php echo $strings['cp']; ?>
			</th>
			<th class="sexo">
				<?php echo $strings['sexo']; ?>
			</th>
			<th class="tipo_usuario">
				<?php echo $strings['tipo_usuario']; ?>
			</th>
			<th class="activado">
				<?php echo $strings['activado']; ?>
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
					<?php echo $strings[$this->lista['SEXO']]; ?>
				</td>
				<td class="<?php echo $this->lista['TIPO_USUARIO']; ?>">
					<?php echo $strings[$this->lista['TIPO_USUARIO']]; ?>
				</td>
				<td class="<?php echo $this->lista['ACTIVADO']; ?>">
					<?php echo $strings[$this->lista['ACTIVADO']]; ?>
				</td>
			</tr>

		</table>
		<br>

		<div>
			<label class="ofertas"> <?php echo $strings['ofertas'] ; ?></label>

		</div>

		<div>
			<label class="transacciones"> <?php echo $strings['transacciones'] ; ?></label>
			
		</div>

		<a href='../Controller/USUARIOS_Controller.php'> <img src="../View/icon/back.ico" height="32" width="32"> </a>
		<br><br>

		<?php
		include '../View/Footer.php';
	}

}

?>