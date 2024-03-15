
<!doctype html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.1/css/all.css" />
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <title>MadeInNgaye</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header class="header">
    <div class="logo"><span>Made In </span>Ngaye</div>
    <nav class="navbar">
        <ul>
            <a href="Accueil.php"> Acceuil</a>
            <a href="listProduitsClient.php"> Produits</a>
            <a href="spaceClient.php"> Mon Compte</a>
            <button type="button" class="btn btn-outline-light ms-auto" data-bs-toggle="modal" data-bs-target="#loginModal">Connexion</button>
        </ul>
    </nav>
</header>

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
                     <button type="submit" name="Seconnecter" class="btn btn-primary">Se connecter</button>
                 </form>
                 <a href="InscriptionClient.php">S'inscrire</a>
             </div>
         </div>
     </div>
 </div>


<br/>
 <section>
  <br>
  <br>
  <br>
  <br>

    <div class="album py-5 bg-light">
         <div class="container">

             <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

              <form method="POST" action="traitements/traitementInscriptionClient.php">
              
             <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Nom</label>
                 <input type="text" class="form-control" name="Nom" >
    
             </div>
            
             <div class="mb-3">
                 <label for="exampleInputPassword1" class="form-label">Prenom</label>
                  <input type="text" class="form-control" name="Prenom"  >
             </div>
             <div class="mb-3">
             <label for="exampleFormControlTextarea1" class="form-label">Email</label>
             <input type="text" class="form-control" name="Email" >
            
            </div>

             <div class="mb-3">
             <label for="exampleFormControlTextarea1" class="form-label">Adresse</label>
             <input type="text" class="form-control" name="Adresse">
             
             <div class="mb-3">
             <label for="exampleFormControlTextarea1" class="form-label">Mot de passe</label>
             <input type="password" class="form-control" name="motdepasse">
            
            </div>
            <div class="mb-3">
             <label for="exampleFormControlTextarea1" class="form-label">Ville</label>
             <input type="text" class="form-control" name="Ville" >
            
            </div>
            <div class="mb-3">
             <label for="exampleFormControlTextarea1" class="form-label">Telephone</label>
             <input type="number" class="form-control" name="Telephone"  >
            
            </div>
              <button type="submit"   name="Sinscrire" class="btn btn-primary">Sinscrire</button>
        </form>
        </div>
    </div>
</div>
</section>   
</body>
</html>