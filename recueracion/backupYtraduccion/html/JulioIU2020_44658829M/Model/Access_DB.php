<?php
//----------------------------------------------------
// DB connection function
// Can be modified to use CONSTANTS defined in config.inc
//----------------------------------------------------
include_once '../Model/config.php';

function ConnectDB()
{
    $mysqli = new mysqli(host, user, pass);

    $mysqli->select_db(BD);

    if ($mysqli->query("SELECT DATABASE()")->fetch_row()[0] != BD) {

    	return false;
    }else if ($mysqli->connect_errno) {
		//echo "Fallo al conectar a MySQL: (" , $mysqli->connect_errno ,") ", $mysqli->connect_error, './index.php';
		return false;
	}
	else{
		return $mysqli;
	}
}

?>
