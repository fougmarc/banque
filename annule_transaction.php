<?php
session_start();
include 'fonction/connexion.php';
$bd = bd();
$id = intval(htmlspecialchars(htmlentities($_GET['Id_etu'])));

if(isset($_GET['Id_etu'])){
    $requete = $bd->prepare("UPDATE operation SET issueoperation = 2 WHERE idopteration  = ? ");
    $donne = $requete->execute(array($id));

    header('location:espace_caissiere_liste_transaction.php');
}

?>