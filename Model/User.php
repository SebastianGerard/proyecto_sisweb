<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
	var $name='User';

	var $validate=array(
			'email'=>array(
				'rule'=>array('email',true),
				'message'=>'Invalid email'
				)
		);

	/*public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }*/
	function validateLogin($data) 
    { 
        $user = $this->query("SELECT * FROM users WHERE username='".$data['username']."' and password='".$data['password']."' and status='1'"); 
        if(empty($user) == false) 
            return $user; 
        return false; 
    }


}
?>