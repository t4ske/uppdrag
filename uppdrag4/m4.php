<article>
<h1>Moment 4: Stilväljare</h1>

<h2>1. En stylesheet-väljare med PHP och sessioner</h2>

<h3>1.1 En stylesheet-väljare</h3>

<p>Vi har tidigare gått igenom ett antal konstruktioner som via CSS och stylesheeten 
kan förändra utseendet på en webbplats. Ibland händer det att man snabbt vill visa och 
jämföra olika stylesheets, i de fallen är det bra att dynamiskt kunna välja vilken stylesheet 
som skall användas. Låt oss göra en sådan stylesheet-väljare med PHP.

<p>Hur skall stylesheet väljaren fungera?

<p>Stylesheetväljaren skall ha ett formulär där man kan välja mellan de stylesheets som finns på webbplatsen. 
Via formuläret bestämmer man vilken stylesheet som skall användas. 
Den valda stylesheeten lagras i sessionen. Om man inte valt någon stylesheet så används webbplatsens 
standard stylesheet.

<p>Hur löser man detta? <a href="demo/style.php?p=choose-stylesheet">Pröva min lösning</a> och fundera lite på hur det fungerar.

<p>Då är det dags för dig att göra en egen stylesheet-väljare. Du kan följa hur jag gjorde nedan, 
eller så försöker du på egen hand. Din lösning behöver inte vara exakt som min, har du en alternativ lösning 
så går det också bra.

<p><span class="uppg">[UPPGIFT]</span>

<p>Gör en stylesheet-väljare enligt ovan. Den skall synas i menyn och den skall vara gjord som en multi-sida.

<p>Gör på egen hand eller följ mig. Även om du gör på egen hand så bör du läsa igenom hur jag gjorde, 
det kommer dyka upp ett par nya tekniker i min lösning.

<p>Så här gjorde jag.

<h3>1.2 Välj vilken stylesheet som används i header.php</h3>

<p>Jag bestämde mig för att lagra filnamnet på stylesheeten i sessionen. I filen incl/header.php 
kollar jag om sessionsvariabeln är satt, isåfall använder jag den för att välja stylesheet, 
annars behåller jag sidans ursprungliga stylesheet. Följande kod hjälper mig att lösa detta.

<p>incl/header.php:

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="php geshi"><p>&lt;!-- links to external stylesheets --&gt;
<span class="kw2">&lt;?php</span> <span class="kw1">if</span><span class="br0">(</span><a href="http://www.php.net/isset"><span class="kw3">isset</span></a><span class="br0">(</span><span class="re0">$_SESSION</span><span class="br0">[</span><span class="st_h">'stylesheet'</span><span class="br0">]</span><span class="br0">)</span><span class="br0">)</span><span class="sy0">:</span> <span class="sy1">?&gt;</span>
 &lt;link rel="stylesheet" href="style/<span class="kw2">&lt;?php</span> <span class="kw1">echo</span> <span class="re0">$_SESSION</span><span class="br0">[</span><span class="st_h">'stylesheet'</span><span class="br0">]</span><span class="sy0">;</span> <span class="sy1">?&gt;</span>"&gt;        
<span class="kw2">&lt;?php</span> <span class="kw1">else</span><span class="sy0">:</span> <span class="sy1">?&gt;</span>
 &lt;link rel="stylesheet" href="style/stylesheet.css" title="General stylesheet"&gt;
 &lt;link rel="alternate stylesheet" href="style/debug.css" title="Debug stylesheet"&gt;
<span class="kw2">&lt;?php</span> <span class="kw1">endif</span><span class="sy0">;</span> <span class="sy1">?&gt;</span></pre>
</div>

<h3>1.3 Gör multisida med switch-case</h3>

<p>Jag gör en ny multisida, style.php, där tänker jag skapa formuläret som byter stylesheet.

<p>En multisida kan bli stor, speciellt tänker jag då på if-satsen som väljer vilken undersida som skall visas. 
Ett alternativ till if-satsen är en switch-case-sats. Denna gången väljer jag att använda en sådan istället.

<p>Läs om kontrollstrukturen switch i manualen.
<a href="http://php.net/manual/en/control-structures.switch.php">
http://php.net/manual/en/control-structures.switch.php</a>

<p>Studera switch-satsen <a href="demo/viewsource.php?dir=&amp;file=style.php">i min källkod för style.php</a>.

<p>Vilket är bäst, if eller switch? 
Det beror på, lär dig både så kommer du märka när den ena eller andra passar bäst.

<h3>1.4 Formulär som visar alla stylesheets</h3>

<p>I multi-sidan gör jag en sida som visar ett formulär med en select-option-lista.
I listan visar jag alla filer som ligger under katalogen style/, det är de filer som jag betraktar 
som valbara stylesheets.

<p>Jag använder en ny funktion från <a href="demo/viewsource.php?dir=php&amp;file=common.php">
php/common.php</a>, funktionen heter readDirectory() 
och den läser in alla filer i en katalog och lagrar dem i en array. En array, 
på samma sätt som $_GET, $_POST och $_SESSION är arrayer.

<p>Jag använder loop-konstruktionen, foreach(), för att gå igenom alla värden i arrayen. 
På det viset kan jag översätta arrayens innehåll till en select-option-lista som går att visa i formuläret.

<p>Läs i manualen om foreach <a href="http://php.net/manual/en/control-structures.foreach.php">
http://php.net/manual/en/control-structures.foreach.php</a>


<p>Källkoden till själva sidan, <a href="demo/viewsource.php?dir=style_parts&amp;file=choose_stylesheet.php">
style_parts/choose_stylesheet.php hittar du här</a>.

<h3>1.5 En processing-sida för formuläret</h3>

<p>Jag valde att posta formuläret till en speciell processing-sida, style_parts/choose_stylesheet_process.php. 
Tanken är att ha en sida som enbart fokuserar på att processa resultatet av formuläret. När processingen är 
klar så görs en redirect tillbaka till formulärsidan. Detta är ett vanligt sätt att hantera processing av 
formulär.

<p><img src="img/process.png">

<p>Koden som gör det möjligt att skicka (hoppa fram å tebax) mellan dessa sidor är kodraderna nedan.

<p>Hoppet till den sida som ska processa formuläret (från style_parts/choose_stylesheet.php):

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="html4strict geshi"><p><span class="sc2">&lt;<a href="http://december.com/html/4/element/form.html"><span class="kw2">form</span></a> <span class="kw3">method</span><span class="sy0">=</span><span class="st0">"post"</span> <span class="kw3">action</span><span class="sy0">=</span><span class="st0">"?p=choose-stylesheet-process"</span>&gt;</span></pre>
</div>

<p>Hoppet tillbaka till ursprungssidan (från style_parts/chose_stylesheet_process):

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="php geshi"><p><a href="http://www.php.net/header"><span class="kw3">header</span></a><span class="br0">(</span><span class="st0">"Location: http://<span class="es4">$host</span><span class="es4">$uri</span>/<span class="es4">$extra</span>"</span><span class="br0">)</span><span class="sy0">;</span></pre>
</div>

<p>Studera källkoden till det två sidorna ovan för att få kläm på hur det fungerar.

<p>En fördel med att använda processingsidor är att strukturera koden bättre. 
En annan fördel är att man slipper inforutan 
som visas när man gör reload på en sida som är ett postat formulär.

<p><img src="img/resend.png">

<h3>1.6 Sammanfattningsvis</h3>

<p>Bra jobbat, då har vi en stylesheetväljare. Då kan vi börja använda den.

<p><span class="uppg">[UPPGIFT]</span>

<p>Gör fem olika stylesheets:

<ol>
<li>En tom stylesheet som inte innehåller någon stil. Döp den till empty.css. Använd den och se om din webbplats fortfarande är läsbar.
<li>En ren stylesheet, knappt någon stylning, vit, grå och svart. Så lite CSS-kod som möjligt. Det blir helt enkelt en stylesheet att utgå ifrån när du bygger nya webbplatser.</li>
<li>En cool stylesheet, gör en riktigt cool stylesheet. Välj själv vad du tycker är coolt. Riktigt konstnärligt kanske eller tvärtom?</li>
<li>En färgglad stylesheet i blått/rött/grönt/gult. Välj ett färgtema och håll dig till det.</li>
<li>“Jag har en bättre idé”. Bra, gör då en stylesheet enligt din egna idé.</li>
</ol>
 
<p>Se till att dina stylesheets fungerar i stylesheet-väljaren.

<p><span class="uppg">[UPPGIFT]</span>

<p>Kontrollera att din me-sida och alla css-filer validerar.

<h2>2. Avslutningsvis</h2>

<p>Har du tid över? Då kan det vara bra att lägga den tiden på att städa upp i din stylesheets. 
Rensa, städa och strukturera. Testa och lek med CSS.Annars nöjer vi oss med detta, för denna gången.

<h3>2.1 Skriv redovisning</h3>
<p>Skriv redovisningen på din report-sida. 
Skriv ett stycke (ca 15 meningar) om hur momentet funkade. 
Reflektera över svårigheter, problem, lösningar och resultat. 
Börjar du känna att du bemästrar CSS? Beskriv hur väl du kan CSS (nybörjare, erfaren). 
Vad tycker du om CSS så här långt in i kursen? 
Lyckades du med din style-väljare? 
Hur tänkte du när du gjorde din extra stylesheet och vad blev resultatet? 
Hur går det med ditt PHP:ande?

<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 


</article>	