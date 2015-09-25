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







