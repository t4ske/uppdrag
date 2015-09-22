<?php
// include header with nav-menu 
require_once 'incl/config.php';

//include function - pathToTestFile
require_once 'php/functions.php';

//include the open sans font or not (used in header.php)
$googleOpenSansFont=true;

//title and banner variables
$title="tester | test.php";
$banner_text = "<span class='lightgray'>test</span>\n
  <span class='darkbluegray'>.</span>\n
  <span class='orangeyellow'>php</span>";



if(isset($_POST['btn_destroy_session']))
{
  // uses @ to supress the warning message
  destroySession();
  echo "<p>Sessionen förstörd!</p>";
}

if(isset($_POST['btn_create_session']))
{
echo "<p>Ny session skapad (i filen config.php)!</p>";

//generate a random string - just for fun!
$length= rand(3, 15);
$charset='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
$str = '';
$count = strlen($charset);
while ($length--) $str .= $charset[mt_rand(0, $count-1)];

//store a little info in the session array
$_SESSION['test']=$str;
$_SESSION['info']="Ovanstående textsträng genererades i filen kmom03_sessiondestroy.php";;
}


// include header 
require_once 'incl/header.php';

?>

  
  <!-- article with image and text -->
  <div id="content" class="clear">
    <aside>
       
        <h2>Testfall:</h2>
        <a href="test.php">Introduktion</a>
        <a href="test.php?p=kmom03_pagestyle">Ändra style på me-sida</a>
        <a href="test.php?p=kmom03_get">Visa $_get</a>
        <a href="test.php?p=kmom03_getform">From med get</a>
        <a href="test.php?p=kmom03_postform">From med post</a>
        <a href="test.php?p=kmom03_validate">Validera inkommande</a>
        <a href="test.php?p=kmom03_server">Visa $_SERVER</a>
        <a href="test.php?p=kmom03_sessiondestroy">Visa/förstör/skapa session</a>
        <a href="test.php?p=kmom03_sessionshow">Visa $_SESSION</a>
        <a href="test.php?p=kmom03_sessionchange">Ändra värde i sessionen</a>
        <a href="test.php?p=kmom03_sessioninfo">Information om  sessionen</a>
        <a href="test.php?p=kmom03_create_password">Skapa krypterat lösenord</a>
        
    </aside>
    <section>
       <?php 
        //filter input from paramter
        $p = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_ENCODED);
       
        /*not needed when using filter_input
        if(isset($_GET['p'])) 
         $p=$_GET['p'];*/
 
        //include test-file
        include pathToTestFile($p); 
       ?>
    </section>
  </div>
  
 <!-- include byline -->
 <?php  require_once 'incl/byline.php';?>
  
  
 <!-- include footer -->
  <?php require_once 'incl/footer.php';?>
 


