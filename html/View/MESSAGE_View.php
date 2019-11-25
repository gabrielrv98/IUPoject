<?php

class MESSAGE{

	private $string; 
	private $volver;

	function __construct($stringM, $volver){
		session_start();
		include '../Locale/Strings_'.$_SESSION['idioma'].'.php';
		if(is_string($stringM))	$this->string = $strings[$stringM];
		else {
			$this->string = '';
			foreach ($stringM as $key) {
				$this->string .=  "\r\n".$strings['errorIn'].' '. $strings[$key[0]] . ' - ' .$strings[$key[2]];
			}
			
		}
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
		echo nl2br($this->string);
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
