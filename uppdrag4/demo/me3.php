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

//
// Change the style depending on the $_GET
//
$pageStyle = null;
if(isset($_GET['border-radius']) || isset($_GET['box-shadow'])|| isset($_GET['gradient']))
  $pageStyle ="#uvbild{border:1px solid #222;";
if(isset($_GET['border-radius'])) 
  $pageStyle .=" -webkit-border-radius: 10px; border-radius: 10px;";
if(isset($_GET['box-shadow'])) 
  $pageStyle .=" -webkit-box-shadow: 3px 3px 5px 5px #ddd; box-shadow: 3px 3px 5px 5px #ddd;";
if(isset($_GET['gradient']))
  $pageStyle .= " background: -moz-linear-gradient(top,  hsla(0,0%,0%,0.65) 0%, hsla(0,0%,0%,0) 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,hsla(0,0%,0%,0.65)), 
    color-stop(100%,hsla(0,0%,0%,0)));
    background: -webkit-linear-gradient(top,  hsla(0,0%,0%,0.65) 0%,hsla(0,0%,0%,0) 100%);
    background: -o-linear-gradient(top,  hsla(0,0%,0%,0.65) 0%,hsla(0,0%,0%,0) 100%);
    background: -ms-linear-gradient(top,  hsla(0,0%,0%,0.65) 0%,hsla(0,0%,0%,0) 100%);
    background: linear-gradient(to bottom,  hsla(0,0%,0%,0.65) 0%,hsla(0,0%,0%,0) 100%); ";
if(isset($_GET['border-radius']) || isset($_GET['box-shadow']) || isset($_GET['gradient']))
  $pageStyle .="}";

  


// include header 
require_once 'incl/header3.php';

?>

  
  <!-- article with image and text -->
  <div id="content">
  <article class="article-left-img">
    <img id="uvbild" src="img/uv.png" alt="Bild på Urban Vikdahl">
    <h2> Hej! </h2>
    <p>Jag heter Urban Vikdahl, är 42 år och arbetar som lärare på Balderskolan i Skellefteå.
       Jag är en sportig man och som förutom familj och vänner tycker om heminredning och god design. 
       Jag har en familj som förutom mig själv består av hustrun Johanna och ungdomarna Stina och Lucas.</p>
    <p>På fritiden tycker jag som sagt mycket om att träna men även att bygga/snickra saker till vår villa (se bilder nedan) 
        samt att utveckla datorprogram. 
        Jag finner även nöje i att spela strategispel (gärna brädspelsvarianten), se en film eller två 
        samt att resa för se och uppleva nya saker. </p>
    <p>Dessutom tycker jag ofta att det är roligt att läsa en högskolekurs eller två. Just nu läser jag ett 
        faktiskt ett webbprogrammerings-kurspaket på distans, från Blekinge Tekniska Högskola som heter 
        Databaser, HTML, CSS, JavaScript och PHP.</p>
  </article>
  </div>
  
 <!-- include byline -->
 <?php  require_once 'incl/byline.php';?>
  
 <!-- include gallery -->
 <?php  require_once 'incl/gallery.php';?>
  
 <!-- include footer -->
  <?php require_once 'incl/footer.php';?>
 
