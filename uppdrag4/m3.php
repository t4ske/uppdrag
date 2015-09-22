<h2>Detta är två exempel på simpla funktioner</h2>
<p>Syftet är bara att komma igång med funktioner och fatta
vad det handlar om. (Funktionen har inga parametrar och saknar
returvärde.)</p>

<?php 

//skapar funktion
function myFirstFunction()
{
	echo "Detta är myFirstFunction som talar!";
}

function write5times()
{
	for ($i=0; $i<5; $i++) 
		myFirstFunction();
}

//anropa funktion
myFirstFunction();

echo "<p>";

//anropa funktion 2
write5times();




?>