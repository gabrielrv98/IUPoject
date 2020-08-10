<?php
//Clase : INTERCAMBIOS_Controller
//Creado el : 15-06-2020
//Creado por: grvidal
//Controla y administra las acciones enviadas por get
//-------------------------------------------------------


 session_start();
	if( !isset($_SESSION['login']) ){
		header('Location:../index.php');
	}

	include_once '../Model/USUARIOS_Model.php';
	include_once '../Model/INTERCAMBIOS_Model.php';
	include_once '../Model/PRODUCTOS_Model.php';
	include '../View/INTERCAMBIOS_SHOWCURRENT_View.php';
	include '../View/INTERCAMBIOS_SHOWALL_View.php';   
	include '../View/INTERCAMBIOS_SEARCH_View.php';   
	include '../View/INTERCAMBIOS_DELETE_View.php';	 
	include '../View/INTERCAMBIOS_EDIT_View.php';
	include_once '../View/INTERCAMBIOS_ACEPTADOS_EDIT_View.php';
	include '../View/INTERCAMBIOS_ADD_View.php';   
	include '../View/MESSAGE_View.php';
	include '../View/noPermiso.php';
	include '../View/noEditable.php';
	

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia INTERCAMBIOS y la devuelve
	function get_data_form(){

		if (!isset($_REQUEST['id'])) $_REQUEST['id'] = null;
		if (!isset($_REQUEST['idProd1'])) $_REQUEST['idProd1'] = null;
		if (!isset($_REQUEST['idProd2'])) $_REQUEST['idProd2'] = null;
		if (!isset($_REQUEST['unidades1'])) $_REQUEST['unidades1'] = null;
		if (!isset($_REQUEST['unidades2'])) $_REQUEST['unidades2'] = null;
		if (!isset($_REQUEST['accept1'])) $_REQUEST['accept1'] = null;
		if (!isset($_REQUEST['accept2'])) $_REQUEST['accept2'] = null;

		return new INTERCAMBIOS_Model($_REQUEST['id'],$_REQUEST['idProd1'],$_REQUEST['idProd2'],$_REQUEST['unidades1'],$_REQUEST['unidades2'],$_REQUEST['accept1'],$_REQUEST['accept2']);// se Crea el nuevo usuario

	}

// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])) $_REQUEST['action'] = '';

	$usuario = new USUARIOS_Model($_SESSION['login'],'','','','','','','','','','','','','');//Recuperamos el usuario que esta operando
	

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){
			case 'ADD':
					if (!$_POST){ // se incoca la vista de add de usuarios

						if(isset($_REQUEST['idProd'])){
							$PRODUCTOS= new PRODUCTOS_Model($_REQUEST['idProd'],'','','','','','','');
						}else{
							$PRODUCTOS= new PRODUCTOS_Model('','','','','','','','tramite');
						}

						//BUSCA productos segun las caractersiteicas del constructor y que no pertenezan al usuario
						$productos1 = $PRODUCTOS->SEARCHwithoutUser($usuario->RellenaDatos()['DNI']);
						if($usuario->isAdmin()){//Si el usuario es admin puede crear cualquier relacion
							$productos2 = $PRODUCTOS->SEARCH();
						}else{//si no lo es solo con uno de los suyos
							$datos = $usuario->RellenaDatos();
					 		$PRODUCTOS = new PRODUCTOS_Model('','','','',$datos['DNI'],'','','tramite');//se recogen todos los productos
							$productos2 = $PRODUCTOS->SEARCH();
						}
						new INTERCAMBIOS_ADD($productos1,$productos2,$usuario);
					}
					else{
						// si ambos estados de aceptacion estan aceptados
						$INTERCAMBIOS = get_data_form(); //se recogen los datos del formulario
						$respuestaI = $INTERCAMBIOS->ADD();
						$respuesta = array($respuestaI );
						if ($_REQUEST['accept1']== 'aceptado' && $_REQUEST['accept2']== 'aceptado') {
							//se sobreescribe el nuevo valor de cantidad
							$producto = new PRODUCTOS_Model($_REQUEST['idProd1'],'','','','','','','');//se recoge el antiguo producto
							$cantidad = $producto->RellenaDatos()['HORAS_UNIDADES'];// se cogen sus unidades antiguas
							$cantidad = $cantidad - $_REQUEST['unidades1'];// se calculan sus nuevas unidades
							$producto = new PRODUCTOS_Model($_REQUEST['idProd1'],'','','','','',$cantidad,'');//se crea el nuevo objeto
							array_push($respuesta, $producto->setCantidad());// se actualiza

							$producto = new PRODUCTOS_Model($_REQUEST['idProd2'],'','','','','','','');//se recoge el antiguo producto
							$cantidad = $producto->RellenaDatos()['HORAS_UNIDADES'];// se cogen sus unidades antiguas
							$cantidad = $cantidad - $_REQUEST['unidades2'];// se calculan sus nuevas unidades
							$producto = new PRODUCTOS_Model($_REQUEST['idProd2'],'','','','','',$cantidad,'');//se crea el nuevo objeto
							array_push($respuesta, $producto->setCantidad());// se actualiza
						}
						
						
						new MESSAGE($respuesta, '../Controller/INTERCAMBIOS_Controller.php');
					}
				break;
			case 'DELETE':
				if( $usuario->isAdmin() ){// solo los administradores pueden añadir categorias
					if (!$_POST){ //nos llega el id a eliminar por get
						$INTERCAMBIOS = new INTERCAMBIOS_Model($_REQUEST['id'],'','','','','',''); // Se crea el objeto
						$valores = $INTERCAMBIOS->RellenaDatos();

						$eliminable = $INTERCAMBIOS->esEliminable();

						new INTERCAMBIOS_DELETE($valores,$eliminable); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
					}
					else{ // llegan los datos confirmados por post y se eliminan
						$INTERCAMBIOS = get_data_form();
						$respuesta = $INTERCAMBIOS->DELETE();
						new MESSAGE($respuesta, '../Controller/INTERCAMBIOS_Controller.php');
					}
				}else new noPermiso();// si no es admin se le muestra la ventana noPermiso	
				break;

			case 'EDIT':
					$INTERCAMBIOS = new INTERCAMBIOS_Model($_REQUEST['id'],'','','','','',''); // Se crea el objeto
					$dni1 = $INTERCAMBIOS->getDNIPord1();// se coge el DNI del vendedor del producto 1
					$dni2 = $INTERCAMBIOS->getDNIPord2();// se coge el DNI del vendedor del producto 2
					$estadoAceptacion = $INTERCAMBIOS->RellenaDatos();
					if($usuario->isAdmin() || $usuario->getDNI() == $dni1 || $usuario->getDNI() == $dni2   ){// si el usuario que realiza la peticion de editar es administrador o  propietario de alguno de los productos  se le deja pasar
						if ( $estadoAceptacion['ACCEPT1'] == 'denegado' || $estadoAceptacion['ACCEPT2'] == 'denegado'){// si alguno de los estados esta como denegado se deja pasar
							if (!$_POST){ //nos llega el Intercambio a editar por get
							
								$productos = new PRODUCTOS_Model('','','','','','','','tramite');// se crea el objeto producto con la caracteristica que no puede estar vendido
								$productos = $productos->SEARCH();// se recogen todos los productos en tramite
								$valores = $INTERCAMBIOS->RellenaDatos(); // obtengo todos los datos de la tupla

								if($usuario->isAdmin()){// si es admin, propiedad = 0, y puede editar todas las caracteristicas
									$propiedad = '0';
									new INTERCAMBIOS_EDIT($valores,$productos,$propiedad,''); //invoco la vista de edit con los datos precargados
								}else{
									$propiedad = $usuario->getDNI() == $dni1 ? '1' : '2';
									new INTERCAMBIOS_EDIT($valores,$productos,$propiedad,$usuario->getDNI()); //invoco la vista de edit con los datos precargados
								} 

							} else{ // se reciven los datos por post
								$INTERCAMBIOS = get_data_form(); //recojo los valores del formulario
								$intercambioAnterior = new INTERCAMBIOS_Model($_REQUEST['id'],'','','','','','');//creamos el objeto antiguo
								$intercambioAnterior = $intercambioAnterior->RellenaDatos();//recogemos los valores antiguos
								$respuestaI = $INTERCAMBIOS->EDIT(); // update en la bd 
								$respuesta = array($respuestaI);

								//si ambos usuarios han marcado su opcion como aceptada, las unidades se eliminan de los productos
								//ESTA ACCION NO PODRA DESACERSE
									if($_REQUEST['accept1'] == 'aceptado' && $_REQUEST['accept2'] == 'aceptado'){// y ahora ambos estados estan marcados como aceptados
										
										//se sobreescribe el nuevo valor de cantidad
										$producto = new PRODUCTOS_Model($_REQUEST['idProd1'],'','','','','','','');//se recoge el antiguo producto
										$cantidad = $producto->RellenaDatos()['HORAS_UNIDADES'];// se cogen sus unidades antiguas
										$cantidad = $cantidad - $_REQUEST['unidades1'];// se calculan sus nuevas unidades
										$producto = new PRODUCTOS_Model($_REQUEST['idProd1'],'','','','','',$cantidad,'');//se crea el nuevo objeto
										array_push($respuesta, $producto->setCantidad());// se actualiza

										$producto = new PRODUCTOS_Model($_REQUEST['idProd2'],'','','','','','','');//se recoge el antiguo producto
										$cantidad = $producto->RellenaDatos()['HORAS_UNIDADES'];// se cogen sus unidades antiguas
										$cantidad = $cantidad - $_REQUEST['unidades2'];// se calculan sus nuevas unidades
										$producto = new PRODUCTOS_Model($_REQUEST['idProd2'],'','','','','',$cantidad,'');//se crea el nuevo objeto
										array_push($respuesta, $producto->setCantidad());// se actualiza
									}
									new MESSAGE($respuesta, '../Controller/INTERCAMBIOS_Controller.php');							
							}
							//ESTA ACCION SIGUIENTE SOLO LA PUEDE REALIZAR EL ADMIN	
						}else if( $usuario->isAdmin()){// si ambos estan como aceptado pero el usuario es admin
							if (!$_POST){ //nos llega el Intercambio a editar por get
								$productos = new PRODUCTOS_Model('','','','','','','','');// se crea el objeto producto con la caracteristica que no puede estar vendido
								$productos = $productos->SEARCH();// se recogen todos los productos
								$valores = $INTERCAMBIOS->RellenaDatos(); // obtengo todos los datos de la tupla
								new INTERCAMBIOS_ACEPTADOS_EDIT($valores,$productos); //invoco la vista de edit con los datos precargados

							}else{// comprobar qué se ha cambiado y actualizarlo
								$intercambioAnterior = new INTERCAMBIOS_Model($_REQUEST['id'],'','','','','','');//creamos el objeto antiguo
								$intercambioAnterior = $intercambioAnterior->RellenaDatos();

								
								$producto = new PRODUCTOS_Model($intercambioAnterior['ID_PRODUCTO1'],'','','','','','','');//se recoge el antiguo producto
								$cantidadAntigua = $producto->RellenaDatos()['HORAS_UNIDADES'];//cogemos las unidades actuales del producto

								$respuesta = array();//array con las respuestas de las ediciones

								if($_REQUEST['accept1'] == 'aceptado' && $_REQUEST['accept2'] == 'aceptado'){//comprobar si ambos estados estan aceptados

									if ($intercambioAnterior['ID_PRODUCTO1'] == $_REQUEST['idProd1']) {// el producto 1 no ha cambiado
										if ($_REQUEST['unidades1'] != $intercambioAnterior['UNIDADES1']) {// las unidades se han cambiado
											$diferencia = $intercambioAnterior['UNIDADES1'] - $_REQUEST['unidades1'];// se calcula la diferencia

											$cantidadActual = $cantidadAntigua + $diferencia;//se calculan la nueva cantidad

											$producto = new PRODUCTOS_Model($intercambioAnterior['ID_PRODUCTO1'],'','','','','',$cantidadActual,'');//se recoge el antiguo producto
											array_push($respuesta, $producto->setCantidad());//se actualiza la cantidad
										}
									}else{//El producto 1 ha sido cambiado

										$NuevasUnidades = $intercambioAnterior['UNIDADES1'] + $cantidadAntigua;// se suman las unidades que estaban vendidads y las que restantes
										$producto = new PRODUCTOS_Model($intercambioAnterior['ID_PRODUCTO1'],'','','','','',$NuevasUnidades,'');//se recoge el antiguo producto
										array_push($respuesta, $producto->setCantidad());//se actualiza la cantidad

										$nuevoProducto = new PRODUCTOS_Model($_REQUEST['idProd1'],'','','','','','','');//se recoge el nuevo producto
										$cantidadAntigua = $nuevoProducto->RellenaDatos()['HORAS_UNIDADES'];
										$NuevasUnidades = $cantidadAntigua - $_REQUEST['unidades1'];// se suman las unidades que estaban vendidads y las que restantes
										$producto = new PRODUCTOS_Model($_REQUEST['idProd1'],'','','','','',$NuevasUnidades,'');//se recoge el antiguo producto
										array_push($respuesta, $producto->setCantidad());//se actualiza la cantidad
									}

									$producto = new PRODUCTOS_Model($intercambioAnterior['ID_PRODUCTO2'],'','','','','','','');//se recoge el antiguo producto
									$cantidadAntigua = $producto->RellenaDatos()['HORAS_UNIDADES'];//cogemos las unidades actuales del producto

									if ($intercambioAnterior['ID_PRODUCTO2'] == $_REQUEST['idProd2']) {// el producto 2 no ha cambiado
										if ($_REQUEST['unidades2'] != $intercambioAnterior['UNIDADES2']) {// las unidades se han cambiado
											$diferencia = $intercambioAnterior['UNIDADES2'] - $_REQUEST['unidades2'];// se calcula la diferencia

											$cantidadActual = $cantidadAntigua + $diferencia;//se calculan la nueva cantidad

											$producto = new PRODUCTOS_Model($intercambioAnterior['ID_PRODUCTO2'],'','','','','',$cantidadActual,'');//se recoge el antiguo producto
											array_push($respuesta, $producto->setCantidad());//se actualiza la cantidad
										}
									}else{//El producto 2 ha sido cambiado

										$NuevasUnidades = $intercambioAnterior['UNIDADES2'] + $cantidadAntigua;// se suman las unidades que estaban vendidads y las que restantes
										$producto = new PRODUCTOS_Model($intercambioAnterior['ID_PRODUCTO2'],'','','','','',$NuevasUnidades,'');//se recoge el antiguo producto
										array_push($respuesta, $producto->setCantidad());//se actualiza la cantidad

										$nuevoProducto = new PRODUCTOS_Model($_REQUEST['idProd2'],'','','','','','','');//se recoge el nuevo producto
										$cantidadAntigua = $nuevoProducto->RellenaDatos()['HORAS_UNIDADES'];
										$NuevasUnidades = $cantidadAntigua - $_REQUEST['unidades2'];// se suman las unidades que estaban vendidads y las que restantes
										$producto = new PRODUCTOS_Model($_REQUEST['idProd2'],'','','','','',$NuevasUnidades,'');//se recoge el antiguo producto
										array_push($respuesta, $producto->setCantidad());//se actualiza la cantidad
									}

								}else{//uno de los estados no esta aceptado asi que se devuelven los imtes al stock
									

									//colocamos las unidades de producto 1
									$producto = new PRODUCTOS_Model($intercambioAnterior['ID_PRODUCTO1'],'','','','','','','');//se recoge el antiguo producto 1
									$producto = $producto->RellenaDatos();
									$producto = new PRODUCTOS_Model($intercambioAnterior['ID_PRODUCTO1'],'','','','','',$producto['HORAS_UNIDADES']+$intercambioAnterior['UNIDADES1'],'');//se crea el nuevo producto con los intems añadidos
									array_push($respuesta, $producto->setCantidad());//se coloca la nueva cantidad en la bd

									//colocamos las unidades de producto 2
									$producto = new PRODUCTOS_Model($intercambioAnterior['ID_PRODUCTO2'],'','','','','','','');//se recoge el antiguo producto 2
									$producto = $producto->RellenaDatos();
									$producto = new PRODUCTOS_Model($intercambioAnterior['ID_PRODUCTO2'],'','','','','',$producto['HORAS_UNIDADES']+$intercambioAnterior['UNIDADES2'],'');//se crea el nuevo producto con los intems añadidos
									array_push($respuesta, $producto->setCantidad());//se coloca la nueva cantidad en la bd

									//$intercambio = get_data_form();//se recogen los datos del nuevo intercambio
									//array_push($respuesta, $intercambio->EDIT());//se colocan en la db
								}
								$intercambio = get_data_form();
								
								array_push($respuesta, $intercambio->EDIT());
								new MESSAGE($respuesta, '../Controller/INTERCAMBIOS_Controller.php');

							}//fin comprobar que ha cambiado

						}else{// ambos estados estan aceptados, un usuario no puede pasar
								new NoEditable();
						}

					}else{ // sino se le muestra la ventana de que no tiene permiso
						new noPermiso();
					}
				break;

			case 'SEARCH':
				if (!$_POST){
					if ($usuario->isAdmin()) { // un admin puede buscar todos los productos
						$PRODUCTOS = new PRODUCTOS_Model('','','','','','','','');//se recogen todos los productos
					}else{//mientras que un usuario solo puede ver las transacones en las que el participo
						$datos = $usuario->RellenaDatos();
					 	$PRODUCTOS = new PRODUCTOS_Model('','','','',$datos['DNI'],'','','');//se recogen todos los productos
					}
					new INTERCAMBIOS_SEARCH($PRODUCTOS->SEARCH());// Se inicializa search con los productos para buscar mas facil
				}
				else{
					$INTERCAMBIOS = get_data_form();

					if (!$usuario->isAdmin()) {// si no es administrador se busca como usuario
						$datos = $INTERCAMBIOS->SEARCH_USUARIO($usuario->RellenaDatos()['DNI']);
					}else{
						$datos = $INTERCAMBIOS->SEARCH();
					}
					
					new INTERCAMBIOS_SHOWALL($datos);
				}
				break;

			case 'SHOWCURRENT':
				$INTERCAMBIOS = new INTERCAMBIOS_Model($_REQUEST['id'],'','','','','',''); // Se crea el objeto
				$valores = $INTERCAMBIOS->RellenaDatos();//se rellenan los datos

				$valoraciones1 = $INTERCAMBIOS->getValoraciones1();//se cogen las valoraciones del primer producto
				$valoraciones2 = $INTERCAMBIOS->getValoraciones2();//se cogen las valoraciones del segundo producto

				new INTERCAMBIOS_SHOWCURRENT($valores,$valoraciones1,$valoraciones2,$usuario);
				break;

			default:

				$INTERCAMBIOS = get_data_form();
				if (isset($_REQUEST['person'])) {
					$datos = $usuario->misIntercambios();
				}else{
					if($usuario->isAdmin()) $datos = $INTERCAMBIOS->SHOW_ALL();
					else $datos = $usuario->getIntercambiosUsuario();
				}

				
				new INTERCAMBIOS_SHOWALL($datos);
		}


?>
