<?php   
  $path = dirname(__FILE__) . "/data/";
  
  
  if(isset($_POST['doCreate'])) 
 {
  $filename = $path . basename(trim(strip_tags($_POST['filename'])));
  if(empty($_POST['filename']))
  {
        $res = "<p><output class='failure'>Filen skapades ej, filnamnet kan ej vara tomt. Välj ett annat filnamn.</output></p>";
  }
  else if(is_file($filename)) 
  {
        $res = "<p><output class='failure'>Filen skapades ej, den finns redan. Välj ett annat filnamn.</output></p>";
  }
  else 
 {
        file_put_contents($filename, null);
        chmod($filename, 0666);
        $res = "<p><output class='success'>Filen skapades.</output></p>";
       
  }
}
  $files = readDirectory($path);
?>

<h1>SKAPA NY ANNONS</h1>

<h4>Befintliga annonser:</h4> 
<div class="files-columns">
  <?php foreach($files as $val)
      echo "<span>$val</span>";
  ?>
</div>

<h4>Skapa ny:</h4>

<form method="post">
			<input id="input2" name="filename">
			
		
		<p>
			<input type="submit" name="doCreate" value="Skapa">
			<input type="reset" value="Ångra">
    </p>
						
</form>

   <?php if(isset($res)) echo $res;?>
