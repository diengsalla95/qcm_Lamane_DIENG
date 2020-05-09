<?php
session_start();
$bd=file_get_contents("asset/json/base.json");
$contenu=json_decode($bd,true);
if (isset($_POST['val'])) {
	if(!empty($_POST['log']) && !empty($_POST['pass'])){
 		for ($i=0; $i < count($contenu) ; $i++) { 
 			if (isset($contenu[$i])) {
 				if ($_POST['log'] == $contenu[$i]['login'] && $_POST['pass']==$contenu[$i]['password']){
 					if ($contenu[$i]['role'] == "admin" ) {
 						$_SESSION['user'] =$contenu[$i];
 						header('location:src/liste_quest.php');
 					}
 					else{
 						$_SESSION['user'] =$contenu[$i];
 						header('location:src/interface_joueur.php');
 					}
 				}
 				else{
 					$error='erreur';
 				}
 			}
 		}
	}
	else{
	$vide='vide';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> page de connexion </title>
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
</head>
<body>
	<div class="contener">
		<div class="haut">
			 <img class="img1" src="asset/img/Images/logo-QuizzSA.png">
			<div> <center><h2 class="text1"> Le plaisir de jouer</h2> </center></div>
		</div>
		<?php if (isset($vide)){
				?>
				<P>Tous les champs sont obligatoires!</p>
					
				<?php
			} ?>
		<div class="form">

			<div class="login_form">
				<h5 class="log_form"> Login Form </h5>
			</div>
			<div>
				<form method="post" enctype="multipart/form-data" id="Myform">
					<input type="text" name="log" placeholder="Login" id="log">
					<img class="icone1" src="asset/img/Images/Icones/ic-login.png">
					<input type="password" name="pass" placeholder="password" >
					<img class="icone2" src="asset/img/Images/Icones/ic-password.png">
					<button type="submit" name="val" style="width: 6vw;position: relative;"> Connexion</button>
					<h6 class="inscrire"><a href="src/creer_user.php"> S'inscrire pour jouer? </a></h6>
					<h6 class="inscrire"><a href="src/recup_mdp.php"> Mot de passe oublier? </a></h6>
				</form>

			</div>
			</div>
			<div class="error">
			<?php if (isset($error)){
				?>
				<P>Login ou mot de passe incorrecte!</p>
				<?php
			} ?>
			</div>
			<strong><span id="error" style="font-size: 13px"></span><br></strong>
		</div>
	</div>
	
</body>
</html>
