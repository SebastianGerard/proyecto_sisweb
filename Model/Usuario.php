<?php
class Usuario extends AppModel {
	var $name='Usuario';
	var $validate=array(
			'correo'=>array(
				'rule'=>array('email',true),
				'message'=>'correo invalido'
				)
		);
}
?>