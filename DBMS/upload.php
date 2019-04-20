<?php
    require('db_connect.php');
    include "authen_login.php";
    //$username = $_SESSION['username'];
    $caid=$_SESSION['ca'];
  if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    //echo $check;
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $insert = $connection->query("UPDATE `car_details` SET images ='{$imgContent}' WHERE car_id='$caid'");
        if($insert){
            echo "File uploaded successfully.";
            header( "Refresh:4; url=home2.html", true, 303);
        }else{
            echo "File upload failed, please try again.";
        } 
    }
    else{
    echo "Your add has been submited, you will be redirected to your account page in 3 seconds....";
    header( "Refresh:4; url=home2.html", true, 303);
    }
}
?>