<?php
 session_start();
 require_once('connexion1.php');
 
 $user_id=isset($_SESSION['user_id'])?$_SESSION['user_id']:"";
 $requete="select * from profile where user_id='$user_id'";
 $select=$connex->query($requete);
$idp=isset($_GET['idp'])?$_GET['idp']:"";
$idd=isset($_GET['idd'])?$_GET['idd']:"";
$ida=isset($_GET['ida'])?$_GET['ida']:"";
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
  

  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css"> 
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
<h1>Chuck Severance's Resume Registry</h1>
<?php $a=$_SERVER["HTTP_REFERER"];

?>

<?php
if($a=="http://localhost:7882/assignment/" || $a=="http://localhost:7882/assignment/pages/index.php?name="|| $a=="http://localhost:7882/assignment/pages/index.php"  || ($a=="http://localhost:7882/assignment/pages/login.php" && !isset($_GET['name'])) || $a=="http://localhost:7882/assignment/pages/index.php?ida=$ida" || $a=="http://localhost:7882/assignment/pages/index.php?idp=$idp" || $a=="http://localhost:7882/assignment/pages/index.php?idd=$idd"){ ?>
<p><a href="login.php">Please log in</a></p>
<?php } ?>
<?php 

if(($a=="http://localhost:7882/assignment/pages/login.php" && isset($_GET['name'])) || isset($_GET['cancel']) ){
?>
<p><a href="index.php">Logout</a></p>
<?php 
if($select->rowCount()>0){

?>
<table class="table-bordered"> 
<tr>
    <td>Name</td>
    <td>Headline</td>
    <td>Action</td>
</tr>
<?php while($ligne=$select->fetch()){?>
    <tr>
    <?php $id=$ligne['profile_id']; ?>
        <td><a href="view.php?idp=<?= $id; ?>"><?= $ligne['first_name']; ?>&nbsp;<?= $ligne['last_name']; ?></a></td>
        <td><?= $ligne['headline']; ?></td>
        <td><a href="edit.php?idp=<?= $id; ?>">editer</a>&nbsp;<a href="delete.php?idp=<?= $id; ?>">supprimer</a></td>
    </tr>
    <?php } ?>
</table>
<?php } ?>
<p><a href="add.php">Add New Entry</a></p>
<?php } ?>
<?php
if($a=="http://localhost:7882/assignment/pages/add.php" && !isset($_GET['cancel'])){
?>

    <p style="color:green">Profile added</p>
  
<p><a href="index.php">Logout</a></p>
<table class="table-bordered"> 
<tr>
    <td>Name</td>
    <td>Headline</td>
    <td>Action</td>
</tr>
<?php while($ligne=$select->fetch()){?>
    <tr>
        <?php $id=$ligne['profile_id']; ?>
        <td><a href="view.php?idp=<?= $id; ?>"><?= $ligne['first_name']; ?>&nbsp;<?= $ligne['last_name']; ?></a></td>
        <td><?= $ligne['headline']; ?></td>
        <td><a href="edit.php?idp=<?= $id; ?>">editer</a>&nbsp;<a href="delete.php?idp=<?= $id; ?>">supprimer</a></td>
    </tr>
    <?php } ?>
</table>

<p><a href="add.php">Add New Entry</a></p>
<?php } 
if($a=="http://localhost:7882/assignment/pages/view.php?idp=$idp" ){
?>
<p><a href="index.php?idp=<?= $idp; ?>">Logout</a></p>
<table class="table-bordered"> 
<tr>
    <td>Name</td>
    <td>Headline</td>
    <td>Action</td>
</tr>
<?php while($ligne=$select->fetch()){?>
    <tr>
        <?php $id=$ligne['profile_id']; ?>
        <td><a href="view.php?idp=<?= $id; ?>"><?= $ligne['first_name']; ?>&nbsp;<?= $ligne['last_name']; ?></a></td>
        <td><?= $ligne['headline']; ?></td>
        <td><a href="edit.php?idp=<?= $id; ?>">editer</a>&nbsp;<a href="delete.php?idp=<?= $id; ?>">supprimer</a></td>
    </tr>
    <?php } ?>
</table>

<p><a href="add.php">Add New Entry</a></p>
<?php } 
if($a=="http://localhost:7882/assignment/pages/edit.php?idp=$idd" ){
?>
<p style="color:green">Profile updated</p>
<p><a href="index.php?idd=<?= $idd; ?>">Logout</a></p>
<table class="table-bordered"> 
<tr>
    <td>Name</td>
    <td>Headline</td>
    <td>Action</td>
</tr>
<?php while($ligne=$select->fetch()){?>
    <tr>
        <?php $id=$ligne['profile_id']; ?>
        <td><a href="view.php?idp=<?= $id; ?>"><?= $ligne['first_name']; ?>&nbsp;<?= $ligne['last_name']; ?></a></td>
        <td><?= $ligne['headline']; ?></td>
        <td><a href="edit.php?idp=<?= $id; ?>">editer</a>&nbsp;<a href="delete.php?idp=<?= $id; ?>">supprimer</a></td>
    </tr>
    <?php } ?>
</table>

<p><a href="add.php">Add New Entry</a></p>
<?php } 
if($a=="http://localhost:7882/assignment/pages/delete.php?idp=$ida" ){
    ?>
    <p style="color:green">Profile Deleted</p>
    <p><a href="index.php?ida=<?= $ida; ?>">Logout</a></p>
    <table class="table-bordered"> 
    <tr>
        <td>Name</td>
        <td>Headline</td>
        <td>Action</td>
    </tr>
    <?php while($ligne=$select->fetch()){?>
        <tr>
            <?php $id=$ligne['profile_id']; ?>
            <td><a href="view.php?idp=<?= $id; ?>"><?= $ligne['first_name']; ?>&nbsp;<?= $ligne['last_name']; ?></a></td>
            <td><?= $ligne['headline']; ?></td>
            <td><a href="edit.php?idp=<?= $id; ?>">editer</a>&nbsp;<a href="delete.php?idp=<?= $id; ?>">supprimer</a></td>
        </tr>
        <?php } ?>
    </table>
    
    <p><a href="add.php">Add New Entry</a></p>
    <?php } ?>
</div>
</body>