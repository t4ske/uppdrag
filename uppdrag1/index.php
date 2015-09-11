<?php
include 'head.php';
include 'navmenu.php';


if(!isset($_GET['p']))
  include 'me.php'; 
else if($_GET['p']=='assignment')
  include 'assignment.php';
else if($_GET['p']=='htmlphpbasics')
  include 'htmphpbasics.php';
else if($_GET['p']=='why')
  include 'why.php';
else if($_GET['p']=='tutorial')
  include 'tutorial.php';
else if($_GET['p']=='timeplan')
  include 'timeplan.php';





include 'foot.php';
?>
  


