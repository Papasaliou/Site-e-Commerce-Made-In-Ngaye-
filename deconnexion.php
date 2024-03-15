<?php 
session_start();
if(!empty($_SESSION)){
    session_destroy();//detruie la session
    //diriger l utilisateur vers la page login ou connexion
    header("Location: AuthentificationClient.php");
}
else{
    header("Location:AuthentificationClient.php");
}
?>