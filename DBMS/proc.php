<?php
session_start(); // Right at the top of your script
?>
<?php

include "db_connect.php";
$key1 = $_POST["Keyword"];
//echo $key;
$query="CALL proc1('$key1')";
//$sql = "SELECT * FROM car where model='$key'";
$result = $connection->query($query);
$count = mysqli_num_rows($result);

?>


    <!DOCTYPE html>
    <html>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
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

  </style>
</head>
</html>
  <title>CAR TRADE-Car Status</title>

<body>
          <div align="center">

           <h1 style="text-align:center;background-color:black;color:white;padding:20px">CAR TRADE</h1>
        <hr>
        <h2 style="text-align:center;background-color:black;color:white;padding:20px"> Admin Page</h2>
</div>
<hr> 
 
<div class = "new" align="center">
<table border='1' cellspacing='0' position='center' width='612' id='yourTbl'>
  <tr>
    <th bgcolor=#6699ff><font color='white'>Owner Id</font></th>
    <th bgcolor=#6699ff><font color='white'>Car Id</font></th>
    <th bgcolor=#6699ff><font color='white'>Status</font></th>
  <?php
      $i = 0;
      $number = 0;
      while($row = $result->fetch_assoc())
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
            <td><center><Strong><font color='red'><?php echo $row['owner_id']; ?></font></Strong></center></td>
            <td><center><Strong><?php echo $row['car_id']; ?></Strong></center></td>
            <td><center><Strong><?php echo $row['status']; ?></Strong> &nbsp;&nbsp;&nbsp;
        </tr>
<?php 
      } 
 ?>
</table>
    </div>

</body>
</html>
