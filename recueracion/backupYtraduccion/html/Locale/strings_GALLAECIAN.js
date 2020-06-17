//Clase : Strings_GALLAECIAN
//Creado el : 2-10-2019
//Creado por: grvidal
//Diccionario en gallego con todas las cadenas que hay en la plataforma
//-------------------------------------------------------
const arrayGALLAECIAN =  {
      
      'Usuario_no_autenticado' : 'Usuario no autenticado',
      'Login' : 'Login',
      'name' : 'Nome',
      'password' : 'Contrasinal',
      'surname' : 'Apelidos',
      'bDate' : 'Data de nacemento',
      'dni' : 'DNI',
      'email' : 'Email',
      'idioma' : 'Idioma',
      'Usuario' : 'Usuario',
      'Ejemplo' : 'Exemplo',
      'Otro' : 'Outro',
      'INGLES' : 'INGLES',
      'ESPAÑOL' : 'ESPAÑOL',
      
      'GALLAECIAN' : 'GALEGO',
      'Registro' : 'Rexistro',
      'addUser' : 'Engadir usuario',
      'edit' : 'Editar',
      'editUser' : 'Editar usuario',
      'searchUser' : 'Buscar usuario',
      'unknownError' : 'Error desconocido',
      'showCurrent' : 'Mostrar usuario',
      'show' : 'Mostrar',
      'delete' : 'Eliminar',
      'sexo' : 'Sexo',
      'male' : 'Home',
      'female' : 'Muller',
      'hombre' : 'home',
      'mujer' : 'muller',
      'Gestión Usuarios' : 'Xestion de usuarios',
      'mix' : 'Mix',
      'tlf' : 'Telefono',
      'fechaNacimiento' : 'Cumpleanos',
      'picture' : 'Foto',
      
      'submit' : 'Aceptar',
      'TShowC' : 'Detalles',
      'TShowAll' : 'Mostrar todos',
      'Tedit' : 'Editar',
      'Tadd' : 'Engadir',
      'Tdelete' : 'Eliminar',
      'Tsearch' : 'Buscar',
      'empty' : 'Vacio',
      'deleteUser' : 'Eliminar usuario',
      'ISesion' : 'Iniciar sesión',

//verificacion
      'letrasynumeros' : 'O campo só pode conter letras y números.',
      'dniError' : 'Faltan números o a letra é incorrecta.',
      'textonly' : 'Só letras.',
      'tlfError' : 'Nove dixitos e o prefixo se compre.',
      'emailError' : 'O email non coincide co esperado.',
      'fechaNacimientoError' : 'Introduce unha data anterior a actual',
      'fotoError' : 'A extensión non coincide coa dunha foto',
      'sexoError' : 'O sexo non coincide co esperado',
      'anhoError' : 'Cadea esperada xxxx-xxxx',
      'tipoError' : 'O tipo ten que ser despacho, laboratorio o pas',
      'numberError' : 'Só números',
      'paramVacio' : 'nom pode estar vacio.',
      'toolong' : 'é demasiado longo.',
      'tooshort' : 'é demasiado corto, compre al menos 1 caracteres.',
      'tooshortNoNNum' : 'é demasiado corto, compre al menos 3 caracteres.',
      'sexoError' : 'só pode ser home ou muller.',
      'dateError' : 'non ten o formato correcto, formato requerido yyyy-mm-dd.',
      'emailErrorCode' : 'non ten o formato correcto, formato requerido x.@x.(com|es|org)',
      'alfNumguion' : 'só estan permitido letras, números e guión \'-\'.',
      'alfNum' : 'só esta permitido números e letras.',
      'anhoAcadCode' : 'Solo se permite dddd-dddd (ano académico) onde d es un dígito.',
      'onlynumbers' : 'só esta permitido números.',
      'dirError' : 'só pode conter letras, numeros e os símbolos  “- / º ª.',
      'tipo_usuarioError' : 'O tipo de usuario ten que ser usuario ou administrador',
      'dirError' : 'A direccion conten algun error, so letras, números, comas e \'º\'',
      'tooShortNoNum' : 'Necesita al menos 3 caracteres',

      'errorIn' : 'Error en',
      'open' : '&#9776;Abrir',
      'Volver' : 'Volver',

      

      // Header
      'Intercambio de tiempo' : 'Intercambio de tempo',

      //usuarios
      'alergias' : 'Alerxias',
      'cp' : 'Codigo postal',
      'direccion' : 'Direccion',
      'errorCP' : 'So esta permitido un codigo postal valido composto por 5 dixitos.',
      'Gestión Usuarios' : 'Gestion de usuarios',
      'tipo_usuario' :'Tipo de usuario',
      'Usuario_no_autenticado' : 'Usuario no autenticado',
      'Login' : 'Login',
      'name' : 'Nombre',
      'tipo_usuario' :'Tipo de usuario',
      'password' : 'Contraseña',
      'surname' : 'Apellidos',
      'dni' : 'DNI',
      'email' : 'Email',
      'bDate' : 'Fecha de nacimiento',
      'idioma' : 'Idioma',
      'Usuario' : 'Usuario',
      'format' :'mm/dd/aaaa',
      'admin' : 'Administrador',
      'Usuario' : 'Usuario / Cliente',
      'activado': 'Activado',
      'desactivado' : 'Desactivado',
      'activadoError' : 'O usuario so puede estar activado ou desactivado',
      'todoTipo' : 'Cualquiera tipo',
      'ofertas' : 'Ofertas activas',
      'transacciones' : 'Transacciones realizadas',

      //INdex View
      'indexTitle' : 'Benvido a Intercambio de tempo',
      'indexDescrip' :'Aqui podes buscar ofertas para intercambiarlas por ofertas tuyas, poden ser productos caseiros ou cultivados, tamén pode ser traballo fisico!',
      'IndexViewLink' : 'Páxina principal',


      //noPermiso
      'noPermisoT' : 'Non tes permiso para estar aqui',
      'noTienesPermiso' : 'O lamento pero non tes permiso para estar aqui :D, por favor volve a paxina principal',

      //Pie de pagina
      'hoyes' : 'Hoxe é',
    'fcreacion' : 'Data de creacion',


      //Gestion de productos
    'Gestión Productos' : 'Xestion dos productos',
    'addProducto' : 'Nuovo producto',
    'searchProducto' : 'Buscar producto',
    'editProducto' : 'Editar producto',
    'tituloProducto' : 'Titulo do producto',
    'descripcionProducto' : 'Descripcion do producto',
    'eliminarProducto' : 'Eliminar producto',
    'fotoProducto' : 'Foto do producto',
    'disponibilidad' : 'Disponibilidad',

    //Gestion de categorias
    'Gestión Categorias' : 'Xestion de categorias',
    'addCategoria' : 'Nova categoria',
    'nombreCategoria' : 'Nome da categoria',
    'editCategoria' : 'Editar a categoria',
    'idCategoria' : 'ID da categoria',
    'productosEnCategoria' : 'Productos nesta categoria',
    'idCategoriaError' :'Error na categoria',
    'categorias' : 'Categorias',

    //Gestion de categorias_productos
    'Gestión Productos-Categorias' : 'Xestion de produtos-categorias',
    'idCategoria' : 'Id categoria',
    'idProducto' : 'Id producto',
    'addProdCate' : 'Añadir Producto-Categoria',
    'searchProductoCategoria' : 'Buscar producto-categoria',
    'eliminarProductoCategoria' : 'Eliminar producto-categoria',
    'editarProductoCategoria' : 'Editar producto-categoria',
    'enlaceProducto' : 'Enlace o producto',
    'enlaceCategoria' : 'Enlace a categoria',


    //codigos de error
    '00001' : '00001 Insercion fallida, o elemento xa existe',
    '00002' : '00002 Insercion realizada con exito',
    '00003' : '00003 Error do xestor de base de datos en ADD',
    '00004' : '00004 Error do xestor de base de datos en SEARCH',
    '00005' : '00005 Borrado realizada con exito',
    '00006' : '00006 Error do xestor de base de datos en DELETE',
    '00007' : '00007 Actualización realizada con éxito',
    '00008' : '00008 Error do xestor de base de datos en EDIT',
    '00009' : '00009 El login non existe',
    '00010' : '00010 La password para este usuario non é correcta',
    '00011' : '00011 Login correcto',
    '00012' : '00012 El usuario xa existe',
    '00013' : '00013 Error no rexistro na base de datos',
    '00014' : '00014 Rexistro realizado con éxito',
    '00015' : '00015 Error do xestor de base de datos en RellenaDatos',
    '00016' : '00016 Error inesperado en ADD',
    'vendedorDNI' : 'DNI do vendedor',
    'vendedorDNIError' : 'O DNI non coincide con ningun usuario actual',
    'persona' :'Persona asociada',
    'estado' : 'Estado',
    'estadoError' : 'O estado so puede ser disponible ou vendido',
    'tramite' : 'Disponible',
    'vendido' : 'Vendido',
    'indiferente' : 'Indiferente',
    'yo' : 'Eu',
    'ClavesForaneasPermanentes': 'As claves foraneas non se pueden cambiar'


     };
     export { arrayGALLAECIAN };