<?php

class BillsController extends AppController {

    var $name = "Bills"; 
    var $helpers = array('Html', 'Form'); 

    function index($id=null)
    {
    	if($id!=null)
    	{
    		Controller::loadModel('Service');
    		Controller::loadModel('User');
            $this->Service->query("update services set active=0 where user_id=$id");
 			$this->set('services', $this->User->Service->find('all',array("conditions" => array('Service.user_id'=>$id),array('active'=>1))));
            
            $this->set('users', $this->User->find('all',array("conditions" => array('User.id'=>$id))));
    	}
    	
    }

}
    
?>