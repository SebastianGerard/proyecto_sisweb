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
                $this->Session->setFlash(__(' User saved'));
                App::uses('CakeEmail','Network/Email'); 
                $this->send_mail($this->request->data['User']['email'],$test['name'],$this->User->getLastInsertId());
                $this->redirect(array('action'=>'index'));
            }
        }
        else
        $this->set('register');
    }
    public function active_account($id=null)
    {
     $user=$this->User->find('first', array('conditions' => array('User.id' => $id,'User.status'=>'0')));
     if($user!=null)
     {
     $this->User->updateAll(array("status"=>"1"),array("id"=>$id));
     $message="cuenta activada";
      }  
     else
     $message="ERROR";
    
      
     $this->set('message',$message);   

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
        $confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->webroot . "users/active_account/".($id);
        $message = 'Hi,' . $name . ' ';
        App::uses('CakeEmail', 'Network/Email');
        $email = new CakeEmail('gmail');
        $email->from('yosistemasucb@gmail.com');
        $email->to($receiver);
        $email->subject('Mail Confirmation');
        $email->send($message . " " . $confirmation_link);
    }
    public function encodeString($str){
      
        $str=(base64_encode($str)); //apply base64 first and then reverse the string
      
      return $str;
    }
    public function decodeString($str){
        $str=base64_decode($str); //apply base64 first and then reverse the string}
     return $str;
    }
}

?>