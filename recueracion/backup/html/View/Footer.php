<!--//Clase : Footer.php
//Creado el : 2-10-2019
//Creado por: grvidal
//Pie de la plataforma con la hora y el alias del creador
//--------------------------------------------------------->

</article>
</div>
<br><br>
<footer>
	<?php
		include '../Locale/Strings_' . $_COOKIE['idioma'] . '.php'; ?>
		<label class="hoyes"> Hoy es </label> <label> <?php echo date("d-M-Y", mktime()) ," grvidal, "  ?> </label>
		<label class="fcreacion"> <?php echo $strings['fcreacion']; ?> </label> 10-06-2020
</footer>
</body>
</html> 

		