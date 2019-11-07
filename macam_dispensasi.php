<?php
require "DBAdapter.php";

//if($_POST['action']=="save")
 //{
 	$dbAdapter = new DBAdapter();

 	$id = $_POST['id'];

 	$dbAdapter->macam_dispensasi($id);


?>