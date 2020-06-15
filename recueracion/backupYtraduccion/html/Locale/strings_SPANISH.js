//Clase : Strings_SPANISH
//Creado el : 2-10-2019
//Creado por: grvidal
//Diccionario en castellano con todas las cadenas que hay en la plataforma
//-------------------------------------------------------
//const arraySPANISH = { //Arrays asociativo de traducciones al español:
const arraySPANISH =  {
      //'bienvenido' :'Bienvenido al proyecto de IU',
      //'Portal_de_Gestión' : 'Portal de Gestión',
      'Ejemplo' : 'Ejemplo',
      'Otro' : 'Otro',
      'INGLES' : 'INGLES',
      'ESPAÑOL' : 'ESPAÑOL',
      'GALLAECIAN' : 'GALLEGO',
      'Volver' : 'Volver',
      'Registro' : 'Registro',
      'El usuario, dni, o email ya existe' : 'El usuario, dni, o email ya existe',
      'addUser' : 'Añadir usuario',
      'edit' : 'Editar',
      'editUser' : 'Editar usuario',
      'searchUser' : 'Buscar usuario',
      'unknownError' : 'Error desconocido',
      'showCurrent' : 'Mostrar usuario',
      'show' : 'Mostrar',
      'delete' : 'Eliminar',
      'errorDelete' : 'error eliminando la tupla',
      'sexo' : 'Sexo',
      'male' : 'Hombre',
      'female' : 'Mujer',
      'hombre' : 'hombre',
      'mujer' : 'mujer',
      'mix' : 'Mix',
      'tlf' : 'Telefono',
      'fechaNacimiento' : 'Cumpleaños',
      'picture' : 'Foto',
      'submit' : 'Aceptar', 
      'TShowC' : 'Detalles',
      'TShowAll' : 'Mostrar todos',
      'Tedit' : 'Editar',
      'Tadd' : 'Añadir',
      'Tdelete' : 'Eliminar',
      'Tsearch' : 'Buscar',
      'empty' : 'Vacio',
      'deleteUser' : 'Eliminar usuario',
      'Campus' : 'Campus',
      'ISesion' :'Iniciar sesion',


      //verificaiones---------------------------------------------------------
      'letrasynumeros' : 'El campo solo puede contener letras y números.',
      'dniError' : 'Faltan números o la letra es incorrecta.',
      'textonly' : 'Solo letras.',
      'tlfError' : 'Nueve digitos y el prefijo si hace falta.',
      'emailError' : 'El email no coincide con lo esperado.',
      'fechaNacimientoError' : 'Introduce una fecha anterior a la actual',
      'fotoError' : 'La extensión no coincide con la de una foto',
      'sexoError' : 'El sexo no coincide con lo esperado',
      'anhoError' : 'Cadena esperada xxxx-xxxx',
      'tipoError' : 'El tipo tiene que ser Despacho, laboratorio o pas',
      'numberError' : 'Solo números',
      'paramVacio' : 'no puede estar vacio.',
      'toolong' : 'es demasiado largo.',
      'tooshort' : 'demasiado corto, necesita al menos 1 caracteres.',
      'tooshortNoNNum' : 'demasiado corto, necesita al menos 3 caracteres.',
      'sexoError' : 'solo puede ser hombre o mujer.',
      'dateError' : 'no tiene el formato correcto, formato requerido yyyy-mm-dd.',
      'emailErrorCode' : 'no tiene el formato correcto, formato requerido x.@x.(com|es|org)',
      'alfNumguion' : 'solo esta permitido letras, numeros y guión \'-\'.',
      'alfNum' : 'solo esta permitido numeros y letras.',
      'anhoAcadCode' : 'Solo se permiten dddd-dddd (año académico) donde d es un dígito.',
      'onlynumbers' : 'solo esta permitido numeros.',
      'dirError' : 'solo puede contener letras, numeros y los símbolos  “- / º ª.',
      'errorIn' : 'Error en',
      'menuBut open' : '&#9776;Abrir',

      // Header
      'Intercambio de tiempo' : 'Intercambio de tiempo',

      //usuarios
      'alergias' : 'Alergias',
      'cp' : 'Codigo postal',
      'direccion' : 'Direccion',
      'errorCP' : 'Solo esta permitido un codigo postal valido compuesto por 5 digitos.',
      'Gestion_Usuarios' : 'Gestion de usuarios',
      'tipo_usuario' :'Tipo de usuario',
      'Usuario_no_autenticado' : 'Usuario no autenticado',
      'Login' : 'Login',
      'name' : 'Nombre',
      'password' : 'Contraseña',
      'surname' : 'Apellidos',
      'dni' : 'DNI',
      'email' : 'Email',
      'bDate' : 'Fecha de nacimiento',
      'idioma' : 'Idioma',
      'Usuario' : 'Usuario',

      //Index View
      'indexTitle' : 'Bienvenido a Intercambio de tiempo',
      'indexDescrip' :'Aqui puedes buscar ofertas para inercambiarlas por otras ofertas tuyas, puden ser productos hechos a mano o cultivados o incluso trabajo fisico!',
      'IndexViewLink' : 'Pagina principal',

      //Pie de pagina
      'hoyes' : 'Hoy es',
      'fcreacion' :'Fecha de creacion',

      //Gestion de productos
    'Gestión Productos' : 'Gestion de los productos',
    'addProducto' : 'Nuevo producto',
    'searchProducto' : 'Buscar producto',
    'editProducto' : 'Editar producto',
    'tituloProducto' : 'Titulo del producto',
    'descripcionProducto' : 'Descripcion del producto',
    'eliminarProducto' : 'Eliminar producto',
    'fotoProducto' : 'Foto del producto',

    //Gestion de categorias
    'Gestión Categorias' : 'Gestion de categorias',
    'addCategoria' : 'Nueva categoria',
    'nombreCategoria' : 'Nombre de la categoria',
    'editCategoria' : 'Editar la categoria',
    'idCategoria' : 'ID de la categoria',
    'productosEnCategoria' : 'Productos en esta categoria',

    //Gestion de categorias_productos
    'Gestión Productos-Categorias' : 'Gestion de produtos-categorias',
    'idCategoria' : 'Id categoria',
    'idProducto' : 'Id producto',


    //codigos de error
    '00001' : '00001 Insercion fallida, el elemento ya existe',
    '00002' : '00002 Insercion realizada con exito',
    '00003' : '00003 Error de gestor de base de datos en ADD',
    '00004' : '00004 Error de gestor de base de datos en SEARCH',
    '00005' : '00005 Borrado realizada con exito',
    '00006' : '00006 Error de gestor de base de datos en DELETE',
    '00007' : '00007 Actualización realizada con éxito',
    '00008' : '00008 Error de gestor de base de datos en EDIT',
    '00009' : '00009 El login no existe',
    '00010' : '00010 La password para este usuario no es correcta',
    '00011' : '00011 Login correcto',
    '00012' : '00012 El usuario ya existe',
    '00013' : '00013 Error en el registro en la base de datos',
    '00014' : '00014 Registro realizado con éxito',
    '00015' : '00015 Error de gestor de base de datos en RellenaDatos',
    '00016' : '00016 Error inseperado en ADD',
    'vendedorDNI' : 'DNI del vendedor',
    'vendedorDNIError' : 'El DNI no coincide con ningun usuario actual',
    'persona' :'Persona asociada',
    'estado' : 'Estado',
    'estadoError' : 'El estado solo puede ser disponible o vendido',
    'tramite' : 'Disponible',
    'vendido' : 'Vendido',
    'indiferente' : 'Indiferente',
    'yo' : 'Yo'

      };
      export { arraySPANISH };
