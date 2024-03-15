<?php 
function ajouter($Nom,$Prenom,$Adresse,$Ville,$Email,$motdepasse,$Telephone)//produit
{
   
   if(require("../connexion.php"))
   {
       $access=("INSERT INTO client (Nom,Prenom,Adresse,Ville,Email,Telephone,motdepasse) 
       VALUES(?,?,?,?,?,?,?)");
       //executer
       $req=$connexion->prepare($access);
       $req->execute(array($Nom,$Prenom,$Adresse,$Ville,$Email,$Telephone,$motdepasse));

       $req->closeCursor();

   }
}


?>