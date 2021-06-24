<?php
include 'fonction/connexion.php';
$bd = bd();
$id = intval(htmlspecialchars(htmlentities($_GET['Id_cpte'])));
$idc = intval(htmlspecialchars(htmlentities($_GET['Id_clt'])));
$idferme = intval(htmlspecialchars(htmlentities($_GET['Id_cpteferme'])));

if(isset($_GET['Id_clt'])){
    $requete = $bd->prepare("UPDATE client SET archive = 1 WHERE idclient = ? ");
    $donne = $requete->execute(array($idc));
    
    $requete = $bd->prepare("UPDATE compte SET archive = 1 WHERE idclient = ? ");
    $donne = $requete->execute(array($idc));
    header('location:espace_caissiere_liste_clients.php');
}

if(isset($_GET['Id_cpte'])){
    $requete = $bd->prepare("UPDATE compte SET archive = 1 WHERE idcompte = ? ");
    $donne = $requete->execute(array($id));
    header('location:espace_caissiere_liste_comptes.php');
}

if(isset($_GET['Id_cpteferme'])){
    $date = date("d-m-Y H:i:s");
    $requete = $bd->prepare("UPDATE compte SET archive = 1, datefermeture = ? WHERE idcompte = ? ");
    $donne = $requete->execute(array($date, $idferme));
    header('location:espace_caissiere_fermeture_compte.php');
}


?>