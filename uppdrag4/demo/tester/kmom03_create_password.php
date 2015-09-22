<h1>Generera ett krypterat lösenord</h1>

<p> Skriv in ett lösenord i rutan nedan, klicka sedan på knappen 
    så visas ordets krypterade motsvarighet.</p>

<form method="post">
    <p>
      <label for="input2">Lösenord:</label><br>
      <input id="input2" class="text" type="password" name="password">
    </p>
    
      <input type="submit" name="doIt" value="Kryptera" style="float:left">
</form>
<form method="post" >
      <input type="submit" value="Rensa">
    
</form>

<?php if(isset($_POST['doIt'])): ?>
<?php
  if(empty($_POST['password']))
    echo "Vänligen ange ett lösenord...";
  else
    echo '<p>Du angav lösenordet : '. $_POST['password'].'</p>
    <p>Krypterat blev det : '. userPassword($_POST['password']) .'</p>';
?>
<?php endif; ?>

  
