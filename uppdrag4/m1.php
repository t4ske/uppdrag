<article>
<h1>Moment1: Bygg en grund med HTML, CSS och PHP</h1>

<p>
I detta moment skall skall du gå igenom ett par exempel på kodning i HTML, CSS och PHP och använda dessa
lärdomarna för att bygga en me-sida. Me-sidan är en enkel webbplats som innehåller en presentation av dig 
själv tillsammans med redovisningstexter för momenten.Vi bygger webbplatsen tillsammans, steg för steg. 
<strong>Vi försöker bygga en struktur som går att återanvända för att bygga fler webbplatser.</strong></p>

<p>Resultatet av hela momentet ska laddas upp till din portfolio. 
Det kan komma att se ut som följande bild visar (bilden är länkad):</p>
<a target="_blank" href="demo/me.php">
<img alt="bild som visar min lösning av uppdraget" src="img/demo.jpg" >
</a>

<p>När vi är klara med dagens övning så har du förhoppningsvis fått lite blodad tand på det som 
den här utbildningen handlar om. Tanken med övningen är att du skall få tillämpa de tekniker 
(HTML, CSS, PHP) som vi har jobbat med tidigare och få möjlighet att se hur de samverkar. 
I kommande moment tittar vi mer ingående på respektive teknik. Använd tid till både utveckla och till
att läsa på nätet eller i en bok om saker som du inte förstår. Se till att du får ett bra grepp om det hela!</p>

<p>Totalt beräknas studiemomentet omfatta ca 20 studietimmar. Du kan med fördel göra övningen i delar, 
2-3 timmar per gång kan vara bra. Läs gärna igenom hela momentet innan du börjar.

<h2>Webbresurser</h2>

<p>Dessa används i olika omfattning under momentet, använd dem som referens.<p>

<p>Wikipedia ger dig en översikt om HTML/HTML5 och CSS/CSS3.</p>

<a href="http://en.wikipedia.org/wiki/HTML">http://en.wikipedia.org/wiki/HTML</a><br/>
<a href="http://en.wikipedia.org/wiki/HTML_5">http://en.wikipedia.org/wiki/HTML_5</a><br/>
<a href="http://en.wikipedia.org/wiki/CSS">http://en.wikipedia.org/wiki/CSS</a><br/>
<a href="http://en.wikipedia.org/wiki/CSS3#CSS_3">http://en.wikipedia.org/wiki/CSS3#CSS_3</a><br/>
W3C driver standardiseringsarbetet. Ta en snabb titt på deras hemsida om webbdesign och applikationer.

<p><a href="http://www.w3.org/standards/webdesign/">http://www.w3.org/standards/webdesign/</a><br/>
W3C har referensmanualer. Lär dig att hitta i dem. De är din bästa källa till korrekt information.

<p>HTML5: <a href="http://dev.w3.org/html5/spec/spec.html">http://dev.w3.org/html5/spec/spec.html</a><br/>
CSS2: <a href="http://www.w3.org/TR/CSS2/">http://www.w3.org/TR/CSS2/</a><br/>
CSS3: <a href="http://www.w3.org/Style/CSS/current-work#CSS3">http://www.w3.org/Style/CSS/current-work#CSS3</a><br/>
W3C har ett “cheatsheet” som snabbt ger dig information om HTML och CSS tag. Testa det. Det sparar tid.
<a href="http://www.w3.org/2009/cheatsheet/">http://www.w3.org/2009/cheatsheet/</a><br/>

<p>W3C validatorerna är viktiga verktyg för en webbutvecklare.

<p>HTML validator: <a href="http://validator.w3.org/http://validator.w3.org/">http://validator.w3.org/http://validator.w3.org/</a><br/>
CSS validator: <a href="http://jigsaw.w3.org/css-validator/http://jigsaw.w3.org/css-validator/">http://jigsaw.w3.org/css-validator/http://jigsaw.w3.org/css-validator/</a><br/>
HTML &amp; CSS validator kombinerad: <a href="http://validator.w3.org/unicorn/">
http://validator.w3.org/unicorn/</a><br/>

<p>W3School har siter för HTML, CSS och PHP. De är enkla att använda för referens, 
men se upp ibland innehåller de fel!

<p><a href="http://www.w3schools.com/html">http://www.w3schools.com/html</a><br/>
<a href="http://www.w3schools.com/html5">http://www.w3schools.com/html5</a><br/>
<a href="http://www.w3schools.com/css">http://www.w3schools.com/css</a><br/>
<a href="http://www.w3schools.com/php/">http://www.w3schools.com/php/</a><br/>

<p>PHP’s referensmanual ger oss all information vi behöver om PHP. Lär dig använda sökfunktionen 
för att hitta rätt PHP-funktioner.<br>Manualen hittar du på <a href="http://php.net/manual/en/index.php">
http://php.net/manual/en/index.php</a><br>
Se speciellt avsnittet om att komma igång med PHP: 
<a href="http://php.net/manual/en/getting-started.php">http://php.net/manual/en/getting-started.php</a>

<p>Wikipedia om PHP<br/>
<a href="http://en.wikipedia.org/wiki/PHP">http://en.wikipedia.org/wiki/PHP</a><br/>

<p>&nbsp;</p>

<h1>Dags att börja jobba!</h1>

<p>Låt oss ta ett djupt andetag, kavla upp ärmarna och sätta igång.

<h2>1. HTML och CSS, PHP-skript och lite SQL</h2>

<p>Detta moment handlar om HTML och CSS men också om PHP. PHP på ett skriptsätt. Integrerat i HTML-koden. 
Vi kommer även att möta SQL och databaser. Vi lagrar viss information i databasen för att ge webbplatsen 
mer dynamik. Dessutom handlar det om struktur och ordning och reda. Allt för att bygga välstrukturerade 
webbplatser. En struktur som går att återanvända. En struktur som går att kopiera och använda 
som grund när vi skapar nya webbplatser.

<p>Ordning och reda, SQL, skriptbaserad PHP, och en rejäl genomgång av HTML och CSS. 
Det är ingredienserna till detta avsnitt.

<p><strong>Då kör vi!</strong>

<p>Läs hela detta dokument, uppifrån och ned. Gör det som det beskrivs, stycke för stycke. Så är tanken. 
vissa saker skall du själv koda, dessa benämns som <span class="orange" style="font-weight:bold;">[UPPGIFT]</span>. 	

<h2>2. Utvecklings- och driftmiljö</h2>

<p>Först och främst behöver du en miljö att jobba i. Utifall att du inte skulle ha det så måste du först fixa det.
 I denna kursen tänkte jag mig att vi jobbar mot en lokal miljö på våra egna datorer, 
 när vi är klara så laddar vi upp en kopia till en driftsmiljö (t4.skelamp.se). 
 Det är ett vanligt sätt (ett av flera) att jobba med webbplatser.

<span class="uppg">[UPPGIFT]</span>

<p>Om du du inte redan har gjort det: installera en egen lokal utvecklingsmiljö på din maskin.
Steg för detta finns nedan: 

<ol>
	<li>Installera webbläsare som <a href="https://www.google.com/chrome/browser/desktop/index.html">
	crome</a> och <a href="https://www.mozilla.org/sv-SE/firefox/new/">firefox</a></li>
	<li><a href="https://www.apachefriends.org/index.html">Installera webbserver</a> - du behöver inte installera MySQL om du inte vill, 
	i detta avsnitt kommer vi att använda SQLite som databas. MySQL används i senare uppdrag.</li>
	<li>Installera en editor elle IDE, som exempelvis 
	<a href="https://netbeans.org/downloads/index.html">NetBeans HTML &amp; PHP bundle</a>.</li>
	<li>Installera <a href="https://filezilla-project.org/download.php?type=client">filezilla</a> eller 
	winscp - så att du kan flytta filer från din lokala utvecklingsmiljö till driftsmiljön.</li>
</ol>

<p>Fint, då har vi en miljö för att utveckla och driftsätta webbplatser. 
Låt oss gå vidare och utveckla en enklare webbplats.

<h2>3. En webbplats om mig själv, en me-sida</h2>

<p>Vi skall skapa något som kan kallas för en me-sida. Me-sidan används för att presentera dig 
själv och för att redovisa delarna i detta moment. Låt oss börja med att skapa me-sidan, 
en webbplats om dig själv och för dina redovisningar.

<p>Vi skall skapa HTML-koden, en extern stylesheet med CSS samt strukturera sidorna med hjälp av PHP. 
Dessutom vill vi bekanta oss med validatorer som hjälper att kontrollera att HTML- och CSS-koden är 
korrekt skriven. Vi vill snygga till webbplatsen med en logo och en navigeringsmeny.

<p>En liten plan för detta blir alltså följande:

<ol>
	<li>HTML och validator (me.php)</li>
	<li>CSS och validator (me.php, stylesheet.css)</li>
	<li>Header med logo och meny</li>
	<li>PHP (header.php, footer.php)</li>
	<li>En sida för att beskriva vad du gjort i varje moment (report.php)</li>
	<li>Snygga till och gör färdigt</li>
</ol>

<p>Jobba med filerna lokalt och för sedan över den till driftsservern. När vi är klara med momentet
 så har du förhoppningsvis fått lite blodad tand på det som det här uppdraget handlar om.

 <h2>4. HTML och validator (me.php)</h2>

<p>Då sätter vi tänderna i första punkten på listan.

<ol>
	<li><strong>HTML och validator (me.php)</strong></li>
	<li>CSS och validator (me.php, stylesheet.css)</li>
	<li>Header med logo och meny</li>
	<li>PHP (header.php, footer.php)</li>
	<li>En sida för att beskriva vad du gjort i varje moment (report.php)</li>
	<li>Snygga till och gör färdigt</li>
</ol>

<h3>4.1 Grundstruktur med HTML</h3>

<p><span class="uppg">[UPPGIFT]</span>

<p>För att underlätta så startar vi med en grundstruktur för HTML-koden. 
Grundstrukturen baseras på HTML5 och vi håller den så enkel det går. Iallafall tills vidare.

<p>Skapa en tom sida, döp den till me.php. Fyll den med nedanstående kod:</div>

<div class="tip"><h4>&nbsp; Kod:</h4>
<pre class="bash geshi">
<span class="sc2">&lt;!doctype html&gt;</span>
<span class="sc2">&lt;<a href="http://december.com/html/4/element/html.html"><span class="kw2">html</span></a>&gt;</span>
<span class="sc2">&lt;<a href="http://december.com/html/4/element/head.html"><span class="kw2">head</span></a>&gt;</span>
  <span class="sc2">&lt;<a href="http://december.com/html/4/element/meta.html"><span class="kw2">meta</span></a> <span class="kw3">charset</span><span class="sy0">=</span><span class="st0">"utf-8"</span>&gt;</span>
  <span class="sc2">&lt;<a href="http://december.com/html/4/element/title.html"><span class="kw2">title</span></a>&gt;</span>Me-sidan<span class="sc2">&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/title.html"><span class="kw2">title</span></a>&gt;</span>
<span class="sc2">&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/head.html"><span class="kw2">head</span></a>&gt;</span>
<span class="sc2">&lt;<a href="http://december.com/html/4/element/body.html"><span class="kw2">body</span></a>&gt;</span>
  <span class="sc2">&lt;<a href="http://december.com/html/4/element/h1.html"><span class="kw2">h1</span></a>&gt;</span>htmlphp-me<span class="sc2">&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/h1.html"><span class="kw2">h1</span></a>&gt;</span>
  <span class="sc2">&lt;<a href="http://december.com/html/4/element/p.html"><span class="kw2">p</span></a>&gt;</span>Här kommer snart min egen fina me-sida.<span class="sc2">&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/p.html"><span class="kw2">p</span></a>&gt;</span>
  <span class="sc2">&lt;<a href="http://december.com/html/4/element/img.html"><span class="kw2">img</span></a> <span class="kw3">src</span><span class="sy0">=</span><span class="st0">"img/me.jpg"</span> <span class="kw3">alt</span><span class="sy0">=</span><span class="st0">"Bild på Urban Vikdahl"</span>&gt;</span>
<span class="sc2">&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/body.html"><span class="kw2">body</span></a>&gt;</span>        
<span class="sc2">&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/html.html"><span class="kw2">html</span></a>&gt;</span></pre>
</div>
<p>Använd denna grundstruktur när du gör dina sidor.

<p>Leta reda på en fin bild på dig själv (me.jpg) och lägg den i en underkatalog som du döper till img.

<p>Klar med det steget? -Bra. Då kan vi går vidare. Validerar sidan i validatorn tro?

<div class="tip">
<h4>Tips 1:</h4>

<p>Dubbelkolla att teckenkodningen för filen är satt till UTF8-NOBOM i din editor. 
Annars blir det problem med de svenska tecknen.
</div>

<div class="tip">
<h4 class="orange">Tips 2:</h4>

<p>Svenska eller engelska, eller svengelska?

<p>Normalt använder jag engelska när jag skriver kod, kommentarer, variabelnamn och filnamn. 
Eftersom me-siten blir på svenska så blir dock en del filnamn på svenska.

<p>Det kan tyckas att jag ibland blandar engelska och svenska. Det gör jag. 
Jag försöker dock tänka på att undvika svengelska i dokument och instruktioner. 
Hittar du fel i texten så får du gärna påpeka dem för mig. Jag försöker rätta dokumenten så fort jag kan. 
Allt för att hålla en bra nivå.
</div>

<h3>4.2 Validera enligt HTML5</h3>

<p><span class="uppg">[UPPGIFT]</span>

<p>För att kontrollera att det verkligen är HTML5 så kör vi den genom W3C’s HTML validator. 
Du når validatorn via följande länk.

<a href="http://validator.w3.org/#validate_by_input">http://validator.w3.org/#validate_by_input</a>

<p>Kopiera in din URL eller HTML-kod, klicka sedan på knappen och se vad som händer. Validerar din sida?

<p>Ser bra ut hos mig:

<img src="img/validhtml.png" alt="html grund validerar">

<p>Om du fick fel så ska du rätta till felen. 
Läs vad varningarna/felen betyder så får du ledtrådar till vad du behöver rätta till.

<h3>4.3 Länka till valideringsverktyget</h3>

<p><span class="uppg">[UPPGIFT]</span>

<p>För att förenkla framtida kontroller så lägger vi till en länk till validatorn, direkt i me-sidan. 
Det gör att vi hela tiden kan validera dokumentet med ett litet klick.

<p>Skapa en footer till me-sidan och lägg in länken till validatorn där. Följande kod löser det:

<div class="tip"><h4>&nbsp; Kod:</h4>
<pre class="bash geshi">
<code>  &lt;hr&gt;
  &lt;div id="footer"&gt;
    &lt;a href="http://validator.w3.org/check/referer"&gt;HTML5&lt;/a&gt;
  &lt;/div&gt;
&lt;/body&gt;
</code>
</pre>
</div>

<p>För att det skall fungera måste din sida ligga på en webbserver som är publikt tillgänglig. 
Annars kommer validatorn inte åt din sida. Testa genom att ladda upp din me-sida till driftsmiljön.

<p>Klicka på länken för att köra sidan i validatorn. Detta är ett mycket bra hjälpmedel. 
Kolla alltid med validatorn när du får problem. Det hjälper dig att hålla koll på din HTML-kod.

<h2>5. CSS och validator (me.php, stylesheet.css)</h2>

<p>Bra, då stryker vi en punkt på listan och tar raskt tag i nästa.

<ol>
	<li><s>HTML och validator (me.php)</s></li>
	<li><strong>CSS och validator (me.php, stylesheet.css)</strong></li>
	<li>Header med logo och meny</li>
	<li>PHP (header.php, footer.php)</li>
	<li>En sida för att beskriva vad du gjort i varje moment (report.php)</li>
	<li>Snygga till och gör färdigt</li>
</ol>

<h3>5.1 Styla me-sidan med CSS</h3>

<p><span class="uppg">[UPPGIFT]</span>

<p>Med CSS kan vi som du vet ge sidan färg och form. Vi kan styla HTML-elementen och bestämma 
var de skall visas på sidan och hur de skall se ut. CSS-koden lägger vi i en separat fil och 
länkar till den från HTML-koden.

<p>Skapa en katalog som heter style och en fil som heter stylesheet.css. Lägg din CSS-kod i den filen.
Om du vill kan du utgå ifrån följande enkla grund:

<div class="tip"><h4>&nbsp; Kod:</h4>
<pre class="bash geshi">
<code>
html {background: #777; padding:0;}
body {
  margin: 0 auto;
  padding: 10px;
  background: white;
  border: 1px solid #222;
  font-family:sans-serif;
  color: #333;
}
h1 {
  text-transform: uppercase;
  border-bottom: 4px double #333333;
}
</code>
</pre>
</div>

<p>Peka ut din stylesheet genom att lägga till följande kod i <head>-elementet i HTML-koden (me.php).

<div class="tip"><h4>&nbsp; Kod:</h4>
<pre class="bash geshi">
<code>
    &lt;link rel="stylesheet" href="style/stylesheet.css"&gt;
&lt;/head&gt;
</code>
</pre>
</div>

<p>Testa lokalt (i din utvecklingsmiljö) tills allt ser bra ut och du är riktigt nöjd!

<p>Visst kan man göra stor skillnad på första intrycket av en webbsida med en stylesheet och lite CSS-kod?

 <p>Ladda sedan upp allt till driftsmiljön.

<h3>5.2 Validering av CSS</h3>

<p><span class="uppg">[UPPGIFT]</span>

<p>W3C har en validator för CSS. Du når den via följande länk.

<a href="http://jigsaw.w3.org/css-validator/">http://jigsaw.w3.org/css-validator/</a>
Ladda upp din sida på driftsserver och validera den genom att ge validatorn länken till din me-sida. Valideras din stylesheet?

Funkar för mig:

<img src="img/validcss.png">

<p>Om du får fel så rätta till det.

<h3>5.3 Länka till valideringsverktyget</h3>

<p><span class="uppg">[UPPGIFT]</span>

<p>För att underlätta validering av sidorna så lägger vi till en direktlänk. 
På samma sätt som vi gjorde med HTML-validatorn. Lägg till följande länk i din footer.

<div class="tip"><h4>&nbsp; Kod:</h4>
<pre class="bash geshi">
<code>
&lt;a href="http://jigsaw.w3.org/css-validator/check/referer"&gt;CSS&lt;/a&gt;
</code>
</pre>
</div>

<p>Din webbserver behöver vara publik för att det skall fungera. 
Ladda upp sidorna på driftsservern för att testa validatorlänken.

<p>Testa att validera sidan genom att klicka på CSS-länken. 
Glöm nu inte att validera dina sidor med jämna mellanrum. 
Valideringsverktyg är extra bra att använda för felsökning. Gör det.

<div class="tip">
<h4 class="orange">Tips:</h4>
<p>Ser din sida inte ut som du förväntar dig? 
Dubbelkolla med valideringsverktygen att HTML- och CSS-koden validerar.
</div>

<h2>5.4 Unicorn, ett valideringsverktyg “to rule them all”</h2>

<p><span class="uppg">[UPPGIFT]</span>

<p>Det finns ett valideringsverktyg som kör både HTML och CSS testerna i en körning. 
Dessutom kan det köra ytterligare kompletterande tester. 
Länka även till detta verktyget från din me-sida. Via följande länkar kan du klura ut hur jag gjorde. 
Gör likadant.

<p>Länk till validatorn Unicorn: 
<a href="http://validator.w3.org/unicorn/">http://validator.w3.org/unicorn/</a><br>
<a href="demo/me.php">Min me-sida</a> som inkluderar en footer med Unicorn-länk<br>
<a href="demo/viewsource.php?dir=incl&amp;file=footer.php">Källkoden</a> till footern med Unicorn-länk 


>p>Fint! Nu har vi en grundstruktur och enkel tillgång till valideringsverktygen. 
Se till att länken till Unicorn fungerar och att sidan validerar.

<div class="tip">
<h4 class="orange">Tips:</h4>
<p>Varför används &amp;amp; istället för tecknet &ampp; när vi länkar till Unicorn? 
Testa att ändra din kod och enbart skriva &amp;. Validera den sedan i Unicorn. 
Du får ett felmeddelande som säger:

<p>&amp; did not start a character reference. (&amp; probably should have been escaped as &amp;amp;.)

<p>&amp; är ett tecken som har en speciell betydelse i HTML, 
därför ersätts den ofta med &amp;amp; i HTML-koden. Annars validerar inte koden. 
Läs mer genom att googla på “html entities”.
</div>

<h2>6. Snygga till med en header, logo och meny</h2>

<p>Då stryker vi ytterligare en punkt och går raskt vidare med nästa.

<ol>
	<li><s>HTML och validator (me.php)</s></li>
	<li><s>CSS och validator (me.php, stylesheet.css)</s></li>
	<li><strong>Header med logo och meny</strong></li>
	<li>PHP (header.php, footer.php)</li>
	<li>En sida för att beskriva vad du gjort i varje moment (report.php)</li>
	<li>Snygga till och gör färdigt</li>
</ol>


<h3>6.1 Gör en header till din me-sida</h3>

<p><span class="uppg">[UPPGIFT]</span>

<p>En webbplats innehåller ofta en header med en logo, titel på siten och en navigeringsmeny. 
Visst vore det trevligt om vår me-sida även innehåll detta?

<p>Låt oss fixa till en header, innan vi går vidare. Följande kod hjälper oss på vägen:

<div class="tip"><h4>&nbsp; Kod:</h4>
<pre class="bash geshi">
<code>&lt;!-- Header --&gt;
&lt;div id="top"&gt;
    &lt;img src="img/logo.png" alt="htmlphp logo" width=300 height=70&gt;
&lt;/div&gt;
&lt;!-- Navigeringsmeny --&gt;
&lt;nav class="navmenu"&gt;
    &lt;a href="me.php"&gt;Me&lt;/a&gt;
    &lt;a href="report.php"&gt;Redovisning&lt;/a&gt;
&lt;/nav&gt;
</code>
</pre>
</div>

<p>Ordna en egen logo-bild. Ladda ned genom att högerklicka på en bild du valt och välj “Spara bild som…”.

<p>Editera därefter stylesheet-filen, skriv CSS, så att navigationen och headern blir riktigt snygg.

<p>Stylat färdigt? -Bra. Nu börjar det likna något. 
Då är vi redo att strukturera sidorna med PHP.

<div class="tip">
<h4 class="orange">Tips 1:</h4>
<p>&lt;nav&gt; är ett nytt element i HTML5. 
Det inför semantisk betydelse som innebär att det ger ledtrådar till vilket syfte 
elementet har i HTML-dokumentet. &lt;nav&gt; innebär att innehållet är navigeringslänkar, 
antingen inom siten eller till andra siter. Ofta är det en gruppering av länkar. 
Läs på nätet för att om nav för att lära dig mer.
</div>

<div class="tip">
<h4 class="orange">Tips 2:</h4>
<p>Kommentarer i HTML skrivs på följande sätt:<br>
&lt;!-- text som är en vacker kommentar --&gt;

<p>Emedan lommentar i CSS skrivs på följande sätt.<br>
/* text som är en vacker kommentar */

<p>Använd kommentarer för att dokumentera din kod. 
Fram för allt för din egen skull. Använd även kommentarsstycken för att strukturera koden 
så den blir översiktlig och lättläst.
</div>

<h2>7. PHP (header.php, footer.php)</h2>

<p>Bra, då stryker vi ytterligare en punkt på listan och tar raskt tag i nästa.

<ol>
	<li><s>HTML och validator (me.php)</s></li>
	<li><s>CSS och validator (me.php, stylesheet.css)</s></li>
	<li><s>Header med logo och meny</s></li>
	<li><strong>PHP (header.php, footer.php)</strong></li>
	<li>En sida för att beskriva vad du gjort i varje moment (report.php)</li>
	<li>Snygga till och gör färdigt</li>
</ol>

<h3>7.1 Grundstruktur med PHP</h3>

<p>Nu har vi en grundstruktur på vår webbsida. Det är snart dax att göra en sida för 
att beskriva vad du gjort och lärt dig i respektive  moment (report.php). 
Men, innan vi gör det så skall vi strukturera lite. 
Ska vi bara kopiera me.php eller finns det ett bättre (och enklare) sätt? 
Vissa delar av me-sidan innehåller information som gäller för hela webbplatsen (header och footer) 
och vissa delar är specifik för respektive sida. Kan vi använda PHP för att få en bra struktur på detta? 
Vi vill ju bara ändra på ett ställe när vi lägger till ny information? Vi vill verkligen inte sitta 
och ändra samma sak i flera filer.

<p>Ett vanligt sätt är att lägga viss information i en sida som heter header.php och 
viss information i en sida som döps till footer.php. Dessa sidor kan sedan inkluderas när de behövs.

<p>Jag har visat det för, men för repetitionens skull, så visar jag hur man kan göra.

<h3>7.2 Dela upp me.php i 3 delar</h3>

<p>En snabb och enkel uppdelning av me.php, header.php och footer.php kan se ut som följer:

<p>Den övre delen av koden från me.php flyttas till filen header.php
(doctype, header samt  logo och navigationsmenyn.)

<p>Den nedre delen av filen me.php (blir förmodligen bara länkarna till validatorerna och slut-HTML taggen för dig)
flyttas till filen footer.php. 

<p>Jag väljer att skapa en ny underkatalog <strong>incl</strong> och lägger både header.php och 
footer.php i den katalogen. Det får bli en egen katalog för filer som inkluderas.

<p>Med hjälp av PHP-konstruktionen include() så inkluderas header.php och footer.php i me.php.

<div class="tip"><h4>&nbsp; Kod:</h4>
<pre class="bash geshi">
<code>&lt;?php include("incl/header.php"); ?&gt;
</code>
</pre>
</div>

Som du nog vet vid det här laget så är &lt;?php är starttag för PHP-kod, ?&gt; är sluttag. 
Allt mellan taggarna betraktas och hanteras som PHP-kod. Det är webbservern som parsar PHP-koden 
innan den lämnar ifrån sig den resulterande HTML-sidan.

<p>Tekniskt funkar sidan som tidigare. Resultatet i webbläsaren blir precis som tidigare. 
Det är bara den bakomliggande strukturen av filer på servern som ändrades. 

<p><span class="uppg">[UPPGIFT]</span>

<p>Dela upp din sida på ovanstående sätt. Är du klar? Bra, då kan vi fortsätta.


<div class="tip">
<h4 class="orange">Tips 2:</h4>
<p>Bekanta dig med PHP-manualen. Det kan bli en av dina bästa vänner. Allt du behöver veta om PHP 
finns att läsa i manualen. Det gäller bara att bli kompis med manualen.

<p>Läs lite kort om språket PHP:
http://php.net/manual/en/intro-whatis.php
Slå upp funktionen include() och läs lite om den:
http://php.net/manual/en/function.include.php
</div>

<h2>8. En sida för redovisningar (report.php)</h2>

<p>Fint! Då stryker vi ytterligare en punkt på listan och tar raskt tag i nästa.

<ol>
	<li><s>HTML och validator (me.php)</s></li>
	<li><s>CSS och validator (me.php, stylesheet.css)</s></li>
	<li><s>Header med logo och meny</s></li>
	<li><s>PHP (header.php, footer.php)</s></li>
	<li><strong>En sida för att beskriva vad du gjort i varje moment (report.php)</strong></li>
	<li>Snygga till och gör färdigt</li>
</ol>

<h3>8.1 Testa grundstrukturen, fungerar den?</h3>

<p><span class="uppg">[UPPGIFT]</span>

<p>Då gör vi en ny sida genom att kopiera me.php. 
Döp sidan till report.php. Det är på den sidan som du skall skriva vad du gjort och lärt dig.
Skriv därför någon enkel text om moment1. (Du kommer att fylla på med mer strax - så skriv bara någon rad..)

<p>Lägg sedan till en länk till report-sidan i menyn så att du kan växla mellan me-sidan och report-sidan.
Du behöver i nuläget inte bekymra dig om att i menyn markera vilken sida som som för tillfället visas. 
Det finns flera lösningar på detta - vi kan ta det senare. Men vill du så testa gärna (kämpa inte för mycket
tid med det bara, vi behöver komma framåt hela tiden).

<p>Det blev bra va? Strukturen av källkoden till me-sidan och till redovisningssidan är densamma. 
Dubbelkolla genom att titta på källkoden.


<p>Du glömmer inte att validera sidorna va? Bra, men det finns ett litet bekymmer. 
Titeln på sidorna är samma. Den titel som visas överst i webbläsarens fönster, 
den titel som finns i HTML-elementet &lt;title&gt; i header.php. Det är inte bra. 
Låt se om det går att hantera med PHP.



<h3>8.2 Variabel i PHP för att byta titel</h3>

<p><span class="uppg">[UPPGIFT]</span>

<p>Varje sida skall ha en egen beskrivande titel. Själva titeln sätts i HTML-elementet &lt;title&gt; i 
header.php. Men, det är ju me-sidan eller redovisningssidan som vet vilken titel det skall vara. 
Detta kan vi lösa med en variabel i PHP. Vi skapar en PHP-variabel $title som skall innehålla 
sidans titel. Vi ger variabeln ett värde i me.php respektive report.php. 
Därefter skriver vi ut variabelns värde i filen header.php. För att det skall fungera behöver
du deklarera variabeln innan du inkluderar header. Låt mig visa hur man gör. 
Gör sedan likadant i dina egna filer.

<p>I me.php definerar jag en variabel ($title) och tilldelar den sidans titel 
(“about.urban | Me-sidan”). 

<p>Studera min <a href="demo/viewsource.php?dir=&amp;file=me.php">källkod</a> (speciellt rad 9 och 16) 
så bör du kunna klura ut hur det fungerar.

<p>Lägg till titel i dina filer (report.php och me.php). Använd olika titlar på sidorna.

<p>Bra jobbat. Se till att din egna me-sida klarar av detta och att den validerar. 
Glöm inte att validera.

<div class="tip">
<h4>Tips 1:</h4>
<p>Du kan läsa mer om variabler i PHP’s referensmanual. Läs lite översiktligt och titta på exemplen.
<a href="http://php.net/manual/en/language.variables.basics.php">
http://php.net/manual/en/language.variables.basics.php</a>

<p>Funktionen echo kan skriva ut värdet av en variabel, läs kort om funktionen i manualen.
<a href="http://php.net/manual/en/function.echo.php">http://php.net/manual/en/function.echo.php</a>
</div>

<h2>8.3 Felmeddelande i PHP</h2>

<p><span class="uppg">[UPPGIFT]</span>

<p>När webbservern processar PHP-koden kan den hitta fel och då skrivs ett felmeddelande ut. 
Felmeddelande i PHP kan vara av olika typer och ha olika grad av allvarlighet. Beroende på om det är 
en utvecklingsserver eller en driftsserver så brukar man konfigurera PHP att visa olika meddelanden. 
På driftsservern visas troligen inte felmeddelande av typen NOTICE. Det är rätt vanligt att det är 
så på en driftsserver. Det är alltid bra att ha kontroll över vilka felmeddelanden som skrivs ut. 
Och framförallt att de verkligen skrivs ut.

<p>Följande bilder visar på två vanliga felmeddelanden. 
Kan du klura ut vad de beror på? 
I sista exemplet kan det vara lite svårt att se felmeddelandet. 
I de fallen kan det vara bra att studera den HTML-kod som genererats.

<p>Svaren står i slutet av detta stycke.

<h4>Fel nummer 1:</h4>
<p><img src="img/fail1.jpg" alt="ett vanligt fel i php-kod">
<h4>Fel nummer 2:</h4>
<p><img src="img/fail2.jpg" alt="ett annat vanligt fel i php-kod">

<p>Hittade du felen? 

<p>Det första felet beror på att vi försöker inkludera en fil som inte finns.

<p>Det andra felet beror på ett felaktigt variabelnamn. Någon försöker skriva ut variabeln $title.
- men den variabel har någon glömt att deklarera och ge ett värde.

<p>Det kommer att bli fler felmeddelanden innan dina studier är slut, tro mig.

<h2>8.4 Ta kontroll över felmeddelanden</h2>

<p><span class="uppg">[UPPGIFT]</span>

<p>Med PHP-funktionen error_reporting() går att ställa in vilka felmeddelanden som visas, 
oavsett hur PHP är konfigurerat på servern. Ett bra sätt är att lägga anropet i en egen fil, 
det blir då enkelt att ändra.

För detta syfte skapar vi en ny fil, incl/config.php. Följande PHP-kod stoppar vi in i filen.

<div class="tip"><h4>&nbsp; Kod:</h4>
<pre class="php geshi">
	error_reporting(E_ALL);
	ini_set('display_errors', true);
</pre>
</div>

<p>Nu behöver du inkludera denna fil i me-sidan respektive redovisningssidan. 
Lägg denna include-sats längst upp i filen.

<p>Bra, ordning och reda. Felmeddelanden kommer vi ha stor nytta av framöver. 
Det är ett av de viktigaste verktygen för felsökning.

<p>Vi börjar närma oss slutet för detta kursmoment.


<div class="tip">
<h4>Tips 1:</h4>
<p>Vill du veta mer om funktionen error_reporting() så läser du om den i referensmanualen. 
Gör det till en vana att slå upp saker i referensmanualen.

<a href="http://php.net/manual/en/function.error-reporting.php">
http://php.net/manual/en/function.error-reporting.php</a>
</div>

<div class="tip">
<h4>Tips 2:</h4>
<p>PHP sluttag ?&gt; behövs inte alltid anges. Som du kan se i filen config.php så använder jag inte 
sluttaggen. Detta gäller när man enbart har PHP-kod i en fil och det stämmer för config-filen. 
Om man kan undvika att ange sluttaggen så ska man göra det. När du mixar HTML-kod och PHP-kod så 
måste du alltid ange sluttaggen. I denna kurs mixar vi nästa uteslutande HTML och PHP så oftast 
behöver du ange sluttaggen.
</div>

<h2>9. Snygga till och gör färdigt</h2>

<p>Bra, då stryker vi ytterligare en punkt på listan och tar tag i den sista punkten på listan.

<ol>
	<li><s>HTML och validator (me.php)</s></li>
	<li><s>CSS och validator (me.php, stylesheet.css)</s></li>
	<li><s>Header med logo och meny</s></li>
	<li><s>PHP (header.php, footer.php)</s></li>
	<li><s>En sida för att beskriva vad du gjort i varje moment (report.php)</s></li>
	<li><strong>Snygga till och gör färdigt</strong></li>
</ol>


<h3>9.1 Gör klart me-sidan</h3>

<p><span class="uppg">[UPPGIFT]</span>

<p>Nu återstår bara att göra klart din me-site och stoppa in lite information. 
Skriv eller kopiera in en enklare presentationstext om dig själv ca 15 meningar. 

<h3>9.2 Gör klart redovisningssidan</h3>

<p><span class="uppg">[UPPGIFT]</span>

<p>Redovisningssidan skriver du senare. Det är det sista du gör i varje kursmoment.


<h3>9.3 Länka till source.php</h3>

<p><span class="uppg">[UPPGIFT]</span>

<p>Till detta momentet har jag använt PHP-filen source.php för att visa källkodsexemplen. 
För att det skall vara enkelt att hjälpa till med felsökning så är det viktigt att du har en kopia 
av source.php i din katalog. Behöver du hjälp så kommer den som hjälper dig att vilja titta på 
din källkod.

<p>Du kan hämta koden till <a href="demo/php/source.txt">source.php via följande länk</a>. 

<p>Ta koden och lägg den i en fil som du döper till source.php. 
Lägg source.php i samma katalog som du lägger me.php och report.php. 
Se till att länka till source.php i din footer. 
Som du kan se så har jag gjort det i min variant av me-sidan (Källkod).

<h2>10. Avslutningsvis</h2>

<p>Det är alltid skönt att stryka den sista punkten på listan.

<ol>
	<li><s>HTML och validator (me.php)</s></li>
	<li><s>CSS och validator (me.php, stylesheet.css)</s></li>
	<li><s>Header med logo och meny</s></li>
	<li><s>PHP (header.php, footer.php)</s></li>
	<li><s>En sida för att beskriva vad du gjort i varje moment (report.php)</s></li>
	<li><s>Snygga till och gör färdigt</s></li>
</ol>

<p>Hoppas att detta gav dig lite mersmak för dessa tekniker och hur de kan samverka när vi bygger 
webbplatser. I kommande kursmoment får vi mer tid att gå igenom teknikerna lite mer grundligt. 
I kursen kommer du ha en hel del nytta av kurslitteraturen. Många av svaren på dina frågor finner du där.

<p>Fixa nu till din redovisningssida enligt instruktionen nedan och ladda upp din me-sida till 
driftsmiljön.

<h3>10.1 Gör klart redovisningssidan</h3>

<p><span class="uppg">[UPPGIFT]</span>

<p>Skriv redovisningen på din me-sida. Skriv ett stycke (ca 15 meningar) om hur momentet funkade. 
Reflektera över dina svårigheter/problem/lösningar/resultatet, etc.  Vilken/vilka webbläsare du normalt 
använder. Berätta även vilken utvecklingsmiljö du använder (editor, sftp-klient, etc).

<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 


</article>	
