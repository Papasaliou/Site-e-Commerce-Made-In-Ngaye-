<?php
session_start();
include("mesfonctions/mesfonctions.php");
panier_destruction();
header("location:commande.php");
?>