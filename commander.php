<!--<?php
//require("connexion.php");
?>-->
<?php

function getClient($email,$motdepasse)

 {
    if(require("connexion.php"))
    {
        $access="SELECT* FROM client WHERE email = ? AND motdepasse = ? "; 
        //executer
        $req=$connexion->prepare($access);
        $req->execute(array($email,$motdepasse));
        //verifier sil ya un utilisateur qui a l email et le mdp qu on vient de donner
        if($req->rowCount()==1)
        {
            $data=$req->fetch();
            return $data;

        }
        else
         {
            return false;
        }

    }
}
   
 function getAdmin($email,$motdepasse)

 {
    if(require("connexion.php"))
    {
        $access="SELECT* FROM admin WHERE email = ? AND motdepasse = ? "; 
        //executer
        $req=$connexion->prepare($access);
        $req->execute(array($email,$motdepasse));
        //verifier sil ya un utilisateur qui a l email et le mdp qu on vient de donner
        if($req->rowCount()==1)
        {
            $data=$req->fetch();
            return $data;

        }
        else
         {
            return false;
        }

    }


        


        $req->closeCursor();

}


function ajouter($nom,$image,$prix,$description)//produit
 {
    
    if(require("connexion.php"))
    {
        $access=("INSERT INTO  produit (nom, image, prix, description) VALUES(?,?,?,?)");
        //executer
        $req=$connexion->prepare($access);
        $req->execute(array($nom, $image, $prix, $description));

        $req->closeCursor();

    }
}
function afficher()
{
   
    if(require("connexion.php"))
    {
        $access="SELECT* FROM produit ORDER BY nom DESC ";
        $req=$connexion->prepare($access);
        //recuper ou executer
        $req->execute();
        $data=$req->fetchALL(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
        
    }
}

    function supprimer($idProduit)
    {
        if(require("connexion.php"))
        {
            $access=("DELETE FROM  produit WHERE idProduit=?");
            $req=$connexion->prepare($access);
            $req->execute(array($idProduit));
            

        }

    }
    
 
    

?>