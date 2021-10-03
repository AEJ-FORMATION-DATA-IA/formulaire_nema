<?php include("connexion.php"); ?>
<?php
    if (isset($_POST['envoyer'])){
	 $pseudo=$_POST['pseudo'];
	 $email=$_POST['email'];
	 $pass=$_POST['pass'];
	 
	 
$req=$database->prepare("SELECT pseudo,email,pass FROM utilisateurs WHERE pseudo=:pseudo and email=:email and pass=:pass");
$req->execute(array("pseudo"=>$pseudo, "email"=>$email, "pass"=>$pass));
$resultat = $req->fetch();
if ($resultat)
{
echo "Vous avez deja un compte !";
}
else
{
$requete="INSERT INTO utilisateurs(pseudo,email,pass) VALUES(?,?,?)";
$prepare=$database->prepare($requete);
$reponse=$prepare->execute(array($pseudo,$email,$pass));
if($reponse==1){
	echo "SUccess!";
    header('location:administration.php');
	}
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Inscription</title>
</head>
<body>
    <div class="FormInscrs">
        <div class="form-text">Inscription</div>
        <div class="form-saisie">
            <form method="post" action="">
                <span>Nom & Prenom :</span>
                <input type="text" required name="pseudo" placeholder="Votre Nom et Prenom(s)">

                <span>Adress Email :</span>
                <input type="email" required name="email" placeholder=" Votre Adresse Email">

                <span>Mot de pass :</span>
                <input type="password" required name="pass" placeholder="Votre mot de pass">
                <input type="submit" name="envoyer" value="S'inscrire" class="btnInscris">
                Etes-vous inscris ?&nbsp;<a href="index.php">Connectez-vous</a>
            </form>
        </div>
    </div>
</body>
</html>