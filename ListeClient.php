<?php
include("connexion.php");
?>
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
               <a href="deconnexion.php"  class="btn" >Se deconnecter</a>            
            </ul>
        </nav>
    </header>
</br>
</br>
</br>
</br>
<body>
    <div class="container my-5">
        <h2 class="text-center" style="font-weight:bold;">Liste Des Clients</h2>
        <table class="table">
        <thead>
                <tr>
                    <th scope="col">codeClient</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Ville</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php 
                   
                        $sql="SELECT*FROM client";
                        $access=$connexion->query($sql);
                        if(!$access)
                        {
                            echo"erreur".$connexion->error;
                        }
                        while($row=$access->fetch())
                        { echo"
                    
                    <th>" . $row['IdClient'] . "</th>
                    <td>" . $row['Nom'] . "</td>
                    <td>" . $row['Prenom'] . "</td>
                    <td>" . $row['Email'] . "</td>
                    <td>" . $row['Ville'] . "</td>
                    <td>" . $row['Adresse'] . "</td>
                    <td>" . $row['Telephone'] . "</td>
                    <td><a href='SupprimerClient.php' class='btn btn-danger'>Supprimer</a></td>
                    
                </tr>
                         
                        ";}
                    
                        
                    ?>
                    
                </tbody>

        </table>
 
    </div>
    
</body>
</html>