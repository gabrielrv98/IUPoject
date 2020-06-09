<!--//Clase : Footer.php
//Creado el : 2-10-2019
//Creado por: grvidal
//Pie de la plataforma con la hora y el alias del creador
//--------------------------------------------------------->

</article>
</div>
<footer>
	<?php
		include '../Locale/Strings_' . $_COOKIE['idioma'] . '.php'; ?>
		<label class="hoyes"> Hoy es </label> <label> <?php echo date("d-M-Y", mktime()) ," grvidal"; ?> </label>
</footer>
</body>
</html> 

		