<?php
// Start the session
session_start();
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
  </style>
</head>
<body id="body_bg">
        <div <div align="center">

        <h1>Car Trade</h1>

<hr>
            <form action="search1.php" method="POST">
                Keyword:<br>
                <input type="text" placeholder="Search..." name="Keyword">
                <input type="submit" value="Submit">
            </form>

            </hr>
        </div>
<hr>
<div class="container">
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Filter 
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <input class="form-control" id="myInput" type="text" placeholder="Search..">
      <li><a href="brand.php">Brand</a></li>
      <li><a href="asc.php">Asc Sort</a></li>
      <li><a href="desc.php">Desc Sort</a></li>
    </ul>
  </div>

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

</html>

            <?php
include "db_connect.php";
$sql="SELECT * FROM car GROUP BY Brand";
$result = $connection->query($sql);
if ($result->num_rows > 0) {
    echo "<br>Results<br><br>";
        while($row = $result->fetch_assoc()) {
        echo "Type: ". $row["type"]."<br>"."Brand: ".$row["brand"]."<br>"."Model: ".$row["model"]."<br><br>";
    }
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}
?>
</hr>