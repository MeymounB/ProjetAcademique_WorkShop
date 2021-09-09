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
						pattern="[a-z0-9._%+-]+@+[a-z0-9.-]+\.(com|fr)" maxlength="30" required
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
			if (!$bdd) {echo "LA CONNEXION AU SERVEUR MYSQL A ECHOUE\n"; exit;}

			$requete = $bdd->prepare("INSERT into membres(email, pass)
							VALUES(?,?)");

			$requete->execute([$_POST['email'],$_POST['pass']]);
			header('Location: accueil.php');
			// $lignes = $requete->fetchAll();

			// foreach ($lignes as $ligne)
			// {
			// $id = $ligne['email'];
			// $mavariable = $ligne['pass'];
			// }

			// var_dump($lignes);

			// si on obtient une réponse, alors l'utilisateur est un membre
			//on ouvre une session pour cet utilisateur et on le connecte à l'espace membre
			if ($data[0] == 1){
			session_start();
			$_SESSION['email'] = $_POST['email'];
			header('Location: accueil.php');
			exit();}

			//si le visiteur a saisi un mauvais login ou mot de passe, on ne trouve aucune réponse
			elseif ($data[0] == 0) {
			$erreur= 'Email ou mot de passe non reconnu ! ';echo $erreur;
			echo"<br/><a href=\"accueil.php\">Accueil</a>";exit();}

			// sinon, il existe un problème dans la base de données
			else {
			$erreur= 'Plusieurs membres ont<br/>les memes email et mot de passe ! ';echo $erreur;
			echo"<br/><a href=\"accueil.php\">Accueil</a>";exit();}}
			else {
			$erreur= 'Errreur de saisie !<br/>Au moins un des champs est vide ! '; echo $erreur;
			echo"<br/><a href=\"accueil.php\">Accueil</a>";exit();}

			// if (isset($_POST['email'])){
			// 	echo $_POST['email'];
			// }
			?> 
	</div>
</body>
</html>