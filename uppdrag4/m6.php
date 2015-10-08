<article>
<h1>Moment 6: Databaser och blocket v.2</h1>

<p>Detta moment handlar om databasen SQLite och hur du kan använda den tillsammans med PHP. 
Momentet består dels av en guide som hjälper dig att komma igång med SQLite, SQLite Manager och SQL. 
Guiden visar dig även de vanligaste konstruktionerna i PHP PDO för att skapa tabeller, lägga till värden, 
uppdatera, ta bort och läsa.

<p>Efter att ha gått igenom guiden så uppdaterar du Blokket till Blokket2, en uppdatering där Blokket2 
lagrar alla annonser med databasen SQLite istället för vanliga filer.

<p>Förbered dig för en övning med SQL och PHP. Om du är nybörjare på PHP och/eller SQL så kan detta 
moment vara omfattande. Ta det bara lugnt och gå igenom det steg för steg så ska det lösa sig. 
Det är ok att kopiera kod. Lycka till!

<h2>1. SQLite, PHP och PDO</h2>

<h3>1.1 Inledning</h3>

<p>SQLite är en filbaserad databas. Det innebär att hela databasen ryms i en fil på disk. 
Tillsammans med ett bibliotek med funktioner, ett API för SQLite databasfiler, kan man utföra 
operationer med frågespråket SQL mot databasfilerna. PHP har integrerat detta API och det har även 
SQLite Manager som är en fönsterbaserad klient, en Firefox plugin, som låter dig jobba med och 
administrera SQLite databasfiler.

<h3>1.2 Varför välja SQLite</h3>

<p>En filbaserad databas är enkel att jobba med, ingen server som behöver användare eller konton. 
Enkelt och smidigt att kopiera mellan datorer. Enkel hantering. Enkel att supporta, 
“skicka mig databas-filen så kollar jag!”

<p>Framförallt är det en komplett databas med stöd för de vanliga SQL-konstruktionerna. 
I din vertygslåda som webbutvecklare så är SQLite ett utmärkt verktyg. En enkel databas, 
kraftfull med SQL och enkel att hantera. Lämpar sig bra till små och mindre webbplatser.

<h3>1.3 Varför välja PHP Data Objects (PDO)</h3>

<p>Det finns olika sätt att koppla sig mot en databas från PHP. I detta exemplet kommer vi att jobba med 
PHP PDO och prepared statements.

<p>PDO är ett generellt abstraktionslager som gäller för flera databaser. Har man en gång lärt sig 
att använda PDO så blir det enklare att använda även andra databaser från PHP. Optimalt så får man 
även kod som är lätt att portera (återanvända) till andra databaser.

<p>PDO och prepared staments är säkert och vi får hjälp med att skydda vår webbapplikation från SQL Injections.

<p>PHP PDO är ytterligare ett bra och relevant verktyg i webbutvecklarens verktygslåda.

<h3>1.4 Guiden “20 steg för att komma igång med SQLite”</h3>

<p>Låter det krångligt? Ingen fara. Du börjar med att jobba igenom guiden 
“20 steg för att komma igång med SQLite”. Den leder dig steg för steg in i databasvärlden. 
Den börjar med att visa hur du jobbar mot databasfilerna med adminverktyget SQLite Manager. 
Därefter visas hur du integrerar PHP PDO och SQLite databaser.

<p>Därefter är du redo att uppdatera ditt Blokket med stöd för databaser.

<p>Då kör vi.

<p><span class="uppg">[UPPGIFT]</span>

<p>Börja att gå igenom guidens 20 steg. Gör dina egna kodexempel, kopiera eller skriv om. 

<p>Det är viktigt att du får exemplen att fungera i din egna miljö. Det är det du lär dig av.

<p>&nbsp;</p>

<div class="tip">
<h4>&nbsp; Guiden 20 steg till SQLite:</h4>
<p><a href="?sida=20stegsqlite.php">Här hittar du guiden "20 steg för att komma igång med SQLite"</a>
</div>

<p>&nbsp;</p>

<p>När du är klar med guiden så fortsätter vi med en databasuppgradering av Blokket, resultatet blir Blokket2.

<h2>2. Blokket2 med stöd för databaser</h2>

<h3>2.1 Inledning</h3>

<p>Vi skall nu göra Blokket med databasen SQLite istället för filer. 
Annonserna skall lagras i databasen istället för på fil. Bilderna låter vi dock ligga kvar på disk.

<p><span class="uppg">[UPPGIFT]</span>

<p>Försök på egen hand och se hur långt vingarna bär, eller följ mina steg.

<h3>2.2 Kom igång</h3>

<ol>
<li><p>Jag kopierar hela Blocket exemplet till ett nytt exempel, Blocket2.</p></li>
<li><p>Jag tar en kopia av filen <code>blocket.php</code> och döper den till <code>blocket2.php</code>.</p></li>
<li><p>Jag kopierar katalogen <code>incl/blocket</code> och döper den till <code>incl/blocket2</code>.</p></li>
<li><p>Jag lägger till så att Blokket2 syns i menyn och jag uppdaterar <code>incl/blocket2/default.php</code> med en liten välkomsthälsning.</p></li>
</ol>

<p>Det är bra att ha kod att utgå ifrån, det gör saker lättare. Se till att alltid sparar all kod du gör, 
i denna kursen och i andra projekt. Skapa ditt eget bibliotek med återanvändbar kod. 
Det är ett bra sätt att utveckla, det sparar tid.

<p><span class="uppg">[UPPGIFT]</span>
<p>Skapa nu din version.

<h3>2.3 Initiera databasen</h3>

<p>Nästa steg är att initiera databasen genom att skapa databasfilen (om den inte finns), 
skapa tabellen (om den inte finns), radera innehållet i tabellen (om det finns) och sedan 
lägga till ett par annonser som exempel.

<p>Vi gjorde en liknande sak i guiden SQLite20, jag kan använda principerna från 
<a href="?sida=20stegsqlite.php#s16">det exemplet</a>.

<p>Jag ändrar i skriptet som hanterar kontrollerna om allt är uppsatt korrekt och jag lägger 
till ett extra skript som innehåller kod för att initiera databasen.

<p>Så här blev det för mig:

<p><div class="wrap"><iframe src="demo/blokket2.php?p=init" scrolling="no"></iframe></div>

<p>Själva initieringen sköts från filen 
<a href="demo/viewsource.php?dir=blokket_parts2&amp;file=init_database.php">init_database.php</a>.
Där använder jag en tabell ads som har fyra kolumner:

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="sql geshi"><p><span class="kw1">CREATE</span> <span class="kw1">TABLE</span> <span class="kw1">IF</span> <span class="kw1">NOT</span> <span class="kw1">EXISTS</span> Ads
<span class="br0">(</span>
  id <span class="kw1">INTEGER</span> <span class="kw1">PRIMARY</span> <span class="kw1">KEY</span> <span class="kw1">NOT</span> <span class="kw1">NULL</span> <span class="kw1">UNIQUE</span><span class="sy0">,</span> 
  title TEXT<span class="sy0">,</span> 
  description TEXT<span class="sy0">,</span> 
  image TEXT
 <span class="br0">)</span>;</pre>
</div>

<p>Känns det rimligt? Vi fortsätter så får vi se.

<p><span class="uppg">[UPPGIFT]</span>
<p>Skapa nu din version.

<h3>2.4 Uppdatera annons</h3>

<p>Nästa steg blir att uppdatera informationen om en annons. Jag utgår från filen incl/blokket2/update.php. 
Tanken är att kunna välja bland alla annonser och uppdatera informationen om dem.

<p>Vi gjorde en liknande sak i guiden SQLite20, jag kan använda principerna från 
<a href="?sida=20stegsqlite.php#s18">det exemplet</a>.

<p>Efter att ha uppdaterat koden så blev resultatet följande:

<p><div class="wrap"><iframe src="demo/blokket2.php?p=update" scrolling="no"></iframe></div>

<p>Alla annonser finns i select-listan, när man valt ett objekt i listan så visas annonsens värden 
i formuläret. Det går att uppdatera informationen och när man klickar “Spara” så sparas informationen 
i databasen.

<p>I formuläret använder jag ett hidden fält för att skicka med id på den annons som skall sparas. 
Jag kunde egentligen använt id som fanns i select-listan. Men, det fick bli ett exempel på hidden 
fält som är ett vanligt sätt att skicka med dold information i ett formulär.

<p><span class="uppg">[UPPGIFT]</span>
<p>Skapa nu din version.

<h3>2.5 Lägg till annons</h3>

<p>Vi gjorde en liknande sak i guiden SQLite20, jag kan använda principerna från 
<a href="?sida=20stegsqlite.php#s17">det exemplet</a>.

<p>Så här blev resultatet:

<p><div class="wrap"><iframe src="demo/blokket2.php?p=new" scrolling="no"></iframe></div>

<p>Om vi studerar koden och jämför med filhanteringen så ser vi att det inte blir mer 
kod för att vi använder en databas, snarare tvärtom, det blir mindre kod med databaser.

<p><span class="uppg">[UPPGIFT]</span>
<p>Skapa nu din version.



<h3>2.6 Ta bort annons</h3>

<p>Nu skall jag fixa så att det går att radera en artikel ifrån databasen.

<p>Vi gjorde en liknande sak i guiden SQLite20, jag kan använda principerna från 
<a href="?sida=20stegsqlite.php#s19">det exemplet</a>.

<p>Så här blev det.

<p><div class="wrap"><iframe src="demo/blokket2.php?p=delete" scrolling="no"></iframe></div>

<p>Bra igen. Jag kunde återanvända strukturen ifrån fallet “Skapa ny annons”,
det krävdes inte så mycket ändringar den här gången heller.

<p><span class="uppg">[UPPGIFT]</span>
<p>Skapa nu din version.

<h3>2.7 Visa en annons</h3>

Då tar jag tag i blokket_parts2/show.php. Tanken är att visa innehållet i en annons.

Vi gjorde en liknande sak i guiden SQLite20, jag kan använda principerna från 
<a href="?sida=20stegsqlite.php#s14">det exemplet</a>.

<p>Så här blev det när det är klart.

<p><div class="wrap"><iframe src="demo/blokket2.php?p=show" scrolling="no"></iframe></div>

<p>Fint. Det känns som det blir mindre och mindre kod att skriva, det är bra. 
Ju mer kod vi skrivit desto mer har vi att kopiera av.

<p><span class="uppg">[UPPGIFT]</span>
<p>Skapa nu din version.


<h3>2.8 Visa alla annonser</h3>

<p>Då tar vi den sista delen också.

<p>Filen som gäller är blokket_parts2/show-all.php. Jag vill visa alla annonser i en tabell.

<p>Vi gjorde en liknande sak i guiden SQLite20, jag kan använda principerna från 
<a href="?sida=20stegsqlite.php#s14">det exemplet</a>.

<p>Så här blev det när det är klart.

<p><div class="wrap"><iframe src="demo/blokket2.php?p=show-all" scrolling="no"></iframe></div>

<p><span class="uppg">[UPPGIFT]</span>
<p>Skapa nu din version.

<p>Bra kämpat! Där har vi nu ett Blokket2 i en databas. 
Om jag får säga så tycker jag koden blev bättre med databasen än med filhanteringen. 
Nu kan vi iallfall hantera både och.

<h2>3. Avslutningsvis</h2>

<p>Då hoppas jag att du lärt dig en del om SQLite och hur du kan använde PHP PDO för att 
jobba mot databasen. Ett par nya verktyg till din verktygslåda som webbutvecklare.

<p>Det finns mycket mer att lära om databaser och SQL men detta får räcka för detta uppdrag. 
Det är en liten provsmakning av databasvärlden och du kan faktiskt komma långt med det du lärt 
här.

<h3>3.1 Testa och validera</h3>

<p><span class="uppg">[UPPGIFT]</span>

<p>Överför ditt jobb till den skarpa servern. Testa att allt fungerar som det skall. 
Kom ihåg att ändra chmod där det behövs. 

<p>Se till så att alla dina sidor validerar.

<h3>3.2 Redovisning</h3>

<p><span class="uppg">[UPPGIFT]</span>

<p>Skriv redovisningen på din report-sida. Skriv ett stycke (ca 15 meningar) om hur momentet funkade. 
Reflektera över svårigheter, problem, lösningar och resultatet. 
Vad tycker du om databaser och SQLite? 
Hur gick guiden sqlite20 att genomföra? 
Hur gick det när du gjorde Blokket2? 
Lyckades du komma in i PHP och SQL-programmeringen? 
Är det svårt?



<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 


</article>	