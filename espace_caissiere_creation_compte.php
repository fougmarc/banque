<?php
session_start();
include 'fonction/connexion.php';
$db = bd();
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
              <h6 class="m-0 font-weight-bold text-primary">Création d'un nouveau compte <a href="espace_caissiere_home.php" class="btn btn-danger text-white" style="float:right;">Annuler </a></h6>
            </div>

            <div class="card-body">
              <div class="table-responsive">
              <?php
                if (isset($_POST['sauvegarde'])) {
                  //verification si les données parrains saisies
                  if (!empty($_POST['nomclient']) AND !empty($_POST['prenomclient']) AND !empty($_POST['datenaissance']) AND !empty($_POST['email']) AND !empty($_POST['numero'])) {
                    
                    $nomclient = htmlspecialchars($_POST['nomclient']);
                    $prenomclient = htmlspecialchars($_POST['prenomclient']);
                    $datenaissance = htmlspecialchars($_POST['datenaissance']);
                    $profession = htmlspecialchars($_POST['profession']);
                    $email = htmlspecialchars($_POST['email']);
                    $numero = $_POST['numero'];
                    $lienphoto = photo_client($_FILES['lienphoto']);
                    $liensignature = $_POST['liensignature'];
                    $obscpte = htmlspecialchars($_POST['obscpte']);
                    $cni = htmlspecialchars($_POST['cni']);
                    $date = htmlspecialchars($_POST['dateouverture']);
                            
                        $insertion = $db->prepare(" INSERT INTO client(nomclient, prenomclient,liensignature, datenaissance,profession, email, cni,	telephone, lienphoto) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
                        $insertion->execute(array($nomclient, $prenomclient, $liensignature, $datenaissance, $profession, $email, $cni, $numero, $lienphoto));
                        /*-----------------compte------------------*/
                        if($insertion){
                          $last_client_id = $db->lastInsertId();
                          $numerocpte = htmlspecialchars($_POST['numerocpte']);
                          $insertions = $db->prepare(" INSERT INTO compte(idcompte, numerocpte, dateouverture, obscpte, idclient) VALUES('', ?, ?, ?, ?)");
                          $insertions->execute(array($numerocpte, $date, $obscpte, $last_client_id));
                          
                          if($insertions){
                            $flashalerte = '<div class="alert alert-success"> Création du client '.$nomclient.' '.$prenomclient.' terminée.</div>';
                          }
                          
                        }

                    }else{

                      $flashalerte = '<div class="alert alert-danger"> Erreur de remplissage des champs !!! Tous les champs sont obligatoires </div>';
                    }
                }
                ?>
              <form method="POST" action="" enctype="multipart/form-data">
                <div class="modal-body">
                <?php

    		           if (isset($flashalerte)) {

    			         echo $flashalerte;
    			         unset($flashalerte); // faire disparaitre le message d'alerte
    			
    		                   }
    		        ?>
                <center><legend>Informations client</legend></center>
                    <!--------------------------------------------------->
                    <div class="form-group row">
                      <div class="form-group col-4">
                        <label>Nom<span class="text-bold text-danger">*</span></label>
                        <input type="text" class="form-control" name="nomclient" required>
                      </div>
                      <div class="form-group col-8">
                        <label>Prenom<span class="text-bold text-danger">*</span></label>
                        <input type="text" class="form-control" name="prenomclient" >
                      </div>
                    </div>
                    <!--------------------------------------------------->
                    <div class="form-group row">
                      <div class="form-group col-6">
                        <label>Date de naissance<span class="text-bold text-danger">*</span></label>
                        <input type="date" class="form-control" name="datenaissance" required>
                      </div>
                      <div class="form-group col-6">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" >
                      </div>
                    </div>
                    <!--------------------------------------------------->
                    <div class="form-group row">
                      <div class="form-group col-6">
                        <label>Cni<span class="text-bold text-danger">*</span></label>
                        <input type="text" class="form-control" name="cni" required>
                      </div>
                      <div class="form-group col-6">
                        <label>Numero telephone<span class="text-bold text-danger">*</span></label>
                        <input type="text" class="form-control" name="numero" required >
                      </div>
                    </div>
                    <!--------------------------------------------------->
                    <div class="form-group row">
                      <div class="form-group col-6">
                        <label>Photo</label>
                        <input type="file" class="form-control" name="lienphoto"  >
                      </div>
                      <div class="form-group col-6">
                        <label>Signature</label>
                        <input type="text" class="form-control" name="liensignature"  >
                      </div>
                    </div>
                    <!--------------------------------------------------->
                    <div class="form-group col-6">
                      <label>Profession</label>
                      <input type="text" class="form-control" name="profession" placeholder="Ingenieur, Mécanicien, ..."  >
                    </div>
                      <center><legend>Informations sur le compte</legend></center>
                    <!--------------------------------------------------->
                    <div class="form-group row">
                      <div class="form-group col-6">
                        <label>Numéro compte</label>
                        <input readonly type="text" class="form-control" name="numerocpte" value="<?php echo numero_compte(); ?>" >
                      </div>
                      <div class="form-group col-6">
                        <label>Date ouverture</label>
                        <input readonly type="datetime" class="form-control" name="dateouverture" value="<?php echo date("d-m-Y H:i:s");?>" >
                      </div>
                    </div>
                    <!--------------------------------------------------->
                    <div class="form-group col-6">
                      <label for="exampleFormControlTextarea1">Observations</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="obscpte" placeholder="Observations sur le compte ..."></textarea>
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