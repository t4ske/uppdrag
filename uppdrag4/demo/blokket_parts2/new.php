<?php

// Connect to database
$db = new PDO("sqlite:$dbPath");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script


// If Save-button was pressed - then save the ad if true.
if(isset($_POST['doCreate'])) {

  $ad[] = strip_tags($_POST["title"]);
  
  $stmt = $db->prepare("SELECT title FROM  Ads WHERE title = ?");
  $stmt->execute($ad);
  $res = $stmt->fetchAll();
  
  if(count($res)<1)
  {
    $stmt = $db->prepare("INSERT INTO Ads (title) VALUES (?)");
    $stmt->execute($ad);
    $output = "<output class='success'>Lade till en ny annons med id " . $db->lastInsertId() . ". Rowcount is = " . $stmt->rowCount() . ".</output>";
  }
 else {
   $output = "<output class='failure'>Kunde inte skapa en ny annons. <u>Namnet '". $ad[0] ."' upptaget.</u> Försök igen med ett nytt namn!</output>";
  }
  }

// Get array with current ads
$stmt = $db->prepare('SELECT * FROM Ads;');
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<h1>SKAPA NY ANNONS</h1>

<p>Ange ett UNIKT namn på den nya annons du vill skapa och klicka sedan på knappen för att spara.</p>


<h4>Befintliga annonser:</h4> 
<div class="files-columns">
  <?php foreach($res as $ad)
      echo "<span>".$ad['title']."</span>";
  ?>
</div>
<form method="post">
   
    
    
    <h4><label for="input2">Titel på ny annons:</label></h4>
      <input id="input2" class="text" name="title">
        
    
    <p>
      <input type="submit" name="doCreate" value="Skapa">
      <input type="reset" value="Ångra">
    </p>
        
    <?php if(isset($output)): ?>
    <p><?php echo $output ?></p>
    <?php endif; ?>
        

</form>