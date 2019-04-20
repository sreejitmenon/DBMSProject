
<?php  
include "db_connect.php";
include "authen_login.php";
$fname= $_POST["fname"];
$lname= $_POST["lname"];
$phno= $_POST["phno"];
$email= $_POST["email"];
$add= $_POST["add"];
$user_id= $_POST["usern"];
$pass= $_POST["password"];

$username = $_SESSION['username'];
$oid = $connection->query("SELECT owner_id FROM `login_info` WHERE username='$username'")->fetch_object()->owner_id;
//echo $oid;

if(!$fname or !$lname or !$phno or !$email or !$add or !$user_id or !$pass){
    $message = 'Please Enter all The credentials!!';
    echo "<script type='text/javascript'>alert('$message');</script>";
}
else{
    $sql1 = $connection->query("UPDATE `owner` SET fname='$fname',lname='$lname',phone='$phno',email='$email',address='$add' WHERE owner_id='$oid'");
    $sql2 = $connection->query("UPDATE `login_info` SET username='$user_id',password='$pass' WHERE owner_id='$oid'");
    // echo "<script type='text/javascript'>alert('Updated Successfully Please login again');</script>";
     session_destroy();
    echo 'Updated Successfully Please login again';
    header( "Refresh:5; url=login2.html", true, 303);
}