
<?php
     session_start();
     include("connexion.php");
    
    //  $reque="SELECT * FROM vendeur,tarif,produits WHERE vendeur.idVend=tarif.idVend AND
    //   produits.id_Produit=tarif.id_Produit limit 3";
    //  $stmt=$connexion->prepare($reque);
    //  $stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
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
   <script>

    $(document).ready(function(){
      var commentCount=3;
      $("#BoutonVoirplus").click(function(){
        commentCount=commentCount+3;
        $("#conteneur").load("voirTout.php",{
          commentNewCount: commentCount
        });
      });
      $("#VoirPlusDeBoutique").click(function(){
        $("#conteneurBout").load("VoirPlusDeBoutique.php");
      })
    });
  </script>
    </head>
<body class="banner">

    <section class="bannerValiderSuppRessource d-flex justify-content-center align-items-center w-100">
            <div class="row">
                <div class="col-sm-12  py-5" >
                    <div class="formRessource">
                    <div class="titreR">Voulez vous Continuer</div>
                    <div class="traitR"></div>
                    <div class="d-flex justify-content-center">
                        <div class="me-5"><a <?php if(isset($_GET['idSupprimer'])) 
                        echo'href="traitements/traitementAccepterSuppression.php?idSup='.$_GET['idSupprimer'].'"';?> class="btn btn-danger" style="font-size:20px;"><span>OUI</span></a></div>
                        <div><a href="spaceClient.php" class="btn btn-primary" style="font-size:20px;"><span>NON</span></a></div>
                    </div>
                </div>
            </div> 
        </div>
    </section>
</body>
</html>