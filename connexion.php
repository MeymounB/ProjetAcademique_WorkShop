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
$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

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

	?>
		<div>

			<div>
			<form action="" method="get" class="form_co">
				<div class="form_container">
					<label for="identifiant">Entrez votre identifiant: </label>
						<input type="text" name="identifiant" id="identifiant" placeholder="adresse mail" required>
				</div>

				<div class="form_container">
					<label for="email">Entrez votre mot de passe: </label>
						<input password_hash type="passeword" name="password" id="password" placeholder="mot de passe" required>
				</div>

				<div class="form_container">
						<input type="submit" value="Connexion">
				</div>
			</form>
			</div>
		</div>
	</body>
</html>

