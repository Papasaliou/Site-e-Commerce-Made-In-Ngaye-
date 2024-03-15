<?php 
$SERVEUR="localhost";
$user="root";
$paassword="";
$dbname="madeinngaye";

try{
       
       // Établir la connexion à la base de données
        $connexion=new PDO("mysql:host=$SERVEUR;dbname=$dbname",$user,$paassword);
        // Configurer PDO pour qu'il émette des avertissements en cas d'erreur
        $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        // Définir le jeu de caractères à utiliser
        $connexion->exec("SET NAMES 'utf8'");
        //echo"la connexion est etablie ";
}
catch(Exception $e)
{
       echo"erreur de connexion".$e->getMessage();
}


?>