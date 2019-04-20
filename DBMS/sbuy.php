<?php
// Start the session
session_start();
?>

            <?php
include "db_connect.php";
$sql="SELECT * FROM car";

$result = $connection->query($sql);

if ($result->num_rows > 0) {
    echo "<br>Results<br><br>";
        while($row = $result->fetch_assoc()) {
        echo "Type: ". $row["type"]."<br>"."Brand: ".$row["brand"]."<br>"."Model: ".$row["model"]."<br><br>";
        echo "<a class=\"button\" href=\"sbuy.php\">Buy</a>.<br><br>";
    }
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}
?>