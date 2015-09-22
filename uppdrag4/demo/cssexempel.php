<?php
// include header with nav-menu 
require_once 'incl/config.php';

//include the open sans font or not (used in header.php)
$googleOpenSansFont=true;

//title and banner variables
$title="css.exempel | css-sidan";
$banner_text = "<span class='lightgray'>css</span>\n
  <span class='darkbluegray'>.</span>\n
  <span class='orangeyellow'>exempel</span>";


// include header 
require_once 'incl/header.php';

?>

  
  <!-- article with image and text -->
  <div id="content" class="clear">
    <section>
        <h2>Exempel 1:</h2>
        <div id="ex1">
            <h3>Div med runda hörn, skugga och toning/gradient.</h3>
        </div>
    </section>
    <section>
        <h2>Exempel 2:</h2>
        <div id="ex2a"></div>
        <div id="ex2b"><h3>En opaque div.</h3></div>
    </section>
     <section>
        <h2>Exempel 3: </h2>
        <div id="ex3">
          <h3>Text i kolumner.</h3>
          <p>
          Vestibulum venenatis risus orci, a pharetra turpis condimentum vitae. 
          Nunc imperdiet neque id massa volutpat, at luctus ex cursus. Sed non lectus non 
          metus ultricies ornare non eu magna. Mauris aliquet arcu at lectus aliquet condimentum. 
          Aliquam eu blandit lacus. Sed pellentesque mauris placerat, mollis ipsum interdum, 
          gravida lorem. Maecenas feugiat vitae tortor in consequat. Aenean facilisis mauris quam, 
          eget tincidunt felis accumsan nec. Class aptent taciti sociosqu ad litora torquent per 
          conubia nostra, per inceptos himenaeos. Etiam gravida, dolor ac condimentum facilisis, 
          ante ipsum imperdiet turpis, sed lacinia neque justo id ipsum. Maecenas ut leo non lectus 
          facilisis auctor. Quisque non aliquet turpis, et finibus sem. </p>

        </div>
    </section>
  </div>
  
 <!-- include byline -->
 <?php  require_once 'incl/byline.php';?>
  
  
 <!-- include footer -->
  <?php require_once 'incl/footer.php';?>
 


