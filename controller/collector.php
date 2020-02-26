<?php

 include_once('../model/collectormodel.php');
 

Class Controller{
 
  public function Controller()
  {
   $this->model=new colmodel();
  }
  
  public function insertData($data)
  {
	return $this->model->submit_data($data);
  }
  
  public function updateData($updatedata)
  {
	return $this->model->update_data($updatedata);
  }
  public function deleterecord($hid)
  {
	return $this->model->deleterecord($hid);
  }

}
?>