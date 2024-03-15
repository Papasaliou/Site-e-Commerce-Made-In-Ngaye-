<?php 
require("../mesfonctions/interactionbd.php");
?>

<?php
if(isset($_POST["Sinscrire"]))
{
    if(isset($_POST['Nom']) && isset($_POST['Prenom']) && isset($_POST['Adresse']) && 
    isset($_POST['Ville']) && isset($_POST['Email']) && 
    isset($_POST['motdepasse']) && isset($_POST['Telephone']))
    {
        if(!empty($_POST['Nom']) && !empty($_POST['Prenom']) && !empty($_POST['Adresse']) && 
        !empty($_POST['Ville']) && !empty($_POST['Email']) && 
        !empty($_POST['motdepasse']) && !empty($_POST['Telephone']))
        { 
            $Nom = htmlspecialchars(strip_tags($_POST['Nom']));
            $Prenom = htmlspecialchars(strip_tags($_POST['Prenom']));
            $Adresse = htmlspecialchars(strip_tags($_POST['Adresse']));
            $Ville = htmlspecialchars(strip_tags($_POST['Ville']));
            $Email = htmlspecialchars(strip_tags($_POST['Email']));
            $motdepasse = htmlspecialchars(strip_tags($_POST['motdepasse']));
            $Telephone = htmlspecialchars(strip_tags($_POST['Telephone']));

            try 
            {
                ajouter($Nom, $Prenom, $Adresse, $Ville, $Email, $motdepasse,$Telephone);
                header("Location:../InscriptionClient.php");
            }
            catch (Exception $e) 
            {
                echo "Erreur : " . $e->getMessage();
            }
        }
        else
        {
            echo "Les variables sont vides";
        }
    }
    else
    {
        echo "Les données existent";
    }
}
else
{
    echo "Bienvenue";
}
?>