<?php   

$path = dirname(__FILE__) . "/data/";
$files = readDirectory($path);


if(isset($_POST['doDelete'])) 
{
  if(isset($_POST['article']) && in_array($_POST['article'], $files))
  {
        $filename = $path . $_POST['article'];
        unlink($filename);
        $files = readDirectory($path);
        $res = "<p><output class='success'>Filen <strong>".$_POST['article']."</strong> raderades.</output></p>";
  }
  else
  {
        $res = "<p><output class='failure'>Filen finns ej och kunde inte raderas.</output></p>";
  }
 } 
  
$select = "<select id='input1' name='article' >";
$select .= "<option value='-1'> Välj annons att radera </option>";
foreach($files as $val) 
{
  $selected = "";
  if(isset($_POST['article']) && $_POST['article'] == $val) 
  {
    $selected = "selected";
  }
  $select .= "<option value='{$val}' {$selected}>{$val}</option>";
}
$select .= "</select>";
?>

<h1>RADERA ANNONS</h1>
<p>Välj en annons i listan. Klicka sedan på knappen "Radera" för att ta bort den.</p>
<h4>Befintliga annoser:</h4>

<form method="post">
    <?php echo $select; ?>
    
    <p><input type="submit" value="Radera" name="doDelete"></p>
  
</form>

 <?php if(isset($res)) echo $res; ?>



