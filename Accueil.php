</br>
</br>
</br>
</br>
            

<?php
session_start();
include("connexion.php");
include( "mesFonctions/mesfonctions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.1/css/all.css" />
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
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
            <a class="cart-icon"  href="commande.php"><i class="fas fa-shopping-cart">
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
            </i></a>
            <button type="button" class="btn btn-outline-light ms-auto" data-bs-toggle="modal" data-bs-target="#loginModal">Connexion</button>
        </ul>
    </nav>
</header>
<br/>
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="loginModalLabel">Connexion</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>

             <div class="modal-body">
                 <!-- Ajoutez ici votre formulaire de connexion -->
                 <form method="post" action="traitements/traitementAutentification.php">
                     <div class="mb-3">
                         <label for="loginInput" class="form-label">Email</label>
                         <input type="text" name="Email" class="form-control" id="loginInput" placeholder="Email">
                     </div>
                     <div class="mb-3">
                         <label for="passwordInput" class="form-label">Mot de passe</label>
                         <input type="password" name="motdepasse" class="form-control" id="passwordInput" placeholder="Password">
                     </div>
                     <!-- Autres champs de formulaire de connexion -->
                     <div class="text-center">  <button type="submit" name="Seconnecter" class="btn btn-primary">Se connecter</button></div>
                 </form>
                 <a href="InscriptionClient.php">S'inscrire</a>
               
             </div>
         </div>
     </div>
 </div>

    <!-- Hero Section -->
    <section class="home">
        <div class="infos">
            <h1>Bienvenue a Made IN Ngaye </h1>
            <p style="text-align:justify;">L'artisanat de Ngaye est un trésor culturel qui célèbre la créativité,
            le talent et l'héritage séculaire des artisans locaux. 
            Chaque pièce raconte une histoire, capturant l'essence même de la vie sénégalaise et
            offrant une immersion authentique dans la richesse de la culture et de l'artisanat de la région.
            </p>
            <a href="listProduitsClient.php" class="btn">Shop Now</a>
        </div>
        <div>
           <img  style="width:200%"; src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQaCARVuoq_e-pGYgoeRT2gnMP57XlhGXPIwA&usqp=CAU"/>
        </div>
    </section>

    <!-- Collections Section 
    <section class="collect" >
    <h2 class="headin"> Nos Collections</h2>
       
       <div class="row">

       <div class="image">
        <img src="p2.jpeg" width="200px" height="350px"/>
       </div>

       <div class="image">
        <img src="a1.jpeg" width="200px" height="350px"/>
       </div>
       <div class="image">
        <img src="https://i.pinimg.com/474x/99/ef/9c/99ef9c4fd760d71a28d17f6f660ff8b1.jpg" width="200px" height="350px"/>
       </div>
      
    </div>
    </section>-->

    <!-- Personnalisation Section 
    <section   class="bout" >
    <h2 class="headin2">NgayeShop</h2>
    <div class="row">
        <div class="content2">
         <h3>Explorez Notre Boutique</h3>
         <p>Nous vous invitons à explorer notre boutique en ligne, une vitrine scintillante de <br> 
         pièces uniques qui sauront captiver votre cœur. De la délicatesse des pièces inspirées<br>
          par la nature à l'éclat abordable des créations élégantes,<br>
          découvrez nos produits artisanaux fabriques au Senegal dans la region de Ngaye.
         </p>
            </div>
            <div class="image">
               <img src="imageAc.jpeg" style="width:50%";/>
             </div>
  </div>
    </section>-->
    <?php
include("connexion.php");
?>

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
  <!------------Blog Section------------------>
   
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