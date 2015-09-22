<h2>Exempel på en funktion som hanterar strängar</h2>


<?php 

function sub($text,$start,$stop)
{
	$sub;

	for ($i=($start-1); $i<$stop ; $i++) 
		{ 
			global $sub;
			$sub .= $text[$i];
		}

	return $sub;
}

echo sub("Idag har vi en underbar fredag",10,22);


?>