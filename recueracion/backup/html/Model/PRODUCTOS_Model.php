
<?php

//Clase : USUARIOS_Modelo
//Creado el : 2-06-2020
//Creado por: grvidal
//Modelo de usuarios para realizar las acciones sobre la base de datos
//-------------------------------------------------------

class PRODUCTOS_Model {

	var $id;
	var $titulo;
	var $descripcion;
	var $foto;
	var $vendedorDNI;
	var $estado;
	var $mysqli;

//Constructor de la clase
//Recive como entrada los datos persnales y crea la clase USUARIO_Model
function __construct($id,$titulo,$descripcion,$foto,$vendedorDNI,$estado){
	$this->id = $id;
	$this->titulo = $titulo;
	$this->descripcion = $descripcion;
	$this->foto = $foto;
	$this->vendedorDNI = $vendedorDNI;
	$this->estado = $estado;

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
}

//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Los productos se pueden
// subir todas las veces que quieras ya que es en base a las existencias
// e intención del vendedor.
function ADD()
{	


	if($this->id != '' ){
		$sql = "select * from PRODUCTOS where ID = '".$this->id."'";
		$result = $this->mysqli->query($sql);
		if ($result->num_rows == 1){  // existe el usuario
				return '00001';
			}
	}

	$sql = "INSERT INTO PRODUCTOS (
			ID,
			TITULO,
			DESCRIPCION,
			FOTO,
			VENDEDOR_DNI,
			ESTADO) 
				VALUES (
					'".$this->id."',
					'".$this->titulo."',
					'".$this->descripcion."',
					'".$this->foto."',
					'".$this->vendedorDNI."',
					'".$this->estado."'
					)";

		include '../Model/BD_logger.php';//se incluye el archivo con el log
		if (!writeAndLog($sql)) {//llama al metodo para loggear la consulta y si la salida es false devuelve Error de insercion
			return '00003';
		}
		else{
			return '00002'; //operacion de insertado correcta
		}

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
    		FROM PRODUCTOS
    		WHERE ( ";

    $or = false;

    	if($this->id != ''){
	    	$sql = $sql . "ID LIKE '%" .$this->id. "%'";
	    	$or = true;
	    } 

	    if ( $this->titulo != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;
	    	$sql = $sql . "TITULO LIKE '%" .$this->titulo. "%'";
	    	
	    }   

	   if ( $this->descripcion != '' ){
	   		if ($or) $sql = $sql .  ' AND ';
	    	else $or = true;

	    	$sql = $sql . "DESCRIPCION LIKE '%" .$this->descripcion. "%'";
	    } 
	    if ( $this->vendedorDNI != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "VENDEDOR_DNI LIKE '%" .$this->vendedorDNI. "%'";
	    } 

	    if ( $this->estado != '' ){
	    	if ($or) $sql = $sql .' AND ';
	    	else $or = true;

	    	$sql = $sql . "ESTADO LIKE '%" .$this->estado. "%'";
	    } 

	    if (!$or) $sql = $sql . '1';

    

    $sql = $sql . " )";
    $toRet = $this->mysqli->query($sql);
    return $toRet ? $toRet : 'Error de gestor de base de datos';
}

// se recojen todas las tuplas de la base de datos y se pasan como array
function SHOW_ALL(){
	$sql = "SELECT * 
			FROM PRODUCTOS";
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

		

	}

function registrar(){

			
		
	}

}//fin de clase

?> 