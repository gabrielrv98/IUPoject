
<?php
//Clase : PRODUCTOS_CATEGORIAS_Modelo
//Creado el : 10-06-2020
//Creado por: grvidal
//Modelo de usuarios para realizar las acciones sobre la base de datos
//-------------------------------------------------------

class PRODUCTOS_CATEGORIAS_Model {

	var $idProducto;
	var $idCategoria;

	var $mysqli;

//Constructor de la clase
//Recive como entrada los datos persnales y crea la clase USUARIO_Model
function __construct($idProducto,$idCategoria){
	$this->idProducto = $idProducto;
	$this->idCategoria = $idCategoria;

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

	$sql = "INSERT INTO PRODUCTOS_CATEGORIAS (
			ID_PRODUCTO,
			ID_CATEGORIA) 
				VALUES (
					'".$this->idProducto."',
					'".$this->idCategoria."'
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
    $sql = "SELECT PRODUCTOS.ID AS PRODUCTO_ID, 
					PRODUCTOS.TITULO,
					CATEGORIAS.ID AS CATEGORIAS_ID,
					CATEGORIAS.NOMBRE_CATEGORIA
    		FROM PRODUCTOS_CATEGORIAS
    		INNER JOIN PRODUCTOS ON PRODUCTOS_CATEGORIAS.ID_PRODUCTO = PRODUCTOS.ID
			INNER JOIN CATEGORIAS ON PRODUCTOS_CATEGORIAS.ID_CATEGORIA = CATEGORIAS.ID
    		WHERE ( ";

    $or = false;

	    if ( $this->idProducto != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;
	    	$sql = $sql . "ID_PRODUCTO LIKE '%" .$this->idProducto. "%'";
	    	
	    }   

	   if ( $this->idCategoria != '' ){
	   		if ($or) $sql = $sql .  ' AND ';
	    	else $or = true;

	    	$sql = $sql . "ID_CATEGORIA LIKE '%" .$this->idCategoria. "%'";
	    } 

	    if (!$or) $sql = $sql . '1';
    

    $sql = $sql . " )";
    $toRet = $this->mysqli->query($sql);
    return $toRet ? $toRet : '00004';
}

// se recojen todas las tuplas de la base de datos y se pasan como array
function SHOW_ALL(){

	$sql = "SELECT PRODUCTOS.ID AS PRODUCTO_ID, 
					PRODUCTOS.TITULO,
					CATEGORIAS.ID AS CATEGORIAS_ID,
					CATEGORIAS.NOMBRE_CATEGORIA
			FROM PRODUCTOS_CATEGORIAS
			INNER JOIN PRODUCTOS ON PRODUCTOS_CATEGORIAS.ID_PRODUCTO = PRODUCTOS.ID
			INNER JOIN CATEGORIAS ON PRODUCTOS_CATEGORIAS.ID_CATEGORIA = CATEGORIAS.ID";


	return $this->mysqli->query($sql);
}

//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function DELETE()
{
	$sql = "SELECT *
			FROM PRODUCTOS_CATEGORIAS
			WHERE (ID = '$this->id')";

	$obj = $this->mysqli->query($sql);

	//Comprobacion de que la tupla es unica
	if( mysqli_num_rows($obj) == 1 ){

		$sql = "DELETE 
   			FROM PRODUCTOS_CATEGORIAS
   			WHERE ID = '$this->id'"; 

   		include '../Model/BD_logger.php';//se incluye el archivo con el log
   		//se reliza el log del delete	
   		if (writeAndLog($sql)) return '00005';
   			
	}else return '00006';
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{

	$sql = "SELECT * 
			FROM PRODUCTOS_CATEGORIAS
			WHERE ( ID = '$this->id')";


	$toRet = $this->mysqli->query($sql);
	return $toRet ? $toRet->fetch_array() : '00015';
}


// funcion Edit: realizar el update de una tupla despues de comprobar que existe
function EDIT()
{

	$sql = "SELECT ID 
				FROM PRODUCTOS_CATEGORIAS
				WHERE (ID = '$this->id')";

//se comprueba que el dni o el email no estan repetidos en otros usuarios

	$response = $this->mysqli->query($sql)->num_rows;
	if ($response == 1) {
		$sql = "UPDATE PRODUCTOS_CATEGORIAS
			SET TITULO = '$this->titulo',
				DESCRIPCION = '$this->descripcion',";

		if($this->foto !='') $sql= $sql."	FOTO = '$this->foto',";

		$sql= $sql . "		VENDEDOR_DNI = '$this->vendedorDNI',
				ESTADO = '$this->estado'

			WHERE (ID = '$this->id')";
		include '../Model/BD_logger.php';//se incluye el archivo con el log
		$result = writeAndLog($sql); // se realiza el log

		if($result = 1) return '00007';// si la actualizacion fue existosa
	}
	return '00008';// si el numero de tuplas de vuelta es mayor que 1 o la actualizacion tuvo un error
}


//funcion getFoto(): devuelve la ruta de la foto
function getFoto(){
	$sql = "SELECT FOTO
			FROM PRODUCTOS_CATEGORIAS
			WHERE (
				(ID = '$this->id') 
			)";
	$resultado = $this->mysqli->query($sql);
	$resultado = $resultado-> fetch_array();
	return $resultado['FOTO'];
}

}//fin de clase

?> 