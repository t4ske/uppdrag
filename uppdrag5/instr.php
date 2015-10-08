<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>SQL - introduktion och grunder.</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600,700' rel='stylesheet' type='text/css'>
</head>

<body>
	<header><span>Uppdrag 05 :</span> SQL</header>

	<article>
		<h1>Om uppdraget</h1>
		<p>Här har du möjligheten att, i din portfolio, visa hur mycket SQL du kan. <strong>Passa på att imponera på företagen!</strong></p>

		<p>Uppdraget består av uppgifter där du först bygger ett ramverk, sedan skapar tabeller, fyller dem med innehåll och 
		därefter använder SQL-frågor för att söka ut och bearbeta innehållet. Du visar att du kan de vanliga förekommande konstruktionerna 
		— se till att du behärskar dem ordentligt och du kommer att ha en god grund för att behärska databaser i många sammahang. 
		De första sql-satserna är enkla emedan de mot slutet kan kräva lite mer, allt beroede på dina förkunskaper.</p>

		<h3>Resurser</h3>
		<p>För att klara av alla uppgifter nedan kan du välja att låna en bok (t.ex. på campusbilioteket), använda internet, fråga kamrater,
		lyssna på lärargenomgångar och gå igenom en webbkurs som t.ex. <a href="https://www.codecademy.com/courses/learn-sql">SQL-kursen på CodeCademy</a>.
		Framför allt är det viktig att du lägger ned timmar i form av självläsning, googlande, funderande och provar dig fram. Det är ju så du lär dig...</p>
	
		<h3>Beskrivning</h3>
		<p>Bygg ett webb-ramverk som använder text-filer med beskrivning, sql-sats och resultat-fråga. Ramverket skall vid klickning på en knapp (länk) 
		ladda rätt fil presentera beskrivningen, köra SQL-kommandot och visa resultatet av SQL-uttrycket.</p>

		<p>Ramverket skall använda funktioner (eller klasser om du hellre vill det) för att skapa dababaskoppling, ladda fil, 
		ta fram beskrivning, ta fram sql-uttrycket och köra det gentemot databasen, samt visa resultatet (även det kommer att innebära att köra en 
		sql-fråga och visa resultatet av den frågan). </p>

		<p>Varje fil som laddas skall innehålla en del för beskrivnign (html-kod), en del för sql-uttryck, och en del för resultat-fråga. Som avgränsare
		mellan varje del kan du använda en rad-avgränsare, dvs en rad med en speciell kombination av tecken, jag valde t.ex. att använda ==******== 
		och ==??????== som radavgränsare mellan beskrivning/sql och sql/resultat.</p>

		<p>Ett sql-uttryck med beskrivning och resultat i varje fil, så är det tänkt.</p>

		<p>De sql-uttryck som du (minst) skall få till och förklara hittar du nedan under avsnittet övningar.

		<p>Om du inte har en aning om hur ovanstående kan göras så titta på min färdiga lösning här.</p>
		<p>Om du fortfarande inte har en aning så föreslår jag att du går och lyssnar på genomgångarna (som kommer att vara av typen, lyssna+anteckna, 
		gör sedan enligt anteckningarna - vilket tvingar dig att fundera en gång till och förhoppningsvis så lär du dig då mer)</p>


		<h3>Övningar</h3>

		<p>Följande övningar handlar om kurser och lärare på ett universitet - tanken är att det ska kunna ge dig en lite inblick in den värden...</p>

		<p><strong>Kom ihåg att varje övning skall ge upphov till en fil med beskrivning, sql-uttryck och resultat.</strong></p>

		<p>Då kör vi igång:</p>

		<ol>
			<p>Skapa databas</p>
			<li>Skapa en ny databas, kalla den Skolan. </li>
			<li>Se till att databasen Skolan används i fortsättnigen (för efterföljande kommandon). </li>
			<li>Radera databasen Skolan.</li>
			<li>Återskapa databasen Skolan (detta blir ingen ny fil - klicka bara på din knapp)</li>

			<p>Skapa tabell</p>
			<li>Skapa tabellen Lärare (i databasen Skolan) enligt följande: 
			<table style="width:400px; border:1px solid #ccc;">
				<thead>
				  <tr><th colspan="2" style="text-align:center; background:#eee">Lärare</th></tr>
				<tr>
				  <th>Namn</th>
				  <th>Datatyp</th>
				</tr>
				</thead>
				<tbody>
				<tr>
				  <td>akronymLarare</td>
				  <td>CHAR(3)</td>
				</tr>
				<tr>
				  <td>avdelningLarare</td>
				  <td>CHAR(3)</td>
				</tr>
				<tr>
				  <td>namnLarare</td>
				  <td>CHAR(20)</td>
				</tr>
				<tr>
				  <td>lonLarare</td>
				  <td>INT</td>
				</tr>
				<tr>
				  <td>&nbsp;foddLarare</td>
				  <td>DATETIME</td>
				</tr>
				</tbody>
			</table>
			</li>
			<li>Radera tabellen Lärare</li>
			<li>Återskapa tabellen Lärare (detta blir ingen ny fil - klicka bara på din knapp)</li>

			<p>Lägg in data</p>
			<li>Lägg in data för 10 lärare med komandot INSERT. <br> Så här skall resultatet bli (om alla har samma går det enkelt att jämföra 
			om SQL-satser ger rätt resultat):<br>
			<img src="img/larare.jpg" alt="bild på lärartabellen" style="width: 400px;">
			</li>

			<p>Radera och återskapa</p>
			<li>Radera läraren Mikael.</li>
			<li>Radera alla som jobbar på avdelningen AIS.</li>
			<li>Radera samtliga i tabellen, men begränsa antalet rader som får raderas till 2 (LIMIT).</li>
			<li>Radera samtliga lärare. Vilket bör raderat 5 återstående lärare (5 rader i tabellen).</li>
			<li>Återskapa alla lärare igen. Du skall nu ha en tabell med 10 lärare. (detta blir ingen ny fil - klicka bara på din knapp)</li>

			<p>Oops, vi glömde ett fält i tabellen Lärare. Vi vill nämligen lagra lärarens kompetens som en siffra mellan 0-10.
			Ofta vill man kunna ändra befintlig tabellstruktur och ta bort, modifiera eller lägga till nya kolumner i en tabell. 
			Detta görs med kommandot ALTER TABLE</p>
			<li>Lägg till kolumnen kompetensLarare (integer) i tabellen Larare med hjälp av kommandot ALTER TABLE.</li>
			<li>Ta bort samma kolumn med kommandot ALTER TABLE DROP COLUMN.</li>
			<li>Lägg till samma kolumn igen, modifiera så att kolumnen defineras med default-värdet 5 
			(DEFAULT) och att den inte kan innehålla NULL-värden (NOT NULL).</li>

			<p>Det har skett en lönerevision för lärarna, använd UPDATE för att genomföra följande ändringar:<p>

			<li>Mikaels kompetens är nu 7 och lönen har ökat till 21 000.</li>
			<li>Mats-Olas lön har ökat med 6 000.</li>
			<li>Bettys kompetens är nu 9 och hennes lön är 21 000.</li>
			<li>Andreas lön har minskat med 1 200.</li>
			<li>Alla lärare får en extra lönebonus på 10%. Se till att det läggs in i tabellen.</li>

			<p>Välj ut data med SELECT-WHERE</p>
			<li>Visa alla rader i tabellen där avdelningLarare = ‘AIS’.</li>
			<li>Visa de rader som har en akronym som börjar med bokstaven ‘M’ (ledtråd LIKE).</li>
			<li>Visa de rader vars lärares namn innehåller bokstaven ‘o’.</li>
			<li>Visa de rader där lärarna tjänar 20 000 eller mer.</li>
			<li>Visa de rader där lärarens kompetens är större än 5 och lönen är 20 000 eller större.</li>
			<li>Visa rader som innehåller lärarna MOS, MOL, BBE (ledtråd IN).</li>

			<p>Sortering - ORDER BY</p>
			<li>Skriv endast ut namnen på alla lärare och vad de tjänar.</li>
			<li>Sortera listan på namnet, både i stigande och sjunkande ordning.</li>
			<li>Sortera listan på lönen, både i stigande och sjunkande ordning. Vem tjänar mest och vem tjänar minst?</li>
			<li>Välj ut de tre som tjänar mest och visa dem (ledtråd LIMIT).</li>

			<p>Alias är bra att använda när man jobbar med många tabeller och behöver ändra namn på kolumnerna i SELECT-satsen, 
			eller när man vill ge en kolumn ett alternativt namn,
			eller när man vill korta ned ett långt kolumnnamn så att SELECT-satsen blir enklare att skriva.</p>

			<li>Visa lärarnas namn och lön i en tabell med kolumnrubrikerna Lärare och Lön.</li>
			<li>Visa lärarnas namn, avdelning och lön i en tabell med kolumnrubrikerna Lärare, Avdelning och Lön.</li>

			<p>Att använda MIN() och MAX()</p>

			<li>Hur mycket är den högsta lönen som en lärare har och vem har den?</li>
			<li>Hur mycket är den lägsta lönen som en lärare har och vem har den?</li>

			<p>Använd de inbyggda aggregerande funktionerna SUM(), COUNT(), och AVG() tillsammans med GROUP BY, för att räkna ut följande:</p>

			<li>Hur många lärare jobbar på de olika avdelningarna?</li>
			<li>Hur mycket betalar respektive avdelning ut i lön varje månad?</li>
			<li>Hur mycket är medellönen för de olika avdelningarna?</li>

			<p>Vill man bara visa de avdelningar som har högre medellön än 15 000 kan man använda HAVING. 
			Det fungerar ungefär som WHERE, fast det går att använda med aggregerande funktioner och de kolumner som används i GROUP BY raden.</p>

			<li>Visa endast de avdelningar vars medellön är över 18 000.</li>
			<li>Visa de vanligaste lönerna, ignorera löner som endast en lärare har.</li>

			<p>Strängar</p>

			<li>Skriv en SELECT-sats som skriver ut Avdelning och Lärare i samma kolumn (t. ex. APS/MOS). 
			Tips: Att slå ihop strängar kallas att konkatenera/concatenate.</li>
			<li>Gör om utskriften av avdelning/lärare så att som skrivs ut enbart har små bokstäver.</li>

			<p>Datum och tid</p>

			<li>Skriv en SELECT-sats som endast visar dagens datum.</li>
			<li>Gör en SELECT-sats som visar samtliga lärare, deras födelseår, dagens datum och klockslag.
			Se <a href="http://dev.mysql.com/doc/refman/5.6/en/date-calculations.html" target="_blank">manualen</a> för tips</li>

			<p>Vyer är smidiga när SELECT-satserna blir lite väl stora.</p>

			<li>Ta fram din senaste SELECT-sats med lärarens namn och ålder. 
			<li>Skapa en vy “VLarare” (ledtråd CREATE VIEW) baserat på den SELECT-satsen.</li>
			<li>Gör en SELECT-sats som visar innehållet i vyn.</li>
			<li>Beräkna medelåldern för samtliga lärare.</li>
			<li>Radera vyn med DROP VIEW (vill du ändra en befintlig vy kan du använda ALTER VIEW)</li>
			<li>Skapa en ny vy “VLarare2” som innehåller samtliga kolumner från tabellen Lärare inklusive en ny kolumn med lärarens ålder.</li>
			
			<p>Urval från vy</p>
			<li>Gör en SELECT-sats som beräknar medelåldern på respektive avdelning utifrån vyn ovan (ledtråd GROUP BY avdelningLarare).</li>
			Visa avdelningens namn och medelålder.</li>
			<li>Uppdatera SELECT-satsen så att den även visar medellönen per avdelning.</li>
			<li>Uppdatera SELECT-satsen igen så att vyn avrundar siffrorna till heltal 
			(ledtråd <a href="http://dev.mysql.com/doc/refman/5.6/en/numeric-functions.html">numeriska funktioner</a>).</li>

			<p>Vy på vy</p>
			<li>Du har en SELECT-sats som visar avdelningarnas namn, medellön och medelålder (föregående uppgifter).</li>
			<li>Skapa en ny vy “VAvdelningsRapport” av denna SELECT-sats. Det blir så att säga en vy som innehåller en vy. Funkar jättebra och är smidigt.
			<li>Gör SELECT * från din sista vy.</li>

			<p>Skapa fler tabeller. En skola har kurser som ges vid olika kurstillfällen. Vid varje kurstillfälle finns det en lärare 
			som är kursansvarig. Låt oss skapa tabeller för Kurs och Kurstillfalle.</p>

			<li>Skapa nedanstående tabeller med SQL. 
			Leta i refmanualen om något är oklart, till exempel så vill du kanske slå upp AUTO_INCREMENT.

			<table style="width:400px; border:1px solid #ccc;">
			<thead>
			   <tr><th colspan="2" style="text-align:center; background:#eee">Kurs</th></tr>
			<tr>
			  <th>Kolumn</th>
			  <th>Datatyp</th>
			</tr>
			</thead>
			<tbody>
			<tr>
			  <td>kodKurs</td>
			  <td>CHAR(6) PRIMARY KEY NOT NULL</td>
			</tr>
			<tr>
			  <td>namnKurs</td>
			  <td>CHAR(40)</td>
			</tr>
			<tr>
			  <td>poangKurs</td>
			  <td>FLOAT</td>
			</tr>
			</tbody>
			</table>

			<table style="width:400px; border:1px solid #ccc;">
			<thead>
			   <tr><th colspan="2" style="text-align:center; background:#eee">Kurstillfälle</th></tr>
			<tr>
			  <th>Kolumn</th>
			  <th>Datatyp</th>
			</tr>
			</thead>
			<tbody>
			<tr>
			  <td>idKurstillfalle</td>
			  <td>INT AUTO_INCREMENT PRIMARY KEY NOT NULL</td>
			</tr>
			<tr>
			  <td>Kurstillfalle_kodKurs</td>
			  <td>CHAR(6) NOT NULL</td>
			</tr>
			<tr>
			  <td>Kurstillfalle_akronymLarare</td>
			  <td>CHAR(3) NOT NULL</td>
			</tr>
			<tr>
			  <td>lasperiodKurstillfalle</td>
			  <td>INT NOT NULL</td>
			</tr>
			</tbody>
			</table>

			</li>

			<p>Sekundärnycklar. Det är bra att ange främmande nycklar i tabellerna. 
			Läs i <a href="http://dev.mysql.com/doc/refman/5.6/en/create-table-foreign-keys.html">refmanualen om ‘FOREIGN KEY’</a>.</p>

			<li>Radera tabellen Kurstillfälle</li>
			<li>Skapa Kurstillfälle med främmande nycklar. (Tips: FOREIGN KEY - REFERENCES).</li>

			<p>En installation av databasen MySQL har en förvald teckenkodning på systemnivå, databasnivå, tabell och kolumnnivå. 
			Den förvalda teckenkodningen kan skilja sig mellan olika miljöer. Det är därför att rekommendera att man skapar sina tabeller 
			och explicit anger vilken teckenkodning som skall användas.

			<p>Detta kan göras på tabellnivå för alla kolumner i en tabell. Så här går det till:

			<pre>			--
			-- Ange teckenkodning för en tabell
			--
			CREATE TABLE t1 (i INT) CHARACTER SET utf8;
			CREATE TABLE t2 (i INT) ENGINE = INNODB CHARACTER SET utf8;
			</pre>

			<p>Ovan skapas två tabeller med teckenkodning enligt UTF-8 och den sista tabellen får även lagringsmotorn INNODB. De rader som har
			dubbla minustecken (--) är kommentarsrader. Med andra ord: -- innebär SQL-kommentar. 

			<p>Teckenkodningen påverkar inte enbart lagringen av information, även kommunikationen mellan klient och server 
		    påverkas av teckenkodningen. För att hantera kommunikationen enligt UTF-8 så måste klienten och servern informeras om detta.</p>

		    <pre>			--
			-- Bestäm teckenkodning till UTF-8 på kommunikation mellan klient och server
			--
			SET NAMES 'utf8';
			</pre>

			<p>Ofta glöms ovan bort och då fungerar inte teckenkodningen som tänkt. (Det visas konstiga tecken för i stället för
			 Å,Ä och Ö.)</p>

			<p>Titta kort i manualen om <a href="http://dev.mysql.com/doc/refman/5.6/en/charset.html">teckenkodning</a>.</p>

			<p>Med det sagt är det nu dags att lägga in lite data i de två nya tabellerna:</p>

			<li>Skapa en sql-sats (INSERT) som fyller tabellen Kurs med följande data:

			<table style="width:400px; border:1px solid #ccc;">
			<thead>
			   <tr><th colspan="2" style="text-align:center; background:#eee">Kurs</th></tr>
			<tr>
			  <th>&nbsp;kodKurs</th>
			  <th>namnKurs</th>
			  <th>poangKurs</th>
			</tr>
			</thead>
			<tbody>
			<tr>
			  <td>DV1106</td>
			  <td>Databasteknik och Webbapps</td>
			  <td>7.5</td>
			</tr>
			<tr>
			  <td>DV1219</td>
			  <td>Databasteknik</td>
			  <td>7,5</td>
			</tr>
			<tr>
			  <td>PA1106</td>
			  <td>Individuellt Projekt</td>
			  <td>7,5</td>
			</tr>
			</tbody>
			</table>
			</li>

			<li>Skapa en sql-sats (INSERT) som fyller tabellen Kurstillfälle med följande data:

			<table style="width:400px; border:1px solid #ccc;">
			<thead>
			   <tr><th colspan="2" style="text-align:center; background:#eee">Kurstillfälle</th></tr>
			<tr>
			  <th>Kurstillfalle_kodKurs</th>
			  <th>Kurstillfalle_akronymLarare</th>
			  <th>lasperiodKurstillfalle</th>
			</tr>
			</thead>
			<tbody>
			<tr>
			  <td>DV1106</td>
			  <td>MOS</td>
			  <td>1</td>
			</tr>
			<tr>
			  <td>DV1106</td>
			  <td>MOS</td>
			  <td>4</td>
			</tr>
			<tr>
			  <td>DV1219</td>
			  <td>CJH</td>
			  <td>2</td>
			</tr>
			<tr>
			  <td>DV1219</td>
			  <td>MOS</td>
			  <td>3</td>
			</tr>
			<tr>
			  <td>PA1106</td>
			  <td>MOL</td>
			  <td>1</td>
			</tr>
			<tr>
			  <td>PA1106</td>
			  <td>BBE</td>
			  <td>2</td>
			</tr>
			</tbody>
			</table>

			</li>

			<p>Kontrollera tabellen Kurs är fylld med korrekt data, enligt ovan, med en SELECT-sats.</p>

			<p>Kontrollera tabellen Kurstillfälle är fylld med korrekt data, enligt ovan, med en SELECT-sats.</p>

			<p>Hämta data från flera tabeller</p>

			<li>Visa alla kurstillfällen tillsammans med kursens namn med en SELECT-WHERE-sats.</li>
			<li>Gör en vy av föregående SELECT-sats. Vyn skall visa samtliga kurstillfällen med alla detaljer om kursen.</li>
			
			<p>Nu vill du se all information om den kursansvarige i en och samma rapport. Det innebär att du måste 
			länka samma information från samtliga 3 tabeller.</p>

			<li>Utöka därför SELECT-satsen som du gjorde nyss med Lärar-tabellen (eller ännu bättre med Lärar-vyn som även innehåller kolumnen ålder).</li>
			<li>Skapa en vy av den slutliga SELECT-satsen när du är klar.</li>
			<li>Använd vyn och gör en SELECT-sats som visar alla kurstillfällen. 
			Följande information skall visas för varje kurstillfälle: kurskod, kursnamn, läsperiod och kursansvariges namn.</li>


			<p>Detta sätt att hämta data från flera tabeller, och koppla ihop dem med WHERE är enkelt 
			och du kan använda det om du vill. Men det är inte optimalt. Ett mer korrekt sätt att använda (JOIN - ON) 
			vilket du får öva/visa/klara av i nästföljande uppgifter.</p>

			<li>Provkör nedanstående SELECT-JOIN-ON-sats som skall visa en översikt av kurstillfällen med respektive kursansvarig.

			<pre>
			--
			-- Inner join av samtliga tabeller.
			--
			SELECT
			  K.kodKurs AS Kurskod,
			  K.namnKurs AS Kursnamn,
			  Kt.lasperiodKurstillfalle AS Läsperiod,
			  CONCAT(L.namnLarare, ' (', L.akronymLarare, ')') AS Kursansvarig
			FROM Kurstillfalle AS Kt
			  INNER JOIN Kurs AS K
			    ON Kt.Kurstillfalle_kodKurs = K.kodKurs
			  INNER JOIN Larare AS L
			    ON Kt.Kurstillfalle_akronymLarare = L.akronymLarare
			 ORDER BY K.kodKurs;
			 </pre>
			 </li>

			 <p>När man jobbar med många tabeller så blir SQL-satserna ofta långa. 
			 Därför kan det vara bra att anamma en struktur att skriva dem på, ungefär som ovan, 
			 använd tab för att strukturera koden.</p>

			 <li>Vad är medelåldern på kursansvariga på kursen PA1106? (Tips: utgå ifrån lämplig vy och JOINa sedan)</li>
			 <li>Vad är medellönen för de kursansvariga på kurser som ligger inom ämnet Programvaruteknik. 
			 Dvs som har en kurskod som startar med ‘PA’. (Tips: utgå ifrån lämplig vy och JOINa sedan)</li>

			 <p>Subquerys</p>

			 <p>Ibland blir SQL-frågorna lite kluriga och det finns olika sätt att lösa dem, 
			 helt eller delvis. Försök att lösa följande frågor:</p>

			<li>Vilken/vilka lärare har flest uppdrag som kursansvarig?</li>
			<li>Visa en lista på de lärare som har minst antal tillfällen som kursansvarig.</li>


		</ol>


	</article>

</body>
</html>