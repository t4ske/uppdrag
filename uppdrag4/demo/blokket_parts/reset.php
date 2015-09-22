<?php

require_once '../php/common.php';

// blokket
$src = dirname(__FILE__). "/data_orignal/";
$dest = dirname(__FILE__) . "/data/";
$ads = array("get", "gris", "ko");


// remove all files in directory
$files = readDirectory($dest);


foreach($files as $val) {
  unlink($dest . $val);
}

// copy original files
foreach($ads as $val) {
  copy($src . $val, $dest . $val);
#  chmod($dest . $val, 0666);
}
?>

<!DOCTYPE HTML>
<html lang="sv">
    <head>
        <title>Återställer blokket filer</title>
        <meta charset='utf-8'>
    </head>
    
    <body>
      <p>Initierade annonsdatabasen i Blokket. </p>
      <p>Raderade alla annonser och kopierade dit default-annonserna.</p>
      <p><a href="../blokket.php?p=init">Återvänd</a></p>
    </body>
</html> 


