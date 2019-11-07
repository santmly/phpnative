<?php
require "Constants.php";

class DBAdapter 
{
	public function connect() 
	{
		$conn=mysqli_connect(Constants::$DB_SERVER,Constants::$USERNAME, Constants::$PASSWORD, Constants::$DB_NAME);
		if($conn) {
			//echo "Koneksi Sukses";
			return $conn;
		}else {
			//echo"Koneksi Gagal";
			return NULL;
		}
	}
	public function update($id,$s) 
	{
	$conn=$this->connect();

	//$sql="SELECT * from daftartruk";
	//$result=mysqli_query($conn,$sql);


		$sql1="UPDATE daftartruk SET simb_masa_berlaku = '$s[0]' , simb_kondisi = '$s[1]',simb_dispensasi = '$s[2]',simb_keterangan = '$s[3]',
			stm_masa_berlaku = '$s[4]', stm_kondisi = '$s[5]', stm_dispensasi = '$s[6]', stm_keterangan = '$s[7]',
			 btrk_kondisi = '$s[8]', btrk_dispensasi = '$s[9]',btrk_keterangan = '$s[10]' WHERE id = '$id'";

		try
            {
                $result=mysqli_query($conn,$sql1);
                if($result)
                {
                    print(json_encode(array("Success")));
                }else
                {
                    print(json_encode(array("Not Successfully Updated")));
                }
            }catch (Exception $e)
            {
                 print(json_encode(array("PHP EXCEPTION : CAN'T UPDATE INTO MYSQL. "+$e->getMessage())));
            }
            mysqli_close($conn);
        }


    public function fix_update($id,$jenis,$s) 
	{
	$conn=$this->connect();

	//$sql="SELECT * from daftartruk";
	//$result=mysqli_query($conn,$sql);
	switch ($jenis) {
		case "simb":
			$datajenis = array("simb_kondisi","simb_dispensasi","simb_keterangan");			
			break;
		case 'stm':
			$datajenis = array("stm_kondisi","stm_dispensasi","stm_keterangan");
			break;
		case 'baut tera':
			$datajenis = array("stm_kondisi","stm_dispensasi","stm_keterangan");
		break;
		default:
			break;
	}



		$sql1="UPDATE daftartruk SET " . $datajenis[0] . " = '$s[0]' , " . $datajenis[1] . " = '$s[1]' ,". $datajenis[2] . " = '$s[2]' ". " WHERE id = '$id'";

		try
            {
                $result=mysqli_query($conn,$sql1);
                if($result)
                {
                    print(json_encode(array("Success")));
                }else
                {
                    print(json_encode(array("Not Successfully Updated")));
                }
            }catch (Exception $e)
            {
                 print(json_encode(array("PHP EXCEPTION : CAN'T UPDATE INTO MYSQL. "+$e->getMessage())));
            }
            mysqli_close($conn);
        }

        public function macam_dispensasi($id)
        {
        	$conn=$this->connect();

        	 $table = 'daftartruk';
            $query = "SHOW COLUMNS FROM $table";
            if($output = mysqli_query($conn, $query)):
                $columns = array();
                while($result = mysqli_fetch_assoc($output)):
                    $columns[] = $result['Field'];
                endwhile;
            endif;


 				 $result=mysqli_query($conn,"SELECT * FROM `daftartruk` WHERE id = '$id' ");
  


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
				echo json_encode(array("macam_dispensasi"=>$yangkurangNama));
				  
				$conn->close();
				
			}
        


}
	
?>