<?php
//Clase : USUARIO_SHOWCURRENT_View
//Creado el : 3-06-20
//Creado por: grvidal
//Muestra unos campos de todos las tuplas de los PRODUCTOS
//-------------------------------------------------------

class PRODUCTOS_SHOWCURRENT {

	var $lista;


	function __construct($datos){
		//session_start();
		$this->lista = $datos;
		$this->render();
	}

	function render(){ 
		?>
		
		<head>
			<title class="TShowC"><?php echo $strings['TShowC']; ?></title>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
		</head>

		<?php include '../View/Header.php'; //header necesita los strings
		include_once '../Model/USUARIOS_Model.php';
		$usuario = new USUARIOS_Model('','','','','',$this->lista['VENDEDOR_DNI'],'','','','','','','','');//Recuperamos el usuario  
		$nombre =  $usuario->getNombre();//obtenemos su nombre y apellidos
		$nombre = $nombre['NOMBRE'] . ' ' . $nombre['APELLIDOS'];// y los colocamos visualmente
		?>

		
		<h1 class="TShowC"><?php echo $strings['TShowC']; ?></h1>
		<div>
		<table border = ¨1¨>
			<th class="tituloProducto">
				<?php echo $strings['tituloProducto']; ?>
			</th>
			<th class="descripcionProducto">
				<?php echo $strings['descripcionProducto']; ?>
			</th>
			<th class="fotoProducto">
				<?php echo $strings['fotoProducto']; ?>
			</th>
			<th class="name">
				<?php echo $strings['name']; ?>
			</th>
			<th class="estado">
				<?php echo $strings['estado']; ?>
			</th>
				<tr>
					<td>
						<?php  
						echo $this->lista['TITULO']; ?>
					</td>
					<td>
						<?php echo $this->lista['DESCRIPCION'] ; ?>
					</td>
					<td>
						<img src="<?php echo $this->lista['FOTO'];?>" height="42" width="42">
					</td>
					<td>
						<?php  
						echo $nombre;
						?>
					</td>
					<td class="<?php echo $this->lista['ESTADO']; ?>">
						<?php echo $strings[$this->lista['ESTADO']]; ?>
					</td>
				</tr>
			
		</table>
	</div>

		<br>
		<a href="../../Controller/PRODUCTOS_Controller.php"> <img src="../View/icon/back.ico" height="32" width="32"> </a>
		<br><br>

		<?php
		include '../View/Footer.php';
	}

}

?>