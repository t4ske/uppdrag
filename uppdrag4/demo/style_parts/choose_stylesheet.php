<?php
$stylesheets = readDirectory("css/user");

$select = "<select id='input1' name='stylesheet' onchange='form.submit();'>";
$select .= "<option value='-1'>STANDARDSTYLESHEET (city-light)</option>";
foreach($stylesheets as $val) 
{
  $selected = "";
  if(isset($_SESSION['stylesheet']) && $_SESSION['stylesheet'] == $val) 
  {
    $selected = "selected";
  }
  $select .= "<option value='{$val}' {$selected}>{$val}</option>";
}
$select .= "</select>";

?>

<h1>Välj stylesheet</h1>


<form method="post" action="?p=choose-stylesheet-process">
    
    <p>
      <?php 
      if(isset($_SESSION['stylesheet']))
        echo "Nuvarande stylesheet är:<strong> '{$_SESSION['stylesheet']}'</strong>.";
      else
        echo "Nuvarande stylesheet är:<strong> webbplatsens standard-stylesheet</strong>.";
      ?>
    </p>
    
    <p>
      <label for="input1">Välj den stylesheet som du vill använda:</label><br>
      <?php echo $select; ?>
    </p>

</form>


