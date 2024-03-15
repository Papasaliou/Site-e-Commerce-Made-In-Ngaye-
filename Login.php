<?php
session_start();
include "commander.php";

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
</br>
  <div class="album py-5 bg-light">
  <div class="container-fluid">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            <div class="col-m1-3"></div>
            <div class="col-m1-6">

        <form method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
               
            </div>
            <div class="mb-3">
                <label for="mdp" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="mdp" >
            </div>
           
            <input type="submit" class="btn btn-danger"  name="envoyer" value="Se connecter">

            </div>
            <div class="col-m1-3"></div>
        </div>
    </div>
  </div>
    
  </body>
</html>
<?php
    
    if(isset($_POST['envoyer']))
    {
        if(!empty($_POST['email']) AND  !empty($_POST['mdp']) )
        {
            $email=htmlspecialchars( strip_tags($_POST['email']));
            $motDepasse=htmlspecialchars(strip_tags($_POST['mdp']));

            $admin=getAdmin($email,$motDepasse);

            if($admin)
            {//crrer ne session pour stocker toute les info de l admininistrateur
                $_SESSION['diarrabousso']=$admin;
                header("Location:ListeProduitsAdmin.php");
            }
            else
            {
                header("Location:Login.php");

            }

        }
    }

?>