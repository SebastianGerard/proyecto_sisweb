<?php
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('register');
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