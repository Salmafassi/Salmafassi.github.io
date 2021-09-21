<?php 
require_once('logout.php');
require_once('connexion1.php');
if(htmlentities($_POST['cancel'])){
    header("location:index.php?cancel=");
    exit;
}
$idp=htmlentities($_GET['idp']);
$requete="delete from profile where profile_id='$idp'";
$select=$connex->query($requete);
header("location:index.php?ida=$idp");
?>