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
if(isset($_POST['article']) && in_array($_POST['article'], $pages))
  $filename = "blokket_parts/data/" . $_POST['article'];

?>

<form method="post">
    
    <h1>Visa annons</h1>
    
    <p>Välj annons att visa:
        <?php echo $select; ?>
    </p> 

    <div id="displayArticle">
      <?php if($filename) echo getFileContents($filename); ?>
    </div>

</form>






