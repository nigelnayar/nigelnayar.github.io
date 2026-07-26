<?php
$servername = "127.0.0.1";
$username = "Test Company";
$password = "33455432112332233455432112321133432344333453231iloveicetea1234567891034e0cfa114077563213444323444323444321132137665543365543212333321344433122423138840040c0fb3663256ad8b7b657562a72705235111071140140429081256262477lolololololololololFalloutNVisthebest";
$dbname = "community";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$conn->set_charset('utf8mb4');


// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
 ?>
