<?php
//Clase : USUARIO_SHOWCURRENT_View
//Creado el : 3-06-20
//Creado por: grvidal
//Muestra unos campos de todos las tuplas de los PRODUCTOS
//-------------------------------------------------------

class PRODUCTOS_SHOWCURRENT {

	var $lista;
	var $categorias;


	function __construct($datos,$categorias){
		
		$this->lista = $datos;
		$this->categorias = $categorias;
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
		$login = $usuario->getLogin();
		?>

		
		<h1 class="TShowC"></h1>
		<div>
		<table border = ¨1¨>
			<th class="tituloProducto">
				titulo
			</th>
			<th class="descripcionProducto">
				descripcion
			</th>
			<th class="fotoProducto">
				foto
			</th>
			<th class="name">
				nombre
			</th>				
			<th class="origen">
				Origen
			</th>
			<th class="horasUnidades">
				Horas unidades
			</th>
			<th class="estado">
				estado
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
						<?php  echo $nombre; ?>
					</td>
					<td class="<?php echo $this->lista['ORIGEN']; ?>">
						<?php echo $this->lista['ORIGEN']; ?>
					</td>
					<td>
						<?php  echo $this->lista['HORAS_UNIDADES']; ?>
					</td>
					<td class="<?php echo $this->lista['ESTADO']; ?>">
						<?php echo $this->lista['ESTADO']; ?>
					</td>
				</tr>
			
		</table>
	</div>

	<div>
		<br>
		<label class="verUser" style="font-size: 150%; text-decoration: underline;"></label> <br>
		
			<a href="../Controller/USUARIOS_Controller.php?action=SHOWCURRENT&&login=<?php echo $login; ?>"> <?php echo $nombre ?> </a><br>

	</div>

	<div>
		<br>
		<label class="categorias" style="font-size: 150%; text-decoration: underline;"></label> <br>
		<?php foreach ($this->categorias as $key) { ?>
			<a href="../Controller/CATEGORIAS_Controller.php?action=SHOWCURRENT&&id=<?php echo $key['ID_CATEGORIA']; ?>"> <?php echo $key['NOMBRE_CATEGORIA'] ?> </a><br>
		<?php } ?>

	</div>

		<br>
		<a href="../../Controller/PRODUCTOS_Controller.php"> <img src="../View/icon/back.ico" height="32" width="32"> </a>
		<br><br>

		<?php
		include '../View/Footer.php';
	}

}

?>