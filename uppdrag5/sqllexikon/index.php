<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

include 'src/CSQLfileMenu.php';

$content = new CSQLfileMenu($_POST);

?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<title>Urbans SQL-lexikon</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>
	<header>
		<span>Urbans</span> SQL<span>-lexikon</span>
	</header>

	<div class="subheader">
		<?php echo $content->getNavigation();?>
	</div>

	<div class="content">
		<?php echo $content->getContent();?>
	</div>

</body>
</html>