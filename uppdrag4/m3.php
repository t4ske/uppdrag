<article>
<h1>Moment 3: Lite tester av vad man kan göra med PHP</h1>

<p>I momentet beskrivs  de inbyggda arrayerna i PHP. 
Vi tittar på $_GET, $_POST, $_SERVER och $_SESSION samt hur de kan användas. 
Med hjälp av dessa arrayer, och lite mer PHP-kunskaper, gör vi ett flertal små testprogram för 
att klura ut hur saker och ting fungerar.

<p>Vi avslutar momentet med att bygga funktionalitet för login/logout och integrera detta i me-sidan. 
Resultatet blir me-sida version 3.0.

<div class="tip">
<h4>Tips:</h4>
<p>Är du total nybörjare på PHP och programmering?

<p>Då kan det vara bra att ta det lugnt i detta kursmoment. Ett par av uppgifterna innefattar ändringar i flera filer, 
med en mix av HTML, CSS och PHP. Det kan bli klurigt att felsöka om något går fel.

<p>En del av uppgifterna är markerade som valbara / optionell / utmanande. Detta innebär att du kan hoppa över dem.

<p>Ibland behöver saker ta lite tid innan det faller på plats. Detta kan vara ett sådant tillfälle.

<p>Använd detta tips som en livlina när det känns mörkt. Förhoppningsvis behöver du inte använda det. 
Men det kan vara bra att ha, utifall att…
</div>

<p>Totalt omfattar momentet ca 20 studietimmar. Du kan med fördel göra övningen i delar, 3-4 timmar 
per gång kan vara bra. Det är en god idé att snabbt läsa igenom dokumentet innan du påbörjar själva uppdraget.

<p>Är du redo? Bra! -Då kör vi igång!

<h2>1. En multi-sida med PHP</h2>

<h3>1.1 Ett exempel på en multi-sida</h3>

<p>En multi-sida är en PHP-sida som kan visa olika HTML-resultat, beroende på vilka argument 
som skickas till sidan via dess länk (urlen). Multi-sida är en benämning som jag valt för detta moment. 
Om när ni lärt er mer strukturerad programmering med PHP så kommer ni att veta att denna typ 
av lösning att kallas för “frontcontroller”.

<p>Den här sidan som du läser den här texten på är en multi-sida. Själva den här guiden är byggd på det sättet. 
Testa länkarna ovan och fundera på hur det fungerar.

<p>Som du kunde se är filnamnet samma hela tiden men resultatet är helt olika sidor. 
Det som skiljer är det som jag kallar argument, t.ex. sida=m3.php och sida=m2.php.

<p>Utan att veta något om sidans källkod kan vi dra slutsatsen att filen (index.php) 
innehåller en if-sats (eller liknande) som kollar på argumentet id och därefter bestämmer vilken sida som skall visas.

<p>Detta är en typ av lösningar som är mycket vanliga i webbapplikationer, 
vare sig man använder PHP eller alternativa lösningar.

<p>Låt oss skapa grunden för en sådan här multi-sida och integrera den i me-sidan. 
Men för att göra det så behöver vi gå igenom ett par saker först. 
Vi börjar med att titta på argument via urlen och PHP-arrayen $_GET (något som du troligen kan redan?).

<h2>2. PHP och $_GET</h2>

<p>Variablen $_GET innehåller de argument som skickas efter ?-tecknet i urlen (länken). 
Via den variabeln går det att komma åt dessa argument.

<h3>2.1 Skicka argument till en sida via urlen</h3>

<p>Låt oss först titta på argumenten. Ett argument kan ha ett värde. 
Följande är exempel på argument som kan skickas via urlen.

<p>id=html20<br>
p=kmom03-get<br>
debug

<p>I exemplet ovan har id och p ett värde, debug saknar värde.

<p>Argumenten går att kombinera i urlen på följande sätt.

<p>?id=html20<br>
?id=html20&amp;debug<br>
?id=html20&amp;debug&amp;p=kmom03-get

<p>Observera att när man skriver &amp;-tecknet i kod behöver man ofta skriva &amp;amp; för att koden skall validera.

<p>Alla argument kommer efter ?-tecknet och de separeras med en &amp;-tecken. 
Om argumenten har ett värde så används =-tecknet för att tilldela värdet. 
Argumentdelen brukar kallas för “querystring”.

<p>Läs mer om urlens struktur på <a href="http://en.wikipedia.org/wiki/Uniform_Resource_Locator">
http://en.wikipedia.org/wiki/Uniform_Resource_Locator</a>

<p>Som du förhoppningsvis vet kan man komma åt en GET-parameter genom $_GET['argumentnamn']. Nedan visas ett
ett kod-exempel som kollar om man har ett värde i parametern page:

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="php geshi"><p><span class="kw1">
if</span><span class="br0">(</span><span class="kw3">isset</span><span class="br0">(</span><span class="re0">$_GET</span><span class="br0">[</span><span class="st_h">'page'</span><span class="br0">]</span><span class="br0">)</span><span class="br0">)</span> 
<span class="br0">{</span>
   //some code...
<span class="br0">}</span>
</pre>
</div>

<h3>2.2 Använd argumenten via $_GET</h3>

<p><span class="uppg">[UPPGIFT]</span>

<p>Låt oss testa att använda informationen i variabeln $_GET. Gör på följande sätt.

<p>Skapa en ny sida, kmom03_get.php och lägg in följande kod.

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="html4strict geshi"><p><span class="sc2">&lt;<a href="http://december.com/html/4/element/h1.html"><span class="kw2">h1</span></a>&gt;</span>Visa innehållet i <span class="sc2">&lt;<a href="http://december.com/html/4/element/code.html"><span class="kw2">code</span></a>&gt;</span>$_GET<span class="sc2">&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/code.html"><span class="kw2">code</span></a>&gt;&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/h1.html"><span class="kw2">h1</span></a>&gt;</span>
<span class="sc2">&lt;<a href="http://december.com/html/4/element/p.html"><span class="kw2">p</span></a>&gt;</span>Du anropade sidan med följande querystring:
<span class="sc2">&lt;<a href="http://december.com/html/4/element/code.html"><span class="kw2">code</span></a>&gt;&lt;?php echo $_SERVER<span class="br0">[</span><span class="st0">'QUERY_STRING'</span><span class="br0">]</span>; ?&gt;&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/code.html"><span class="kw2">code</span></a>&gt;&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/p.html"><span class="kw2">p</span></a>&gt;</span>
<span class="sc2">&lt;<a href="http://december.com/html/4/element/p.html"><span class="kw2">p</span></a>&gt;&lt;<a href="http://december.com/html/4/element/code.html"><span class="kw2">code</span></a>&gt;</span>$_GET<span class="sc2">&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/code.html"><span class="kw2">code</span></a>&gt;</span> innehåller följande:<span class="sc2">&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/p.html"><span class="kw2">p</span></a>&gt;</span>
<span class="sc2">&lt;<a href="http://december.com/html/4/element/pre.html"><span class="kw2">pre</span></a>&gt;&lt;?php print_r<span class="br0">(</span>$_GET<span class="br0">)</span>; ?&gt;&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/pre.html"><span class="kw2">pre</span></a>&gt;</span></pre>
</div>

Testa sedan sidan genom att anropa den på följande vis:

<p>kmom03_get.php?id=html20<br>
kmom03_get.php?id=html20&amp;debug<br>
kmom03_get.php?id=html20&amp;debug&amp;p=kmom03-get

<p>Kontrollera att du kan se parametrarna som skickades till sidan. <strong>Det är för övrigt en vanlig
test som man nästan alltid gör innan man jobbar vidare.</strong>

<p>Funkar det? Bra - då går vi vidare.

<h3>2.3 Validera testsidan</h3>

<p>När jag testade så validerade inte min testsida. 

<p>I mitt fall berodde det på dessa &amp;-tecken som hamnar i HTML-koden när vi skriver ut parametrarna.
Ett sätt att lösa detta är att använda en PHP-funktion som kodar om alla specialtecken till htmlentiteter. 
Ett &amp;-tecken kodas då om till &amp;amp; - vilket gillas bättre av valideringen. 
Funktionen heter htmlentities() och kan användas på följande sätt.

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="php geshi"><p><span class="kw2">&lt;?php</span> <span class="kw1">echo</span> <a href="http://www.php.net/htmlentities"><span class="kw3">htmlentities</span></a><span class="br0">(</span><span class="re0">$_SERVER</span><span class="br0">[</span><span class="st_h">'QUERY_STRING'</span><span class="br0">]</span><span class="br0">)</span><span class="sy0">;</span> <span class="sy1">?&gt;</span></pre>
</div>

<p>Då är min kmom03_get2.php är uppdaterad och validerar. 

<p><span class="uppg">[UPPGIFT]</span>

<p>Uppdatera din kmom03_get.php och se till att den validerar. Testa även så att den validerar i Unicorn.

<h3>2.4 Formulär med get-metoden</h3>

<p><span class="uppg">[UPPGIFT]</span>

<p>Variabeln $_GET används ibland tillsammans med HTML-formulär. 
Låt oss göra ett testfall där vi använder ett formulär och skriver ut dess innehåll. 

<p>Skapa en ny sida, kmom03_getform.php genom att kopiera din kmom03_get.php.

<p>Lägg in följande kod som ger ett formulär. 
Fortsätt att använda den kod som skriver ut innehållet i $_GET.

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="html4strict geshi"><p><span class="sc2">&lt;<a href="http://december.com/html/4/element/h1.html"><span class="kw2">h1</span></a>&gt;</span>Formulär och get-metoden<span class="sc2">&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/h1.html"><span class="kw2">h1</span></a>&gt;</span>
 <span class="sc2">&lt;<a href="http://december.com/html/4/element/form.html"><span class="kw2">form</span></a> <span class="kw3">method</span><span class="sy0">=</span><span class="st0">"get"</span> <span class="kw3">action</span><span class="sy0">=</span><span class="st0">"?"</span>&gt;</span>
  <span class="sc2">&lt;<a href="http://december.com/html/4/element/fieldset.html"><span class="kw2">fieldset</span></a>&gt;</span>
   <span class="sc2">&lt;<a href="http://december.com/html/4/element/legend.html"><span class="kw2">legend</span></a>&gt;</span>Exempel på formulär med get-metoden<span class="sc2">&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/legend.html"><span class="kw2">legend</span></a>&gt;</span>
   <span class="sc2">&lt;<a href="http://december.com/html/4/element/p.html"><span class="kw2">p</span></a>&gt;</span>
    <span class="sc2">&lt;<a href="http://december.com/html/4/element/label.html"><span class="kw2">label</span></a> <span class="kw3">for</span><span class="sy0">=</span><span class="st0">"input1"</span>&gt;</span>Användarkonto:<span class="sc2">&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/label.html"><span class="kw2">label</span></a>&gt;&lt;<a href="http://december.com/html/4/element/br.html"><span class="kw2">br</span></a>&gt;</span>
    <span class="sc2">&lt;<a href="http://december.com/html/4/element/input.html"><span class="kw2">input</span></a> <span class="kw3">id</span><span class="sy0">=</span><span class="st0">"input1"</span> <span class="kw3">class</span><span class="sy0">=</span><span class="st0">"text"</span> <span class="kw3">type</span><span class="sy0">=</span><span class="st0">"text"</span> <span class="kw3">name</span><span class="sy0">=</span><span class="st0">"account"</span>&gt;</span>
   <span class="sc2">&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/p.html"><span class="kw2">p</span></a>&gt;</span>
   <span class="sc2">&lt;<a href="http://december.com/html/4/element/p.html"><span class="kw2">p</span></a>&gt;</span>
    <span class="sc2">&lt;<a href="http://december.com/html/4/element/label.html"><span class="kw2">label</span></a> <span class="kw3">for</span><span class="sy0">=</span><span class="st0">"input2"</span>&gt;</span>Lösenord:<span class="sc2">&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/label.html"><span class="kw2">label</span></a>&gt;&lt;<a href="http://december.com/html/4/element/br.html"><span class="kw2">br</span></a>&gt;</span>
    <span class="sc2">&lt;<a href="http://december.com/html/4/element/input.html"><span class="kw2">input</span></a> <span class="kw3">id</span><span class="sy0">=</span><span class="st0">"input2"</span> <span class="kw3">class</span><span class="sy0">=</span><span class="st0">"text"</span> <span class="kw3">type</span><span class="sy0">=</span><span class="st0">"password"</span> <span class="kw3">name</span><span class="sy0">=</span><span class="st0">"password"</span>&gt;</span>
   <span class="sc2">&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/p.html"><span class="kw2">p</span></a>&gt;</span>
   <span class="sc2">&lt;<a href="http://december.com/html/4/element/p.html"><span class="kw2">p</span></a>&gt;</span>
    <span class="sc2">&lt;<a href="http://december.com/html/4/element/input.html"><span class="kw2">input</span></a> <span class="kw3">type</span><span class="sy0">=</span><span class="st0">"submit"</span> <span class="kw3">name</span><span class="sy0">=</span><span class="st0">"doLogin"</span> <span class="kw3">value</span><span class="sy0">=</span><span class="st0">"Login"</span>&gt;</span>
  <span class="sc2">&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/p.html"><span class="kw2">p</span></a>&gt;</span>
 <span class="sc2">&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/fieldset.html"><span class="kw2">fieldset</span></a>&gt;</span>
<span class="sc2">&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/form.html"><span class="kw2">form</span></a>&gt;</span></pre>
</div>

<p>Testa sedan sidan så att den funkar och så att den validerar.

<p>Som du kan se så skickas formulärets data via urlen och kan därefter hanteras av $_GET. 
Senare i det här uppdraget kommer vi att prata mer om formulär och hur man kan processa formulärets data.

<div class="tip">
<h4>&nbsp; Notering:</h4>
<p>Delar av den stylesheet jag använder för att styla formulär är tagen från CSS-ramverket Blueprint. 
Det finns flera CSS-ramverk som innehåller färdiga konstruktioner som kan underlätta hantering 
av stylesheets och layout. Flera av dessa ramverk hanterar även ett koncept som heter grid-layout.

<p>Tjuvkika på Blueprints hemsida (vid intresse):
<a href="http://blueprintcss.org/">http://blueprintcss.org/</a>

<p>Ett annat välkänt CSS-ramverk är 960gs (kika om intresse):
<a href="http://960.gs/">http://960.gs/</a>

<p>Detta är inget vi fokuserar på eller kommer använda i detta uppdrag  
(mer är stylesheeten för formulär, style/forms.css).
</div>

<p><span class="uppg">[UPPGIFT]</span>

<p>[UPPGIFT]

<p>Skapa en speciell stylesheet för att styla formuläret (style/forms.css). 
Inkludera den med hjälp av @import.

<h2>3. PHP och $_POST</h2>

<p>Som vi såg i föregående exempel så skickades formulärets innehåll via querystringen. 
Ett alternativt sätt är (som du nog vet) att använda formulärets post-metod. 
Då skickas innehållet som en del i HTTP-headern (protokollet som går mellan webbläsare och webbserver) 
och blir då inte synligt på samma sätt. I PHP kan vi hämta ut formulärets innehåll via variabeln $_POST.

<p>Låt oss göra ett exempel på ett formulär med post-metoden som visar innehållet i $_POST.

<p><span class="uppg">[UPPGIFT]</span>

<p>Gör på följande sätt.

<p>Skapa en ny sida, kmom03_postform.php genom att kopiera din kmom03_getform.php.

<p>Ändra den rad i koden som anger formulärets metod. Se exemplet nedan.

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="html4strict geshi"><p><span class="sc2">&lt;<a href="http://december.com/html/4/element/form.html"><span class="kw2">form</span></a> <span class="kw3">method</span><span class="sy0">=</span><span class="st0">"get"</span> <span class="kw3">action</span><span class="sy0">=</span><span class="st0">"?"</span>&gt;</span>skall ersättas med
<span class="sc2">&lt;<a href="http://december.com/html/4/element/form.html"><span class="kw2">form</span></a> <span class="kw3">method</span><span class="sy0">=</span><span class="st0">"post"</span> <span class="kw3">action</span><span class="sy0">=</span><span class="st0">"?"</span>&gt;</span></pre>
</div>

<p>Lägg till en kodrad som skriver ut innehållet i $_POST.

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="html4strict geshi"><p><span class="sc2">&lt;<a href="http://december.com/html/4/element/p.html"><span class="kw2">p</span></a>&gt;&lt;<a href="http://december.com/html/4/element/code.html"><span class="kw2">code</span></a>&gt;</span>$_POST<span class="sc2">&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/code.html"><span class="kw2">code</span></a>&gt;</span> innehåller följande:<span class="sc2">&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/p.html"><span class="kw2">p</span></a>&gt;</span>
<span class="sc2">&lt;<a href="http://december.com/html/4/element/pre.html"><span class="kw2">pre</span></a>&gt;&lt;?php print_r<span class="br0">(</span>$_POST<span class="br0">)</span>; ?&gt;&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/pre.html"><span class="kw2">pre</span></a>&gt;</span></pre>
</div>

<p>Testa sidan - så att den fungerar.

<p>Kontrollera att den ser bra ut - styla den vid behov.

<p>Slutligen: se till att sidan validerar (unicorn).

<h3>3.2 Hantera inkommande $_GET/$_POST</h3>

<p>Det är viktigt att lära sig att hantera de inkommande variablerna. 
Som god programmerare bör man alltid kontrollera att de innehåller rimliga värden. 
Anledningarna är bla att man skall ge bra felmeddelanden till användarna samt att man vill 
skydda webbapplikationen från illvilliga användare som vill förstöra eller komma åt skyddad information.

<p>Det är många webbplatser som missar att validera sina inkommande variabler. 
Dessa missar kan användas för att göra intrång i webbplatser. 
Har du otur så dyker din webbplats upp på nedanstående forum bland webbplatser med säkerhetsbrister.

<p><a href="https://www.flashback.org/f16">https://www.flashback.org/f16</a>

<p>Kolla gärna i forumet och leta reda på trådarna med namnen “Samling av sidor med säkerhetsbrister”. 
Forumet innehåller både ledtrådar till den som vill bryta sig in och till den som vill skydda sig. 
Bra information, sen hänger ju allt på hur man väljer att använda den.

<p><span class="uppg">[UPPGIFT]</span>

<p>Låt oss göra ett testprogram där vi validerar och testar de inkommande variablerna.

<p>Skapa en ny sida, kmom03_validate.php genom att kopiera din kmom03_postform.php.

<p>Skriv följande kod för att kontrollera om användarkontot är definerat.

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="php geshi"><p><span class="kw2">&lt;?php</span>
<span class="kw1">if</span><span class="br0">(</span><a href="http://www.php.net/isset"><span class="kw3">isset</span></a><span class="br0">(</span><span class="re0">$_POST</span><span class="br0">[</span><span class="st_h">'account'</span><span class="br0">]</span><span class="br0">)</span><span class="br0">)</span> <span class="br0">{</span>
        <span class="kw1">echo</span> <span class="st0">"&lt;p&gt;Kontot är definerat.&lt;/p&gt;"</span><span class="sy0">;</span>
<span class="br0">}</span> <span class="kw1">else</span> <span class="br0">{</span>
        <span class="kw1">echo</span> <span class="st0">"&lt;p&gt;Kontot är EJ definerat.&lt;/p&gt;"</span><span class="sy0">;</span>
<span class="br0">}</span>
<span class="sy1">?&gt;</span></pre>
</div>

<p>Testa sedan sidan.

<p><span class="uppg">[UPPGIFT]</span>

<p>Här kommer en liten uppgift där du kan pröva om vingarna bär: 

<p>Vidarutveckla din sida, kmom03_validate.php, och utöka valideringen genom att använda 
följande PHP-funktioner.

<ul>
<li>empty()</li>
<li>is_numeric()</li>
<li>strip_tags()</li>
</ul>

<p>Titta på bilden nedan, klarar du av att koda ihop det utan att tjuvkika på min kod?

<div class="tip">
<h4>&nbsp; Tips:</h4>
<p>Leta reda på funktionerna i <a href="http://php.net/manual/en/funcref.php">refmanualen</a>
genom att använda sökfunktionen. Läs där och se hur det är tänkt att funktionerna skall användas.
</div>

<p>Om du inte klara det: fråga en kamrat, eller tjuvkika på min lösning (visa källkod i min demo).

<p>På dessa sätt kan man ta hand om inkommande variabler. 
Ju mer du lär dig, desto bättre känsla kommer du få för vilka tester du behöver göra, och inte. 
Funktionen strip_tags() är bra att lägga på minnet.

<p>Nog om säkerhet. Nu gör vi en multi-sida.

<h2>4. Gör en egen multi-sida test.php</h2>

<p>Det börjar bli många testprogram, det börjar se lite stökigt ut i katalogstrukturen. 
Det är bättre om vi kan göra en sida, en multi-sida, test.php, och sedan lägger vi 
alla testprogram i en egen underkatalog, tex incl/test.

<p>Principen för sidan <code>test.php</code> skall vara följande.</p>

<ol>
<li>Beroende på parametern <code>?p=sida</code> skall olika testsidor visas.</li>
<li>Om <code>p</code> är tomt, eller icke definerad, skall sidan <code>incl/test/default.php</code> visas.</li>
<li>Visa en aside-meny som gör det enkelt att klicka och komma åt samtliga testfall. Lägg denna koden i en egen fil, <code>incl/test/aside.php</code>.</li>
<li>Flytta alla testfall till katalogen <code>incl/test</code>.</li>
<li>Test-sidan skall vara nåbar från navigeringsmenyn.</li>
</ol>

<p><span class="uppg">[UPPGIFT]</span>

<p>Vill du pröva hur bra vingarna bär? Isåfall sätter du igång och gör enligt ovan. 

<p>Om du behöver hjälp så kan du alltid studera källkoden för sidan. 
Om det kör ihop sig på riktigt så kan du alltid testa att kopiera delar av källkoden.

<div class="tip">
<h4>&nbsp; Tips:</h4>

<p>Det behövs en speciallösning för att få exemplet med get-formuläret att hamna på en sida med länken 
<code>?p=kmom03-getform</code>.</p>

<pre class="html4strict geshi"><p><span class="sc2">&lt;<a href="http://december.com/html/4/element/form.html"><span class="kw2">form</span></a> <span class="kw3">method</span><span class="sy0">=</span><span class="st0">"get"</span> <span class="kw3">action</span><span class="sy0">=</span><span class="st0">"?"</span>&gt;</span>
  <span class="sc2">&lt;<a href="http://december.com/html/4/element/input.html"><span class="kw2">input</span></a> <span class="kw3">type</span><span class="sy0">=</span><span class="st0">"hidden"</span> <span class="kw3">name</span><span class="sy0">=</span><span class="st0">"p"</span> <span class="kw3">value</span><span class="sy0">=</span><span class="st0">"kmom03-getform"</span>&gt;</span></pre>

<p>Ett input-fält av typen hidden hjälper till. 

<p>I <code>kmom03_postform.php</code> och <code>kmom03_validate.php</code> 
räcker det att ändra action till den nya sidans länk.</p>

<pre class="html4strict geshi"><p><span class="sc2">&lt;<a href="http://december.com/html/4/element/form.html"><span class="kw2">form</span></a> <span class="kw3">method</span><span class="sy0">=</span><span class="st0">"post"</span> <span class="kw3">action</span><span class="sy0">=</span><span class="st0">"?p=kmom03-postform"</span>&gt;</span></pre>

<p>(respektive <code>action="?p=kmom03-validate"</code>)</p>

<p>Som du ser så skriver jag endast urlens del från <code>?</code>-tecknet. Den andra delen fylls på av webbläsaren och kommer vara samma som nuvarande url.</p>


<p>Om du är nybörjare på PHP så kan det varit en liten utmaning att få ihop det. 
Dessutom är det många filer att hålla ordning på. Kämpa på tills du lyckas. Ta en sak i taget. 
Ta hjälp om det behövs. Låna min källkod. När du lyckats så har du kommit en bra bit på vägen till 
att förstå grunderna i PHP. Om du ser ut som ett frågetecken så är det inte så farligt, 
det brukar falla på plats innan uppdraget är slut. Det kommer finnas tid för repetition.

</div>

<h2>5. PHP och $_SERVER</h2>

<p>Låt oss titta på ytterligare en bra-att-ha variabel i PHP. $_SERVER innehåller information om själva requesten.
 Där finns bla information om den som hämtade sidan och vilken länk som efterfrågades.

<h3>5.1 Vad finns i $_SERVER?</h3>

<p><span class="uppg">[UPPGIFT]</span>

<p>Använd din nya multi-sida och skapa en ny testsida som skriver ut innehållet i $_SERVER.

<p>Testa att det funkar. Studera innehållet och se om du känner igen några värden.

<ul>
<li><code>[HTTP_USER_AGENT]</code> - Vilken webbläsare användes vid anropet?</li>
<li><code>[SERVER_NAME]</code> - Vilken server är vi på?</li>
<li><code>[REMOTE_ADDR]</code> - ip-adress hos den som anropade sidan.</li>
<li><code>[DOCUMENT_ROOT]</code> - Vilken är webbplatsens root?</li>
<li><code>[SCRIPT_FILENAME]</code> - Filnamn på det skript som körs.</li>
<li><code>[QUERY_STRING]</code> - Query-delen av urlen.</li>
<li><code>[PHP_SELF]</code> - Länken till nuvarande sida.</li>
</ul>

<p>Vad kan vi ha för nytta av informationen? Jo -ett vanligt användningsområde är att återskapa nuvarande länk, 
en länk som användes för att anropa sidan, en “permalänk” till nuvarande sida. Bra att kunna!

<h3>5.2 Skapa länk till nuvarande sida</h3>

<p>Vissa saker behöver man inte skriva själv. Om någon annan har en bra lösning så kan man återanvända den, 
det var så jag gjorde när jag löste problemet med att länka till nuvarande sida. Låt oss nu göra samma sak,
 genom att kopiera en befintlig lösning.

<p><span class="uppg">[UPPGIFT]</span>

<p>I filen <a href="demo/viewsource.php?dir=php&amp;file=common.php">php/common.php</a> finns en funktion 
som använder sig av informationen i $_SERVER för att återskapa 
länken till nuvarande sida. Kopiera den koden och använd den för att att skriva ut länken till nuvarande sida.

<p>Jag väljer att göra include() på php/common.php i filen include/config.php,
 på det viset finns funktionen tillgänglig i alla filer och jag behöver bara inkludera den på ett enda ställe.

<p>Jag gjorde en testsida som både skriver ut innehållet i $_SERVER samt visade länken till nuvarande sida. 
Du hittar den <a href="demo/test.php?p=kmom03_server">här</a>.

<p>Bra, vad kan vi då använda denna länk till? Låt oss titta på två valideringsverktyg där vi kan ha nytta 
av länken till nuvarande sida.

<h3>5.3 Link checker och i18n validator</h3>

<p>Som du kan se i min footer så har jag med två validatorer, i18n validatorn samt link checker. 
Om du studerar källkoden för incl/footer.php så ser du att jag använt funktionen getCurrentUrl() 
för att länka till dem.

<p>Validatorn i18n visar information om filens språk och teckenkodning.

<p>Link checker är ett verktyg som går igenom alla länkar som finns på en sida och testar dem 
så att de pekar på en riktig sida. Detta är ett bra verktyg för att slippa brustna länkar, 
länkar som inte pekar till en riktig sida.

<p><span class="uppg">[UPPGIFT]</span>

<p>Uppdaterad din footer och lägg till dessa två validatorer.

<p>Testa så att det fungerar. Åtgärda eventuella fel som verktygen hittar. 

<p>Fint, lite användning kunde vi alltså ha av informationen i $_SERVER. Då går vi vidare.

<h2>6. PHP och $_SESSION</h2>

<p>Sessioner används för att lagra information mellan sidanrop. 
Sessioner används för att komma ihåg att du är inloggad eller kommer ihåg din varukorg när 
du handlar i en webbshop. I PHP finns en array, $_SESSION, som används för att jobba med 
information som lagras i sessionen.

<h3>6.1 Starta en session</h3>

<p>För att kunna använda variabeln $_SESSION så måste en session startas. 
Det gör vi med följande kod i filen incl/config.php.

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="php geshi"><p><span class="co1">// start a named session</span>
<a href="http://www.php.net/session_name"><span class="kw3">session_name</span></a><span class="br0">(</span><a href="http://www.php.net/preg_replace"><span class="kw3">preg_replace</span></a><span class="br0">(</span><span class="st_h">'/[:\.\/-_]/'</span><span class="sy0">,</span> <span class="st_h">''</span><span class="sy0">,</span> <span class="kw4">__FILE__</span><span class="br0">)</span><span class="br0">)</span><span class="sy0">;</span>
<a href="http://www.php.net/session_start"><span class="kw3">session_start</span></a><span class="br0">(</span><span class="br0">)</span><span class="sy0">;</span></pre>
</div>

<p>Det är bra att alltid starta sessionen det första man gör. Det rekommenderas. 
Överst i config-filen blir därför bra. Studera min <a href="demo/viewsource.php?dir=incl&amp;file=config.php">
källkod</a> hur jag gjorde.

<p>Läs om <code>session_start()</code> i refmanualen
<a href="http://php.net/manual/en/function.session-start.php">http://php.net/manual/en/function.session-start.php</a></p></li>

<p><span class="uppg">[UPPGIFT]</span>

<p>Lägg till kod, för att starta sessionen, i din fil incl/config.php.

<div class="tip">
<h4>&nbsp; Tips:</h4>
<p>Vi använder namngivna sessioner med session_name(). 
Det är för att alla webbplatser på skelamp.se skall ha olika sessioner. 
Hade vi inte använt namngivna sessioner så hade sessionsinformationen delats 
mellan alla webbplatser på skelamp.se och då hade det funkat konstigt om flera surfar där samtidigt...
</div>

<div class="tip">
<h4>&nbsp; Tips:</h4>
<p>Du måste starta sessionen innan något skrivs ut till webbläsaren. 
Det gäller även tomma rader och tomma tecken.
 Om du missar detta så får du ett felmeddelande som liknar detta:

<blockquote>
  <p><em>Warning: Cannot modify header information - headers already sent by ...</em></p>
</blockquote>

<p>Detta är ett vanligt felmeddelande som ibland kan vara klurigt att hitta orsaken till.
</div>

<h3>6.2 Förstör en session</h3>

<p>När man jobbar med sessioner kan det ibland vara bra att kunna förstöra hela sessionen. 
Det kan underlätta felsökning. Om man får konstiga problem med sessionen så kan det vara bra 
att testa att förstöra den nuvarande sessionen och starta om. Läs först i manualen om 
<a href="http://php.net/manual/en/function.session-destroy.php">session-destroy</a>.

<p>Titta sedan i filen <a href="demo/viewsource.php?dir=php&amp;file=common.php">src/common.php</a>. Där finns en funktion som förstör sessionen, destroySession(). 
Titta på koden, du känner igen den från manualen.

<p><span class="uppg">[UPPGIFT]</span>

<p>Använd funktionen destroySession() och gör ett testfall som förstör sessionen.
<a href="demo/test.php?p=kmom03_sessiondestroy">Titta hur jag gjorde</a> 
och <a href="emo/viewsource.php?dir=tester&amp;file=kmom03_sessiondestroy.php">se var jag valde att 
anropa funktionen</a>.

<p>Fint, då kan vi starta och förstöra en session, då kan det vara dags att studera
hur man sparar information i en session.

<h3>6.3 Sätt och läs värden i sessionen</h3>

<p>Du kan tilldela, och läsa, en sessionsvariabel på följande sätt.

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="php geshi"><p><span class="re0">$_SESSION</span><span class="br0">[</span><span class="st_h">'me'</span><span class="br0">]</span> <span class="sy0">=</span> <span class="st0">"urban"</span><span class="sy0">;</span>
<span class="kw1">if</span><span class="br0">(</span><a href="http://www.php.net/isset"><span class="kw3">isset</span></a><span class="br0">(</span><span class="re0">$_SESSION</span><span class="br0">[</span><span class="st_h">'counter'</span><span class="br0">]</span><span class="br0">)</span><span class="br0">)</span> <span class="br0">{</span>
  <span class="re0">$_SESSION</span><span class="br0">[</span><span class="st_h">'counter'</span><span class="br0">]</span> <span class="sy0">=</span> <span class="re0">$_SESSION</span><span class="br0">[</span><span class="st_h">'counter'</span><span class="br0">]</span> <span class="sy0">+</span> <span class="nu0">1</span><span class="sy0">;</span>
<span class="br0">}</span>
<span class="kw1">else</span>
<span class="br0">{</span>
  <span class="re0">$_SESSION</span><span class="br0">[</span><span class="st_h">'counter'</span><span class="br0">]</span> <span class="sy0">=</span> <span class="nu0">1</span><span class="sy0">;</span>
<span class="br0">}</span></pre>
</div>

<p>me tilldelas en vanlig sträng medan counter tilldelas värdet 1 (om den inte har ett tidigare värde) 
eller ökas på med värdet 1 (om den redan har ett värde).

<p><span class="uppg">[UPPGIFT]</span>

<p>Gör en testsida som använder ovanstående kod för att visa hur man jobbar med sessionsvariabler.

<p><span class="uppg">[UPPGIFT]</span>

<p>Gör en testsida som skriver ut innehållet i sessionsvariabeln $_SESSION.

<p>Härligt, nu har vi kontroll över sessionerna också. 
Ska vi våga oss på att använda sessionen för att göra en enkel inloggning?

<h2>7. Login och logout</h2>

<p>Många webbplatser innehåller någon form av authenticering där användaren behöver 
identifiera sig och logga in. Det är bra att ha möjlighet att skydda webbplatserna med en enkel inloggning. 
Kanske finns det vissa sidor som bara visas för den som är inloggad eller kanske för webbplatsens administratör?

<h3>7.1 Vad krävs för en minimal login/logout funktionalitet?</h3>

<p>Ok, låt oss fundera. Detta är ju något som slår på flera ställen på webbplatsen.

<ol>
<li>Ett formulär för att logga in, kanske något i stil med <a href="demo/login.php?p=login">följande sida</a>.</li>
<li>En möjlighet att logga ut, <a href="demo/login.php?p=logout">ungefär så här</a>.</li>
<li>Kanske en sida som visar om jag är <a href="demo/login.php">inloggad eller inte</a>.</li>
<li><p>Det vore ju riktigt bra med en <a href="demo/viewsource.php?dir=php&amp;file=login.php">samling av funktioner</a> som “någon” gjort, och som kan underlätta för mig.</li>
<li>Kanske en meny uppe i högra hörnet som visar olika länkar beroende på om 
jag är <a href="demo/viewsource.php?dir=php&amp;file=login.php">inloggad eller ej</a>?</li>
<li>Någonstans behöver jag ha <a href="demo/viewsource.php?dir=incl&amp;file=config.php">
information om användarkonto och lösenord</a>.</li>
</ol>

<p>Hoppla. Det blev en del. Testa att logga in på <a href="demo/me.php">min me-sida</a> med användarkonto “John” och lösenord “doe”. 
Lek runt och försök att förstå hur det fungerar och hänger ihop.

<h3>7.2 Skapa multi-sida för login och logout</h3>

<p><span class="uppg">[UPPGIFT]</span>

<p>Kopiera sidan med funktioner för inloggningen, src/login.php.

<p>Skapa en multi-sida, login.php, för att hantera inloggningen. 
Sidan skall använda sig av funktionerna i filen src/login.php.

<p>I stycket ovan har du de ledtrådar som du behöver för att lyckas med uppgiften. 
De variabler och funktioner som används i login/logout-sammanhang börjar på user.

<p>Detta blir en litet test på hur bra dina vingar bär.

<p>Tanken är inte att vi skall kunna skriva all denna kod själva, vi vill bara kunna använda 
lösningar som någon annan gjort. Det är själva tanken. För att klara av det behöver man veta 
vilka koddelar som skall kopieras, var de skall placeras i filerna och man behöver kunna felsöka. 
Det är rejäla utmaningar och klarar man det så kommer man en bra bit med sitt PHP-kunnande.

<div class="tip">
<h4>&nbsp; Tips:</h4>
<p>Källkod till min <a href="demo/viewsource.php?dir=&amp;file=login.php">login.php (multi-sidan)</a>.
</div>

<h2>8. Features till siten</h2>

<p>Finns det fler trevliga saker som sidan skulle kunna innehålla tro?

<h3>8.1 Ta tid på PHP</h3>

<p>Ibland vill man veta hur lång tid det tar att generera en sida. Just tidsåtgången är inte så spännande 
i vårt fall, det är sällan ett bekymmer, men, kanske när databaser blir inblandade och när webbplatserna 
blir lite större. Vi fixar en timer för framtida bruk.

<p><span class="uppg">[UPPGIFT]</span>

<p>Starta timern i filen incl/config.php med följande kod.

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="php geshi"><p><span class="co1">// time page generation, display in footer. comment out to disable timing.</span>
<span class="re0">$pageTimeGeneration</span> <span class="sy0">=</span> <a href="http://www.php.net/microtime"><span class="kw3">microtime</span></a><span class="br0">(</span><span class="kw4">true</span><span class="br0">)</span><span class="sy0">;</span></pre>
</div>

Stoppa timern och skriv ut resultatet i footern med följande kod.

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="php geshi"><p><span class="kw2">&lt;?php</span> <span class="kw1">if</span><span class="br0">(</span><a href="http://www.php.net/isset"><span class="kw3">isset</span></a><span class="br0">(</span><span class="re0">$pageTimeGeneration</span><span class="br0">)</span><span class="br0">)</span> <span class="sy0">:</span> <span class="sy1">?&gt;</span>
&lt;p&gt;Page generated in <span class="kw2">&lt;?php</span> <span class="kw1">echo</span> <a href="http://www.php.net/round"><span class="kw3">round</span></a><span class="br0">(</span><a href="http://www.php.net/microtime"><span class="kw3">microtime</span></a><span class="br0">(</span><span class="kw4">true</span><span class="br0">)</span><span class="sy0">-</span><span class="re0">$pageTimeGeneration</span><span class="sy0">,</span> <span class="nu0">5</span><span class="br0">)</span><span class="sy0">;</span> <span class="sy1">?&gt;</span> seconds&lt;/p&gt;
<span class="kw2">&lt;?php</span> <span class="kw1">endif</span><span class="sy0">;</span> <span class="sy1">?&gt;</span></pre>
</div>

<p>Tjuvkika på mina filer om det behövs - men bara om du verkligen måste...

<h2>9. Avslutningsvis</h2>

<p>Ta en paus och se över vad du gjort i detta kursmomentet, klicka runt och kolla att de olika delarna fungerar, 
testa så att all HTML och CSS validerar.

<h3>9.1 Skriv redovisning</h3>

<p>Skriv redovisningen på din report-sida. 
Skriv ett stycke (ca 15 meningar) om hur momentet funkade. 
Reflektera över svårigheter, problem, lösningar och resultat. 
Känner du igen dig i PHP-koden? Vad tycker du om PHP så här långt? 


<p>Du har gjort ett bra jobb. Vi kan nu säga att din me-sida är i version 3.0. 
Det känns bra. Vila upp dig till nästa moment. Låt saker falla på plats.

<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 


</article>	