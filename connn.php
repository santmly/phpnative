<?php
$db_name = "pertamina";
$mysql_username = "root";
$mysql_password = "";
$server_name = "localhost";
$i=0;
$conn = mysqli_connect($server_name, $mysql_username, $mysql_password, $db_name);

$result = mysqli_query($conn,"SELECT * FROM daftartruk");
$response = array();

while($row = mysqli_fetch_array($result))
{
	array_push($response, array("simb_masa_berlaku"=>$row[1], "simb_kondisi"=>$row[2], "simb_dispensasi"=>$row[3], "simb_keterangan"=>$row[4],
				"stm_masa_berlaku"=>$row[5], "stm_kondisi"=>$row[6], "stm_dispensasi"=>$row[7], "stm_keterangan"=>$row[8],
				"btrk_kondisi"=>$row[9], "btrk_dispensasi"=>$row[10], "btrk_keterangan"=>$row[11]));
}

echo json_encode(array("Mobil 1"=>$response));
mysqli_close($conn);

?>