<?php
//traitement de l authentification
    session_start();
    include("../connexion.php");
    if(isset($_POST['Seconnecter'])){
    if(!empty($_POST))
    {
    if(isset($_POST['Email']) and isset($_POST['motdepasse']))
    {
        $Email=$_POST['Email'];
        $motdepasse=$_POST['motdepasse'];
        $requete="select * from client where Email=? and motdepasse=?";
        $stmt=$connexion->prepare($requete);
        $stmt->execute(array($Email,$motdepasse));
        $row=$stmt->fetch();
        if($row)
        {
        $_SESSION['IdClient']=$row['IdClient'];
        $_SESSION['Nom']=$row['Nom'];
        $_SESSION['Prenom']=$row['Prenom'];
        $_SESSION['Email']=$row['Email'];
        $_SESSION['Telephone']=$row['Telephone'];
        $_SESSION['Ville']=$row['Ville'];
        $_SESSION['Adresse']=$row['Adresse'];
        $_SESSION['motdepasse']=$row['motdepasse'];

        //echo'<script> window.location.href="profilClient.php";</script>';
        header("Location:../spaceClient.php");
    //    echo" ".$_SESSION['IdClient']."</br>";
    //    echo"". $_SESSION['Nom']."</br>";
    //    echo"". $_SESSION['Prenom']."</br>";
    //    echo" ".$_SESSION['Email']."</br>";
    //    echo" ".$_SESSION['Ville']."</br>";
        }
    }
    }
}else{
    echo"mauvaise reception des donnees";
}
?>
