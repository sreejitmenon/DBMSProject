<?php
require('db_connect.php');

include "authen_login.php";


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
    $('#target7').val() != ''&&
    $('#target8').val() != ''&&
    $('#target9').val() != ''&&
    $('#target10').val() != ''&&
    $('#target11').val() != ''&&
    $('#target12').val() != ''&&
    $('#target13').val() != ''&&
    $('#target14').val() != '') {
      
        $('#sbtbtn').removeAttr('disabled');
    } else {
        $('#sbtbtn').attr('disabled', 'disabled');
    }
});
    });
</script>

  </head>
  <title>CAR TRADE-Sell</title>
<body id="LoginForm">
<div class="container">
<h1 class="form-heading">Car Trade</h1>
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Car details</h2>
   <p>Please enter your car details </p>
   </div>
    <form id="Login" action="insert2.php" method="POST">

        <div class="form-group">


            <input type="text" class="form-control" name="type" placeholder=" Car type" id="target1">

        </div>

        <div class="form-group">

            <input type="text" class="form-control" name="brand" placeholder=" Car brand" id="target2">

        </div>

        <div class="form-group">

            <input type="text" class="form-control" name="model" placeholder=" Car Model" id="target3">

        </div>

        <div class="form-group">

            <input type="text" class="form-control" name="ft" placeholder=" Fuel type" id="target4">

        </div>

        <div class="form-group">

            <input type="text" class="form-control" name="tt" placeholder=" Transmission type" id="target5">

        </div>

        <div class="form-group">

            <input type="text" class="form-control" name="car_cond" placeholder=" Car condition" id="target6">

        </div>

        <div class="form-group">

            <input type="text" class="form-control" name="color" placeholder=" Car color" id="target7">

        </div>

        <div class="form-group">

            <input type="text" class="form-control" name="reg" placeholder=" Registration no." id="target8">

        </div>

        <div class="form-group">

            <input type="text" class="form-control" name="year" placeholder=" Purchase year" id="target9">

        </div>

        <div class="form-group">

            <input type="text" class="form-control" name="price" placeholder=" Car price" id="target10">

        </div>

        <div class="form-group">

            <input type="text" class="form-control" name="distance" placeholder=" Distance travelled" id="target11">

        </div>

        <div class="form-group">

            <input type="text" class="form-control" name="ino" placeholder=" Insurance no." id="target12">

        </div>  

        <div class="form-group">

            <input type="text" class="form-control" name="rto" placeholder=" RTO no." id="target13">

        </div>

        <div class="form-group">

            <input type="text" class="form-control" name="emi" placeholder=" Emission ratings" id="target14">

        </div>


        <input type="submit" value="Submit" class="btn btn-primary" id="sbtbtn">

    </form>

    </div>
</div></div></div>
    