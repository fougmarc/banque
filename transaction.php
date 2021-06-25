<?php
session_start();
include 'fonction/connexion.php';
$bd = bd();
$id = htmlspecialchars(htmlentities($_GET['Id_etu']));
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Espace - Caissière</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
            
<div id="wrapper" class="bg-dark">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-light sidebar sidebar-white accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ESPACE CAISSIÈRE</div>
      </a>

      <hr class="sidebar-divider my-0">

      <!-- Heading -->
      <div class="sidebar-heading" style="margin:5px auto;">
        <i class="fas fa-fw fa-login"></i>
        Mon profil
      </div>
      <?php 
        $requete = $bd->prepare("SELECT * FROM caissiere WHERE emailcaisse = ? ");
        $requete->execute(array($_SESSION['mail']));

        while($donne = $requete->fetch()){
      ?>
      <img src="image/user.png" class="rounded-circle border" alt="image" style="height: 200px; width:200px; margin:10px auto;"/>
      <!-- Nav Item - Tables -->
      <label style="margin-left: 20px; font-weight:bold;">
          Nom :<?php echo $donne['nomcaisse']; ?>
      </label>
      <label style="margin-left: 20px; font-weight:bold">
          Prenom :<?php echo $donne['prenomcaisse']; ?>
      </label>
      <label style="margin-left: 20px; font-weight:bold">
          Email :<?php echo $donne['emailcaisse']; ?>
      </label>
      <label style="margin-left: 20px; font-weight:bold">
          Numero Telephone :<br> <?php echo $donne['numerocaisse']; ?>
      </label>
      <?php
        }
      ?>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand text-light topbar mb-4 static-top shadow" style="background:rgb(60,36,139);">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
          <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small btn btn-light">Deconnexion</span>
                <i class="fas fa-power-off"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Deconnexion
                </a>
              </div>
            </li>

          </ul>

        </nav>          
               
            
<!-- -->

<!-- -->

        <!-- End of Topbar -->

        <?php
                if (isset($_POST['sauvegarde'])) {
                  //verification si les données parrains saisies
                  if (!empty($_POST['soldecpte']) AND !empty($_POST['idopteration'])) {
                    
                    $soldecpte = htmlspecialchars($_POST['soldecpte']);
                    $idopteration = htmlspecialchars($_POST['idopteration']);
                    $idcompte = htmlspecialchars($_POST['idcompte']);

                            
                    $requete = $bd->prepare("UPDATE operation SET issueoperation = 1 WHERE idopteration  = ? ");
                    $donne = $requete->execute(array($idopteration));

                    $requete = $bd->prepare("UPDATE compte SET soldecpte = ? WHERE idcompte  = ? ");
                    $donne = $requete->execute(array($soldecpte, $idcompte));

                    echo '<script>location.href="http://localhost/Projet_php/banque/espace_caissiere_liste_transaction.php"</script>';

                    }
                }elseif(isset($_POST['annuler'])) {
                    //verification si les données parrains saisies
                    if (!empty($_POST['soldecpte']) AND !empty($_POST['idopteration'])) {
                      
                      $soldecpte = htmlspecialchars($_POST['soldecpte']);
                      $idopteration = htmlspecialchars($_POST['idopteration']);
                      
                      $requete = $bd->prepare("UPDATE operation SET issueoperation = 2 WHERE idopteration  = ? ");
                      $donne = $requete->execute(array($id));

                     
                      echo '<script>location.href="http://localhost/Projet_php/banque/espace_caissiere_liste_transaction.php"</script>';
  
                      }
                  }
                ?>
                
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Bienvenue dans l'espace caissière </h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Liste des transactions <a href="espace_caissiere_home.php" class="btn btn-danger text-white" style="float:right;">Retour </a></h6>
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <?php 
                    $requete = $bd->prepare("SELECT * FROM operation LEFT JOIN compte ON operation.numerocpte = compte.numerocpte LEFT JOIN client ON client.idclient = compte.idclient LEFT JOIN agence ON operation.idagence = agence.idagence LEFT JOIN modeoperation ON operation.idmodeoperation  = modeoperation.idmodeoperation  LEFT JOIN typecompte ON typecompte.idtypeoperation = operation.idtypeoperation LEFT JOIN sexe ON sexe.idsexe = client.idsexe WHERE operation.idopteration = ?");
                    $requete->execute(array($id));
                ?>
                
                <form method="POST" action="">
                <div class="modal-body">
                <?php
                    
                    while($donnes = $requete->fetch() ){ 
                ?>
                    <center><legend>Informations compte</legend></center>
                    <div class="form-group row">
                      <div class="form-group col-4">
                        <label>Numéro opération</label>
                        <input type="hidden" name="idopteration" value="<?php echo $id; ?>">
                        <input readonly type="text" class="form-control"  value="<?php echo $donnes['numerooperation'].''.$donnes['idopteration']; ?>" >
                      </div>
                      <div class="form-group col-4">
                        <label>Numéro de compte</label>
                        <input type="hidden" name="idcompte" value="<?php echo $donnes['idcompte']; ?>">
                        <input readonly type="text" class="form-control"  value="<?php echo $donnes['numerocpte'].''.$donnes['idcompte']; ?>" >
                      </div>
                      <div class="form-group col-4">
                        <label>Solde</label>
                        <input readonly type="text" class="form-control"  value="<?php echo $donnes['soldecpte'].' FCFA'; ?>" >
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="form-group col-4">
                        <label>Date d'opération</label>
                        <input readonly type="datetime" class="form-control" name="dateoperation" value="<?php echo $donnes['dateoperation']; ?>" >
                      </div>
                      <div class="form-group col-4">
                        <label>Type opération</label>
                        <input readonly type="datetime" class="form-control" name="libtypeoperation" value="<?php echo $donnes['libtypeoperation']; ?>" >
                      </div>
                      <div class="form-group col-4">
                        <label>Mode opération</label>
                        <input readonly type="datetime" class="form-control" name="libmodeoperation" value="<?php echo $donnes['libmodeoperation']; ?>" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="form-group col-6">
                        <label>Nouveau solde</label>
                        <?php 
                            if($donnes['libtypeoperation'] == "Dépôt"){
                             $nouveau = intval($donnes['soldecpte']) + intval($donnes['montantoperation']);
                            }else{
                                $nouveau = intval($donnes['soldecpte']) - intval($donnes['montantoperation']);
                            }
                        ?>
                        <input readonly type="text" class="form-control" value="<?php echo $nouveau.' FCFA'; ?>" >
                        <input type="hidden" class="form-control" name="soldecpte" value="<?php echo $nouveau; ?>" >
                      </div>
                      <div class="form-group col-6">
                        <label>Transaction ??</label>
                        <input readonly type="text" class="form-control" name="transaction" value="<?php if($nouveau < 0){echo "Transaction Impossible"; }else{echo "Transaction Possible"; } ?>" >
                      </div>
                    </div>
                    <div class="modal-footer">
                      <?php if($nouveau < 0){?>
                        <button type="submit" class="btn btn-danger" name="annuler">Annuler</button>
                      <?php  }else{?>
                        <button type="submit" class="btn btn-primary" name="sauvegarde">Valider</button>
                       <?php  } ?>
                    
                    </div>
                    <hr>

                    <hr>
                    
                    <?php 
                    }
                    ?>
                </form>
              </div>

              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer text-light" style="background:rgb(60,36,139);">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Gestion comptes banques 2021</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ATTENTION !!!</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Êtes vous sûre de vouloir vous deconnecté ???.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Non</button>
          <a class="btn btn-primary" href="admindeconnexion.php">Oui, Biensûr</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
<?php
/*
    }else{
      header('Location:../login.php');
    }
     */
?>