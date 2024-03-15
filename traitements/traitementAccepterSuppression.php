<?php
session_start();
include("../connexion.php");

if(isset($_GET['idSup']))
{
    $idSupp=$_GET['idSup'];
    $requete4 = "delete from commande where IdCommande=?";
    $stmt4=$connexion->prepare($requete4);
    $stmt4->execute(array($idSupp));
    header("location:../spaceClient.php");
}

if(isset($_GET['idSupProduit']))
{
    $idSupp=$_GET['idSupProduit'];
    $requete4 = "delete from produit where idProduit=?";
    $stmt4=$connexion->prepare($requete4);
    $stmt4->execute(array($idSupp));
    header("location:../ListeProduitsAdmin.php");
}

?>