<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profil</title>
	<link rel="stylesheet" href="../WorkShop/css/style.css">
	<link rel="stylesheet" href="../WorkShop/css/style_espace_membre.css">

	<?php 
		$bdd = new PDO('mysql:host=localhost;dbname=workshop;charset=utf8', 'root', '');
	?>
</head>
<body>	
	<!-- page -->
		<div class="page container"> 
			<!-- titre  -->
			<div class="primarycolor titre m-auto flexRow flexCol justify-sb align-center">
				<h1>Profile</h1>
			</div>
			<!-- cadre profil  -->
			<div class="flexRow flexCol justify-sb align-center">
				<!-- image trooper  -->
				<div>
					<img src="../WorkShop/images/blacktrooper.png" alt="trooper">
				</div>
				<!-- div container  -->
				<div>
					<!-- premier bloc  -->
					<div>
						<h2 class="primarycolor">Pseudo</h2>

						<input type="text" value="<?php echo $_POST['pseudo']; ?>">
					</div>
					<!-- deuxième bloc  -->
					<div>
						<h2 class="primarycolor">Equipe</h2>

						<div></div>
					</div>
				</div>
			</div>
		</div>
</body>	
</html>