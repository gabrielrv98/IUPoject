<!--
DESCRIPCIÓN:
Este ejemplo es una demostración de como realizar traducciones del lado del cliente si la página 
tiene un mismo texto repetido en varias ocasiones (ejemplo: el nombre de un campo).

Si utilizásemos un id para identificar estos textos, tendríamos que generar un id diferente para
cada uno de los textos (aunque se referirán al mismo contenido).

Para solucionar esto, utilizamos una clase en lugar de un id: la clase identifica todos los
elementos de la página que contienen el mismo texto, por lo que sólo necesitamos una clase por
cada texto y no un id por cada repetición del mismo.

En resumen, en lugar de utilizar getElementByID(id) en JavaScript, utilizamos 
getElementsByClassName(clase), y en vez de hacer directamente sobre lo obtenido una modificación
del innerHTML, recorremos los elementos devueltos por getElementsByClassName(clase) y es a estos
a quienes le modificamos su contenido HTML.


Autor: Antonio Adrián González Pedrouzo
Fecha: 27/11/2019
-->
<html>
	<head>
		<!--La clase trad_titulo coincide con la clave de una de las entradas de los arrays 
			asociativos en js-->
		<title class="trad_titulo"></title>

		<script type="text/javascript" src="traduccion.js"></script>
	</head>

	<!--Una vez se ha cargado la página, llamamos a la función de traducir la interfaz,
		que por defecto tomará el valor que tenga la cookie 'idioma', o español si la
		cookie no tiene un valor asignado-->
	<body onload="traducirIU()">
		<h1><span class="trad_tituloPagina"></span></h1>
		<br>
		<!--Se traduce también el texto de los botones. En este caso se ha puesto un texto por defecto,
			sin embargo, nunca será visible ya que se traduce siempre por la traducción correspondiente:-->
		<button onclick="traducirIU('SPANISH')"><span class = "trad_esp">ESPAÑOL</span></button>
		<button onclick="traducirIU('GALLAECIAN')"><span class = "trad_gal">GALLEGO</span></button>
		<button onclick="traducirIU('ENGLISH')"><span class = "trad_eng">ENGLISH</span></button>
		<br><br>

		<!--Aquí se ve un ejemplo de un texto repetido en tres ocasiones (texto1),
			se puede comprobar que se traducen las tres ocurrencias-->
		<h2><span class="trad_texto1"></span></h2>
		<h3><span class="trad_texto1"></span></h3>
		<span class="trad_texto1"></span>

		<h2><span class="trad_texto2"></span></h2>
		<h3><span class="trad_texto2"></span></h3>
		<span class="trad_texto2"></span>
	</body>
</html>