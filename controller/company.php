<?php

 include_once('../model/cmodel.php');
 

Class Controller{
 
  public function Controller()
  {
   $this->model=new cmodel();
  }
  
  public function insertData($comdata)
  {
	return $this->model->submit_data($comdata);
  }
  
  public function updateData($updatedata)
  {
	return $this->model->update_data($updatedata);
  }
  public function insertreward($rewarddata)
  {
	return $this->model->insertreward($rewarddata);
  }
  
  public function getreward($id)
  {
	return $this->model->getreward($id);
  }
  public function updatereward($updatereward)
  {
	return $this->model->updatereward($updatereward);
  }
  
  public function searchreward($type)
  {
	return $this->model->searchreward($type);
  }
  public function deletereward($id)
  {
	return $this->model->deletereward($id);
  }
  public function showreward()
  {
	return $this->model->showreward();
  }
  public function deletecol($id)
  {
	return $this->model->deletecol($id);
  }
  
   public function updatehistory($updaterecord)
  {
	return $this->model->updatehistory($updaterecord);
  }
  public function getrecord($hid)
  {
	return $this->model->getrecord($hid);
  }
  
  

}
?>