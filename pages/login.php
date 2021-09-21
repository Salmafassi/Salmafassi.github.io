<?php 
require_once("connexion1.php");
session_start();
$message="";
$salt='XyZzy12*_';

if(isset($_POST['cancel'])){
    header('location:index.php');
    exit;
}
if(isset($_POST['email']) && isset($_POST['pass'])){
    $email=htmlentities($_POST['email']);
    $pwd = hash('md5', $salt.$_POST['pass']);

$selectutilisateur=$connex->prepare("select * from users where email=?  AND password=?");
$selectutilisateur->execute(array($email,$pwd));

if($user=$selectutilisateur->fetch()){
    
      $_SESSION['name']=$user['name'];
      $_SESSION['user_id']=$user['user_id'];
      header("location:index.php?name=");
      exit;
}
else{
 $message="Incorrect password";

}

}
session_destroy();
?>


<!DOCTYPE html>
<html>
<head>
<title>Fassi Salma</title>
<!-- bootstrap.php - this is HTML -->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" 
    href="../css/bootstrap.min.css" 
   >

<!-- Optional theme -->
<link rel="stylesheet" 
    href="../css/bootstrap-theme.min.css" 
   >

</head>
<body>
<div class="container">
<h1>Please Log In</h1>
<form method="POST">
    <?php 
    if(!empty($message)){
        ?>
       <p style="color:red;"><?= $message; ?></p> 
        <?php
    }
    ?>
<label for="email">Email</label>
<input type="text" name="email" id="email"><br/>
<label for="id_1723">Password</label>
<input type="password" name="pass" id="id_1723"><br/>
<input type="submit" onclick="return doValidate();" value="Log In" name="Log In">
<input type="submit" name="cancel" value="Cancel">
</form>

<script>
function doValidate() {
    console.log('Validating...');
    try {
        addr = document.getElementById('email').value;
        pw = document.getElementById('id_1723').value;
        console.log("Validating addr="+addr+" pw="+pw);
        if (addr == null || addr == "" || pw == null || pw == "") {
            alert("Both fields must be filled out");
            return false;
        }
        if ( addr.indexOf('@') == -1 ) {
            alert("Invalid email address");
            return false;
        }
        return true;
    } catch(e) {
        return false;
    }
    return false;
}
</script>

</div>
</body>