<?php
session_start();
include("connexion.php");
//include("MesFonctions/db_Addproduit.php");

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
               <a href="listProduitsClient.php" class="btn"> Produits</a>
               <a href="spaceClient.php" class="btn"> Mes Commandes</a>
               <a class="cart-icon" href="commande.php"><i class="fas fa-shopping-cart">
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
                +</span>
               </i> 
               <a href="deconnexion.php"  class="btn" >Se deconnecter</a>              
            </ul>
        </nav>
        
</header>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<?php
echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
<h1 class="" style="font-weight:bold;font-size:20;">Historique des commandes</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">IdCommande</th>
                <th scope="col">MontantTotal</th>
                <th scope="col">QuantiteTotal</th>
                <th scope="col">DateCommande</th>
            </tr>
        </thead>
        <tbody>';

$access = "SELECT * FROM commande  order by IdCommande desc";
$resultat = $connexion->query($access);

if (!$resultat) {
    echo("Erreur : " . $connexion->error);
}

while ($row = $resultat->fetch()) {
    echo '
        <tr>
            <td>' . $row['IdCommande'] . '</td>
            <td>' . $row['MontantTotal'] .' FCFA</td>
            <td>' . $row['QuantiteTotal'] . '</td>
            <td>' . $row['DateCommande'] . '</td>
            <td><a class="btn btn-primary" href="DetailsCommande.php?IdCommande='.$row['IdCommande'].'">Details</a></td>
            <td><a class="btn btn-danger" href="AccepterSuppression.php?idSupprimer='.$row['IdCommande'].'">Supprimer</a></td>
        </tr>';
}

echo '
        </tbody>
    </table>
</div>';
?>
</div>
</div>
</div>
</div>  
<!-- Contact Section -->
<section class="footer">
       <div class="footer-box">
        <h2>Made IN Ngye</h2>
         <p>Soutenons nos artisans <br>
             en achetant les produits  <br>
            fabriques aux  pays </p>
       <div class="social">
               <a href="#"><i  class="fa-brands fa-square-facebook box"></i></a>
               <a href="#"> <i class="fa-brands fa-square-twitter box "></i></a>
               <a href="#" ><i class="fa-brands fa-square-google-plus box"></i></a>
               <a href="#"><i class="fa-brands fa-linkedin box"></i></a>
                <a href="#" ><i class="fa-brands fa-square-instagram box"></i></a>
              <a href="#"><i class="fa-brands fa-square-pinterest box"></i></a>    
        </div>
    </div>
        <div class="footer-box">
            <h2>Pages</h2>
             <li><a href="acceuil.php">Acceuil</a></li>
               <li><a href="produit.php">Produits</a></li>
              <li><a href="clients.php">Clients</a></li>
              <li><a href="#">Notre Boutique</a></li>
               <li><a href="#">Notre Collectio</a></li>
                <li><a href="#">Notre Blog</a></li>
        </div>
        <div class="footer-box">
            <h2>Contact</h2>
            <div class="contact">
                 <span><i class="fa-solid fa-location-dot"></i> Ngaye Mekhe, Dakar, Senegal</span>
                 <span><i class="fa-solid fa-mobile"></i>+00 123 456 789</span>
                 <span><i class="fa-solid fa-square-envelope"></i>info@eclatelegant.com</span>

            </div>
        </div>
       
    </section>
 <div class="copyright">
     <p>&#169, 2024 MadeInNgaye. Tous droits réservés</p>
 </div> 

</body>

</html>
