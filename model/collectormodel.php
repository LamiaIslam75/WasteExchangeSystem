<?php

 Class colmodel{
public $conn;
 
   public function submit_data($data)
  {
	 $conn = new mysqli("localhost", "root", "","wastex");
	if(!$conn){
		die('Could not Connect My Sql:' .mysql_error());} 
	
	$sql = "INSERT INTO `collector`(`cname`, `name`, `email`, `contact`, `pass`, `address`, `dob`, `gender`,`image`) VALUES
			('".$data['cname']."','".$data['name']."','".$data['email']."','".$data['contact']."','".$data['pass']."',
			'".$data['address']."','".$data['dob']."','".$data['gender']."','".$data['path']."')";
	 if (mysqli_query($conn, $sql)) {
		return true;
	 } else {
	return false;
	 }
	 mysqli_close($conn);
  }
  
   public function update_data($updatedata)
  {
	 $conn = new mysqli("localhost", "root", "","wastex");
	if(!$conn){
		die('Could not Connect My Sql:' .mysql_error());} 
	
	$sql = "UPDATE `collector` SET `cname`='".$updatedata['cname']."',
	`name`='".$updatedata['name']."',`email`='".$updatedata['email']."',`contact`='".$updatedata['contact']."',
	`pass`='".$updatedata['newpass']."',`address`='".$updatedata['address']."',`dob`='".$updatedata['dob']."', `gender`='".$updatedata['gender']."'
	 WHERE colid = ".$updatedata['id']." ";
	 
	 if (mysqli_query($conn, $sql)) {
		return true;
	 } else {
	return false;
	 }
	 mysqli_close($conn);
  }
  
  public function deleterecord($hid)
  {
	 $conn = new mysqli("localhost", "root", "","wastex");
	if(!$conn){
		die('Could not Connect My Sql:' .mysql_error());} 
	
	$sql = "DELETE FROM `history` WHERE hid = $hid";
	 if (mysqli_query($conn, $sql)) {
		return true;
	 } else {
	return false;
	 }
	 mysqli_close($conn);
  }
  
 }
 ?>