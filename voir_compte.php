<?php
session_start();
include 'fonction/connexion.php';
$bd = bd();
$id = htmlspecialchars(htmlentities($_GET['Id_cpte']));
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
      <img src="image/user.png" class="rounded-circle border" alt="image" style="height: 200px; width:200px; margin:10px auto;"/>
      <!-- Nav Item - Tables -->
      <label style="margin-left: 20px; font-weight:bold;">
          Nom :<?php echo ' MON_NOM'; ?>
      </label>
      <label style="margin-left: 20px; font-weight:bold">
          Prenom :<?php echo ' MON_PRENOM'; ?>
      </label>
      <label style="margin-left: 20px; font-weight:bold">
          Email :<?php echo ' MON_MAIL'; ?>
      </label>
      <label style="margin-left: 20px; font-weight:bold">
          Numero Telephone :<br> <?php echo ' MON_NUMERO'; ?>
      </label>
      <label class="btn btn-success" data-toggle="modal" data-target="#motdepass">
      Editer<span class="fa fa-edit">
      </label>
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

<!-- CONFIRMATION MODIFICATION PASSWORD -->
<div class="modal fade" id="motdepass" tabindex="-1" role="dialog" aria-labelledby="confirmeModal" raia-hidden="true" >#confirmereinitialeparrain
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="exampleModalLabel">Motifier mon profil</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <form method="POST" action="">
          <div class="modal-body">
              <div class="form-group">
                  <label>Nom</label>
                  <input type="hidden" name="id" value="<?php echo 1; ?>" />
                  <input type="text" readonly value="<?php echo 'MON_NOM'; ?>" class="form-control" name="nom" >
                </div>
                <div class="form-group">
                  <label>Prenom</label>
                  <input type="text" readonly value="<?php echo 'MON_PRENOM'; ?>" class="form-control" name="prenom" >
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" value="<?php echo 'MON_MAIL'; ?>" >
                </div>
                <div class="form-group">
                  <label>Numero telephone</label>
                  <input type="text" class="form-control" name="numero" value="<?php echo 'MON_NUMERO'; ?>" >
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="text" class="form-control" name="password" value="<?php echo 'MON_PASSWORD'; ?>" >
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary" name="sauvegarde">Sauvegarder</button>
              </div>
          </form>
        </div>
      </div>        
    </div>
						<!-- CONFIRMATION MODIFICATION PASSWORD -->


<?php
 /* TRAITEMENT */

?>


<!-- -->

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Bienvenue dans l'espace caissière </h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Informations comptes <a href="espace_caissiere_liste_comptes.php" class="btn btn-danger text-white" style="float:right;">Retour </a></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <form method="" action="">
                <div class="modal-body">
                <?php 
                    $requete = $bd->prepare("SELECT * FROM compte LEFT JOIN client ON client.idclient = compte.idclient LEFT JOIN sexe ON sexe.idsexe = client.idsexe WHERE idcompte = ? ");
                    $donne = $requete->execute(array($id));
                
                    while($donnes = $requete->fetch() ){ 
                    ?>
                    <center><legend>Informations compte</legend></center>
                    <div class="form-group row">
                      <div class="form-group col-6">
                        <label>Numéro de compte</label>
                        <input readonly type="text" class="form-control"  value="<?php echo $donnes['numerocpte'].''.$donnes['idcompte']; ?>" >
                      </div>
                      <div class="form-group col-6">
                        <label>Solde</label>
                        <input readonly type="text" class="form-control"  value="<?php echo $donnes['soldecpte'].' FCFA'; ?>" >
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="form-group col-6">
                        <label>Date d'ouverture</label>
                        <input readonly type="datetime" class="form-control"  value="<?php echo $donnes['dateouverture']; ?>" >
                      </div>
                      <div class="form-group col-6">
                        <label>Date de fermeture</label>
                        <input readonly type="datetime" class="form-control"  value="<?php echo $donnes['datefermeture']; ?>" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="form-group col-6">
                        <label>Visa d'ouverture</label>
                        <input readonly type="text" class="form-control"  value="<?php echo $donnes['visaouverture']; ?>" >
                      </div>
                      <div class="form-group col-6">
                        <label>Visa de fermeture</label>
                        <input readonly type="text" class="form-control" value="<?php echo $donnes['visafermeture']; ?>" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="form-group col-10">
                        <label>Observations</label>
                        <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="2" name="obscpte" placeholder="Observations sur le compte ..."><?php echo $donnes['obscpte']; ?></textarea>
                      </div>
                    </div>
                    <hr>
                    <center><legend>Informations client</legend></center>
                    <div class="form-group row">
                      <div class="form-group col-4">    
                        <img src="image/<?php echo $donnes['lienphoto']; ?>" class="rounded-circle" alt="Cinque Terre" style="width:190px;height: 160px;margin:10px auto;">
                      </div>
                      <div class="form-group col-8">
                        <div class="form-group row">
                            <label>Nom</label>
                            <input readonly type="text" class="form-control"  value="<?php echo $donnes['nomclient']; ?>" >
                        </div>
                        <div class="form-group row">
                            <label>Prenom</label>
                            <input readonly type="text" class="form-control"  value="<?php echo $donnes['prenomclient']; ?>" >
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="form-group col-4">
                        <label>Sexe</label>
                        <input readonly type="text" class="form-control" value="<?php echo $donnes['libsexe']; ?>" >
                      </div>
                      <div class="form-group col-4">
                        <label>Date de naissance</label>
                        <input readonly type="date" class="form-control"  value="<?php echo $donnes['datenaissance']; ?>" >
                      </div>
                      <div class="form-group col-4">
                        <label>Email</label>
                        <input readonly type="email" class="form-control"  value="<?php echo $donnes['email']; ?>" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="form-group col-6">
                        <label>Numero telephone</label>
                        <input readonly type="text" class="form-control"  value="<?php echo $donnes['telephone']; ?>" >
                      </div>
                      <div class="form-group col-6">
                        <label>Signature</label>
                        <input readonly type="text" class="form-control" value="<?php echo $donnes['liensignature']; ?>" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="form-group col-6">
                        <label>Cni</label>
                        <input readonly type="text" class="form-control"  value="<?php echo $donnes['cni']; ?>" >
                      </div>
                      <div class="form-group col-6">
                            <label>Profession</label>
                            <input readonly type="text" class="form-control" value="<?php echo $donnes['profession'];?>" name="profession" placeholder="Ingenieur, Mécanicien, ..."  >
                        </div>
                    </div>

                    <hr>
                    
                    <?php 
                    }
                    ?>
                </form>
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