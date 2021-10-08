<?php
$servername = "mysql.3point.ws";
$username = "3point01";
$password = "3Point2020";
$dbname = "3point01";
  // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
};
/* 

$sql = "SELECT * FROM cliente";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $nome= $row["nome"];
    echo $nome;
  }
} else {
  echo "0 results";
}
$conn->close();*/


?> 