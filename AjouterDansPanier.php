<?php
session_start();
include("mesfonctions/mesfonctions.php");
include("connexion.php");

if(!isset($_SESSION['IdClient']))
{
    header("location:AuthentificationClient.php");
}

if(!panier_verifierExistance())
{
   header("location:monPanier.php");
}
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
            </i></a>
            <a href="deconnexion.php"  class="btn" >Se deconnecter</a> 
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
</br>
</br>

<?php
    if(isset($_POST['identifiant']) and isset($_POST['quantity']))
    {
        $id=$_POST['identifiant'];
        $quantite=$_POST['quantity'];
        $reque="SELECT * from produit where idProduit=?";
        $stmt=$connexion->prepare($reque);
        $stmt->execute(array($id));
        while($row=$stmt->fetch())
        {
            panier_AddProduit($row['idProduit'],$row['nom'],$row['image'],$quantite,$row['description']);
        }
            header("Location:commande.php");
    }
    else{
      echo"Le formulaire n'est pas bien renseigner";
    }
    

    if( isset($_POST['Nom']) and isset($_POST['Prenom']) and 
    isset($_POST['Adresse']) and isset($_POST['phone']) and 
    isset($_SESSION['total']) and isset($_SESSION['IdClient']) and isset($_SESSION['panier']) )
    {
       $total=$_SESSION['total'];
       $idClient=$_SESSION['IdClient'];
       $nombreProduit= $_SESSION['nombreProduit'];
       $nom=$_POST['Nom'];
       $prenom=$_POST['Prenom'];
       $tel=$_POST['phone'];
       $adresse=$_POST['Adresse'];
       /*insertion dans la table commande*/
       $requete4="insert into commande (MontantTotal,QuantiteTotal,IdClient) values(?,?,?)";
       $stmt4=$connexion->prepare($requete4);
       $stmt4->execute(array($total,$nombreProduit,$idClient));
       $idCommande=$connexion->lastInsertId();
       $_SESSION['Macommande']=$idCommande;
       $requeteDes="insert into livraison (idCommande,QteTotale,nomD,prenomD,telephoneD,adresseLiv) values(?,?,?,?,?,?)";
       $stmtDes=$connexion->prepare($requeteDes);
       $stmtDes->execute(array($idCommande,$nombreProduit,$nom,$prenom,$tel,$adresse));


     /* insertion dans la table sous_commande*/
     foreach ($_SESSION["panier"] as $key => $article)
     { 
       $requete4="SELECT * FROM produit WHERE idProduit=?";
       $stmt=$connexion->prepare($requete4);
       $stmt->execute(array($article['id']));
       $ligne=$stmt->fetch();

       
       $requete5="insert into detailscommande (IdCommande,idProduit,Quantite,PrixUnitaire) values(?,?,?,?)";
       $stmt5=$connexion->prepare($requete5);
       $stmt5->execute(array($idCommande,$ligne['idProduit'],$article['count'],$ligne['prix']));

     }
      if($stmt4==true)
      {
           panier_destruction();
           header('Location:spaceClient.php');
          
         // <!-- <script>
         //     alert("votre commande est bien passe");
         //     window.location.href = "profilClient.php";
         // </script> -->
          
      }
 
echo'
<form action="paiementValider.php" method="post">
<div class="container mt-5">
   <div class="row">
   
       <div class="col-lg-6">
           <div class="card w-100" style="border: solid 2px #193E06; size:100px;">
               <div class="card-body">
                 <h5  style="font-size:20px;" class="card-title"> Choisir Mode Paiement</h5>
               </div>
               <ul class="list-group list-group-flush">
                   <li style="font-size:20px; color:#193E06;" class="list-group-item">
                     <span> <input type="radio" name="paiement[]" value="domicile" >Paiement a la Livraison</span>
                   </li>
                   <li style="font-size:20px; color:#193E06;" class="list-group-item"><span><input type="radio"  name="paiement[]" value="orange" > Orange Money</span>
                     <img src="Images/logo_om_black.svg"/>
                   </li>
                   <li style="font-size:20px; color:#193E06;" class="list-group-item">
                   <span><input type="radio" name="paiement[]" value="wave" >Avec Wave</span>
                   <img src="Images/unnamed.webp" style="height: 200px; width: 450px;"/>
                   </li>
               </ul>
           </div>
       </div>
       <div class="col-lg-6">
           <div class="card w-100" style="border: solid 2px #193E06; size:100px;">
             <div class="card-body">
               <h5  style="font-size:20px;" class="card-title">Details Livraison</h5>
             </div>
             <ul class="list-group list-group-flush">
               <li style="font-size:20px;" class="list-group-item"><span>'.$prenom.''.$nom.'</span></li>
               <li style="font-size:20px;" class="list-group-item"><span> '.$adresse.'</span></li>
               <li style="font-size:20px;" class="list-group-item"><span>'.$tel.'</span></li>
               <li style="font-size:20px;" class="list-group-item"><span>'.$adresse.'</span></li>
             </ul>
             <div class="card-body">
               <span style="font-size:20px;" href="#" class="card-link">Total:</span>
               <span style="font-size:20px;"  href="#" class="card-link">'.$total.'</span>
             </div>
           </div>
       </div>

       </div>
       <div class="card-body my-5" style="text-align:center;  background-color:#193E06;">
           <span style="font-size:30px;" href="paiementValider.php" class="card-link"><input style=" width: 1000px;background-color:#193E06;color:cornsilk;" type="submit" value="poursuivre"></span>
       </div>
   </div>
</div>
</form>';
}

?>
<?php
if(isset($_GET['idDiminuer']))
{
    $id=$_GET['idDiminuer'];
    panier_RemoveProduit($id);
    header("Location:commande.php");
  // echo' <script>window.location.href="monPanier.php";</script>';
}
?>
    

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