<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

include 'CSQLfile.php';

$x = new CSQLfile("00_listDatabases.sql");


?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<title>SQL-satser</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<header>
		SQL
	</header>

	<div>
	<?= $x->getDescription(); ?>
	</div>

	<div>
	<?= $x->getSQL(); ?>
	</div>

	<div>
	<?= $x->getSQLrows(); ?>
	</div>

	<div>
	<?= $x->getResultQuery(); ?>
	</div>

</body>
</html>