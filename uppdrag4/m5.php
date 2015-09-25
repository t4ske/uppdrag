<article>
<h1>Moment 5: Stil-editor, filhantering och blocket v.1</h1>

<p>Vi börjar med att göra ett formulär som låter dig uppdatera stylesheeten via ett formulär. 
Därefter gör vi en webbplats för annonser, Blokket. Vi ser hur man kan hantera de vanliga sätten att 
skapa, uppdatera, radera och läsa information.

<p>Detta kursmoment är en fördjupning i formulär och ett exempel av hur informationen 
kan lagras i filer på disk. I nästa kursmoment gör vi nästan samma sak, 
fast vi använder en databas istället.

<p>När du är klar har du en style-editor och en egen kopia av Blokket (en annons-webb-plats). 

<p>Så här kan blokket se ut:

<p><div class="wrap"><iframe src="demo/blokket.php" scrolling="no"></iframe></div>

<p>Det blir en hel del PHP-programmering. Lycka till och kämpa väl. Det är som vanligt tillåtet att 
kopiera kod som finns, men, jag vet att du kommer att försöka på egen hand, in i det längsta. 
Det är ju så vi lär oss. Kämpa väl.

<h2>1. Formulär, spara på disk</h2>

<h3>1.1 En stylesheet editor</h3>

<p>I förra kursmomentet gjorde vi en style-väljare där vi kunde välja mellan olika stylesheets 
som fanns i en katalog. Det är ett praktiskt sätt att testa olika stylesheets, speciellt om man 
snabbt vill visa upp något för en potentiell kund.

<p>Visst vore det en god idé om man dessutom direkt via webbplatsen kunde ändra i en stylesheet? 
Man skulle slippa editera filer lokalt och ladda upp dem till webbplatsen. Låt oss göra en sådan 
“Stylesheet editor” och integrera den tillsammans med style-väljaren.

<p>Så här kan style-editorn se ut:

<p><div class="wrap"><iframe src="demo/style.php?p=edit-stylesheet" scrolling="no"></iframe></div>

<p>Testa min editor och lek lite. Är du med på hur den fungerar?

<p><span class="uppg">[UPPGIFT]</span>

<p>Skapa en stylesheet editor. Gör på egen hand och pröva om vingarna bär, eller följ mina steg.

<p>Så här gjorde jag.

<h3>1.2 Skapa formulär med textarea och knappar</h3>

<p>Jag börjar med att göra ett formulär och utgår från källkoden som användes i style-väljare, 
därefter lägger jag till en textarea och två knappar, “Spara” och “Ångra”. Det blir ett bra första steg.

<p>Alltså:

<ol>
<li><p>Skapa en ny fil, <code>incl/style/edit_stylesheet.php</code>, börja med att kopiera 
all kod från filen <code>incl/style/choose_stylesheet.php</code>.</p></li>
<li><p>Lägg till filen som ett nytt menyval din multisida <code>style.php</code>.</p></li>
<li><p>Redigera text och formulär så att det syns en textarea och två knappar, “Spara” och “Ångra”.</p></li>
</ol>

<p>Lek runt och titta i källkoden. Börja med att göra likadant med din egna sida. Ok? Då går vi vidare.

<h3>1.3 Visa stylesheeten i textarean</h3>

<p>Nu vill vi läsa upp filens innehåll och visa den i textarean. Till det behövs en funktion som kan 
kontrollera att filen finns, läsa upp den från disk och returnera filens innehåll. Om filen inte finns 
vill vi se ett felmeddelande.

<p>En funktion likt följande, getFileContents(), kan lösa detta:

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="php geshi"><p><span class="kw2">function</span> getFileContents<span class="br0">(</span><span class="re0">$aFilename</span><span class="br0">)</span> <span class="br0">{</span>
  <span class="kw1">if</span><span class="br0">(</span><a href="http://www.php.net/is_readable"><span class="kw3">is_readable</span></a><span class="br0">(</span><span class="re0">$aFilename</span><span class="br0">)</span><span class="br0">)</span> <span class="br0">{</span>
        <span class="kw1">return</span> <a href="http://www.php.net/file_get_contents"><span class="kw3">file_get_contents</span></a><span class="br0">(</span><span class="re0">$aFilename</span><span class="br0">)</span><span class="sy0">;</span>
  <span class="br0">}</span> <span class="kw1">else</span> <span class="br0">{</span>
        <span class="kw1">return</span> <span class="st0">"Filen finns ej."</span><span class="sy0">;</span>
  <span class="br0">}</span>
<span class="br0">}</span></pre>
</div>

<p>Jag lägger in funktionen i filen php/common.php.

<p>Funktionen anropas från filen style_parts/edit_stylesheet.php. Filnamnet skickas med som argument till funktionen.

<p>Det behövs en extra säkerhetskoll på filnamnet. Följande kod löser det. Innan vi accepterar 
sökvägen till filen så kontrollerar vi att den valda filen verkligen finns i arrayen som 
returneras från readDirectory(). Det löser säkerhetsproblematiken då vi tillåter att endast 
befintliga filer i en specifik katalog kan visas.

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="php geshi"><p><span class="re0">$filename</span> <span class="sy0">=</span> <span class="kw4">null</span><span class="sy0">;</span>
<span class="kw1">if</span><span class="br0">(</span><a href="http://www.php.net/isset"><span class="kw3">isset</span></a><span class="br0">(</span><span class="re0">$_POST</span><span class="br0">[</span><span class="st_h">'stylesheet'</span><span class="br0">]</span><span class="br0">)</span> <span class="sy0">&amp;&amp;</span> <a href="http://www.php.net/in_array"><span class="kw3">in_array</span></a><span class="br0">(</span><span class="re0">$_POST</span><span class="br0">[</span><span class="st_h">'stylesheet'</span><span class="br0">]</span><span class="sy0">,</span> <span class="re0">$stylesheets</span><span class="br0">)</span><span class="br0">)</span>
<span class="br0">{</span>
  <span class="re0">$filename</span> <span class="sy0">=</span> <span class="re0">$pathToStyles</span> <span class="sy0">.</span> <span class="re0">$_POST</span><span class="br0">[</span><span class="st_h">'stylesheet'</span><span class="br0">]</span><span class="sy0">;</span>
<span class="br0">}</span></pre>
</div>

<p>Stylesheetens innehåll hämtas sedan med följande anrop.

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="php geshi"><p>&lt;textarea&gt;
<span class="kw2">&lt;?php</span> <span class="kw1">if</span><span class="br0">(</span><span class="re0">$filename</span><span class="br0">)</span> <span class="kw1">echo</span> getFileContents<span class="br0">(</span><span class="re0">$filename</span><span class="br0">)</span><span class="sy0">;</span> <span class="sy1">?&gt;</span>
&lt;/textarea&gt;</pre>
</div>

<p>Funkar det för dig också? Är PHP krångligt? Ta det lugnt i så fall. Det brukar falla på plats efterhand. 
Ta en sak i taget så löser det sig.

<p>Då går vi vidare.

<h3>1.4 Spara ändringarna på fil</h3>

<p>Då ska vi spara de ändringar som görs. Detta gör vi genom att skriva ned textareans innehåll till disk, 
vi skriver över den befintliga filen. För att lyckas med detta måste filen vara skrivbar (chmod 666).

<p>Jag lägger till en ny stylesheet, style/stylesheet_editable.css, och sätter rättigheterna till 666.

<p>Jag väljer att göra ett “self-submitting” formulär, ett formulär som submittar (postar) resultatet 
till sig själv. Jag lägger till ett kodstycke som hanterar om användaren trycker på “Spara”-knappen:

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="php geshi"><p><span class="kw1">if</span><span class="br0">(</span><a href="http://www.php.net/isset"><span class="kw3">isset</span></a><span class="br0">(</span><span class="re0">$_POST</span><span class="br0">[</span><span class="st_h">'doSave'</span><span class="br0">]</span><span class="br0">)</span><span class="br0">)</span> <span class="br0">{</span>
  <span class="re0">$resFromSave</span> <span class="sy0">=</span> putFileContents<span class="br0">(</span><span class="re0">$filename</span><span class="sy0">,</span> <a href="http://www.php.net/strip_tags"><span class="kw3">strip_tags</span></a><span class="br0">(</span><span class="re0">$_POST</span><span class="br0">[</span><span class="st_h">'styleContent'</span><span class="br0">]</span><span class="br0">)</span><span class="br0">)</span><span class="sy0">;</span>
<span class="br0">}</span></pre>
</div>

Denna kod kontrollerar om submit-knappen med namnet “doSave” är tryckt (har ett värde), isåfall sparas 
filen med hjälp av funktionen putFileContents(). Funktionen tar filnamnet och innehållet i textarean 
som argument. Dessutom använder vi strip_tags() för att ta bort alla HTML-element och undviker därmed att någon lägger in JavaScript i vår stylesheet. Allt för säkerheten.

Funktionen putFileContents() lägger jag i filen php/common.php. Funktionen kontrollerar att filen är 
skrivbar och skriver sedan över den gamla filen med det nya innehållet. Funktionen ser ut så här:

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="php geshi"><p><span class="kw2">function</span> putFileContents<span class="br0">(</span><span class="re0">$aFilename</span><span class="sy0">,</span> <span class="re0">$aContent</span><span class="br0">)</span> <span class="br0">{</span>
  <span class="kw1">if</span><span class="br0">(</span><a href="http://www.php.net/is_writable"><span class="kw3">is_writable</span></a><span class="br0">(</span><span class="re0">$aFilename</span><span class="br0">)</span><span class="br0">)</span> <span class="br0">{</span>
        <a href="http://www.php.net/file_put_contents"><span class="kw3">file_put_contents</span></a><span class="br0">(</span><span class="re0">$aFilename</span><span class="sy0">,</span> <span class="re0">$aContent</span><span class="br0">)</span><span class="sy0">;</span>
        <span class="kw1">return</span> <span class="st0">"Filen sparades."</span><span class="sy0">;</span>
  <span class="br0">}</span> <span class="kw1">else</span> <span class="br0">{</span>
        <span class="kw1">return</span> <span class="st0">"Filen är inte skrivbar och kunde inte sparas."</span><span class="sy0">;</span>
  <span class="br0">}</span>
<span class="br0">}</span></pre>
</div>

<p>Funktionen returnerar en sträng som säger om det gick bra att spara, 
detta meddelande skriver jag ut för att ge användaren feedback.

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="php geshi"><p><span class="kw2">&lt;?php</span> <span class="kw1">if</span><span class="br0">(</span><a href="http://www.php.net/isset"><span class="kw3">isset</span></a><span class="br0">(</span><span class="re0">$resFromSave</span><span class="br0">)</span><span class="br0">)</span><span class="sy0">:</span> <span class="sy1">?&gt;</span>
&lt;p&gt;&lt;output class="success"&gt;<span class="kw2">&lt;?php</span> <span class="kw1">echo</span> <span class="re0">$resFromSave</span> <span class="sy1">?&gt;</span>&lt;/output&gt;&lt;/p&gt;
<span class="kw2">&lt;?php</span> <span class="kw1">endif</span><span class="sy0">;</span> <span class="sy1">?&gt;</span></pre>
</div>

<p>Glöm inte att filen måste vara skrivbar för alla (chmod 666) för att dina ändringar skall sparas. Det är nästan
enklast att ändra detta med programmet putty...

<h3>1.5 Felkontroller</h3>

<p>Det vore fint om vi skrev ut om filen var skrivbar, då skulle användaren slippa fundera över 
varför ändringarna inte sparas. Det kan spara en hel del frågor från slutanvändaren.

<p>Jag lägger till en kontroll om filen är skrivbar eller ej. Jag skriver ut ett meddelande om 
filen inte är skrivbar, samtidigt avvaktiverar (disable) jag knappen “Spara”. Ändringarna görs 
i filen style_parts/edit_stylesheet.php.

<p>Försök att leta reda på vilka ändringar jag gjort. En ledtråd är att söka i 
filen efter variabeln $isWritable, där hittar du samtliga ändringar som gjordes.

<p>Gör denna sista del med felkontrollerna som ett litet test på om du klarar av att orientera 
dig i PHP-kod. Lyckades du? Om du inte klarade det så kan du komma tillbaka hit lite senare, 
och försöka igen.

<h3>1.6 Sammanfattningsvis</h3>

<p>Det var ett formulär för att spara fil på disk, det kan vara rätt behändigt ibland. 
Med samma teknik går det att spara innehåll i en sida, HTML-kod, och visa upp det. 
Bygger vi vidare på en sådan lösning får vi en variant av ett Content Management System (CMS), 
ett enkelt sätt att jobba med innehåll på webben.

<p>Visst vore det mer lämpligt att spara informationen i en databas, men det kikar vi på i 
nästkommande kursmoment. Vi håller oss till disk denna gången.

<p>Då går vi vidare till nästa del.

<h2>2. Formulär för att skapa, läsa, uppdatera och radera</h2>

<h3>2.1 CRUD och webbplats för annonser</h3>

<p>CRUD är en förkortning för de 4 grundläggande operationerna av persistent lagring, 
Create (skapa), Read (läsa), Update (uppdatera), Delete (radera). Ofta används denna term i samband 
med en databas.

<p>Läs kort om CRUD på Wikipedia.<a href="http://en.wikipedia.org/wiki/Create,_read,_update_and_delete">
http://en.wikipedia.org/wiki/Create,_read,_update_and_delete</a>

<p>Vi skall göra ett exempel på formulär som lagrar information på disk med CRUD-operationerna. 
Ett exempel på detta vore en webbplats för annonser. En sådan webbplats behöver funktioner 
för att skapa annons (Create), läsa annons (Read), uppdatera annonsen (Update) samt för 
att radera annonsen (Delete).

<p>Låt oss göra detta. Ett exempel där man kan skapa nya objekt, läsa dem, uppdatera dem och radera dem. 
Vi tar annonser som exempel och vi bygger vidare på den koden vi gjort i samband med stylesheet-editorn.

<p>I exemplet med stylesheet-editorn så finns stöd för R och U, nu utökar vi exemplet med C och D, 
fast som en liten annons-applikation.

<p>Ok, då kör vi.

<p><span class="uppg">[UPPGIFT]</span>

<p>Skapa Blokket med stöd för att skapa ny annonser, editera befintliga, läsa en eller 
alla annonser samt radera annonser.

<p>Gör på egen hand och pröva om vingarna bär, eller följ mig och se hur jag gör, steg för steg.

<p>Så här gjorde jag.

<h3>2.2 Blokket, initiera</h3>

<p>Jag använder samma princip som för stylesheeten. En katalog med filer, varje fil är en annons. 
Jag behöver göra katalogen skrivbar, detta för att det skall gå att skapa nya filer och ta bort filer.

<p>Jag börjar med att skapa en ny multisida, blokket.php, precis på samma sätt som tidigare. 
Jag väljer att skapa en egen katalog där alla annonser skall finnas, jag lägger katalogen i blokket_parts/data.
Jag stoppar dit ett par filer, testannonser, för att komma igång. Jag gör en första testsida 
som kontrollerar att katalogen är skrivbar samt visar namnen på de filer som finns i katalogen.

<p>Så här blev det för mig:

<p><div class="wrap"><iframe src="demo/blokket.php?p=check" scrolling="no"></iframe></div>

Inget konstigt så långt va? Katalogen skall ha rättigheter 777 och filerna som ligger i 
katalogen skall ha rättigheter 666.

<p>Vill du ha bakgrundsinformation om filrättigheter i Unix så kan du läsa här:
<a href="http://db-o-webb.blogspot.se/2011/02/unix-rattigheter-pa-kataloger-och-filer.html">
http://db-o-webb.blogspot.se/2011/02/unix-rattigheter-pa-kataloger-och-filer.html</a>

<p>Då tar vi nästa steg.

<h3>2.3 Blokket, uppdatera och spara annonser</h3>

<p>Att uppdatera innehållet i en fil gjorde vi i stylesheet-exemplet. 
Jag väljer att kopiera hela den filen och utgår från den. 
Jag ändrar lite variabelnamn för att det skall passa bättre i detta exempel. 
Men, jag behöver inte ändra mycket för att det skall fungera.

<p>Så här blev det för mig. Väldigt likt stylesheet-editorn, som du kan se.

<p><div class="wrap"><iframe src="demo/blokket.php?p=update" scrolling="no"></iframe></div>

<p>Som du kan se så tillåter jag vissa HTML-element i annonstexten. Detta sker genom att ge 
funktionen strip_tags() ett argument med de element som är tillåtna. I exemplet hanteras detta i 
samband med att filen sparas till disk.

<p>Se följande kod.

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="php geshi"><p><span class="kw1">if</span><span class="br0">(</span><a href="http://www.php.net/isset"><span class="kw3">isset</span></a><span class="br0">(</span><span class="re0">$_POST</span><span class="br0">[</span><span class="st_h">'doSave'</span><span class="br0">]</span><span class="br0">)</span><span class="br0">)</span> <span class="br0">{</span>
  <span class="re0">$res</span> <span class="sy0">=</span> putFileContents<span class="br0">(</span><span class="re0">$filename</span><span class="sy0">,</span> <a href="http://www.php.net/strip_tags"><span class="kw3">strip_tags</span></a><span class="br0">(</span><span class="re0">$_POST</span><span class="br0">[</span><span class="st_h">'content'</span><span class="br0">]</span><span class="sy0">,</span> <span class="st0">"&lt;b&gt;&lt;i&gt;&lt;p&gt;&lt;img&gt;"</span><span class="br0">)</span><span class="br0">)</span><span class="sy0">;</span>
<span class="br0">}</span></pre>
</div>

<p>För min del så har jag valt att tillåta HTML-elementen &lt;p&gt;&lt;b&gt;&lt;i&gt;&lt;img&gt;. 
Du kan se exempel på användningen av HTML-elementen i mina annonser.

<p>Ok, det var också en lagom utmaning, eftersom det fungerade i stylesheet-exemplet så blev det inte så svårt att överföra hit. Hoppas att det stämmer för dig också.


<h3>2.4 Blokket, lägga till annons</h3>

<p>Vi jobbar med filer så operationen att lägga till en ny annons innebär att skapa en ny tom fil. 
Jag gör så att användaren kan välja namn på filen. Det blir lite felhantering om filnamnet är tomt 
eller om man anger ett filnamn som redan finns. Sen är det som vanligt en säkerhetsaspekt på detta.

<p>Själva PHP-koden för att skapa filen följer.

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="php geshi"><p><span class="kw1">if</span><span class="br0">(</span><a href="http://www.php.net/isset"><span class="kw3">isset</span></a><span class="br0">(</span><span class="re0">$_POST</span><span class="br0">[</span><span class="st_h">'doCreate'</span><span class="br0">]</span><span class="br0">)</span><span class="br0">)</span> <span class="br0">{</span>
  <span class="re0">$filename</span> <span class="sy0">=</span> <span class="re0">$path</span> <span class="sy0">.</span> <a href="http://www.php.net/basename"><span class="kw3">basename</span></a><span class="br0">(</span><a href="http://www.php.net/trim"><span class="kw3">trim</span></a><span class="br0">(</span><a href="http://www.php.net/strip_tags"><span class="kw3">strip_tags</span></a><span class="br0">(</span><span class="re0">$_POST</span><span class="br0">[</span><span class="st_h">'filename'</span><span class="br0">]</span><span class="br0">)</span><span class="br0">)</span><span class="br0">)</span><span class="sy0">;</span>
  <span class="kw1">if</span><span class="br0">(</span><a href="http://www.php.net/empty"><span class="kw3">empty</span></a><span class="br0">(</span><span class="re0">$_POST</span><span class="br0">[</span><span class="st_h">'filename'</span><span class="br0">]</span><span class="br0">)</span><span class="br0">)</span>
  <span class="br0">{</span>
        <span class="re0">$res</span> <span class="sy0">=</span> <span class="st0">"Filen skapades ej, filnamnet kan ej vara tomt. Välj ett annat filnamn."</span><span class="sy0">;</span>
  <span class="br0">}</span>
  <span class="kw1">else</span> <span class="kw1">if</span><span class="br0">(</span><a href="http://www.php.net/is_file"><span class="kw3">is_file</span></a><span class="br0">(</span><span class="re0">$filename</span><span class="br0">)</span><span class="br0">)</span> 
  <span class="br0">{</span>
        <span class="re0">$res</span> <span class="sy0">=</span> <span class="st0">"Filen skapades ej, den finns redan. Välj ett annat filnamn."</span><span class="sy0">;</span>
  <span class="br0">}</span>
  <span class="kw1">else</span> 
 <span class="br0">{</span>
        <a href="http://www.php.net/file_put_contents"><span class="kw3">file_put_contents</span></a><span class="br0">(</span><span class="re0">$filename</span><span class="sy0">,</span> <span class="kw4">null</span><span class="br0">)</span><span class="sy0">;</span>
        <span class="re0">$res</span> <span class="sy0">=</span> <span class="st0">"Filen skapades."</span><span class="sy0">;</span>
        <span class="re0">$files</span> <span class="sy0">=</span> readDirectory<span class="br0">(</span><span class="re0">$path</span><span class="br0">)</span><span class="sy0">;</span>
  <span class="br0">}</span>
<span class="br0">}</span></pre>
</div>

<p>Så här blev det för mig:

<p><div class="wrap"><iframe src="demo/blokket.php?p=new" scrolling="no"></iframe></div>

<p>Det är inte mycket kod som behövs, men det är lite trixigt att hantera felfallen. 
Jag använder funktionen basename() för att undvika att användaren försöker skapa en fil som heter 
../../moped. Funktionen tar en sträng och returnerar endast filnamnsdelen, i detta fallet moped.

<p>Jag använder funktionen trim() för att ta bort eventuella mellanslag och jag använder strip_tags() 
för att undvika att filen döps med JavaScript-taggar.

<p>Det är enkla sätt att undvika uppenbara säkerhetshål. Det är alltid viktigt att hantera inkommande 
variabler. I princip skall man se till att varje inkommande argument endast innehåller det som förväntas.

<h3>2.5 Blokket, ta bort annons</h3>

<p>Funktionen för att ta bort en fil från disk heter unlink(). Använd den för att införa 
funktionen att ta bort en annons. PHP-koden för att utföra detta följer.

<div class="tip">
<h4>&nbsp; Kod:</h4>
<pre class="php geshi"><p><span class="kw1">if</span><span class="br0">(</span><a href="http://www.php.net/isset"><span class="kw3">isset</span></a><span class="br0">(</span><span class="re0">$_POST</span><span class="br0">[</span><span class="st_h">'doDelete'</span><span class="br0">]</span><span class="br0">)</span><span class="br0">)</span> <span class="br0">{</span>
  <span class="kw1">if</span><span class="br0">(</span><a href="http://www.php.net/isset"><span class="kw3">isset</span></a><span class="br0">(</span><span class="re0">$_POST</span><span class="br0">[</span><span class="st_h">'file'</span><span class="br0">]</span><span class="br0">)</span> <span class="sy0">&amp;&amp;</span> <a href="http://www.php.net/in_array"><span class="kw3">in_array</span></a><span class="br0">(</span><span class="re0">$_POST</span><span class="br0">[</span><span class="st_h">'file'</span><span class="br0">]</span><span class="sy0">,</span> <span class="re0">$files</span><span class="br0">)</span><span class="br0">)</span>
  <span class="br0">{</span>
        <span class="re0">$filename</span> <span class="sy0">=</span> <span class="re0">$path</span> <span class="sy0">.</span> <span class="re0">$_POST</span><span class="br0">[</span><span class="st_h">'file'</span><span class="br0">]</span><span class="sy0">;</span>
        <a href="http://www.php.net/unlink"><span class="kw3">unlink</span></a><span class="br0">(</span><span class="re0">$filename</span><span class="br0">)</span><span class="sy0">;</span>
        <span class="re0">$files</span> <span class="sy0">=</span> readDirectory<span class="br0">(</span><span class="re0">$path</span><span class="br0">)</span><span class="sy0">;</span>
        <span class="re0">$res</span> <span class="sy0">=</span> <span class="st0">"Filen raderades."</span><span class="sy0">;</span>
  <span class="br0">}</span>
  <span class="kw1">else</span>
  <span class="br0">{</span>
        <span class="re0">$res</span> <span class="sy0">=</span> <span class="st0">"Filen finns ej och kunde inte raderas."</span><span class="sy0">;</span>
  <span class="br0">}</span>
<span class="br0">}</span></pre>
</div>

<p>Innan jag raderar filen så väljer jag att titta om den finns på disk. Detta görs genom att se filnamnet
 finns i arrayen. Då kan jag vara säker på att det är en annons och ingen annan fil. Det är lite trixigt 
 det här med att kontrollera inkommande data. Men det är nödvändigt.

<h3>2.6 Blokket, visa annons</h3>

<p>Att visa innehållet i en annons är i princip samma sak som vi gjorde i update-fallet. 
Istället för att visa annonstexten i en textarea så visar vi den i en div. 
Jag löser fallet för att “Visa annons” genom att ta en kopia av update-koden och göra ett par mindre ändringar.

<p>Så här blev det för mig.

<p><div class="wrap"><iframe src="demo/blokket.php?p=show" scrolling="no"></iframe></div>

<p>Ok, bra, det var inte så svårt va? Hoppas det.

<p>Då tar vi sista delen också.

<h3>2.7 Blokket, visa alla annonser</h3>

<p>Sådärja, då finns allt på plats. Vi lägger till ett skript som visar samtliga annonser i form av en 
tabell (<table>). En foreach-loop hjälper oss med detta. Koden för detta blir rätt liten, som omväxling.

<p>Så här ser det ut när det fungerar:</p>

<p><div class="wrap"><iframe src="demo/blokket.php?p=show-all" scrolling="no"></iframe></div>

<h3>2.8 Sammanfattningsvis</h3>

<p>Sådärja, då har vi har skapat en liten Blokket annonsplats och samtidigt lärt oss hantera CRUD-operationerna. 
Bra gjort!


<h2>3. Kontrollera och redovisa</h2>

<h3>3.1 Kontrollera</h3>

<p><span class="uppg">[UPPGIFT]</span>

<p>Kontrollera att allt ser bra ut och att det validerar

<h3>3.2 Redovisa </h3>

<p><span class="uppg">[UPPGIFT]</span>

<p>Skriv redovisningen på din report-sida. Skriv ett stycke (ca 15 meningar) om hur momentet funkade. 
Reflektera över svårigheter, problem, lösningar och resultatet. 
Hur känns det med PHP-programmeringen, har du kommit in i det? 
Är det svårt? Vilka är dina tips till en ovan PHP-programmerare?</p>

<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 
<p>&nbsp;</p> 


</article>	