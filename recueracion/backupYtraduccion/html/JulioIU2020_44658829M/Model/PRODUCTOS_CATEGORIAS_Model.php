
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
	$sql = "SELECT * 
			FROM PRODUCTOS_CATEGORIAS 
			WHERE ID_PRODUCTO = '".$this->idProducto."' AND
					ID_CATEGORIA = '".$this->idCategoria."' ";


    $result = $this->mysqli->query($sql);
	if ($result->num_rows >= 1){  // el elemento ya existe
		return '00001';
	} 

	$sql = "SELECT * 
			FROM PRODUCTOS 
			WHERE ID = '".$this->idProducto."'";
	$result = $this->mysqli->query($sql);
	if ($result->num_rows <= 0){  // el Producto no existe
		return '00003';
	}

	$sql = "SELECT * 
			FROM CATEGORIAS 
			WHERE ID = '".$this->idCategoria."'";
	$result = $this->mysqli->query($sql);
	if ($result->num_rows <= 0){  // la categoria no existe
		return '00003';
	}		


	$sql = "INSERT INTO PRODUCTOS_CATEGORIAS (
			ID_PRODUCTO,
			ID_CATEGORIA) 
				VALUES (
					'".$this->idProducto."',
					'".$this->idCategoria."'
					)";

	include_once '../Model/BD_logger.php';//se incluye el archivo con el log
	if (!writeAndLog($sql)) {//llama al metodo para loggear la consulta y si la salida es false devuelve Error de insercion
		return '00003';
	
	}else{
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
			WHERE ( ID_PRODUCTO = '".$this->idProducto."' AND
					ID_CATEGORIA = '".$this->idCategoria."' ) ";

	$obj = $this->mysqli->query($sql);

	//Comprobacion de que la tupla es unica
	if( mysqli_num_rows($obj) == 1 ){

		$sql = "DELETE 
   			FROM PRODUCTOS_CATEGORIAS
   			WHERE ( ID_PRODUCTO = '".$this->idProducto."' AND
					ID_CATEGORIA = '".$this->idCategoria."' ) ";

   		include_once '../Model/BD_logger.php';//se incluye el archivo con el log
   		//se reliza el log del delete	
   		if (writeAndLog($sql)) return '00005';
   			
	}else return '00006';
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{
	$sql = "SELECT PRODUCTOS.ID AS PRODUCTO_ID, 
					PRODUCTOS.TITULO,
					CATEGORIAS.ID AS CATEGORIAS_ID,
					CATEGORIAS.NOMBRE_CATEGORIA
			FROM PRODUCTOS_CATEGORIAS
			INNER JOIN PRODUCTOS ON PRODUCTOS_CATEGORIAS.ID_PRODUCTO = PRODUCTOS.ID
			INNER JOIN CATEGORIAS ON PRODUCTOS_CATEGORIAS.ID_CATEGORIA = CATEGORIAS.ID
			WHERE ( ID_PRODUCTO = '".$this->idProducto."' AND
					ID_CATEGORIA = '".$this->idCategoria."' ) ";

	$toRet = $this->mysqli->query($sql);
	return $toRet ? $toRet->fetch_array() : '00015';
}


// funcion Edit: Productos_Categorias solo esta compuesta de dos claves foraneas, por lo tanto nunca se puede edit,
//es necesario borrar y crear una nueva relacion
function EDIT()
{

	$sql = "SELECT * 
				FROM PRODUCTOS_CATEGORIAS
				WHERE ( ID_PRODUCTO = '".$this->idProducto."' AND
					ID_CATEGORIA = '".$this->idCategoria."' ) ";

//se comprueba que el dni o el codigo de la ESPACIO no estan repetidos en otro PROF_ESPACIO
	$response = $this->mysqli->query($sql)->num_rows;
	if ($response == 1) {// si solo hay una tupla
		
		//esta clase no tiene datos que no sean claves foraneas
		return '00007';
	}
	return '00008';// devuelve error siempre
}

// funcion getCategorias: devuevle las categorias a partir del id del producto
function getCategorias()
{

	$sql = "SELECT ID_CATEGORIA, CATEGORIAS.NOMBRE_CATEGORIA
				FROM PRODUCTOS_CATEGORIAS
				INNER JOIN CATEGORIAS ON PRODUCTOS_CATEGORIAS.ID_CATEGORIA = CATEGORIAS.ID
				WHERE ( ID_PRODUCTO = '".$this->idProducto."') ";

	return $this->mysqli->query($sql);
}

// funcion getProductos: devuevle los productos a partir del id de la categoria
function getProductos()
{

	$sql = "SELECT ID_PRODUCTO, PRODUCTOS.TITULO,
					PRODUCTOS.DESCRIPCION, PRODUCTOS.FOTO
				FROM PRODUCTOS_CATEGORIAS
				INNER JOIN PRODUCTOS ON PRODUCTOS_CATEGORIAS.ID_PRODUCTO = PRODUCTOS.ID
				WHERE ( ID_CATEGORIA = '".$this->idCategoria."') ";

	return $this->mysqli->query($sql);
}


}//fin de clase

?> 