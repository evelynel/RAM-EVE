<?php
// les champs `input` de type `file` permettent de pousser (uploader) un fichier vers un serveur
$validation = true;
// @note les champs `input` de type `file` ne peuvent pas avoir de valeur par défaut
// les fichiers envoyés seront enregistrés dans le dossier courant
$upload_dir = __DIR__ ;
// messages par défaut
$messages = array(
  'fichier' => '',
  'formulaire' => ''
);
// vérification des fichiers envoyés
if ($_FILES) {
  // validation du champ 'fichier'
  if (isset($_FILES['fichier']) && !empty($_FILES['fichier'])) {
    switch ($_FILES['fichier']['error']) {
      case UPLOAD_ERR_OK:
      // il n'y a pas d'erreur
      // on peut stocker le fichier
      if (!move_uploaded_file($_FILES['fichier']['tmp_name'], 'projetadmin/upload/' . $_FILES['fichier']['name'])) {
        // il y a une erreur
        // php n'est pas parvenu à stocker le fichier
        $validation = false;
        // affectation d'un message d'erreur
        $messages['fichier'] = "Une erreur est survenue, le fichier '{$_FILES['fichier']['name']}' n'a pas pu être enregistré";
      }
      break;
      case UPLOAD_ERR_NO_FILE:
      // il y a une erreur
      // l'utilisateur n'a pas envoyé de fichier
      $validation = false;
      // affectation d'un message d'erreur
      $messages['fichier'] = "Vous n'avez pas sélectionné une photo";
      break;
      default:
      // il y a une erreur
      $validation = false;
      // affectation d'un message d'erreur
      $messages['fichier'] = "Une erreur est survenue, le fichier '{$_FILES['fichier']['name']}' n'a pas pu être enregistré";
    }
  }
  // vérification de la validation
  if ($validation) {
    // il n'y a pas d'erreurs
    // affectation d'un message de confirmation
    $messages['formulaire'] = "Photo envoyée";
  } else {
    // il y a des erreurs
    // affectation d'un message d'erreur
    $messages['formulaire'] = "";
  }
}
?><!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>R.A.M Événements</title>
  <link rel="shortcut icon" href="img/favicon.png">
  <link href="vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="vendor/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" rel="stylesheet" />
  <link href="css/indexcss.css" rel="stylesheet" />
</head>
<body>


  <div class="bannieretop">

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="logo">
            <img alt="Logo RAM" src="img/logo.png" id="logo">
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="container text-center">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="carre">
          <img  id="camera" src="img/camera.png" alt="camera">
          <?php // il faut utiliser l'attribut `enctype="multipart/form-data"` pour que le fichier puisse être envoyé ?>
          <form action="" method="post" enctype="multipart/form-data" >
            <div><?php echo htmlentities($messages['fichier']) ?></div>
            <label for="fichier"></label><br />
            <input name="fichier" type="file" /><br />
            <div><?php echo htmlentities($messages['formulaire']) ?></div>
          </div>
          <input class="dawa"type="submit" value="envoyer" />
        </form>
      </div>
    </div>
  </div>


  <div class="bannierefooter">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-xs-6">
          <div id="tarifs">
            <h2 id="lien"><a href="https://www.ramevenements.com/" target="blank">TARIFS</h2></a>
          </div>
        </div>
        <div class="col-lg-6 col-xs-6">
          <div id="contact">
            <h2 id="lien"><a href="https://www.ramevenements.com/contact" target="blank">CONTACT</h2></a>
          </div>
        </div>
        <p id="license">© 2017 Nicolas Cyter, Leunens Evelyne, Paterek Stéphane. All rights reserved.</p>
      </div>
    </div>

  </div>


  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendor/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>
