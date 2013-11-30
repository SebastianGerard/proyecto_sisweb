<script>
function  validar()
{
    window.location.href='/proyecto_sisweb';
    alert("Sorry, the information you've entered is incorrect.");


}
</script>
<?php
class UsersController extends AppController {

    var $name = "Users"; 
    var $helpers = array('Html', 'Form'); 
    
    
    function index() 
    { 

        if($this->request->is('post'))
        {
            if(isset($_POST["buscarbtn"]))
            {
                $var = $_POST["buscartxt"];
                $this->set('users',$this->User->find('all',array('conditions'=>"name LIKE '%$var%' or username LIKE '%$var%' or lastname LIKE '%$var%'")));
            }
            else
            {
                $this->User->recursive = 0;
                    $this->set('users', $this->paginate());
            }
        }
        else
        {
            $this->User->recursive = 0;
                    $this->set('users', $this->paginate());
        }
        
    } 

    function view($id = null)
    {
        Controller::loadModel('Service');
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));

        $services=$this->User->Service->find('all',array('conditions'=>'Service.user_id='.$id));
        $this->set('services',$services);
        $this->set('user_requests',$this->User->query("SELECT users.id, users.username, gold_requests.description, gold_requests.status FROM users, gold_requests WHERE users.id = gold_requests.user_id AND gold_requests.status = 0"));
    }
    public function register() {
        if($this->request->is('post'))
        {

            $this->User->create();
            $this->User->set($this->data);
            
                if($this->User->save($this->request->data))
                { 
                   
                    App::uses('CakeEmail','Network/Email'); 
                    $this->send_mail($this->request->data['User']['email'],$this->request->data['User']['name'],$this->User->getLastInsertId());
                    $this->redirect(array("controller"=>"Pages",
                        "action"=>"display"));
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
     $message="account actived";
      }  
     else
     $message="UNKNOWN ERROR";
    
      
     $this->set('message',$message);   

    }
    public function login() {
        if(empty($this->data) == false) 
        { 
            if(($user = $this->User->validateLogin($this->data['User'])) == true) 
            { 

                $this->Session->write('User', $user[0]); 
                $this->Session->setFlash("You are logged in"); 
                
                $this->redirect('/pages/home');
            } 
            else 
            { 

                echo '<script>validar();</script>';
     

            } 
        }
    }

    function logout() 
    { 
        $this->Session->destroy('user'); 
        $this->Session->setFlash('You\'ve successfully logged out.'); 
        $this->redirect('/pages/home'); 
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
        $message = 'Hi,' . $name . ' to activate your account please click the following link ';
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

    function edit($id = null) {
        $this->User->id = $id;
        if ($this->request->is('get')) {
            $this->request->data = $this->User->read();
            $this->request->data['User']['newpassword'] = $this->request->data['User']['password'] ;
            } else {
            $this->request->data['User']['newpassword'] = $this->request->data['User']['password'] ;
            echo $this->request->data['User']['newpassword']. "; ";
            echo $this->request->data['User']['password'];
        
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Data user has been updated.');
                $this->redirect(array('action' => 'index'));
            }
            else
            {
                 foreach ($this->User->validationErrors as $key=>$value) {
                     $this->Session->setFlash($key." ");
                     foreach ($value as $key2=>$value2) {
                     $this->Session->setFlash($key2." ".$value2);
                     
                 }
                 }
                
                 
            }
        }
    }

    function gold()
    {
        $user=$this->Session->read('User');
        $user_id = $user['users']['id'];
        $already_requested = $this->User->query("select * from gold_requests where user_id='$user_id'");
        if(count($already_requested)>0){
            $this->Session->setFlash("You've already send a request, and you've not been answered yet. Please wait, We're going to tell you when you request is done. :)");
            $this->redirect(array("controller"=>"Pages",
                    "action"=>"display"));
            }
       if(isset( $_POST['send_request_button']))
       {
            $description = $_POST['description'];
           
                $this->User->query("INSERT INTO gold_requests(user_id,description,status) values('$user_id','$description',0)");
                $this->Session->setFlash('Your request was send');
                $this->redirect(array("controller"=>"Pages",
                        "action"=>"display"));
               


       }
   }

   function accept($id =null)
   {
        if($id!=null)
            {
                $this->User->query("UPDATE gold_requests SET status=1 WHERE user_id='$id'");
                 $this->User->query("UPDATE users SET rol='Gold' WHERE id='$id'");
            }
   }

   function deny($id =null)
   {
        if($id!=null)
            $this->User->query("DELETE FROM gold_requests WHERE user_id='$id'");
   }
}

?>