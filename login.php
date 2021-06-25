<?php
session_start();
include 'fonction/connexion.php';
$bd = bd();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  
    <!-- Favicons -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
<link href="./dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
   <!-- ======= Header ======= -->
   <header id="header" class="fixed-top d-flex align-items-center header-transparent" style="background:rgb(60,36,139);">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.html"><span>IVOIRE</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php#hero">Accueil</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">À propos</a></li>
          
          <li><a class="nav-link scrollto" href="./login.php">Connexion</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

    
<main class="form-signin bg-light"  style="width:60%; padding: 30px; border: 1px black solid;" >

    <?php

    if(isset($_POST['envoi'])){
      if ($_POST['types'] == "3") {
        if($_POST['nbcompte'] != "" AND $_POST['pswd'] != ""){
          $mail = htmlspecialchars($_POST['nbcompte']);
          $password = htmlspecialchars($_POST['pswd']);
          $requete = $bd->prepare("SELECT * FROM caissiere WHERE emailcaisse = ? AND passwordcaisse = ? ");
          $requete->execute(array($mail, $password));

          if($requete->fetch()){
            $_SESSION['mail'] = $mail;
            $_SESSION['idcaisse'] = $requete->fetch()['idcaisse'];
            header('Location:admin/index.html');
          }else{
            $flashalerte = '<div class="alert alert-danger"> Connexion échouée !!! verifiez le password ou le email.</div>';
          }
        }
    }else if($_POST['types'] == "2"){
        if($_POST['nbcompte'] != "" AND $_POST['pswd'] != ""){
          $mail = htmlspecialchars($_POST['nbcompte']);
          $password = htmlspecialchars($_POST['pswd']);
          $requete = $bd->prepare("SELECT * FROM caissiere WHERE emailcaisse = ? AND passwordcaisse = ? ");
          $requete->execute(array($mail, $password));
          if($requete->fetch()){
            $_SESSION['mail'] = $mail;
            $_SESSION['idcaisse'] = $requete->fetch()['idcaisse'];
            header('Location:espace_caissiere_home.php');
            var_dump($requete->fetch());
          }else{
            $flashalerte = '<div class="alert alert-danger"> Connexion échouée !!! verifiez le password ou le email.</div>';
          }
        }
    }else if($_POST['types'] == "1"){

        if($_POST['nbcompte'] != "" AND $_POST['pswd'] != ""){
          $mail = htmlspecialchars($_POST['nbcompte']);
          $password = htmlspecialchars($_POST['pswd']);
          $requete = $bd->prepare("SELECT * FROM client WHERE email = ? AND telephone = ? ");
          $requete->execute(array($mail, $password));
          if($requete->fetch()){
            $_SESSION['mail'] = $mail;
            $_SESSION['idclient'] = $requete->fetch()['idclient'];
            header('Location:espace_client_comptes.php');
          }else{
            $flashalerte = '<div class="alert alert-danger"> Connexion échouée !!! verifiez le password ou le email.</div>';
          }
        }
    }else{
      echo '';
    }
  }

    ?>


      <form  method="POST">
        <h1 class="h3 mb-3 fw-normal">Connectez vous</h1>
        <?php
            if (isset($flashalerte)) {
                echo $flashalerte;
                unset($flashalerte); // faire disparaitre le message d'alerte
            }
        ?>
        <div class="form-floating">
          <select class="form-control" id="floatingInput" name="types">
            <option value="1">Client</option>
            <option value="2">Caissière</option>
            <option value="3">Administrateur</option>
          </select>
          <label for="floatingInput">Select type user </label>
        </div><br>

        <div class="form-floating">
          <input type="name" class="form-control" name="nbcompte" id="floatingInput" placeholder="Email">
          <label for="floatingInput">Email</label>
        </div><br>
        <div class="form-floating">
          <input type="password" name="pswd" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Mot de passe</label>
        </div>


        <button class="w-100 btn btn-lg btn-primary" name="envoi" type="submit">Se connecter</button>
        
      </form>


</main>


    
  </body>
</html>