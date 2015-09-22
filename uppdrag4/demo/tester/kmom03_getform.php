<h1>Formulär och get-metoden</h1>
 <form method="get" action="?">
     
 
 <?php
    //include a hidden field - if this page is loaded through the fame/multipage tester.php
    $current_url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    if(strpos($current_url,"test.php")!= FALSE)
       echo '<input type="hidden" name="p" value="kmom03_getform">';
 ?>   
 
  <fieldset>
   <legend>Exempel på formulär med get-metoden</legend>
   <p>
    <label for="input1">Användarkonto:</label><br>
    <input id="input1" class="text" type="text" name="account">
   </p>
   <p>
    <label for="input2">Lösenord:</label><br>
    <input id="input2" class="text" type="password" name="password">
   </p>
   <p>
    <input type="submit" name="doLogin" value="Login">
  </p>
 </fieldset>
</form>

<p>Du anropade sidan med följande querystring: 
    <code><?php echo htmlentities($_SERVER['QUERY_STRING']); ?></code>
</p>

<p><code>$_GET</code> innehåller följande:</p><pre><?php print_r($_GET); ?></pre>

