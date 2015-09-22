

<?php 
    $_SESSION['me'] = "dbwebb.se";
    
    if(isset($_SESSION['counter'])) {
      $_SESSION['counter'] = $_SESSION['counter'] + 1;
    }
    else
    {
      $_SESSION['counter'] = 1;
    }
?>

<h1>Ändra värden i sessionen</h1>
<p>Denna sida har PHP-kod som läser och ändrar värdet <i>counter</i> i sessionen. 
Vid varje visning/körning av denna sidan ökas counter med ett. Om du visar(kör) denna sida, 
och sedan visar innehållet i sessionen och därefter visar denna sida igen osv 
så kan du se hur värdet i sessionen ändrats.</p>



