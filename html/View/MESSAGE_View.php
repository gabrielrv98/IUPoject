<?php

class MESSAGE{

	private $string; 
	private $volver;

	function __construct($string, $volver){
		session_start();
		include '../Locale/Strings_'.$_SESSION['idioma'].'.php';
		if(is_string($string))	$this->string = $string;
		else $this->string = $string[3];
		$this->volver = $volver;	
		$this->render();
	}


	function render(){

		
		include '../View/Header.php';
?>
		<br>
		<br>
		<br>
		<p>
		<H3>
<?php		
		echo $strings[$this->string];
?>
		</H3>
		</p>
		<br>
		<br>
		<br>

<?php

		echo '<a href=\'' . $this->volver . "'>" . $strings['Volver'] . " </a>";
		include '../View/Footer.php';
	} //fin metodo render

}