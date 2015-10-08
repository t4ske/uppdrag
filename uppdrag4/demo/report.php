<?php
//include the open sans font or not (used in header.php)
$googleOpenSansFont=true;

//title and banner text variables
$title="report.urban | Mina redovisningar av kursmomenten";
$banner_text = "<span class='lightgray'>report</span>\n
  <span class='darkbluegray'>.</span>\n
  <span class='orangeyellow'>urban</span>";


//include header
require_once 'incl/header.php';
?>

  
  <!-- article with image and text -->
  <article id="content" class="article-left-img">
      
    <h2 class="darkbluegray">Redovisning av moment</h2>
    
    <h3>Moment 6:</h3>
    
      <p>Här ska jag skriva minst 15 rader text...</p>
    
    
    <h3>Moment 5:</h3>
    
        <p>Här ska jag skriva minst 15 rader text...</p>
    
    <h3>Moment 4:</h3>
    
        <p>Här ska jag skriva minst 15 rader text...</p>
    
    <h3>Moment 3:</h3>
    
        <p>Här ska jag skriva minst 15 rader text...</p>
    
    <h3>Moment 2:</h3>
    
      <p>Här ska jag skriva minst 15 rader text...</p>
  
    <h3>Moment 1:</h3>
    
      <p>Här ska jag skriva minst 15 rader text...</p>
        
        
  </article>
   
  
   <!-- line -->
  <div class="line darkgray"></div>
  
  <!-- include byline -->
 <?php  require_once 'incl/byline.php';?>
  
 <!-- include footer -->
  <?php require_once 'incl/footer.php';?>


