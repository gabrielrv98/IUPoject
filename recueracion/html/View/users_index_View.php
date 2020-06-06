<?php

class Index {

	function __construct(){
		$this->render();
	}

	function render(){
	
		include '../Locale/Strings_SPANISH.php';
		include '../View/Header.php';
		include '../View/Footer.php';
	}

}

?>