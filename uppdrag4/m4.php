<h2>Detta är några exempel på funktioner med parametrar och returvärden</h2>


<?php 

function writeXtimes($x=5)
{
	for ($i=0; $i<$x; $i++) 
		echo "write! ";
}

function add($a,$b=10)
{
	$sum = $a + $b;
	echo "Summan $a och $b blir $sum";
}

function fak($val)
{
	$ret=1;

	for ($i=1; $i<=$val; $i++) 
	{ 
		$ret = $ret * $i;
	}

	return $ret;
}

writeXtimes();
echo "<p>";
writeXtimes(20);
echo "<p>";
writeXtimes(0);
echo "<p>";

add(2,11);
echo "<p>";
add(5);
echo "<p>";

$svar = fak(3);
echo "$svar<br>";
echo fak(4)."<br>";
print(fak(5));


?>