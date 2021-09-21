<?php 
require_once('logout.php');
require_once('connexion1.php');
require_once('utile.php');
if(isset($_POST['cancel'])){
    header("location:index.php?cancel=");
    exit;
}
$idp=htmlentities($_GET['idp']);
$msg=validatePos();
$msg1=validatedu();
if(is_string($msg)){
 
  header("location:edit.php?error=$msg&idp=$idp");
  exit;
}
if(is_string($msg1)){
 
  header("location:edit.php?error=$msg1&idp=$idp");
  exit;
}
 $fname=htmlentities($_POST['first_name']);
$lname=htmlentities($_POST['last_name']);
$email=htmlentities($_POST['email']);
$headline=htmlentities($_POST['headline']);
$summary=htmlentities($_POST['summary']);
$requete="update profile set first_name='$fname', last_name='$lname', email='$email', headline='$headline', summary='$summary' where profile_id='$idp'";
$select=$connex->query($requete);
$requete1="delete from position where profile_id='$idp'";
$select1=$connex->query($requete1);
$requete2="delete from education where profile_id='$idp'";
$select2=$connex->query($requete2);
$rank = 1;
for($i=1; $i<=9; $i++) {
  if ( ! isset($_POST['year'.$i]) ) continue;
  if ( ! isset($_POST['desc'.$i]) ) continue;

  $year = $_POST['year'.$i];
  $desc = $_POST['desc'.$i];
  $stmt = $connex->prepare('INSERT INTO Position
    (profile_id, rank, year, description)
    VALUES ( :pid, :rank, :year, :desc)');

  $stmt->execute(array(
  ':pid' => $idp,
  ':rank' => $rank,
  ':year' => $year,
  ':desc' => $desc)
  );

  $rank++;

}
$rank = 1;
for($i=1; $i<=9; $i++) {
 
  if ( ! isset($_POST['edu_school'.$i]) ) continue;
  $school = $_POST['edu_school'.$i];
  $requete="select * from institution where name='$school'";
  $select=$connex->query($requete);
  if($select->rowCount()==0){
    $requete1="insert into institution(name) values('$school')";
    $select1=$connex->query($requete1);
  }
 


}
for($i=1; $i<=9; $i++) {
  if ( ! isset($_POST['edu_school'.$i]) ) continue;
  if ( ! isset($_POST['edu_year'.$i]) ) continue;
  $year=$_POST['edu_year'.$i];
  $school=$_POST['edu_school'.$i];
  $requete="select * from institution where name='$school'";
  $select=$connex->query($requete);
  $id_inst=$select->fetch()['institution_id'];
   $year=$_POST['edu_year'.$i];
  $requete="insert into education(profile_id,institution_id,rank,year) values('$idp','$id_inst','$rank','$year') ";
  $select=$connex->query($requete);
 

  $rank++;

}
header("location:index.php?idd=$idp");




?>