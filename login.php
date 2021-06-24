<?php
session_start();
include 'fonction/connexion.php';
$bd = bd();



?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  

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
    
<main class="form-signin">
  <form  method="POST">
   
    <h1 class="h3 mb-3 fw-normal">Connectez vous</h1>

    <div class="form-floating">
      <input type="name" class="form-control" name="nbcompte" id="floatingInput" placeholder="votre numero de compte">
      <label for="floatingInput">RIB</label>
    </div>
    <div class="form-floating">
      <input type="password" name="pswd" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Mot de passe</label>
    </div>


    <button class="w-100 btn btn-lg btn-primary" name="envoi" type="submit">Se connecter</button>
    
  </form>
</main>


    
  </body>
</html>
<?php
         
                if (isset($_POST['envoi'])) {
                  if($_POST['nbcompte'] !== "" && $_POST['pswd'] !== ""){
                    $requete = "SELECT * FROM compte where 
                    numerocpte = '".$_POST['nbcompte']."' ";
                    if($requete){
                     
                      echo '<script>alert("ca marche")</script>';
                      header('Location:../client.php');
                    }
                    else{
                      echo "ca marche pas ";
                    }
                  }
             
                }
                ?>