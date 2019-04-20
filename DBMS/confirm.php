<?php
//session_start(); 
//<?php
?>
<?php
 include "db_connect.php";
include "authen_login.php";
$key = isset($_POST['key']) ? $_POST['key'] : '';
$username = $_SESSION['username'];
$id = $connection->query("SELECT owner_id FROM `login_info` WHERE username='$username'")->fetch_object()->owner_id;  //this is owner id
$sql = "UPDATE `car` SET `owner_id` = $id WHERE `car`.`car_id` = $key";
if ($connection->query($sql) === TRUE)
{
    //echo "Congratulations";
    //header("Location: invoice.php");
    $oid = $connection->query("SELECT owner_id FROM `login_info` WHERE username='$username'")->fetch_object()->owner_id;
//echo $name;
$fname = $connection->query("SELECT fname FROM `owner` WHERE owner_id = '$oid'")->fetch_object()->fname;
$lname = $connection->query("SELECT lname FROM `owner` WHERE owner_id = '$oid'")->fetch_object()->lname;
$adds = $connection->query("SELECT address FROM `owner` WHERE owner_id = '$oid'")->fetch_object()->address;
$phone = $connection->query("SELECT phone FROM `owner` WHERE owner_id = '$oid'")->fetch_object()->phone;
$emai = $connection->query("SELECT email FROM `owner` WHERE owner_id = '$oid'")->fetch_object()->email;
$price = $_SESSION['price']; 
//echo $price;
$key = $_SESSION['key'];
//echo $key;
$brand =  $connection->query("SELECT brand FROM car where car_id='$key'")->fetch_object()->brand;
$model =  $connection->query("SELECT `model` FROM car where car_id='$key'")->fetch_object()->model;
}
?>


<!DOCTYPE html>

    <html>
    <head>
        <title> CAR TRADE - Invoice </title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
    </head>

    <body>
        <form action="home2.html">
        <input type="submit" value="Back to Home" />
        </form>
        <h2> Congratulations </h2>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="invoice-title">
                        <h2>Invoice</h2>
                        <h3 class="pull-right">Order # 12345</h3>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
    				<strong>Billed To:</strong><br>
    					<?php echo $fname; echo " "; echo $lname ?> <br>
    					<?php echo $adds; ?>
    				</address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
    					<strong>Payment Method:</strong><br>
    					Visa ending **** 4242<br>
    					<?php echo $emai; ?>
    				</address>
                        </div>
                        <div class="col-xs-6 text-right">
                            <address>
    					<strong>Order Date:</strong><br>
    					<?php
                                echo date("Y/m/d") . "<br>"; ?> <br><br>
    				</address>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Order summary</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <td><strong> Car </strong></td>
                                            <td class="text-center"><strong> Price  </strong></td>
                                            <td class="text-center"><strong>Quantity</strong></td>
                                            <td class="text-right"><strong>Totals</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                        <tr>
                                            <td> <?php echo $brand; echo " "; echo $model ?> </td>
                                            <td class="text-center"> <?php echo $price,"\r\n"; echo "₹" ?> </td>
                                            <td class="text-center">1</td>
                                            <td class="text-right"> <?php echo $price,"\r\n"; echo "₹" ?> </td>
                                        </tr>
                                    
                                            <td class="thick-line"></td>
                                            <td class="thick-line"></td>
                                            <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                            <td class="thick-line text-right"> <?php echo $price,"\r\n"; echo "₹" ?> </td>
                                        </tr>
                                        <tr>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line text-center"><strong>Total</strong></td>
                                            <td class="no-line text-right"><?php echo $price+$price*0.18?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
    </html>