<?php
//
// Connect to the database
//
$db = new PDO("sqlite:$dbPath");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script


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

<h1>VISA EN ANNONS</h1>

<p>Välj den annons som du vill visa.</p>

<form method="post">
 
    
    <h4><label for="input1">Annonser:</label></h4>
      <?php echo $select; ?>
    
    
  <?php if(isset($current)): ?>
      <div id="single_ad" style="background:#eee; border:1px solid #999;padding:1em;">
        <h2><?php echo $current['title']; ?></h2>
        <img src="<?php echo $current['image']; ?>" class="left" alt="en bild">
        <p><?php echo $current['description']; ?></p>
      </div>
  <?php endif; ?>
    

</form>