<?php
function inscription(){
	//strrchr trouve la derniere occurence dans une chaine.
	//substrr(".jpg",1) retourne jpg
	//strtolower retourn string, apres avoir converti tous les caracteres en minuscule.
      if(isset($_FILES['image']) AND !empty($_FILES['image']['name'])){
        $extensionsValides=["jpg","jpeg","png"];
        $nomImage = $_FILES['image']['name'];
          $extensionToUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
          if (in_array($extensionToUpload, $extensionsValides)){
            $chemin = "../asset/img/".$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $chemin);
          }
      }
?>
<?php
if (isset($_POST['valid'])) {
	$base1=array();
	$base1['login']=$_POST['login'];
	$base1['password']=$_POST['password'];
	$base1['prenom']=$_POST['prenom'];
	$base1['nom']=$_POST['nom'];
	$base1['role']=$_POST['role'];
	$base1['image']=$nomImage;
	$base1['score']=$_POST['score'];
	$contenu=file_get_contents('../asset/json/base.json');
	$contenu=json_decode($contenu,true);
	$contenu[]=$base1;
	$contenu=json_encode($contenu,JSON_PRETTY_PRINT);
	file_put_contents('../asset/json/base.json',$contenu);
}
}

// fonction est positif
function is_num($carac){
	$rep=true;
	for ($i=0;(isset($carac[$i])) ; $i++) { 
		if ($carac[$i]!="0" && $carac[$i]!="1" &&$carac[$i]!="2" && $carac[$i]!="3" && $carac[$i]!="4" & $carac[$i]!="5" && $carac[$i]!="6" &&$carac[$i]!="7" &&$carac[$i]!="8" && $carac[$i]!="9"){
			$rep=false;
		}
	}
	return $rep;
}
?>
