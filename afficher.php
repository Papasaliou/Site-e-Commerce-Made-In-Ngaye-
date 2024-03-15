<?php 
include("connexion.php");
	/* Determiner le nombre de produits à afficher sur chaque page*/
	$nbr_produits_sur_chaque_page = 2;
	/* La page actuelle, apparaîtra dans l'URL  comme index.php?page=produits&p=1 ou p=2 ce signifié la page 1 l& page 2 etc...*/
	$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
	/* Sélectionnez les produits commandés par la date ajoutée*/
	$stmt = $pdo->prepare('SELECT * FROM produit ORDER BY idProduit DESC LIMIT ?,?');
	/* bindValue nous permettra d'utiliser des entiers dans la déclaration SQL, que nous devons utiliser pour LIMIT.*/
	$stmt->bindValue(1, ($current_page - 1) * $nbr_produits_sur_chaque_page, PDO::PARAM_INT);
	$stmt->bindValue(2, $nbr_produits_sur_chaque_page, PDO::PARAM_INT);
	$stmt->execute();
	/* récupérer les produits de la base de données et retourner le résultat sous la forme d'un tableau.*/
	$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
	

?>
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
$Produits=afficher();


?>



<doctype html>
    <html>
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
<br>
<br>
        <style>
            .image-card {
            height: 500px; /* Remplacez la valeur par la hauteur souhaitée */
            /*object-fit: cover;*/
           width:auto;
     }
        </style>
        <br>
        <br>

        <br>
        <br>
        <br>
        <br>
        <body>
        <header class="header">
    <div class="logo"><span>Made In </span>Ngaye</div>
        
        <nav class="navbar">
            <ul>
            <a href="Accueil.php"> Acceuil</a>
               <a href="afficher.php"> Produits</a>
               <a href="client1.php"> Clients</a>
               <button type="button" class="btn btn-outline-light ms-auto" data-bs-toggle="modal" data-bs-target="#loginModal">Connexion</button>
            
            </ul>
        </nav>
    </header>
<br/>
</nav>
    <div class="album py-5 bg-light">
         <div class="container">

             <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

              
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
     <table class="table">
                <thead>
                <tr>
                    <th scope="col">CodeProduit</th>
                    <th scope="col">image</th>
                    <th scope="col">NomProduit</th>
                    <th scope="col">PrixUnitaire</th>
                    <th scope="col">Categorie</th>
                    <th scope="col">Editer</th>

                </tr>
                </thead>

                <tbody>
                  <?php foreach ($Produits as $produit): ?>
                <tr>
                    <th scope="row"><?= $produit->idProduit?></th>

                    <td>
                      <img src="<?= $produit->image?>" style="width:20%;">
                    </td>

                    <td>
                    <?= $produit->nom?>
                    </td>

                    <td style= "font-weight: bold; color:green;">
                    <?= $produit->prix?>CFA XOF
                    </td>

                    <td>
                    <?=substr ($produit->description,0,200); ?>...
                    </td>
                    <td>
                    <a href="editer.php?pdt=<?= $produit->idProduit?>"> <i class="fa fa-pencil"  style=" font-size:  "></i> </a>
                    </td>


                </tr>
                <?php endforeach; ?>
                  </tbody>

               
     </table>

      
        </div>
    </div>
</div>
</body>
</html>
