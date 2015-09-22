<?php
$stylesheets = readDirectory("css/user");

$select = "<select id='input1' name='stylesheet' onchange='form.submit();'>";
$select .= "<option value='-1'>Välj stylesheet</option>";
foreach($stylesheets as $val) 
{
  $selected = "";
  if(isset($_POST['stylesheet']) && $_POST['stylesheet'] == $val) 
  {
    $selected = "selected";
  }
  $select .= "<option value='{$val}' {$selected}>{$val}</option>";
}
$select .= "</select>";

$filename = null;
$isWritable = null;
if(isset($_POST['stylesheet']) && in_array($_POST['stylesheet'], $stylesheets))
{
  $filename = "css/user/" . $_POST['stylesheet'];
  
  if(is_writable($filename)) 
    $isWritable = true;
  else
    $isWritable = false;
}

if(isset($_POST['doSave'])) {
  $resFromSave = putFileContents($filename, strip_tags($_POST['styleContent']));
  
  if($resFromSave=="Filen sparades.")
    $output = "<p><output class='success'>$resFromSave</output></p>";
  else
    $output = "<p><output class='failure'>$resFromSave</output></p>";
}
?>




<form method="post">
    
    <h1>Editera stylesheet</h1>

    <p>Välj  stylesheet att editera:
        <?php echo $select; ?>
    </p>
    
    <?php if($isWritable === false): ?>
    <p class="info"><strong>Filen är skrivskyddad.</strong> Använd chmod 666 för att göra det möjligt att editera och spara ändringar till filen.</p>
    <?php endif; ?>
    

    <textarea id="editstyle" name="styleContent"><?php if($filename) echo getFileContents($filename); ?></textarea>
    
    <p>
    <input type="submit" name="doSave" value="Spara">
    <input type="reset" value="Ångra">
    </p>

</form>

<?php if(isset($resFromSave)) 
  echo $output; ?>


<p>
  <?php 
      if(isset($_SESSION['stylesheet']))
      {
        echo "<strong>Nuvarande/Aktivt stylesheet är:</strong> '{$_SESSION['stylesheet']}'.";
      }
      else
      {
        echo "<strong>Nuvarande/Aktivt stylesheet är:</strong> webbplatsens standard stylesheet.";
      }
      ?>
</p>


