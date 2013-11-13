<?php
class User extends AppModel {
	var $name='User';
	var $validate=array(
			'email'=>array(
				'rule'=>array('email',true),
				'message'=>'Invalid email'
				)
		);
}
?>