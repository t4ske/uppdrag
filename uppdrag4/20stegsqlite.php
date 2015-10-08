<article id="20steg" class="left border justify-para">
		

<header id="start">
	<h1>20 steg för att komma igång med SQLite</h1>


	<p class="ingress">En guide för att komma igång med SQLite, SQL och PHP PDO på 20 steg.
	Guiden hanterar grunderna i SQLite och SQL. Efter en första övning med ett adminverktyg så 
	övergår övningen i att integrera SQLite med PHP/PDO. När du är klar kan du skapa enklare 
	PHP-applikationer och spara information med hjälp av databasen SQLite.</p>

	<p>Bästa sättet att gå igenom guiden är att genomföra varje övning på egen hand. Gör precis som jag gjort, fast
	på egen hand. Kopiera eller skriv om kodexemplen, det viktiga är att du återskapar koden i din egna miljö.
	Läsa är bra men man måste göra själv, "kan själv", för att lära sig.</p>
		

	<p><strong>Del I: SQLite och SQL</strong></p>
	<ul>
		<li><a href="#s1">1. Om SQLite och SQL</a>
		<li><a href="#s2">2. SQLite Manager</a>
		<li><a href="#s3">3. Tabell, kolumn, rad och nyckel</a>
		<li><a href="#s4">4. Skapa en tabell</a>
		<li><a href="#s5">5. Lägg till rader i en tabell</a>
		<li><a href="#s6">6. Visa rader i en tabell med <code>SELECT</code></a>
		<li><a href="#s7">7. Aggregerande funktioner</a>
		<li><a href="#s8">8. Inbyggda funktioner</a>
		<li><a href="#s9">9. Import och export av data</a>
	</ul>

	<p><strong>Del II: SQLite, PHP och PDO</strong></p>
	<ul>
		<li><a href="#s10">10. PHP och SQLite</a>
		<li><a href="#s11">11. PHP och PDO</a>
		<li><a href="#s12">12. SQL injections</a>
		<li><a href="#s13">13. Koppla ett PHP-skript till en SQLite-databas med PDO</a>
		<li><a href="#s14">14. Visa innehållet i tabellen med <code>SELECT</code></a>
		<li><a href="#s15">15. Vanliga felmeddelanden med PHP PDO och SQLite</a>
		<li><a href="#s16">16. Skapa ny tabell och lägg in rader</a>
		<li><a href="#s17">17. Skapa nya rader i tabellen med <code>INSERT</code></a>
		<li><a href="#s18">18. Uppdatera rader och värden med <code>UPDATE</code></a>
		<li><a href="#s19">19. Ta bort rader med <code>DELETE</code></a>
		<li><a href="#s20">20. Avslutningsvis</a>
	</ul>

</header>


<!-- - - - - - - - - - - - - - - - - - section       - - - - - - - - - - - - - - - - - -->

<h2>Del I: SQLite och SQL</h2>
<section id='s1'> 
	<h3>1. Om SQLite<span class='nav-section right'><a href='#s1' title='Direktlänk till denna sektionen'>&crarr;</a><a href='#start' title='Gå till toppen på sidan'>&uarr;</a></span></h3>

	<figure id="sqlite-logo.gif" class='right top'>
	<a href="img/guide/sqlite20/sqlite-logo.gif"><img style="max-height:100%;max-width:100%;" src="img/guide/sqlite20/sqlite-logo.gif" alt='[Bild] SQLite logotypen'></a>
</figure>	
	<p>SQLite är ett programvarubibliotek i programspråket C som implementerar en filbaserad SQL-databas. SQLite är opensource.
	Enligt deras webbplats är SQLite är den mest spridda databasen i världen. Bekanta dig med informationen
	på deras hemsida.</p>
	
	<p><a href="http://www.sqlite.org/">http://www.sqlite.org/</a></p>

	<p>SQLite är filbaserad vilket innebär att hela databasen finns lagrad i en enda fil på disk. Vill man 
	flytta databasen så räcker det att flytta filen. Det behövs ingen särskild konfiguration av
	användare och lösenord. Enkelheten är en av fördelarna med en filbaserad databas.</p>

	<p>SQLite stödjer de vanliga SQL-konstruktionerna. Ta en titt på vilka 
	<a href="http://www.sqlite.org/lang.html">SQL-konstruktioner som stöds i SQLite</a>. 
	Om du redan är bekant med SQL-språket så kommer du att känna igen dig, om inte så kommer vi till 
	detta lite längre ned i guiden.</p>
	
	<p>SQL står för "Standard Query Language" och är ett standardiserad
	sätt att ställa frågor till en relationsdatabas. 
	<a href='http://sv.wikipedia.org/wiki/SQL'>Läs kort om SQL på Wikipedia.</a></p>

</section>


<!-- - - - - - - - - - - - - - - - - - section       - - - - - - - - - - - - - - - - - -->
<section id='s2'> 
	<h3>2. SQLite Manager<span class='nav-section right'><a href='#s2' title='Direktlänk till denna sektionen'>&crarr;</a><a href='#start' title='Gå till toppen på sidan'>&uarr;</a></span></h3>
	<p>SQLite Manager är ett grafiskt användargränssnitt för databaser i SQlite. Med verktyget kan du skapa
	nya databaser, skapa tabeller, editera data i tabellerna, söka i dem och skriva vanliga SQL-satser. 
	SQLite Manager är en Firefox AddOn.</p>
		
	<p><a href="https://addons.mozilla.org/sv-SE/firefox/addon/5817/">Ladda ned och installera SQLite Manager som Firefox AddOn</a></p>
	
	<p>När du är klar kan du starta upp SQLite Manager via menyn "Firefox - Tools - SQLite Manager". 
	Börja med att skapa en ny databas och döp den till test.</p>
	
	<figure id="sqliteman-new-db.png" class='fullwidth'>
	<a href="img/guide/sqlite20/sqliteman-new-db.png"><img style="max-height:100%;max-width:100%;" src="img/guide/sqlite20/sqliteman-new-db.png" alt='[Bild] SQLite Manager New Db'></a>
</figure>		
	<p>Se dig om i verktyget, bekanta dig med menyerna, menyvalen och olika inställningsmöjligheter under options.
	Vi skall snart börja använda verktyget till att jobba med vår nya databas.</p>
	
</section>


<!-- - - - - - - - - - - - - - - - - - section       - - - - - - - - - - - - - - - - - -->
<section id='s3'> 
	<h3>3. Tabell, kolumn, rad och nyckel<span class='nav-section right'><a href='#s3' title='Direktlänk till denna sektionen'>&crarr;</a><a href='#start' title='Gå till toppen på sidan'>&uarr;</a></span></h3>		
	<p>En databas består av tabeller, varje tabell har ett antal definerade kolumner. Varje kolumn är av en viss datatyp.</p>
	
	<p>Tabellens innehåll (content) består av rader, varje rad innehåller ett inlägg (entry) i tabellen.</p>
	
	<div class="tip">
	<h4>&nbsp; Exempel:</h4>
	<p class="example">Låt oss ta ett exempel på en tabell: Tabellen Kurs.</p>		
		
	<table style="border: 1px solid #777; margin-left:10px;">
		<tr><th colspan="2" style="text-align:center; background: #ccc;">Kurs</th></tr>
		<tr><th>Kod</th><th>Namn</th></tr>
		<tr><td>MA1201</td><td>Matematik 1</td></tr>
		<tr><td>DB1101</td><td>Databaser</td></tr>
		<tr><td>PR1501</td><td>Programmering I</td></tr>
		<tr><td>PR1502</td><td>Programmering II</td></tr>
	</table>

	<p>Den här tabellen heter "Kurs" och ska ha kolumnerna "Kod" och "Namn". Där kolumnen "Kod" har datatypen
	    CHAR(6) och kolumnen "Namn" har datatypen VARCHAR(80). Det betyder att Kod alltid är 6 tecken medan 
	    namnet kan variera från 0 upp till 80 tecken. I tabellen finns 4 rader. </p>	

	</div>
	
	<p>En tabell består alltså av av rader med värden. Oftast har varje rad något som gör att raden blir unik.
	Ett värde eller en kod, i fallet ovan är det kurskoden som gör att varje rad blir unik. Ett annat sätt 
	att göra raden unik är att tillföra ett automatiskt id, en siffra, vars enda syfte är att göra raden unik.</p>
	
	<p>Det som gör raden unikt kallas nyckel eller primärnyckel. En primärnyckel definerar den, eller de, kolumner
	vars kombination gör en rad unik. En primärnyckel kan vara en kombination av flera kolumner.</p>
	
	<p>Det var lite bakomliggande termer i databasvärlden, tabell, kolumn, rad och nyckel. I sin 
	enkelhet går det att jämföra med ett excelark, eller med matematikens mängdlära. 
	Låt oss nu fortsätta med en övning.</p>
</section>
	

<!-- - - - - - - - - - - - - - - - - - section       - - - - - - - - - - - - - - - - - -->
<section id='s4'> 
	<h3>4. Skapa en tabell<span class='nav-section right'><a href='#s4' title='Direktlänk till denna sektionen'>&crarr;</a><a href='#start' title='Gå till toppen på sidan'>&uarr;</a></span></h3>		
	<p>Låt oss göra en databas till den lokala båtklubben. </p>
	
	<p><span class="uppg">[UPPGIFT]</span>

	<p>Skapa en ny databas (<code>boats.sqlite</code>) med en tabell
	(<code>Jetty</code>) där alla båtar och deras respektive bryggplats lagras. Låt bryggplatsens id vara primärnyckel.
	Skapa kolumner för att spara båttyp, motor, längd, bredd och ägarens namn.</p>

	<p>Så här blev det för mig.</p>
	
	<p>Jag skapar en ny databas och därefter skapar jag en tabell.</p>
	
	<figure id="create-table.png" class='fullwidth'>
	<a href="img/guide/sqlite20/create-table.png"><img style="max-height:100%;max-width:100%;" src="img/guide/sqlite20/create-table.png" alt='[Bild] SQLite Manager Create Table'></a>
</figure>		
	<p>Så här ser det ut när jag tittar på den tomma tabellen.</p>
	
	<figure id="view-table-jetty.png" class='fullwidth'>
	<a href="img/guide/sqlite20/view-table-jetty.png"><img style="max-height:100%;max-width:100%;" src="img/guide/sqlite20/view-table-jetty.png" alt='[Bild] SQLite Manager Empty Table Jetty'></a>
</figure>

	<p>Som du kanske märkte så använde sig verktyget av SQL-kod för att skapa tabellen. I mitt fall blev det
	följande kod.</p>

<div class="tip">
<h4>&nbsp; SQL-kod för att skapa tabellen.</h4>
<p><blockquote class='code'><code><span style="color: #000000">
CREATE&nbsp;TABLE&nbsp;"main"."Jetty"&nbsp;(<br />&nbsp;&nbsp;&nbsp;&nbsp;"jettyPosition"&nbsp;INTEGER&nbsp;PRIMARY&nbsp;KEY&nbsp;&nbsp;NOT&nbsp;NULL&nbsp;&nbsp;UNIQUE,&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;"boatType"&nbsp;VARCHAR(20)&nbsp;NOT&nbsp;NULL,&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;"boatEngine"&nbsp;VARCHAR(20)&nbsp;NOT&nbsp;NULL,&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;"boatLength"&nbsp;INTEGER,&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;"boatWidth"&nbsp;INTEGER,&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;"ownerName"&nbsp;VARCHAR(20)<br />)<br /></span>
</code></blockquote>
</p>
</div>

	<p>Vi återkommer till SQL lite senare. Låt oss nu lägga till lite rader i tabellen.</p>
	
</section>


<!-- - - - - - - - - - - - - - - - - - section       - - - - - - - - - - - - - - - - - -->
<section id='s5'> 
	<h3>5. Lägg till rader i en tabell<span class='nav-section right'><a href='#s5' title='Direktlänk till denna sektionen'>&crarr;</a><a href='#start' title='Gå till toppen på sidan'>&uarr;</a></span></h3>
	
<p><span class="uppg">[UPPGIFT]</span>

	<p>Lägg till ett par båtar i tabellen. Du kan använda följande båtar, eller definera dina egna.</p>
	
	<ul>
		<li>Båt: Buster XXL, motor: Yamaha 115hk, längd: 635, bredd: 240, ägare: Adam
		<li>Båt: Buster M, motor: Yamaha 40hk, längd: 460, bredd: 186, ägare: Berit
		<li>Båt: Linder 440, motor: Tohatsu 4hk, längd: 431, bredd: 164, ägare: Ceasar
	</ul>
	
	<p>Klicka på "Add" för att lägga till en ny rad. Du behöver inte ange en siffra för "jettyPosition". Siffran automatgenereras
	eftersom kolumnen är specificerad som PRIMARY KEY och INTEGER. Detta sker internt i SQLite.</p> 

	<p>Så här ser det ut när jag lägger till:</p>
	
	<figure id="add-row.png" class='fullwidth'>
	<a href="img/guide/sqlite20/add-row.png"><img style="max-height:100%;max-width:100%;" src="img/guide/sqlite20/add-row.png" alt='[Bild] SQLite Manager Add Rows'></a>
</figure>	
	<p>Och så här ser det ut när båtarna finns inlagda i tabellen:</p>
	
	<figure id="rows-added.png" class='fullwidth'>
	<a href="img/guide/sqlite20/rows-added.png"><img style="max-height:100%;max-width:100%;" src="img/guide/sqlite20/rows-added.png" alt='[Bild] SQLite Manager Rows Added'></a>
</figure>	
	<p>Som du kanske märkte, så använde sig verktyget återigen av SQL-kod, denna gången för att lägga till raderna.
	SQL är centralt när man pratar om databaser (relationsdatabaser). 
	SQL-koden för att lägga till dessa 3 rader finns nedan.</p>

<div class="tip">
	<h4>&nbsp; SQL-kod för att lägga till rader i tabellen</h4>
	<p><code><span style="color: #000000">
INSERT&nbsp;INTO&nbsp;"Jetty"&nbsp;VALUES(1,'Buster&nbsp;XXL','Yamaha&nbsp;115hk',635,240,'Adam');<br />INSERT&nbsp;INTO&nbsp;"Jetty"&nbsp;VALUES(2,'Buster&nbsp;M','Yamaha&nbsp;40hk',460,186,'Berit');<br />INSERT&nbsp;INTO&nbsp;"Jetty"&nbsp;VALUES(3,'Linder&nbsp;440','Tohatsu&nbsp;4hk',431,164,'Ceasar');<br /></span>
</code></blockquote>
</p>
	</div>

<p><span class="uppg">[UPPGIFT]</span>

	<p>Testa att klicka runt på knapparna "Duplicate", "Edit" och "Delete". Se vad som händer
	och studera SQL-koden som används.</p>
	
</section>


<!-- - - - - - - - - - - - - - - - - - section       - - - - - - - - - - - - - - - - - -->
<section id='s6'> 
	<h3>6. Visa rader i en tabell med <code>SELECT</code><span class='nav-section right'><a href='#s6' title='Direktlänk till denna sektionen'>&crarr;</a><a href='#start' title='Gå till toppen på sidan'>&uarr;</a></span></h3>
	<p><code>SELECT</code> används för att välja ut rader och kolumner från en tabell. Det går att
	kombinera olika sökvillkor för att visa en delmängd av tabellens innehåll.</p>

	<p>Börja med att klicka på knappen "Search", välj att visa <em>"alla båtar vars längd är större än 4.5m"</em>.</p>

	<p>Gör en ny sökning och välj att visa <em>"alla båtar som heter 'Buster' i namnet"</em>.</p>
	
	<p> Gör ytterligare en sökning där du kombinerar ovanstående sökvillkor och lägger till villkoret 
	<em>"båtens bredd är mindre än 2m"</em>. Rätt svar på frågan är "Buster M", det finns endast en båt som matchar detta villkor.</p>

	<figure id="search.png" class='fullwidth'>
	<a href="img/guide/sqlite20/search.png"><img style="max-height:100%;max-width:100%;" src="img/guide/sqlite20/search.png" alt='[Bild] SQLite Manager Search'></a>
</figure>	
	<p>Hur ser då en <code>SELECT</code>-fråga ut för att göra samma urval. Ett kort och snabbt svar är följande:</p>

<div class="tip">
<h4>&nbsp; SQL-kod för att göra ett urval av rader</h4>
<p><blockquote class='code'><code><span style="color: #000000">
SELECT&nbsp;*&nbsp;FROM&nbsp;Jetty<br />WHERE<br />&nbsp;&nbsp;&nbsp;&nbsp;boatType&nbsp;LIKE&nbsp;"%Buster%"&nbsp;AND<br />&nbsp;&nbsp;&nbsp;&nbsp;boatLength&nbsp;&gt;&nbsp;450&nbsp;AND<br />&nbsp;&nbsp;&nbsp;&nbsp;boatWidth&nbsp;&lt;&nbsp;200;<br />&nbsp;&nbsp;&nbsp;&nbsp;</span>
</code></blockquote>
</div>

<p><span class="uppg">[UPPGIFT]</span>
	<p>Klicka på fliken "Execute SQL" och testa ovanstående sats. Får du det förväntade svaret?</p>
	
	<figure id="select.png" class='fullwidth'>
	<a href="img/guide/sqlite20/select.png"><img style="max-height:100%;max-width:100%;" src="img/guide/sqlite20/select.png" alt='[Bild] SQLite Manager Select'></a>
	
</figure>


	<p><code>Som du ser ger SELECT</code>-satsen samma svar som vid sökningen. I alla fall för mig...</p>

	<p>Vi bryter ned <code>SELECT</code>-satsen i dess beståndsdelar för att bättre förstå vad den gör.</p>
	
	<p><code>SELECT * FROM Jetty</code> säger att <em>"välj alla kolumner från tabellen Jetty"</em>.</p> 


<p><span class="uppg">[UPPGIFT]</span>

	<p>Prova att byta ut <code>*</code> mot namnet på två av kolumnerna, tex <code>boatType, ownerName</code> och exekvera frågan igen.</p>

	<p>Bilden nedan visar hur det blev för mig. Får du samma?

	<figure id="select1.png" class='fullwidth'>
	<a href="img/guide/sqlite20/select1.png"><img style="max-height:100%;max-width:100%;" src="img/guide/sqlite20/select1.png" alt='[Bild] SQLite Manager Select again'></a>
	
</figure>

	<p>Om du vill ha bättre namn på kolumn-rubrikerna så kan du ange det med <code>AS</code>-konstruktionen.

<p><span class="uppg">[UPPGIFT]</span>

	<p>Testa att ändra din fråga till följande: <code>SELECT boatType AS Typ, ownerName AS Namn FROM Jetty</code>.
	Titta på kolumnrubrikerna i bilden så ser du att de ändras:</p>

	<figure id="select2.png" class='fullwidth'>
	<a href="img/guide/sqlite20/select2.png"><img style="max-height:100%;max-width:100%;" src="img/guide/sqlite20/select2.png" alt='[Bild] SQLite Manager Select again2'></a>
	
</figure>	
	<p>I <code>WHERE</code>-delen görs urvalet av raderna. Endast de rader som matchar <code>WHERE</code>-kriteriat kommer
	att visas i resultatet. 

	<p><span class="uppg">[UPPGIFT]</span>

	<p>Testa att uppdatera <code>WHERE</code>-delen med följande satser.</p>
	
	<ul>
		<li><code>SELECT * FROM Jetty</code> (Ta bort samtliga villkor för att visa alla rader i tabellen)
		<li><code>WHERE ownerName = "Adam"</code> (Visa båtar som Adam äger)
		<li><code>WHERE ownerName LIKE "%a%"</code> (Visa båtar som ägs av någon som har ett 'a' i sitt namn)
		<li><code>WHERE boatWidth = 164</code> (Visa båtar vars bredd är 164cm)
		<li><code>WHERE boatWidth &gt;= 164 AND boatWidth &lt;= 186</code> (Visa båtar vars bredd är större än/lika med 164cm och mindre än/lika med 186cm)
		<li><code>WHERE (boatWidth &gt;= 164 AND boatWidth &lt;= 186) OR boatWidth = 240</code> (samma som ovan men visar även båtar vars bredd är 240cm)
	</ul>

	<p>Bilden nedan visar ett "krångligt" sätt att visa alla rader i tabellen i form av en 
	lite mer avancerad konstruktion med <code>AND</code>, <code>OR</code> och paranteser:</p>


	<figure id="select3.png" class='fullwidth'>
	<a href="img/guide/sqlite20/select3.png"><img style="max-height:100%;max-width:100%;" src="img/guide/sqlite20/select3.png" alt='[Bild] SQLite Manager Select again3'></a>
	
</figure>	
	<p>Att välja ut värden från tabeller är kärnan i databasbearbetning. Det är bra att ha koll på de
	möjligheter som finns med <code>SELECT</code>-satser.</p>
		
</section>


<!-- - - - - - - - - - - - - - - - - - section       - - - - - - - - - - - - - - - - - -->
<section id='s7'> 
	<h3>7. Aggregerande funktioner<span class='nav-section right'><a href='#s7' title='Direktlänk till denna sektionen'>&crarr;</a><a href='#start' title='Gå till toppen på sidan'>&uarr;</a></span></h3>
	<p>En aggregerande funktion beräknar summan, max-värde, min-värde eller medelvärde av
	alla, eller en delmängd av alla, värden i en kolumn. SQLite har stöd för vanliga aggregerande funktioner.</p>
	
<blockquote class="links"><a href='http://www.sqlite.org/lang_aggfunc.html'>Manualsida för aggregerande funktioner i SQLite</a>.<br/></blockquote>
	<p>Vanliga aggregerande funktioner är COUNT, MAX, MIN, SUM och AVG.</p>

<p><span class="uppg">[UPPGIFT]</span>

	<p> Testa följande SQL satser 
	och se vilket resultat du får.</p>

	<ul>
		<li><code>SELECT COUNT(jettyPosition) FROM Jetty</code> (Räkna antalet rader i tabellen)
		<li><code>SELECT MAX(boatLength) FROM Jetty</code> (Visa största båtlängden)
		<li><code>SELECT MIN(boatWidth) FROM Jetty</code> (Visa den minsta bredden)
		<li><code>SELECT SUM(boatWidth) FROM Jetty</code> (Visa summan av samtliga båtars bredd)
		<li><code>SELECT AVG(boatLength) FROM Jetty</code> (Visa medellängden av samtliga båtar)
	</ul>

	<p>Bilden nedan visar hur man kan beräkna medellängden av alla båtar med aggregat-funktionen 
	<code>AVG()</code>.</p>


	<figure id="aggregate.png" class='fullwidth'>
	<a href="img/guide/sqlite20/aggregate.png"><img style="max-height:100%;max-width:100%;" src="img/guide/sqlite20/aggregate.png" alt='[Bild] SQLite Manager Aggregate'></a>
	
</figure>	
	<p>Aggregatfunktioner är ett viktigt verktyg för databasprogrammeraren.</p>

</section>


<!-- - - - - - - - - - - - - - - - - - section       - - - - - - - - - - - - - - - - - -->
<section id='s8'> 
	<h3>8. Inbyggda funktioner<span class='nav-section right'><a href='#s8' title='Direktlänk till denna sektionen'>&crarr;</a><a href='#start' title='Gå till toppen på sidan'>&uarr;</a></span></h3>
	<p>SQLite har inbyggda funktioner som kan hjälpa till vid beräkningar eller för att förbereda resultatet
	för presentation. Det finns funktioner för att bearbeta strängar, siffror och datum.</p>
	
<blockquote class="links"><a href='http://www.sqlite.org/lang_corefunc.html'>Manualsida för inbyggda funktioner i SQLite</a>.<br/></blockquote>	
	<p>Med dessa funktioner kan du bearbeta datamängden för att få bra rapporter. Ibland är det 
	bättre att bearbeta datamängden via SQL och dess funktioner, istället för att göra bearbetningen i PHP.
	Försök att använda SQL för att göra så korrekta rapporter som möjligt, det minimerar kodandet i PHP
	och är ofta ett effektivt sätt att programmera.</p>

	<p><span class="uppg">[UPPGIFT]</span>
	
	<p>Testa följande SQL satser och se vilket resultat du får.</p>

	<ul>
		<li><code>SELECT round(AVG(boatLength), 2) FROM Jetty</code> (Visa medellängden av samtliga båtar, avrunda till två decimaler)
		<li><code>SELECT length(ownerName) FROM Jetty</code> (Räkna antalet tecken i namnet)
		<li><code>SELECT random()</code> (Välj ett slumpvärde)
		<li><code>SELECT hex(random())</code> (Välj ett slumpvärde och visa som hexadecimalt tal)
		<li><code>SELECT upper(ownerName) FROM Jetty</code> (Omvandla till stora bokstäver)
	</ul>

	<p>Nedan kan du se hur jag omvandlar alla namn till stora bokstäver med inbyggda funktionen 
	<code>upper()</code>.</p>

	<figure id="functions.png" class='fullwidth'>
	<a href="img/guide/sqlite20/functions.png"><img style="max-height:100%;max-width:100%;" src="img/guide/sqlite20/functions.png" alt='[Bild] SQLite Manager Functions'></a>
	
</figure>	
	<p>Inbyggda funktioner är viktiga för att kunna bearbeta och komplettera resultatet från
	<code>SELECT</code>-satserna.</p>

</section>


<!-- - - - - - - - - - - - - - - - - - section       - - - - - - - - - - - - - - - - - -->
<section id='s9'> 
	<h3>9. Import och export av data<span class='nav-section right'><a href='#s9' title='Direktlänk till denna sektionen'>&crarr;</a><a href='#start' title='Gå till toppen på sidan'>&uarr;</a></span></h3>
	<p>Det går att exportera hela databasen till en textfil bestående av SQL-kommandon. Det är bra om
	man vill ta backup eller om man vill dela med sig av sin data.</p>
	
	<p>Välj fliken "Structure" och klicka på knappen "Export" eller välj fliken "Export Wizard".
	Välj "Att exportera din tabell som SQL" och klicka för checkboxen "Include CREATE TABLE statement".
	Klicka "OK" och spara filen på ditt skrivbord.</p>

	<figure id="export.png" class='fullwidth'>
	<a href="img/guide/sqlite20/export.png"><img style="max-height:100%;max-width:100%;" src="img/guide/sqlite20/export.png" alt='[Bild] SQLite Manager Export'></a>
	
</figure>	
	<p>Innehållet i min egen fil följer (observera att jag har bytt namn på
	min tabell från "Jetty" till "Jetty_mos").</p>

<div class="tip">
	<h4>&nbsp; Databasen exporterad som SQL-kommandon</h4>
	<p><blockquote class='code'><code><span style="color: #000000">
DROP&nbsp;TABLE&nbsp;IF&nbsp;EXISTS&nbsp;"Jetty_mos";<br />CREATE&nbsp;TABLE&nbsp;"Jetty_mos"&nbsp;(<br />"jettyPosition"&nbsp;INTEGER&nbsp;PRIMARY&nbsp;KEY&nbsp;&nbsp;NOT&nbsp;NULL&nbsp;&nbsp;UNIQUE&nbsp;,&nbsp;<br />"boatType"&nbsp;VARCHAR(20)&nbsp;NOT&nbsp;NULL&nbsp;,&nbsp;"boatEngine"&nbsp;VARCHAR(20)&nbsp;NOT&nbsp;NULL&nbsp;,&nbsp;<br />"boatLength"&nbsp;INTEGER,&nbsp;<br />"boatWidth"&nbsp;INTEGER,&nbsp;<br />"ownerName"&nbsp;VARCHAR(20)<br />);<br />INSERT&nbsp;INTO&nbsp;"Jetty_mos"&nbsp;VALUES(1,'Buster&nbsp;XXL','Yamaha&nbsp;115hk',635,240,'Adam');<br />INSERT&nbsp;INTO&nbsp;"Jetty_mos"&nbsp;VALUES(2,'Buster&nbsp;M','Yamaha&nbsp;40hk',460,186,'Berit');<br />INSERT&nbsp;INTO&nbsp;"Jetty_mos"&nbsp;VALUES(3,'Linder&nbsp;440','Tohatsu&nbsp;4hk',431,164,'Ceasar');<br /></span>
</code></blockquote>
	</div>	

	<p><span class="uppg">[UPPGIFT]</span>

	<p>Testa nu att importera min exporterade data in i din egen databas. Börja med att spara ned ovanstående SQL-kommandon
	i en egen fil och döp den till <code>Jetty_mos.sql</code>.</p>
	
	<p>Så här gör du: </p>
	<p>Välj "Import" från toolbaren, eller välj fliken "Import Wizard". Välj "SQL", peka ut filen
	och klicka "OK".</p>

	<figure id="import.png" class='fullwidth'>
	<a href="img/guide/sqlite20/import.png"><img style="max-height:100%;max-width:100%;" src="img/guide/sqlite20/import.png" alt='[Bild] SQLite Manager Import'></a>
	
</figure>	
	<p>Sådär, nu ska du ha en egen kopia av min databas, inklusive tabell och värden. Välj min databas och titta 
	att tabellen innehåller de förväntade raderna.</p>

	<p>Denna typen av import och export av värden i en databas är bra att ha koll på. Det visar 
	hur man kan utbyta information (databaser) via SQL i text-filer. Glöm bara inte bort att SQLite är
	en filbaserad databas och det räcker att kopiera filen för att ta en backup.</p>

	<p>Nu är vi redo att börja leka lite med PHP för att komma åt databasen.</p>
		
</section>


<!-- - - - - - - - - - - - - - - - - - section       - - - - - - - - - - - - - - - - - -->
<h2>Del II: SQLite, PHP och PDO</h2>
<section id='s10'> 
	<h3>10. PHP och SQLite<span class='nav-section right'><a href='#s10' title='Direktlänk till denna sektionen'>&crarr;</a><a href='#start' title='Gå till toppen på sidan'>&uarr;</a></span></h3>		
	<p>Via PHP kan man komma åt informationen i en SQLite-databas. Det finns olika PHP-interface för att jobba
	mot SQLite, antingen sqlite, sqlite3 eller pdo-sqlite. Du kan läsa mer om dessa i PHP-manualen (översiktligt).</p>
		
<blockquote class="links"><a href='http://php.net/manual/en/book.sqlite.php'>PHP extension sqlite</a>.<br/><a href='http://php.net/manual/en/book.sqlite3.php'>PHP extension sqlite3, för databaser av version 3</a>.<br/><a href='http://php.net/manual/en/ref.pdo-sqlite.php'>PHP PDO extension för SQLite, pdo-sqlite</a>.<br/></blockquote>
	<p>Här kommer vi att använda interfacet PDO för att jobba mot SQLite. PHP Data Objects (PDO) är ett generiskt gränssnitt för att
	jobba mot olika underliggande databaser.</p> 
	
	<p>Med lite PHP-kod kan du kontrollera om din PHP-installation har stöd för PDO och SQLite.
	Lägg följande kod i en PHP-fil och kör den på din webbserver för att se om det finns stöd för PDO
	och SQLite.</p>

<div class="tip">
<h4>&nbsp; PHP-skript för att kontrollera om din server har stöd för pdo-sqlite.</h4>
<p><blockquote class='code'><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br /></span><span style="color: #007700">if(</span><span style="color: #0000BB">class_exists</span><span style="color: #007700">(</span><span style="color: #DD0000">'PDO'</span><span style="color: #007700">)&nbsp;&amp;&amp;&nbsp;</span><span style="color: #0000BB">in_array</span><span style="color: #007700">(</span><span style="color: #DD0000">"sqlite"</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">PDO</span><span style="color: #007700">::</span><span style="color: #0000BB">getAvailableDrivers</span><span style="color: #007700">()))&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"&lt;p&nbsp;style='color:green'&gt;sqlite&nbsp;PDO&nbsp;driver&nbsp;IS&nbsp;enabled"</span><span style="color: #007700">;<br />}&nbsp;else&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"&lt;p&nbsp;style='color:red'&gt;sqlite&nbsp;PDO&nbsp;driver&nbsp;IS&nbsp;NOT&nbsp;enabled"</span><span style="color: #007700">;<br />}<br /></span>
</span>
</code></blockquote>
</div>
		
	
	<p>WAMPServer (Windows) och MAMP (Mac) har SQLite enablad från början.</p>

	<p>Vi dubbelkollar konfigurationen på WAMPServer och Windows.</p>

	<figure id="pdo-sqlite-enabled-wamp.png" class='fullwidth'>
	<a href="img/guide/sqlite20/pdo-sqlite-enabled-wamp.png"><img style="max-height:100%;max-width:100%;" src="img/guide/sqlite20/pdo-sqlite-enabled-wamp.png" alt='[Bild] SQLite enabled on WAMPServer'></a>
</figure>	
	<p>Lika bra att dubbelkolla konfigurationen på MAMP och MacOS också:</p>

	<figure id="pdo-sqlite-enabled-mamp.png" class='fullwidth'>
	<a href="img/guide/sqlite20/pdo-sqlite-enabled-mamp.png"><img style="max-height:100%;max-width:100%;" src="img/guide/sqlite20/pdo-sqlite-enabled-mamp.png" alt='[Bild] SQLite enabled on MAMP'></a>
</figure>	

	<p>Fint, PHP, PDO och SQLite verkar vara en kombination som fungerar. Kolla så att allt är ok med din egna maskin.
	Använd ovanstående PHP-kod för att kontrollera att PHP PDO och SQLite är installerat.</p>

</section>


<!-- - - - - - - - - - - - - - - - - - section       - - - - - - - - - - - - - - - - - -->
<section id='s11'> 
	<h3>11. PHP och PDO<span class='nav-section right'><a href='#s11' title='Direktlänk till denna sektionen'>&crarr;</a><a href='#start' title='Gå till toppen på sidan'>&uarr;</a></span></h3>
	<p>PHP Data Objects (PDO) är ett generellt interface för att accessa databaser i PHP. Varje databas-driver
	som implementerar ett PDO-interface kan nås via PDO. SQLite har ett sådant PDO-interface.</p>
	
	<p><a href="http://www.php.net/manual/en/intro.pdo.php">Läs den korta introduktionen om PHP PDO</a>.</p>
	
	<p>En feature som stöds av många databaser är "Prepared Statements". Med "Prepared Statements" blir det enkelt 
	att ställa SQL-frågor till databasen. Prepared statements har också ett säkert sätt att 
	hantera argument, ett sätt som undviker vanliga säkerhetshål som SQL injections.</p>
	
	<p><a href="http://www.php.net/manual/en/pdo.prepared-statements.php">Läs stycket om prepared statements och studera översiktligt exemplen</a>. 
	Via exemplen så ser du hur databasfrågor såsom <code>INSERT</code>, <code>UPDATE</code>, <code>DELETE</code>
	och <code>SELECT</code> ställs via PHP PDO.</p>

</section>


<!-- - - - - - - - - - - - - - - - - - section       - - - - - - - - - - - - - - - - - -->
<section id='s12'> 
	<h3>12. SQL injections<span class='nav-section right'><a href='#s12' title='Direktlänk till denna sektionen'>&crarr;</a><a href='#start' title='Gå till toppen på sidan'>&uarr;</a></span></h3>
	<p>Först några ord om säkerhetshål och SQL injections innan vi fortsätter.</p>
	
	<figure id="exploits_of_a_mom.png" class='fullwidth'>
	<a href="http://imgs.xkcd.com/comics/exploits_of_a_mom.png"><img style="max-height:100%;max-width:100%;" src="http://imgs.xkcd.com/comics/exploits_of_a_mom.png" alt='[Bild] SQL-injections strip'></a>
	
</figure>	
	<p>SQL injections är ett sätt för en "cracker" att "bryta sig in" i en webbapplikation
	genom att via URL:en, eller formulär, modifiera SQL-satserna som körs av webbapplikationen. Ett sådant säkerhetshål 
	kan ge en inbrytare tillgång till alla användare och lösenord i en databas.</p>
	
	<p>Läs lite snabbt (och översiktligt) om <a href="http://en.wikipedia.org/wiki/SQL_injection">SQL injections på Wikipedia</a>.</p>


	<!--
	<p>Om du är intresserad av att se hur det går till i praktiken, när webbplatser crackas och
	resultatet publiceras, så surfar du in till flash.back.org. Där finns ett <a href="https://www.flash.back.org/f16">forum
	för diskussioner kring IT-säkerhet</a>.</p>
	-->
	
	<p>PDO och prepared statements är en teknik som undviker SQL injections. Det kan du läsa
	om i <a href="http://www.php.net/manual/en/pdo.prepared-statements.php">stycket om prepared statements</a>.</p>

</section>


<!-- - - - - - - - - - - - - - - - - - section       - - - - - - - - - - - - - - - - - -->
<section id='s13'> 
	<h3>13. Koppla ett PHP-skript till en SQLite-databas med PDO<span class='nav-section right'><a href='#s13' title='Direktlänk till denna sektionen'>&crarr;</a><a href='#start' title='Gå till toppen på sidan'>&uarr;</a></span></h3>		
	<p>Vi gör ett minsta möjliga skript som kopplar sig mot en SQLite databas via PHP PDO och ställer
	en fråga samt skriver ut resultatet till webbläsare. Låt oss använda samma databas som vi 
	jobbade med tidigare. Ta en kopia av den filen (<code>boats.sqlite</code>) och flytta den till 
	en katalog på din webbserver (jag valde att döpa om filen till <code>jetty.sqlite</code>)</p>
	
	<p>Därefter kan du skapa ett PHP-skript med följande kod. Se vad som händer om du kör skriptet
	på din webbläsare (notera att min databas numer heter <code>jetty.sqlite</code>).</p>
	
<div class="tip">
<h4>&nbsp; Minimal PHP-kod för att kopppla till en SQLite databas och ställa en fråga</h4>
<p><blockquote class='code'><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br />$db&nbsp;</span><span style="color: #007700">=&nbsp;new&nbsp;</span><span style="color: #0000BB">PDO</span><span style="color: #007700">(</span><span style="color: #DD0000">"sqlite:jetty.sqlite"</span><span style="color: #007700">);<br /></span><span style="color: #0000BB">$db</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">setAttribute</span><span style="color: #007700">(</span><span style="color: #0000BB">PDO</span><span style="color: #007700">::</span><span style="color: #0000BB">ATTR_ERRMODE</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">PDO</span><span style="color: #007700">::</span><span style="color: #0000BB">ERRMODE_WARNING</span><span style="color: #007700">);&nbsp;</span><span style="color: #FF8000">//&nbsp;Display&nbsp;errors,&nbsp;but&nbsp;continue&nbsp;script<br /><br />//&nbsp;Prepare&nbsp;and&nbsp;execute&nbsp;the&nbsp;statement<br /></span><span style="color: #0000BB">$stmt&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$db</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">prepare</span><span style="color: #007700">(</span><span style="color: #DD0000">'SELECT&nbsp;*&nbsp;FROM&nbsp;Jetty;'</span><span style="color: #007700">);<br /></span><span style="color: #0000BB">$stmt</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">execute</span><span style="color: #007700">();<br /><br /></span><span style="color: #FF8000">//&nbsp;Get&nbsp;the&nbsp;results&nbsp;as&nbsp;an&nbsp;array<br /></span><span style="color: #0000BB">$res&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$stmt</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">fetchAll</span><span style="color: #007700">(</span><span style="color: #0000BB">PDO</span><span style="color: #007700">::</span><span style="color: #0000BB">FETCH_ASSOC</span><span style="color: #007700">);<br />echo&nbsp;</span><span style="color: #DD0000">"&lt;pre&gt;"</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">print_r</span><span style="color: #007700">(</span><span style="color: #0000BB">$res</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">false</span><span style="color: #007700">),&nbsp;</span><span style="color: #DD0000">"&lt;/pre&gt;"</span><span style="color: #007700">;<br /></span>
</span>
</code></blockquote>
</div>

	
	
	<p>Studera källkoden i exemplet och se flödet i PHP-koden.</p>
	
	<ol>
		<li>Definera sökvägen till filen (databasen).
		<li>Skapa ett nytt databasobjekt och peka det mot filen.
		<li>Förbered en SQL-sats.
		<li>Utför SQL-satsen.
		<li>Hämta resultatet från SQL-frågan (en array).
		<li>Skriv ut resultatet.
	</ol>

	<p><span class="uppg">[UPPGIFT]</span>

	<p>Kopiera koden till din egna fil och gör ett eget exempel. Testa så att det fungerar.
	Detta är grunden i att koppla PHP mot en databas. Inte så svårt va?</p>

</section>


<!-- - - - - - - - - - - - - - - - - - section       - - - - - - - - - - - - - - - - - -->
<section id='s14'> 
	<h3>14. Visa innehållet i tabellen med <code>SELECT</code><span class='nav-section right'><a href='#s14' title='Direktlänk till denna sektionen'>&crarr;</a><a href='#start' title='Gå till toppen på sidan'>&uarr;</a></span></h3>		
	<p>Vi utökar testskriptet med fler <code>SELECT</code>-satser. Men, ta först ett par minuter
	och studera <a href="http://www.sqlite.org/lang_select.html">SQL-satsen <code>SELECT</code> på www.sqlite.org</a>.</p>
	
	<p>Det kanske inte är inte uppenbart hur syntaxen fungerar, men studera bilderna och försök se
	hur SQL-satsen kan konstrueras.</p>


	<p>Det går att använda variabler från ett postat formulär för att konstruera SQL-satsen. I
	följande exempel visas ett sökformulär där <code>WHERE</code>-delen justeras beroende 
	på det skickade formuläret. Men först ett kodexempel som visar hur argument kan hanteras 
	tillsammans med PDO.</p>


<div class="tip">
<h4>&nbsp; En variabel från ett formulär skapar förutsättningar för SQL-frågan</h4>
<p><blockquote class='code'><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br />$stmt&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$db</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">prepare</span><span style="color: #007700">(</span><span style="color: #DD0000">'SELECT&nbsp;*&nbsp;FROM&nbsp;Jetty&nbsp;WHERE&nbsp;boatType&nbsp;LIKE&nbsp;?&nbsp;OR&nbsp;boatEngine&nbsp;LIKE&nbsp;?&nbsp;OR&nbsp;ownerName&nbsp;LIKE&nbsp;?;'</span><span style="color: #007700">);<br /></span><span style="color: #0000BB">$stmt</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">execute</span><span style="color: #007700">(array(</span><span style="color: #0000BB">$_GET</span><span style="color: #007700">[</span><span style="color: #DD0000">'search'</span><span style="color: #007700">],&nbsp;</span><span style="color: #0000BB">$_GET</span><span style="color: #007700">[</span><span style="color: #DD0000">'search'</span><span style="color: #007700">],&nbsp;</span><span style="color: #0000BB">$_GET</span><span style="color: #007700">[</span><span style="color: #DD0000">'search'</span><span style="color: #007700">]));<br /></span>
</span>
</code></blockquote>
</div>
	
	<p>I frågan skriver man ?-tecken och när frågan exekveras så skickar man in en array med lika många 
	element som man har ?-tecken. Smidigt, enkelt och säkert. </p>

	<p><span class="uppg">[UPPGIFT]</span>

	<p>Skapa en sida som tillåter att användaren skriver in en egen båt-typ eller båt-motor och hämtar det
	båtar som har den typen/motorn.</p>

	<p>Med dessa konstruktioner kan du skapa samma SQL-frågor som vi gjorde i verktyget SQLite Manager.
	Pröva gärna att uppdatera ditt skript med fler varianter på SQL-frågor.</p>
	
</section>


<!-- - - - - - - - - - - - - - - - - - section       - - - - - - - - - - - - - - - - - -->
<section id='s15'> 
	<h3>15. Vanliga felmeddelanden med PHP PDO och SQLite<span class='nav-section right'><a href='#s15' title='Direktlänk till denna sektionen'>&crarr;</a><a href='#start' title='Gå till toppen på sidan'>&uarr;</a></span></h3>
	<p>Följande felmeddelanden kan förekomma när du jobbar med PHP PDO och SQLite. Tillsammans med
	felmeddelandet finner du tips på hur du kan åtgärda felen.</p>

	<p class="example">Felmeddelande "unable to open database file"</p>
	<blockquote class="example" style="overflow:auto;">
Fatal error: Uncaught exception 'PDOException' with message 'SQLSTATE[HY000] [14] unable to open database file' in /usr/home/mos/htdocs/dbwebb.se/htmlphp/kmom06/me2/incl/guide/sqlite20/init.php:34 Stack trace: #0 /usr/home/mos/htdocs/dbwebb.se/htmlphp/kmom06/me2/incl/guide/sqlite20/init.php(34): PDO->__construct('sqlite:/usr/hom...') #1 {main} thrown in /usr/home/mos/htdocs/dbwebb.se/htmlphp/kmom06/me2/incl/guide/sqlite20/init.php on line 34
	</blockquote>	

	<p>Lösning: Databasen, eller filen, kan inte hittas. Kontrollera sökvägen som används.</p>

	<p class="example">Felmeddelande "write a readonly database"</p>
	<blockquote class="example" style="overflow:auto;">
Warning: PDOStatement::execute() [pdostatement.execute]: SQLSTATE[HY000]: General error: 8 attempt to write a readonly database in /usr/home/mos/htdocs/dbwebb.se/htmlphp/kmom06/me2/incl/guide/sqlite20/init.php on line 75
	</blockquote>	

	<p>Lösning: Databas-filen är skrivskyddad. Ändra rättigheterna till 666 så det går att skriva till filen.</p>

	<p class="example">Felmeddelande "unable to open database file"</p>
	<blockquote class="example" style="overflow:auto;">
Warning: PDOStatement::execute() [pdostatement.execute]: SQLSTATE[HY000]: General error: 14 unable to open database file in /usr/home/mos/htdocs/dbwebb.se/htmlphp/kmom06/me2/incl/guide/sqlite20/init.php on line 75
	</blockquote>	

	<p>Lösning: Katalogen som databas-filen ligger i är skrivskyddad. Ändra rättigheterna på katalogen till 777.</p>

</section>


<!-- - - - - - - - - - - - - - - - - - section       - - - - - - - - - - - - - - - - - -->
<section id='s16'> 
	<h3>16. Skapa ny tabell och lägg in rader<span class='nav-section right'><a href='#s16' title='Direktlänk till denna sektionen'>&crarr;</a><a href='#start' title='Gå till toppen på sidan'>&uarr;</a></span></h3>		
	<p>När en webbapplikation installeras så initieras databasen ofta genom att skapa tabeller  
	och lägga in default-värden i tabellerna. Vi kan göra detta genom att skapa ett skript som 
	initierar en tom databasfil genom att skapa en tabell och lägga 
	till ett antal rader.</p>
	
	<p>När vi jobbade med SQLite Manager så såg vi  SQL-koden för att skapa en tabell och för att
	lägga dit rader.</p>

	<div class="tip">
	<h4>&nbsp; SQL-kod för att skapa tabell och för att lägga till rader.</h4>
	<p><blockquote class='code'><code><span style="color: #000000">
CREATE&nbsp;TABLE&nbsp;"main"."Jetty"&nbsp;(<br />&nbsp;&nbsp;&nbsp;&nbsp;"jettyPosition"&nbsp;INTEGER&nbsp;PRIMARY&nbsp;KEY&nbsp;&nbsp;NOT&nbsp;NULL&nbsp;&nbsp;UNIQUE,&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;"boatType"&nbsp;VARCHAR(20)&nbsp;NOT&nbsp;NULL,&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;"boatEngine"&nbsp;VARCHAR(20)&nbsp;NOT&nbsp;NULL,&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;"boatLength"&nbsp;INTEGER,&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;"boatWidth"&nbsp;INTEGER,&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;"ownerName"&nbsp;VARCHAR(20)<br />)<br /><br />INSERT&nbsp;INTO&nbsp;"Jetty"&nbsp;VALUES(1,'Buster&nbsp;XXL','Yamaha&nbsp;115hk',635,240,'Adam');<br />INSERT&nbsp;INTO&nbsp;"Jetty"&nbsp;VALUES(2,'Buster&nbsp;M','Yamaha&nbsp;40hk',460,186,'Berit');<br />INSERT&nbsp;INTO&nbsp;"Jetty"&nbsp;VALUES(3,'Linder&nbsp;440','Tohatsu&nbsp;4hk',431,164,'Ceasar');<br /></span>
</code></blockquote>
	</div>
	

	<p>Låt oss skapa ett testskript, <code>init.php</code>, som har till uppgift att skapa tabellen och lägga
	till dessa exempelrader. Jag väljer att göra detta i en ny databas-fil, <code>jetty1.sqlite</code>. 
	</p>

	<p><span class="uppg">[UPPGIFT]</span>
	
	<p>Skriv om, eller kopiera, koden i exemplet och få det att fungera i din egen miljö.</p>

</section>


<!-- - - - - - - - - - - - - - - - - - section       - - - - - - - - - - - - - - - - - -->
<section id='s17'> 
	<h3>17. Skapa nya rader i tabellen med <code>INSERT</code><span class='nav-section right'><a href='#s17' title='Direktlänk till denna sektionen'>&crarr;</a><a href='#start' title='Gå till toppen på sidan'>&uarr;</a></span></h3>		
	<p>I en webbapplikation är det ett vanligt förfarande att användaren skall kunna lägga till nya rader i databasen. Låt
	oss göra ett exempel där användaren fyller i ett formulär för att lägga till en ny båt.</p>
	
	<p>Innan du går vidare så kan du kort studera <a href="http://www.sqlite.org/lang_insert.html">
	SQL-satsen <code>INSERT</code> på www.sqlite.org</a>.</p>
	
	<p>Vi gör ett nytt skript, <code>insert.php</code>. Vi gör ett POST-formulär som postar till sig självt, 
	ungefär som vi gjorde med sök-formuläret.
	Vi använder ?-tecken för att hantera parametrarna och vi använder en array för att mellanlagra alla
	inkommande formulärvariabler.</p>
	
	<p>Den del som genomför <code>INSERT</code> ser ut som följer.</p>

	<div class="tip">
	<h4>&nbsp; PHP-kod för att lägga till en ny båt i tabellen.</h4>
	<p><blockquote class='code'><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br /></span><span style="color: #FF8000">//<br />//&nbsp;Was&nbsp;the&nbsp;form&nbsp;submitted?&nbsp;Then&nbsp;add&nbsp;new&nbsp;boat<br />//<br /></span><span style="color: #007700">if(isset(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">'add'</span><span style="color: #007700">]))&nbsp;{<br /><br />&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Add&nbsp;all&nbsp;form&nbsp;entries&nbsp;to&nbsp;an&nbsp;array<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$boat</span><span style="color: #007700">[]&nbsp;=&nbsp;</span><span style="color: #0000BB">strip_tags</span><span style="color: #007700">(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"jettyPosition"</span><span style="color: #007700">]);<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$boat</span><span style="color: #007700">[]&nbsp;=&nbsp;</span><span style="color: #0000BB">strip_tags</span><span style="color: #007700">(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"boatType"</span><span style="color: #007700">]);<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$boat</span><span style="color: #007700">[]&nbsp;=&nbsp;</span><span style="color: #0000BB">strip_tags</span><span style="color: #007700">(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"boatEngine"</span><span style="color: #007700">]);<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$boat</span><span style="color: #007700">[]&nbsp;=&nbsp;</span><span style="color: #0000BB">strip_tags</span><span style="color: #007700">(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"boatLength"</span><span style="color: #007700">]);<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$boat</span><span style="color: #007700">[]&nbsp;=&nbsp;</span><span style="color: #0000BB">strip_tags</span><span style="color: #007700">(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"boatWidth"</span><span style="color: #007700">]);<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$boat</span><span style="color: #007700">[]&nbsp;=&nbsp;</span><span style="color: #0000BB">strip_tags</span><span style="color: #007700">(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"ownerName"</span><span style="color: #007700">]);<br /><br />&nbsp;&nbsp;</span><span style="color: #0000BB">$stmt&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$db</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">prepare</span><span style="color: #007700">(</span><span style="color: #DD0000">"INSERT&nbsp;INTO&nbsp;Jetty&nbsp;VALUES(?,?,?,?,?,?)"</span><span style="color: #007700">);<br />&nbsp;&nbsp;</span><span style="color: #0000BB">$stmt</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">execute</span><span style="color: #007700">(</span><span style="color: #0000BB">$boat</span><span style="color: #007700">);<br />&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"&lt;p&gt;Inserted&nbsp;new&nbsp;boat.&nbsp;Rowcount&nbsp;is&nbsp;=&nbsp;"&nbsp;</span><span style="color: #007700">.&nbsp;</span><span style="color: #0000BB">$stmt</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">rowCount</span><span style="color: #007700">()&nbsp;.&nbsp;</span><span style="color: #DD0000">"&lt;/p&gt;"</span><span style="color: #007700">;<br />}<br /></span>
</span>
</code></blockquote>
	</div>
	
	<p>Om formuläret var postat så läggs alla formulärvariabler in i en array, <code>$boat</code>.
	Därefter förbereds SQL-satsen för att sedan exekveras tillsammans med <code>$boat</code>. Alla
	frågetecken i SQL-satsen ersätts med värden från arrayen. Slutligen skriver vi ut antalet rader
	som påverkades av SQL-satsen. Detta sker med anrop till funktionen <code>$stmt->rowCount()</code>.
	Om en rad lades till returneras 1, om något gick fel och ingen rad lades till så returneras 0.
	
	<p><span class="uppg">[UPPGIFT]</span>

	<p>Kopiera koden, eller skriv om den, och gör ditt egna exempel. Testa att lägga till nya rader och
	se vilka värden som accepteras. Det går tex inte att lägga till en ny båt som har en jettyPosition
	som redan finns, det kommer generera ett felmeddelande, liksom försök att lägga till båtar vars jettyPosition
	har ett tomt värde.</p>

</section>


<!-- - - - - - - - - - - - - - - - - - section       - - - - - - - - - - - - - - - - - -->
<section id='s18'> 
	<h3>18. Uppdatera värden och rader i tabellen med <code>UPDATE</code><span class='nav-section right'><a href='#s18' title='Direktlänk till denna sektionen'>&crarr;</a><a href='#start' title='Gå till toppen på sidan'>&uarr;</a></span></h3>	
	
	<p>En annan vanlig företeelse i en webbapplikation är möjligheten att uppdatera värden i en rad.
	Vi gör ett nytt skript, <code>update.php</code>, som ger möjligheten att välja en viss rad och
	sedan spara dess värden.</p>
	
	<p>Innan du kör igång så kan du kort titta på <a href="http://www.sqlite.org/lang_update.html">SQL-satsen 
	<code>UPDATE</code> på www.sqlite.org</a></p>

	<p>I exemplet lägger jag till en länk i tabellen, 
	om man klickar på den så visas båtens värden i formuläret.
	Därefter kan man ändra alla värden och spara dem. Skriptet använder en mix av POST och GET. POST
	används för att posta formuläret och spara värden om båten. GET används för att visa värden 
	om en speciell båt.</p>
	
	<p>Länken till en viss båt skapas när tabellen genereras, så här gjorde jag:</p>
	
	<div class="tip">
	<h4>&nbsp; PHP-kod för att skapa länk till en viss båt.</h4>
	<p><blockquote class='code'><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br /></span><span style="color: #FF8000">//&nbsp;Get&nbsp;all&nbsp;rows,&nbsp;one&nbsp;by&nbsp;one<br /></span><span style="color: #007700">foreach(</span><span style="color: #0000BB">$res&nbsp;</span><span style="color: #007700">AS&nbsp;</span><span style="color: #0000BB">$val</span><span style="color: #007700">)&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"&lt;tr&gt;"</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;foreach(</span><span style="color: #0000BB">$val&nbsp;</span><span style="color: #007700">AS&nbsp;</span><span style="color: #0000BB">$key1&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #0000BB">$val1</span><span style="color: #007700">)&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(</span><span style="color: #0000BB">$key1&nbsp;</span><span style="color: #007700">==&nbsp;</span><span style="color: #DD0000">'jettyPosition'</span><span style="color: #007700">)&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"&lt;td&gt;&lt;a&nbsp;href='</span><span style="color: #007700">{</span><span style="color: #0000BB">$_SERVER</span><span style="color: #007700">[</span><span style="color: #DD0000">'PHP_SELF'</span><span style="color: #007700">]}</span><span style="color: #DD0000">?jettyPosition=</span><span style="color: #007700">{</span><span style="color: #0000BB">$val1</span><span style="color: #007700">}</span><span style="color: #DD0000">'&gt;</span><span style="color: #0000BB">$val1</span><span style="color: #DD0000">&lt;/a&gt;&lt;/td&gt;"</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;else&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"&lt;td&gt;</span><span style="color: #0000BB">$val1</span><span style="color: #DD0000">&lt;/td&gt;"</span><span style="color: #007700">;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br />&nbsp;&nbsp;&nbsp;&nbsp;}<br />&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"&lt;/tr&gt;"</span><span style="color: #007700">;<br />}<br />echo&nbsp;</span><span style="color: #DD0000">"&lt;/table&gt;"</span><span style="color: #007700">;<br /></span>
</span>
</code></blockquote>
	</div>

	<p>Här följer kodstycket som genomför <code>UPDATE</code>-satsen.</p>

	<div class="tip">
	<h4>&nbsp; PHP-kod för att uppdatera en viss rad i tabellen.</h4>
	<p><blockquote class='code'><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br /></span><span style="color: #FF8000">//<br />//&nbsp;Was&nbsp;the&nbsp;form&nbsp;submitted?&nbsp;Then&nbsp;use&nbsp;form&nbsp;values&nbsp;to&nbsp;update&nbsp;the&nbsp;database&nbsp;table<br />//<br /></span><span style="color: #007700">if(isset(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">'update'</span><span style="color: #007700">]))&nbsp;{<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//&nbsp;Add&nbsp;all&nbsp;form&nbsp;entries&nbsp;to&nbsp;an&nbsp;array<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$boat</span><span style="color: #007700">[]&nbsp;=&nbsp;</span><span style="color: #0000BB">strip_tags</span><span style="color: #007700">(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"boatType"</span><span style="color: #007700">]);<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$boat</span><span style="color: #007700">[]&nbsp;=&nbsp;</span><span style="color: #0000BB">strip_tags</span><span style="color: #007700">(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"boatEngine"</span><span style="color: #007700">]);<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$boat</span><span style="color: #007700">[]&nbsp;=&nbsp;</span><span style="color: #0000BB">strip_tags</span><span style="color: #007700">(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"boatLength"</span><span style="color: #007700">]);<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$boat</span><span style="color: #007700">[]&nbsp;=&nbsp;</span><span style="color: #0000BB">strip_tags</span><span style="color: #007700">(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"boatWidth"</span><span style="color: #007700">]);<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$boat</span><span style="color: #007700">[]&nbsp;=&nbsp;</span><span style="color: #0000BB">strip_tags</span><span style="color: #007700">(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"ownerName"</span><span style="color: #007700">]);<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$boat</span><span style="color: #007700">[]&nbsp;=&nbsp;</span><span style="color: #0000BB">strip_tags</span><span style="color: #007700">(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"jettyPosition"</span><span style="color: #007700">]);&nbsp;</span><span style="color: #FF8000">//&nbsp;Must&nbsp;come&nbsp;in&nbsp;the&nbsp;right&nbsp;order&nbsp;as&nbsp;the&nbsp;?-marks&nbsp;below<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$jettyPosition&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">strip_tags</span><span style="color: #007700">(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"jettyPosition"</span><span style="color: #007700">]);<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$stmt&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$db</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">prepare</span><span style="color: #007700">(</span><span style="color: #DD0000">"UPDATE&nbsp;Jetty&nbsp;SET&nbsp;boatType=?,&nbsp;boatEngine=?,&nbsp;boatLength=?,&nbsp;boatWidth=?,&nbsp;ownerName=?&nbsp;WHERE&nbsp;jettyPosition=?"</span><span style="color: #007700">);<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$stmt</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">execute</span><span style="color: #007700">(</span><span style="color: #0000BB">$boat</span><span style="color: #007700">);<br />&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"&lt;p&gt;Updated&nbsp;boat&nbsp;with&nbsp;jettyPosition&nbsp;=&nbsp;</span><span style="color: #0000BB">$jettyPosition</span><span style="color: #DD0000">.&nbsp;Rowcount&nbsp;is&nbsp;=&nbsp;"&nbsp;</span><span style="color: #007700">.&nbsp;</span><span style="color: #0000BB">$stmt</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">rowCount</span><span style="color: #007700">()&nbsp;.&nbsp;</span><span style="color: #DD0000">"&lt;/p&gt;"</span><span style="color: #007700">;<br />}<br /></span>
</span>
</code></blockquote>
	</div>
	
	<p>Om knappen för att uppdatera har tryckts så sker ovanstående kodstycke. Först skapas en array
	med båtens värden. Jag sparar undan 'jettyPosition', den behöver jag när jag läser upp den aktiva raden
	från databasen. Därefter skapas SQL-satsen för att exekveras med arrayen som argument.<p>
	
	<p>Jag använder variablen <code>$jettyPosition</code> för att hålla koll på vilken båt som skall
	visas. Variabeln kan få sitt värde från GET-variabeln eller från POST när formuläret postas. Första gången 
	som användaren kommer till sidan så är variabeln satt till <code>null</code>. Koden för att läsa in 
	en rad från databasen följer.</p> 

<div class="tip">
<h4>&nbsp; PHP-kod för att läsa in värden om den aktiva båten.</h4>
<p><blockquote class='code'><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br /></span><span style="color: #FF8000">//<br />//&nbsp;Is&nbsp;$jettyPosition&nbsp;set?&nbsp;Then&nbsp;reload&nbsp;it&nbsp;from&nbsp;the&nbsp;database.<br />//<br /></span><span style="color: #007700">if(isset(</span><span style="color: #0000BB">$jettyPosition</span><span style="color: #007700">))&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$stmt&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$db</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">prepare</span><span style="color: #007700">(</span><span style="color: #DD0000">"SELECT&nbsp;*&nbsp;FROM&nbsp;Jetty&nbsp;WHERE&nbsp;jettyPosition&nbsp;=&nbsp;?"</span><span style="color: #007700">);<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$stmt</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">execute</span><span style="color: #007700">(array(</span><span style="color: #0000BB">$jettyPosition</span><span style="color: #007700">));<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$res&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$stmt</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">fetchAll</span><span style="color: #007700">(</span><span style="color: #0000BB">PDO</span><span style="color: #007700">::</span><span style="color: #0000BB">FETCH_ASSOC</span><span style="color: #007700">);<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #FF8000">//echo&nbsp;"&lt;pre&gt;",&nbsp;print_r($res,&nbsp;false),&nbsp;"&lt;/pre&gt;";<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$boat&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$res</span><span style="color: #007700">[</span><span style="color: #0000BB">0</span><span style="color: #007700">];&nbsp;<br />}<br /></span>
</span>
</code></blockquote>
</div>

	<p>Nu innehåller <code>$boat</code> båtens värden och de skrivs sedan ut i formuläret.</p>

<div class="tip">
<h4>&nbsp; PHP-kod för att läsa in värden om den aktiva båten.</h4>
<p><blockquote class='code'><code><span style="color: #000000">
&lt;form&nbsp;method=post&nbsp;action="<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">$_SERVER</span><span style="color: #007700">[</span><span style="color: #DD0000">'PHP_SELF'</span><span style="color: #007700">];&nbsp;</span><span style="color: #0000BB">?&gt;</span>"&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;fieldset&nbsp;style="width:300px;"&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;legend&gt;Add&nbsp;boat&lt;/legend&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt;&lt;label&gt;jettyPosition:&nbsp;&lt;input&nbsp;type=number&nbsp;name=jettyPosition&nbsp;value="<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">$boat</span><span style="color: #007700">[</span><span style="color: #DD0000">'jettyPosition'</span><span style="color: #007700">];&nbsp;</span><span style="color: #0000BB">?&gt;</span>"&gt;&lt;/label&gt;&lt;/p&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt;&lt;label&gt;boatType:&nbsp;&lt;input&nbsp;type=text&nbsp;name=boatType&nbsp;value="<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">$boat</span><span style="color: #007700">[</span><span style="color: #DD0000">'boatType'</span><span style="color: #007700">];&nbsp;</span><span style="color: #0000BB">?&gt;</span>"&gt;&lt;/label&gt;&lt;/p&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt;&lt;label&gt;boatEngine:&nbsp;&lt;input&nbsp;type=text&nbsp;name=boatEngine&nbsp;value="<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">$boat</span><span style="color: #007700">[</span><span style="color: #DD0000">'boatEngine'</span><span style="color: #007700">];&nbsp;</span><span style="color: #0000BB">?&gt;</span>"&gt;&lt;/label&gt;&lt;/p&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt;&lt;label&gt;boatLength:&nbsp;&lt;input&nbsp;type=number&nbsp;name=boatLength&nbsp;value="<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">$boat</span><span style="color: #007700">[</span><span style="color: #DD0000">'boatLength'</span><span style="color: #007700">];&nbsp;</span><span style="color: #0000BB">?&gt;</span>"&lt;/label&gt;&lt;/p&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt;&lt;label&gt;boatWidth:&nbsp;&lt;input&nbsp;type=number&nbsp;name=boatWidth&nbsp;value="<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">$boat</span><span style="color: #007700">[</span><span style="color: #DD0000">'boatWidth'</span><span style="color: #007700">];&nbsp;</span><span style="color: #0000BB">?&gt;</span>"&gt;&lt;/label&gt;&lt;/p&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt;&lt;label&gt;ownerName:&nbsp;&lt;input&nbsp;type=text&nbsp;name=ownerName&nbsp;value="<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">$boat</span><span style="color: #007700">[</span><span style="color: #DD0000">'ownerName'</span><span style="color: #007700">];&nbsp;</span><span style="color: #0000BB">?&gt;</span>"&gt;&lt;/label&gt;&lt;/p&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt;&lt;input&nbsp;type=submit&nbsp;name="update"&nbsp;value="Update&nbsp;boat"&gt;&lt;/p&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&lt;/fieldset&gt;<br />&lt;/form&gt;<br /></span>
</code></blockquote>
</div>

	<p>Det blev en del kod, men nu har vi ett skript som kan göra ändringar i databasen med
	<code>UPDATE</code>.

	<p><span class="uppg">[UPPGIFT]</span>

	<p>Skapa en fungerande sida utifrån ovanstående koddelar. Lägg till det som du ev. tycker saknas.</p>

	<p>Nu börjar vi närma oss slutat av denna guide.</p>

</section>


<!-- - - - - - - - - - - - - - - - - - section       - - - - - - - - - - - - - - - - - -->
<section id='s19'> 
	<h3>19. Ta bort rader i tabellen med <code>DELETE</code><span class='nav-section right'><a href='#s19' title='Direktlänk till denna sektionen'>&crarr;</a><a href='#start' title='Gå till toppen på sidan'>&uarr;</a></span></h3>	
	<p>Slutligen skall vi då uppdatera skriptet för att ta bort en rad. Först kan du kort läsa
	om <a href="http://www.sqlite.org/lang_delete.html">SQL-satsen <code>DELETE</code> på www.sqlite.org</a>.</p>
	
	<p>Vi utgår från skriptet <code>update.php</code> och skapar ett nytt skript <code>delete.php</code>. 
	Vi lägger till en knapp "Delete" och kod för att radera båten. Användaren väljer först en båt 
	och därefter kan båten rades med ett klick på knappen. Själva koden som utför
	aktionen följer.</p>

	<div class="tip">
	<h4>&nbsp; PHP-kod för att läsa in värden om den aktiva båten.</h4>
	<p><blockquote class='code'><code><span style="color: #000000">
<span style="color: #0000BB">&lt;?php<br /></span><span style="color: #FF8000">//<br />//&nbsp;Was&nbsp;the&nbsp;form&nbsp;submitted&nbsp;for&nbsp;delete?&nbsp;Then&nbsp;delete&nbsp;this&nbsp;boat<br />//<br /></span><span style="color: #007700">if(isset(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">'delete'</span><span style="color: #007700">]))&nbsp;{<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$stmt&nbsp;</span><span style="color: #007700">=&nbsp;</span><span style="color: #0000BB">$db</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">prepare</span><span style="color: #007700">(</span><span style="color: #DD0000">"DELETE&nbsp;FROM&nbsp;Jetty&nbsp;WHERE&nbsp;jettyPosition=?"</span><span style="color: #007700">);<br />&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color: #0000BB">$stmt</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">execute</span><span style="color: #007700">(array(</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">"jettyPosition"</span><span style="color: #007700">]));<br />&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;</span><span style="color: #DD0000">"&lt;p&gt;Deleted&nbsp;boat&nbsp;with&nbsp;jettyPosition&nbsp;=&nbsp;</span><span style="color: #007700">{</span><span style="color: #0000BB">$_POST</span><span style="color: #007700">[</span><span style="color: #DD0000">'jettyPosition'</span><span style="color: #007700">]}</span><span style="color: #DD0000">.&nbsp;Rowcount&nbsp;is&nbsp;=&nbsp;"&nbsp;</span><span style="color: #007700">.&nbsp;</span><span style="color: #0000BB">$stmt</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">rowCount</span><span style="color: #007700">()&nbsp;.&nbsp;</span><span style="color: #DD0000">"&lt;/p&gt;"</span><span style="color: #007700">;<br />}<br /></span>
</span>
</code></blockquote>
	</div>
	
	
	<p>Sådär, denna gången blev det inte mycket kod, vi kunde bygga vidare på den strukturen som fanns.
	Ibland har man tur.</p>

	<p><span class="uppg">[UPPGIFT]</span>

	<p>Skapa en fungerande sida som kan radera en båt.
	
</section>


<!-- - - - - - - - - - - - - - - - - - section       - - - - - - - - - - - - - - - - - -->
<section id='s20'> 
	<h3>20. Avslutningsvis<span class='nav-section right'><a href='#s20' title='Direktlänk till denna sektionen'>&crarr;</a><a href='#start' title='Gå till toppen på sidan'>&uarr;</a></span></h3>		
		<p>Detta var en introduktion till SQLite och hur du kan använda SQLite som databas tillsammans med 
		PHP och PDO. Du har nu fått grunderna i att bygga en webbapplikation tillsammans med en databas, 
		det som kvarstår är övning och träning, och en del läsande i manualerna.</p>
		
		<p>De manualer du har mest nytta av är:</p>
		
<blockquote class="links"><a href='http://php.net/manual/en/book.pdo.php'>PHP manualen för PDO</a>.<br/><a href='http://www.sqlite.org/docs.html'>Manualen för SQLite</a>.<br/></blockquote>		<p>Det du har fått med dig från denna guiden kan dock ta dig en bit på vägen.
		Bra jobbat och lycka till med ditt databasande!</p>

</section>

<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 


</article>
	

	




