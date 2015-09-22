<h1>INITIERA OCH KONTROLLERA DATABASEN</h1>

<h4>Databasfilen sparas i katalogen:</h4> 
<code><?php echo dirname($dbPath); ?></code>

<h4>Är katalogen skrivbar?</h4> 
<?php if(is_writable(dirname($dbPath))): ?>
  <p class="success">Ja, katalogen är skrivbar.</p>
<?php else: ?>
  <p class="failure">Nej, katalogen är inte skrivbar. Skapa katalogen och gör den skrivbar.</p>
  <?php return; ?>
<?php endif; ?>


<?php 
// Creating the database and initiating it with content
if(isset($_GET['create-database'])) {
  include(dirname(__FILE__) . "/init_database.php");
}
?>

<h4>Finns databasfilen?</h4> 
<?php 
// Testing the connection with the database
// The $dbPath is defined in blokket2.php
if(is_file($dbPath)) {
  $db = new PDO("sqlite:$dbPath");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script
  echo "<p class='success'>Japp, databasfilen <code>$dbPath</code> finns och kunde öppnas.</p>";
} else {
  echo "<p class='faliure'>Oh no! Databasfilen finns ej. <a href='?p=init&amp;create-database'>Klicka här för att skapa och initiera databasen</a>.</p>";
  return;
}
?>

<h4>Är databasfilen skrivbar?</h4> 
<?php if(is_writable($dbPath)): ?>
  <p class="success">Jopp, databasfilen är skrivbar.</p>
<?php else: ?>
  <p class="failure">Neeeej, databasfilen är inte skrivbar. Gör chmod 666 för att göra filen skrivbar.</p>
  <?php return; ?>
<?php endif; ?>

<h4>Vill du återställa databasen?</h4>
<p><a href="?p=init&amp;create-database">Klicka på den här länken för att återställa annonsdatabasen till sitt ursprungliga skick. Befintliga annonser
raderas och en uppsättning default-annonser skapas</a>.</p>