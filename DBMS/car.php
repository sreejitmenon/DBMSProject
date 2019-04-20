<?php
require('db_connect.php');

$sql1="SELECT c1.*,c2.* FROM car c1 inner join car_details c2 on c1.car_id=c2.car_id ORDER BY c1.car_id";
$sql2="SELECT c3.*,c4.* FROM car c3 inner join security_details c4 on c3.car_id=c4.car_id ORDER BY c3.car_id";
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
overflow: scroll;
color:black;
}

#tableContainer-1 {
    height: 100%;
    width: 100%;
    display: table;
  }
  #tableContainer-2 {
    vertical-align: middle;
    display: table-cell;
    height: 100%;
  }
  #myTable {
    margin: 0 auto;
  }
  </style>
</head>



<body>
      
        <h1 style="text-align:center;background-color:black;color:white;padding:20px">CAR TRADE</h1>
        <hr>
        <h2 style="text-align:center;background-color:black;color:white;padding:20px"> Admin Page</h2>
</div>
<hr>
<table style="float:center" border='1' cellspacing='10' width='612' id='myTable'>

<div id="tableContainer-1">
  <div id="tableContainer-2">
  <tr>
    <th bgcolor=#6699ff><font color='white'>Sl.No</font></th>
    <th bgcolor=#6699ff><font color='white'>  Brand </font></th>
    <th bgcolor=#6699ff><font color='white'> Model </font></th>
    <th bgcolor=#6699ff><font color='white'> Type </font></th>
    <th bgcolor=#6699ff><font color='white'> Fuel </font></th>
    <th bgcolor=#6699ff><font color='white'>Registration</font></th>
    <th bgcolor=#6699ff><font color='white'>Insurance Number</font></th>
    <th bgcolor=#6699ff><font color='white'>Rto Registration</font></th>
    <th bgcolor=#6699ff><font color='white'>Transmission</font></th>
  </tr>
  <?php
      $i = 0;
      $number = 0;
      while($row1 = mysqli_fetch_array($result1) and $row2 = mysqli_fetch_array($result2))
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
            <td><center><Strong><?php echo $row1['brand']; ?></Strong></center></td>
            <td><center><Strong><?php echo $row1['model']; ?></Strong></center></td>
            <td><center><Strong><?php echo $row1['type']; ?></Strong></center></td>
            <td><center><Strong><?php echo $row1['fuel_type']; ?></Strong></center></td>
            <td><center><Strong><?php echo $row1['regno']; ?></Strong></center></td>
            <td><center><Strong><?php echo $row2['insurance_no']; ?></Strong></center></td>
            <td><center><Strong><?php echo $row2['rto_no']; ?></Strong></center></td>
            <td><center><Strong><?php echo $row1['transmission_type']; ?></Strong> &nbsp;&nbsp;&nbsp;
        </tr>
<?php 
      } 
 ?>
</table>
    </div>
    </div>

</body></html>
