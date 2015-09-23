<article>
<h1>Moment2: HTML-element och CSS-konstruktioner</h1>

<p>I förra kursmomentet blev resultatet en me-sida, en sida med en beskrivning om mig själv samt 
en redovisningssida. En webbplats som fortsättningsvis helt enkelt kallas för me-sidan.

<p>Det blev användning av både HTML, CSS och PHP för att strukturera kod och information. 
Det var en första provsmakning av dessa tekniker och det gick att se hur de kan samverka för 
att bilda en webbplats.

<p>Hur skall vi nu gå vidare då?

<p>Vi behöver studera varje teknik lite mer i detalj (och i lugn och ro).

<p>Vi behöver se hur vi kan bygga upp en webbplats med de vanligaste elementen. 
Lite kolumner och menyer. Lite mer om navigering. 
Kanske även hur man med en stylesheet kan ändra hela webbplatsens utseende, 
utan att ändra någon HTML eller PHP-kod.

<p>Det vore trevligt om vi kan fylla på me-sidan med fler funktioner, 
fler vanliga funktioner som ofta finns i webbplatser. 
Det vore riktigt trevligt om det sedan gick att kopiera hela me-siten för att bygga en ny webbplats. 
Lite som en mall (template) för webbplatser. Ska vi lyckas med detta så behöver vi tänka på struktur, 
ordning och reda.

<p>HTML5 och CSS3 är ju kommande tekniker som redan fungerar. Låt oss pröva dem för att se vad de 
kan erbjuda.

<p>Det finns verktyg som kan hjälpa oss vid vår webbutveckling. Det finns också en hel del tips och 
tricks som kan underlätta utveckling, test och felsökning. Det vore fint om vi kunde bli varse 
några av dessa tips och tricks. Så många som möjligt.

<p>Allt för att göra det enkelt att bygga webbplatser.

<p><strong>Detta uppdrag är ett projekt. Nämligen att bygga ett ramverk som ni kan återanvända om ni vill 
bygga fler webbplatser utan att behöva skriva om all kod. Tanken är att bara  kopiera mallen 
för att skapa en ny webbplats och så vips är man klar! Eller? Peppar, peppar…</strong>

<h2>Dagens agenda</h2>

<p>Detta moment får ta vid där det förra slutade. Vi bygger helt enkelt vidare på me-sidan. 
Medan vi gör det så försöker vi täcka in så mycket som möjligt av önskningarna från texten ovan. 
Det blir en bra plan för dagen. Lite som ett smörgåsbord, en kompott av vanliga lösningar och tekniker 
för att bygga en webbplats.

<p>När vi är klara så har vi en me-sida i version 2.0.

<p><strong>Då kör vi igång!</strong>

<h2>1. Utveckla din footer.</h2>

<p>Vi vill ha en snygg och användbar footer.

<p>Se till att den innehåller länkar till alla validatorer, manualer och källkoden.
Dessutom skall den se bra ut.

<p>[UPPGIFT]

<p>Studera min fil <a href="http://localhost/t4ske/uppdrag/uppdrag4/demo/viewsource.php?dir=incl&amp;file=footer.php">
incl/footer.php</a> och se hur jag har länkat till manualerna. 
Jag har även lagt till länkar till en ny validator. Inkludera länkarna i footern på din egna me-sida.

<p>Se till att du får med allt som jag har med - gör det gärna snyggare och bättre!

<h2>2. HTML5</h2>

<p>Vi bekantar oss med nya element i HTML5 och lär oss att använda en del av dem.

<h3>2.1 Element i HTML5</h3>

<p>HTML5 introducerar ett antal nya element. I min me-sida har jag använt ett par av dem.

<p>Flera av elementen ersätter det anonyma &lt;div&gt;-elementet och tillför semantisk betydelse. 
Det finns en mening med elementet. Tex när du använder &lt;footer&gt; istället för en &lt;div&gt;
 så betyder det att detta är en del som innehåller en footer till sektionen/sidan/webbplatsen.

<p>De nya elementen är just “nya”, och de känns ofta inte igen av webbläsarna. 
Detta kan åtgärdas genom att definera dem i stylesheeten med en standard style. 
Följande kod löser det.

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="css geshi">
<span class="coMULTI">
<p>/* html5 elements--------------------------------------------------------*/</span>

header<span class="sy0">,</span>footer<span class="sy0">,</span>nav<span class="sy0">,</span>article<span class="sy0">,</span>section<span class="sy0">,</span>
aside<span class="sy0">,</span>figure<span class="sy0">,</span>figcaption<span class="br0">
{</span><span class="kw1">
	display</span><span class="sy0">:</span><span class="kw2">block</span><span class="sy0">;
</span><span class="br0">
}</span>
</pre>
</div>

<p>[UPPGIFT]

<p>Lägg in stöd för html5-taggar i äldre webbläsare genom att lägga till koden ovan i din stylesheet.

<h2>2.2 Använd HTML5 element i me-sidan</h2>

<p>I min me-sida har jag som sagt använt en del HTML5-element i stället för &lt;div&lt;-element. 
Öppna min <a href="demo/me.php">me-sida</a> i webbläsaren och studera källkoden (högerklicka och välj “Visa källkod”).

<p>[UPPGIFT]

<p>Uppdatera fritt din egna me-sida med HTML5-element. Använd de som du anser passar.

<h3>2.3 IE och HTML5</h3>

<p>Webbläsaren Internet Explorer kan behöva lite hjälp för att klara av HTML5 . 
Detta löses med hjälp av ett JavaScript som gör så att IE kan hantera de nya elementen.

<p>Det är fram för allt Internet Explorer 8 och tidigare samt vissa andra äldre webbläsare som 
struntar fullkomligt i de nya elementen i HTML5 och man kan därför inte använda CSS för att styla dem. 
För att få det att fungera så får man använda sig av lite JavaScript-knep som google 
så snällt hostar på sina servrar.

<p><a href="http://code.google.com/p/html5shiv/">http://code.google.com/p/html5shiv/</a>

<p>Man lägger helt enkelt in följande kod i &lt;head&gt;-taggen av sin HTML5-fil 
för att importera JavaScriptet:

<div class="tip">
<h4>&nbsp; Kod:</h4>
<p><span style="font-family:courier new;">&lt;!--[if lt IE 9]&gt;<br>&lt;
script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"&gt;&lt;/script&gt;<br>&lt;!
[endif]--&gt;</span>
</div>

<p>[UPPGIFT]

<p>Lägg till stöd för IE och HTML5 i din me-sida.

<h2>3. CSS och Stylesheets</h2>

<p>I förra momentet användes en extern stylesheet för att styla me-sidan. 
Låt oss nu ägna lite mer tid åt stylesheets och CSS i form av ett par uppgifter.

<h3>3.1 En stylesheet för debug</h3>

<p>Firebug är ett bra verktyg att använda vid felsökning av CSS-kod. Likaså är valideringsverktygen.

<p>Ibland vill man ha en snabb visuell översikt av sidans element. Ett sätt att åstakomma detta 
är att rita en ram kring de element som finns, eller att ge dem en viss bakgrund. 
Vi kan skapa en egen stylesheet för detta syfte och kalla den för debug, debug.css. 
Låt oss göra en sådan stylesheet.

<h4>3.1.1 Dela upp stylesheets i filer med @import</h4>

<p>Tanken är att använda den befintliga stylesheeten och endast tillföra ramar och bakgrundsfärger 
på de element man vill studera. Detta kan vi uppnå genom att göra en ny stylesheet, debug.css, 
och i den inkludera den befintliga stylesheet.css.

<p>Gör en ny fil, style/debug.css, och lägg in följande kod.

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="css geshi">
<p><span class="co1">@import url("stylesheet.css"); /* Import all styles from this file */</span>
&nbsp;
<span class="coMULTI">
/* add debug-information to some central elements
--------------------------------------------------------
*/</span>
body <span class="br0">{</span><span class="kw1">background</span><span class="sy0">:</span> beige<span class="sy0">;</span><span class="br0">}</span>
header<span class="re0">#above</span> <span class="br0">{</span><span class="kw1">background</span><span class="sy0">:</span> blueviolet<span class="sy0">;</span><span class="br0">}</span></pre>
</div>

<p>	Se hela källkoden till min 
<a href="http://localhost/t4ske/uppdrag/uppdrag4/demo/viewsource.php?dir=css&amp;file=debug.css">style/debug.css</a>

<p>Denna stylesheet omfattar alltså all style som finns i style/stylesheet.css och tillför 
den style som defineras i filen. Det går alltså att omdefinera stylen för ett element. 
<strong>Det som gäller är det som senast definerats</strong>.

<div class="tip">
<h4>Tips 1:</h4>
<p>Om man definerar en style för ett element på olika ställen, vilken style får då elementet?

<p>Först läses de externa stylesheeten, uppifrån och ned. Det som defineras kan omdefineras längre ned i filen. 
Det som senast definerats gäller. Det är alltså viktigt i vilken ordning som definitionerna skrivs och i vilken 
ordning filerna inkluderas.

<p>Därefter läses sidans interna style, den style som finns definerad mellan &lt;style&gt;&lt;/style&gt; taggarna. 
De definitionerna som anges där skriver över de som gjorts tidigare.

<p>Till slut läggs den style till som definerats i själva HTML-elementet. Detta görs med attributet “style”, 
tex &lt;div style="background:lime;"&gt;&lt;/div&gt;. Denna style skriver då över den style som definerats tidigare.

<p>Principen är att ju närmare elementet som stylen defineras, desto viktigare är den.
</div>

<p>@import kan vara ett bra sätt att dela upp sin style i olika filer. Detta kan underlätta vid utveckling av 
stylesheets.

<h4>3.1.2 Alternativ stylesheet med &lt;link&gt;</h4>

<p>Ett enkelt sätt att använda debug-stylen är att inkludera den som en alternativ extern stylesheet. 
Detta kan du göra genom att uppdatera din incl/header.php.

<div class="tip">
<h4>&nbsp; Kod:</h4>
<p>&lt;link rel="stylesheet" href="style/stylesheet.css" title="General stylesheet"&gt;<br>
&lt;link rel="alternate stylesheet" href="style/debug.css" title="Debug stylesheet"&gt;
</div>

<p>Du kan nu, oftast i webbläsaren eller via ett tillägg, välja vilken stylesheet du vill använda. I Firefox 
gör man så här: gå till menyn (tryck alt-tangent) och välj “Visa-> Sidstil" -> välj sedan den stylesheet du vill använda 
för att visa sidan.

<p>På detta sätt kan du skifta mellan olika stylesheets. Det kan vara ett enkelt sätt att testa varianter på 
stylesheets,speciellt i utvecklingsfasen.

<p>Så här ser min debug-stil ut:

<p><img src="img/sidstil.jpg">

<p>[UPPGIFT]

<p>Lägg till CSS-konstruktioner i din egna variant av debug och välj att styla de element som bygger upp sidans struktur.


<div class="tip">
<h4>Tips 1:</h4>
<p>Ser din sida inte ut som den var tänkt? Är något fel?

Felsök stylesheets på följande sätt:
<ol>
<li>Är min stylesheet inkluderad i sidan? Välj att visa HTML-sidans källkod via webbläsaren och 
klicka dig fram till stylesheeten. Är det rätt stylesheet?</li>
<li>Validera stylesheeten.</li>
<li>Använd debug-stylesheeten för att visualisera sidans struktur.</li>
<li>Använd webbläsarens utvecklingsverktyg (ofta F12) för att analysera sidans struktur och dess 
element samt för att testa variationer på CSS-konstruktioner.</li>

När du har en debug-style. Då går vi vidare.
</ol>
</div>

<h2>4. Byline och kontroller</h2>

<h3>4.1 Byline</h3>

<p>Om du tittar på min sida så ser du att texten 

<p><blockquote>"Urban Vikdahl är en lärare med rötterna i Skellefteå. Han tycker om att hålla på med C#, PHP, HTML, CSS, SQL. 
Men är även intresserad av områden som digital design och CMS (främst Joomla och umbraco)."</blockquote>

<p>En sådan text kallas byline.

<p>[UPPGIFT]

<p>Skapa en egen byline i egen fil (incl/byline.php). Inklundera och placera den sedan på din sida.

<h3>4.2 Kontrollera</h3>

<p>[UPPGIFT]

<p>Kontrollera nu och uppdatera din me-sida om det behövs så den innehåller följande bitar:

<ul>
<li>Header med relaterade länkar</li>
<li>Sidheader med logo</li>
<li>Navigeringsmeny</li>
<li>En byline i separat fil</li>
<li>div#content</li>
<li>Sidfooter</li>
<li>Styingen ser bra ut.</li>
</ul>

<h2>5. Features till siten</h2>



