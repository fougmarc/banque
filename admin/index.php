<?php
session_start();
include '../fonction/connexion.php';
$bd = bd();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Ivoire Finance Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js" integrity="sha512-VCHVc5miKoln972iJPvkQrUYYq7XpxXzvqNfiul1H4aZDwGBGC0lq373KNleaB2LpnC2a/iNfE5zoRYmB4TRDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.js" integrity="sha512-CAv0l04Voko2LIdaPmkvGjH3jLsH+pmTXKFoyh5TIimAME93KjejeP9j7wSeSRXqXForv73KUZGJMn8/P98Ifg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.esm.js" integrity="sha512-BDFtEx2x2jFpby9cxkGumnmLpRnaFqw8Y1c2y8rCYOCBBBFibmcNeL5MnvKbZOZxuqs1/qMsnmQvPu89d8epTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.esm.min.js" integrity="sha512-viBARNC43u175Exx9Fhcm985ysTEIrKagpWCl62NkxyVm9/Y7BylO+eVH8Kdsf7mKmyuF07Zypv2QQRYMmdNmw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/helpers.esm.js" integrity="sha512-DiXUm6brTaeEIei9FvCPPLvxLcf3ufH8g+aRTpSqhFhf+mSvndawwfaZiKx3Fqj1hbFua7OSXhb4ynoM9REc/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <a href="index-1.html">
                            <h4>
                                <center> IVOIRE FINANCE BANQUE </center>
                            </h4>
                        </a>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="index-1.html" class='sidebar-link'>
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
                                    <a href="#">Modifier un compte</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="#">Supprimer un compte</a>
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
                                    <a href="./liste-clients.php">Liste des Clients</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Profile Statistics</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <?php 
                                            $requete = $bd->query("SELECT COUNT(*) FROM caissiere ");
                                            $donne = $requete->fetch();
                                           
                                            ?>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Nombre de caissieres</h6>
                                                <h6 class="font-extrabold mb-0"> <?php echo $donne[0] ; ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <?php 
                                            $requete1 = $bd->query("SELECT COUNT(*) FROM client ");
                                            $donne1 = $requete1->fetch();
                                            ?>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Nombre de clients</h6>
                                                <h6 class="font-extrabold mb-0"> <?php echo $donne1[0] ; ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <?php 
                                            $requete2 = $bd->query("SELECT COUNT(*) FROM compte ");
                                            $donne2 = $requete2->fetch();
                                            ?>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Nombre de comptes</h6>
                                                <h6 class="font-extrabold mb-0"><?php echo $donne2[0] ; ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                            <?php 
                                            $req = $bd->query("SELECT count(*) FROM operation ");
                                            $trans = $req->fetch();
                                            ?>
                                                <h6 class="text-muted font-semibold">Nombre de transactions</h6>
                                                <h6 class="font-extrabold mb-0"><?php echo $trans[0] ; ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="row">
                          
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="chart-profile-visit"></div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="card">
                            <div class="card-header">
                                <h4>Repartition sexe</h4>
                            </div>
                            <div class="card-body">
                                <div id="graph" >

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Ivoire Finnance Banque</p>
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

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
    <?php 
                                            $requete5 = $bd->query("SELECT COUNT(*) FROM client where idsexe=1 ");
                                            $requete7 = $bd->query("SELECT COUNT(*) FROM client where idsexe=2 ");
                                            $donne5 = $requete5->fetch();
                                            $donne7 = $requete7->fetch();
                                            ?>
                                            
                                <script>
                              
      let optiProfile  = {
	series: [<?php echo $donne5[0] ; ?>, <?php echo $donne7[0] ; ?>],
	labels: ['Homme', 'Femme'],
	colors: ['#435ebe','#55c6e8'],
	chart: {
		type: 'donut',
		width: '100%',
		height:'350px'
	},
	legend: {
		position: 'bottom'
	},
	plotOptions: {
		pie: {
			donut: {
				size: '30%'
			}
		}
	}
}

        var chartPrit = new ApexCharts(document.getElementById("graph"), optiProfile);
        chartPrit.render();
                                </script>


</body>