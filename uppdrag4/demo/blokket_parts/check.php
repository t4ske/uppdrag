<?php   
  $path = dirname(__FILE__) . "/data/";
  $files = readDirectory($path);
?>

<h1>KONTROLLERA ANNONSER</h1>

<h4>I vilken mapp sparas filerna med annonserna?</h4>
  <p><?php echo $path; ?></p>

<h4>Är katalogen skrivbar?</h4>

<?php if(is_writable($path)): ?>
  <p class="success">Katalogen är skrivbar.</p>
<?php else: ?>
  <p class="failure">Katalogen är ej skrivbar. Skapa katalogen och gör den skrivbar.</p>
  <?php return; ?>
<?php endif; ?>

  
<h4>Vad innehåller katalogen?</h4> 

<p>Katalogen innehåller <?php echo sizeof($files); ?> filer. Här följer en lista på dem:</p> 

<ul>
<?php foreach($files as $val): ?>
  <li><?php echo $val; ?>
<?php endforeach; ?>
</ul>