<?php
include '../fonction/connexion.php';
$bd = bd();

if(isset($_GET['Id_clt'])){
    $idc = intval(htmlspecialchars(htmlentities($_GET['Id_clt'])));
    $requete = $bd->prepare("UPDATE client SET archive = 1 WHERE idclient = ? ");
    $donne = $requete->execute(array($idc));
    
    $requete = $bd->prepare("UPDATE compte SET archive = 1 WHERE idclient = ? ");
    $donne = $requete->execute(array($idc));
    header('location:liste-clients.php');
}

if(isset($_GET['Id_cpte'])){
    $id = intval(htmlspecialchars(htmlentities($_GET['Id_cpte'])));
    $requete = $bd->prepare("UPDATE caissiere SET archive = 1 WHERE idcaisse  = ? ");
    $donne = $requete->execute(array($id));
    header('location:liste-caissiere.php');
}


?>