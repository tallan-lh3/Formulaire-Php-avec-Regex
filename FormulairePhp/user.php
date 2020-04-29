<?php
session_start();

?>


<!doctype html>

<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">



  <title>TP</title>
</head>

<body>
  
  
 <div class="col-4 mx-auto text-center">


 <div class="card mt-5">
  <div class="card-header">
  <p class="monsieurprenom"><?= $_SESSION['genre'] ?> 
 <?= $_SESSION['nom'] ?> 
 <?= $_SESSION['prenom'] ?>
</p>
  </div>
  <div class="card-body">
  <p class="infosuser"><img class="mr-2" width="25px" height="25px" src="image-naissance.png" /><?= $_SESSION['naissance'] ?></p>
  <p class="infosuser"><img class="mr-2" width="25px" height="25px" src="image-maison.png" /><?= $_SESSION['adresse'] ?></p>
 <p class="infosuser"><img class="mr-2" width="25px" height="25px" src="image-mail.png" /><?= $_SESSION['mail'] ?></p>
 <p class="infosuser"><img class="mr-2" width="25px" height="25px" src="image-tel.png" /><?= $_SESSION['tel'] ?></p>
 <a href="index.php">
  <button class="btn bg-warning float-left">Retour/Modifier</button>
  </a>
  <a href="deco.php">
          <!-- DECONNEXION  -->
          <button class="btn bg-danger float-right" onclick="alertBye()" id="deco">
          Deconnexion
    </button></a>
  <script>
    function alertBye() {
      alert("Appuyez sur OK pour valider votre Déconnexion");
    }
  </script>
  </div>
</div>



 
 
 </div>
  




 




  <!-- jQuery first,mon js, then Popper.js, then Bootstrap JS -->

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="script.js"> </script>
</body>

</html>