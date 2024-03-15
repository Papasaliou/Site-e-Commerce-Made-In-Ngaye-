<?php
include("mesfonctions/mesfonctions.php");
include("connexion.php");
session_start();


//creer une variable qui va recevoir tous les produits

if(!isset($_SESSION['diarrabousso']))
{
  header("Location:Login.php");
}
  

if(empty($_SESSION['diarrabousso']))
{
  header("Location:Login.php");
}
require("commander.php");
?>



<doctype html>
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
            <a href="Accueil.php"> Acceuil</a>
               <a href="ListeProduitsAdmin.php">Produits</a>
               <a href="ListeClient.php"> Clients</a>
               <a href=" AjoutProduit.php"> Ajouter Produit</a>
               <a href="deconnexion.php"  class="btn btn-primary" >Se deconnecter</a>
            
            </ul>
        </nav>
    </header>
        <body>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
    <div class="album py-5 bg-light">
         <div class="container">

             <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

              <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post"  enctype="multipart/form-data">
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
                <input type="text" class="form-control" name="nom" required>
             </div>
             <div class="form-group mb-3">
             <label for="exampleInputPassword1" class="form-label">Image</label>
                <input class="form-control " type="file" accept="image/*" name="image" >
            </div>
            
             <div class="mb-3">
                 <label for="exampleInputPassword1" class="form-label">Prix</label>
                  <input type="number" class="form-control" name="prix"  required>
             </div>
             <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            
              <button type="submit"  name="valider" class="btn btn-primary">Ajouter un nouveau produit</button>
        </form>
        </div>
    </div>
</div>
</body>
</html>

<?php
 
 if(isset($_POST['valider']))
 {
    if(isset($_POST['nom']) && isset($_POST['prix']) && 
    isset($_POST['description']) && isset($_FILES['image']))
        {
            if(!empty($_POST['nom']) && !empty($_POST['prix']) && 
            !empty($_POST['description']) && !empty($_FILES['image']))
                 { 
                    $path="MesImages";
                    $nomsrc=$_FILES['image']['tmp_name'];
                    $nom=$_FILES['image']['name'];
                    if(check_img_ext($nom))
                    {
                      $image=move_file($nomsrc,$path,$nom);
                      if($image==null)
                        echo"null";
                      else
                      $nom=htmlspecialchars(strip_tags($_POST['nom']));
                      $prix=htmlspecialchars(strip_tags($_POST['prix']));
                      $description=htmlspecialchars(strip_tags($_POST['description']));
              
                        echo  $nom."</br>";
                        echo  $image."</br>";
                        echo  $description."</br>";
                        ajoutProduit($nom, $image, $prix, $description);
                        header("Location:ListeProduitsAdmin.php");
                        
                    }else{
                        echo"mauvais extention";}              
                 }else{
                    echo"Les champs sont vides";}
       }else{
        echo"Les champs ne sont pas bien renseigner";}
}
 ?>