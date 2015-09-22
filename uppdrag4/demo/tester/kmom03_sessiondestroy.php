<h1>Visa/förstör/skapa session</h1>

<h4>$_SESSION innehåller just nu:</h4>
<div class="h_scroll">
<pre>
  <?PHP echo var_dump($_SESSION); ?>
</pre></div>

<?php 
    if(!isset($_POST['btn_destroy_session']))
    {
      echo '<form  method="post" action="' .getCurrentUrl(). '">
    <input type="submit" name="btn_destroy_session" value="Förstör sessionen!"/>
</form>';
    }
    else
    {
      echo '<form  method="post" action="' .getCurrentUrl(). '">
    <input type="submit" name="btn_create_session" value="Skapa ny session!"/>
</form>';
    }
 ?>

