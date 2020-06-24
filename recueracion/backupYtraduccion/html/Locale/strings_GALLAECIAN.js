//Clase : Strings_GALLAECIAN
//Creado el : 2-10-2019
//Creado por: grvidal
//Diccionario en gallego con todas las cadenas que hay en la plataforma
//-------------------------------------------------------
const arrayGALLAECIAN =  {
      
      'Usuario_no_autenticado' : 'Usuario non autenticado',
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
      'unknownError' : 'Erro descoñecido',
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
      'letrasynumeros' : 'O campo só pode conter letras e números.',
      'dniError' : 'Faltan números ou a letra é incorrecta.',
      'textonly' : 'Só letras.',
      'tlfError' : 'Nove dixitos e o prefixo se compre.',
      'emailError' : 'O email non coincide co esperado.',
      'fechaNacimientoError' : 'Introduce unha data anterior a actual',
      'fotoError' : 'A extensión non coincide coa dunha foto',
      'sexoError' : 'O sexo non coincide co esperado',
      'tipoError' : 'O tipo ten que ser despacho, laboratorio ou pas',
      'numberError' : 'Só números',
      'paramVacio' : 'non pode estar valeiro.',
      'toolong' : 'é demasiado longo.',
      'tooshort' : 'é demasiado corto, compre al menos 1 caracteres.',
      'tooshortNoNNum' : 'é demasiado corto, compre polo menos 3 caracteres.',
      'sexoError' : 'só pode ser home ou muller.',
      'dateError' : 'non ten o formato correcto, formato requerido yyyy-mm-dd.',
      'emailErrorCode' : 'non ten o formato correcto, formato requerido x.@x.(com|es|org)',
      'alfNumguion' : 'só estan permitido letras, números e guión \'-\'.',
      'alfNum' : 'só estan permitidos números e letras.',
      'anhoAcadCode' : 'Só se permite dddd-dddd (ano académico) onde d é un díxito.',
      'onlynumbers' : 'só estan permitidos números.',
      'dirError' : 'só pode conter letras, numeros e os símbolos  “- / º ª.',
      'tipo_usuarioError' : 'O tipo de usuario ten que ser usuario ou administrador',
      'dirError' : 'A direccion conten algun erro, so letras, números, comas e \'º\'',
      'tooShortNoNum' : 'Necesita polo menos 3 caracteres',

      'errorIn' : 'Erro en',
      'open' : '&#9776;Abrir',
      'Volver' : 'Volver',

      

      // Header
      'Intercambio de tiempo' : 'Intercambio de tempo',


      //menu lateral
    'MisIntercambios' : 'Os meus intercambios',
    'MiPerfil' : 'O meu perfil',
    'VerUsuarios' :'Ver usuarios',
    'VerProductos' :'Ver produtos',

      //usuarios
      'alergias' : 'Alerxias',
      'cp' : 'Codigo postal',
      'direccion' : 'Direccion',
      'errorCP' : 'So esta permitido un codigo postal válido composto por 5 dixitos.',
      'Gestión Usuarios' : 'Xestion de usuarios',
      'tipo_usuario' :'Tipo de usuario',
      'Usuario_no_autenticado' : 'Usuario non autenticado',
      'Login' : 'Login',
      'name' : 'Nome',
      'tipo_usuario' :'Tipo de usuario',
      'password' : 'Contrasinal',
      'surname' : 'Apelidos',
      'dni' : 'DNI',
      'email' : 'Email',
      'bDate' : 'Data de nacemento',
      'idioma' : 'Idioma',
      'Usuario' : 'Usuario',
      'format' :'mm/dd/aaaa',
      'admin' : 'Administrador',
      'Usuario' : 'Usuario / Cliente',
      'activado': 'Activado',
      'desactivado' : 'Desactivado',
      'activadoError' : 'O usuario so pode estar activado ou desactivado',
      'todoTipo' : 'Calquera tipo',
      'ofertas' : 'Ofertas activas',
      'transacciones' : 'Transaccións realizadas',

      //INdex View
      'indexTitle' : 'Benvido a Intercambio de tempo',
      'indexDescrip' :'Aqui podes buscar ofertas para intercambialas por ofertas tuas, poden ser produtos caseiros ou cultivados, tamén pode ser traballo fisico!',
      'IndexViewLink' : 'Páxina principal',
      'indexFuncion' : 'Usa a barra superior para buscar pordutos que conteñan esa palabra e teñan igual ou máis unidades das especificadas.',
      //ranking   
      'rankingCategorias' : 'Categorias con máis puntos',
      'rankingProductos'  :  'Pordutos con máis puntos',
      'rankingTransacciones'  :  'Intercambios mellor valorados',
      'puesto' : 'Posto',
      'rankingCategoriasExplicacion' : 'Aqui podes ver as categorias que teñen produtos que furon valorados xunto coa suma das puntuacions',
      'rankingProductosExplicacion'  :  'Aqui podes ver os produtos que furon valorados xunto coa puntuacion total obtida',

      //noPermiso
      'noPermisoT' : 'Non tes permiso para estar aqui',
      'noTienesPermiso' : 'lamentoo pero non tes permiso para estar aqui :D, por favor volve a paxina principal',

      //Pie de pagina
      'hoyes' : 'Hoxe é',
    'fcreacion' : 'Data de creacion',


      //Gestion de productos
    'Gestión Productos' : 'Xestion dos produtos',
    'addProducto' : 'Novo produto',
    'searchProducto' : 'Buscar produto',
    'editProducto' : 'Editar produto',
    'tituloProducto' : 'Titulo do produto',
    'descripcionProducto' : 'Descripcion do produto',
    'eliminarProducto' : 'Eliminar produto',
    'fotoProducto' : 'Foto do produto',
    'disponibilidad' : 'Disponibilidad',
    'origen' : 'Orixen',
    'fabricado_a_mano' : 'Fabricado a man',
    'cultivado' : 'Cultivado',
    'trabajo' : 'Traballo fisico',
    'horasUnidades' : 'Unidades ou horas',
    'verUser' : 'Ver usuario',
    'producto' : 'Produto',
    'titulo':'Titulo',
    

    //Gestion de categorias
    'Gestión Categorias' : 'Xestion de categorias',
    'addCategoria' : 'Nova categoria',
    'nombreCategoria' : 'Nome da categoria',
    'editCategoria' : 'Editar a categoria',
    'idCategoria' : 'ID da categoria',
    'productosEnCategoria' : 'Produtos nesta categoria',
    'idCategoriaError' :'Erro na categoria',
    'categorias' : 'Categorias',

    //Gestion de categorias_productos
    'Gestión Productos-Categorias' : 'Xestion de produtos-categorias',
    'idCategoria' : 'Id categoria',
    'idProducto' : 'Id produto',
    'addProdCate' : 'Engadir Produto-Categoria',
    'searchProductoCategoria' : 'Buscar produto-categoria',
    'eliminarProductoCategoria' : 'Eliminar produto-categoria',
    'editarProductoCategoria' : 'Editar produto-categoria',
    'enlaceProducto' : 'Enlace ao produto',
    'enlaceCategoria' : 'Enlace a categoria',

    //Gestion de Intercambios
    'intercambios' : 'Intercambios',
    'idProd1' : 'ID produto 1',
    'idProd2' : 'ID produto 2',
    'unid1' : 'Unidades do produto 1',
    'unid2' : 'Unidades do produto 2',
    'accept1' : 'Estado aceptacion usuario 1',
    'accept2' : 'Estado aceptacion usuario 2',
    'addInter' : 'Engadir intercambio',
    'editInter' : 'Editar intercambio',
    'searchInter' : 'Buscar intercambio',
    'deleteInter' :'Eliminar intercambio',
    'idRepetidos' :'Os produtos non poden estar repetidos',
    'noMayor' : 'Este ten que estar entre 1 e o maximo',
    'aceptado' : 'Aceptado',
    'denegado' : 'Rechazado',
    'acceptError' : 'Erro no estado de aceptacion',
    'noPodraDeshacerse' : 'Se ambos usuarios marcades o estado de aceptacion como aceptado, non poderedes desfacer o intercambio',
    'noEditable' : 'Os usuarios non poden modificar un intercambio despois de haber sido aceptado por ambas partes',
    'verProd' : 'Ver produto',

    //Gestion de VALORACIONES
    'Gestión valoraciones' : 'Xestion das valoracions',
    'addValoracion' : 'Nova valoracion',
    'searchValoracion' : 'Buscar valoracions',
    'editValoracion' : 'Editar a valoracion',
    'deleteValoracion' : 'Eliminar a valoracion',
    'idIntercambio' : 'ID do intercambio',
    'puntuacion' : 'Puntuacion',
    'coment' : 'Comentario',
    'valoraciones' : 'Valoracions',
    'outLimit': 'O valor esta fora dos limites, por favor, entre 0 e 10',


    //mensajes
    'mensajes' : 'Mensaxes',
    'introduccionMensajes' : 'Nesta vista podense ver as ultimas mensaxes de cada conversa que teñas. Recorda que só poderas engadir as mensaxes si o tramite non se marcou como aceptado por ambas partes.',
    'titulosMensaje' : 'Titulos dos produtos',
    'fecha' : 'Data',
    'usuario' : 'Usuario',
    'contenido' : 'Contido di mensaxe',
    'titulosMsg' : 'Titulos dos produtos',
    'hora':'Hora',
    'horaError':'A hora ten que estar comprendida entre 00:00 e 23:59',
    'timeHelp':'Toque o botón a la esquerda do cuadro para seleccionar a hora',
    'addMSG' : 'Añadir mensaxe',
    'ChatFinalizado' : 'A transaccion fui aceptada por ambos usuarios, non puedese engadir mensaxes a esta conversa',
    'fechaSearchAdvice' : 'Se pos a data tamen tes que por a hora, e se pos a hora tamen tes que por a data',
    'explicacionShowAll' : 'Fai click no boton de \"ver\" para abrir a conversa e ver todos as mensaxes.',
    'explicaionShowConver' : 'As mensaxes máis recientes aparecen na parte superior. Se lle das o boton de engadir, poderas engadir unha mensaxe nesta conversa.',

    //codigos de error
    '00001' : '00001 Insercion fallida, o elemento xa existe',
    '00002' : '00002 Insercion realizada con exito',
    '00003' : '00003 Erro do xestor de base de datos en ADD',
    '00004' : '00004 Erro do xestor de base de datos en SEARCH',
    '00005' : '00005 Borrado realizado con exito',
    '00006' : '00006 Erro do xestor de base de datos en DELETE',
    '00007' : '00007 Actualización realizada con éxito',
    '00008' : '00008 Erro do xestor de base de datos en EDIT',
    '00009' : '00009 O login non existe',
    '00010' : '00010 O contrasinal para este usuario non é correcto',
    '00011' : '00011 Login correcto',
    '00012' : '00012 O usuario xa existe',
    '00013' : '00013 Erro no rexistro na base de datos',
    '00014' : '00014 Rexistro realizado con éxito',
    '00015' : '00015 Erro do xestor de base de datos en RecheaDatos',
    '00016' : '00016 Erro inesperado en ADD',
    '00017' : '00017 Non se pode eliminar porque está asociado a unha transacción',
    'vendedorDNI' : 'DNI do vendedor',
    'vendedorDNIError' : 'O DNI non coincide con ningun usuario actual',
    'persona' :'Persoa asociada',
    'estado' : 'Estado',
    'estadoError' : 'O estado so pode ser disponible ou vendido',
    'tramite' : 'Disponible',
    'vendido' : 'Vendido',
    'indiferente' : 'Indiferente',
    'yo' : 'Eu',
    'ClavesForaneasPermanentes': 'As claves foraneas non se poden cambiar'


     };
     export { arrayGALLAECIAN };