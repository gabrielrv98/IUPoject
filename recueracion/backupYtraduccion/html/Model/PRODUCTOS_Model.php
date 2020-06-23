
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
	var $origen;
	var $horasUnidades;
	var $estado;
	var $mysqli;

//Constructor de la clase
//Recive como entrada los datos persnales y crea la clase USUARIO_Model
function __construct($id,$titulo,$descripcion,$foto,$vendedorDNI,$origen,$horasUnidades,$estado){
	$this->id = $id;
	$this->titulo = $titulo;
	$this->descripcion = $descripcion;
	$this->foto = $foto;
	$this->vendedorDNI = $vendedorDNI;
	$this->origen = $origen;
	$this->horasUnidades = $horasUnidades;
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

	if($this->estado == '') $this->estado = 'tramite';//si el estado esta vacio se recoloca

	$sql = "INSERT INTO PRODUCTOS (
			TITULO,
			DESCRIPCION,
			FOTO,
			VENDEDOR_DNI,
			ORIGEN,
			HORAS_UNIDADES,
			ESTADO) 
				VALUES (
					'".$this->titulo."',
					'".$this->descripcion."',
					'".$this->foto."',
					'".$this->vendedorDNI."',
					'".$this->origen."',
					'".$this->horasUnidades."',
					'".$this->estado."'
					)";

		include_once'../Model/BD_logger.php';//se incluye el archivo con el log
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
    $sql = "SELECT * 
    		FROM PRODUCTOS
    		INNER JOIN USUARIOS ON USUARIOS.DNI = PRODUCTOS.VENDEDOR_DNI
    		WHERE ( ";

    $or = false;

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
	    if ( $this->origen != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "ORIGEN LIKE '" .$this->origen. "'";
	    } 
	    if ( $this->horasUnidades != '' ){
	    	if ($or) $sql = $sql . ' AND ';
	    	else $or = true;

	    	$sql = $sql . "HORAS_UNIDADES >= '" .$this->horasUnidades. "'";
	    } 
	    if ( $this->estado != '' ){
	    	if ($or) $sql = $sql .' AND ';
	    	else $or = true;

	    	$sql = $sql . "ESTADO LIKE '" .$this->estado. "'";
	    } 

	    if (!$or) $sql = $sql . '1';

    

    $sql = $sql . " )";
    $toRet = $this->mysqli->query($sql);
    return $toRet ? $toRet : '00004';
}

// se recojen todas las tuplas de la base de datos y se pasan como array
function SHOW_ALL(){
	$sql = "SELECT * , USUARIOS.NOMBRE, USUARIOS.APELLIDOS 
			FROM PRODUCTOS
			INNER JOIN USUARIOS ON PRODUCTOS.VENDEDOR_DNI = USUARIOS.DNI";
	return $this->mysqli->query($sql);
}

//funcion DELETE : comprueba que la tupla a borrar existe y una vez
// verificado la borra
function DELETE()
{
	$sql = "SELECT *
			FROM PRODUCTOS
			WHERE (ID = '$this->id')";

	$obj = $this->mysqli->query($sql);

	//Comprobacion de que la tupla es unica
	if( mysqli_num_rows($obj) == 1 ){

		$sql = "SELECT *
			FROM INTERCAMBIO
			WHERE (ID_PRODUCTO1 = '$this->id' OR
					ID_PRODUCTO2 = '$this->id')";

	$obj = $this->mysqli->query($sql);

	if( mysqli_num_rows($obj) >= 1 ){
		return '00017';
	}
		$sql = "DELETE 
   			FROM PRODUCTOS
   			WHERE ID = '$this->id'"; 

   		include_once'../Model/BD_logger.php';//se incluye el archivo con el log
   		//se reliza el log del delete	
   		if (writeAndLog($sql)) return '00005';
   			
	}else return '00006';
}

// funcion RellenaDatos: recupera todos los atributos de una tupla a partir de su clave
function RellenaDatos()
{

	$sql = "SELECT * 
			FROM PRODUCTOS
			WHERE ( ID = '$this->id')";


	$toRet = $this->mysqli->query($sql);
	return $toRet ? $toRet->fetch_array() : '00015';
}


// funcion Edit: realizar el update de una tupla despues de comprobar que existe
function EDIT()
{

	$sql = "SELECT ID 
				FROM PRODUCTOS
				WHERE (ID = '$this->id')";

//se comprueba que el dni o el email no estan repetidos en otros usuarios

	$response = $this->mysqli->query($sql)->num_rows;
	if ($response == 1) {
		$sql = "UPDATE PRODUCTOS
			SET TITULO = '$this->titulo',
				DESCRIPCION = '$this->descripcion',";

		if($this->foto !='') $sql= $sql."	FOTO = '$this->foto',";

		$sql= $sql . "	ORIGEN = '$this->origen',
						HORAS_UNIDADES = '$this->horasUnidades',	
				VENDEDOR_DNI = '$this->vendedorDNI',
				ESTADO = '$this->estado'

			WHERE (ID = '$this->id')";
		include_once'../Model/BD_logger.php';//se incluye el archivo con el log
		$result = writeAndLog($sql); // se realiza el log

		if($result = 1) return '00007';// si la actualizacion fue existosa
	}
	return '00008';// si el numero de tuplas de vuelta es mayor que 1 o la actualizacion tuvo un error
}

// actualiza la cantidad del producto
//devuelve true si fue exitoso
function setCantidad(){

	$sql = "UPDATE PRODUCTOS
			SET HORAS_UNIDADES = '$this->horasUnidades'";

	if($this->horasUnidades <= 0) $sql = $sql .	", ESTADO = 'vendido' ";
	else  $sql = $sql .	", ESTADO = 'tramite' ";
	$sql = $sql .	" WHERE (ID = '$this->id')";

	include_once'../Model/BD_logger.php';//se incluye el archivo con el log
	$result = writeAndLog($sql); // se realiza el log

	if($result = 1) return '00007';// si la actualizacion fue existosa
	else return '00008';// la actualizacion tuvo un error
}

//funcion getFoto(): devuelve la ruta de la foto
function getFoto(){
	$sql = "SELECT FOTO
			FROM PRODUCTOS
			WHERE (
				(ID = '$this->id') 
			)";
	$resultado = $this->mysqli->query($sql);
	$resultado = $resultado-> fetch_array();
	return $resultado['FOTO'];
}

//funcion recoverID(): devuelve el ID del Prodcto subido
function recoverID(){
	$sql = "SELECT ID
			FROM PRODUCTOS
			WHERE (
				TITULO = '$this->titulo' AND
				 DESCRIPCION = '$this->descripcion' AND
				 FOTO = '$this->foto' AND
				 VENDEDOR_DNI = '$this->vendedorDNI' AND
				 ORIGEN = '$this->origen' AND
				 HORAS_UNIDADES = '$this->horasUnidades' AND
				 ESTADO = '$this->estado' 
			)";
	$resultado = $this->mysqli->query($sql);
	$resultado = $resultado-> fetch_array();
	return $resultado['ID'];
}

//funcion getVendedorDNI(): devuelve el DNI del vendedor
function getVendedorDNI(){
	$sql = "SELECT VENDEDOR_DNI
			FROM PRODUCTOS
			WHERE (
				ID = '$this->id')";
	$resultado = $this->mysqli->query($sql);
	$resultado = $resultado-> fetch_array();
	return $resultado['VENDEDOR_DNI'];
}

function productosValorados(){
	$sql = "SELECT * , PRODUCTOS.ID AS ID
			FROM PRODUCTOS
			INNER JOIN VALORACIONES ON PRODUCTOS.ID = VALORACIONES.ID_PRODUCTO
			WHERE (1)";
	$resultado = $this->mysqli->query($sql);

	return $resultado;
}

//devuelve las categorias y la SUMA de las valoraciones de dicha categoria
function getMejoresCategorias(){
	$sql = "SELECT  CATEGORIAS.ID, CATEGORIAS.NOMBRE_CATEGORIA , SUM(PUNTUACION) AS PUNTUACION1
				FROM CATEGORIAS
				LEFT JOIN PRODUCTOS_CATEGORIAS ON PRODUCTOS_CATEGORIAS.ID_CATEGORIA = CATEGORIAS.ID
				INNER JOIN PRODUCTOS ON PRODUCTOS.ID = PRODUCTOS_CATEGORIAS.ID_PRODUCTO
				INNER JOIN VALORACIONES ON PRODUCTOS.ID = VALORACIONES.ID_PRODUCTO
                GROUP BY ID
    			ORDER BY PUNTUACION1 DESC";
	$resultado = $this->mysqli->query($sql);

	return $resultado;
}

//devuelve los productos con mejores valoraciones
function getMejoresProductos(){
	//DEVUELVE LOS ID PRODUCTO Y VALORACIONES SEPARADO ( SIRVE PARA LA MEDIA)
	/*$sql = "SELECT  PRODUCTOS.ID, PRODUCTOS.TITULO ,  
				(CASE WHEN PUNTUACION IS NULL THEN 0 ELSE PUNTUACION END) AS PUNTUACION1
			FROM PRODUCTOS
			LEFT JOIN VALORACIONES ON PRODUCTOS.ID = VALORACIONES.ID_PRODUCTO
            ORDER BY VALORACIONES.PUNTUACION DESC";

     //DEVUELVE LOS ID PRODUCTO Y media DE VALORACIONES  
    $sql = "SELECT  PRODUCTOS.ID, PRODUCTOS.TITULO ,  
				(CASE WHEN AVG(PUNTUACION) IS NULL THEN 0 ELSE aVG(PUNTUACION) END) AS PUNTUACION1
			FROM PRODUCTOS
			LEFT JOIN VALORACIONES ON PRODUCTOS.ID = VALORACIONES.ID_PRODUCTO
            group by ID
            ORDER BY VALORACIONES.PUNTUACION DESC";
*/
    //DEVUELVE LOS ID PRODUCTO Y SUMA DE VALORACIONES
    $sql = "SELECT  PRODUCTOS.ID, PRODUCTOS.TITULO ,  
				(CASE WHEN SUM(PUNTUACION) IS NULL THEN 0 ELSE SUM(PUNTUACION) END) AS PUNTUACION1
			FROM PRODUCTOS
			LEFT JOIN VALORACIONES ON PRODUCTOS.ID = VALORACIONES.ID_PRODUCTO
            group by ID
            ORDER BY VALORACIONES.PUNTUACION DESC";
	$resultado = $this->mysqli->query($sql);

	return $resultado;
}

}//fin de clase

?> 