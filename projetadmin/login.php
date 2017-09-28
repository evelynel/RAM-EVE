<?php

$db_url = 'localhost';
$db_usr = 'root';
$db_pw = '';
$db_table = 'logadmin';

$connect = new mysqli(
  $db_url,
  $db_usr,
  $db_pw,
  $db_table
);
$connect -> set_charset('utf8');
?>

<form class="form-horizontal" method="post">
<fieldset>

<!-- Form Name -->
<legend>Administration</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Identifiant</label>
  <div class="col-md-4">
  <input id="textinput" name="textinput" placeholder="" class="form-control input-md" type="text">

  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput">Mot de passe</label>
  <div class="col-md-4">
    <input id="passwordinput" name="passwordinput" placeholder="" class="form-control input-md" type="password">

  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-success">Valider</button>
  </div>
</div>

</fieldset>
</form>
<link href="vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="vendor/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" rel="stylesheet" />
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="vendor/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
