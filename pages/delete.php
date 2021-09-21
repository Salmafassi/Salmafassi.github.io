<?php 
require_once('logout.php');
require_once('connexion1.php');
$idp=htmlentities($_GET['idp']);
$requete="select * from profile where profile_id='$idp'";
$select=$connex->query($requete);
$tab=$select->fetch();
?>
<!DOCTYPE html>
<html>
<head>
<title>Fassi Salma</title>
<!-- bootstrap.php - this is HTML -->

<!-- Latest compiled and minified CSS -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" 
    href="../css/bootstrap.min.css" 
    >

<!-- Optional theme -->
<link rel="stylesheet" 
    href="../css/bootstrap-theme.min.css" 
    >
    <script src="../js/jquery-3.3.1.js"></script> 

</head>
<body>
<div class="container">
<h1>Deleting Profile</h1>
<form method="post" action="deleteaction.php?idp=<?= $idp; ?>">
<p>First Name:&nbsp;<?= $tab['first_name']; ?></p><input type="text" hidden name="first_name">
<p>Last Name:&nbsp;<?= $tab['last_name']; ?></p><input type="text" hidden name="last_name">
<input type="submit"  value="delete" name="delete">
<input type="submit" name="cancel" value="Cancel">

</form>
</div>
</body>
</html>