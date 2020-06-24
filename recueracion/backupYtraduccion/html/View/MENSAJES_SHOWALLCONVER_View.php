<?php
//Clase : MENSAJES_SHOWALLCONVER_View
//Creado el : 20-06-20
//Creado por: grvidal
//Muestra unos campos de todos las tuplas de los MENSAJES
//-------------------------------------------------------

class MENSAJES_SHOWALLCONVER {

	var $lista;
	var $titulo;
	var $id;

	function __construct($titulo,$datos,$id){ 
		$this->id = $id;
		$this->titulo = $titulo;
		$this->lista = $datos;
		$this->render();
	}

	function render(){

		?>
		
		<head>
			<title class="TShowAll">Todo</title>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
		</head>

		<?php include '../View/Header.php'; //header necesita los strings ?>

		
		<h1 class="TShowAll"></h1><br>
		<label class="explicaionShowConver">Explicacion</label><br><br>
		<a href = '../Controller/MENSAJES_Controller.php?action=ADD&&idInter=<?php echo $this->id; ?>' style="color:#FFFFFF;">
			<img src='../View/icon/add_msg.png' height="42" width="42" >
		</a>

		<a href = '../Controller/MENSAJES_Controller.php?action=SEARCH'>
			<img src='../View/icon/searchuser.ico'>
		</a>
		<br>
		<div>
			<label class="titulosMsg tituloStyle"></label><label class="tituloStyle"> : <?php echo $this->titulo; ?></label>
			<a href = "../Controller/INTERCAMBIOS_Controller.php?action=SHOWCURRENT&&id=<?php echo $this->id; ?>"  > 
								<img src='../View/icon/showuser.ico'  height="42" width="42">
							</a>
			<br><br>
		<table border = ¨1¨>
			<th class="fecha">
				FECHA
			</th>
			<th class="usuario">
				USUARIO
			</th>
			<th class="coment">
				COMENT
			</th>
			<?php foreach ($this->lista as $key ) { ?>

					<tr>			
						
						<td>
							<?php echo $key['FECHA']; ?>
						</td>
						<td>
							<?php echo $key['LOGIN_USUARIO']; ?>
						</td>
						<td>
							<?php echo $key['CONTENIDO']; ?>
						</td>

						<?php if($usuario->isAdmin()){ // si el usuario es administrador puede eliminar toda la conversaicon directamente	
						?>
						<td>
							<a href = "../Controller/MENSAJES_Controller.php?action=EDIT&&id=<?php echo $key['MSG_ID']; ?>"  > 
								<img src='../View/icon/edit_msg.png' height="42" width="42">
							</a>
						</td>
						<?php }		?>
						<td>
							<a href = "../Controller/MENSAJES_Controller.php?action=SHOWCURRENT&&id=<?php echo $key['MSG_ID']; ?>"  > 
								<img src='../View/icon/showuser.ico'  height="42" width="42">
							</a>
						</td>
						<?php if($usuario->isAdmin()){ // si el usuario es administrador puede eliminar toda la conversaicon directamente	
						?>
						<td>
							<a href = "../Controller/MENSAJES_Controller.php?action=DELETE&&id=<?php echo $key['MSG_ID']; ?>"  > 
								<img src='../View/icon/bolsa-de-la-compra_delete.png' height="42" width="42">
							</a>
						</td>
						<?php }		?>
					</tr>
				<?php }		?>
			
		</table>
	</div>
		<br>
		<a href="../../Controller/MENSAJES_Controller.php"> <img src="../View/icon/back.ico" height="32" width="32"> </a>
		<br><br>

		<?php
		include '../View/Footer.php';
	}

}

?>