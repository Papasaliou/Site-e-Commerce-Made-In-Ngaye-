
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.1/css/all.css" />
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <title>MadeInNgaye</title>
    
</head>
<body>
 
 <!-- Header -->
 <header class="header">
    <div class="logo"><span>Made In </span>Ngaye</div> 
        
        <nav class="navbar">
            <ul>
            <a href="Accueil.php" class="btn"> Acceuil</a>
               <a href="ListeProduitsAdmin.php" class="btn">Produits</a>
               <a href="ListeClient.php" class="btn"> Clients</a>
               <a href=" AjoutProduit.php" class="btn"> Ajouter Produit</a>
               <a href=" ListeCommandeAdmin.php" class="btn">Commande</a>
               <a href="deconnexionAdmin.php"  class="btn" >Se deconnecter</a>            
            </ul>
        </nav>
    </header>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
<div class="mg-5">
<?php
include("connexion.php");

echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mg-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Nom</th>
                <th scope="col">Prix</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>';

$requete = " SELECT * FROM produit ORDER BY idProduit DESC";
$resultat = $connexion->query($requete);

if (!$resultat) {
    echo("Erreur : " . $connexion->error);
}

while ($row = $resultat->fetch()) {
    echo '
        <tr>
            <td><img src="'.$row['image'].'" class="img-thumbnail rounded" style="width: 50px; height: 50px;"></td>
            <td>' . $row['nom'] . '</td>
            <td>' . $row['prix'] . '</td>
            <td><a href="" type="button" class="btn btn-primary" >Modifier</a></td>
            <td><a href="AccepterSuppressionProduit.php?idSupprimer='.$row['idProduit'].'" type="button" class="btn btn-danger" >Supprimer</a></td>

        </tr>';
}

echo '
        </tbody>
    </table>
</div>';
?>
</div>

</body>