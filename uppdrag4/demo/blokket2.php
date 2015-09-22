<?php
// include header with nav-menu 
require_once 'incl/config.php';

// Path to the SQLite database file
$dbPath = dirname(__FILE__) . "/blokket_parts2/db/blokket2.sqlite";

//include the open sans font or not (used in header.php)
$googleOpenSansFont=true;

// Check if the url contains a querystring with a page-part.
$p = null;
if(isset($_GET["p"])) 
{
  $p = $_GET["p"];
}

// get page-part content
$file = null;
switch($p) 
{
  case "check":
    $file = "check.php";
    break;
  case "init":
    $file = "init.php";
    break;
  case "update":
    $file = "update.php";
    break;
  case "new":
    $file = "new.php";
    break;
  case "delete":
    $file = "delete.php";
    break;
  case "show":
    $file = "show.php";
    break;
  case "show-all":
    $file = "show_all.php";
    break;
  
  default:
    $file = "default_blokket.php";
}


//title and banner variables
$title="blokket.php | en sida för annonser";
$banner_text = "<span class='lightgray'>blokket</span>\n
  <span class='darkbluegray'>.</span>\n
  <span class='orangeyellow'>php</span>";


// include header 
require_once 'incl/header.php';

?>

  
  
<div id="content" class="clear">
    
     <aside>
        <h2>Meny:</h2>
        <a href="blokket2.php">Start</a>
        <a href="blokket2.php?p=init">Initiera</a>
        <a href="blokket2.php?p=update">Editera annons</a>
        <a href="blokket2.php?p=new">Skapa ny annons</a>
        <a href="blokket2.php?p=delete">Radera annons</a>
        <a href="blokket2.php?p=show">Visa en annons</a>
        <a href="blokket2.php?p=show-all">Visa alla annonser</a>
   
    </aside>
    
    <section>
        <?php require_once "blokket_parts2/".$file;?>
    </section>
</div>



 <!-- include byline -->
 <?php  require_once 'incl/byline.php';?>
  
  
 <!-- include footer -->
  <?php require_once 'incl/footer.php';?>
 
