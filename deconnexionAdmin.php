<?php 
session_start();

if(isset($_SESSION['diarrabousso'])){
    $_SESSION['diarrabousso']=array();

    session_destroy();//detruie la session
    //diriger l utilisateur vers la page login ou connexion
    header("Location: login.php");

}
else{
    header("Location:login.php");

}
?>