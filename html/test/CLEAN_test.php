<?php
	
//Clase :CLEAN_test.php
//Creado el : 20-11-2019
//Creado por: grvidal
//Test para eliminar los bojetos creados para los tests
//-------------------------------------------------------


	$CENTRO = new CENTRO_Model("CodCent","CodEdi",'nom','dir','resp');
	$CENTRO->DELETE();
	$EDIFICIO = new EDIFICIO_Model("CodEdi","","","");
	$EDIFICIO->DELETE();
?>