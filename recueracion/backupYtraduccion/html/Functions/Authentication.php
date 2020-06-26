<?php
/*
function IsAuthenticated()
grvidal
2/06/2020
Comprueba que la variable de sesion contiene login, si existe debuelve true
*/
function IsAuthenticated(){
	if (!isset($_SESSION['login'])){
		return false;
	}
	else{
		return true;
	}
} //fin de function IsAuthenticated()
?>

