    //Función: traducirIU
    //Descripción: recorre el array correspondiente al idioma elegido y traduce
    //los elementos html con la clase indicada por el array. El parámetro idioma
    //toma el valor vacío por defecto (así se puede llamar la función sin 
    //parámetros en el evento onload del body).
    function traducirIU(idioma='') {
      var arrayTraducciones; //Variable que contendrá las traducciones al idioma
      //correspondiente.

      //comprobamos si se ha recibido un idioma por parámetro:
      if (idioma === '') {
        //Si no es el caso, comprobamos si la cookie idioma tiene un valor asignado:
        if (getCookie('idioma') != '') {
          //Si es el caso, asignamos su valor a idioma:
          idioma = getCookie('idioma');
        }
        else {
          //Si no es el caso, utilizamos el idioma por defecto, español:
          idioma = 'SPANISH';
        }
      }
      sessionStorage.setItem("idioma",getCookie('idioma'));

      //Asignamos a la cookie idioma el valor actual de idioma:
      setCookie('idioma', idioma, 1);
      //Comprobamos el idioma recibido:
      switch (idioma) {
        case 'SPANISH':
          //Si es español, seleccionamos el array correspondiente.
          arrayTraducciones = arraySPANISH;
          break;
        case 'GALLAECIAN':
          //Si es gallego, seleccionamos el array correspondiente.
          arrayTraducciones = arrayGALLAECIAN;
          break;
        case 'ENGLISH':
          //Si es inglés, seleccionamos el array correspondiente.
          arrayTraducciones = arrayENGLISH;
          break;
      }

      //Iteramos sobre las entradas del array de traducciones, traduciendo
      //todas las coincidencias.
      for(var clave in arrayTraducciones) {
        //Almacenamos todos los elementos que html cuya clase
        //es igual a la clave actual del array de traducciones:
        var elementos = document.getElementsByClassName(clave);

        //Recorremos dichos elementos y traducimos su contenido:
        for (var elem in elementos) {
          //elementos es un array, así que cambiamos el
          //contenido HTML del elemento 'elem' del array 'elementos'
          //por el valor de la clave actual en el array de traducciones:
          elementos[elem].innerHTML = arrayTraducciones[clave];
        }
      }

    }

    //Arrays asociativo de traducciones al español:
    const arraySPANISH = {
      'bienvenido' :'Bienvenido al proyecto de IU',
      'Portal_de_Gestión' : 'Portal de Gestión',
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
      'Ejemplo' : 'Ejemplo',
      'Otro' : 'Otro',
      'INGLES' : 'INGLES',
      'ESPAÑOL' : 'ESPAÑOL',
      'GALLAECIAN' : 'GALLEGO',
      'El login no existe' : 'El login no existe',
      'Volver' : 'Volver',
      'La password para este usuario no es correcta' : 'La password para este usuario no es correcta',
      'Registro' : 'Registro',
      'Inserción realizada con éxito' : 'Inserción realizada con éxito',
      'Inserción realizada con exito' : 'Inserción realizada con éxito',
      'Error en la inserción' : 'Error en la inserción',
      'Gestión Asignatura IU' : 'Gestión Asignatura IU',
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
      'unlnownError' : 'error desconocido',
      'sexo' : 'Sexo',
      'male' : 'Hombre',
      'female' : 'Mujer',
      'hombre' : 'hombre',
      'mujer' : 'mujer',
      'Gestión Usuarios' : 'Gestion de usuarios',
      'mix' : 'Mix',
      'tlf' : 'Telefono',
      'bday' : 'Cumpleaños',
      'picture' : 'Foto personal',
      'La titulacion no existe' : 'La titulacion no existe',
      'TitulationExist' : 'La titulacion ya existe',
      'TitulationManager' : 'Gestion de titulaciones',
      'addTitulation' : 'Añadir titulacion',
      'searchTitulation' : 'Buscar titulacion',
      'codeTitulation' : 'Codigo de la Titulacion',
      'codeCenter' : 'Codigo del centro',
      'nameTitulation' : 'Nombre de la Titulacion',
      'responsableTitulation' : 'Responsable de la Titulacion',
      'editTitulation' : 'Editar titulation',
      'deleteTitulation' : 'Eliminar titulacion',
      'searchTitulation' : 'Buscar titulacion',
      'profesorManager' : 'Gestion de profesores',
      'El profesor no existe' : 'Profesor no existe',
      'ProfessorExist' : 'El profesor ya existe',
      'addProfessor' : 'Añadir professor',
      'searchProfessor' : 'Buscar profesor',
      'editProfessor' : 'Editar profesor',
      'deletepRrofessor' : 'Eliminar profesor',
      'searchProfesor' : 'Buscar profesor',
      'departamento' : 'Departamento',
      'area' : 'area',
      'spaceManager' : 'Gestor de espacio',
      'El espacio no existe' : 'El espacio no existe',
      'EspacioExist' : 'Espacio ya existente',
      'addEspacio' : 'Añadir espacio',
      'deleteEspacio' : 'Borrar espacio',
      'editEspacio' : 'Editar espacio',
      'searchEspacio' : 'Buscar espacio',
      'despacho' : 'despacho',
      'laboratorio' : 'laboratorio',
      'CodEspacio' : 'Codigo de espacio',
      'CodEdificio' : 'Codigo de edificio',
      'CodCentro' : 'Codigo del centro',
      'tipo' : 'Tipo',
      'supEspacio' : 'Superficie',
      'nInventary' : 'Número de inventario',
      'El edificio no existe' : 'El edificio no existe',
      'EdificioExist' : 'El edificio ya existe',
      'addEdificio' : 'Añadir edificio',
      'searchEdificio' : 'Buscar edificio',
      'editEdificio' : 'Editar edificio',
      'deleteEdificio' : 'Eliminar edificio',
      'searchEdificio' : 'Buscar edificio',
      'NomEdificio' : 'Nombre del edificio',
      'DirEdificio' : 'Direccion del edificio',
      'CampusEdifio' : 'Campus',
      'buildingManager' : 'Gestor de edificio',  
      'centerManager' : 'Gestor de centros',
      'El centro no existe' : 'El centro no existe',
      'CentroExist' : 'El centro ya existe',
      'NomCentro' : 'Nombre del centro',
      'DirCentro' : 'Direccion del centro',
      'RespCentro' : 'Responsable del centro',
      'addCenter' : 'Añadir centro',
      'searchCenter' : 'Buscar centro',
      'editCenter' : 'Editar centro',
      'deleteCenter' : 'Eliminar centro',
      'DNIandTITULATION estan repetidas' : 'DNI and TITULATION estan repetidas',
      'DNIandTITULATION no existen' : 'DNIandTITULATION no existen',
      'CODTITULACION' : 'Codigo de la titulacion',
      'ANHOACADEMICO' : 'Año academico',
      'P_TManager' : 'Gestor de Profesor-titulacion',
      'addPROF_TIT' :'Añadir profesor y titulacion',
      'editPROF_TIT' : 'Editar profesor y titulacion',
      'searchPROF_TIT' : 'Buscar profesor y titulacion',
      'deletePROF_TIT' : 'Eliminar profesor y titulacion',
      'la tupla no existe' : 'la tupla no existe',
      'DNIandESPACIO estan repetidas' : 'DNIandESPACIO estan repetidas',
      'PROF_ESPACIO no tiene nada que editar' : 'PROF_ESPACIO no tiene nada que editar',
      'addPROF_ESP' :'Añadir profesor y espacio',
      'editPROF_ESP' : 'Editar profesor y espacio',
      'searchPROF_ESP' : 'Buscar profesor y espacio',
      'deletePROF_ESP' : 'Eliminar profesor y espacio',
      'PEmanager' : 'Gestor de profesor y espacio',
      'Error de gestor de base de datos' : 'Error de gestor de base de datos',
      'Inserción fallida: el elemento ya existe' : 'Inserción fallida: el elemento ya existe',
      'Actualización realizada con éxito' : 'Actualización realizada con éxito',
      'Borrado realizado con éxito' : 'Borrado realizado con éxito',
      'noCenter' : 'Sin centro',
      'submit' : 'Aceptar', 
      'profName' : 'Nombre del profesor',
      'TShowC' : 'Detalles',
      'TShowAll' : 'Mostrar todos',
      'Tedit' : 'Editar',
      'Tadd' : 'Añadir',
      'Tdelete' : 'Eliminar',
      'Tsearch' : 'Buscar',
      'empty' : 'Vacio',
      'deleteUser' : 'Eliminar usuario',
      'centAso' : 'Centros asociados:',
      'espAso' : 'Espacios asociados:',
      'titAso' : 'Titulaciones asociadas:',
      'profAso' : 'Profesores asociados',
      'profTitAso' : 'Profesores y titulaciones asociadas',
      'profEspAso' : 'Profesores y espacios asociados',
      'hoyes' : 'Hoy es',
      'Campus' : 'Campus',
      'ISesion' :'Iniciar Sesion',
      'Area' : 'Area',


      //verificaiones---------------------------------------------------------
      'letrasynumeros' : 'El campo solo puede contener letras y números.',
      'dniError' : 'Faltan números o la letra es incorrecta.',
      'textonly' : 'Solo letras.',
      'tlfError' : 'Nueve digitos y el prefijo si hace falta.',
      'emailError' : 'El email no coincide con lo esperado.',
      'bdayError' : 'Introduce una fecha anterior a la actual',
      'fotoError' : 'La extensión no coincide con la de una foto',
      'sexoError' : 'El sexo no coincide con lo esperado',
      'anhoError' : 'Cadena esperada xxxx-xxxx',
      'tipoError' : 'El tipo tiene que ser Despacho, laboratorio o pas',
      'numberError' : 'Solo números',

      //new---------------------------------------------------------------
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
      'open' : '&#9776;Abrir',
         };

     //Arrays asociativo de traducciones al gallego:
    const arrayGALLAECIAN = {
      'bienvenido' :'Bienvenido o proxecto de IU',
      'Portal_de_Gestión' : 'Portal de Xestión',
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
      'area' : 'area',
      'GALLAECIAN' : 'GALEGO',
      'El login no existe' : 'Login non existe',
      'Volver' : 'Volver',
      'La password para este usuario no es correcta' : 'A password para este usuario non é correcta',
      'Registro' : 'Rexistro',
      'Inserción realizada con éxito' : 'Inserción realizada con éxito',
      'Inserción realizada con exito' : 'Inserción realizada con éxito',
      'Error en la inserción' : 'Error na inserción',
      'Gestión Asignatura IU' : 'Xestión Asignatura IU',
      'El usuario, dni, o email ya existe' : 'O usuario, dni, o email xa existe',
      'addUser' : 'Engadir usuario',
      'edit' : 'Editar',
      'editUser' : 'Editar usuario',
      'searchUser' : 'Buscar usuario',
      'unknownError' : 'Error desconocido',
      'showCurrent' : 'Mostrar usuario',
      'show' : 'Mostrar',
      'delete' : 'Eliminar',
      'errorDelete' : 'Error eliminando a tupla',
      'unlnownError' : 'error desconocido',
      'sexo' : 'Sexo',
      'male' : 'Home',
      'female' : 'Muller',
      'hombre' : 'home',
      'mujer' : 'muller',
      'Gestión Usuarios' : 'Xestion de usuarios',
      'mix' : 'Mix',
      'tlf' : 'Telefono',
      'bday' : 'Cumpleanos',
      'picture' : 'Foto persoal',
      'La titulacion no existe' : 'A titulacion non existe',
      'TitulationExist' : 'A titulacion xa existe',
      'TitulationManager' : 'Xestion de titulaciones',
      'addTitulation' : 'Engadir titulacion',
      'searchTitulation' : 'Buscar titulacion',
      'codeTitulation' : 'Codigo da Titulacion',
      'codeCenter' : 'Codigo do centro',
      'nameTitulation' : 'Nome da Titulacion',
      'responsableTitulation' : 'Responsable da Titulacion',
      'editTitulation' : 'Editar titulation',
      'deleteTitulation' : 'Eliminar titulacion',
      'searchTitulation' : 'Buscar titulacion',
      'profesorManager' : 'Xestion de profesores',
      'El profesor no existe' : 'Profesor non existe',
      'ProfessorExist' : 'O profesor xa existe',
      'addProfessor' : 'Engadir professor',
      'searchProfessor' : 'Buscar profesor',
      'editProfessor' : 'Editar profesor',
      'deletepRrofessor' : 'Eliminar profesor',
      'searchProfesor' : 'Buscar profesor',
      'departamento' : 'Departamento',
      'spaceManager' : 'Xestor de espacio',
      'El espacio no existe' : 'O espacio non existe',
      'EspacioExist' : 'Espacio xa existente',
      'addEspacio' : 'Engadir espacio',
      'deleteEspacio' : 'Borrar espacio',
      'editEspacio' : 'Editar espacio',
      'searchEspacio' : 'Buscar espacio',
      'despacho' : 'despacho',
      'laboratorio' : 'laboratorio',
      'CodEspacio' : 'Codigo de espacio',
      'CodEdificio' : 'Codigo do edificio',
      'CodCentro' : 'Codigo do centro',
      'tipo' : 'Tipo',
      'supEspacio' : 'Superficie',
      'nInventary' : 'Numero de inventario',
      'El edificio no existe' : 'O edificio non existe',
      'EdificioExist' : 'O edificio xa existe',
      'addEdificio' : 'Engadir edificio',
      'searchEdificio' : 'Buscar edificio',
      'editEdificio' : 'Editar edificio',
      'deleteEdificio' : 'Eliminar edificio',
      'searchEdificio' : 'Buscar edificio',
      'NomEdificio' : 'Nome do edificio',
      'DirEdificio' : 'Direccion do edificio',
      'CampusEdifio' : 'Campus do edificio',
      'buildingManager' : 'Xestor de edificios', 
      'centerManager' : 'Xestor de centros',
      'El centro no existe' : 'O centro non existe',
      'CentroExist' : 'O centro xa existe',
      'NomCentro' : 'Nome do centro',
      'DirCentro' : 'Direccion do centro',
      'RespCentro' : 'Responsable do centro',
      'addCenter' : 'Engadir centro',
      'searchCenter' : 'Buscar centro',
      'editCenter' : 'Editar centro',
      'deleteCenter' : 'Eliminar centro',
      'DNIandTITULATION estan repetidas' : 'DNI e TITULATION estan repetidas',
      'DNIandTITULATION no existen' : 'DNI e TITULATION non existen',
      'CODTITULACION' : 'Codigo da titulacion',
      'ANHOACADEMICO' : 'Ano academico',
      'P_TManager' : 'Xestor de Profesor-titulacion',
      'addPROF_TIT' :'Engadir profesor e titulacion',
      'editPROF_TIT' : 'Editar profesor e titulacion',
      'searchPROF_TIT' : 'Buscar profesor e titulacion',
      'deletePROF_TIT' : 'Eliminar profesor e titulacion',
      'la tupla no existe' : 'A tupla non existe',
      'DNIandESPACIO estan repetidas' : 'DNI e ESPACIO estan repetidas',
      'PROF_ESPACIO no tiene nada que editar' : 'PROF_ESPACIO non ten nada que editar',
      'addPROF_ESP' :'Engadir profesor e espacio',
      'editPROF_ESP' : 'Editar profesor e espacio',
      'searchPROF_ESP' : 'Buscar profesor e espacio',
      'deletePROF_ESP' : 'Eliminar profesor e espacio',
      'PEmanager' : 'Xestor de profesor e espacio',
      'Error de gestor de base de datos' : 'Error de xestor de base de datos',
      'Inserción fallida: el elemento ya existe' : 'Inserción fallida: o elemento xa existe',
      'Actualización realizada con éxito' : 'Actualización realizada con éxito',
      'Borrado realizado con éxito' : 'Borrado realizado con éxito',
      'noCenter' : 'Sen centro',
      'submit' : 'Aceptar',
      'profName' : 'Nome do profesor',
      'TShowC' : 'Detalles',
      'TShowAll' : 'Mostrar todos',
      'Tedit' : 'Editar',
      'Tadd' : 'Engadir',
      'Tdelete' : 'Eliminar',
      'Tsearch' : 'Buscar',
      'empty' : 'Vacio',
      'deleteUser' : 'Eliminar usuario',
      'centAso' : 'Centros asociados:',
      'espAso' : 'Espazos asociados:',
      'titAso' : 'Titulacions asociadas:',
      'profAso' : 'Profesores asociados',
      'profTitAso' : 'Profesores e titulacions asociadas',
      'profEspAso' : 'Profesores e espazos asociados',
      'hoyes' : 'Hoxe é',
      'Campus' : 'Campus',
      'ISesion' : 'Iniciar sesión',
      'Area' : 'Area',

      'letrasynumeros' : 'O campo só pode conter letras y números.',
      'dniError' : 'Faltan números o a letra é incorrecta.',
      'textonly' : 'Só letras.',
      'tlfError' : 'Nove dixitos e o prefixo se compre.',
      'emailError' : 'O email non coincide co esperado.',
      'bdayError' : 'Introduce unha data anterior a actual',
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
      'errorIn' : 'Error en',
      'open' : '&#9776;Abrir',
     };

     //Arrays asociativo de traducciones al inglés:
    const arrayENGLISH = {
      'bienvenido' :'Welcome to IU project',
      'Portal_de_Gestión' : 'Management website',
      'Usuario_no_autenticado' : 'User not logged',
      'Login' : 'Login', 
      'password' : 'Password',
      'name' : 'Name',
      'surname' : 'Surname',
      'bDate' : 'Birthday',
      'dni' : 'DNI',
      'email' : 'Email',
      'idioma' : 'Language',
      'Usuario' : 'User',
      'Ejemplo' : 'Example',
      'Otro' : 'Other',
      'INGLES' : 'ENGLISH',
      'ESPAÑOL' : 'SPANISH',
      'GALLAECIAN' : 'GALLAECIAN',
      'area' : 'area',
      'El login no existe' : 'The login dont exists',
      'Volver' : 'Back',
      'La password para este usuario no es correcta' : 'Incorrect password for this login',
      'Registro' : 'Register',
      'Error en la inserción' : 'Add error',
      'Inserción realizada con exito' : 'Success insert',
      'Gestión Asignatura IU' : 'User Interface Management',
      'hola' : 'hello',
      'El usuario, dni, o email ya existe' : 'user, dni, or email already exists',
      'addUser' : 'Add user',
      'edit' : 'Edit',
      'editUser' : 'Edit user',
      'searchUser' : 'Search user',
      'dniOrEmailRepeted' : 'Dni or email are repeted',
      'unknownError' : 'Unknown error',
      'sucessfulUpdate' : 'Sucessful update',
      'showCurrent' : 'Show user',
      'show' : 'Show',
      'delete' : 'Delete',
      'sucessfulDelete' : 'Sucessful delete', 
      'errorDelete' : 'User doesn\'t exist',
      'Inserción realizada con éxito' : 'Sucessful adding',
      'Inserción realizada con exito' : 'Sucessful adding',
      'sexo' : 'Sex',
      'male' : 'Male',
      'female' : 'Female',
      'hombre' : 'Male',
      'mujer' : 'Female',
      'Gestión Usuarios' : 'Users manager',
      'mix' : 'Mix',
      'tlf' : 'Telephone',
      'bday' : 'Birthday',
      'picture' : 'Picture',
      'La titulacion no existe' : 'Titulation doesn\'t exist',
      'TitulationExist' : 'Titulation already exists',
      'TitulationManager' : 'Titulation\'s Manager',
      'addTitulation' : 'Add titulation',
      'searchTitulation' : 'Search titulation',
      'codeTitulation' : 'Titulacion\s code',
      'codeCenter' : 'Center\'s code',
      'nameTitulation' : 'Titulation\'s name',
      'responsableTitulation' : 'Titulacion\'s resposable',
      'editTitulation' : 'Edit titulation',
      'deleteTitulation' : 'Delete titulation',
      'searchTitulation' : 'Search titulation',
      'profesorManager' : 'Professors manager',
      'El profesor no existe' : 'Professor doesn\t exist',
      'ProfessorExist' : 'Professor already exists',
      'addProfessor' : 'Add professor',
      'searchProfessor' : 'Search Professor',
      'editProfessor' : 'Edit proffesor',
      'deletepRrofessor' : 'Delete professor',
      'searchProfesor' : 'Search Professor',
      'departamento' : 'Departament',
      'spaceManager' : 'Space manager',
      'El espacio no existe' : 'Room doen\'t exist',
      'EspacioExist' : 'Room already exists',
      'addEspacio' : 'Add espacio',
      'deleteEspacio' : 'Delete espacio',
      'editEspacio' : 'Edit espacio',
      'searchEspacio' : 'Search espacio',
      'despacho' : 'office',
      'laboratorio' : 'lab',
      'CodEspacio' : 'Space\'s code',
      'CodEdificio' : 'Building\'s code',
      'CodCentro' : 'Center\'s code',
      'tipo' : 'Type',
      'supEspacio' : 'Space\'s superficie',
      'nInventary' : 'Number of inventary',
      'El edificio no existe' : 'Building doesn\'t exist',
      'EdificioExist' : 'Build already exists',
      'addEdificio' : 'Add building',
      'searchEdificio' : 'Search building',
      'editEdificio' : 'Edit building',
      'deleteEdificio' : 'Delete building',
      'searchEdificio' : 'Search building',
      'NomEdificio' : 'Building\'s name',
      'DirEdificio' : 'Building\'s address',
      'CampusEdifio' : 'Building\'s campus',
      'buildingManager' : 'Building manager',
      'centerManager' : 'Center manager',
      'El centro no existe' : 'Center doesn\'t exist',
      'CentroExist' : 'Center already exists',
      'NomCentro' : 'Center\'s name',
      'DirCentro' : 'Center\'s address',
      'RespCentro' : 'Center\'s resposable',
      'addCenter' : 'Add center',
      'searchCenter' : 'Search center',
      'editCenter' : 'Edit center',
      'deleteCenter' : 'Delete center',
      'searchCenter' : 'Search center',
      'DNIandTITULATION estan repetidas' : 'DNI and TITULATION are repated',
      'DNIandTITULATION no existen' : 'DNIandTITULATION doesn\'t exist',
      'CODTITULACION' : 'Titulation\'s code',
      'ANHOACADEMICO' : 'Academic year',
      'P_TManager' : 'Teacher-titulation manager',
      'addPROF_TIT' :'Add professor and titulation',
      'editPROF_TIT' : 'Edit professor and titulation',
      'searchPROF_TIT' : 'Search professor and titulation',
      'deletePROF_TIT' : 'Delete professor and titulation',
      'la tupla no existe' : 'tupla doesn\'t exist',
      'DNIandESPACIO estan repetidas' : 'DNIandESPACIO are repeated',
      'PROF_ESPACIO no tiene nada que editar' : 'PROF_ESPACIO doesn\'t have anything to edit',
      'addPROF_ESP' :'Add professor and space',
      'editPROF_ESP' : 'Edit professor and space',
      'searchPROF_ESP' : 'Search professor and space',
      'deletePROF_ESP' : 'Delete professor and space',
      'PEmanager' : 'Professor and space manager',
      'Error de gestor de base de datos' : 'Error on databases manager',
      'Inserción fallida: el elemento ya existe' : 'Error insertion: element already exists',
      'Actualización realizada con éxito' : 'Update successfully',
      'Borrado realizado con éxito' : 'Delete successfully',
      'noCenter' : 'No center',
      'submit' : 'Submit', 
      'profName' : 'Professor\'s name',
      'TShowC' : 'Details',
      'TShowAll' : 'Show all',
      'Tedit' : 'Edit',
      'Tadd' : 'Add',
      'Tdelete' : 'Delete',
      'Tsearch' : 'Search',
      'empty' : 'Empty',
      'deleteUser' : 'Delete user',
      'centAso' : 'Associated centers:',
      'espAso' : 'Associated spaces:',
      'titAso' : 'Associated titulations:',
      'profAso' : 'Associated professors:',
      'profTitAso' : 'Associated professors and titulations',
      'profEspAso' : 'Associated professors and espacios',
      'hoyes' : 'Today is',
      'letrasynumeros' : 'Field can only contain numbers and letters',
      'dniError' : 'There are missing numbers or letter doesn\'t match.',
      'textonly' : 'Text only',
      'tlfError' : 'Nine digits and prefix if it\'s needed',
      'emailError' : 'Email doesn\'t expected.',
      'bdayError' : 'Date must be previous to actual date',
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
      'open' : '&#9776;Open',
      'Campus' : 'Campus',
      'ISesion' : 'Log in',
      'Area' : 'Area',
     };

//FUNCIÓN: setCookie
//DESCRIPCIÓN: recibe el nombre y valor  de la cookie a crear o actualizar,
// y el tiempo que tardará en caducar en días.
function setCookie(cname, cvalue, exdays) {
  var d = new Date(); //fecha de expiración de la cookie.
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  //Variable que contiene la cadena que indica cuando expira la cookie:
  var expires = "expires="+ d.toUTCString(); 
  //Añadimos la cookie.
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

//FUNCIÓN: getCookie
//DESCRIPCIÓN: obtiene el valor de la cookie pasada por parámetro.
function getCookie(cname) {
  var name = cname + "="; //Cadena que indica el nombre de la cookie.
  var decodedCookie = decodeURIComponent(document.cookie); //obtenemos la info de cookies.
  var ca = decodedCookie.split(';'); //separamos las cookies por el ';', generando un array.
  //Recorremos el array de cookies:
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i]; //Cookie actual:
    //Iteramos hasta encontrar un caracter distinto al espacio:
    while (c.charAt(0) == ' ') {
      c = c.substring(1); //reasignamos la cookie ignorando el primer char.
    }
    //Cuando el nombre de nuestra cookie esté al comienzo de la cadena, detenemos el bucle: 
    if (c.indexOf(name) == 0) {
      //Devolvemos el valor de la cookie:
      return c.substring(name.length, c.length);
    }
  }
  //Si no la encontramos, devolvemos vacío:
  return "";
}
