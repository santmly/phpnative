<?php
require "conn.php";
$user_name = $_POST['username'];
$user_pass = $_POST['password'];
$mysql_qry = "select * from truk where username = '$user_name' and password = '$user_pass';";

$result = mysqli_query($conn, $mysql_qry);
if(mysqli_num_rows($result) > 0 ) {
	echo "login sukses";
}
else {
	echo "login gagal";
}
?>