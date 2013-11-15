<?php

class ServicesController extends AppController {

    var $name = "Service"; 
    var $helpers = array('Html', 'Form'); 
    
    
    function index($id=null) 
    { 
        $this->set('services', $this->Service->find('list',array("conditions" => array('Service.user_id'=>$id))));
    }
}

?>