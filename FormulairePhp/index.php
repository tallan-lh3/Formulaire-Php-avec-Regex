<?php
session_start();
$alert = '<p id="missinginfos" class="text-center"> <img class="mr-2" width="50px" height="50px" src="image-danger.png" /> Renseigner les champs en rouge <img class="mr-2" width="50px" height="50px" src="image-danger.png" /></p>';
$arrayError = [];
$regexName = '/^[ -A-Za-z]+$/';


// GENRE
if (isset($_POST['submit'])) {
  if (($_POST['genre']) == '') {

    $arrayError['genre'] = '<span class="error">Renseigner votre genre</span>';
  };
};


// PRENOM 
if (isset($_POST['prenom'])) {
  if (!preg_match($regexName, $_POST['prenom'])) {
    $arrayError['prenom'] = '<span class="error">Respecter le format</span>';
  };
  if (empty($_POST['prenom'])) {
    $arrayError['prenom'] = '<span class="error">Renseigner votre prénom</span>';
  };
};

// NOM
if (isset($_POST['nom'])) {
  if (!preg_match($regexName, $_POST['prenom'])) {
    $arrayError['nom'] = '<span class="error">Respecter le format</span>';
  };
  if (empty($_POST['nom'])) {
    $arrayError['nom'] = '<span class="error">Renseigner votre nom</span>';
  };
};

// DATE DE NAISSANCE 
if (isset($_POST['naissance'])) {
  if (empty($_POST['naissance'])) {
    $arrayError['naissance'] = '<span class="error">Renseigner votre date de naissance</span>';
  };
};


// ADRESSE 
if (isset($_POST['adresse'])) {
  if (empty($_POST['adresse'])) {
    $arrayError['adresse'] = '<span class="error">Renseigner votre adresse</span>';
  };
};



// EMAIL
if (isset($_POST['mail'])) {
  if (!preg_match(" /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ", $_POST['mail'])) {
    $arrayError['mail'] = '<span class="error">Respecter le format</span>';
  };
  if (empty($_POST['mail'])) {
    $arrayError['mail'] = '<span class="error">Renseigner votre email</span>';
  };
};

// TELEPHONE

if (isset($_POST['tel'])) {
  if (!preg_match(" /(\+\d+(\s|-))?0\d(\s|-)?(\d{2}(\s|-)?){4}/ ", $_POST['tel'])) {
    $arrayError['tel'] = '<span class="error">Veuiller respecter le format</span>';
  };
  if (empty($_POST['mail'])) {
    $arrayError['tel'] = ' <span class="error">Renseigner votre téléphone</span>';
  };
};



// MOT DE PASSE 
if (isset($_POST['password'])) {
  if (!preg_match(" /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*.$@%_])([-+!*.$@%_\w]{8,15})$/", $_POST['password'])) {
    $arrayError['password'] = '<span class="error">Respecter le format</span>';
  };
  if (empty($_POST['password'])) {
    $arrayError['password'] = '<span class="error">Renseigner votre mot de passe</span>';
  };
};
// CONFIRM MDP
if (isset($_POST['passwordconfirm'])) {
  if (!preg_match(" /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*.$@%_])([-+!*.$@%_\w]{8,15})$/", $_POST['password'])) {
    $arrayError['passwordconfirm'] = '<span class="error">Respecter le format</span>';
  };
  if (empty($_POST['passwordconfirm'])) {
    $arrayError['passwordconfirm'] = '<span class="error">Confirmer votre mot de passe</span>';
  };
  if (($_POST['passwordconfirm']) !== ($_POST['password'])) {
    $arrayError['passwordconfirm'] = '<span class="error"> le mot de passe ne correspond pas</span>';
  };
};

// CONDITION ACCEPTE 
if (isset($_POST['submit'])) {
  if (!isset($_POST['condition'])) {

    $arrayError['condition'] = 'Veuiller accepter les conditions général';
  };
};

if (isset($_POST['submit']) && (empty($arrayError['prenom']))) {
  $prenom = $_POST['prenom'];
} else {
  $prenom = '';
}

if (isset($_POST['submit']) && (empty($arrayError['nom']))) {
  $nom = $_POST['nom'];
} else {
  $nom = '';
}

if (isset($_POST['submit']) && (empty($arrayError['naissance']))) {
  $naissance = $_POST['naissance'];
} else {
  $naissance = '';
}

if (isset($_POST['submit']) && (empty($arrayError['adresse']))) {
  $adresse = $_POST['adresse'];
} else {
  $adresse = '';
}

if (isset($_POST['submit']) && (empty($arrayError['mail']))) {
  $mail = $_POST['mail'];
} else {
  $mail = '';
}

if (isset($_POST['submit']) && (empty($arrayError['tel']))) {
  $tel = $_POST['tel'];
} else {
  $tel = '';
};
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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">



  <title>TP</title>
</head>

<body>


  <form action="index.php" method="post">

    <?php if (isset($_POST['submit'])) {
      if (empty($arrayError)) {
        $_SESSION['genre'] = htmlspecialchars($_POST['genre']);
        $_SESSION['prenom'] = htmlspecialchars($_POST['prenom']);
        $_SESSION['nom'] = htmlspecialchars($_POST['nom']);
        $_SESSION['naissance'] = htmlspecialchars($_POST['naissance']);
        $_SESSION['adresse'] = htmlspecialchars($_POST['adresse']);
        $_SESSION['mail'] = htmlspecialchars($_POST['mail']);
        $_SESSION['tel'] = htmlspecialchars($_POST['tel']);
        header('location: user.php');
      } else { ?>
<!-- la on envoie la var si il manque des champs  -->
        <?= $alert ?>

      <?php  }; ?>
    <?php  }; ?>

    <p class="text-center mt-2 inscription">INSCRIPTION</p>
    <div class="container">
      <div class="row">
        <!-- 1ere col  -->
        <div class="col-4 mt-2 text-center ">
          <!-- dans le label si ilya une erreur il l'affiche si nn il afficher ici 'genre etc' -->
          <label for="genre" class="m-2"><span class=""><?= isset($arrayError['genre']) ? $arrayError['genre'] : 'Genre :' ?></span></label>
          <select name="genre" id="genre" class="custom-select">
            <option value="" selected>Choisir</option>
            <option value="M.">M.</option>
            <option value="Mme.">Mme.</option>
            
          </select>

          <label for="prenom" class="m-2"><span class=""><?= isset($arrayError['prenom']) ? $arrayError['prenom'] : 'Prénom :' ?></span></label>
          <input name="prenom" value="<?= $prenom ?>" type="text" class="form-control" placeholder="Prénom" id="prenom">

          <label for="nom" class="m-2"><span class=""><?= isset($arrayError['nom']) ? $arrayError['nom'] : 'Nom :' ?></span></label>
          <input name="nom" value="<?= $nom ?>" type="text" class="form-control" placeholder="Nom" id="nom">

        </div>
        <!-- 2eme col  -->
        <div class="col-4 mt-2 text-center ">

          <label for="mail" class="m-2"><span class=""><?= isset($arrayError['mail']) ? $arrayError['mail'] : 'Email :' ?></span></label>
          <input name="mail" value="<?= $mail ?>" type="mail" class="form-control" placeholder="mail@mail.com" id="mail">

          <label for="pwd" class="m-2"><span class=""><?= isset($arrayError['password']) ? $arrayError['password'] : 'Mot de passe :' ?></span></label>
          <input name="password" value="" type="password" name="pwd" class="form-control" id="pwd" placeholder="**********">

          <label for="passwordconfirm" class="m-2"><span class=""><?= isset($arrayError['passwordconfirm']) ? $arrayError['passwordconfirm'] : 'Confirmation mot de passe :' ?></span></label>
          <input name="passwordconfirm" value="" type="password" name="passwordconfirm" class="form-control" id="passwordconfirm" placeholder="**********">

          <div class="custom-control custom-switch mt-5">
            <span class="error"><?= isset($arrayError['condition']) ? $arrayError['condition'] : '' ?></span>
            <input name="condition" type="checkbox" class="custom-control-input" id="accept">
            <label class="custom-control-label m-2" for="accept"> <b> <u> J'ai lu et je suis d'accord avec les conditions générale.</u></b></label>
          </div>

          <div class="custom-control custom-switch ">
            <input name="newsletter" type="checkbox" class="custom-control-input" id="news">
            <label class="custom-control-label m-2" for="news"> <b> <u>Je souhaite recevoir une newsletter.</u> </b> </label>
          </div>

        <!-- BOUTON SUBMIT  -->

          <input class="btn btn-outline-default btn-rounded-pill waves-effect mt-2 p-3" name="submit" type="submit" id="submit" value="Confirmer">

        </div>
        <!-- 3eme col  -->
        <div class="col-4 mt-3 text-center ">

          <label for="naissance"><span class=""><?= isset($arrayError['naissance']) ? $arrayError['naissance'] : 'Date de Naissance :' ?>
            </span></label>
          <input name="naissance" value="<?= $naissance ?>" type="date" id="naissance" class="form-control">

          <label for="adresse" class="m-2"><span class=""><?= isset($arrayError['adresse']) ? $arrayError['adresse'] : 'Adresse :' ?></span></label>
          <input name="adresse" value="<?= $adresse ?>" type="text" class="form-control" placeholder="Adresse" id="adresse">


          <label for="tel" class="m-2"><span class=""><?= isset($arrayError['tel']) ? $arrayError['tel'] : 'Téléphone' ?></span></label>
          <input name="tel" value="<?= $tel ?>" type="tel" class="form-control" placeholder="0656575859" id="tel">
        </div>

      </div>

    </div>
  </form>











  <!-- jQuery first,mon js, then Popper.js, then Bootstrap JS -->

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="script.js"> </script>
</body>

</html>