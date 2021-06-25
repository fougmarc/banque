<?php
session_start();
include '../fonction/connexion.php';
$bd = bd();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
          
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <a href="index.php" style="text-align: center">
                            <h4>IVOIRE FINANCE BANQUE </h4>
                        </a>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="index.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Caissiere</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="creation-caisisere.php">Creer un compte</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="liste-caissiere.php">Liste des cassieres</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Client</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="liste-clients.php">Liste des clients</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item active ">
                            <a href="#" class='sidebar-link bg-danger'  data-toggle="modal" data-target="#logoutModal">
                                <i class="bi bi-grid-fill"></i>
                                <span>Se deconnecter</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
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
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-8 order-md-1 order-last">
                            <h3>Liste des Clients</h3>
                        </div>

                        <div class="col-12 col-md-4 order-md-3 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.php">
                                            <p>Dashboard</p>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <h7>ADMINSTRATEUR</h7>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h6>Rechecher client</h6>
                        <div class="input-group">
                            <input type="search" class="form-control rounded" placeholder="Identifiant client" aria-label="Search" aria-describedby="search-addon" />
                            <button type="button" class="btn btn-outline-primary">search</button>
                        </div>
                    </div>
                    <br/>
                    <div class="card">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Liste des clients </h6>
            </div>
            <?php 
              $requete = $bd->prepare("SELECT * FROM client LEFT JOIN sexe ON sexe.idsexe = client.idsexe WHERE client.archive = 0 ");
              $donne = $requete->execute();
            ?>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="font-size:12px;">Cni client</th>
                      <th style="font-size:12px;">Nom et prenom</th>
                      <th style="font-size:12px;">Date naissance</th>
                      <th style="font-size:12px;">Sexe</th>
                      <th style="font-size:12px;">Profession</th>
                      <th style="font-size:12px;">Numero</th>
                      <th style="font-size:12px;">Email</th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  
                    <?php 
                    while($donnes = $requete->fetch() ){ ?>
                    <tr>
                      <td style="font-size:13px;"><?php echo $donnes['cni'];?></td>
                      <td style="font-size:13px;"><?php echo $donnes['nomclient'].' '.$donnes['prenomclient'];?></td>
                      <td style="font-size:13px;"><?php echo $donnes['datenaissance'];?></td>
                      <td style="font-size:13px;"><?php echo $donnes['libsexe'];?></td>
                      <td style="font-size:13px;"><?php echo $donnes['profession'];?></td>
                      <td style="font-size:13px;"><?php echo $donnes['telephone'];?></td>
                      <td style="font-size:13px;"><?php echo $donnes['email'];?></td>
                      <td><a class="btn btn-primary" style="font-size:13px;" title="Voir plus" href="voir_plus.php?Id_clt=<?php echo $donnes['idclient'];?>">Détails </a></td>
                      <td><a class="btn btn-success" title="Editer" style="font-size:13px;" href="editer_client.php?Id_clt=<?php echo $donnes['idclient'];?>">Editer </a></td>
                      <td><a class="btn btn-danger" title="Supprimer" style="font-size:13px;" href="supprimer_cpte.php?Id_clt=<?php echo $donnes['idclient'];?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce client ??? Toutes informations le concernant seront supprimées également !!!'));">Supprimer </a></td>
                    </tr>
                    <?php 
                      }
                    ?>
                  </tbody>
                </table>
              </div>

                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/main.js"></script>
</body>
      <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>
  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>