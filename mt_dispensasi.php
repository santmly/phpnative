<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pertamina";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  $presen = array();
    $sql= "SELECT * FROM jadwal ";
    $result=mysqli_query($conn,$sql);

    while ($row= mysqli_fetch_assoc($result)) {
        if($row['presentase'] < 100) {
          $presen[] = $row['nopol'];
        }
      # code...
    }

echo json_encode(array("mt_dispensasi"=>$presen));



$conn->close();
?>