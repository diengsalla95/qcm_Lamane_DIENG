
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> liste questions </title>
	<link rel="stylesheet" type="text/css" href="../asset/css/style1.css">
	<link rel="stylesheet" type="text/css" href="../asset/css/styleImg.css">
</head>
<body>
	<div class="contener">
		<div class="haut">
			<div> <img class="img1" src="../asset/img/Images/logo-QuizzSA.png"></div>
			<div> <center><h2 class="text1"> Le plaisir de jouer</h2> </center></div>
		</div>
		<div class="bande">
			<div><center><h4 class="text2"> CREER ET PARAMERTER VOS QUIZZ</h4> </center> </div>
			<div class="logout"><button><a href="logout.php" onclick="return(confirm('voulez vous deconnecter?'));"> Deconnexion</a></button></div>
		</div>
		<div class="form">
			<div class="form1">
				<div class="profil">
					<div class="roundeImage">
						<img style=" width: 90px;height: 90px;border-radius: 50%; " src="../asset/img/<?php echo $_SESSION['user']['image'] ?>">
					</div>

					<div style="margin-left: 50%;color: white;font-size: 20px">
					<br>
					<div><?php echo $_SESSION['user']['prenom'] ?></div>
					<div style="margin-left: 2vw"><?php echo $_SESSION['user']['nom'] ?></div>
					</div>
				</div>
				<div class=menu>
					<div class="barre BLq"></div>
					<div class="menu1 Lq">
						<div class="m1"> <p><strong><a href="liste_quest.php">Liste Questions</a></p></strong></div>
						<div class="m2Lq"></div>
					</div>
					<div class="barre BCa"></div>
					<div class="menu1 Ca">
						<div class="m1"> <p><strong><a href="creerAdmin.php">Creer Admin</a></p></strong></div>
						<div class="m2Ca"></div>
					</div>
					<div class="barre BLj"></div>
					<div class="menu1 Lj" >
						<div class="m1"> <p><strong><a href="liste_joueur.php">Liste joueurs</a></p></strong></div>
						<div class="m2Lj"></div>
					</div>
					<div class="barre BCq"></div>
					<div class="menu1 Cq">
						<div class="m1"> <p><strong><a href="creer_quest.php">Creer Questions</a></p></strong></div>
						<div class="m2Cq"></div>
					</div>
					
				</div>
			</div>
			
</body>
</html>