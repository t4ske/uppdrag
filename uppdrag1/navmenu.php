 <?php 
  if(isset($_GET['p'])) 
    $p=$_GET['p'];
  else
    $p='';
?>
<label for="show-menu" class="show-menu">Visa meny</label>
<input type="checkbox" id="show-menu" role="button" onclick="displayMenu()">

<nav>  
<ul id="menu">
<li><a href="./" class="<?php if($p=='') echo'active';?>">Om mig</a></li>
<li><a href="?p=assignment" class="<?php if($p=='assignment') echo'active';?>">Projektets mål</a></li>
<li><a href="?p=why" class="<?php if($p=='why') echo'active';?>">Varför?</a></li>
<li><a href="?p=htmlphpbasics" class="<?php if($p=='htmlphpbasics') echo'active';?>">HTML &amp; CSS</a></li>
<li><a href="?p=tutorial" class="<?php if($p=='tutorial') echo'active';?>">Om webbplatsen</a></li>
<li><a href="?p=timeplan" class="<?php if($p=='timeplan') echo'active';?>">Tidsplan</a></li>
</ul>
</nav>


<script>
  function displayMenu()
  {
    document.getElementById("menu").style.display="block";
  }
</script>