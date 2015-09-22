<h3>Ta fram delsträng!</h3>
<form>
	<input type="hidden" value="ex12.php" name="sida">
	Text<br>
	<input type="text" name='string' required><br>
	Startvärde<br>
	<input type="number" name='start' required><br>
	Slutvärde<br>
	<input type="number" name='stop' required><p> 
	<input type="submit">
</form>

<p>
<h3>Resultat:</h3>
<?php
	if(isset($_GET['string']) && isset($_GET['start']) && isset($_GET['stop']))
	{
		//hämtar värden och överför dem till 'enklare' variabler
		$text = $_GET['string'];
		$start = $_GET['start'];
		$stop = $_GET['stop'];

		//skriver ut orginaltexten
		echo "<h3>Orginaltext</h3>";
		echo "\"<i>$text</i>\"";

		//skapar sub-string (finns faktiskt en färdig funktion för det också...)
		$sub;
		for ($i=($start-1); $i<$stop ; $i++) 
		{ 
			global $sub;
			$sub .= $text[$i];
		}

		//skriver ut resultatet
		echo "<h3>Delsträng(" .$start."-".$stop.")</h3>";
		echo "\"<i>$sub</i>\"";

	}
?>
	
