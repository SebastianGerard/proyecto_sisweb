<?php
class UsersController extends AppController {

    var $name = "Users"; 
    var $helpers = array('Html', 'Form'); 
    
    function index() 
    { 
        
    } 

    public function register() {
        if($this->request->is('post'))
        {
            $this->User->create();
            $this->User->set($this->data);
            if($this->User->save($this->request->data))
            { 
                $this->Session->setFlash(__('User saved'));
                App::uses('CakeEmail','Network/Email'); 
                $this->send_mail($this->request->data['User']['email'],$this->request->data['User']['name'],$this->request->data['User']['id']);
                $this->redirect(array('action'=>'index'));
            }
        }
        else
        $this->set('register');
    }

    public function login() {
        if(empty($this->data) == false) 
        { 
            if(($user = $this->User->validateLogin($this->data['User'])) == true) 
            { 
                
                foreach ($user as $i => $value) {
                    echo $i." -> ";
                    foreach ($value as $key => $value) {
                        echo $key." -> ";
                        foreach ($value as $key2 => $value2) {
                            echo $key." -> ".$value2;
                        }
                    }
                }
                $this->Session->write('User', $user[0]); 
                $this->Session->setFlash('You\'ve successfully logged in.'); 
                
            } 
            else 
            { 
                $this->Session->setFlash('Sorry, the information you\'ve entered is incorrect.'); 
                 
            } 
        }
    }

    function logout() 
    { 
        $this->Session->destroy('user'); 
        $this->Session->setFlash('You\'ve successfully logged out.'); 
        $this->redirect('login'); 
    } 

    function __validateLoginStatus() 
    { 
        if($this->action != 'login' && $this->action != 'logout') 
        { 
            if($this->Session->check('User') == false) 
            { 
                $this->redirect('login'); 
                $this->Session->setFlash('The URL you\'ve followed requires you login.'); 
            } 
        } 
    } 

    public function send_mail($receiver = null, $name = null, $id = null) {
        $confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->webroot . "users/active_account/".$this->encodeString($id);
        $message = 'Hi,' . $name . ' ';
        App::uses('CakeEmail', 'Network/Email');
        $email = new CakeEmail('gmail');
        $email->from('yosistemasucb@gmail.com');
        $email->to($receiver);
        $email->subject('Mail Confirmation');
        $email->send($message . " " . $confirmation_link);
    }
    public function encodeString($str){
      for($i=0; $i<5;$i++)
      {
        $str=strrev(base64_encode($str)); //apply base64 first and then reverse the string
      }
      return $str;
    }
    public function decodeString($str){
     for($i=0; $i<5;$i++)
     {
        $str=base64_decode(strrev($str)); //apply base64 first and then reverse the string}
     }
     return $str;
    }
}

?>