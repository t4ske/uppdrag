<?php

$pages = readDirectory("blokket_parts/data");


if(!isset($_POST['article']))
{
  //echo "POST-article är tom - autoväljer första!";
  $_POST['article'] = $pages[0];
}



$select = "<select id='input1' name='article' onchange='form.submit();'>";

foreach($pages as $val) 
{
  $selected = "";
  if(isset($_POST['article']) && $_POST['article'] == $val) 
  {
    $selected = "selected";
  }
  $select .= "<option value='{$val}' {$selected}>{$val}</option>";
}
$select .= "</select>";

$filename = null;
$isWritable = null;
if(isset($_POST['article']) && in_array($_POST['article'], $pages))
{
  $filename = "blokket_parts/data/" . $_POST['article'];
  
  if(is_writable($filename)) 
    $isWritable = true;
  else
    $isWritable = false;
}

if(isset($_POST['doSave'])) {
  $resFromSave = putFileContents($filename, strip_tags($_POST['articleContent'], "<b><i><p><img>"));
  
  if($resFromSave=="Filen sparades.")
    $output = "<p><output class='success'>$resFromSave</output></p>";
  else
    $output = "<p><output class='failure'>$resFromSave</output></p>";
}
?>




<form method="post">
    
    <h1>Editera annons</h1>
    

    <p>Välj  annons att editera:
        <?php echo $select; ?>
    </p>
    
    <?php if($isWritable === false): ?>
    <p class="info"><strong>Filen är skrivskyddad.</strong> Använd chmod 666 för att göra det möjligt att editera och spara ändringar till filen.</p>
    <?php endif; ?>
    

    <textarea id="editstyle" name="articleContent"><?php if($filename) echo getFileContents($filename); ?></textarea>
    
    <p>
    <input type="submit" name="doSave" value="Spara">
    <input type="reset" value="Ångra">
    </p>

</form>

<?php if(isset($resFromSave)) 
  echo $output; ?>





