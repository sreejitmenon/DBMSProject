<?php
//session_start(); 
?>
<?php
include "db_connect.php";
$key = isset($_POST['key']) ? $_POST['key'] : '';  
$user=$connection->query("SELECT username FROM login_info where owner_id='$key'")->fetch_object()->username;
$sql1=$connection->query("DELETE FROM car WHERE owner_id='$key'");
$sql2=$connection->query("DELETE FROM owner WHERE owner_id='$key'");
?>


<!DOCTYPE html>
    <html>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
      
    /*<link rel="stylesheet" href="style.css">
  /* Style the input field */
  #myInput {
    padding: 20px;
    margin-top: -6px;
    border: 0;
    border-radius: 0;
    background: #f1f1f1;
  }
  
  html {
    background: url('car4.jpg') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    overflow: scroll;
}
  </style>
</head>
<body id="body_bg">
        <div <div align="center">

        <h1 style="text-align:center;background-color:black;color:white;padding:20px">CAR TRADE</h1>
        <hr>
        <h2 style="text-align:center;background-color:black;color:white;padding:20px"> Admin Page</h2>                <form action="admin.php">
        <input type="submit" value="Back to Admin" />
        </form>
        <hr>
        <h2><?php echo "User ".$user." has been deleted","\r\n";?></h2>
</body>
</html>