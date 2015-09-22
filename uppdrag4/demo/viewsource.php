<?php
// include header with nav-menu 
require_once 'incl/config.php';

//include the open sans font or not (used in header.php)
$googleOpenSansFont=true;

//title and banner variables
$title="viewsource.php | Visa kod-sidan";
$banner_text = "<span class='lightgray'>viewsource</span>\n
  <span class='darkbluegray'>.</span>\n
  <span class='orangeyellow'>php</span>";

// Include code from source.php to display sourcecode-viewer
$sourceBasedir=dirname(__FILE__);
$sourceNoEcho=true;
include("php/source.php");
?>


<?php include("incl/header.php"); ?>

<!-- Sidans/Dokumentets huvudsakliga innehåll -->
<div id="content" class="article-left-img">
<?php echo "$sourceBody"; ?>
<hr>
</div>

 <!-- include byline -->
 <?php  require_once 'incl/byline.php';?>
 
<?php include("incl/footer.php"); ?>


