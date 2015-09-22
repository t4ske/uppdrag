<?php
// include header with nav-menu 
require_once 'incl/config.php';

//include the open sans font or not (used in header.php)
$googleOpenSansFont=true;

//title and banner variables
$title="about.urban | Me-sidan";
$banner_text = "<span class='lightgray'>about</span>\n
  <span class='darkbluegray'>.</span>\n
  <span class='orangeyellow'>urban</span>";


// include header 
require_once 'incl/header.php';

?>

  
  <!-- article with image and text -->
  <div id="content">
  <article class="article-left-img">
    <img src="img/uv.png" alt="Bild på Urban Vikdahl">
    <h2> Hej! </h2>
    <p>Jag heter Urban Vikdahl, är 42 år och arbetar som lärare på Balderskolan i Skellefteå.
       Jag är en sportig man och som förutom familj och vänner tycker om heminredning och god design. 
       Jag har en familj som förutom mig själv består av hustrun Johanna och ungdomarna Stina och Lucas.</p>
    <p>På fritiden tycker jag som sagt mycket om att träna men även att bygga/snickra saker till vår villa (se bilder nedan) 
        samt att utveckla datorprogram. 
        Jag finner även nöje i att spela strategispel (gärna brädspelsvarianten), se en film eller två 
        samt att resa för se och uppleva nya saker. </p>
    <p>Dessutom tycker jag ofta att det är roligt att läsa en högskolekurs eller två.</p>
  </article>
  </div>
  
 <!-- include byline -->
 <?php  require_once 'incl/byline.php';?>
  
 <!-- include gallery -->
 <?php  require_once 'incl/gallery.php';?>
  
 <!-- include footer -->
  <?php require_once 'incl/footer.php';?>
 
