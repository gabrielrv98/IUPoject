//Arrays asociativo de traducciones al inglés:
const arrayENGLISH =  {     
      'Usuario_no_autenticado' : 'User not logged',
      
      'Ejemplo' : 'Example',
      'Otro' : 'Other',
      'INGLES' : 'ENGLISH',
      'ESPAÑOL' : 'SPANISH',
      'GALLAECIAN' : 'GALLAECIAN',
      'area' : 'area',
      'El login no existe' : 'The login dont exists',
      'Volver' : 'Back',

      
      'Registro' : 'Register',
      
      'addUser' : 'Add user',
      'edit' : 'Edit',
      'editUser' : 'Edit user',
      'searchUser' : 'Search user',
      'dniOrEmailRepeted' : 'Dni or email are repeted',
      'unknownError' : 'Unknown error',
      'showCurrent' : 'Show user',
      'show' : 'Show',
      'delete' : 'Delete',
      'sucessfulDelete' : 'Sucessful delete', 
      'sexo' : 'Sex',
      'male' : 'Male',
      'female' : 'Female',
      'hombre' : 'Male',
      'mujer' : 'Female',
      'Gestión Usuarios' : 'Users manager',
      'mix' : 'Mix',
      'tlf' : 'Telephone',
      'fechaNacimiento' : 'Birthday',
      'picture' : 'Picture',
      
      'submit' : 'Submit', 
      'TShowC' : 'Details',
      'TShowAll' : 'Show all',
      'Tedit' : 'Edit',
      'Tadd' : 'Add',
      'Tdelete' : 'Delete',
      'Tsearch' : 'Search',
      'empty' : 'Empty',
      'deleteUser' : 'Delete user',
      
      //verificaiones---------------------------------------------------------
      'letrasynumeros' : 'Field can only contain numbers and letters',
      'dniError' : 'There are missing numbers or letter doesn\'t match.',
      'textonly' : 'Text only',
      'tlfError' : 'Nine digits and prefix if it\'s needed',
      'emailError' : 'Email doesn\'t expected.',
      'fechaNacimientoError' : 'Date must be previous to actual date',
      'fotoError' : 'Extension doesn\'t match with what is expected',
      'sexoError' : 'Sex not expected',
      'anhoError' : 'Expected string as xxxx-xxxx',
      'tipoError' : 'Type must be "laboratorio", "despacho" or "PAS".',
      'numberError' : 'Numbers only',
      'paramVacio' : 'can\'t be empty.',
      'toolong' : 'is too long.',
      'tooshort' : 'is too short, it needs at least 1 character.',
      'tooshortNoNNum' : 'is too short, it needs at least 3 character.',
      'sexoError' : 'only "male" or "female"',
      'dateError' : 'doesn\'t have the properly format, format needed yyyy-mm-dd.',
      'emailErrorCode' : 'doesn\'t have the properly format, format needed x.@x.(com|es|org)',
      'alfNumguion' : 'only letters, numbers and hyphen \'-\' allowed.',
      'alfNum' : 'only letters and numbers allowed.',
      'anhoAcadCode' : 'only allowed format dddd-dddd, where d is a digit.',
      'onlynumbers' : 'only numbers allowed.',
      'dirError' : 'only letters, numbers and "- / º ª" are allowed.',
      'errorIn' : 'Error in',
      'vendedorDNIError' : 'The DNI does not match any current user',
      'estadoError' : 'Status can only be available or sold',
      'tipo_usuarioError' : 'User type must be admin or user',
      'dirError' : 'The address contains an error, only letters, numbers, commas and \'º\'',
      'tooShortNoNum' : 'You need at least 3 characters',


      'open' : '&#9776;Open',
      'ISesion' : 'Log in',
      'Volver' : 'Back',

      // Header
      'Intercambio de tiempo' : 'Time exchange',

      //Usuarios
      'tipo_usuario' :'User type',
      'Login' : 'Login', 
      'password' : 'Password',
      'name' : 'Name',
      'surname' : 'Surname',
      'bDate' : 'Birthday',
      'dni' : 'DNI',
      'email' : 'Email',
      'idioma' : 'Language',
      'Usuario' : 'User',
      'alergias' : 'Allergies',
      'cp' : 'Postal Code',
      'direccion' : 'Address',
      'errorCP' : 'Only allowed a valid postal code formed by 5 digits',
      'admin' : 'Administrator',
      'Usuario' : 'User / Client',
      'activado': 'Activated',
      'desactivado' : 'Desctivated',
      'activadoError' : 'User can only be enabled or disabled',
      'todoTipo' : 'Any type',
      'ofertas' : 'Active offers',
      'transacciones' : 'Transactions made',

      //Index View
      'indexTitle' : 'Welcome to Time exchange',
      'indexDescrip' :'Here you can search offers to exchange them for other of yours, it can be handmade products or cultivated, it can even be physical work!',
      'IndexViewLink' : 'Main page',

      //noPermiso
      'noPermisoT' : 'You don\'t have permission to be here',
      'noTienesPermiso' : 'I\'m sorry but you don\'t have permission to be here: D, please come back to the Main page',

      //Pie de pagina
      'hoyes' : 'Today is',
      'fcreacion' :'Creation date: ',

      //Gestion de productos
    'Gestión Productos' : 'Prodct manager',
    'addProducto' : 'Add product',
    'searchProducto' : 'Search product',
    'editProducto' : 'Edit product', 
    'tituloProducto' : 'Product title',
    'descripcionProducto' : 'Product description',
    'eliminarProducto' : 'Delete product',
    'fotoProducto' : 'Product picture',
    'vendedorDNI' : 'seller\'s ID',
    'persona' :'Associated person',
    'tramite' : 'Available',
    'vendido' : 'Sold',
    'estado' : 'State',
    'indiferente' : 'Indifferent',
    'yo' : 'Yo',
    'disponibilidad' : 'Availability',

    //Gestion de categorias
    'Gestión Categorias' : 'Category manager',
    'addCategoria' : 'New category',
    'nombreCategoria' : 'Category name',
    'editCategoria' : 'Edit category',
    'productosEnCategoria' : 'Products in this category',
    

    //Gestion de categorias_productos
    'Gestión Productos-Categorias' : 'Products-Categories manager',
    'idCategoria' : 'Id category',
    'idProducto' : 'Id product',


    //codigos de error
    '00001' : '00001 Insertion failed, element already exists',
    '00002' : '00002 Insertion done successfully',
    '00003' : '00003 Database manager error in ADD',
    '00004' : '00004 Database manager error in SEARCH',
    '00005' : '00005 Deletion done successfully',
    '00006' : '00006 Database manager error in DELETE',
    '00007' : '00007 Update done successfully',
    '00008' : '00008 Database manager error in EDIT',
    '00009' : '00009 The login does not exist',
    '00010' : '00010 The password for this user is not correct',
    '00011' : '00011 Login correct',
    '00012' : '00012 User already exists',
    '00013' : '00013 Registration failed in database',
    '00014' : '00014 Registration completed successfully',
    '00015' : '00015 Database manager error in RellenaDatos',
    '00016' : '00016 Unexpected error in ADD'


    
    
    
     };

      export { arrayENGLISH };