<h1>Visa innehållet i $_SERVER</h1>
 
<p>Länk till denna sida:<br/>
<?php 
  echo getCurrentUrl();
?>
</p>

<div class="h_scroll"><pre><?PHP echo htmlentities(print_r($_SERVER, true)); ?></pre></div>
    