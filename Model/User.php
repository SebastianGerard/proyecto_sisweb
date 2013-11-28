<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
	var $name='User';
    public $hasMany = array(
        'Service' => array(
            'className' => 'Service',
            'order' => 'Service.created DESC'
        ),'Reserve'
    );
	var $validate=array(
			'email'=>array(
				'validate' => array(
                    'rule'=>array('email',true),
                    'required'   => true,
    				'message'=>'Invalid email'
				),
                'unique' => array(
                        'rule' => 'isUnique',
                        'message' => 'This email is already taked'
                    ),
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
                    'unique' => array(
                        'rule' => 'isUnique',
                        'message' => 'This username is already taked'
                    ),

                ),
            'password' => array(
                    'between' => array(
                        'rule'    => array('between', 5, 50),
                        'required'   => true,
                        'message' => 'Between 5 to 50 characters'
                    ),
                    'identicalFieldValues' => array( 
                        'rule' => array('identicalFieldValues', 'newpassword' ), 
                        'message' => 'Please re-enter your password twice so that the values match' 
                    ) 
                )

		);

	/*public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }*/
    function identicalFieldValues( $field=array(), $compare_field=null )  
    { 
        foreach( $field as $key => $value ){ 
            $v1 = $value; 
            $v2 = $this->data[$this->name][ $compare_field ];       
            $v2 = MD5($v2);
            if($v1 !== $v2) { 
                return FALSE; 
            } else { 
                continue; 
            } 
        } 
        return TRUE; 
    } 
	function validateLogin($data) 
    {   $var = $data['password'];
        $var=MD5($var);
        $user = $this->query("SELECT * FROM users WHERE username='".$data['username']."' and password='".$var."' and status='1'"); 
        if(empty($user) == false) 
            return $user; 
        return false; 
    }


}
?>