</article>
</div>
<footer>
	<?php
		include '../Locale/Strings_' . $_COOKIE['idioma'] . '.php'; ?>
		<label class="hoyes"> Hoy es </label> <label> <?php echo date("d-M-Y", mktime()) ," grvidal"; ?> </label>
</footer>
</body>
</html> 