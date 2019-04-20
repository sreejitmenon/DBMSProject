<?php
require('db_connect.php');

include "authen_login.php";
$username = $_SESSION['username'];
$oid = $connection->query("SELECT owner_id FROM `login_info` WHERE username='$username'")->fetch_object()->owner_id;
$sql="SELECT c1.*,c2.status FROM car c1 inner join car_status c2 on c1.car_id=c2.car_id WHERE (c2.status='unsold') and c1.owner_id!='$oid' ORDER BY c2.car_id";
$sql1="SELECT c3.*,c4.status FROM car_details c3 inner join car_status c4 on c3.car_id=c4.car_id WHERE (c4.status='unsold') and c4.owner_id!='$oid' ORDER BY c4.car_id";
$sql2="SELECT c5.*,c6.status FROM security_details c5 inner join car_status c6 on c5.car_id=c6.car_id WHERE (c6.status='unsold') and c6.owner_id!='$oid' ORDER BY c6.car_id";


$result=mysqli_query($connection,$sql);
$result1=mysqli_query($connection,$sql1);
$result2=mysqli_query($connection,$sql2);

//echo $result;
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
  

  body {

    background-image: url('car4.jpg') ;
 background-size:100%;
background-repeat:none;
background-attachment:fixed;
color:black;
    overflow: scroll;
}
        h1 a {
            display: block;
            color: white;
            text-align: center;
            padding: 16px;
            text-decoration: none;
        }
        
        h1 a:hover {
            background-color: black;
            color: white;
        }
  </style>
</head>

  <title>CAR TRADE-Buy</title>

<body >
        <div align="center">

        <h1 style="text-align:center;background-color:black;color:white;padding:20px"><a href="home2.html">CAR TRADE</a></h1>
<hr>
            <form action="search1.php" method="POST">
               <h4 style="color:red"> Keyword:<br>
                <input type="text" placeholder="Search by brand or model..."" name="Keyword">
                <input type="submit" value="Search">
            </form>

            </hr>
        </div>
<hr>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".dropdown-menu li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>







<hr> 
 <div align="center">
<form id="form" name="form" method="post" action="payment.php">
<table border='1' cellspacing='0' width='612' id='yourTbl'>
  <tr>
    <th bgcolor=#6699ff><font color='white'>Sl.No</font></th>
    <th bgcolor=#6699ff><font color='white'>Brand</font></th>
    <th bgcolor=#6699ff><font color='white'>Model</font></th>
    <th bgcolor=#6699ff><font color='white'>Type</font></th>
    <th bgcolor=#6699ff><font color='white'>Fuel</font></th>
    <th bgcolor=#6699ff><font color='white'>Year Of Purchase</font></th>
    <th bgcolor=#6699ff><font color='white'>Registration Number</font></th>
    <th bgcolor=#6699ff><font color='white'>Insurance Number</font></th>
    <th bgcolor=#6699ff><font color='white'>Rto Registration</font></th>
    <th bgcolor=#6699ff><font color='white'>Transmission</font></th>
        <th bgcolor=#6699ff><font color='white'>Engine no</font></th>

  </tr>
  <?php
      $i = 0;
      $number = 0;
      while($row = mysqli_fetch_array($result) and $row1 = mysqli_fetch_array($result1) and $row2 = mysqli_fetch_array($result2))
      {
 
        $number++; 
        $i++;
        if($i%2)
        {
            $bg_color = "#EEEEEE";
        }
        else 
        {
             $bg_color = "#E0E0E0";
        }   
   ?>
        <tr bgcolor=<?php echo $bg_color; ?> >  
            <td><center><Strong><font color='red'><?php echo $number; ?></font></Strong></center></td>
            <td><center><Strong><?php echo $row['brand']; ?></Strong></center></td>
            <td><center><Strong><?php echo $row['model']; ?></Strong></center></td>
            <td><center><Strong><?php echo $row['type']; ?></Strong></center></td>
            <td><center><Strong><?php echo $row['fuel_type']; ?></Strong></center></td>
            <td><center><Strong><?php echo $row1['year_of_purchase']; ?></Strong></center></td>
            <td><center><Strong><?php echo $row1['regno']; ?></Strong></center></td>
            <td><center><Strong><?php echo $row2['insurance_no']; ?></Strong></center></td>
            <td><center><Strong><?php echo $row2['rto_no']; ?></Strong></center></td>
            <td><center><Strong><?php echo $row['transmission_type']; ?></Strong></center></td>
                         <td><center><Strong><?php echo $row1['enigne_no']; ?></Strong> &nbsp;&nbsp;&nbsp;
            <td><button name = "key" type = "submit" value = "<?php echo $row['car_id']; ?>">BUY</button>&nbsp;</center></td>
        </tr>
<?php 
      } 
 ?>
</table>
</form>

</body></html>
<script type="text/javascript">
function yourEvent(btnClick)
{
   var table = document.getElementById('yourTbl');
   
   var rowCount = table.rows.length; 
   //console.log(table);
   var data;
   for(var i=0; i<rowCount; i++) 
   {
		 var row = table.rows[i];
		 var chkbox = row.cells[4].childNodes[0];
		 if(chkbox == btnClick)
                 {
		       data = table.rows[i].cells[1].innerHTML;	
                       break;
                 }
   } 
   alert(data);
}
</script>
