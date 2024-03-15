<?php
/*session_start();


//creer une variable qui va recevoir tous les produits


if(!isset($_SESSION['diarrabousso']))
{
  header("Location:Login.php");
}
  

if(empty($_SESSION['diarrabousso']))
{
  header("Location:Login.php");
}*/
require("commander.php");


?>



<doctype html>
    <html>
        <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
      
            <title>Admin</title>
        </head>
        <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                <a class="navbar-brand" href="#">Accueil</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="indexe.php"style=" font-weight:bold; ">Nouveau</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="Supprimer.php"style=" font-weight:bold; ">Supprimer</a>
                    </li>
                    </li>
                    </ul>
                    <div style="display-flex; justify-content:flex-end;" >
                       <a href="deconnexion.php"  class="btn btn-primary" >Se deconnecter</a>
                  </div>
                </div>
</div>
</nav>
    <div class="album py-5 bg-light">
         <div class="container">

             <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

              <form method="POST">
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
                <input type="text" class="form-control" name="nom" required>
             </div>
             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Image</label>
                 <input type="text" class="form-control" name="image" required>
    
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
    if(isset($_POST['nom']) && isset($_POST['image']) && isset($_POST['prix']) && 
    isset($_POST['description']))
        {
            if(!empty($_POST['nom']) && !empty($_POST['image']) && 
            !empty($_POST['prix']) && !empty($_POST['description']))
                 { 
                   //htmlspecialchars(strip_tags:securiser les donnees
                    $nom=htmlspecialchars(strip_tags($_POST['nom']));
                    $image=htmlspecialchars(strip_tags($_POST['image']));
                    $prix=htmlspecialchars(strip_tags($_POST['prix']));
                    $description=htmlspecialchars(strip_tags($_POST['description']));
                    try 
                    {
                        ajouter($nom, $image, $prix, $description);
                    }
                     catch (Exception $e) 
                     {
                        echo"erreur".$e->getMessage();

                        
                    }

                    //strip_tags//permert de filtrer les donnees
                    
                 }
       }
}

 ?>