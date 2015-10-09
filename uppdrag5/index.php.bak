<!DOCTYPE html>


<?php

error_reporting(E_ALL);
ini_set('display_errors', true);



$dsn      = 'mysql:host=localhost;dbname=test;';
$login    = 'root';
$password = '';
$options  = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
$pdo = new PDO($dsn, $login, $password, $options);




if(isset($_GET['f']) && $_GET['f']!='')
{
	$f=$_GET['f'];

	if($f=="smov")
		$file = "skapamovie.sql";
	else if($f=="fmov")
		$file = "fyllmovie.sql";
	else if($f=="tmov")
		$file = "tommovie.sql";


	$lines = file($file, FILE_IGNORE_NEW_LINES) or die("Unable to open file!");


	$delning=array_search("==******==",$lines);

	
}


	
	


?>

<html>
<head>
	<meta charset="utf-8">
	<title>SQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>



<body>
	<header>
		SQL
	</header>
	<div>
	<!--<h2>Beskrivning:</h2>-->
	<?php
		for ($i=0; $i <$delning ; $i++) 
		{ 
			echo $lines[$i];
		}
	?>
	</div>

	<div class="code">
	<h2>Kod:</h2>
	<pre><?php

		$sql ="";

		for ($i= $delning+1; $i <count($lines) ; $i++) 
		{ 
			$sql .= $lines[$i];
			echo htmlspecialchars($lines[$i]). '<br>';
		}
	 ?>
	 </pre>
	</div>

	<div>
	<h2>Resultat:</h2>
	<?php
		if(strlen($sql)>0)
		{
			$stm = $pdo->prepare($sql);
		    $stm->execute();

			$stm = $pdo->prepare("select * from movie");
		    $stm->execute();


		    $html = "<table border='1' cellpadding='5'><tr>";

		    //skapar de två första raderna i tabellen rad1= rubriker rad2=data
		    $row = $stm->fetch(PDO::FETCH_ASSOC);

		    $rad1="";
		    $rad2="";
		    foreach ($row as $key => $value) 
		    {
		    	$rad1 .= "<th>$key</th>";
		    	$rad2 .= "<td>$value</td>";
		    }

		    $html .= $rad1 ."<tr>". $rad2 . "</tr>";

		    //fyll på med resten av raderna
		    
		    while($row = $stm->fetch(PDO::FETCH_ASSOC)	)
		    {
		    	$radx='';
		    	$html .= "<tr>";

		    	foreach ($row as $key => $value) 
		    	{
		    		$radx .= "<td>$value</td>";
		    	}

		    	$html .= $radx. "</tr>";
		    }



		    $html .= "</table>";


			echo $html;
		}
	?>
	</div>
	

</body>
</html>