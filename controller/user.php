<?php

 include_once('../model/umodel.php');
 

Class Controller{
 
  public function Controller()
  {
   $this->model=new umodel();
  }
  
  public function insertData($userdata)
  {
	return $this->model->submit_data($userdata);
  }
  
  public function updateData($updatedata)
  {
	return $this->model->update_data($updatedata);
  }
  
   public function checklogin($logindata)
  {
	return $this->model->check_data($logindata);
  }
   public function insertrecord($data)
  {
	return $this->model->insertrecord($data);
  }
}
?>