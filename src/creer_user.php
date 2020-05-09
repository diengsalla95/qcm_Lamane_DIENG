<?php
session_start();
include('fonction.php');
$bd=file_get_contents("../asset/json/base.json");
$contenu=json_decode($bd,true);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> liste questions </title>
	<link rel="stylesheet" type="text/css" href="../asset/css/style1.css">
</head>
<body>
	<div class="contener">
		<div class="haut">
			<div> <img class="img1" src="../asset/img/Images/logo-QuizzSA.png"></div>
			<div> <center><h2 class="text1"> Le plaisir de jouer</h2> </center></div>
		</div>
		<div class="form_joueur">
			<div class="form_joueur1">
				<strong style="margin-left: 2vw"> S'INSCRIRE</strong><br>
				<h5 style="margin-left: 2vw;margin-top: 0vw;opacity: 0.5;font-size: 10px" >Pour tester votre niveau de culture générale</h5>
				<div class="inscrire1">
				<form method="post" enctype="multipart/form-data" id="Myform">
					<strong><span id="error" style="font-size: 13px"></span><br></strong>
					<label class="label" for="prenom">Prenom</label>
					<p><input type="text" name="prenom" id="prenom"></p><br>
					<label class="label" for="nom">Nom</label>
					<p><input type="text" name="nom" id="nom"></p><br>
					<label class="label" for="login">Login</label>
					<p><input type="text" name="login" id="login"></p><br>
					<label class="label" for="password">Password</label>
					<p><input type="password" name="password" id="password" style="border:3px solid rgb(178,227,234);"></p><br>
					<label class="label" for="conf">Confirmer Password</label>
					<p><input type="password" name="Confirmer" id="conf" style="border:3px solid rgb(178,227,234);"></p><br>
					<label class="label">Avatar</label>
					<input style="width: 7vw;border:2px solid rgb(178,227,234)" type="file" id="photo" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
					<input type="hidden" name="role" value="joueur">
					<input type="hidden" name="score" value=0>
					<button type="submit" name="valid">Cr&eacute;er compte</button>
				</form>
			</div>
		</div>
		<div class="form_joueur2">
			<div style="width: 100%;height: 130px">
				<div class="image_joueur">
						<img id="blah"  width="120" height="120" style="border-radius:50%" />
					</div>
				
			</div>
		</div>
		</div>
	</div>
	<?php
	include('scripte!.php');
if (isset($_POST['valid'])) {
	$n=strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
	for ($i=0; $i <count($contenu) ; $i++) { 
		if ($_POST['login']==$contenu[$i]['login']) {
			?>
			<center><h2>Ce login existe !</h2></center>
			<?php
			exit;
		}
	}
	if ($n=="jpg" || $n=="png"|| $n=="jpeg") {
		inscription();
	}else{
		?>
			<center><h2>extension non valide !</h2></center>
		<?php
	}
	
}
?>
</body>
</html>
