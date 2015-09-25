<!DOCTYPE html>

<?php 
	ini_set('display_errors',1);  
	error_reporting(E_ALL);

	if(isset($_GET['sida']))
		$sida=$_GET['sida'];
	else
		$sida="m0.php"
?>


<html>
<head>
	<meta charset="utf-8">
	<title>Ett första webbramverk</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<nav>
		<a href="?sida=m0.php" <?php if(isset($sida) && $sida=="m0.php")echo "class=\"active\""; ?> >Start</a>
		<a href="?sida=m1.php" <?php if(isset($sida) && $sida=="m1.php")echo "class=\"active\""; ?> >Moment 1</a>
		<a href="?sida=m2.php" <?php if(isset($sida) && $sida=="m2.php")echo "class=\"active\""; ?> >Moment 2 </a>
		<a href="?sida=m3.php" <?php if(isset($sida) && $sida=="m3.php")echo "class=\"active\""; ?> >Moment 3 </a>
		<a href="?sida=m4.php" <?php if(isset($sida) && $sida=="m4.php")echo "class=\"active\""; ?> >Moment 4 </a>
		<a href="?sida=m5.php" <?php if(isset($sida) && $sida=="m5.php")echo "class=\"active\""; ?> >Moment 5 </a>
		<a href="?sida=m6.php" <?php if(isset($sida) && $sida=="m6.php")echo "class=\"active\""; ?> >Moment 6 </a>
	</nav>

	
	<?php 
		if(isset($sida))
			include $sida;			 
	?>
	

</body>
</html>
