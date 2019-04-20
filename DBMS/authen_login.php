<?php
session_start(); // Right at the top of your script
?>


<?php  
 require('db_connect.php');
if (isset($_POST['user_id']) and isset($_POST['user_pass'])){
    
// Assigning POST values to variables.
$username = $_POST['user_id'];
$password = $_POST['user_pass'];
        if($username=='admin' && $password=='admin')
                header("Location: admin.php");
                else{
// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `login_info` WHERE username='$username' and Password='$password'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
if ($count){
//echo "Login Credentials verified";
    //include "home.html";
//echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";echo "$username";
    $_SESSION['price'] = 0;
    $_SESSION['key'] = 0;
    $_SESSION['logged']=true;
    $_SESSION['username']=$username;
        echo "$username";
    
        
    header("Location: home2.html"); 
}else{
echo " <script type='text/javascript'>alert('Invalid Login Credentials')</script>";
     $_SESSION['logged']=false;
     header("Location: login2.html");
echo "Invalid Login Credentials";
}
}
}
?>