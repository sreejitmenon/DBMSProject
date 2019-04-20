<?php
// Start the session
session_start();

include "db_connect.php";
$sql="SELECT * FROM  owner";

$result = $connection->query($sql);

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
color: black;
    overflow: scroll;
}
  </style>
</head>


  <title>CAR TRADE-Admin</title>

<body >
        <div align="center">
        <h1 style="text-align:center;background-color:black;color:white;padding:20px">CAR TRADE</h1>
        <hr>
        <h2 style="text-align:center;background-color:black;color:white;padding:20px"> Admin Page</h2>


<hr> 
 
<form id="form" name="form" method="post" action="remove.php">
<table border='1' cellspacing='0' width='612' id='yourTb2'>
  <tr>
    <th bgcolor=#6699ff><font color='white'>Sl.No</font></th>
    <th bgcolor=#6699ff><font color='white'>Owner id</font></th>
    <th bgcolor=#6699ff><font color='white'>First name</font></th>
    <th bgcolor=#6699ff><font color='white'>Last name</font></th>
    <th bgcolor=#6699ff><font color='white'>Phno</font></th>
    <th bgcolor=#6699ff><font color='white'>Email-id</font></th>
        <th bgcolor=#6699ff><font color='white'>Address</font></th>
  </tr>
  <?php
      $i = 0;
      $number = 0;
      while($row = mysqli_fetch_array($result))
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
            <td><center><Strong><?php echo $row['owner_id']; ?></Strong></center></td>
            <td><center><Strong><?php echo $row['fname']; ?></Strong></center></td>
            <td><center><Strong><?php echo $row['lname']; ?></Strong></center></td>
            <td><center><Strong><?php echo $row['phone']; ?></Strong></center></td>
            <td><center><Strong><?php echo $row['email']; ?></Strong></center></td>
            <td><center><Strong><?php echo $row['address']; ?></Strong> &nbsp;&nbsp;&nbsp;
            <td><button name = "key" type = "submit" value = "<?php echo $row['owner_id']; ?>">DELETE</button>&nbsp;</center></td>
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