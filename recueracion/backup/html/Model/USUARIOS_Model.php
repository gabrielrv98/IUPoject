
<?php

//Clase : USUARIOS_Modelo
//Creado el : 2-06-2020
//Creado por: grvidal
//Modelo de usuarios para realizar las acciones sobre la base de datos
//-------------------------------------------------------

class USUARIOS_Model {

	var $login;
	var $password;
	var $nombre;
	var $apellidos;
	var $dni;
	var $tlf;
	var $email;
	var $bday;
	var $alergias;
	var $direccion;
	var $cp;
	var $sexo;
	var $tipo_usuario;
	var $activado;
	var $mysqli;

//Constructor de la clase
//Recive como entrada los datos persnales y crea la clase USUARIO_Model
function __construct($login,$password,$nombre,$apellidos,$email,$dni,$tlf,$bday,$alergias,$direccion,$cp,$sexo,$tipo_usuario,$activado){
	$this->login = $login;
	$this->password = $password;
	$this->dni = $dni;
	$this->nombre = $nombre;
	$this->apellidos = $apellidos;
	$this->tlf = $tlf;
	$this->email = $email;
	$this->bday = $bday;
	$this->alergias = $alergias;
	$this->direccion = $direccion;
	$this->cp = $cp;
	$this->sexo = $sexo;
	$this->activado = $activado;
	$this->tipo_usuario = $tipo_usuario;

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
}

//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD()
{	
	// si el usuario no existe se devolveria true a toRet
	$toRet = $this->Register();
	if($toRet == 'true'){
		// se devuelve la cadena diciendo el exito de la insercion
		return $this->registrar();
	} 
	//se devuelve una cadena con de fallo de insercion
	else return 'Inserción fallida: el elemento ya existe'; 
}

//funcion de destrucción del objeto: se ejecuta automaticamente
//al finalizar el script
function __destruct()
{

}


//funcion SEARCH: hace una búsqueda en la tabla con
//los datos proporcionados. Si van vacios devuelve todos
function SEARCH()
{
    $sql = "SELECT * 
    		FROM USUARIOS
    		WHERE ( ";

    $or = false;

    	if($this->login != ''){
	    	$sql = $sql . "login LIKE '%" .$this->login. "%'";
	    	$or = true;
	    } 

	    if ( $this->dni != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;
	    	$sql = $sql . "DNI LIKE '%" .$this->dni. "%'";
	    	
	    }   

	   if ( $this->nombre != '' ){
	   		if ($or) $sql = $sql .  ' AND ';
	    	else $or = true;

	    	$sql = $sql . "nombre LIKE '%" .$this->nombre. "%'";
	    } 
	    if ( $this->apellidos != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "apellidos LIKE '%" .$this->apellidos. "%'";
	    } 

	    if ( $this->tlf != '' ){
	    	if ($or) $sql = $sql .' AND ';
	    	else $or = true;

	    	$sql = $sql . "telefono LIKE '%" .$this->tlf. "%'";
	    } 

	    if ( $this->email != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "email LIKE '%" .$this->email. "%'";
	    } 

	    if ( $this->bday != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "FechaNacimiento LIKE '%" .$this->bday. "%'";
	    } 
	    
	    if ( $this->sexo != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "sexo LIKE '%" .$this->sexo. "%'";
	    }

	    if ( $this->alergias != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "alergias LIKE '%" .$this->alergias. "%'";
	    }

	    if ( $this->direccion != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "direccion LIKE '%" .$this->direccion. "%'";
	    }

	    if ( $this->cp != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "codigo_postal LIKE '%" .$this->cp. "%'";
	    }

	    if (!$or) $sql = $sql . '1';

    

    $sql = $sql . " )";
    $toRet = $this->mysqli->query($sql);
    return $toRet ? $toRet : 'Error de gestor de base de datos';
}

// se recojen todas las tuplas de la base de datos y se pasan como array
function SHOW_ALL(){
	$sql = "SELECT * 
			FROM USUARIOS";
	return $this->mysqli->query($sql);
}

//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function DELETE()
{
	$sql = "SELECT *
			FROM USUARIOS
			WHERE (login = '$this->login')";

	$obj = $this->mysqli->query($sql);

	//Comprobacion de que la tupla es unica
	if( mysqli_num_rows($obj) == 1 ){

		$sql = "DELETE 
   			FROM USUARIOS
   			WHERE login = '$this->login'"; 

   		include '../Model/BD_logger.php';//se incluye el archivo con el log
   		//se reliza el log del delete	
   		return writeAndLog($sql) ? 'Borrado realizado con éxito' : 'errorDelete';
	}else return 'Error de gestor de base de datos';
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{

	$sql = "SELECT * 
			FROM USUARIOS
			WHERE ( login = '$this->login')";


	$toRet = $this->mysqli->query($sql);
	return $toRet ? $toRet->fetch_array() : 'Error de gestor de base de datos';
}


// funcion Edit: realizar el update de una tupla despues de comprobar que existe
function EDIT()
{

	$sql = "SELECT login 
				FROM USUARIOS
				WHERE (login = '$this->login')";

//se comprueba que el dni o el email no estan repetidos en otros usuarios
	$response = $this->mysqli->query($sql)->num_rows;
	if ($response == 1) {
		$sql = "UPDATE USUARIOS
			SET nombre = '$this->nombre',
				password = '$this->password',
				apellidos = '$this->apellidos',
				telefono = '$this->tlf',
				FechaNacimiento = '$this->bday',
				sexo = '$this->sexo',
				alergias = '$this->alergias',
				direccion = '$this->direccion',
				codigo_postal = '$this->cp',
				activado = '$this->activado',
				tipo_usuario = '$this->tipo_usuario'

			WHERE (login = '$this->login')";
		include '../Model/BD_logger.php';//se incluye el archivo con el log
		$result = writeAndLog($sql); // se realiza el log

		if($result = 1) return 'Actualización realizada con éxito';// si la actualizacion fue existosa
	}
	return 'Error de gestor de base de datos';// si el numero de tuplas de vuelta es mayor que 1 o la actualizacion tuvo un error
}


//funcion isAdmin(): se utiliza para comprobar si el usuario actual es administrador
// devuelve true si es un administrador, devuelve false si es un usuario
function isAdmin(){
	$sql = "SELECT tipo_usuario
			FROM USUARIOS
			WHERE (
				(login = '$this->login') 
			)";
	$resultado = $this->mysqli->query($sql);
	$resultado = $resultado-> fetch_array();
	if ($resultado['tipo_usuario'] == 'admin') {
		return true;
	}else return false;
}

// funcion login: realiza la comprobación de si existe el usuario en la bd y despues si la pass
// es correcta para ese usuario. Si es asi devuelve true, en cualquier otro caso devuelve el 
// error correspondiente
function login(){

	$sql = "SELECT *
			FROM USUARIOS
			WHERE (
				(login = '$this->login') 
			)";

	$resultado = $this->mysqli->query($sql);
	if ($resultado->num_rows == 0){
		return 'El login no existe';
	}
	else{
		$tupla = $resultado->fetch_array();
		if ($tupla['PASSWORD'] == $this->password){// si la contraseña es igual
			if ($tupla['ACTIVADO'] == "activado") {// si el usuario esta activado
				return true;
			}else return 'Este usuario esta desactivado';
		}
		else{
			return 'La password para este usuario no es correcta';
		}
	}
}//fin metodo login

//
function Register(){

		$sql = "select * from USUARIOS where login = '".$this->login."'";

		$result = $this->mysqli->query($sql);
		if ($result->num_rows == 1){  // existe el usuario
				return 'El usuario ya existe';
			}
		else{
	    		return true; //no existe el usuario
		}

	}

function registrar(){

			
		$sql = "INSERT INTO USUARIOS (
			login,
			password,
			dni,
			nombre,
			apellidos,
			telefono,
			email,
			FechaNacimiento,
			sexo,
			alergias,
			codigo_postal,
			direccion,
			activado,
			tipo_usuario) 
				VALUES (
					'".$this->login."',
					'".$this->password."',
					'".$this->dni."',
					'".$this->nombre."',
					'".$this->apellidos."',
					'".$this->tlf."',
					'".$this->email."',
					'".$this->bday."',
					'".$this->sexo."',
					'".$this->alergias."',
					'".$this->cp."',
					'".$this->direccion."',
					'".$this->activado."',
					'".$this->tipo_usuario."'
					)";

		include '../Model/BD_logger.php';//se incluye el archivo con el log

		if (!writeAndLog($sql)) {//llama al metodo para loggear la consulta y si la salida es false devuelve Error de insercion
			return 'Error en la inserción';
		}
		else{
			return 'Inserción realizada con éxito'; //operacion de insertado correcta
		}
	}

}//fin de clase

?> 