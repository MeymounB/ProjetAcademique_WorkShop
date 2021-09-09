<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Connexion WorkShop B2</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="style_connexion.css">
</head>

<?php
	
session_start();

// define variables and set to empty values
$passErr = $emailErr = "";
$pass = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["email"])) {
		$emailErr = "L'adresse mail est necessaire";
	      } else {
		$email = test_input($_POST["email"]);
		// check if e-mail address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $emailErr = "Le format de l'adresse mail est invalide";
		}
	      }
	if (empty($_POST["pass"])) {
	$passErr = "Le mot de passe est necessaire";
	} else {
	$pass = test_input($_POST["pass"]);
	// check if pass is well-formed
	if (!preg_match("/^[a-zA-Z-' ]*$/", $pass)) {
		$passErr = "Le format du mot de passe est invalide";
	}
	}
}	

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$pass = test_input($_POST["pass"]);
	$email = test_input($_POST["email"]);
	}

	function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}

?>

<style>
.error {color: #FF0000;}
</style>

<body>

	<div>
		<h2>Welcome Back</h2>

			<p><span class="error">* champs requis</span></p>

		<div id="container_connexion" class="ls-0_5">
			<form action="connexion.php" method="POST" class="form_container">
				<div class="form_container">
					<label for="email">Adresse e-mail : </label>
						<input type="email" name="email" id="email" placeholder="adresse mail" 
						pattern="[a-z0-9._%+-]+@+[a-z0-9.-]+\.(com|fr)" maxlength="40" required
						value =""><span class="error">*</span>
				</div>
				
				<div class="form_container">
					<label for="pass">Mot de passe : </label>
						<input type="password" name="pass" id="pass" placeholder="mot de passe" minlength="7" 
						required
						value =""><span class="error">*</span>
				</div>

				<div class="form_container">
						<input class="connexion_button" type="submit" value="Inscription">
				</div>
			</form>
		</div>

			<?php
			
			//on inclue un fichier contenant nom_de_serveur, nom_bdd, login et password d'accès à la bdd mysql
			include ("connect.php");

			//on vérifie que le visiteur a correctement saisi puis envoyé le formulaire
			if ((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {

			//on se connecte à la bdd
			$bdd = new PDO('mysql:host=localhost;dbname=workshop;charset=utf8', 'root', '');
			if (!$bdd) {echo "LA CONNEXION AU SERVEUR MYSQL A ECHOUE\n"; exit;};

			$requete = $bdd->prepare("INSERT into membres(email, pass)
							VALUES(?,?)");

			$requete->execute([$_POST['email'],$_POST['pass']]);
			header('Location: accueil.php');}

			?> 
	</div>
</body>
</html>