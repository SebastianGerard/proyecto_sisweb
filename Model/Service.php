<?php

class Service extends AppModel {
	 public $belongsTo = 'User';
	 var $validate = array(
		 'name' => array(
                'between' => array(
                    'rule'    => array('between', 0, 50),
                    'required'   => true,
                    'message' => 'Between 5 to 50 characters'
                )
            ),
		 'amount' => array(
                'between' => array(
                    'rule'    => array('between', 0, 10),
                    'required'   => true,
                    'message' => 'At maximum 10 digits'
                ),
                'numeric'=> array(
                    'rule' => 'numeric',
                    'message' => 'Numbers only'
                )
            )
	 );
}