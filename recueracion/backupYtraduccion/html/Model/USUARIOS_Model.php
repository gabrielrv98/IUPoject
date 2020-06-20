
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
	    if ( $this->tipo_usuario != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "TIPO_USUARIO LIKE '%" .$this->tipo_usuario. "%'";
	    }
	    if ( $this->activado != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "ACTIVADO LIKE '%" .$this->activado. "%'";
	    }


	    if (!$or) $sql = $sql . '1';

    

    $sql = $sql . " )";
    $toRet = $this->mysqli->query($sql);
    return $toRet ? $toRet : '00004';
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
   		if(writeAndLog($sql))	return   '00005';

	}
	return '00006';
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{

	$sql = "SELECT * 
			FROM USUARIOS
			WHERE ( login = '$this->login')";


	$toRet = $this->mysqli->query($sql);
	return $toRet ? $toRet->fetch_array() : '00015';
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

		if($result = 1) return '00007';// si la actualizacion fue existosa
	}
	return '00008';// si el numero de tuplas de vuelta es mayor que 1 o la actualizacion tuvo un error
}

//funcion getUsuarios(): devuelve todos los usuarios
// devuelve un array con los nombres, apellidos y dni de los usuarios
function getUsuarios(){
	$sql = "SELECT DISTINCT NOMBRE, APELLIDOS, DNI
			FROM USUARIOS 
			";
	
	$resultado = $this->mysqli->query($sql);
	return $resultado;
}

//funcion getNombre(): devuelve lel nombre y apellidos en base al DNI
// devuelve un array con el nombres y apellido
function getNombre(){
	$sql = "SELECT DISTINCT NOMBRE, APELLIDOS
			FROM USUARIOS 
			WHERE DNI = '".$this->dni."'
			";
	
	$resultado = $this->mysqli->query($sql);
	$resultado = $resultado-> fetch_array();
	return $resultado;
}

//funcion getUsuariosConProductos(): devuelve los usuarios con algun producto ofertado
// devuelve un array con los nombres, apellidos y dni de los usuarios
function getUsuariosConProductos(){
	$sql = "SELECT DISTINCT NOMBRE, APELLIDOS, DNI
			FROM USUARIOS 
			INNER JOIN  PRODUCTOS ON PRODUCTOS.VENDEDOR_DNI = USUARIOS.DNI
			";
	
	$resultado = $this->mysqli->query($sql);
	return $resultado;
}

//funcion getProductos(): devuelve los productos a partir del dni del usuario
// devuelve un array con el id y titulo del producto
function getProductos(){
	$sql = "SELECT DISTINCT TITULO, ID
			FROM PRODUCTOS 
			INNER JOIN  USUARIOS ON PRODUCTOS.VENDEDOR_DNI = USUARIOS.DNI
			WHERE (DNI = '$this->dni')
			";
	
	$resultado = $this->mysqli->query($sql);
	return $resultado;
}

//funcion getDNI(): devuelve el DNI del usuario
// devuelve true si es un administrador, devuelve false si es un usuario
function getDNI(){
	$sql = "SELECT DNI
			FROM USUARIOS
			WHERE (
				(login = '$this->login') 
			)";
	$resultado = $this->mysqli->query($sql);
	$resultado = $resultado-> fetch_array();
	return $resultado['DNI'];
}

//funcion getLogin(): devuelve el login del usuario
// devuelve true si es un administrador, devuelve false si es un usuario
function getLogin(){
	$sql = "SELECT LOGIN
			FROM USUARIOS
			WHERE (
				(DNI = '$this->dni') 
			)";
	$resultado = $this->mysqli->query($sql);
	$resultado = $resultado-> fetch_array();
	return $resultado['LOGIN'];
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

//funcion getIntercambios(): devuelve los productos del usuario
// Recoje los productos a partir de ID del usuario
function getIntercambios(){

	$sql = "SELECT DNI
			FROM USUARIOS
			WHERE 
				(login = '$this->login') 
			";
	$resultado = $this->mysqli->query($sql);
	$resultado = $resultado-> fetch_array();
	$dni = $resultado['DNI'];


	$sql = "SELECT DISTINCT * , INTERCAMBIO.ID as ID
			FROM INTERCAMBIO, PRODUCTOS
			WHERE 
				(VENDEDOR_DNI = '$dni'
				AND
				(PRODUCTOS.ID = INTERCAMBIO.ID_PRODUCTO1 or
				 PRODUCTOS.ID = INTERCAMBIO.ID_PRODUCTO2) )
			";

	return $this->mysqli->query($sql);
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
		return '00009';
	}
	else{
		$tupla = $resultado->fetch_array();
		if ($tupla['PASSWORD'] == $this->password){// si la contraseña es igual
			if ($tupla['ACTIVADO'] == "activado") {// si el usuario esta activado
				return '00011';
			}else return '00009';
		}
		else{
			return '00010';
		}
	}
}//fin metodo login

//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD()
{	
	// si el usuario no existe se devolveria true a toRet
	$toRet = $this->Register();
	return $toRet;
/*
	switch ($toRet) {
		case '00012':
			return '00001';
			break;
		case '00013':
			return '00003';
			break;
		case '00014':
			return '00002';
			break;
		default:
			return '00016';
			break;
	}
*/
}

//Metodo Register
//Comprueba si existe un usuario con el mismo login
function Register(){

		$sql = "select * from USUARIOS where login = '".$this->login."'";

		$result = $this->mysqli->query($sql);
		if ($result->num_rows == 1){  // existe el usuario
				return '00012';
			}
		else{
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
				if( !isset($_SESSION['login'])) $_SESSION['login'] = $this->login;
				if (!writeAndLog($sql)) {//llama al metodo para loggear la consulta y si la salida es false devuelve Error de insercion
					return '00013';
				}
				else{
					return '00014'; //operacion de insertado correcta
				}
		}

	}


}//fin de clase

?> 