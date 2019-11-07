<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pertamina";

$out= array();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
date_default_timezone_set('Asia/Singapore'); 

$sql=mysqli_query($conn,"SELECT * from jadwal");

while($row = mysqli_fetch_assoc($sql)){

	if($row['date'] == date('Y-m-d')){
    array_push($out, $row['nopol']); 
}
}
echo json_encode(array("jadwal"=>$out));

$conn->close();
?>