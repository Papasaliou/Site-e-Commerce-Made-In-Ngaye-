<?php
     session_start();
     include("connexion.php");
     if(!isset($_GET['IdCommande'])) 
     {

     }
     else{
        $idcom=$_GET['IdCommande'];
        $reque="SELECT nom as libelle,image,prix,Quantite,DateCommande,MontantTotal
        FROM client
        JOIN commande c ON client.IdClient = c.IdClient
        JOIN detailscommande dc ON c.IdCommande = dc.IdCommande
        JOIN produit p ON dc.idProduit = p.idProduit
        WHERE c.IdCommande = ?";
        $stmt=$connexion->prepare($reque);
        $stmt->execute(array($idcom));

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
<body class="banner">
    <section class="bannerValiderSuppRessource d-flex justify-content-center align-items-center w-100">
            <div class="row">
                <div class="col-sm-12  py-5" >
                    <div class="formRessource">
                    <div class="titreR">Details Commande</div>
                    <div class="traitR"></div>
                    <div class="d-flex justify-content-center">
                    <div class="container box-container" >
                        <table class="table " style="font-size:20px;">
                        <thead>
                            <tr>
                                <th></th>
                                <th >Nom </th>
                                <th >Prix Unitaire</th>
                                <th >Quantite</th>
                                <th >Sous-Total</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>';
                            <?php
                            $montant=0;
                        while($row=$stmt->fetch())
                        {
                            echo'<tr>
                            <td><img src="'.$row['image'].'" class="img-thumbnail rounded" style="width: 60px; height: 60px;"></td>
                            <td>'.$row['libelle'].'</td>
                            <td>'.$row['prix'].'/'.$row['unite'].'</td>
                            <td>'.$row['Quantite'].'</td>
                            <td>'.$row['Quantite'].'  FCFA</td>
                            <td>'.$row['DateCommande'].'</td>
                        </tr>';
                        $montant=$row['MontantTotal'];
                        }
                        echo'
                        <tr class="bg-success">
                        <td>Total</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>'.$montant.'FCFA</td>
                        </tr>
                        </tbody>
                        </table>';
                        ?>

                        <div class="me-5">
                            <a href="spaceClient.php" class="btn btn-danger" style="font-size:20px;"><span>Retourner</span></a>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </section>
</body>
</html>