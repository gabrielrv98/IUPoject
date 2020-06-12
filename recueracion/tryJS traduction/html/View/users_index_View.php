<?php

class Index {

	function __construct(){
		$this->render();
	}

	function render(){
	
		include '../Locale/Strings_SPANISH.php';

		?>
	<head>
			<title class="Intercambio de tiempo"> <?php echo $strings['Intercambio de tiempo']; ?></title>
			<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  			<link rel="stylesheet" href="/resources/demos/style.css">
			<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	</head>

		<?php
		include '../View/Header.php';
		
?>

	<label > <h1>Aqui empieza la vista index</h1></label>
	<p> En esta aplicacion ppuedes comprar o vender productos hechos a mano de agricultura</p>
<?php
	include '../View/Footer.php';
	}// fin del metodo render


}

?>