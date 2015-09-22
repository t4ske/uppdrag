<?php

/*
 * Function that converts parameter to file-paht
 * Parmeters: $p - the name of file (no file-ending)
 * Return value: full paht to files 
 */
function pathToTestFile($p)
{
  switch ($p) 
  {
    case "kmom03_get": return "tester/$p.php";
    case "kmom03_pagestyle": return "tester/$p.php";
    case "kmom03_getform": return "tester/$p.php";
    case "kmom03_postform": return "tester/$p.php";
    case "kmom03_validate": return "tester/$p.php";
    case "kmom03_server": return "tester/$p.php";
    case "kmom03_sessiondestroy": return "tester/$p.php";
    case "kmom03_sessionshow": return "tester/$p.php";
    case "kmom03_sessionchange": return "tester/$p.php";
    case "kmom03_sessioninfo": return "tester/$p.php";
    case "kmom03_create_password": return "tester/$p.php";
   
    default: return "tester/default.php";
   
  }
}

