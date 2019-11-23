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
include_once '../test/USUARIOS_test.php';
include_once '../test/EDIFICIO_test.php';
include_once '../test/CENTRO_test.php';
include_once '../test/TITULACION_test.php';
include_once '../test/CLEAN_test.php';





?>

<h1>De <?php echo count($ERRORS_array_test); ?> tests hay  
	<?php $n = 0;
		foreach ($ERRORS_array_test as $test ) {
			if ($test['resultado'] == 'OK') $n++; 
		}
		echo $n
	?> correctos.
</h1>
<br>

<?php
// presentacion de resultados
?>
<h1>Test de unidad</h1>
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

