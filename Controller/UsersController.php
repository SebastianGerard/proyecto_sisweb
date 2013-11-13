<?php
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('register');
        $this->Auth->allow('active_account');
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
     $id=$this->decodeString($id);
     $user=$this->User->find('first', array('conditions' => array('User.id' => $id)));
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
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Invalid username or password, try again'));
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
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
      
        $str=(base64_encode($str)); //apply base64 first and then reverse the string
      
      return $str;
    }
    public function decodeString($str){
        $str=base64_decode($str); //apply base64 first and then reverse the string}
     return $str;
    }
}

?>