<?php
// include header with nav-menu 
require_once 'incl/config.php';

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
  case "choose-stylesheet":
    $file = "style_parts/choose_stylesheet.php";
    break;
  case "choose-stylesheet-process":
    require_once "style_parts/choose_stylesheet_process.php";
    break;
  case "edit-stylesheet":
    $file = "style_parts/edit_stylesheet.php";
    break;
  default:
    $file = "style_parts/default.php";
}


//title and banner variables
$title="manage.stylesheets | style";
$banner_text = "<span class='lightgray'>manage</span>\n
  <span class='darkbluegray'>.</span>\n
  <span class='orangeyellow'>stylesheets</span>";


// include header 
require_once 'incl/header.php';

?>

  
  
<div id="content" class="clear">
    
     <aside>
        <h2>Meny:</h2>
        <a href="style.php?p=choose-stylesheet">Byt stylesheet</a>
        <a href="style.php?p=edit-stylesheet">Editera stylesheet</a>
    </aside>
    
    <section>
        <?php require_once $file;?>
    </section>
</div>



 <!-- include byline -->
 <?php  require_once 'incl/byline.php';?>
  
  
 <!-- include footer -->
  <?php require_once 'incl/footer.php';?>
 
