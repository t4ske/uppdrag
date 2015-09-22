<?php

// Connect to the database
$db = new PDO("sqlite:$dbPath");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script



// If Save-button was pressed, save the ad 
if(isset($_POST['doSave'])) {

  $strip = "<b><i><p><img>";

  // Add all form entries to an array
  $ad[] = strip_tags($_POST["title"], $strip);
  $ad[] = strip_tags($_POST["description"], $strip);
  $ad[] = strip_tags($_POST["image"], $strip);
  $ad[] = strip_tags($_POST["id"], $strip);

  $stmt = $db->prepare("UPDATE Ads SET title=?, description=?, image=? WHERE id=?");
  $stmt->execute($ad);
  $output = "Uppdaterade annonsen. Rowcount is = " . $stmt->rowCount() . ".";
}


// Create a select/option-list of the ads
$stmt = $db->prepare('SELECT * FROM Ads;');
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
$current = null;

if(!isset($_POST['ads']))
{
  //echo "POST-article är tom - autoväljer första!";
  $_POST['ads'] = array_values($res)[0]['id'];
}

$select = "<select id='input1' name='ads' onchange='form.submit();'>";

foreach($res as $ad) {
  $selected = "";
  if(isset($_POST['ads']) && $_POST['ads'] == $ad['id']) {
    $selected = "selected";
    $current = $ad;
  }
  $select .= "<option value='{$ad['id']}' {$selected}>{$ad['title']} ({$ad['id']})</option>";
}
$select .= "</select>";


?>

<h1>EDITERA ANNONS</h1>

<p>Välj den annons som du vill ändra.</p>

<form method="post">
  
    <input type="hidden" name="id" value="<?php echo $current['id']; ?>">

    
    <h4><label for="input1">Annonser:</label></h4>
      <?php echo $select; ?>
    
    
    
    <h4><label for="input1">Titel:</label></h4>
      <input type="text" id="ad-title" class="text" name="title" value="<?php echo $current['title']; ?>">
       
    
    
    <h4><label for="input1">Bildlänk: </label></h4>(Relativ på servern eller direkt med http://server.com/bild.png)<br>
      <input type="text" id="ad-img-link" class="text" name="image" value="<?php echo $current['image']; ?>">
        
    
    
    <h4><label >Annonstext: </label></h4>
      <textarea style="width:100%;" name="description"><?php echo $current['description']; ?></textarea>
        
    
    
      <input type="submit" name="doSave" value="Spara" <?php if(!isset($current['id'])) echo "disabled";  ?>>
      <input type="reset" value="Ångra">
    

    <?php if(isset($output)): ?>
    <p><output class="success"><?php echo $output; ?></output></p>
    <?php endif; ?>
        
  
</form>