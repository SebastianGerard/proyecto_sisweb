
<script>
function  validar()
{
    window.location.href='/proyecto_sisweb';
    alert("Sorry, the information you've entered is incorrect.");


}
</script>
<?php
//javascript que desplegara un mensaje de error en caso q el login no tenga exito
class UsersController extends AppController {

    var $name = "Users"; 
    var $helpers = array('Html', 'Form'); 
    
    //prepara una lista con todos los usuarios
    function index() 
    { 

        if($this->request->is('post'))
        {
            //verifica si el usuario trato de filtrar algo en la busqueda
            if(isset($_POST["buscarbtn"]))
            {
                $var = $_POST["buscartxt"];
                //realiza busqueda en Bd en base a los parametros del usuario
                $this->set('users',$this->User->find('all',array('conditions'=>"name LIKE '%$var%' or username LIKE '%$var%' or lastname LIKE '%$var%'")));
            }
            else
            {
                //caso contrario recupera todos los usuarios de BD
                $this->User->recursive = 0;
                    $this->set('users', $this->paginate());
            }
        }
        else
        {
            //caso contrario recupera todos los usuarios de BD
            $this->User->recursive = 0;
                    $this->set('users', $this->paginate());
        }
        
    } 
//despliega datos de un usuario como tambien sus servicios utilizados 
    function view($id = null)
    {
        //modelos  utilizar
        Controller::loadModel('Service');
        //recupera row del usuario
        $this->User->id = $id;
        //verifica que el usuario con el id especificado exista
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        //envia este usuario a la vista
        $this->set('user', $this->User->read(null, $id));
        //envia a la vista todos los servicios de este usuario
        $services=$this->User->Service->find('all',array('conditions'=>'Service.user_id='.$id));
        $this->set('services',$services);
        //en casod e ser admin enviara a la vista las solicitudes de usuario gold
        $this->set('user_requests',$this->User->query("SELECT users.id, users.username, gold_requests.description, gold_requests.status FROM users, gold_requests WHERE users.id = gold_requests.user_id AND gold_requests.status = 0"));
    }
    //registra un nuevo usuario al sistema
    public function register() {
        if($this->request->is('post'))
        {
            //preparamos datos a guardar
            $this->User->create();
            $this->User->set($this->data);
            //encriptamos la contrasena con md5
            $this->request->data['User']['password'] = MD5($this->request->data['User']['password']);
            $this->request->data['User']['newpassword'] = MD5($this->request->data['User']['newpassword']);
            $this->request->data['User']['rol'] = "Client";
            $this->request->data['User']['NIT'] = "0000000";
            $this->request->data['User']['status'] = 1;
            //intentamos guardar en BD
                if($this->User->save($this->request->data))
                { 
                   //se enviara un mail de confirmacion(no funciona online)
                   // App::uses('CakeEmail','Network/Email'); 
                    //$this->send_mail($this->request->data['User']['email'],$this->request->data['User']['name'],$this->User->getLastInsertId());
                    $this->redirect(array("controller"=>"Pages",
                        "action"=>"display"));
                }
            
            
        }
        else
        $this->set('register');
    }
    //funcion para activar la cuente recibe el id del usuario por la url
    public function active_account($id=null)
    {
        //busca el usuario para ctivar su cuenta
     $user=$this->User->find('first', array('conditions' => array('User.id' => $id,'User.status'=>'0')));
     //si existe el usuario se procedera con el cambio, caso contrario se desplegara un error
     if($user!=null)
     {
        //seteamos la cuenta del usuario a activada
     $this->User->updateAll(array("status"=>"1"),array("id"=>$id));
     //desplegamos el mensaje de cuenta activada
     $message="account actived";
      }  
     else
     $message="UNKNOWN ERROR";
    //desplegamos un mensaje de error
      //enviamos el mensaje sea cual sea a la vista
     $this->set('message',$message);   

    }//funcion para validar el ingreso al sistema
    public function login() {
        if(empty($this->data) == false) 
        { 
            //valida los datos de usuario y contrasena esistan en la BD
            if(($user = $this->User->validateLogin($this->data['User'])) == true) 
            { 
                //escribe el usuario en una sesion
                $this->Session->write('User', $user[0]);
                //envia el mensaje de loggeado 
                $this->Session->setFlash("You are logged in"); 
                //envia a home
                $this->redirect('/pages/home');
            } 
            else 
            { 
                //envia el mensaje de error con un javascript
                echo '<script>validar();</script>';
     

            } 
        }
    }
    //salir del sistema
    function logout() 
    { 
        //elimina la variable de usuario almacenada en la sesion
        $this->Session->destroy('user'); 
        //envia mensaje indiacndo que salio del sistema
        $this->Session->setFlash('You\'ve successfully logged out.'); 
        //enviando a home
        $this->redirect('/pages/home'); 
    } 
//metodo actualmente no utilizado
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
//metodo para enviar mail
    public function send_mail($receiver = null, $name = null, $id = null) {
        //preparamos link que estara en el cuerpo del mensaje
        $confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->webroot . "users/active_account/".($id);
     //preparamos el mensaje para el usuario
        $message = 'Hi,' . $name . ' to activate your account please click the following link ';
        //llamamos  archivos de configuracion de cake
        App::uses('CakeEmail', 'Network/Email');
        $email = new CakeEmail('gmail');
        //cuenta de origen
        $email->from('yosistemasucb@gmail.com');
       //cuenta destino
        $email->to($receiver);
        //subject
        $email->subject('Mail Confirmation');
        //enviamos el mensaje
        $email->send($message . " " . $confirmation_link);
    }
    //metodos actualmente sin uso
    public function encodeString($str){
      
        $str=(base64_encode($str)); //apply base64 first and then reverse the string
      
      return $str;
    }
    public function decodeString($str){
        $str=base64_decode($str); //apply base64 first and then reverse the string}
     return $str;
    }
//editar us usuario, id se refiera al usuario
    function edit($id = null) {
        //recuperamos row del usuario
        $this->User->id = $id;
        if ($this->request->is('get')) {
            //si metodo es get enviamos los datos del usuario a la interfaz
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
                //si metodo es post verificamos si existen errores y los enviamos a la interfaz
                 foreach ($this->User->validationErrors as $key=>$value) {
                     $this->Session->setFlash($key." ");
                     foreach ($value as $key2=>$value2) {
                     $this->Session->setFlash($key2." ".$value2);
                     
                 }
                 }
                
                 
            }
        }
    }
//Cliente enviara solicitud para ser usuario gold
    function gold()
    {
        //sacamos el usuario de la sesion
        $user=$this->Session->read('User');
        //obtenemos el id de usuario de sesion
        $user_id = $user['users']['id'];
        //buscamos en Bd si ya realizo alguna peticion Gold
        $already_requested = $this->User->query("select * from gold_requests where user_id='$user_id'");
        //verificamos si tiene peticiones pendienes
        if(count($already_requested)>0){
            //si tiene solicitudes pendientes enviamos mensaje y redireccionamos a home
            $this->Session->setFlash("You've already send a request, and you've not been answered yet. Please wait, We're going to tell you when you request is done. :)");
            $this->redirect(array("controller"=>"Pages",
                    "action"=>"display"));
            }
       if(isset( $_POST['send_request_button']))
       {
        //recuperamos la descripcion de su peticion
            $description = $_POST['description'];
           //insertamos peticion en BD
                $this->User->query("INSERT INTO gold_requests(user_id,description,status) values('$user_id','$description',0)");
                //desplegamos mensaje en vista
                $this->Session->setFlash('Your request was send');
                //redirecionamos a home
                $this->redirect(array("controller"=>"Pages",
                        "action"=>"display"));
               


       }
   }
//administrador acepto solicitud gold
   function accept($id =null)
   {
    //validamos id
        if($id!=null)
            {//actualizamos el estado de la solicitud
                $this->User->query("UPDATE gold_requests SET status=1 WHERE user_id='$id'");
                //actualizamos el rol del usuario
                 $this->User->query("UPDATE users SET rol='Gold' WHERE id='$id'");
            }
   }
//administrador denego solicitud gold
   function deny($id =null)
   {
    //validamos id
        if($id!=null)
            $this->User->query("DELETE FROM gold_requests WHERE user_id='$id'");
        //eliminamos peticion
   }
}

?>