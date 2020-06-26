//Clase : validaciones.js
//Creado el : 9-06-2020
//Creado por: grvidal
//Valida los datos de los formularios
//La estructura es de tipo arbol, los metodos accesibles son los que tienen
//el mismo nobmre que los atributos junto con comprobarAlfabetico, comprobarAlfabeticoVacio y  comprobarTexto,
//Todos estos llaman a comprobar expresion regular, el cual comprueba la expresion regular y el tamaño maximo,
//sin embargo el tamaño minimo se comprueba en los metodos propios
//-------------------------------------------------------



/*Comprueba que sólo haya caracteres alfanuméricos*/
/*abc- es una expresión regular que comprueba si el carácter es alfanuméricos de principio a fin*/
function comprobarAlfabetico(campo, size) {
    var abc =/^\w[\wñº,. ]*$/;
    
    if(!comprobarExpresionRegular(campo,abc,size)){//comprueba que la expresión enviada en abc sea cumplida por el campo enviado si no lo hace devuelve false
         
        return false;
    }else if(campo.value.length < 3){ // si el campo es menor que 3 caracteres se avisa del error
        campo.style.border = "2px solid red";
        document.getElementById(campo.name+"_errorLength").style.visibility = "visible";
        return false;
    }  
    return true;
}

/*Comprueba que sólo haya caracteres alfanuméricos o que esta vacio*/
/*abc- es una expresión regular que comprueba si el carácter es alfanuméricos de principio a fin*/
function comprobarAlfabeticoVacio(campo, size) {
    var abc =/^[\wñº, ]*$/;

    if(campo.value.length <= 0){// si el campo esta vacio se acepta como valido
        document.getElementById(campo.name+"_error").style.visibility = "hidden";
        document.getElementById(campo.name+"_errorLength").style.visibility = "hidden";
            campo.style.border = "2px solid green";
            return true;
    }else if(!comprobarExpresionRegular(campo,abc,size)){//comprueba que la expresión enviada en abc sea cumplida por el campo enviado si no lo hace devuelve false
         
        return false;
    }
    return true;
    
}

/*Comprueba que sólo haya caracteres alfanuméricos y que no esta vacio*/
/*abc- es una expresión regular que comprueba si el carácter es alfanuméricos de principio a fin*/
function comprobarEntero(campo) {
    var abc =/^[0-9]+$/;

    if(!comprobarExpresionRegular(campo,abc,100)){//comprueba que la expresión enviada en abc sea cumplida por el campo enviado si no lo hace devuelve false
        return false;
    }else if(!comprobarVacio(campo)){// si el campo esta vacio no se acepta como valido
            return false;
    }else{

    
        campo.style.border = "2px solid green";
        return true;
    }
}

/*Comprueba que sólo haya caracteres alfanuméricos*/
/*abc- es una expresión regular que comprueba si el carácter es alfanuméricos de principio a fin*/
function comprobarEnteroVacio(campo) {
    var abc =/^[0-9]+$/;

    if(campo.value.length <= 0){// si el campo esta vacio se acepta como valido
        
        var elem = document.getElementById(campo.name+"_error");
        if (elem != null) elem.style.visibility = "hidden";// si no hay elemento no se modifica la visibilidad
        campo.style.border = "2px solid green";
        return true;

    }else if(!comprobarExpresionRegular(campo,abc,100)){//comprueba que la expresión enviada en abc sea cumplida por el campo enviado si no lo hace devuelve false
         
        return false;
    }else {
        campo.style.border = "2px solid green";
        return true;
    }
}



/*Comprueba que sólo haya caracteres alfanuméricos y \n*/
/*abc- es una expresión regular que comprueba si el carácter es alfanuméricos de principio a fin*/
function comprobarAlfabeticoEnter(campo, size) {
    var abc =/^\w[\wñº\n,.!? ]*$/;
    
    if(!comprobarExpresionRegular(campo,abc,size)){//comprueba que la expresión enviada en abc sea cumplida por el campo enviado si no lo hace devuelve false
         
        return false;
    }else if(campo.value.length < 3){ // si el campo es menor que 3 caracteres se avisa del error
        campo.style.border = "2px solid red";
        document.getElementById(campo.name+"_errorLength").style.visibility = "visible";
        return false;
    }  
    return true;
}

/*Comprueba que sólo haya caracteres alfanuméricos y \n*/
/*abc- es una expresión regular que comprueba si el carácter es alfanuméricos de principio a fin*/
function comprobarAlfabeticoEnterVacio(campo, size) {
    var abc =/^\w[\wñº\n,.!? ]*$/;
    
    if(campo.value.length <= 0){ // si el campo es menor que 3 caracteres se avisa del error
        campo.style.border = "2px solid green";
        var elem = document.getElementById(campo.name+"_errorLength");
        if (elem != null) elem.style.visibility = "visible";
        return false;
    }
    if(!comprobarExpresionRegular(campo,abc,size)){//comprueba que la expresión enviada en abc sea cumplida por el campo enviado si no lo hace devuelve false
         
        return false;
    }
        campo.style.border = "2px solid green";
        var elem = document.getElementById(campo.name+"_errorLength");
        if (elem != null) elem.style.visibility = "hidden";
    return true;
}


/*Comprueba que el texto sea alfabético y que pueda tener espacios*/
/*comprueba- es una variable que se utiliza para la comprobación y observa que no haya carácteres no alfabéticos (también permite que haya espacios entre palabras)*/
function comprobarTexto( campo, size ) {
    var comprueba=/^[A-Za-zñáéíóú]{1}[A-Za-zñáéíóú ]*$/i;
    if(!comprobarExpresionRegular(campo,comprueba,size)){//comprueba que la expresión enviada en comprueba sea cumplida por el campo enviado si no lo hace devuelve false
        return false;
    }
    else if(campo.value.length < 3){  // si el campo es menor que 3 caracteres se avisa del error
        campo.style.border = "2px solid red";
        document.getElementById(campo.name+"_errorLength").style.visibility = "visible";
        return false; }
    //envía true en caso contrario
    else {
        document.getElementById(campo.name+"_error").style.visibility = "hidden";
        document.getElementById(campo.name+"_errorLength").style.visibility = "hidden";
        campo.style.border = "2px solid green";
        return true;
    }
}

/*Comprueba que el texto sea alfabético y que pueda tener espacios*/
/*comprueba- es una variable que se utiliza para la comprobación y observa que no haya carácteres no alfabéticos (también permite que haya espacios entre palabras)*/
function comprobarTextoVacio( campo, size ) {
    var comprueba=/^[A-Za-zñáéíóú]{1}[A-Za-zñáéíóú ]*$/i;

    if(campo.value.length <= 0){// si el campo esta vacio se acepta como valido
        document.getElementById(campo.name+"_error").style.visibility = "hidden";
        document.getElementById(campo.name+"_errorLength").style.visibility = "hidden";
            campo.style.border = "2px solid green";
            return true;

    }else if(!comprobarExpresionRegular(campo,comprueba,size)){//comprueba que la expresión enviada en comprueba sea cumplida por el campo enviado si no lo hace devuelve false
        return false;
    }
    //envía true en caso contrario
    else {
        return true;
    }
}

/*Comprueba que el texto sea un codigo postal*/
/*comprueba- es una variable que se utiliza para almacenar la expresion regular con la que el codigo postal tiene que coincidir*/
function comprobarCP( campo) {
    var comprueba=/^[0-9]{5}$/i;

    if (campo.value.length <= 0) {// si el campo esta vacio se acepta como valido

        document.getElementById(campo.name+"_error").style.visibility = "hidden";
        campo.style.border = "2px solid green";
        return true;
    }else if(!comprobarExpresionRegular(campo,comprueba,5)){//comprueba que la expresión enviada en comprueba sea cumplida por el campo enviado si no lo hace devuelve false
        return false;
    }
    else {
        campo.style.border = "2px solid green";
        return true;
    }
}

/*Comprueba que el texto sea un codigo postal*/
/*comprueba- es una variable que se utiliza para almacenar la expresion regular con la que el codigo postal tiene que coincidir*/
function comprobarCPSearch( campo) {
    var comprueba=/^[0-9]{1,5}$/i;

    if (campo.value.length <= 0) {// si el campo esta vacio se acepta como valido

        document.getElementById(campo.name+"_error").style.visibility = "hidden";
        campo.style.border = "2px solid green";
        return true;
    }else if(!comprobarExpresionRegular(campo,comprueba,5)){//comprueba que la expresión enviada en comprueba sea cumplida por el campo enviado si no lo hace devuelve false
        return false;
    }
    else {
        campo.style.border = "2px solid green";
        return true;
    }
}

/*Comprueba si cumple la expresión reguladora enviada,si tiene valores diferentes al enviado devuelve false*/
function comprobarExpresionRegular(campo, exprreg, size) {
    if(!comprobarVacio(campo)){//si está vacío devuelve false
        return false;
    }
    else if ( exprreg.test( campo.value ) == false ) {//si no cumple la expresión regular devuelve false
        document.getElementById(campo.name+"_error").style.visibility = "visible";
        campo.style.border = "2px solid red";
        return false;
    }
    else if(!comprobarTamaño(campo,size)){//si es mayor que el tamaño indicado devuelve false
        alert("Maximo tamaño del campo "+ campo.name+" : " + size);
        return false;
    }//si cumple todas las condiciones devuelve true
        else {
            if ( document.getElementById(campo.name+"_error") != null)
            document.getElementById(campo.name+"_error").style.visibility = "hidden";
        if ( document.getElementById(campo.name+"_errorLength") != null)
            document.getElementById(campo.name+"_errorLength").style.visibility = "hidden";
            campo.style.border = "2px solid green";
            return true;
    } 
}

/*Comprueba si el campo es null o 0 y devuelve false, si existe algo devuelve true*/
function comprobarVacio( campo ) {
    if ( ( campo.value == null ) || ( campo.value.length == 0  ) ){//comprueba si es null o 0
            var elem = document.getElementById(campo.name+"_errorLength");
        if (elem != null) elem.style.visibility = "visible";
            campo.style.border = "2px solid red";
            return false;
    } else {//si existe algo devuelve true
        var elem = document.getElementById(campo.name+"_errorLength");
        if (elem != null) elem.style.visibility = "hidden";
            campo.style.border = "2px solid green";
            return true;
    }
}

/*Comprueba que no se exceda el tamaño máximo*/
function comprobarTamaño( campo, size ) {
    if(!comprobarVacio(campo)){//si está vacío devuelve false
        return false;
    }
    else if ( campo.value.length > size ) {//si no está vacío devuelve false si excede el tamaño máximo
            campo.style.border = "2px solid red";
            return false;
    }//si está correcto el tamaño y no excede devuelve true
        else {
            campo.style.border = "2px solid green";
            return true;
    }
}

/*Comprueba si el DNI enviado está bien escrito*/
/*letras-Comprueba que la letra del DNI enviado es correcta*/
function comprobarDni(campo) {
    var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
    var exp = /^\d{8}[A-Z]$/;
    if(!comprobarVacio(campo)){//comprueba si está vacío
        return false;
    } 
    else if( !comprobarExpresionRegular(campo,exp,9)) {//comrueba que el DNI esté formado por 8 digitos y una letra
                    campo.style.border = "2px solid red";     
                    return false;
        
    }
    else if(campo.value.charAt(8) != letras[(campo.value.substring(0, 8))%23]) {//en el caso de que tenga los 8 digitos y la letra comprueba que la letra sea correcta
                     document.getElementById(campo.name+"_error").style.visibility = "visible";
                    campo.style.border = "2px solid red";       
                    return false;
    }
        campo.style.border = "2px solid green";
    return true;
}


/*Comprueba si el DNI enviado está bien escrito*/
/*letras-Comprueba que la letra del DNI enviado es correcta*/
function comprobarDniSearch(campo) {
    var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
    var  exp = /^\d{8}[A-Z]$/;
    var  exp2 = /^\d{0,7}[A-Z]?$/;
    if(!comprobarVacio(campo)){//comprueba si está vacío
        return false;
    }
    else if(comprobarExpresionRegular(campo,exp,9)){// si el DNI esta compuesto por 8 digitos y una letra

        if(campo.value.charAt(8) == letras[(campo.value.substring(0, 8))%23]){// se comprueba que la ultima legra encaje con los numeros
            campo.style.border = "2px solid green";
            return true;
        }  
    }
     else if(comprobarExpresionRegular(campo,exp2,9) ) {//comrueba que el DNI esté formado por digitos y con o sin una unica letra al final
                    campo.style.border = "2px solid green";     
                    return true;
        
    }   
    campo.style.border = "2px solid red";
    return false;
}


/*Comprueba que el telefono tenga un formato nacional o internacional*/
/*telef- permite comprobar que el teléfono tenga un formato de 9 dígitos, 34 y 9 dígitos, +34 y 9 dígitos o 0034 y 9 dígitos*/
function comprobarTelf( campo ) {
    var telef = /^(\+34|0034|34)?([0-9]){9}$/;
    if(!comprobarExpresionRegular(campo,telef,13)){//comprueba que la expresión enviada en telef sea cumplida por el campo enviado si no lo hace devuelve false
        campo.style.border = "2px solid red";
        return false;
    }else {
            campo.style.border = "2px solid green";
            return true;
    }
}


/*Comprueba que el telefono tenga un formato nacional o internacional*/
/*telef- permite comprobar que el teléfono tenga un formato de 9 dígitos, 34 y 9 dígitos, +34 y 9 dígitos o 0034 y 9 dígitos*/
function comprobarTelfSearch( campo ) {
    var telef = /^([\+|00]?[0-9]{2})?([0-9]){0,9}$/;
    if(!comprobarExpresionRegular(campo,telef,13)){//comprueba que la expresión enviada en telef sea cumplida por el campo enviado si no lo hace devuelve false
        campo.style.border = "2px solid red";
        return false;
    }else {
            campo.style.border = "2px solid green";
            return true;
    }
}

/*Comprueba que el campo tenga un formato numerico*/
/*exp- permite comprobar que el campo tenga solo numeros*/
function comprobarNum( campo ,size ) {
    var exp = /^[0-9]*$/;
    if(!comprobarExpresionRegular(campo,exp,size)){//comprueba que la expresión enviada en telef sea cumplida por el campo enviado si no lo hace devuelve false
        return false;
    }else {
            campo.style.border = "2px solid green";
            return true;
    }
}

/*Comprueba que el email tenga un formato adecuado*/
/*email- expresion que define un email*/
function comprobarEmail( campo, size ) {
    var email = /^[a-zñ0-9]+@([ña-z]+.)+(es|org|com)$/;
    if(!comprobarExpresionRegular(campo,email,size)){//comprueba que la expresión enviada en email sea cumplida por el campo enviado si no lo hace devuelve false
        return false;
    }else {
            campo.style.border = "2px solid green";
            return true;
    }
}

/*Comprueba que el email tenga un formato adecuado*/
/*email- expresion que define un email*/
function comprobarEmailSearch( campo, size ) {
    var email = /^[a-zñ0-9]*@?([ña-z]*.)*(es|org|com)?$/;
    if(!comprobarExpresionRegular(campo,email,size)){//comprueba que la expresión enviada en email sea cumplida por el campo enviado si no lo hace devuelve false
        return false;
    }else {
            campo.style.border = "2px solid green";
            return true;
    }
}

/*Comprueba que el año tenga un formato adecuado*/
/*exp- expresion que define un el año academico*/
function comprobarAnhoSearch(campo){
    var exp = /^[0-9]{0,4}-?[0-9]{0,4}$/;
    if(!comprobarExpresionRegular(campo,exp,9)){//comprueba que la expresión enviada en año sea cumplida por el campo enviado si no lo hace devuelve false
        return false;
    }else {
            campo.style.border = "2px solid green";
            return true;
    }
    
}

/*Comprueba que la fecha de nacimiento sea anterior a la fecha actual*/
//parts- partes de la fecha
//day - dia introducida
//month - mes introducido
//year - año introducid
//actualDate - fecha actual del servidor
function comprobarFechaNacimiento(campo) {
    //divide la fecha a traves del guion

    var parts = campo.value.split("-");
    var day = parseInt(parts[2], 10);
    var month = parseInt(parts[1], 10);
    var year = parseInt(parts[0], 10); 

    var actualDate = new Date(); 


    if(year > actualDate.getFullYear()){//si al año es mayor da error
        campo.style.border = "2px solid red";
        document.getElementById(campo.name+"_error").style.visibility = "visible";
        return false;

    }else if (year ==  actualDate.getFullYear()){//si el año es igual hay que mirar el mes

        if (month > (actualDate.getMonth()+1)) { //si el mes mayor, da error
            campo.style.border = "2px solid red";
            document.getElementById(campo.name+"_error").style.visibility = "visible";
            return false;

        }else if (month == (actualDate.getMonth()+1)){ // si el mes es igual hay que mirar el dia
            if(day > actualDate.getDate()){// si el dia es mayor da error, sino devuelve true
               
                campo.style.border = "2px solid red";
                document.getElementById(campo.name+"_error").style.visibility = "visible";
                return false;
            }
        }
    }else if (!comprobarVacio(campo)){//comprobar si esta vacio
            return false;
    }
    document.getElementById(campo.name+"_error").style.visibility = "hidden";
    campo.style.border = "2px solid green";
    return true;
    
    
}

/*Comprueba que los productos no esten repetidos*/
/*string- string con el nombre del campo a comparar*/
/*prod1- el campo que se obtuvo a partir del nombre del campo*/
function checkEquals(numero,campo){
    var string = "idProd"+numero;
    var prod1 = document.getElementById(string);

    if(campo.value == prod1.value){// si los campos son iguales se muestra el error
        document.getElementById(campo.name+'_error').style.visibility = "visible";
        return false;
    } 
    document.getElementById(campo.name+'_error').style.visibility = "hidden";
    return true;
}

/*Comprueba que los productos no esten repetidos o que esten vacios*/
/*string- string con el nombre del campo a comparar*/
/*prod1- el campo que se obtuvo a partir del nombre del campo*/
function checkEqualsSearch(numero,campo){
    var string = "idProd"+numero;
    var prod1 = document.getElementById(string);
    if (campo.value != "" && prod1.value != "") {
        if(campo.value == prod1.value){// si los campos son iguales se muestra el error
            document.getElementById(campo.name+'_error').style.visibility = "visible";
            return false;
        } 
    }
    document.getElementById(campo.name+'_error').style.visibility = "hidden";
    return true;
}

/*Situa el maximo de horas/unidades*/
/*exp- expresion que define un el año academico*/
function setMax(numero){

    var select =document.getElementById("idProd"+numero);// se coge el campo del select
    var max = select.options[select.selectedIndex].text.split(':')[1];// se coge la segunda mitad del texto

    var string = "unid"+numero+"Max";//se recoge el campo objetivo para escribir
    var prod1 = document.getElementById(string);// se coge el elemento con dicha id
    prod1.innerHTML = max;// se sobreescribe

    var input = document.getElementById("unidades"+numero);// se coge el campo de la input

    input.value = "1"; //se vacia el campo
    return true;
}

/*Comprueba que no es mayor que su maximo*/
/*exp- expresion que define un el año academico*/
function noMayor(campo,numero){

    var max =document.getElementById("unid"+numero+"Max");// se coge el valor maximo
    let maxValue = parseInt(max.innerHTML, 10);
    let actualValue = parseInt(campo.value, 10);

    if(actualValue >  maxValue || actualValue <= 0 ){
        //console.log( actualValue + " grater than "+maxValue );
        campo.style.border = "2px solid red";
        document.getElementById(campo.name+'_error').style.visibility = "visible";
        return false
    }else{
        //console.log( campo.value + " less than "+max.innerText);
        document.getElementById(campo.name+'_error').style.visibility = "hidden";
        campo.style.border = "2px solid green";
        return true;
    }
    
}

/*Desactiva el checkBox contrario*/
function desactivarCheckBox(campo){
    if(campo.name == "id1")//si es el campo uno elem es el campo dos
        var elem =document.getElementById("id2");// el guarda el campo 2
    else if (campo.name == "id2")//si es el campo dos elem es el campo uno
        var elem =document.getElementById("id1");// el guarda el campo 1
    else console.log("hubo un error con los checkbox");//si no coinicde se avisa del error

    elem.checked = campo.checked == true ? false : true;//desactivar el checkbox contrario

    var codigo = document.getElementById("id1");// se coge el campo 1
    var select = document.getElementById("idInter");//se coge el campo select
    var id;
    if(codigo.checked == true){// se coloca el id del primer producto en l campo definitivo
        id = select.options[select.selectedIndex].text.split(':')[0];//se coge el titulos 1
    }else id = select.options[select.selectedIndex].text.split('- ')[1].split(":")[0];//se coge el titulos 2

    var definitivo = document.getElementById("idProd");//se coge el campo que decidira que producto se valorara
    definitivo.value = id;
    console.log("poniendo en definitivo "+id);

    return true;
}
/*Desactiva el checkBox contrario*/
function desactivarCheckBoxID(campo){
    var inter = campo.name.split("-")[0];
    var name = campo.name.split("-")[1];


    console.log("inter " + inter + " name " +name);
    console.log("buscando -> "+inter+"-id2");


    if(name == "id1")//si es el campo uno elem es el campo dos
        var elem =document.getElementById(inter+"-id2");// el guarda el campo 2
    else if (name == "id2")//si es el campo dos elem es el campo uno
        var elem =document.getElementById(inter+"-id1");// el guarda el campo 1
    else console.log("hubo un error con los checkbox");//si no coinicde se avisa del error

    elem.checked = campo.checked == true ? false : true;//desactivar el checkbox contrario

    var codigo = document.getElementById(inter+"-id1");// se coge el campo 1
    var select = document.getElementById("idInter");//se coge el campo select
    var id;
    if(codigo.checked == true){// se coloca el id del primer producto en l campo definitivo
        id = document.getElementById(inter+"-label1").innerHTML;//se coge el titulos 1
    }else id = document.getElementById(inter+"-label2").innerHTML;//se coge el titulos 2

    var definitivo = document.getElementById("loginUser");//se coge el campo que decidira que producto se valorara
    definitivo.value = id;
    console.log("poniendo en definitivo "+id);

    return true;
}

/* Desactiva ambos checkbox si se marca la opcion "Indiferente"  */
function desactivarCheckBoxIndiferente(campo){

    var select = document.getElementById("idInter");
    var division;

    for (var i = 0; i < select.options.length ; i++) {// busca los valores de las opciones del select
        division = document.getElementById(select.options[i].value+"-id1");// y obtiene su elemento
        if( division != null){// comrprueba que no este nula
            division.checked = false;
            console.log("posicion "+ division.style.position +" para "+i);
        }
        division = document.getElementById(select.options[i].value+"-id2");
        if( division != null){// comrprueba que no este nula
            division.checked = false;
            console.log("posicion "+ division.style.position +" para "+i);
        }
    }
    var definitivo = document.getElementById("loginUser");//se coge el campo que decidira que producto se valorara
    definitivo.value = campo.value;
    console.log("poniendo en definitivo "+campo.value);

    return true;
}

//Coloca los titulos adecuados de los productos
//y el ID 
function colocarProductos(campo){
    var select = document.getElementById("idInter");
    var id1 = select.options[select.selectedIndex].text.split(':')[1].split("-")[0];//se coge el titulos 1
    var id2 = select.options[select.selectedIndex].text.split(':')[2];//se coge el titulos 1
    

    var idPlaceHolder1 = document.getElementById("tituloProd1");//se coge el lugar donde sera situada
    idPlaceHolder1.innerHTML = id1;//se coloca


    var idPlaceHolder2 = document.getElementById("tituloProd2");//se coge el lugar donde sera situada
    idPlaceHolder2.innerHTML = id2;//se coloca

    var elem = document.getElementById("idProd");
    var idDefinitivo = select.options[select.selectedIndex].text.split(':')[0];//se coge el id
    elem.value = idDefinitivo;

    //se reinician los checkbox
    var ck =document.getElementById("id1");// el guarda el campo 1
    ck.checked = true;
    ck =document.getElementById("id2");// el guarda el campo 1
    ck.checked = false;

    return true;
}

//coloca los usuarios en la pantalla
function colocarUsuarios(campo){
    var select = document.getElementById("idInter");
    

    var division;

    for (var i = 0; i < select.options.length ; i++) {//recorrre todo el select
        division = document.getElementById(select.options[i].value);// coge el element adecuado
        if( division != null){// si no es nulo lo saca de la pantalla
            division.style.marginLeft = "-1000px";
            division.style.position = "absolute";
            console.log("posicion "+ division.style.position +" para "+i);
        }
        
    }
    var id = select.options[select.selectedIndex].value;
    division = document.getElementById(id);
    division.style.marginLeft = "0px";
    division.style.position = "static";
    return true;

}
//comprueba que la puntuacion este entre 0 y 10
function  comprobarPuntuacion(campo){
    var exp = /^[0-9]*$/;
    let number = parseInt(campo.value,10);

    if(!comprobarExpresionRegular(campo,exp,2)){// si no cumple la expresion regular ( no deberia pasar  ya que funciona con input type="number")
        return false;
    
    }else if( number < 0 || number > 10){// si el valor es menor que cero o mayor que 10
        console.log("out of limits");
        document.getElementById(campo.name+"_limited").style.visibility ="visible";
        campo.style.border = "2px solid red";
        return false;
    }
    document.getElementById(campo.name+"_limited").style.visibility ="hidden";
    campo.style.border = "2px solid green";
    return true;

}

//comprueba que la puntuacion este entre 0 y 10 o este vacio
function  comprobarPuntuacionVacio(campo){
    var exp = /^[0-9]*$/;
    let number = parseInt(campo.value,10);

    if(campo.value.length <= 0 ){
        document.getElementById(campo.name+"_limited").style.visibility ="hidden";
        campo.style.border = "2px solid green";
        return true;
    }else if(!comprobarExpresionRegular(campo,exp,2)){
        return false;
    
    }else if( number < 0 || number > 10){
        console.log("out of limits");
        document.getElementById(campo.name+"_limited").style.visibility ="visible";
        campo.style.border = "2px solid red";
        return false;
    }
    document.getElementById(campo.name+"_limited").style.visibility ="hidden";
    campo.style.border = "2px solid green";
    return true;

}


//Comprueba que el estado de aceptacion sea correcto
//ext- extension del archivo subido
function comprobarAccept(campo){
    var exp = /^(aceptado|denegado)$/;

    if(!comprobarExpresionRegular(campo,exp,15)){//comprueba que la expresión enviada en telef sea cumplida por el campo enviado si no lo hace devuelve false
        return false;
    }else {
            campo.style.border = "2px solid green";
            return true;
    }
}
//Comprueba que el estado de aceptacion sea correcto
//ext- extension del archivo subido
function comprobarAcceptSearch(campo){
    var exp = /^(aceptado|denegado)?$/;

    if(!comprobarExpresionRegular(campo,exp,15)){//comprueba que la expresión enviada en telef sea cumplida por el campo enviado si no lo hace devuelve false
        return false;
    }else {
            campo.style.border = "2px solid green";
            return true;
    }
}
//Comprueba que la extension del archivo subido es una extension correspondiente a una foto
//ext- extension del archivo subido
function comprobarExtension(campo){
    var exp = /^(jpg|png|jpeg)$/;
    var parts = campo.value.split(".");
    var ext = parts[parts.length-1];

    if (exp.test(ext) == false ){// se comprueba que la extension tenga el formato adecuado
        var elem = document.getElementById(campo.name+"_error");
        if (elem != null) elem.style.visibility = "visible";
        campo.style.border = "2px solid red";
        return false;
    }else {
        var elem = document.getElementById(campo.name+"_error");
        if (elem != null) elem.style.visibility = "hidden";
        campo.style.border = "2px solid green";
        return true;
    }
}

/*Comprueba el origen encaja con lo esperado*/
/*abc- es una expresión regular que comprueba si origen es del tipo enum*/
function comprobarOrigen(campo) {
    var exp= /^(fabricado_a_mano|cultivado|trabajo)$/;
    if (!comprobarExpresionRegular(campo, exp,100)){// se comprueba que el sexo encaje con los valores "hombre" o "mujer"
        campo.style.border = "2px solid red";
        return false;

    }else{ 
        campo.style.border = "2px solid green";
        return true;
    }
}

/*Comprueba el Estado encaja con lo esperado*/
/*abc- es una expresión regular que comprueba si origen es del tipo enum*/
function comprobarEstado(campo) {
    var exp= /^(tramite|vendido)$/;
    if (!comprobarExpresionRegular(campo, exp,100)){// se comprueba que el sexo encaje con los valores "hombre" o "mujer"
        campo.style.border = "2px solid red";
        return false;

    }else{ 
        campo.style.border = "2px solid green";
        return true;
    }
}

//comprueba que la hora tenga el formato adecuado
function comprobarHora(campo){
    var exp = /^[0-2][0-9]:[0-5][0-9]$/;
    if (!comprobarExpresionRegular(campo, exp,100)){// se comprueba que el sexo encaje con los valores "hombre" o "mujer"
        campo.style.border = "2px solid red";
        return false;

    }else{ 
        campo.style.border = "2px solid green";
        return true;
    }
}

/*Comprueba que el sexo pertenece a el enumerado*/
function comprobarSexo(campo){
    var exp= /^(hombre|mujer)$/;
    if (!comprobarExpresionRegular(campo, exp,10)){// se comprueba que el sexo encaje con los valores "hombre" o "mujer"
        campo.style.border = "2px solid red";
        return false;

    }else{ 
        campo.style.border = "2px solid green";
        return true;
    }
}


/*Comprueba que el sexo pertenece a el enumerado o es vacio*/
function comprobarSexoSearch(campo){
    var exp= /^(hombre|muje)?$/;
    if (!comprobarExpresionRegular(campo, exp,10)){// se comprueba que el sexo encaje con los valores "hombre" o "mujer" o este vacio
        campo.style.border = "2px solid green";
        return true;

    }else{  // en caso de que no coincida con ninguno
        alert("El valor no coincide con los dados.");
        campo.style.border = "2px solid red";
        return false;
    }

}

//Comprueba el login antes de mandarlo por post a Login_Controller
function comprobar_login(Formu) {
    var correcto=true; 

        if(!comprobarAlfabetico(Formu.login, 15)){//comprobamos que el nombre esté bien escrito
            Formu.login.style.border = "2px solid red";
            correcto = false;
        } 
        if(!comprobarAlfabetico(Formu.password, 128)){//comprobamos que la contraseña esté bien escrito
            Formu.password.style.border = "2px solid red";
            correcto = false;
        } 
    return correcto;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en USUARIOS_ADD_View */
/*correcto- variable que cambia de estado a false si uno de las validaciones falla*/
function comprobarUsuarios(Formu){
    var correcto=true; 

        if(!comprobarAlfabetico(Formu.login, 15)){//comprobamos que el nombre esté bien escrito
            Formu.login.style.border = "2px solid red";
            correcto = false;
        } 
        if(!comprobarAlfabetico(Formu.password, 128)){//comprobamos que la contraseña esté bien escrito
            Formu.password.style.border = "2px solid red";
            correcto = false;
        } 
        if(!comprobarDni(Formu.DNI, 9)){//comprobamos que el dni esté bien escrito
            Formu.DNI.style.border = "2px solid red";
            correcto = false;
        } 
        if(!comprobarTexto(Formu.nombre, 30)){//comprobamos que el nombre esté bien escrito
            Formu.nombre.style.border = "2px solid red";
            correcto = false;
        } 
        if(!comprobarTexto(Formu.apellidos, 50)){//comprobamos que el apellidos esté bien escrito
            Formu.apellidos.style.border = "2px solid red";
            correcto = false;
        } 
        if(!comprobarTelf(Formu.tlf)){//comprobamos que el telefono esté bien escrito
            Formu.tlf.style.border = "2px solid red";
            correcto = false;
        } 
        if(!comprobarEmail(Formu.email, 60)){//comprobamos que el email esté bien escrito
            Formu.email.style.border = "2px solid red";
            correcto = false;
        } 
        if(!comprobarFechaNacimiento(Formu.fechaNacimiento)){//comprobamos que la fecha sea anterior a la actual
            Formu.fechaNacimiento.style.border = "2px solid red";
            correcto = false; 
        }
        if(!comprobarSexo(Formu.sexo)){//comprobamos que el sexo es un enumerado
            Formu.sexo.style.border = "2px solid red";
            correcto = false; 
        }
        if(!comprobarAlfabeticoVacio(Formu.alergias,50)){//comprobamos que las alergias es una cadena de texto o numeros
            Formu.alergias.style.border = "2px solid red";
            correcto = false; 
        }
        if(!comprobarAlfabeticoVacio(Formu.direccion,250)){//comprobamos que la direccion es una cadena de texto o numeros
            Formu.alergias.style.border = "2px solid red";
            correcto = false; 
        }
        if(!comprobarCP(Formu.cp)){//comprobamos que el cp es valido
            Formu.alergias.style.border = "2px solid red";
            correcto = false; 
        }
    return correcto;
}


/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en USUARIOS_ADD_View */
/*correcto- variable que cambia de estado a false si uno de las validaciones falla*/
function comprobarUsuarioSearch(Formu){
    var correcto=true;
    
        if(!comprobarAlfabeticoVacio(Formu.login, 15)){//comprobamos que el nombre esté bien escrito
            Formu.login.style.border = "2px solid red";
            correcto = false;
        }
        
        if(!comprobarDniSearch(Formu.DNI)){//comprobamos que el dni esté bien escrito
            Formu.DNI.style.border = "2px solid red";
            correcto = false;
        }
        
        if(!comprobarTextoVacio(Formu.nombre, 30)){//comprobamos que el nombre esté bien escrito
            Formu.nombre.style.border = "2px solid red";
            correcto = false;
        }
       
        if( !comprobarTextoVacio(Formu.apellidos, 50)){//comprobamos que el apellidos esté bien escrito
            Formu.apellidos.style.border = "2px solid red";
            correcto = false;
        }
       
        if( !comprobarTelfSearch(Formu.tlf)){//comprobamos que el telefono esté bien escrito
            Formu.tlf.style.border = "2px solid red";
            correcto = false;
        }
        if( !comprobarEmailSearch(Formu.email, 60)){//comprobamos que el apellidos esté bien escrito
            Formu.email.style.border = "2px solid red";
            correcto = false;
        }
        if( !comprobarFechaNacimiento(Formu.fechaNacimiento)){//comprobamos que la fecha sea anterior a la actual
            Formu.fechaNacimiento.style.border = "2px solid red";
            correcto = false;
             
        }  
        if(!comprobarSexoSearch(Formu.sexo)){//comprobamos que el sexo es un enumerado
            Formu.sexo.style.border = "2px solid red";
            correcto = false;
        }
        if(!comprobarAlfabeticoVacio(Formu.alergias,50)){//comprobamos que las alergias es una cadena de texto o numeros
            Formu.alergias.style.border = "2px solid red";
            correcto = false; 
        }
        if(!comprobarAlfabeticoVacio(Formu.direccion,250)){//comprobamos que la direccion es una cadena de texto o numeros
            Formu.alergias.style.border = "2px solid red";
            correcto = false; 
        }
        if(!comprobarCPSearch(Formu.cp)){//comprobamos que el cp es valido
            Formu.alergias.style.border = "2px solid red";
            correcto = false; 
        }  
    return correcto;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en USUARIOS_ADD_View */
/*correcto- variable que cambia de estado a false si uno de las validaciones falla*/
function comprobarProductos(Formu){
    var correcto=true; 

        if(!comprobarAlfabetico(Formu.titulo, 50)){//comprobamos que el titulo esté bien escrito
            Formu.titulo.style.border = "2px solid red";
            correcto = false;
        } 
        if(!comprobarAlfabeticoEnter(Formu.descripcion, 200)){//comprobamos que la descripcion esté bien escrita
            Formu.descripcion.style.border = "2px solid red";
            correcto = false;
        } 
        if(Formu.FOTO != null){//cuadno se borra un producto no hay un campo foto
            if(!comprobarExtension(Formu.FOTO) ){//comprobamos que la extension esté bien escrita
                Formu.FOTO.style.border = "2px solid red";
                correcto = false;
            }
        }
        if(!comprobarOrigen(Formu.origen)){//comprobamos que las origen estén bien 
            Formu.origen.style.border = "2px solid red";
            correcto = false;
        }
        if(!comprobarEntero(Formu.horasUnidades) || !mayorIgualQueCero(Formu.horasUnidades)){//comprobamos que las horasUnidades estén bien 
            Formu.horasUnidades.style.border = "2px solid red";
            correcto = false;
        }
        if(!comprobarEstado(Formu.estado)){//comprobamos que las horasUnidades estén bien 
            Formu.horasUnidades.style.border = "2px solid red";
            correcto = false;
        }
    return correcto;
}


/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en USUARIOS_ADD_View */
/*correcto- variable que cambia de estado a false si uno de las validaciones falla*/
function comprobarProductosSearch(Formu){
    var correcto=true; 

        if(!comprobarAlfabeticoVacio(Formu.titulo, 50)){//comprobamos que el nombre esté bien escrito
            Formu.titulo.style.border = "2px solid red";
            correcto = false;
        } 
        if(!comprobarAlfabeticoVacio(Formu.descripcion, 200)){//comprobamos que la contraseña esté bien escrito
            Formu.descripcion.style.border = "2px solid red";
            correcto = false;
        } 
    return correcto;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en USUARIOS_ADD_View */
/*correcto- variable que cambia de estado a false si uno de las validaciones falla*/
function comprobarProductoSearchShort(Formu){
    var correcto=true; 

        if(!comprobarAlfabeticoVacio(Formu.titulo, 50)){//comprobamos que el nombre esté bien escrito
            Formu.titulo.style.border = "2px solid red";
            correcto = false;
        } 
        if(!comprobarEnteroVacio(Formu.horasUnidades)){//comprobamos que la contraseña esté bien escrito
            Formu.horasUnidades.style.border = "2px solid red";
            correcto = false;
        } 
    return correcto;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en USUARIOS_ADD_View */
/*correcto- variable que cambia de estado a false si uno de las validaciones falla*/
function comprobarCategoria(Formu){
    var correcto=true; 
         
        if(!comprobarAlfabeticoVacio(Formu.nombre, 50)){//comprobamos que el nombre esté bien escrito
            Formu.nombre.style.border = "2px solid red";
            correcto = false;
        } 
    return correcto;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en USUARIOS_ADD_View */
/*correcto- variable que cambia de estado a false si uno de las validaciones falla*/
function comprobarCategoriaEdit(Formu){
    var correcto=true; 
        if(!comprobarEntero(Formu.id)){//comprobamos que el nombre esté bien escrito
                elem.style.border = "2px solid red";
                correcto = false; 
        }
         
        if(!comprobarAlfabeticoVacio(Formu.nombre, 50)){//comprobamos que el nombre esté bien escrito
            Formu.nombre.style.border = "2px solid red";
            correcto = false;
        } 
    return correcto;
}


/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en USUARIOS_ADD_View */
/*correcto- variable que cambia de estado a false si uno de las validaciones falla*/
function comprobarCategoriasSearch(Formu){
    var correcto=true; 

        if(!comprobarAlfabeticoVacio(Formu.nombre, 50)){//comprobamos que el nombre esté bien escrito
            Formu.nombre.style.border = "2px solid red";
            correcto = false;
        } 
    return correcto;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en USUARIOS_ADD_View */
/*correcto- variable que cambia de estado a false si uno de las validaciones falla*/
function comprobarProductosCategoria(Formu){
    var correcto=true; 

        if(!comprobarEntero(Formu.idCategoria)){//comprobamos que el id de las categorias no esté vacio
            Formu.idCategoria.style.border = "2px solid red";
            correcto = false;
        }
        if(!comprobarEntero(Formu.idProducto)){//comprobamos que el id de las categorias no esté vacio
            Formu.idProducto.style.border = "2px solid red";
            correcto = false;
        }
    return correcto;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en USUARIOS_ADD_View */
/*correcto- variable que cambia de estado a false si uno de las validaciones falla*/
function comprobarProductosCategoriaSearch(Formu){
    var correcto=true; 
    
        if(!comprobarEnteroVacio(Formu.idCategoria)){//comprobamos que el id de las categorias no esté vacio
            correcto = false;
        }
        if(!comprobarEnteroVacio(Formu.idProducto)){//comprobamos que el id de las categorias no esté vacio
            correcto = false;
        }
    return correcto;
}

//cambia el valor del campo idProducto en caso de que se modifique el select
//ext- extension del archivo subido
function changeIDCategorias(campo,obj){
    var elem = document.getElementById(obj);
    elem.value = campo.value;
    return true;
}

//function mayorQueCero(campo) //comprueba que el campo es mayor que 0
function mayorIgualQueCero(campo){
    let valor = parseInt(campo.value , 10);
    if (valor < 0) {
        document.getElementById(campo.name+"_errorLength").style.visibility="visible";
        campo.style.border="2px solid red";
        return false;
    }else {
        document.getElementById(campo.name+"_errorLength").style.visibility="hidden";
        campo.style.border="2px solid green";
        return true;
    }
}

function colocarEstado(campo){
    let num = parseInt( campo.value, 10);
    var estado = document.getElementById("estado");

    if ( num <= 0 ){
        estado.options.item(1).selected = "selected";
        estado.options.item(0).selected = "";
    }else{
        estado.options.item(1).selected = "";
        estado.options.item(0).selected = "selected";
    }
}

function comprobarIntercambio(Formu){
    var correcto=true; 

        if(!checkEquals(2,Formu.idProd1)){//comprobamos que los productos no sean iguales
            Formu.idProd1.style.border = "2px solid red";
            correcto = false;
        }
        if(!checkEquals(1,Formu.idProd2)){//comprobamos que los productos no sean iguales
            Formu.idProd1.style.border = "2px solid red";
            correcto = false;
        }
        if(!comprobarEntero(Formu.unidades1)){//comprobamos las unidades sean numeros
            Formu.unidades1.style.border = "2px solid red";
            correcto = false;
        }
        if(!comprobarEntero(Formu.unidades2)){//comprobamos las unidades sean numeros
            Formu.unidades2.style.border = "2px solid red";
            correcto = false;
        }
        if(!noMayor(Formu.unidades1,1)){//comprobamos las unidades sean numeros
            Formu.unidades1.style.border = "2px solid red";
            correcto = false;
        }
        if(!noMayor(Formu.unidades2,2)){//comprobamos las unidades sean numeros
            Formu.unidades2.style.border = "2px solid red";
            correcto = false;
        }
        if(!comprobarAccept(Formu.accept1)){//comprobamos las unidades sean numeros
            Formu.accept1.style.border = "2px solid red";
            correcto = false;
        }
        if(!comprobarAccept(Formu.accept2)){//comprobamos las unidades sean numeros
            Formu.accept2.style.border = "2px solid red";
            correcto = false;
        }
    return correcto;
}

//comprueba la valoracion antes de enviarla por submit
function comprobarValoracion(Formu){
    var correcto=true; 

        if(!comprobarEntero(Formu.idInter)){//comprobamos las unidades sean numeros
            Formu.idInter.style.border = "2px solid red";
            correcto = false;
        }
        if(!comprobarEntero(Formu.idProd)){//comprobamos las unidades sean numeros
            Formu.idProd.style.border = "2px solid red";
            correcto = false;
        }
        if(!comprobarAlfabeticoEnter(Formu.coment,200)){//comprobamos las unidades sean numeros
            Formu.coment.style.border = "2px solid red";
            correcto = false;
        }
        if(!comprobarPuntuacion(Formu.punt,2)){//comprobamos las unidades sean numeros
            Formu.punt.style.border = "2px solid red";
            correcto = false;
        }
        
    return correcto;
}

//comprueba la valoracion antes de enviarla por submit
function comprobarMensajes(Formu){
    var correcto=true; 
        if(!comprobarAlfabetico(Formu.loginUser, 15)){//comprobamos que el nombre esté bien escrito
            Formu.loginUser.style.border = "2px solid red";
            correcto = false;
        }
        if(!comprobarEntero(Formu.idInter)){//comprobamos las unidades sean numeros
            Formu.idInter.style.border = "2px solid red";
            correcto = false;
        }
        if(!comprobarFechaNacimiento(Formu.dia)){//comprobamos las unidades sean numeros
            Formu.dia.style.border = "2px solid red";
            correcto = false;
        }
        if(!comprobarHora(Formu.hora)){//comprobamos las unidades sean numeros
            Formu.hora.style.border = "2px solid red";
            correcto = false;
        }
        if(!comprobarAlfabeticoEnter(Formu.contenido)){//comprobamos las unidades sean numeros
            Formu.contenido.style.border = "2px solid red";
            correcto = false;
        }
        
    return correcto;
}