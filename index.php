<?php 
session_start();

/*if(!isset($_SESSION ["idusers"]))
{
	header("location:index.php");
	exit();
}*/

include("connexion.php"); 

if(isset($_POST["connexion"]))
{

$_SESSION=array();


setcookie("login","");

setcookie("pass", "");

$mot_pass=($_POST["pass"]);

$nom_user=(strtolower($_POST["login"]));


$req=$connexion->prepare("SELECT * FROM users WHERE login=:login AND pass=:pass");

$req->execute(array(
 "login"=>$nom_user,
 "pass"=>$mot_pass
));

$resultat = $req->fetch();

if (!$resultat)
{
$msg=" Login et / ou Mot de passe incorrect !";
}
else
{
    
    $_SESSION['idusers'] = $resultat['idusers'];
    $_SESSION['login'] = $nom_user;
    
	
	
}

if (isset($_SESSION['idusers']) AND isset($_SESSION['login']))
{
header('location:accueil.php');
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
    <title>Connexion</title>
</head>
<body>
    <div class="FormConnexion">
        <div class="form-text">Connexion</div>
        <div class="form-saisie">
            <form method="" action="index.php">

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