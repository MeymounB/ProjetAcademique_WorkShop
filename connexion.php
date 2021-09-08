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

<style>
.error {color: #FF0000;}
</style>

	<body>

	<?php

// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

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
		<div>
				<h2>Welcome Back</h2>

		<p><span class="error">* champs requis</span></p>

			<div id="container_connexion" class="ls-0_5">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="form_container">
					<div class="form_container">
						<label for="email">Entrez votre adresse e-mail : </label>
							<input type="email" name="email" id="email" placeholder="adresse mail" 
							pattern="[a-z0-9._%+-]+@+[a-z0-9.-]+\.(com|fr)" maxlength="30" required
							value ="<?php echo $email;?>"><span class="error">* <?php echo $emailErr;?></span>
					</div>
					
					<div class="form_container">
						<label for="pass">Entrez votre mot de passe : </label>
							<input type="password" name="pass" id="pass" placeholder="mot de passe" minlength="7" 
							required
							value ="<?php echo $pass;?>"><span class="error">* <?php echo $passErr;?></span>
					</div>

					<div class="form_container">
							<input class="connexion_button" type="submit" value="Connexion">
					</div>
				</form>
			</div>

			<?php

			echo "<h2>Your Input:</h2>";
			echo $email;
			echo "<br>";
			echo $pass;

			?>
		</div>
	</body>
</html>
