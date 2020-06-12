<?php

class MESSAGE{

	private $string; 
	private $volver;
	private $stringA;

	function __construct($stringM, $volver){
		
		//session_start();
		include '../Locale/Strings_'. htmlspecialchars($_COOKIE["idioma"]) .'.php';

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
<?php		
		echo nl2br($strings[$this->string]);
?>
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

		<label class="errorIn" ></label>
		<br>

		<?php
			foreach ($this->string as $key ) {
				?>
				<label class="<?php echo $key[0]; ?>" > <?php echo $strings[$key[0]]; ?> </label>
<?php		
		echo " : ";
?>
		<label  > <?php echo $key[1]; ?> </label>
<?php		
		echo " : ";
?>
		<label class="<?php echo $key[2]; ?>" > <?php echo $strings[$key[2]]; ?> </label>
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
