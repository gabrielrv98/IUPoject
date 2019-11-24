<?php
//Clase : GENERAL_test
//Creado el : 20-11-2019
//Creado por: grvidal
//Fichero de test que llama al resto de ficheros de test 
//Contiene php para mostrar el resultado de los tests
//-------------------------------------------------------

// crear el array principal de test
	$ERRORS_array_test = array();
// incluimos aqui tantos ficheros de test como entidades
include_once '../test/Global_test.php';

?>

<h1> RESUMEN</h1>
<h2>Numero de pruebas: <?php echo count($ERRORS_array_test); ?> -Numero de errores :  
	<?php $n = 0;
		foreach ($ERRORS_array_test as $test ) {
			if ($test['resultado'] == 'FALSE') $n++; 
		}
		echo $n
	?> correctos.
</h2>
<br>

<h1>DETALLE</h1>
<?php
// presentacion de resultados
?>
<h2>Pruebas Globales</h2>

<table>
	<tr>
		<th>
			Error testeado
		</th>
		<th>
			Error Esperado
		</th>
		<th>
			Error Obtenido
		</th>
		<th>
			Resultado
		</th>
	</tr>
<?php
	foreach ($ERRORS_array_test as $test)
	{
?>
	<tr>
		<td>
			<?php echo $test['error']; ?>
		</td>
		<td>
			<?php echo $test['error_esperado']; ?>
		</td>
		<td>
			<?php echo $test['error_obtenido']; ?>
		</td>
		<td>
			<?php echo $test['resultado']; ?>
		</td>
	</tr>
<?php

	}
?>
</table>

<?php 
	$ERRORS_array_test = array();
	include_once '../test/USUARIOS_test.php';
	include_once '../test/EDIFICIO_test.php';
	include_once '../test/CENTRO_test.php';
	include_once '../test/TITULACION_test.php';
	include_once '../test/CLEAN_test.php';
?>
<h2>Test de unidad</h2>
<table>
	<tr>
		<th>
			Entidad
		</th>
		<th>
			Método
		</th>
		<th>
			Error testeado
		</th>
		<th>
			Error Esperado
		</th>
		<th>
			Error Obtenido
		</th>
		<th>
			Resultado
		</th>
	</tr>
<?php
	foreach ($ERRORS_array_test as $test)
	{
?>
	<tr>
		<td>
			<?php echo $test['entidad'];?>
		</td>
		<td>
			<?php echo $test['metodo']; ?>
		</td>
		<td>
			<?php echo $test['error']; ?>
		</td>
		<td>
			<?php echo $test['error_esperado']; ?>
		</td>
		<td>
			<?php echo $test['error_obtenido']; ?>
		</td>
		<td>
			<?php echo $test['resultado']; ?>
		</td>
	</tr>
<?php	
	}
?>
</table>
