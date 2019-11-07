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

             $table = 'daftartruk';
            $query = "SHOW COLUMNS FROM $table";
            if($output = mysqli_query($conn, $query)):
                $columns = array();
                while($result = mysqli_fetch_assoc($output)):
                    $columns[] = $result['Field'];
                endwhile;
            endif;


  $result=mysqli_query($conn,"SELECT * FROM `daftartruk` WHERE id = 'AD 1840 BV' ");
  

#if (!$result)
   #echo(mysqli_error($conn));

$jmlhkolom = mysqli_num_fields($result);
$isibaris = mysqli_fetch_array($result,MYSQLI_NUM);
$yangkurangNama = array();
$yangkurangindex = array();
$temp=0;
$kolom = array();

$sql = "SHOW COLUMNS FROM daftartruk";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)){
    $kolom[] = $row['Field'];
}



for ($i=0; $i < 11; $i++) { 
	if($isibaris[$i] == "0") {
	if( $kolom[$i] == "simb_kondisi")
	{
		$yangkurangNama[] = "SIM B I_B II";
	} else if ($kolom[$i] == "stm_kondisi")
	{
		$yangkurangNama[] = "Surat Tera Metrologi";
	}

    $yangkurangindex[] = $i;
    
	}
}


echo json_encode(array("yangkurang"=>$yangkurangNama));
  
        


$conn->close();
?>