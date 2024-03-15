<?php 
include "connexion.php";
?>
<!doctype html>
<html >
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>client</title>
     <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
 </head>
<body>
<header class="header">
        <div class="logo"><span>Made In </span>Ngaye</div>
        <nav class="navbar">
            <ul>
            <a href="Accueil.php"> Acceuil</a>
               <a href="produit.php"> Produits</a>
              <a href="client1.php"> Clients</a>
            
            </ul>
        </nav>
    </header>
<br/>
<div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
     
        
        
        <table class="table">
                <thead>
                <tr>
                    <th scope="col">codeClient</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Ville</th>

                </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    $Nom="";
                    $Prenom ="";
                    $Email="";
                    $Adresse="";
                    $Ville="";
                    $Telephone="";
                    $errorMessage="";
                    $succesMessag="";
                    
                    if($_SERVER['REQUEST_METHOD']=='POST')
                    {
                        $Nom=$_POST["nom"];
                        $Prenom=$_POST["prenom"];
                        $Email=$_POST["email"];
                        $Adreese=$_POST["adresse"];
                        $Telepone=$_POST["telephone"];
                        do {
                            
                            if(empty($Name)|| empty($Prenom)||empty($Email)||empty($Adreese)||empty($Telephone)){
                                $errorMessage="fichier recu";
                                break;
                    
                            }
                            $Nom="";
                            $Prenom ="";
                            $Email="";
                            $Adresse="";
                            $Ville="";
                            $Telephone="";
                            //creer un new clinet
                            $succesMessage="client cree ";
                                break;
                           
                    
                    
                        } while (false);
                    
                    }
                    
                
                        $access="SELECT* FROM client ";
                        $resultat=$connexion->prepare($access);
                        $resultat->execute();

                        if(!$resultat)
                        {
                            echo("invalide:".$connexion->error);
                        }
                        while($row=$resultat->execute())
                        {
                            echo "
                            <tr>
                                <th>" . $row['idClient'] . "</th>
                                <td>" . $row['Nom'] . "</td>
                                <td>" . $row['Prenom'] . "</td>
                                <td>" . $row['Email'] . "</td>
                                <td>" . $row['Ville'] . "</td>
                                <td>" . $row['Adresse'] . "</td>
                                <td>" . $row['Telephone'] . "</td>
                                
                               
                            </tr>";
                                
                                      
 

                        }
                    

                    
                    ?>
                </tbody>
</table>




</div>
</div>    
</body>
</html>
