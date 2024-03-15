<?php


         function checkExtention($filename,$extentionarray)
         {
             $file_Extention=strtolower(substr(strrchr($filename,'.'),1));
             if(in_array($file_Extention,$extentionarray))
             return true;
             return false;
         }
         function check_img_ext($filename) 
         {
             $imageExtent=array('jpg','png','jpeg','gif','webp');
             return checkExtention($filename,$imageExtent);
         }
         function move_file($sourcefile,$destpath,$destfile)
         {
             if(!is_dir($destpath))
             {
                 mkdir($destpath);
             }
             $hdc=date('dmy_h',time());
             $destination=$destpath."/".$hdc.$destfile;
             if(move_uploaded_file($sourcefile,$destination))
             {
                return $destination;
             }
             else
             {
                 echo"Le deplacement du fichier est sans succes";
                 return null;
             }
            }
          
 
// pour les produits
    function ajoutProduit($nom,$image,$prix,$description)
    {
        include("connexion.php");
        $requete="insert into produit (nom,image,prix,description) values(?,?,?,?)";
        $stmt=$connexion->prepare($requete);
        $stmt->execute(array("$nom","$image",$prix,$description));
    }

	function deleteProduit($id)
	{
		include("mesfonctions/mesfonctions.php");
		$requette1="Delete from produit where idProduit=?";
		$stmt=$connexion->prepare($requette1);
		$stmt->execute(array($id));
	}
	function modifierProduit($id,$libelle,$categorie,$prixUnitaire, $unite)
	{
		$requette="update produits set libelle=$libelle,categorie=$categorie prixUnitaire=$prixUnitaire,unite=$unite where id_Produit=?";
		$stmt=$connexion->prepare($requette);
		$stmt->execute(array($id));
	}

// Gestion des Paniers
function panier_AddProduit($idProduit,$nom,$image,$count=1,$description)
{
    if (!panier_verifierExistance())
        panier_creer();
	foreach ($_SESSION["panier"] as $key => $article)
	{
		if ($article["id"] == $idProduit)
		{
			$_SESSION["panier"][$key]["count"] += $count;
			$count=$_SESSION["panier"][$key]["count"];
			return ;
		}
	}

	$_SESSION["panier"][] = [
		"id"	=>	$idProduit,
		"nom"	=>	$nom,
		"image"   =>$image,
		"count"	=>$count,
		"description" =>$description
	];
}


function panier_RemoveProduit($idProduit, $count = 1)
{
	if (!panier_verifierExistance())
		return (false);
	foreach ($_SESSION["panier"] as $key => $article)
	{
		if ($article["id"] == $idProduit)
		{
			if ($article["count"] - $count <= 0 || $count < 0)
				unset($_SESSION["panier"][$key]);
			else
			{
				$_SESSION["panier"][$key]["count"] -= $count;
			}
			return (true);
		}
	}
	return (false);
}


function panier_creer()
{
	if (!isset($_SESSION["panier"]))
		$_SESSION["panier"] = [];
}

function panier_verifierExistance()
{
	if (!isset($_SESSION["panier"])
		|| !is_array($_SESSION["panier"]))
		return (false);
	return (true);
}

function panier_destruction()
{
	if (isset($_SESSION["panier"]))
		 unset($_SESSION["panier"]);
}
    

?>
        