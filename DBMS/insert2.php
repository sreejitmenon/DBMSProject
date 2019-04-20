
<?php  
include "db_connect.php";
include "authen_login.php";
$type= $_POST["type"];
$brand= $_POST["brand"];
$model= $_POST["model"];
$ft= $_POST["ft"];
$tt= $_POST["tt"];
$username = $_SESSION['username'];
$name = $connection->query("SELECT owner_id FROM `login_info` WHERE username='$username'")->fetch_object()->owner_id;
//echo $name;
$car_cond= $_POST["car_cond"];
$color= $_POST["color"];
$reg= $_POST["reg"];
$year= $_POST["year"];
$price= $_POST["price"];
$distance= $_POST["distance"];
$ino = $_POST["ino"];
$rto = $_POST["rto"];
$emi = $_POST["emi"];
$sql1 = "INSERT INTO car(type,brand,model,fuel_type,transmission_type,owner_id) VALUES('$type','$brand','$model','$ft','$tt',$name)";
if ($connection->query($sql1) === TRUE)
{
    $x = 1;
}
$caid = $connection->query("SELECT car_id FROM `car` WHERE type = '$type' and brand ='$brand' and model='$model' and fuel_type ='$ft' and transmission_type='$tt' and owner_id='$name' ")->fetch_object()->car_id;
$_SESSION['ca'] = $caid;
$sql2 = "INSERT INTO car_details(car_id,car_condition,color,regno,year_of_purchase,price,distance_travelled) VALUES('$caid','$car_cond','$color','$reg','$year','$price','$distance')";
$sql3 = "INSERT INTO security_details(car_id,insurance_no,rto_no,emission_ratings) VALUES('$caid','$ino','$rto','$emi')";
$sql4 = "INSERT INTO car_status(owner_id,car_id,status) VALUES('$name','$caid','unsold')";
//$result = $connection->query($sql);
if ($x && $connection->query($sql2) === TRUE && $connection->query($sql3) === TRUE && $connection->query($sql4) === TRUE) {
    echo "New record created successfully";
    header("Location: image.html");
} else {
    $del1 = $connection->query("DELETE from car WHERE car_id = '$caid'");
    $del2 = $connection->query("DELETE from car_details WHERE car_id = '$caid'");
    $del3 = $connection->query("DELETE from car_status WHERE car_id = '$caid'");
    $del4 = $connection->query("DELETE from security_details WHERE car_id = '$caid'");
    echo "Error: " . $sql1.$sql2.$sql3.$sql4 ."<br>" . $connection->error;
    $message = 'Please Check The credentials!!';
    echo "<script type='text/javascript'>alert('$message');</script>";
    header( "Refresh:4; url=sell.php", true, 303);
}
?>