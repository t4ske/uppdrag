<?php
  $articles = readDirectory("blokket_parts/data");
?>


<h1>ALLA ANNONSER</h1>

<table id="all-articles">
    <tr> <th> &nbsp;Artikel&nbsp; </th> <th> Innehåll </th> </tr>
    
    <?php 
    foreach ($articles as $article)
      echo "<tr> <td class='articlename'>$article</td> <td class='articlecontent'>".getFileContents('blokket_parts/data/'.$article)."</td> </tr>";
    ?>
        
</table>

