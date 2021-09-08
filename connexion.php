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
	<link rel="stylesheet" href="style.css">
</head>
	<body>

	<?php 

//INSCRIPTION
	
// Vérification de la validité des informations

// Hachage du mot de passe
/* $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

// Insertion
$req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');
$req->execute(array(
    'identifiant' => $identifiant,
    'pass' => $pass_hache));

//CONNEXION 

    //  Récupération de l'utilisateur et de son pass hashé
    $req = $bdd->prepare('SELECT id, pass FROM membres WHERE pseudo = :pseudo');
    $req->execute(array(
	'pseudo' => $pseudo));
    $resultat = $req->fetch();
    
    // Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);
    
    if (!$resultat)
    {
	echo 'Mauvais identifiant ou mot de passe !';
    }
    else
    {
	if ($isPasswordCorrect) {
	    session_start();
	    $_SESSION['id'] = $resultat['id'];
	    $_SESSION['pseudo'] = $pseudo;
	    echo 'Vous êtes connecté !';
	}
	else {
	    echo 'Mauvais identifiant ou mot de passe !';
	}
    }
*/
	?>

<?php

$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

	$req = $bdd->prepare('INSERT INTO membres(email, pass, date_inscription) VALUES(:email, :pass, CURDATE())');
	$req->execute(array(
		'pass' => $pass_hache,
		'email' => $email));
?>
		<div>

			<div id="container_connexion" class="ls-0_5">
				<form action="" method="POST" class="form_container">
					<div class="form_container">
						<label for="email">Entrez votre adresse e-mail : </label>
							<input type="email" name="email" id="email" placeholder="adresse mail" pattern="[a-z0-9._%+-]+@+[a-z0-9.-]+\.(com|fr)" maxlength="30" required>
					</div>

					<div class="form_container">
						<label for="password">Entrez votre mot de passe : </label>
							<input type="password" name="password" id="pass" placeholder="mot de passe" minlength="7" required>
					</div>

					<div class="form_container">
							<input class="connexion_button" type="submit" value="Connexion">
					</div>
				</form>
			</div>
		</div>
	</body>
</html>

