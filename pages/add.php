<?php 
require_once('logout.php');
$message=isset($_GET['message'])?$_GET['message']:"";
$errormessage=isset($_GET['error'])?$_GET['error']:"";
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
<h1>Adding Profile for UMSI</h1>
<form method="post" action="addaction.php">
    <?php if(!empty($message)){?>
        <p style="color:red"><?= $message; ?></p>

    <?php } 
    else{
    ?>
     <p style="color:red"><?= $errormessage; ?></p>

<?php } ?>
<p>First Name:
<input type="text" name="first_name"  id="fname"size="60"/></p>
<p>Last Name:
<input type="text" name="last_name" id="lname" size="60"/></p>
<p>Email:
<input type="text" name="email"  id="email" size="30"/></p>
<p>Headline:<br/>
<input type="text" name="headline" id="headline" size="80"/></p>
<p>Summary:<br/>
<textarea name="summary" rows="8" id="sum" cols="80"></textarea>
<p>
Education: <input type="submit" id="addEdu" value="+">
<div id="edu_fields">
</div>
</p>
<p>
Position: <input type="submit" id="addPos" value="+">
<div id="position_fields">
</div>
</p>
<p>
<input type="submit" value="Add" onclick="return dovalidate();">
<input type="submit" name="cancel" value="Cancel">
</p>
</form>
</div>
<script>
  function dovalidate(){
   
      var email=document.getElementById('email').value;
      var fname=document.getElementById('fname').value;
      var lname=document.getElementById('lname').value;
      var headline=document.getElementById('headline').value;
      var summary=document.getElementById('sum').value;
      if ( email.indexOf('@') == -1 ) {
            alert("Invalid email address");
            return false;
        }
        else if (email == "" || fname == "" || lname == "" || headline == "" || summary== "") {
            alert("All fields must be filled out");
            return false;
        }
        else{
            return true;
        }
      
       
  }
</script>
<script>
countPos = 0;
countEdu = 0;

// http://stackoverflow.com/questions/17650776/add-remove-html-inside-div-using-javascript
$(document).ready(function(){
    window.console && console.log('Document ready called');

    $('#addPos').click(function(event){
        // http://api.jquery.com/event.preventdefault/
        event.preventDefault();
        if ( countPos >= 9 ) {
            alert("Maximum of nine position entries exceeded");
            return;
        }
        countPos++;
        window.console && console.log("Adding position "+countPos);
        $('#position_fields').append(
            '<div id="position'+countPos+'"> \
            <p>Year: <input type="text" name="year'+countPos+'" value="" /> \
            <input type="button" value="-" onclick="$(\'#position'+countPos+'\').remove();return false;"><br>\
            <textarea name="desc'+countPos+'" rows="8" cols="80"></textarea>\
            </div>');
    });

    $('#addEdu').click(function(event){
        event.preventDefault();
        if ( countEdu >= 9 ) {
            alert("Maximum of nine education entries exceeded");
            return;
        }
        countEdu++;
        window.console && console.log("Adding education "+countEdu);

        $('#edu_fields').append(
            '<div id="edu'+countEdu+'"> \
            <p>Year: <input type="text" name="edu_year'+countEdu+'" value="" /> \
            <input type="button" value="-" onclick="$(\'#edu'+countEdu+'\').remove();return false;"><br>\
            <p>School: <input type="text" size="80" name="edu_school'+countEdu+'" class="school" value="" />\
            </p></div>'
        );

        $('.school').autocomplete({
            source: "school.php"
        });

    });


});

</script>
</body>
</html>
