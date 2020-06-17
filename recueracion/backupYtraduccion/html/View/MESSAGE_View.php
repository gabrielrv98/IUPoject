<?php

class MESSAGE{

	private $string; 
	private $volver;
	private $stringA;

	function __construct($stringM, $volver){

		$this->volver = $volver;	
		$this->string = $stringM;

		if(is_string($stringM))		$this->render(); // si $stringM es una cadena se llama a la vista de una cadena
		else 	$this->renderArray();//en caso contrario se llama a vista de array
			
			
		
	}


	function render(){

		
		include '../View/Header.php';
?>
		<br>
		<br>
		<br>
		<p>
		<H3 class=" <?php echo $this->string ; ?>" >
			Mensaje en texto
		</H3>
		</p>
		<br>
		<br>
		<br>

		<a href="<?php echo $this->volver; ?>" >
			<img src="../View/icon/back.ico" height="32" width="32">
		</a>
<?php
		include '../View/Footer.php';
	} //fin metodo render


	function renderArray(){

		include '../View/Header.php';
?>
		<br>
		<br>
		<br>
		<p>
		<br>

		<?php
			foreach ($this->string as $key ) {
				?>
				<label class="<?php echo $key; ?>" ></label>
		<br>
<?php
			}
?>	

		</p>
		<br>
		<br>
		<br>

		<a href="<?php echo $this->volver; ?>" >
			<img src="../View/icon/back.ico" height="32" width="32">
		</a>
<?php
		include '../View/Footer.php';
	}

}

?>
