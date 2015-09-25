<?php
// ===========================================================================================
//


// -------------------------------------------------------------------------------------------
//
// Is user authenticated and logged in?
//
function userIsAuthenticated() {
  if(isset($_SESSION['authenticated'])) {
    return $_SESSION['authenticated'];
  } else {
    return false;
  }
}


// -------------------------------------------------------------------------------------------
//
// create the login/logout menu
//
function userLoginMenu() {
  // array with all menu items
  $menu = array(
    "login"   => "login.php?p=login",
    "status"   => "login.php",
    "logout"   => "login.php?p=logout",  
  );

  // check if user is logged in or not, alter the menu depending on the result
  if(userIsAuthenticated()) {
    unset($menu['login']);
  } else {
    unset($menu['status']);
    unset($menu['logout']);      
  }
  
  $html = "<nav class='login'>";
  foreach($menu as $key=>$val) {
    $html .= "<a href='$val'>$key</a> ";
  }
  $html .= "</nav>";
  return $html;
}


// -------------------------------------------------------------------------------------------
//
// Get login-form
//
function userLoginForm($output=null, $outputClass=null) {

  if(isset($output)) {
    $output = "<p class='right' style='width:300px;'><output class='$outputClass'>$output</output></p>";
  }

  $disabled = null;
  $disabledInfo = null;
  if(userisAuthenticated()) {
    $disabled = "disabled";
    $disabledInfo = "<em class='quiet small'>Du är inloggad, du måste <a href='?p=logout'>logga ut</a> innan du kan logga in.</em>";
  }

  $html = <<<EOD
<h1>Logga in</h1>
<form method="post" action="?p=login">
  <fieldset>
    <legend>Login</legend>
    $output
    <p>
      <label for="input1">Användarkonto:</label><br>
      <input id="input1" class="text" type="text" name="account" value="">
    </p>
    <p>
      <label for="input2">Lösenord:</label><br>
      <input id="input2" class="text" type="password" name="password" value="">
    </p>
    <p>
      <input type="submit" name="doLogin" value="Login" $disabled>
      $disabledInfo
    </p>
  </fieldset>
</form>
EOD;

  return $html;
}


// -------------------------------------------------------------------------------------------
//
// Login the user
//
function userLogin() {
  global $userAccount, $userPassword;
  // if form is submitted then try to login
  // $_POST['doLogin'] is related to the name of the login-button
  $output=null;
  $outputClass=null;
  if(isset($_POST['doLogin'])) {
    
  
    // does account and password match?
    if($userAccount == $_POST['account'] && $userPassword == userPassword($_POST['password'])) {
      $output = "Du är nu inloggad. Menyn uppe i högra hörnet har ändrat sig.";
      $outputClass = "success";
      $_SESSION['authenticated'] = true; 
    } else {
      $output = "Du lyckades ej logga in. Felaktigt konto eller lösenord.";
      $outputClass = "error";
    }
  }
  
  return userLoginForm($output, $outputClass);
}


// -------------------------------------------------------------------------------------------
//
// Logout the user
//
function userLogout() {
  unset($_SESSION['authenticated']);
  return "<h1>Utloggad</h1><p>Du är nu utloggad.</p>";
}


// -------------------------------------------------------------------------------------------
//
// Generate a password
//
function userPassword($password) {
  return sha1($password);
}


// -------------------------------------------------------------------------------------------
//
// return the userStatusPage
//
function userStatus() {
  $html= '<h1>Status login / logout</h1>
      <p>Denna webbplats har skyddade delar. Du måste logga in för att komma åt dem.</p>
      <p>För tillfället är du:';
  
   if(userIsAuthenticated())
      $html .= '<strong>inloggad</strong>.</p>
      <p><a href="?p=logout">Vill du logga ut</a>?</p>';
   else 
      $html .= '<strong>ej inloggad</strong>.</p>
        <p><a href="?p=login">Vill du logga in</a>?</p>';
   
   return $html;
}
