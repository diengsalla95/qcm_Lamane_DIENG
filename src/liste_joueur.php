<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('location:../index.php');
}
$bd=file_get_contents("../asset/json/base.json");
$contenu=json_decode($bd,true);

// Obtient une liste de colonnes
foreach ($contenu as $key => $row) {
    $score[$key]  = $row['score'];
}

// Tri les données par score décroissant, 
// Ajoute $contenu en tant que premier paramètre, pour trier par la clé commune
array_multisort($score, SORT_DESC,$contenu);

?>
<?php include('comm.php') ?>
<style type="text/css">
	.Lj{
		background: linear-gradient( white, rgb(81,191,208));
	}
	.BLj{
		background-color:green;
	}
	.m2Lj{
				width: 20%;
				height: 43px;
				float: right;
				background-image: url('../asset/img/Icones/ic-liste-active.png');
				background-repeat: no-repeat;
				margin-top: 10px;
			}
</style>
			<div id="form2">
					<label style="margin-left: 0.5vw">LISTE DES JOUEURS PAR SCORE</label>
				<div class="question">
					<form method="post">
					<table>
						<tr>
							<strong><td style="background-color:  rgb(81,191,208)"> Nom</td></strong>
							<strong><td style="background-color:  rgb(81,191,208)"> Pr&eacute;nom</td></strong>
							<strong><td style="background-color:  rgb(81,191,208)"> Score</td></strong>
						</tr>
						<tr>
					<?php
					//Recuperation des joueur dans un tableau new
					$new=array();
					for ($i=0; $i < count($contenu) ; $i++) { 
						if ($contenu[$i]['role']=="joueur") {
							array_push($new, $contenu[$i]);
						}
					}
					if (isset($_POST['suivant'] ) && $_SESSION['fin']<count($new)) {
						$debut=$_SESSION['fin'];
						$fin=$_SESSION['fin']+13;
					}elseif (isset($_POST['precedent']) && $_SESSION['fin']>13) {
						$debut=$_SESSION['fin']-26;
						$fin=$_SESSION['fin']-13;
					}else{
						$debut=0;
						$fin=13;
					}
					for ($i=$debut; $i <$fin ; $i++) { 
						if ($i<count($new)) {
						?>
						<td><?php echo $new[$i]['nom'];?></td>
						<td><?php echo $new[$i]['prenom'];?></td>
						<td><?php echo $new[$i]['score']." pts ";?></td>
						</tr>
						<?php
						}
					}
					$_SESSION['fin']=$fin;
						?>	
					</table>
				</div>
				<?php
				if (isset($_POST['suivant']) OR $_SESSION['fin']>=25) {
					echo "<button  name='precedent'> Precedent</button> ";
				}
				?>
				<?php
				if ($_SESSION['fin']< count($new)) {
					echo "<button class='bttn' name='suivant' style='float:right'> suivant</button> ";
				}
				
				?>
				</form>
			</div>
		</div>
	</div>
</body>
</html>