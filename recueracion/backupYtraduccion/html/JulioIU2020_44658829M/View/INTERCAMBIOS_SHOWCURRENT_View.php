<?php
//Clase : INTERCAMBIOS_SHOWCURRENT_View
//Creado el : 19-06-20
//Creado por: grvidal
//Muestra los detalles de la categoria seleccionada
//-------------------------------------------------------

class INTERCAMBIOS_SHOWCURRENT {

	var $lista;
	var $valoraciones1;
	var $valoraciones2;
	var $usuario;

	function __construct($datos,$valoraciones1,$valoraciones2,$usuario){

		$this->valoraciones1 = $valoraciones1;
		$this->valoraciones2 = $valoraciones2;
		$this->usuario = $usuario;
		$this->lista = $datos;
		$this->render();
	}

	function render(){  
		?>
		
		<head>
			<title class="TShowC"></title>
			<link rel="stylesheet" type="text/css" href="../View/css/estilo.css"> 
		</head>

		<?php include '../View/Header.php'; //header necesita los strings
		?>

		
		<h1 class="TShowC"></h1>
		<div>
		<table border = ¨1¨>
			<th>
				ID
			</th>
			<th class="idProd1">
				ID prod 1
			</th>
			<th class="idProd2">
				ID prod 2
			</th>
			<th class="unid1">
				Unidades 1
			</th>
			<th class="unid2">
				Unidades 2
			</th>
			<th class="accept1">
				Aceptacion 1
			</th>
			<th class="accept1">
				Aceptacion2
			</th>
				<tr>
					<td>
						<?php  
						echo $this->lista['ID']; ?>
					</td>
					<td>
						<?php echo $this->lista['ID_PRODUCTO1'], " ",$this->lista['TITULO1'] ; ?>
					</td>
					<td>
						<?php echo $this->lista['ID_PRODUCTO2'], " ",$this->lista['TITULO2'] ; ?>
					</td>
					<td>
						<?php echo $this->lista['UNIDADES1'] ; ?>
					</td>
					<td>
						<?php echo $this->lista['UNIDADES2'] ; ?>
					</td>
					<td>
						<?php echo $this->lista['ACCEPT1'] ; ?>
					</td>
					<td>
						<?php echo $this->lista['ACCEPT2'] ; ?>
					</td>
				</tr>
			
		</table>
	</div>
	
	<br>

<?php if ($this->usuario->isAdmin() || $this->lista['DNI1'] == $this->usuario->RellenaDatos()['DNI'] || $this->lista['DNI2'] == $this->usuario->RellenaDatos()['DNI'] ){//si es admin o el usuario esta implicado en el intercambio puede iniciar una conversacion?>
	<div class="ofrecerInterStyle" >
		<?php if ($this->lista['ACCEPT1'] == "denegado" || $this->lista['ACCEPT2'] == "denegado" ){//si aun no han aceptado ambas partes, se puede enviar un mensaje?>

			<a href="../../Controller/MENSAJES_Controller.php?action=ADD&&idInter=<?php echo $this->lista['ID'] ?>" > <img src="../View/icon/add_msg.png" height="40" width="40"> </a>
			<br>
			<label class="enviarMensaje">Enviar mensaje</label>

		<?php } else { //sino se avisa de que no se puede?>
			<label class="converOver">Conversacion finalizada</label>
		<?php } ?>
	</div>
<?php } ?>

	<div>
		<label   class="verProd" style="font-size: 150%; text-decoration: underline;">Ver</label><label style="font-size: 150%; text-decoration: underline;"> 1</label> <br>
		
			<a href="../Controller/PRODUCTOS_Controller.php?action=SHOWCURRENT&&id=<?php echo $this->lista['ID_PRODUCTO1']; ?>"> <?php echo $this->lista['TITULO1'] ?> </a>
		<br><br>

		<?php if ($this->valoraciones1) { ?>

		<label class="verValoracion"></label><br>
			<label class="puntuacion"></label><label> </label><label><?php echo $this->valoraciones1['PUNTUACION']; ?></label>
			<a href = "../Controller/VALORACIONES_Controller.php?action=SHOWCURRENT&&id=<?php echo $this->valoraciones1['ID']; ?>"  > 
				<img src='../View/icon/showuser.ico'  height="21" width="21">
			</a>

		<?php } else{ ?>

			<label class="noValorado"></label>
			
		<?php } ?>
			<br><br>
	</div>
	<div>
		<label   class="verProd" style="font-size: 150%; text-decoration: underline;">Ver</label><label style="font-size: 150%; text-decoration: underline;"> 2</label> <br>
		
			<a href="../Controller/PRODUCTOS_Controller.php?action=SHOWCURRENT&&id=<?php echo $this->lista['ID_PRODUCTO2']; ?>"> <?php echo $this->lista['TITULO2'] ?> </a>
			<br><br>

			<?php if ($this->valoraciones2) { ?>

			<label class="verValoracion"></label><br>
			<label class="puntuacion"></label><label> </label><label><?php echo $this->valoraciones2['PUNTUACION']; ?></label>
			<a href = "../Controller/VALORACIONES_Controller.php?action=SHOWCURRENT&&id=<?php echo $this->valoraciones2['ID']; ?>"  > 
				<img src='../View/icon/showuser.ico'  height="21" width="21">
			</a>
		<?php } else { ?>
		
			<label class="noValorado"></label>
			<?php if ($this->usuario->RellenaDatos()['DNI'] == $this->lista['DNI1']) { ?>
				
				<label class="hacerValoracion"></label>
				<a href = "../Controller/VALORACIONES_Controller.php?action=ADD&&id=<?php echo $this->valoraciones2['ID']; ?>"  > 
					<img src='../View/icon/showuser.ico'  height="21" width="21">
				</a>
			<?php } 

			} ?>
			<br><br>
		
	</div>

		<br>
		<a href="../../Controller/INTERCAMBIOS_Controller.php"> <img src="../View/icon/back.ico" height="32" width="32"> </a>
		<br><br>

		<?php
		include '../View/Footer.php';
	}

}

?>