<?php
     session_start();
     include( "mesfonctions/mesfonctions.php");
     include("connexion.php");
     
     if(!isset($_SESSION['IdClient']))
     {
        header("location:AuthentificationClient.php");
     }
     
     $reque="select * from produit";
     $stmt=$connexion->prepare($reque);
     $stmt->execute();
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
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>

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
            <a class="cart-icon" href="commande.php" ><i class="fas fa-shopping-cart">
            <?php 
                     if(isset($_SESSION['panier']))
                     {
                       $nombre=0;
                       foreach($_SESSION['panier'] as $key =>$article)
                       {
                         $nombre+=$_SESSION['panier'][$key]['count'];
                       }  
                       $_SESSION['nombreProduit']=$nombre;
                       echo $nombre;
                    }
                ?>
                +</span>
            </i></a>
            <a href="deconnexion.php"  class="btn" >Se deconnecter</a>  
        </ul>
    </nav>
</header>

 <div id="div">

    </div>
    
    <div class="container" style="color:#193E06;">
        <h3 class="mt-5" style="font-weight:bold;font-size:40;">Mon Panier</h3>
        <div class="row pt-5">
           
            <?php 
                if(panier_verifierExistance())
                {
                    echo ' <table class="table ">
                    <thead>
                        <tr>
                            <th></th>
                            <th ></th>
                            <th >Nom </th>
                            <th >Prix </th>
                            <th >Nombre</th>
                            <th >Sous Total</th>
                            
                        </tr>
                    </thead>
                    <tbody>';
                    foreach ($_SESSION["panier"] as $key => $article)
                    { 
                        $requete4="SELECT * FROM produit WHERE idProduit=? ";
                        $stmt=$connexion->prepare($requete4);
                        $stmt->execute(array($article['id']));
                        $ligne=$stmt->fetch();

                       echo'<tr>
                            <td><a href="AjouterDansPanier.php?idDiminuer='.$article['id'].'&nombre='.$article['count'].'"><i class="fa fa-close" style="font-size:40px;color:red"></i></a></td>
                           
                            <td><img src="'.$article['image'].'" class="img-thumbnail rounded" style="width: 50px; height: 50px;"/></td>
                            
                            <td>'.$article['nom'].'</td>
                            <td>'.$ligne['prix'].'</td>
                            <td>'.$article['count'].'</td>
                            <td>'.$ligne['prix'] * $article['count'].'</td>
                        </tr>';
                    }
                    
               
           
             echo'   </tbody>
            </table>
            <div class="container">
                <div class="row">
                  <div class="col-lg-8"></div>
                  <div class="col-lg-4" style="text-align:right;"><a class="btn btn-info" href="ViderPanier.php" style="font-size:20px; font-weight:bold;">vider Le Panier</a></div>
                </div>
            </div>

       
        </div>
    </div>';
}
else{
    echo"<h1 style='color:brown; font-weight:bold;'>VOTRE PANIER EST VIDE <h1/>";
}
?>

<?php 
            if(panier_verifierExistance())
                {
          echo'
    <!-- contact section starts  -->
    <section class="contact" id="contact" style="color:#193E06;">
        <div class="container my-5">
       
        <form action="AjouterDansPanier.php" method="post" >
            <div class="row align-items-center">
            <h1 class="heading"> Details Livraison </h1>
                <div class="col-md-6">
                    <input class="form-control form-control-lg box" type="text"  placeholder="Nom" name="Nom">
                    <input class="form-control form-control-lg" type="text" placeholder="Prenom" name="Prenom">
                    <input class="form-control form-control-lg" type="number" placeholder="phone" name="phone"> 
                    <input class="form-control form-control-lg" type="text" placeholder="Adresse" name="Adresse" >        
                </div>
                
                <div class="col-md-6 mb-5 mb-md-0 ">
                   
                </div>
           </div>
           <div class="container " style="margin-top:100px;">
            <h1 class="mb-5">Votre Commande</h1>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Produits</th>
                    <th scope="col">Sous-Total</th>
                    </tr>
                </thead>
                <tbody>';

                $total=0;
                foreach ($_SESSION["panier"] as $key => $article)
                { 
                    $requete4=" SELECT * FROM produit where idProduit=? ";
                    $stmt=$connexion->prepare($requete4);
                    $stmt->execute(array($article['id']));
                    $ligne=$stmt->fetch();
                    $total+=$ligne['prix']* $article['count'];
                    $_SESSION['total']=$total;

                  echo' <tr>
                        <td>'.$ligne['nom'].'</td>
                        <td>'.$ligne['prix']*$article['count'].'</td> 
                    </tr>';
                }
               echo'
              
               <tr>
                    <td>Total</td>
                    <td>'.$total.'</td>
               </tr>
            
       
                </tbody>
                </table>
               ';
       
     
         echo'  </div>
           <div class="container my-5">
                <div class="row" style="font-size :20px;">
                    <div class="card">
                        <div class="card-body">
                          <input type="hidden" name="commander" value="-1" >
                          <input style="font-size:30px;" type="submit" value="Commander" class="link-btn form form-control" id="commander">
                        </div>
                    </div>
                </div>
           </div>
           </form>
        </div>

</div>';
}

?> 
</section>
</br>
</br>
</br>
</br>
</br>


 <!-- footer section starts  -->

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