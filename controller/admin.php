<?php

 include_once('../model/amodel.php');
 

Class Controller{
 
  public function Controller()
  {
   $this->model=new amodel();
  }
  
  
  public function updateData($updatedata)
  {
	return $this->model->update_data($updatedata);
  }

}
?>