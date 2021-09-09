<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Accueil WorkShop B2</title>
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/style_accueil.css">
	
</head>

<?php
	session_start();

	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion

	if(!isset($_SESSION["username"])){
		header("Location: connexion.php");
		exit(); }
?>
<body>
		<!-- css : faire des carrés en opacity : 0,40 pour les div-->
	<div class="page">

	<nav>
		<ul>
			<li class="deroulant"><a href="#">Compte Battle &ensp;</a>
				<ul class="sous">
					<li><a href="/php/espace_membre.php">Profil</a></li>
					<li><a href="#">Deconnexion</a></li>
				</ul>
			</li>
		</ul>
	</nav>

		<div class="container">
			<div class="banniere container flexRow flexCol justify-sb align-center">
				 
					<img src="babyfoot_battle_titre.png" style="width : 100%;" alt="titre">
				
					<img src="stormtroupers_battle.png" style="width : 100%;" alt="bannière">
				</div>
				<section class="bloc container">
					<div class="explications">

					</div>
						<div class="scratch flexRow flexCol justify-sb align-center" style="margin:50px 0px;">
							<div><iframe src="https://scratch.mit.edu/projects/567875622/embed" 
							allowtransparency="true"
							frameborder="0" scrolling="no" style="min-height: 402px; min-width: 470px;" 
							allowfullscreen></iframe></div>


							<div class="commandes ls-1 primarycolor">
								<h2>Les commandes sont divisés en deux parties : </h2>
								<div class="flexRow flexCol justify-sb align-center">
									<div class="thirdcolor" style="margin: right 10px;">
										<p>Le camp des noirs à pour touches :</p> 
									
										<ul>
											<li>Gardien :</li>
												<ul>
													<li>A : 👆</li>
													<li>Q : 👇</li>
												</ul>
											<li>Défense :</li>
												<ul>
													<li>Z : 👆</li>
													<li>S : 👇</li>
												</ul>
											<li>Attaque :</li>
												<ul>
													<li>E : 👆</li>
													<li>D : 👇</li>
												</ul>
										</ul>

									</div>

									<div class="thirdcolor" style="margin: left 10px;">
										<p>Le camp des blancs à pour tocuhes :</p>

										<ul>
											<li>Gardien :</li>
												<ul>
													<li>P : 👆</li>
													<li>M : 👇</li>
												</ul>
											<li>Défense :</li>
												<ul>
													<li>O : 👆</li>
													<li>L : 👇</li>
												</ul>
											<li>Attaque :</li>
												<ul>
													<li>I : 👆</li>
													<li>K : 👇</li>
												</ul>
										</ul>
									</div>
								</div>
							</div>
								<div class="conclusion">

								</div>
						</div>
				</section>

		</div>

		<div class="credit">

		</div>
	</div>
</body>
</html>