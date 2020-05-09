<?php
session_start();
if (!isset($_SESSION['user'])) {
	header('location:../index.php');
}
$bd=file_get_contents("../asset/json/question.json");
$tab=json_decode($bd,true);
$bd=file_get_contents("../asset/json/nombre.json");
$point=json_decode($bd,true);
?>
<?php include('comm.php') ?>
<?php include('fonction.php') ?>
<style type="text/css">
			.ch{
				border:2px solid green;
			}
			.Lq{
				background: linear-gradient( white, rgb(81,191,208));
			}
			.BLq{
				background-color: green;
			}
			.m2Lq{
				width: 20%;
				height: 43px;
				float: right;
				background-image: url('../asset/img/Icones/ic-liste-active.png');
				background-repeat: no-repeat;
				margin-top: 10px;
			}

		</style>
<div class="form2">
	<form method="post" id="Myform">
		<label>Nbre de question/Jeu</label><input type="text" name="Nqu" id="Nqu" value="<?php echo $point['pointFixe']; ?>">
		<input type="submit" style="background-color: rgb(94,145,176);color: white "name="val" value="OK"><br>
	</form>
		<div class="question">
			<form method="post">
				<table>
			<?php
			
			if (isset($_POST['suivant'] ) && $_SESSION['fin']<count($tab)) {
						$debut=$_SESSION['fin'];
						$fin=$_SESSION['fin']+5;
					}elseif (isset($_POST['precedent']) && $_SESSION['fin']>5) {
						$debut=$_SESSION['fin']-10;
						$fin=$_SESSION['fin']-5;
					}else{
						$debut=0;
						$fin=5;
					}
			$_SESSION['j']=$debut+1;
			for ($i=$debut; $i <$fin ; $i++) {
				if ($i<count($tab)) {
				echo "".$_SESSION['j'].".".$tab[$i]['question'];
				echo "<br>";
				if($tab[$i]['type']=="type checkbox"){
					foreach ($tab[$i]['reponse'] as $key => $value) {
						if($value=="true"){
							echo '<input type="checkbox" class="ch" checked="checked">';
							echo $key;
							echo "<br>";
						}else{
							echo '<input type="checkbox" class="ch">';
							echo $key;
							echo "<br>";
						}
					}	
				}else if($tab[$i]['type']=="type radio"){
					foreach ($tab[$i]['reponse'] as $key => $value) {
						if($value=="true"){
							echo '<input type="radio" checked="checked">';
							echo $key;
							
							echo "<br>";
						}else{
							echo '<input type="radio">';
							echo $key;
							echo "<br>";
						}
					}
				}else if($tab[$i]['type']=="type texte"){
					?>
					<input type="texte" style="width:200px" value="<?php echo $tab[$i]['reponse'] ?>" readonly="readonly">
					<?php
					echo "<br>";
				}
				$_SESSION['j']++;
				}
			}
			$_SESSION['fin']=$fin;
				if (isset($_POST['suivant']) OR $_SESSION['fin']>=9) {
					echo "<button  name='precedent' style='float:left;margin-left:-0vw;'> Precedent</button> ";
				}
				?>
				<?php
				if ($_SESSION['fin']< count($tab)) {
					echo "<button class='bttn' name='suivant' style='float:right;margin-top:1.7vw'> suivant</button> ";
				}
			?>
		</table>
			</form>
		</div>
		<strong><span id="error" style="font-size: 13px"></span><br></strong>
	</div>
</div>
</div>
</body>
</html>
<?php 
	if (isset($_POST['val']) && is_num($_POST['Nqu']) && $_POST['Nqu']>=5 && $_POST['Nqu']<=count($tab)) {
 					$base=array();
					$base['pointFixe']=$_POST['Nqu'];
					$tab=file_get_contents('../asset/json/nombre.json');
					$tab=json_decode($tab,true);
					$tab=$base;
					$tab=json_encode($tab);
					file_put_contents('../asset/json/nombre.json',$tab);
					header('location:liste_quest.php');
 			}else if( isset($_POST['Nqu']) && $_POST['Nqu']>count($tab)){
 				echo "Le nombre de question doit etre inferieure à ".count($tab);
 			}

?>
<script type="text/javascript">
		let Myform = document.getElementById('Myform');
		 Myform.addEventListener('submit', function(e) {
		 	let Myinput = document.getElementById('Nqu');
		 	if (Myinput.value.trim() == "") {
		 		let myError=document.getElementById('error');
		 		myError.innerHTML = "Champ obligatoires!";
		 		myError.style.color="red";
		 		e.preventDefault();
		 	}else if (Myinput.value<5) {
		 		let myError=document.getElementById('error');
		 		myError.innerHTML = "le nombre de point doit etre sup ou egale à 5";
		 		myError.style.color="red";
		 		Myinput.style.color="red";
		 		e.preventDefault();
		 	}else if(Myinput.value>$bd.lenght ){
		 		let myError=document.getElementById('error');
		 		myError.innerHTML = "le nombre de point doit etre sup ou egale à 5";
		 		myError.style.color="red";
		 		Myinput.style.color="red";
		 		e.preventDefault();
		 	}
		 });
</script>