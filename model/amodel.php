<?php

 Class amodel{
public $conn;
  
  public function update_data($updatedata)
  {
	 $conn = new mysqli("localhost", "root", "","wastex");
	if(!$conn){
		die('Could not Connect My Sql:' .mysql_error());} 
	
	$sql = "UPDATE `admin` SET 
	`name`='".$updatedata['name']."',`email`='".$updatedata['email']."',`contact`='".$updatedata['contact']."',
	`pass`='".$updatedata['newpass']."'  WHERE id = ".$updatedata['id']." ";
	 if (mysqli_query($conn, $sql)) {
		return true;
	 } else {
	return false;
	 }
	 mysqli_close($conn);
  }
 }
 ?>