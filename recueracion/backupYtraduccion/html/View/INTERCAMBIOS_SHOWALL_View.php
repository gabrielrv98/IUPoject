<?php
//Clase : INTERCAMBIOS_SHOWALL_View
//Creado el : 15-06-20
//Creado por: grvidal
//Muestra unos campos de todos las tuplas de los INTERCAMBIOS
//-------------------------------------------------------

class INTERCAMBIOS_SHOWALL {

	var $lista;


	function __construct($datos){ 
		$this->lista = $datos;
		$this->render();
	}

	function render(){

		?>
		
		<head>
			<title class="TShowAll"><?php echo $strings['TShowAll']; ?></title>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
		</head>

		<?php include '../View/Header.php'; //header necesita los strings
		include_once '../Model/USUARIOS_Model.php';
					$usuario = new USUARIOS_Model($_SESSION['login'],'','','','','','','','','','','','','');//Recuperamos el usuario que esta operando ?>

		
		<h1 class="TShowAll"></h1>
		<?php 
				if($usuario->isAdmin()){ // si el usuario es administrador puede añadir categorias
					?>
		<a href = '../Controller/INTERCAMBIOS_Controller.php?action=ADD' style="color:#FFFFFF;">
			<img src='../View/icon/bolsa-de-la-compra.png' height="42" width="42" >
		</a>

		<?php } ?>

		<a href = '../Controller/INTERCAMBIOS_Controller.php?action=SEARCH'>
			<img src='../View/icon/searchuser.ico'>
		</a>
		<br>
		<div>
		<table border = ¨1¨>
			<th class="idProd1">
				Prod 1
			</th>
			<th class="idProd2">
				Prod 2
			</th>
			<th class="unid1">
				Unidades 1
			</th>
			<th class="unid2">
				Unidades 2
			</th>
			<th class="accept1">
				aceptacion 1
			</th>
			<th class="accept2">
				aceptacion 1
			</th>
			<?php 
			foreach ($this->lista as $key ) {  ?>

				<tr>			
					<td>
						<?php echo $key['ID_PRODUCTO1'] , '-', "a lo mejor el titulo" ; ?>
					</td>
					<td>
						<?php echo $key['ID_PRODUCTO2'] , '-', "a lo mejor el titulo" ; ?>
					</td>
					<td>
						<?php echo $key['UNIDADES1'] ; ?>
					</td>
					<td>
						<?php echo $key['UNIDADES2']  ; ?>
					</td>
					<td class="<?php echo $key['ACCEPT1']  ; ?>">
						<?php echo $key['ACCEPT1']  ; ?>
					</td>
					<td class="<?php echo $key['ACCEPT2']  ; ?>">
						<?php echo $key['ACCEPT2']  ; ?>
					</td>
					<td>
						<a href = "../Controller/INTERCAMBIOS_Controller.php?action=EDIT&&id=<?php echo $key['ID']; ?>"  > 
							<img src='../View/icon/edituser.ico'>
						</a>
					</td>

					<td>
						<a href = "../Controller/INTERCAMBIOS_Controller.php?action=SHOWCURRENT&&id=<?php echo $key['ID']; ?>"  > 
							<img src='../View/icon/showuser.ico'>
						</a>
					</td>
					<?php if($usuario->isAdmin()){ // si el usuario es administrador es le ofrece busqeuda por otros usuarios		
					?>
					<td>
						<a href = "../Controller/INTERCAMBIOS_Controller.php?action=DELETE&&id=<?php echo $key['ID']; ?>"  > 
							<img src='../View/icon/bolsa-de-la-compra_delete.png' height="42" width="42">
						</a>
					</td>
					<?php } ?>
				</tr>
			<?php }		?>
			
		</table>
	</div>
		<br>
		<a href="../../Controller/Index_Controller.php"> <img src="../View/icon/back.ico" height="32" width="32"> </a>
		<br><br>

		<?php
		include '../View/Footer.php';
	}

}

?>