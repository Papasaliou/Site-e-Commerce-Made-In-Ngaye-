<?php
session_start();
include("connexion.php");
include("mesfonctions/mesfonctions.php");

if(!isset($_SESSION['IdClient'])){
header("Location:AuthentificationClient.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <<meta charset="UTF-8">
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
                <a href="Accueil.php"> Acceuil</a>
                <a href="listProduitsClient.php"> Produits</a>
                <a href="client1.php"> Nouveautes</a>
                <a href="spaceClient.php"> Mon Compte</a>
                <a class="cart-icon" href="commande.php"><i class="fas fa-shopping-cart"></i>
                <span class="cart-count text-danger">
                <?php 
                 if(isset($_SESSION['panier']))
                  {
                    $nombre=0;
                    foreach($_SESSION['panier'] as $key =>$article)
                    {
                      $nombre+=$_SESSION['panier'][$key]['count'];
                    }  
                    echo $nombre;
                 }
                  ?> 
                0</span> </a>
                <a href="deconnexion.php"  class="btn" >Se deconnecter</a>            
            </ul>
        </nav>
    </header>
</br>
</br>
</br>
</br>

<div class="container mt-5">
        <div class="row">
          <?php 
          if(isset($_GET['id']))
          {
            $id=$_GET['id'];
            $requete="select * from produit where idProduit=?"; 
            $stmt=$connexion->prepare($requete);
            $stmt->execute(array($id));
            $row=$stmt->fetch();
          
          echo'  <div class="col-lg-10">
                <div class="card mb-3" style="max-width: 600px; background-color: #BBBBBB; color:cornsilk; ">
                    <div class="row g-0 " >
                        <div class="col-md-4" >
                            <img style=" background-color:cornsilk; padding:5px;"src="'.$row['image'].'" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title">'.$row['nom'].'</h2>
                                <h2 class="card-text">Prix: '.$row['prix'].' FCFA </h2>
                            </div>
                            <div>
                                <form class="row g-3" action="AjouterDansPanier.php" method="post">
                                    <div class="col-auto">
                                        <input type="hidden" name="identifiant" value="'.$row['idProduit'].'">
                                    </div>
                                    <div class="col-auto mx-5">
                                        <input type="number" id="quantity" name="quantity" value="1" min="1" max="1000" style="max-width:40px; height:35px; font-size: 15px; background-color:cornsilk; color:#193E06;font-size:20px;">
                                    </div>
                                    <div class="col-auto m-">
                                        <button type="submit" class="btn btn-primary " style="height:35px; margin-left: 50px; font-size:17px; color:#193E06; background-color:cornsilk;">Ajouter Au Panier</button>
                                    </div>
                                </form>
                            </div>
                       </div>
                   </div>
               </div>
            </div>
            <div class="col-lg-2">
                
            
            </div>';
          }
         
      echo'  </div>
        <div>';?>

           <!-- Blog Section -->
    <section  class="menu" id="menu">
    <h3 class="headin">Achetez à <span>Petit Prix</span> </h3>
       <div class="box-container">
   <?php    $requete = " SELECT * FROM produit";
$resultat = $connexion->query($requete);
if (!$resultat) {
    echo("Erreur : " . $connexion->error);
}
while ($row = $resultat->fetch()) {
     echo  '  <div class="box">
               <img src="'.$row['image'].'">
               <h3>'.$row['nom'].'</h3>
             <a href="monPanier.php?id='.$row['idProduit'].'" class="btn link-btn">Acheter</a>

       </div> ';
    }
    echo'</div>';
?> 
    </section>
</body>
</html>