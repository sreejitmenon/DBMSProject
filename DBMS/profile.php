
<?php  
include "db_connect.php";
include "authen_login.php";

$username = $_SESSION['username'];
$oid = $connection->query("SELECT owner_id FROM `login_info` WHERE username='$username'")->fetch_object()->owner_id;
//echo $name;
$fname = $connection->query("SELECT fname FROM `owner` WHERE owner_id = '$oid'")->fetch_object()->fname;
$lname = $connection->query("SELECT lname FROM `owner` WHERE owner_id = '$oid'")->fetch_object()->lname;
$adds = $connection->query("SELECT address FROM `owner` WHERE owner_id = '$oid'")->fetch_object()->address;
$phone = $connection->query("SELECT phone FROM `owner` WHERE owner_id = '$oid'")->fetch_object()->phone;
$ema = $connection->query("SELECT email FROM `owner` WHERE owner_id = '$oid'")->fetch_object()->email;
?>

<html>
<!----<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</html>
  <title>CAR TRADE - Profile</title>

<body id="LoginForm">
<link rel="stylesheet" href="profile.css">
<div class="card">
    <div class="box">
        <div class="img">
            <img src="profile.jpg">
        </div>
        <h2><?php echo $fname; echo " "; echo $lname ?><br>
        <span><a href="edit.php">Edit</a></span></h2>
        <p> Address : <?php echo $adds; ?></p>
        <p> Email-Id : <?php echo $ema; ?></p>
         <p> Mobile : +91 <?php echo $phone; ?></p>
    </div>
</div>
