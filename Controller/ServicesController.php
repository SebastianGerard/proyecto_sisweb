<?php

class ServicesController extends AppController {

    var $name = "Services"; 
    var $helpers = array('Html', 'Form'); 
    
    
    function index($id=null) 
    {
        //$this->set('services', $this->Service->find('list',array("conditions" => array('Service.user_id'=>$id))));
    }
    

    function add($id = null)
    {
    	if($this->request->is('post'))
        {
            $this->Service->create();
            $this->request->data['Service']['date'] = $_POST["date"];
            $this->Service->set($this->data);
            $this->request->data['Service']['user_id'] = $id;
            if($this->Service->save($this->request->data))
            { 
                $this->Session->setFlash(__(' Room service saved'));
            }
            else
            	$this->Session->setFlash(__(' Room service NOT  saved'));
        }
        else
        $this->set('register');
    }
}

?>