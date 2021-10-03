<?php 
session_start();

include("connexion.php"); 

if(isset($_POST["connexion"]))
{

$_SESSION=array();


setcookie("email", "");

setcookie("pass", "");

$mot_pass=($_POST["pass"]);

$email=(strtolower($_POST["email"]));


$req= $database->prepare("SELECT * FROM utilisateurs WHERE email=:email AND pass=:pass");

$req->execute(array(
 "email"=>$email,
 "pass"=>$mot_pass
));

$resultat = $req->fetch();

if (!$resultat)
{
$msg=" Email et / ou Mot de passe inorrecte !";
}
else
{
    
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['email'] = $email;
    
	
	
}

if (isset($_SESSION['id']) AND isset($_SESSION['email']))
{
header('location:administration.php');
}
 
}
 ?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Connexion</title>
</head>
<body>
    <div class="FormConnexion">
        <div class="form-text">Connexion</div>
        <div class="form-saisie">
            <form method="post" action="index.php">

                <span>E-mail :</span>
                <input type="email" required name="email" placeholder="Adresse Email">

                <span>Mot de pass :</span>
                <input type="password" required name="pass" placeholder="Mot de pass">
                <input type="submit" name="connexion" value="Connexion" class="btnConn">
                Vous n'êtes pas inscris ?&nbsp;<a href="inscription.php">Inscrivez-vous</a>
            </form>
        </div>
    </div>
</body>
</html>