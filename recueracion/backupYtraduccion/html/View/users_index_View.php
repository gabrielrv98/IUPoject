<?php

class Index {

	var $productos;
	var $categorias;

	function __construct($productos,$categorias){
		$this->categorias = $categorias;
		$this->productos = $productos;
		$this->render();
	}

	function render(){

		?>
	<head>
			<title class="Intercambio de tiempo"> Intercambio de tiempo </title>

	</head>

		<?php
		include '../View/Header.php';
		
?>

	<label > <h1 class="indexTitle">Aqui empieza la vista index</h1></label>

	<form name = 'Form' action='../Controller/PRODUCTOS_Controller.php?action=SEARCH' method='post' onsubmit="return comprobarProductoSearchShort(this);" enctype="multipart/form-data">
		<label class="titulo"></label><label> </label><input type="text" name="titulo" id="titulo" onblur="comprobarAlfabeticoVacio(this,50);"><label> </label><label class="horasUnidades"></label><label> </label><input type="number" name="horasUnidades" style="width:50px" onblur="comprobarEnteroVacio(this);">
				<button type="submit" name='action' class="btn btn-primary submit" value="SEARCH" >
					Buscar
				</button>
	</form>
		<hr>

		<table border="1">
	
			<td>
				<a href="../Controller/Index_Controller.php?vista=RANKING_CATEGORIAS"><label class="rankingCategorias"></label></a>
			</td>
			<td>
				<a href="../Controller/Index_Controller.php?vista=RANKING_PRODUCTOS"><label class="rankingProductos"></label></a>
			</td>
			<td>
				<a href="../Controller/Index_Controller.php?vista=RANKING_INTERCAMBIOS"><label class="rankingTransacciones"></label></a>
			</td>
	</table>

	<table border="1">
	
			<?php 

			$columnas = 0;
			foreach ($this->categorias as $key ) { 
				if ($columnas == 0) { ?>

			<tr>
			<?php	 } ?>
		<td>		
			<div>
				<a href="../Controller/CATEGORIAS_Controller.php?action=SHOWCURRENT&&id=<?php echo $key['ID']; ?>">
					<img src='../View/icon/showuser.ico'>
				</a>
				<br>
				<label> 
					<?php echo $key['NOMBRE_CATEGORIA']; ?>
				</label>
			</div>
		</td>
	<?php $columnas = $columnas + 1;
		if( $columnas == 8){
			$columnas = 0;  ?>
		</tr>
		<?php } 
		} ?>
	</table>

	<p class="indexDescrip"> En esta aplicacion puedes comprar o vender productos hechos a mano de agricultura</p>
	<p class="indexFuncion"> La barra buscadora busca titulo y descripcion y las uidades iguales o mayores</p>


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
<br><br>

<?php
	include '../View/Footer.php';
	}// fin del metodo render


}

?>