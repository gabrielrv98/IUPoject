
<?php

//Clase : USUARIOS_Modelo
//Creado el : 2-10-2019
//Creado por: grvidal
//Modelo de usuarios para realizar las acciones sobre la base de datos
//-------------------------------------------------------

class USUARIOS_Model {

	var $login;
	var $password;
	var $nombre;
	var $dni;
	var $apellidos;
	var $tlf;
	var $email;
	var $bday;
	var $foto;
	var $sexo;
	var $mysqli;

//Constructor de la clase
//

function __construct($login,$password,$dni,$nombre,$apellidos,$tlf,$email,$bday,$foto,$sexo){
	$this->login = $login;
	$this->password = $password;
	$this->dni = $dni;
	$this->nombre = $nombre;
	$this->apellidos = $apellidos;
	$this->tlf = $tlf;
	$this->email = $email;
	$this->bday = $bday;
	$this->foto = $foto;
	$this->sexo = $sexo;
	

	include_once '../Model/Access_DB.php';
	$this->mysqli = ConnectDB();
}

//comprueba que el login tenga el formato correcto
function comprobar_login()
{
	$array = array();
	$array[0] = 'login';

	$this->login = trim($this->login);

	if(empty($this->login)){//comprobamos si esta vacio
		$array[1] = "00001";
		$array[2] = "paramVacio";

		return $array;

	}else if(strlen($this->login) > 15){//comprobamos si es muy larga
		$array[1] = "00002";
		$array[2] = "toolong";

		return $array;

	}else if(strlen($this->login) < 3){//comprobamos si es muy corta
		$array[1] = "00003";
		$array[2] = "tooshortNoNNum";

		return $array;

	}else if ( !preg_match('/^\w[\w_]*$/', $this->login) ) {//comprobamos si contiene caracteres no alfabeticos, numero o barrabaja
		$array[1] = "00090";
		$array[2] = "textonly";
		return $array;
	}

	return true;
}

//comprueba que la password tenga formato correcto
function comprobar_password()
{
	$array = array();
	$array[0] = 'password';

	$this->password = trim($this->password);

	if(empty($this->password)){//comprobamos si esta vacio
		$array[1] = "00001";
		$array[2] = "paramVacio";

		return $array;

	}else if(strlen($this->password) > 30){//comprobamos si es muy larga
		$array[1] = "00002";
		$array[2] = "toolong";

		return $array;

	}else if(strlen($this->password) < 3){//comprobamos si es muy corta
		$array[1] = "00003";
		$array[2] = "tooshortNoNNum";

		return $array;

	}else if ( !preg_match('/^\w[\w_]*$/', $this->password) ) {//comprobamos si contiene caracteres no alfabeticos, numero o barrabaja
		$array[1] = "00090";
		$array[2] = "textonly";
		return $array;
	}

	return true;
}

//comprueba que el dni tenga formato correcto y la letra este bien
function comprobar_dni()
{
	$array = array();
	$array[0] = "dni";
	$letras =  array('T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T');
    

	$this->dni = trim($this->dni);

	if(empty($this->dni)){//comprobamos si esta vacio
		$array[1] = "00001";
		$array[2] = "paramVacio";

		return $array;

	}else if( !preg_match('/^\d{8}[A-Z]$/', $this->dni) ){//comprobamos si coincide con la expresion esperada
		$array[1] = "00010";
		$array[2] = "dniError";

		return $array;
	}else if (substr($this->dni, -1) != $letras[substr($this->dni, 0,-1) % 23] ){
		$array[1] = "00010";
		$array[2] = "dniError";

		return $array;
	}

	return true;
}

//comprueba que solo sean letras y espacios
function comprobar_nombre()
{
	$array = array();
	$array[0] = 'name';

	$this->nombre = trim($this->nombre);

	if(empty($this->nombre)){//comprobamos si esta vacio
		$array[1] = "00001";
		$array[2] = "paramVacio";

		return $array;

	}else if(strlen($this->nombre) > 30){//comprobamos si es muy larga
		$array[1] = "00002";
		$array[2] = "toolong";

		return $array;

	}else if(strlen($this->nombre) < 3){//comprobamos si es muy corta
		$array[1] = "00003";
		$array[2] = "tooshortNoNNum";

		return $array;

	}else if( !preg_match('/^[a-z ]*$/i', $this->nombre) ){//comprobamos si coincide con la expresion esperada
		$array[1] = "00030";
		$array[2] = "textonly";

		return $array;
	}

	return true;
}

//comprueba que sean solo letras y espacios
function comprobar_apellidos()
{
	$array = array();
	$array[0] = 'surname';

	$this->apellidos = trim($this->apellidos);

	if(empty($this->apellidos)){//comprobamos si esta vacio
		$array[1] = "00001";
		$array[2] = "paramVacio";

		return $array;

	}else if(strlen($this->apellidos) > 50){//comprobamos si es muy larga
		$array[1] = "00002";
		$array[2] = "toolong";

		return $array;

	}else if(strlen($this->apellidos) < 3){//comprobamos si es muy corta
		$array[1] = "00003";
		$array[2] = "tooshortNoNNum";

		return $array;

	}else if( !preg_match('/^[a-z ]*$/i', $this->apellidos) ){//comprobamos si coincide con la expresion esperada
		$array[1] = "00030";
		$array[2] = "textonly";

		return $array;
	}

	return true;
}

//còmprueba que el telefono tenga formato correcto con o sin +34, 0034, 34
function comprobar_tlf()
{
	$array = array();
	$array[0] = 'tlf';

	$this->tlf = trim($this->tlf);

	if(empty($this->tlf)){//comprobamos si esta vacio
		$array[1] = "00001";
		$array[2] = "paramVacio";

		return $array;

	}else if( !preg_match('/^(\+34|0034|34)?[0-9]{9}$/', $this->tlf) ){//comprobamos si coincide con la expresion esperada
		$array[1] = "00070";
		$array[2] = "tlfError";

		return $array;
	}

	return true;
}

//comprueba que el email tenga formato correcto
function comprobar_email()
{
	$array = array();
	$array[0] = 'email';

	$this->email = trim($this->email);

	if(empty($this->email)){//comprobamos si esta vacio
		$array[1] = "00001";
		$array[2] = "paramVacio";

		return $array;

	}else if(strlen($this->email) > 60){//comprobamos si es muy larga
		$array[1] = "00002";
		$array[2] = "toolong";

		return $array;

	}else if(strlen($this->email) < 3){//comprobamos si es muy corta
		$array[1] = "00003";
		$array[2] = "tooshortNoNNum";

		return $array;

	}else if( !preg_match('/^[a-zñ0-9]+@([ña-z]+.)+(es|org|com)$/', $this->email) ){//comprobamos si coincide con la expresion esperada
		$array[1] = "00120";
		$array[2] = "emailErrorCode";

		return $array;
	}

	return true;
}

//comprueba que la fecha sea formato yyyy-mm-dd
function comprobar_fecha()
{
	$array = array();
	$array[0] = 'bDate';

	$this->bday = trim($this->bday);

	if(empty($this->bday)){//comprobamos si esta vacio
		$array[1] = "00001";
		$array[2] = "paramVacio";

		return $array;

	}else if( !preg_match('/^\d{4}-\d{2}-\d{2}$/', $this->bday) ){//comprobamos si coincide con la expresion esperada
		$array[1] = "00020";
		$array[2] = "dateError";

		return $array;
	}

	return true;
}

//funcion que comprueba que el sexo sea hombre o mujer
function comprobar_sexo()
{
	$array = array();
	$array[0] = 'sexo';

	$this->sexo = trim($this->sexo);

	if(empty($this->sexo)){//comprobamos si esta vacio
		$array[1] = "00001";
		$array[2] = "paramVacio";

		return $array;

	}else if($this->sexo != 'hombre' && $this->sexo != 'mujer'){//comprobamos si coinicide con los campos
		$array[1] = "00100";
		$array[2] = "sexoError";

		return $array;

	}

	return true;
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



//comprueba los atributos que utilizara delete
function comprobar_atributos_DELETE(){
	$array = array();
	$correcto = true;

	$aux = $this->comprobar_login();
	if ($aux !== true) {
		$array[0] = $aux;
		$correcto = false;
	}

	return $correcto == true ? true : $array; 
}

//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function DELETE()
{
	$check = $this->comprobar_atributos_DELETE();
	//si algun atributo no cumple las restricciones
	if ($check !== true) return $check;

	$sql = "SELECT *
			FROM USUARIOS
			WHERE (login = '$this->login')";

	$obj = $this->mysqli->query($sql);

	if( mysqli_num_rows($obj) == 1 ){

		$sql = "DELETE 
   			FROM USUARIOS
   			WHERE login = '$this->login'";

   		return $this->mysqli->query($sql) ? 'Borrado realizado con éxito' : 'errorDelete';
	}else return 'Error de gestor de base de datos';
    
}



//comprueba los atributos que utilizara Rellena datos
function comprobar_atributos_RellenaDatos(){
	$array = array();
	$correcto = true;

	$aux = $this->comprobar_login();
	if ($aux !== true) {
		$array[0] = $aux;
		$correcto = false;
	}
	return $correcto == true ? true : $array; 
}


// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{
	$check = $this->comprobar_atributos_RellenaDatos();
	//si algun atributo no cumple las restricciones
	if ($check !== true) return $check;
	$sql = "SELECT * 
			FROM USUARIOS
			WHERE ( login = '$this->login')";


	$toRet = $this->mysqli->query($sql);
	return $toRet ? $toRet->fetch_array() : 'Error de gestor de base de datos';
}


//comprueba los atributos que utilizara edit
function comprobar_atributos_EDIT(){
	$array = array();
	$correcto = true;

	$aux = $this->comprobar_login();
	if ($aux !== true) {
		$array[0] = $aux;
		$correcto = false;
	}

	$aux = $this->comprobar_password();
	if ($aux !== true) {
		$array[1] = $aux;
		$correcto = false;
	}

	$aux = $this->comprobar_dni();
	if ($aux !== true) {
		$array[2] = $aux;
		$correcto = false;
	}

	$aux = $this->comprobar_nombre();
	if ($aux !== true) {
		$array[3] = $aux;
		$correcto = false;
	}
	$aux = $this->comprobar_apellidos();
	if ($aux !== true) {
		$array[4] = $aux;
		$correcto = false;
	}
	$aux = $this->comprobar_tlf();
	if ($aux !== true) {
		$array[5] = $aux;
		$correcto = false;
	} 
	$aux = $this->comprobar_email();
	if ($aux !== true) {
		$array[6] = $aux;
		$correcto = false;
	} 
	$aux = $this->comprobar_fecha();
	if ($aux !== true) {
		$array[7] = $aux;
		$correcto = false;
	}
	$aux = $this->comprobar_sexo();
	if ($aux !== true) {
		$array[8] = $aux;
		$correcto = false;
	}

	return $correcto == true ? true : $array; 
}


// funcion Edit: realizar el update de una tupla despues de comprobar que existe
function EDIT()
{

	$check = $this->comprobar_atributos_EDIT();

	//si algun atributo no cumple las restricciones
	if ($check !== true) return $check;
	
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
				fotopersonal = '$this->foto',
				sexo = '$this->sexo'
			WHERE (login = '$this->login')";
		$result = $this->mysqli->query($sql);

		if($result = 1) return 'Actualización realizada con éxito';
	}
	return 'Error de gestor de base de datos';

}

// funcion login: realiza la comprobación de si existe el usuario en la bd y despues si la pass
// es correcta para ese usuario. Si es asi devuelve true, en cualquier otro caso devuelve el 
// error correspondiente
function login(){

	$sql = "SELECT *
			FROM USUARIOS
			WHERE (
				login = '$this->login'
			)";

	$resultado = $this->mysqli->query($sql);
	if ($resultado->num_rows == 0){
		return 'El login no existe';
	}
	else{
		$tupla = $resultado->fetch_array();
		if ($tupla['password'] == $this->password){
			return true;
		}
		else{
			return 'La password para este usuario no es correcta';
		}
	}
}//fin metodo login

//comprueba los atributos que utilizara add
function comprobar_atributos_ADD(){
	$array = array();
	$correcto = true;

	$aux = $this->comprobar_login();
	if ($aux !== true) {
		$array[0] = $aux;
		$correcto = false;
	}

	$aux = $this->comprobar_password();
	if ($aux !== true) {
		$array[1] = $aux;
		$correcto = false;
	}

	$aux = $this->comprobar_dni();
	if ($aux !== true) {
		$array[2] = $aux;
		$correcto = false;
	}

	$aux = $this->comprobar_nombre();
	if ($aux !== true) {
		$array[3] = $aux;
		$correcto = false;
	}
	$aux = $this->comprobar_apellidos();
	if ($aux !== true) {
		$array[4] = $aux;
		$correcto = false;
	}
	$aux = $this->comprobar_tlf();
	if ($aux !== true) {
		$array[5] = $aux;
		$correcto = false;
	} 
	$aux = $this->comprobar_email();
	if ($aux !== true) {
		$array[6] = $aux;
		$correcto = false;
	} 
	$aux = $this->comprobar_fecha();
	if ($aux !== true) {
		$array[7] = $aux;
		$correcto = false;
	}
	$aux = $this->comprobar_sexo();
	if ($aux !== true) {
		$array[8] = $aux;
		$correcto = false;
	}
	return $correcto == true ? true : $array; 
}

//Metodo ADD
//Inserta en la tabla  de la bd  los valores
// de los atributos del objeto. Comprueba si la clave/s esta vacia y si 
//existe ya en la tabla
function ADD(){

	$comprobarParam = $this->comprobar_atributos_ADD();
	//si algun atributo no cumple las restricciones
	if ($comprobarParam !== true) return $comprobarParam;
	
	
	// si el usuario no existe se devolveria true a toRet
	$toRet = $this->Register();
	if($toRet == 'true'){
		// se devuelve la cadena diciendo el exito de la insercion
		return $this->registrar();
	} 
	//se devuelve una cadena con de fallo de insercion
	else return 'Inserción fallida: el elemento ya existe'; 
    
}


//Metodo Register
//Busca algun usuario con las mismas claves primarias, 
//si lo encuentra devuelve una cadena sino true
function Register(){


		$sql = "SELECT * 
			FROM USUARIOS 
			WHERE (login = '$this->login' OR
					DNI = '$this->dni' OR
					email = '$this->email'				
			)";

		$result = $this->mysqli->query($sql);
		if (mysqli_num_rows($result) == 1){  // existe el usuario
				return 'El usuario ya existe';
		}
		else{
	    		return true; //no existe el usuario
		}

	}

//Metodo registrar
//inserta los valores en la tabla
function registrar(){

			
		$sql = "INSERT INTO USUARIOS (
			login,
			password,
			DNI,
			nombre,
			apellidos,
			telefono,
			email,
			FechaNacimiento,
			fotopersonal,
			sexo) 
				VALUES (
					'".$this->login."',
					'".$this->password."',
					'".$this->dni."',
					'".$this->nombre."',
					'".$this->apellidos."',
					'".$this->tlf."',
					'".$this->email."',
					'".$this->bday."',
					'".$this->foto."',
					'".$this->sexo."')";
			
		if (!$this->mysqli->query($sql)) {
			return 'Error de gestor de base de datos';
		}
		else{
			return 'Inserción realizada con éxito'; //operacion de insertado correcta
		}		
	}

}//fin de clase

?> 