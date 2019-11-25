<?php
	
//Clase :CLEAN_test.php
//Creado el : 20-11-2019
//Creado por: grvidal
//Test para eliminar los bojetos creados para los tests
//-------------------------------------------------------

	$TITULACION = new TITULACION_Model('codTest','','','');
	$TITULACION->DELETE();
	$PROFESOR = new PROFESOR_Model('09635517N','','','','');
	$PROFESOR->DELETE();
	$CENTRO = new CENTRO_Model("CodCent","",'','','');
	$CENTRO->DELETE();
	$EDIFICIO = new EDIFICIO_Model("CodEdi","","","");
	$EDIFICIO->DELETE();


?>