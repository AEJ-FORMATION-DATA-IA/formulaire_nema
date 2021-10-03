<?php
include("connexion.php");

 if (isset($_POST['id'])){
	 $idg=$_GET['num'];
	 $pseudo=$_POST['pseudo'];
	 $email=$_POST['email'];
	 $pass=$_POST['pass'];
	 
	 
	 
	 
	 
	 $requete="UPDATE utilisateurs SET pseudo=?, email=?, pass=? WHERE id=?";
	 $prepare = $database->prepare($requete);
	 $reponse = $prepare->execute(array($pseudo, $email, $pass, $idg));
	 if($reponse==true){
header("location:administration.php");
echo " Modification éfféctuée";
	}
	else { echo "Modification non éffectuée";}
	}
?>
<?php
 $num=$_GET['num'];
   $requet="SELECT * FROM utilisateurs WHERE id=?";
   $prepare=$database->prepare($requet);
   $reponse=$prepare->execute(array($num));
   $donnees=$prepare->Fetch();
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>
<title>TP formulaire</title>
</head>
 <body> 
 <table width="1030" height="" border="">
  <tr style="color: white">
                <td style="background-color:#090"><h2 align="center"  style="font-family:Tahoma" > MODIFIER L'UTILISATEUR </h2></td>
                
             </tr>
  </table>

<form method="POST" action="modifier_utilisateur.php? num=<?php echo $num;?>">
		        <table>
				 <tr style="color: green"><td> Identifiant : </td><td> <input type="text" readonly name="id" value="<?php echo $donnees['id']; ?>"/></td></tr>
		
			     
			     <tr><td style="color: green"> Nom & Prenom  : </td><td> <input type="text" name="pseudo" value="<?php echo $donnees['pseudo']; ?>"/></td></tr>

<tr><td style="color: green"> Email: </td><td> <input type="text" name="email" value="<?php echo $donnees['email']; ?>"/></td></tr> 

<tr><td style="color: green"> Mot de pass : </td><td> <input type="pass" name="pass" value="<?php echo $donnees['pass']; ?>"/></td></tr>            			 
				 <tr style="color: green"><td></td><td> <input type="submit" value="Modifier"/> <input type="reset" value="Annuler"/> </td></tr>
			   
			</form>
            
             </table>
            
</body>
</html>