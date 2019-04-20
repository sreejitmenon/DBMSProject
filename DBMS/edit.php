<?php  
include "db_connect.php";
include "authen_login.php";

$username = $_SESSION['username'];
$oid = $connection->query("SELECT owner_id FROM `login_info` WHERE username='$username'")->fetch_object()->owner_id;
//echo $name;
$fname = $connection->query("SELECT fname FROM `owner` WHERE owner_id = '$oid'")->fetch_object()->fname;
$lname = $connection->query("SELECT lname FROM `owner` WHERE owner_id = '$oid'")->fetch_object()->lname;
$adds = $connection->query("SELECT `address` FROM `owner` WHERE owner_id = '$oid'")->fetch_object()->address;
$phone = $connection->query("SELECT phone FROM `owner` WHERE owner_id = '$oid'")->fetch_object()->phone;
$ema = $connection->query("SELECT email FROM `owner` WHERE owner_id = '$oid'")->fetch_object()->email;
$usei = $connection->query("SELECT username FROM `login_info` WHERE owner_id = '$oid'")->fetch_object()->username;
$pas = $connection->query("SELECT `password` FROM `login_info` WHERE owner_id = '$oid'")->fetch_object()->password;

?>
<!DOCTYPE html>
<html>
  <head>

  <link href="sell.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script>

     $(document).ready(function() {
  

<script>
     $(document).ready(function() {
  
$(function() {
    $('#sbtbtn').attr('disabled', 'disabled');
});
 
$('input[type=text],input[type=password]').keyup(function() {
        
    if ($('#target1').val() !=''&&
    $('#target2').val() != '' &&
    $('#target3').val() != ''&&
    $('#target4').val() != ''&&
    $('#target5').val() != ''&&
    $('#target6').val() != ''&&
    $('#target7').val() != '') {
      
        $('#sbtbtn').removeAttr('disabled');
    } else {
        $('#sbtbtn').attr('disabled', 'disabled');
    }
});
    });
</script>



  </head>
  <title>CAR TRADE-Edit Profile Details</title>
<body id="LoginForm">
<div class="container">
<h1 class="form-heading">Car Trade</h1>
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Please change the details </h2>
   </div>
    <form id="Login" action="update.php" method="POST">

          <div class="control-group">
                            <label class="control-label" for=
                            "inputUsername">First Name</label>
        <div class="form-group">
            <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?> " id="target1">
        </div>
    
                            <label class="control-label" for="inputLast">Last
                            Name</label>

        <div class="form-group">
            <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>" id="target2">
        </div>

                            <label class="control-label" for=
                            "inputEmail">Address</label>

        <div class="form-group">
            <input type="text" class="form-control" name="add" value="<?php echo $adds; ?>" id="target3">
        </div>

                          <label class="control-label" for=
                            "inputUser">Email</label>


        <div class="form-group">
            <input type="text" class="form-control" name="email" value="<?php echo $ema; ?>" id="target4">
        </div>
                    <label class="control-label" for=
                            "inputUser">Phone Number</label>

        <div class="form-group">
            <input type="text" class="form-control" name="phno" value="<?php echo $phone; ?>" id="target5">
        </div>


                    <label class="control-label" for=
                            "inputUser">Username</label>

        <div class="form-group">
            <input type="text" class="form-control" name="usern" value="<?php echo $usei; ?>" id="target6">
        </div>

                    <label class="control-label" for=
                            "inputUser">Password</label>

        <div class="form-group" align="center">
            <input type="password" class="form-control" name="password" value="<?php echo $pas;?>" id="target7">
            <input align="right" type="checkbox" onclick="myFunction()"> Show
            <script>
            function myFunction() {
                 var x = document.getElementById("target7");
             if (x.type === "password") {
                    x.type = "text";
                } else {
                  x.type = "password";
             }
            }
            </script>
        </div>

         <input type="submit" value="Submit" class="btn btn-primary" id="sbtbtn">
    </form>
    </div>
</div></div></div>
    