
<?php
include "db_connect.php";
include "authen_login.php";
$key = isset($_POST['key']) ? $_POST['key'] : '';   
    $price = $connection->query("SELECT price FROM car_details where car_id='$key'")->fetch_object()->price;
    $brand =  $connection->query("SELECT brand FROM car where car_id='$key'")->fetch_object()->brand;
    $type =  $connection->query("SELECT `model` FROM car where car_id='$key'")->fetch_object()->model; 
    $_SESSION["price"]=$price;
    $_SESSION["key"]=$key;       
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
    overflow: hidden;
}
  </style>
</head>
<body id="body_bg">
        <div <div align="center">

        <h1>Car Trade</h1>
        <h2><?php echo $brand,"\r\n";
        echo $type,"\r\n";
        ?></h2>
        <h3> <?php echo $price,"\r\n"; echo "₹"; ?> </h3>
                <form action="view.php" method="POST">
        <button name = "key" type = "submit" value = "<?php echo $key; ?>">View Image</button>
      </form>
        <form action="confirm.php" method="POST">
                <button name = "key" type = "submit" value = "<?php echo $key; ?>">PAY</button>
            </form>
</body>
</html>


                                 

