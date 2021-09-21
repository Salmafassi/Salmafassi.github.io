<?php
require_once('logout.php');
require_once('connexion1.php');
$idp=htmlentities($_GET['idp']);
$requete="select * from profile where profile_id='$idp'";
$select=$connex->query($requete);
$tab=$select->fetch();
$requete1="select * from position where profile_id='$idp' order by rank";
$select1=$connex->query($requete1);
$requete2="select * from education where profile_id='$idp' order by rank ";
$select2=$connex->query($requete2);
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
<h1>Profile information</h1>
<p>First Name:&nbsp;<?= $tab['first_name']; ?></p>
<p>Last Name:&nbsp;
<?= $tab['last_name']; ?></p>
<p>Email:&nbsp;
<?= $tab['email']; ?></p>
<p>Headline:<br/>
<?= $tab['email']; ?></p>
<p>Summary:<br/>
<?= $tab['summary']; ?><p>
</p>
<p>Education:</p>
<ul>
<?php 
while($ligne=$select2->fetch()){
    $id_institution=$ligne['institution_id'];
    $requete="select * from institution where institution_id='$id_institution'";
    $stm=$connex->query($requete);
    $name=$stm->fetch()['name'];
?>
<li><?= $ligne['year']; ?>:&nbsp;<?= $name; ?></li>
<?php } ?>
</ul>
<p>Position</p>
<ul>
<?php 
while($ligne=$select1->fetch()){

?>
<li><?= $ligne['year']; ?>:&nbsp;<?= $ligne['description']; ?></li>
<?php } ?>
</ul>
<a href="index.php?idp=<?= $idp; ?>">Done</a>
</div>
</body>
</html>