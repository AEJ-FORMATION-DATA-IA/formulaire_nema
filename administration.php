<?php 
session_start();
include("connexion.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>
<title>TP formulaire</title>
</head>
 <body>
  <table>
  <tr>
    <td><?php
  include("connexion.php");
   $requet="SELECT * FROM utilisateurs  ORDER BY id ASC";
   $prepare= $database->prepare($requet);
   $reponse=$prepare->execute();
?>
    <table border="1">
        <tr><td rowspan="2"> N° </td>
	     <td rowspan="2"> Nom & Prenom(s)</td>
	     <td rowspan="2"> Email </td>
         <td rowspan="2"> Date d'inscription </td>
	     <td class="admin" colspan="2"> Action </td>
	    </tr>
	    <tr><td class="admin"> Modifier </td><td class="admin"> Supprimer </td></tr>
	   <?php
	    while ($donnee=$prepare->Fetch()){ ?>
			<tr><td><?php echo $donnee['id'];?></td>
			 <td><?php echo $donnee['pseudo'];?></td>
			 <td><?php echo $donnee['email'];?></td>
			 <td><?php echo $donnee['date_inscription'];?></td>
			 <td class="admin"><a href="modifier_utilisateur.php? num=<?php echo $donnee['id'];?>"> Modifier </a></td>
			 <td class="admin"><a href="suppression_utilisateur.php? num=<?php echo $donnee['id'];?>"> Supprimer </a></td>
			</tr>
			<?php 
	    } ?>
	</table></td>
  </tr>
</table>

</script>
</body>
</html>
