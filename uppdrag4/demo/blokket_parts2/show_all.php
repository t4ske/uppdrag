<?php
// Connect to the database
$db = new PDO("sqlite:$dbPath");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors, but continue script


// Read from database
$stmt = $db->prepare('SELECT * FROM Ads;');
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<h1>ALLA ANNONSER I BLOKKET:</h1>

<table id="all-articles">
  
  <tr>
    <th>Titel</th>
    <th>Bild</th>
    <th>Annonstext</th>
  </tr>
  
  <?php foreach($res as $ad): ?>
  
  <tr>
    <td class="articlename"><?php echo $ad['title']; ?></td>
    <td class="articleimage"><img src="<?php echo $ad['image']; ?>" alt="en bild"></td>
    <td class="articlecontent"><?php echo $ad['description']; ?></td>
  </tr>
  
  <?php endforeach; ?>

</table>

