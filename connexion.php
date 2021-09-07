<!DOCTYPE html>
<html lang="fr">

<?php
try {
	// Sous WAMP
$bdd = new PDO('mysql:host=localhost;dbname=workshop;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
?>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>WorkShop</title>
</head>
	<body>
	
	</body>
</html>