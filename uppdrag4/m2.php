<article>
<h1>Moment2: Bygg vidare från grunden</h1>

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

<p>Detta moment tar vid där det förra slutade. Vi bygger helt enkelt vidare på me-sidan. 
Medan vi gör det så försöker vi täcka in så mycket som möjligt av önskningarna från texten ovan. 
Det blir en bra plan för dagen. Lite som ett smörgåsbord, en kompott av vanliga lösningar och tekniker 
för att bygga en webbplats.

<p>När vi är klara så har vi en me-sida i version 2.0.

<p><strong>Då kör vi igång!</strong>

<h2>1. Utveckla din footer.</h2>

<p>Vi vill ha en snygg och användbar footer.

<p>Se till att den innehåller länkar till alla validatorer, manualer och källkoden.
Dessutom skall den se bra ut.

<p><span class="uppg">[UPPGIFT]</span>

<p>Studera min fil <a href="demo/viewsource.php?dir=incl&amp;file=footer.php">
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

<p><span class="uppg">[UPPGIFT]</span>

<p>Lägg in stöd för html5-taggar i äldre webbläsare genom att lägga till koden ovan i din stylesheet.

<h2>2.2 Använd HTML5 element i me-sidan</h2>

<p>I min me-sida har jag som sagt använt en del HTML5-element i stället för &lt;div&lt;-element. 
Öppna min <a href="demo/me.php">me-sida</a> i webbläsaren och studera källkoden (högerklicka och välj “Visa källkod”).

<p><span class="uppg">[UPPGIFT]</span>

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

<p><span class="uppg">[UPPGIFT]</span>

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

<p><span class="uppg">[UPPGIFT]</span>

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

<p><span class="uppg">[UPPGIFT]</span>

<p>Skapa en egen byline i egen fil (incl/byline.php). Inklundera och placera den sedan på din sida.

<h3>4.2 Kontrollera</h3>

<p><span class="uppg">[UPPGIFT]</span>

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

<p>Det finns ett par saker, features, som är tillagda i min me-sida. Låt oss ta en snabbtitt på några av dem.

<h2>5.1 Favicon</h2>

<p>En favicon är den icon som visas tillsammans med länken till sidan. En del webbläsare visar den även i url-fältet:

<p><img src="img/favicon.jpg">

<p>&nbsp;</p>

<p>En favicon defineras med en &lt;link&gt; i sidans header, inom HTML-elementet &lt;head&gt;. Se kod nedan:

<div class="tip">
<h4>&nbsp; Kod:</h4>
	<p>&lt;link rel="shortcut icon" href="img/favicon.ico"&gt;
</div>

<p>En favicon kan du antingen rita själv, skapa från en bild, eller ladda ner färdig. 
Det finns resurser på nätet för detta. Prova t.ex.<a href="http://www.favicon.cc/">favicon.cc</a> eller
<a href="http://www.favicon-generator.org/">favicon-generator</a>. 

<p><span class="uppg">[UPPGIFT]</span>

<p>Lägg till en favicon till din me-sida.

<h2>6.2 Alltid visa scrollbar</h2>

<p>Om en sida är centrerad kan den “flippa” beroende på om scrollbaren visas eller ej. 
På långa sidor visas scrollbaren men på korta sidor visas den ej. Ett sätt att undvika 
detta är att alltid visa scrollbaren.

<p>Det du behöver göra är att lägga till nedanståend kod i din stylesheet. 
Då visas alltid scrollbaren, oavsett hur lång sidan är.


<div class="tip">
<h4>&nbsp; Kod:</h4>
<p><pre class="html4strict geshi">
	html { overflow-y: scroll; }
</pre>
</div>

<p><span class="uppg">[UPPGIFT]</span>

<p>Lägg till definitionen för att alltid visa scrollbaren i din me-sida.

<h2>5.3 Visa menyval för nuvarande sida</h2>

<p>Min navigationsmeny visar (svengelska: “highlightar”) aktuellt menyval. Se den ljusgrå pilen i bilden nedan 
eller understrykningen i menyn högst upp på denna sida.

<p><img alt="bild som visar min lösning av uppdraget" src="img/demo.jpg">

<p>Man kan markera 'aktiv' sida på många sätt. Välj ett som du gillar. Bara det blir snyggt!

<p>Även kodmässigt kan man lösa detta på många olika sätt. Här nedan visar jag ett sätt.Lösningen innebär att 
definera ett id per sida och använda detta id för att styla elementen i stylesheeten, det är en mix av HTML, 
CSS och PHP.

<p>I HTML-koden för en sida (me.php) kan man se till att ett id-skrivs ut.

<!-- The body id helps with highlighting current menu choice -->
<body id='me' >

Så här gjorde jag i me.php, jag valde ett id som hette samma sak som sidan.

1) Sätt ett id på HTML-elementet &lt;body&gt; med PHP. Gör det genom att definera  
id:t för respektive sida meed en variabel, $pageId.

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="php geshi"><p><span class="kw2">&lt;?php</span>
	<span class="re0">$pageId</span> <span class="sy0">=</span> <span class="st0">"me"</span><span class="sy0">;</span>
<span class="sy1">?&gt;</span></pre>
</div>

<p>använd sedan detta denna variabel för att skriva ut sidans-id:

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="html4strict geshi">
<p><span class="sc-1">&lt;!-- The body id helps with highlighting current menu choice --&gt;</span>
<span class="sc2">&lt;body&lt;?php if<span class="br0">(</span>isset<span class="br0">(</span>$pageId<span class="br0">)</span><span class="br0">)</span> echo <span class="st0">" id='$pageId' "</span>; ?&gt;</span>&gt;
</pre>
</div>

<p>Skriv även dit samma id för alla menyval. Då blir det enkelt att skriva CSS som markerar det specifika menyvalet.

<p>Så här kan koden för navigationsmenyn se ut:

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="html4strict geshi">
<p><span class="sc-1">&lt;!-- Main navigation menu --&gt;</span>
<span class="sc2">&lt;nav <span class="kw3">class</span><span class="sy0">=</span><span class="st0">"navmenu"</span>&gt;</span>
 <span class="sc2">&lt;<a href="http://december.com/html/4/element/a.html"><span class="kw2">a</span></a> <span class="kw3">id</span><span class="sy0">=</span><span class="st0">"me"</span>     <span class="kw3">href</span><span class="sy0">=</span><span class="st0">"me.php"</span>&gt;</span>Me<span class="sc2">&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/a.html"><span class="kw2">a</span></a>&gt;</span>
 <span class="sc2">&lt;<a href="http://december.com/html/4/element/a.html"><span class="kw2">a</span></a> <span class="kw3">id</span><span class="sy0">=</span><span class="st0">"report"</span> <span class="kw3">href</span><span class="sy0">=</span><span class="st0">"report.php"</span>&gt;</span>Redovisning<span class="sc2">&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/a.html"><span class="kw2">a</span></a>&gt;</span>
 <span class="sc2">&lt;<a href="http://december.com/html/4/element/a.html"><span class="kw2">a</span></a> <span class="kw3">id</span><span class="sy0">=</span><span class="st0">"guide"</span>  <span class="kw3">href</span><span class="sy0">=</span><span class="st0">"guide.php"</span>&gt;</span>Guider<span class="sc2">&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/a.html"><span class="kw2">a</span></a>&gt;</span>
 <span class="sc2">&lt;<a href="http://december.com/html/4/element/a.html"><span class="kw2">a</span></a> <span class="kw3">id</span><span class="sy0">=</span><span class="st0">"source"</span> <span class="kw3">href</span><span class="sy0">=</span><span class="st0">"viewsource.php"</span>&gt;</span>Källkod<span class="sc2">&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/a.html"><span class="kw2">a</span></a>&gt;</span>
<span class="sc2">&lt;<span class="sy0">/</span>nav&gt;</span>
</pre>
</div>

<p>Då är det bara att skriva CSS-regler som stämmer överens för aktiv sida och aktivt menyval.

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="css geshi"><p><span class="coMULTI">
/* highlight current choice in navigation menu--------------------------------------------------------*/</span>
body<span class="re0">#me</span> a<span class="re0">#me</span><span class="sy0">,</span>
body<span class="re0">#report</span> a<span class="re0">#report</span><span class="sy0">,</span>
body<span class="re0">#guide</span> a<span class="re0">#guide</span><span class="sy0">,</span>
body<span class="re0">#source</span> a<span class="re0">#source</span> <span class="br0">{</span><span class="kw1">background</span><span class="sy0">:</span><span class="re0">#858585</span><span class="sy0">;</span><span class="kw1">border</span><span class="sy0">:</span><span class="re3">2px</span> <span class="kw2">solid</span> <span class="re0">#656565</span><span class="sy0">;</span><span class="br0">}</span></pre>
</div>

<p>Denna lösning fungerar bra för mindre webbplatser. Nackdelen är att det är en hårdkodad lösning, 
för varje nytt menyval så måste man uppdatera koden. När det blir fler sidor så är det bättre att finna en 
flexiblare lösning som innefattar mer PHP-kodande. Men det överlåter vi till en senare övning.

<p><span class="uppg">[UPPGIFT]</span>

<p>Lägg till stöd i din me-sida så att den visar vilken sida man för tillfället besöker 
genom att markera detta menyval.

<h2>5.4 Möjlighet att ändra style i enskilda sidor via $pageStyle</h2>

<p>Ibland vill man lägga till style som är specifik för endast en sida. Istället för att ändra i stylesheeten
 så vill jag inkludera stylen i sidan, inom &lt;style&gt;&lt;/style&gt; taggar. Det finns tillfällen då detta är 
 behändigt.

<p>Jag har definerat en PHP-variabel för detta syfte, $pageStyle, den fungerar på samma sätt 
som $pageTitle och $pageId. Om den variableln har ett värde för sidan så skrivs stylingen ut.
Följande kod-snutt klarar biffen.

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="html4strict geshi"><p><span class="sc-1">&lt;!-- Each page can set $pageStyle to create additional style --&gt;</span>
<span class="sc2">&lt;?php if<span class="br0">(</span>isset<span class="br0">(</span>$pageStyle<span class="br0">)</span><span class="br0">)</span> : ?&gt;</span>
 <span class="sc2">&lt;<a href="http://december.com/html/4/element/style.html"><span class="kw2">style</span></a> <span class="kw3">type</span><span class="sy0">=</span><span class="st0">"text/css"</span>&gt;</span>
   <span class="sc2">&lt;?php echo $pageStyle; ?&gt;</span>
 <span class="sc2">&lt;<span class="sy0">/</span><a href="http://december.com/html/4/element/style.html"><span class="kw2">style</span></a>&gt;</span>
<span class="sc2">&lt;?php endif; ?&gt;</span></pre>
</div>

<p>Ovanstående if-sats skriver ut innehållet i $pageStyle om den är definerad och har ett värde skilt från null. 
Innehållet i variabeln omringas av elementen &lt;style&gt; och &lt;/style&gt;. Värdet på variabeln kan sedan 
defineras i en sida. Så här kan det se ut:

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="php geshi"><p><span class="co1">// Define style thats specific for this page</span>
<span class="re0">$pageStyle</span> <span class="sy0">=</span> <span class="st_h">'
figure { 
 -webkit-border-radius: 10px;
 -moz-border-radius: 10px;
 border-radius: 10px;
 border-color:#5C0A0A;
 -moz-box-shadow: 10px 10px 5px #8A0F0F;
 -webkit-box-shadow: 10px 10px 5px #8A0F0F;
 box-shadow: 10px 10px 5px #8A0F0F;
}
'</span><span class="sy0">;</span>
&nbsp;</pre>
</div>

<p>Ovanstående kod definerar variabeln och lägger till en style så att alla figure får en ram med runda hörn 
och en tredimensionell skugga. Observera att variabeln måste få sitt värde innan header.php inkluderas.

<p><span class="uppg">[UPPGIFT]</span>

<p>Lägg till stöd för $pageStyle i din me-sida och använd den för att testa att det fungerar.

<h2>5.5 Inkludera source.php i din webbplats</h2>

<p>Den externa koden som används för att visa källkoden, source.php, är numera integrerad i min me-sida.
Alltså inte bara länkad från footern. Det är sidan viewsource.php som inkluderar source.php och skriver ut dess 
innehåll tillsammans med webbplatsens header och footer.

<p>Detta sker genom en kombination av include() och användandet av variabler.

<p>Jag valde att lägga filen source.php i en egen katalog, src/. Min tanke är att lägga externa PHP-komponenter 
i src-katalogen. Det kommer att bli fler liknande lösningar innan uppdraget är över. Det blir enklare att ha 
ordning och reda i katalogstrukturen. 

<p><span class="uppg">[UPPGIFT]</span>

<p>Integrera source.php i din me-sida på liknande sätt som jag gjort i 
<a href="demo/viewsource.php?dir=&amp;file=viewsource.php">min viewsource.php</a>.
Studera min källkoden om du får problem, se speciellt rad 15-17 och rad 21.

<h2>6. Avslutningsvis</h2>

<p>Detta räcker för tillfället. Det blev en blandad mix av HTML, CSS  och lite PHP.

<p>Se till att du gjort alla uppgifterna. Se också till att du verkligen tar dig tid och 
funderar igenom allt. Du behöver baskunskaperna i HTML, CSS och PHP (det krävs än mer senare i utbildningen).

<h3>6.1 Reflektera och redovisa</h3>

<p><span class="uppg">[UPPGIFT]</span>

<p>Skriv redovisningen på din me-sida. Skriv ett stycke (ca 15 meningar) om hur momentet funkade. 
Reflektera över svårigheter, problem, lösningar och resultat. Beskriv hur väl du kan HTML/CSS (nybörjare, erfaren). 
Me-sidan börjar bli en liten webbplats, vad tycker du om dess struktur av filer och kataloger, 
känns det okey eller ovant?

<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 


</article>	












