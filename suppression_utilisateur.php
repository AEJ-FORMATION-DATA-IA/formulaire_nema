<?php
$id=$_GET['num'];
include("connexion.php");
$requete="DELETE FROM utilisateurs WHERE id=?";
$prepare= $database->prepare($requete);
$reponse=$prepare->execute(array($id));
echo'<scipt type="text/javascipt"> alert("Suppression effectuee avec succes") </scipt>';
header("location:administration.php");
?>