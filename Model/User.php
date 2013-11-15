<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
	var $name='User';
    public $hasMany = array(
        'Service' => array(
            'className' => 'Service',
            'order' => 'Service.created DESC'
        )
    );
	var $validate=array(
			'email'=>array(
				'rule'=>array('email',true),
                'required'   => true,
				'message'=>'Invalid email'
				),
            'name' => array(
                    'between' => array(
                        'rule'    => array('between', 5, 50),
                        'required'   => true,
                        'message' => 'Between 5 to 50 characters'
                    )
                ),
            'lastname' => array(
                    'between' => array(
                        'rule'    => array('between', 5, 50),
                        'required'   => true,
                        'message' => 'Between 5 to 50 characters'
                    )
                ),
            'address' => array(
                    'between' => array(
                        'rule'    => array('between', 5, 50),
                        'required'   => true,
                        'message' => 'Between 5 to 50 characters'
                    )
                ),
            'country' => array(
                    'between' => array(
                        'rule'    => array('between', 5, 50),
                        'required'   => true,
                        'message' => 'Between 5 to 50 characters'
                    )
                ),
            'city' => array(
                    'between' => array(
                        'rule'    => array('between', 5, 50),
                        'required'   => true,
                        'message' => 'Between 5 to 50 characters'
                    )
                ),
            'cellphone' => array(
                    'between' => array(
                        'rule'    => array('between', 5, 8),
                        'required'   => true,
                        'message' => 'Between 5 to 8 characters'
                    ),
                    'numeric'=> array(
                        'rule' => 'numeric',
                        'message' => 'Numbers only'
                    )
                ),
            'phone' => array(
                    'between' => array(
                        'rule'    => array('between', 5, 7),
                        'required'   => false,
                        'message' => 'Between 5 to 7 characters'
                    ),
                    'numeric'=> array(
                        'rule' => 'numeric',
                        'message' => 'Numbers only'
                    )
                ),
            'username' => array(
                    'between' => array(
                        'rule'    => array('between', 5, 50),
                        'required'   => true,
                        'message' => 'Between 5 to 50 characters'
                    ),

                ),
            'password' => array(
                    'between' => array(
                        'rule'    => array('between', 5, 50),
                        'required'   => true,
                        'message' => 'Between 5 to 50 characters'
                    ),
                )

		);

	/*public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }*/
	function validateLogin($data,$password) 
    {   $var = $data['password'];
        $var=MD5($var);
        echo $var;
        $user = $this->query("SELECT * FROM users WHERE username='".$data['username']."' and password='".$password."' and status='1'"); 
        if(empty($user) == false) 
            return $user; 
        return false; 
    }


}
?>