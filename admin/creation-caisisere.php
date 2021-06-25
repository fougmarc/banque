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
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
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
                                    <a href="liste-clients.php">Liste des Clients</a>
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
                        <div class="col-12 col-md-8 order-md-1 order-last" style="text-align: center">
                            <h4>FORMULAIRE D'INSCRIPTION - CAISSIERE </h4>
                            <p class="text-subtitle text-muted">Veuillez saissir les Informations concernant la Caissiere</p>
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
                <?php
                     if(isset($_POST['enregistrer'])){
                            if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['pswd'])) {
                            $nom = htmlspecialchars($_POST['nom']);
                            $prenom = htmlspecialchars($_POST['prenom']);                  
                            $email = htmlspecialchars($_POST['mail']);
                            $mdp = $_POST['pswd'];
                            $req = $bd->prepare(" INSERT INTO  caissiere(nomcaisse,prenomcaisse,emailcaisse,passwordcaisse,numerocaisse) VALUES(:nomcaisse,:prenomcaisse,:emailcaisse,:passwordcaisse,'') ");
                            $req->execute(array(
                                'nomcaisse'=>$nom,
                                'prenomcaisse'=>$prenom,
                                'emailcaisse'=>$email,
                                'passwordcaisse'=>$mdp));
                            /*-----------------compte------------------*/
                            if($req){
                                $flashalerte = '<div class="alert alert-success"> Création de la caissière '.$nom.' '.$prenom.' terminée.</div>';
                            }else{
                                $flashalerte = '<div class="alert alert-danger"> Erreur de remplissage des champs !!! Tous les champs sont obligatoires </div>';
                            }
                        }else{
                            $flashalerte = '<div class="alert alert-danger"> Erreur de remplissage des champs !!! Tous les champs sont obligatoires </div>';
                        }
                    }
                ?>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Informations personnels</h4>
                        </div>
                        <form action="" method="post">
                        <div class="card-body">
                        <?php
                            if (isset($flashalerte)) {
                                echo $flashalerte;
                                unset($flashalerte); // faire disparaitre le message d'alerte
                            }
                        ?>
                            <div class="row">
                                <div class="col-md-6">
                                
                                    <div class="form-group">
                                        <h6>Nom</h6>
                                        <input type="text" class="form-control" name="nom" id="helpInputTop" placeholder="nom">
                                    </div> 
                                    <div class="form-group">
                                        <h6>Prenom</h6>
                                        <input type="text" name="prenom" class="form-control" id="basicInput" placeholder="Veuillez saissir le prenom">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h6>mail</h6>
                                        <input type="text" class="form-control" id="basicInput" name="mail" placeholder="Exemple:someone@example.co">
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <h6>mot de passe</h6>
                                        <input type="password" class="form-control" name="pswd">
                                    </div>
                                    <br/>
                                   
                                    <br/>
                                    <div class="col-md-6" style="text-align: center">
                                        <button type="submit" name="enregistrer" class="btn btn-outline-success block "  data-bs-toggle="modal " data-bs-target="#default ">
                                                Enregistrer
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
            
            <footer>
                <div class="footer clearfix mb-0 text-muted ">
                    <div class="float-start ">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end ">
                        <p>Crafted with <span class="text-danger "><i class="bi bi-heart "></i></span> by <a href="http://ahmadsaugi.com ">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js "></script>
    <script src="assets/js/bootstrap.bundle.min.js "></script>

    <script src="assets/js/main.js "></script>
</body>
  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</html>