<?php
// include config-settings 
require_once 'incl/config.php';
?>

<!doctype html>
<html lang="sv">

<head>
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <meta charset="utf-8">
  <title><?php echo $title; ?></title>
  
  <?php
  //get name of this page
  $pageName = basename(htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"), ".php");
  
  if($googleOpenSansFont)
   {echo"<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,300italic,400italic,600,700,800' rel='stylesheet' type='text/css' />";}
  ?>
  
  <!-- favicon -->
  <link rel="shortcut icon" href="img/favicon.ico">
  
  
  <!-- css stylesheets -->
<?php if(isset($_SESSION['stylesheet'])): ?>
 <link rel="stylesheet" href="css/user/<?php echo $_SESSION['stylesheet']; ?>">        
<?php else: ?>
  <link rel="stylesheet" href="css/user/city-light.css"/>
  <link rel="alternate stylesheet" href="css/debug.css" title="My debugging stylesheet"/>
<?php endif; ?>
  <link rel="stylesheet" href="css/<?php echo $pageName?>.css"/>
</head>

<body>
 
<?php
// include aboveheader 
require_once 'incl/aboveheader.php';
?>

<!-- incude logo image unless it's a mobile -->
  <?php
    if(!$detect->isMobile())
    {echo "
      <div id='top'>
        <img src='img/bitnami-mark.png' alt='bitnami logo' title='bitnami logo'>
      </div>";}
   ?>

<!-- line -->
<div class="line darkgray"></div>

<!-- banner -->
<section class="main-banner">
      <h1>
          <?php echo $banner_text; ?>
      </h1>
</section>

<!-- lower line -->
<div class="line">
<!-- incude some text unless it's a mobile -->
<?php
  if(!$detect->isMobile())
   echo '
    Ordet Urban kan betyda flera saker. Det är både ett mansnamn och en benämning på stad. 
    Själva namnet är bildat av det latinska adjektivet urbanus som betyder "belevad eller "städad". 
    <br>I Sverige har namnet funnits sedan 1400-talet men inte varit särskilt vanligt under senaste seklet.
    För närvande är det cirka 5500 svenskar som har det som tilltalsnamn.
    <a href="http://sv.wikipedia.org/wiki/Urban_%28namn%29">[källa:wikipedia]</a>';
 ?>
</div>

  
  <nav class="navmenu clear">
      <a <?php if($pageName=="me") echo 'class="active-page"';?> href="me.php">Om mig</a>
      <a <?php if($pageName=="test") echo 'class="active-page"';?> href="test.php">Tester</a>
      <a <?php if($pageName=="cssexempel") echo 'class="active-page"';?> href="cssexempel.php">CSSexempel</a>  
      <a <?php if($pageName=="viewsource") echo 'class="active-page"';?> href="viewsource.php">Källkod</a>  
      <a <?php if($pageName=="style") echo 'class="active-page"';?> href="style.php">Stylesheet</a>  
      <a <?php if($pageName=="blokket") echo 'class="active-page"';?> href="blokket.php">Blokket</a>  
      <a <?php if($pageName=="blokket2") echo 'class="active-page"';?> href="blokket2.php">Blokket2</a>   
  </nav>
  
  

