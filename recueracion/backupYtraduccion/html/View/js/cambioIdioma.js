    /*Clase : cambioIdioma.js
//Creado el : 2-06-20
//Creado por: grvidal
//Función: traducirIU
    //Descripción: recorre el array correspondiente al idioma elegido y traduce
    //los elementos html con la clase indicada por el array. El parámetro idioma
    //toma el valor vacío por defecto (así se puede llamar la función sin 
    //parámetros en el evento onload del body).
//-------------------------------------------------------*/

//Se importan los arrays 
    import { arraySPANISH } from '../../Locale/strings_SPANISH.js';
    import { arrayENGLISH } from '../../Locale/strings_ENGLISH.js';
    import { arrayGALLAECIAN } from '../../Locale/strings_GALLAECIAN.js';
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
        if( elementos.length > 0){
          for (var elem in elementos) {
            //elementos es un array, así que cambiamos el
            //contenido HTML del elemento 'elem' del array 'elementos'
            //por el valor de la clave actual en el array de traducciones:
            if(elem != 'length')
              elementos[elem].innerHTML = arrayTraducciones[clave];
          }
        }
      }

    }
window.traducirIU = traducirIU;

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
