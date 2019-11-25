//Clase : validaciones.js
//Creado el : 17-10-2019
//Creado por: grvidal
//Valida los datos de los formularios
//-------------------------------------------------------

/*Comprueba que sólo haya caracteres alfanuméricos*/
/*abc- es una expresión regular que comprueba si el carácter es alfanuméricos de principio a fin*/
function comprobarAlfabetico(campo, size) {
    var abc =/^\w[\wñº ]*$/;
    
    if(!comprobarExpresionRegular(campo,abc,size)){//comprueba que la expresión enviada en abc sea cumplida por el campo enviado si no lo hace devuelve false
         
        return false;
    }else if(campo.value.length < 3)  return false;
    return true;
}

/*Comprueba que el tipo encaje con uno de los definidos*/
/*tipos-todos los tipos posibles*/
function comprobarTipo(campo){
    var tipos = /^(PAS|DESPACHO|LABORATORIO)$/;
    if(!comprobarExpresionRegular(campo,tipos,12)){//comprueba que la expresión enviada en comprueba sea cumplida por el campo enviado si no lo hace devuelve false
        return false;
    }//envía true en caso contrario
    else {
        campo.style.border = "2px solid green";
        return true;
    }
}

/*Comprueba que el texto sea alfabético y que pueda tener espacios*/
/*comprueba- es una variable que se utiliza para la comprobación y observa que no haya carácteres no alfabéticos (también permite que haya espacios entre palabras)*/
function comprobarTexto( campo, size ) {
    var comprueba=/^[A-Za-zñáéíóú]{1}[A-Za-zñáéíóú ]*$/i;
    if(!comprobarExpresionRegular(campo,comprueba,size)){//comprueba que la expresión enviada en comprueba sea cumplida por el campo enviado si no lo hace devuelve false
        return false;
    }
    else if(campo.value.length < 3){  return false; }
    //envía true en caso contrario
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
            document.getElementById(campo.name+"_error").style.visibility = "hidden";
            campo.style.border = "2px solid green";
            return true;
    } 
}

/*Comprueba si el campo es null o 0 y devuelve false, si existe algo devuelve true*/
function comprobarVacio( campo ) {
    if ( ( campo.value == null ) || ( campo.value.length == 0 ) ) {//comprueba si es null o 0
            campo.style.border = "2px solid red";
            return false;
    } else {//si existe algo devuelve true
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
    else if(comprobarExpresionRegular(campo,exp,9)){

        if(campo.value.charAt(8) == letras[(campo.value.substring(0, 8))%23]){
            campo.style.border = "2px solid green";
            return true;
        }  
    }
     else if(comprobarExpresionRegular(campo,exp2,9) ) {//comrueba que el DNI esté formado por 8 digitos y una letra
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
    var telef = /^(\+34|0034|34)?([0-9]){0,9}$/;
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
function comprobarAnho(campo){
    var exp = /^[0-9]{4}-[0-9]{4}$/;
    if(!comprobarExpresionRegular(campo,exp,9)){//comprueba que la expresión enviada en año sea cumplida por el campo enviado si no lo hace devuelve false
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
    }
    document.getElementById(campo.name+"_error").style.visibility = "hidden";
    campo.style.border = "2px solid green";
    return true;
}



//Comprueba que la extension del archivo subido es una extension correspondiente a una foto
//ext- extension del archivo subido
function comprobarExtension(campo){
    var exp = /^(jpg|png|jpeg)$/;
    var parts = campo.value.split(".");
    var ext = parts[parts.length-1];

    if (exp.test(ext) == false ){
        document.getElementById(campo.name+"_error").style.visibility = "visible";
        campo.style.border = "2px solid red";
        return false;
    }
    document.getElementById(campo.name+"_error").style.visibility = "hidden";
    campo.style.border = "2px solid green";
   return true;
}

/*Comprueba que el sexo pertenece a el enumerado*/
function comprobarSexo(campo){
    var exp= /^(hombre|mujer)$/;
    if (!comprobarExpresionRegular(campo, exp,10)){
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
    if (!comprobarExpresionRegular(campo, exp,10)){
         campo.style.border = "2px solid green";
            return true;

        }else{
            alert("El valor no coincide con los dados.");
            campo.style.border = "2px solid red";
            return false;
        }

}

/*Comprueba que el número real enviado está entre el valor menor y mayor, y que no sobreexceda los números decimales permitidos*/
/*Decimal-comprueba que el número enviado no sobreexceda los números decimales permitidos*/ 
function comprobarReal(campo, numerodecimales, valormenor, valormayor) {
    var decimal= campo.value.substring( campo.value.indexOf('.' , ',')+ 1, campo.value.length); 
    
    if (!comprobarVacio(campo)){//comprueba si está vacío
        return false;
    }
    else if ( decimal.length > numerodecimales && decimal!=campo.value){//si el numero de decimales que tiene el dígito es mayor que el numero de decimales indicado produce un error//en el caso de que el numero que mandamos no haya decimales se cogerá el numero entero en decimal por eso debemos evitar esto
            campo.style.border = "2px solid red";       
            return false;
    }
        else if (campo.value < valormenor || campo.value > valormayor){//comprueba que le dígito enviado se haya entre sus valores menor y mayor
            campo.style.border = "2px solid red";
            return false;
    }
        else {
            campo.style.border = "2px solid green";
            return true;
    }
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
        if(!comprobarEmail(Formu.email, 60)){//comprobamos que el apellidos esté bien escrito
            Formu.email.style.border = "2px solid red";
            correcto = false;
        } 
        if(!comprobarFechaNacimiento(Formu.bday)){//comprobamos que la fecha sea anterior a la actual
            Formu.bday.style.border = "2px solid red";
            correcto = false; 
        }    
        if(!comprobarExtension(Formu.foto)){//comprobamos que la fecha sea anterior a la actual
            Formu.foto.style.border = "2px solid red";
            correcto = false; 
        } 
        if(!comprobarSexo(Formu.sexo)){//comprobamos que el sexo es un enumerado
            Formu.sexo.style.border = "2px solid red";
            correcto = false; 
        }    
    return correcto;
}


/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en USUARIOS_ADD_View */
/*correcto- variable que cambia de estado a false si uno de las validaciones falla*/
function comprobarUsuarioSearch(Formu){
    var correcto=true;
    
        if(comprobarVacio(Formu.login) && !comprobarAlfabetico(Formu.login, 15)){//comprobamos que el nombre esté bien escrito
            Formu.login.style.border = "2px solid red";
            correcto = false;
        }
        
        if(comprobarVacio(Formu.DNI) && !comprobarDniSearch(Formu.DNI)){//comprobamos que el dni esté bien escrito
            Formu.DNI.style.border = "2px solid red";
            correcto = false;
        }
        
        if(comprobarVacio(Formu.nombre) && !comprobarTexto(Formu.nombre, 30)){//comprobamos que el nombre esté bien escrito
            Formu.nombre.style.border = "2px solid red";
            correcto = false;
        }
       
        if(comprobarVacio(Formu.apellidos) && !comprobarTexto(Formu.apellidos, 50)){//comprobamos que el apellidos esté bien escrito
            Formu.apellidos.style.border = "2px solid red";
            correcto = false;
        }
       
        if(comprobarVacio(Formu.tlf) && !comprobarTelfSearch(Formu.tlf)){//comprobamos que el telefono esté bien escrito
            Formu.tlf.style.border = "2px solid red";
            correcto = false;
        }
        
        if(comprobarVacio(Formu.email) && !comprobarEmailSearch(Formu.email, 60)){//comprobamos que el apellidos esté bien escrito
            Formu.email.style.border = "2px solid red";
            correcto = false;
        }
        
        if(!comprobarVacio(Formu.bday) && !comprobarFechaNacimiento(Formu.bday)){//comprobamos que la fecha sea anterior a la actual
            Formu.bday.style.border = "2px solid red";
            correcto = false;
             
        }  
        
        if(!comprobarSexoSearch(Formu.sexo)){//comprobamos que el sexo es un enumerado
            Formu.sexo.style.border = "2px solid red";
            correcto = false;
        }
          
    return correcto;
}


/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en USUARIOS_ADD_View */
/*correcto- variable que cambia de estado a false si uno de las validaciones falla*/
function comprobarTitulacion(Formu){
    var correcto=true;
        if(!comprobarAlfabetico(Formu.titulacion, 10)){//comprobamos que el titulacion esté bien escrita
            Formu.titulacion.style.border = "2px solid red";
            correcto = false;
        }

        if(!comprobarAlfabetico(Formu.centro, 10)){//comprobamos que la centro esté bien escrito
            Formu.centro.style.border = "2px solid red";
            correcto = false;
        }
        
        if(!comprobarTexto(Formu.nameT, 50)){//comprobamos que el nombre esté bien escrito
            Formu.nameT.style.border = "2px solid red";
            correcto = false;
        }

        if(!comprobarTexto(Formu.responsable, 60)){//comprobamos que el responsable esté bien escrito
            Formu.responsable.style.border = "2px solid red";
            correcto = false;
        }

    return correcto;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en USUARIOS_ADD_View */
/*correcto- variable que cambia de estado a false si uno de las validaciones falla*/
function comprobarTitulacionSearch(Formu){
    var correcto=true;

        if(comprobarVacio(Formu.titulacion) && !comprobarAlfabetico(Formu.titulacion, 10)){//comprobamos que el titulacion esté bien escrita
            Formu.titulacion.style.border = "2px solid red";
            correcto = false;
        }
        if(comprobarVacio(Formu.centro) && !comprobarAlfabetico(Formu.centro, 10)){//comprobamos que la centro esté bien escrito
            Formu.centro.style.border = "2px solid red";
            correcto = false;
        }
        if(comprobarVacio(Formu.nameT) && !comprobarTexto(Formu.nameT, 50)){//comprobamos que el nombre esté bien escrito
            Formu.nameT.style.border = "2px solid red";
            correcto = false;
        }

        if(comprobarVacio(Formu.responsable) && !comprobarTexto(Formu.responsable, 60)){//comprobamos que el responsable esté bien escrito
            Formu.responsable.style.border = "2px solid red";
            correcto = false;
        }

    return correcto;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en USUARIOS_ADD_View */
/*correcto- variable que cambia de estado a false si uno de las validaciones falla*/
function comprobarRrofesor(Formu){
    var correcto=true;

        if(!comprobarDni(Formu.DNI)){//comprobamos que el DNI esté bien escrita
            Formu.DNI.style.border = "2px solid red";
            correcto = false;
        } 
        if(!comprobarTexto(Formu.nombre, 15)){//comprobamos que la centro esté bien escrito
            Formu.nombre.style.border = "2px solid red";
        } 
        if(!comprobarTexto(Formu.apellido, 30)){//comprobamos que la centro esté bien escrito
            Formu.apellido.style.border = "2px solid red";
            correcto = false;
        } 
        if(!comprobarTexto(Formu.area, 60)){//comprobamos que la centro esté bien escrito
            Formu.area.style.border = "2px solid red";
            correcto = false;
        } 
        if(!comprobarTexto(Formu.departamento, 60)){//comprobamos que la centro esté bien escrito
            Formu.departamento.style.border = "2px solid red";
            correcto = false;
        } 

    return correcto;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en USUARIOS_ADD_View */
/*correcto- variable que cambia de estado a false si uno de las validaciones falla*/
function comprobarRrofesorSearch(Formu){
    var correcto=true;

        if(comprobarVacio(Formu.DNI) && !comprobarDni(Formu.DNI)){//comprobamos que el DNI esté bien escrita
            Formu.DNI.style.border = "2px solid red";
            correcto = false;
        } 
        if(comprobarVacio(Formu.nombre) && !comprobarTexto(Formu.nombre, 15)){//comprobamos que la centro esté bien escrito
            Formu.nombre.style.border = "2px solid red";
        } 
        if(comprobarVacio(Formu.apellido) && !comprobarTexto(Formu.apellido, 30)){//comprobamos que la centro esté bien escrito
            Formu.apellido.style.border = "2px solid red";
            correcto = false;
        } 
        if(comprobarVacio(Formu.area) && !comprobarTexto(Formu.area, 60)){//comprobamos que la centro esté bien escrito
            Formu.area.style.border = "2px solid red";
            correcto = false;
        } 
        if(comprobarVacio(Formu.departamento) && !comprobarTexto(Formu.departamento, 60)){//comprobamos que la centro esté bien escrito
            Formu.departamento.style.border = "2px solid red";
            correcto = false;
        } 

    return correcto;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en USUARIOS_ADD_View */
/*correcto- variable que cambia de estado a false si uno de las validaciones falla*/
function comprobarProf_Espacio(Formu){
    var correcto=true;

    if(!comprobarDni(Formu.DNI)){//comprobamos que el DNI esté bien escrita
        Formu.DNI.style.border = "2px solid red";
        correcto = false;
    }
    if(!comprobarAlfabetico(Formu.codESPACIO, 10)){//comprobamos que la centro esté bien escrito
        Formu.codESPACIO.style.border = "2px solid red";
        correcto = false;
    }

    return correcto;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en USUARIOS_ADD_View */
/*correcto- variable que cambia de estado a false si uno de las validaciones falla*/
function comprobarProf_EspacioSearch(Formu){
    var correcto=true;

    if(comprobarVacio(Formu.DNI) && !comprobarDni(Formu.DNI)){//comprobamos que el DNI esté bien escrita
        Formu.DNI.style.border = "2px solid red";
        correcto = false;
    }
    if(comprobarVacio(Formu.codESPACIO) && !comprobarAlfabetico(Formu.codESPACIO, 10)){//comprobamos que la centro esté bien escrito
        Formu.codESPACIO.style.border = "2px solid red";
        correcto = false;
    }

    return correcto;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en USUARIOS_ADD_View */
/*correcto- variable que cambia de estado a false si uno de las validaciones falla*/
function comprobarProfTitu(Formu) {
    var correcto=true;

    if(!comprobarDni(Formu.DNI)){//comprobamos que el DNI esté bien escrita
        Formu.DNI.style.border = "2px solid red";
        correcto = false;
    }
    if(!comprobarAlfabetico(Formu.codTitulacion, 10)){//comprobamos que la centro esté bien escrito
        Formu.codTitulacion.style.border = "2px solid red";
        correcto = false;
    }

    if(!comprobarAnho(Formu.anhoAcademico)){//comprobamos que la centro esté bien escrito
        Formu.anhoAcademico.style.border = "2px solid red";
        correcto = false;
    }

    return correcto;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en USUARIOS_ADD_View */
/*correcto- variable que cambia de estado a false si uno de las validaciones falla*/
function comprobarProfTituSearch(Formu) {
    var correcto=true;

    if(comprobarVacio(Formu.DNI) && !comprobarDni(Formu.DNI)){//comprobamos que el DNI esté bien escrita
        Formu.DNI.style.border = "2px solid red";
        correcto = false;
    }
    if(comprobarVacio(Formu.codTitulacion) && !comprobarAlfabetico(Formu.codTitulacion, 10)){//comprobamos que la centro esté bien escrito
        Formu.codTitulacion.style.border = "2px solid red";
        correcto = false;
    }

    if(comprobarVacio(Formu.anhoAcademico) && !comprobarAnhoSearch(Formu.anhoAcademico)){//comprobamos que la centro esté bien escrito
        Formu.anhoAcademico.style.border = "2px solid red";
        correcto = false;
    }

    return correcto;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en USUARIOS_ADD_View */
/*correcto- variable que cambia de estado a false si uno de las validaciones falla*/
function comprobarCentro(Formu) {
    var correcto=true;

    if(!comprobarAlfabetico(Formu.centro,10)){//comprobamos que el codigo del centro esté bien escrito
        Formu.centro.style.border = "2px solid red";
        correcto = false;
    }
    if(!comprobarAlfabetico(Formu.edificio, 10)){//comprobamos que la centro esté bien escrito
        Formu.edificio.style.border = "2px solid red";
        correcto = false;
    }

    if(!comprobarTexto(Formu.nombre,50)){//comprobamos que la centro esté bien escrito
        Formu.nombre.style.border = "2px solid red";
        correcto = false;
    }
    if(!comprobarAlfabetico(Formu.direccion,150)){//comprobamos que la centro esté bien escrito
        Formu.direccion.style.border = "2px solid red";
        correcto = false;
    }
    if(!comprobarTexto(Formu.responsable,60)){//comprobamos que la centro esté bien escrito
        Formu.responsable.style.border = "2px solid red";
        correcto = false;
    }
    return correcto;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en USUARIOS_ADD_View */
/*correcto- variable que cambia de estado a false si uno de las validaciones falla*/
function comprobarCentroSearch(Formu) {
    var correcto=true;

    if(comprobarVacio(Formu.centro) && !comprobarAlfabetico(Formu.centro,10)){//comprobamos que el codigo del centro esté bien escrito
        Formu.centro.style.border = "2px solid red";
        correcto = false;
    }
    if(comprobarVacio(Formu.edificio) && !comprobarAlfabetico(Formu.edificio, 10)){//comprobamos que la centro esté bien escrito
        Formu.edificio.style.border = "2px solid red";
        correcto = false;
    }

    if(comprobarVacio(Formu.nombre) && !comprobarTexto(Formu.nombre,50)){//comprobamos que la centro esté bien escrito
        Formu.nombre.style.border = "2px solid red";
        correcto = false;
    }
    if(comprobarVacio(Formu.direccion) && !comprobarAlfabetico(Formu.direccion,150)){//comprobamos que la centro esté bien escrito
        Formu.direccion.style.border = "2px solid red";
        correcto = false;
    }
    if(comprobarVacio(Formu.responsable) && !comprobarTexto(Formu.responsable,60)){//comprobamos que la centro esté bien escrito
        Formu.responsable.style.border = "2px solid red";
        correcto = false;
    }
    return correcto;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en USUARIOS_ADD_View */
/*correcto- variable que cambia de estado a false si uno de las validaciones falla*/
function comprobarEdificio(Formu) {
    var correcto=true;

    if(!comprobarAlfabetico(Formu.codigo,10)){//comprobamos que el codigo del Edificio esté bien escrito
        Formu.codigo.style.border = "2px solid red";
        correcto = false;
    }
    if(!comprobarTexto(Formu.nombre, 50)){//comprobamos que en nombre del edificio esté bien escrito
        Formu.nombre.style.border = "2px solid red";
        correcto = false;
    }
    if(!comprobarAlfabetico(Formu.direccion,150)){//comprobamos que la direccion esté bien escrito
        Formu.direccion.style.border = "2px solid red";
        correcto = false;
    }
    if(!comprobarTexto(Formu.campus,10)){//comprobamos que el campus esté bien escrito
        Formu.campus.style.border = "2px solid red";
        correcto = false;
    }
    return correcto;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en USUARIOS_ADD_View */
/*correcto- variable que cambia de estado a false si uno de las validaciones falla*/
function comprobarEdificioSearch(Formu) {
    var correcto=true;

    if(comprobarVacio(Formu.codigo) && !comprobarAlfabetico(Formu.codigo,10)){//comprobamos que el codigo del Edificio esté bien escrito
        Formu.codigo.style.border = "2px solid red";
        correcto = false;
    }
    if(comprobarVacio(Formu.nombre) && !comprobarTexto(Formu.nombre, 50)){//comprobamos que en nombre del edificio esté bien escrito
        Formu.nombre.style.border = "2px solid red";
        correcto = false;
    }
    if(comprobarVacio(Formu.direccion) && !comprobarAlfabetico(Formu.direccion,150)){//comprobamos que la direccion esté bien escrito
        Formu.direccion.style.border = "2px solid red";
        correcto = false;
    }
    if(comprobarVacio(Formu.campus) && !comprobarTexto(Formu.campus,10)){//comprobamos que el campus esté bien escrito
        Formu.campus.style.border = "2px solid red";
        correcto = false;
    }
    return correcto;
}
/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en USUARIOS_ADD_View */
/*correcto- variable que cambia de estado a false si uno de las validaciones falla*/
function comprobarEspacio(Formu) {
    var correcto=true;

    if(!comprobarAlfabetico(Formu.espacio,10)){//comprobamos que el codigo del espacio esté bien escrito
        Formu.espacio.style.border = "2px solid red";
        correcto = false;
    }
    if(!comprobarAlfabetico(Formu.edificio, 10)){//comprobamos que el codigo de edificio esté bien escrito
        Formu.edificio.style.border = "2px solid red";
        correcto = false;
    }
    if(comprobarVacio(Formu.centro) && !comprobarAlfabetico(Formu.centro,10)){//comprobamos que el codigo del centro esté bien escrito
        Formu.centro.style.border = "2px solid red";
        correcto = false;
    }
    if(!comprobarTipo(Formu.tipo)){//comprobamos que el tipo es correcto
        Formu.tipo.style.border = "2px solid red";
        correcto = false;
    }
    if(!comprobarNum(Formu.superficie,4)){//comprobamos que la superficie es correcta
        Formu.superficie.style.border = "2px solid red";
        correcto = false;
    }
    if(!comprobarNum(Formu.nInventario,8)){//comprobamos que el nInventario es correcto
        Formu.nInventario.style.border = "2px solid red";
        correcto = false;
    }
    return correcto;
}

/*Comprueba que todos los campos obligatorios estén escritos y que todos los campos escritos estén cubiertos correctamente,se envía en USUARIOS_ADD_View */
/*correcto- variable que cambia de estado a false si uno de las validaciones falla*/
function comprobarEspacioSearch(Formu) {
    var correcto=true;

    if(comprobarVacio(Formu.espacio) && !comprobarAlfabetico(Formu.espacio,10)){//comprobamos que el codigo del espacio esté bien escrito
        Formu.espacio.style.border = "2px solid red";
        correcto = false;
    }
    if(comprobarVacio(Formu.edificio) && !comprobarAlfabetico(Formu.edificio, 10)){//comprobamos que el codigo de edificio esté bien escrito
        Formu.edificio.style.border = "2px solid red";
        correcto = false;
    }
    if(comprobarVacio(Formu.centro) &&  !comprobarAlfabetico(Formu.centro,10)){//comprobamos que el codigo del centro esté bien escrito
        Formu.centro.style.border = "2px solid red";
        correcto = false;
    }
    if(comprobarVacio(Formu.tipo) && !comprobarTipo(Formu.tipo)){//comprobamos que el tipo es correcto
        Formu.tipo.style.border = "2px solid red";
        correcto = false;
    }
    if(comprobarVacio(Formu.superficie) && !comprobarNum(Formu.superficie,4)){//comprobamos que la superficie es correcta
        Formu.superficie.style.border = "2px solid red";
        correcto = false;
    }
    if(comprobarVacio(Formu.nInventario) && !comprobarNum(Formu.nInventario,8)){//comprobamos que el nInventario es correcto
        Formu.nInventario.style.border = "2px solid red";
        correcto = false;
    }
    return correcto;
}

function showAlert(){
    alert("soy un alert");
}
