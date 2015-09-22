<?php
// include header with nav-menu 
require_once 'incl/config.php';

//include the open sans font or not (used in header.php)
$googleOpenSansFont=true;

//title and banner variables
$title="Logga in";
$banner_text = "<span class='lightgray'>Logga</span>\n
  <span class='darkbluegray'>.</span>\n
  <span class='orangeyellow'>in</span>";

// Check if the url contains a querystring with a page-part.
$p = null;
if(isset($_GET["p"])) 
{
  $p = $_GET["p"];
}

//get login/logo-ut or status part of page
if($p=='login')
  $pageContent = userLogin();
else if($p=='logout')
  $pageContent = userLogout();
else 
 $pageContent = userStatus();


// include header 
require_once 'incl/header.php';

//page content
 echo '<div id="login">'.$pageContent.'</div>';
 
  
 //include footer 
 require_once 'incl/footer.php';?>
 
