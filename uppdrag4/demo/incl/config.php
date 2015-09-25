<?php
    // time page generation, display in footer. comment out to disable timing.
    $pageTimeGeneration = microtime(true);

    /* turn on php error reporting */
    error_reporting(-1);

    // start a named session
    session_name(preg_replace('/[:\.\/-_]/', '', __FILE__));
    session_start();
    $_SESSION['test']="Defalut test value (set in config.php)";
 
    /* include a libary for mobile detection (some simple responsive design) */
    require_once 'php/Mobile_Detect.php';
    $detect = new Mobile_Detect;
    
    /* helper functions (currentUrl and destroySession) */
     require_once 'php/common.php';
    
    /* login functions  */
     require_once 'php/login.php';
     
    /* login variables - not a good solution.. */
    $userAccount='John'; 
    $userPassword=userPassword('doe');
        
?>