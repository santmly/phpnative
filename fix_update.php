<?php
require "DBAdapter.php";

//if($_POST['action']=="save")
 //{
 	$dbAdapter = new DBAdapter();

 	$id = $_POST['nopol'];
 	$jenis = $_POST['jenis'];
 	$Kondisi1=$_POST['kondisi']; $Dispen1=$_POST['dispensasi']; $Keterangan1=$_POST['keterangan'];
 	 	//$Kondisi4=$_POST['Kondisi4']; $Dispen4=$_POST["Dispen4"]; $Keterangan4=$_POST['Keterangan4'];
 	//$Kondisi5=$_POST['Kondisi5']; $Dispen5=$_POST["Dispen5"]; $Keterangan5=$_POST['Keterangan5'];
 	//$Kondisi6=$_POST['Kondisi6']; $Dispen6=$_POST["Dispen6"]; $Keterangan6=$_POST['Keterangan6'];
 	//$Kondisi7=$_POST['Kondisi7']; $Dispen7=$_POST["Dispen7"]; $Keterangan7=$_POST['Keterangan7'];
 	//$Kondisi8=$_POST['Kondisi8']; $Dispen8=$_POST["Dispen8"]; $Keterangan8=$_POST['Keterangan8'];
 	//$Kondisi9=$_POST['Kondisi9']; $Dispen9=$_POST["Dispen9"]; $Keterangan9=$_POST['Keterangan9'];
 	//$Kondisi11=$_POST['Kondisi10']; $Dispen10=$_POST["Dispen10"]; $Keterangan10=$_POST['Keterangan10'];
 	//$Kondisi11=$_POST['Kondisi11']; $Dispen11=$_POST["Dispen11"]; $Keterangan11=$_POST['Keterangan11'];

 	//$SIM_B='23/06/97';
 	//$Kondisi1='0'; 
 	//$Dispen1="13 HK";
 	//$Keterangan1='hlo';



 	$dbAdapter->fix_update($id, $jenis, array($Kondisi1,$Dispen1,$Keterangan1));


