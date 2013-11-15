<?php
class Accessory extends AppModel {
public $hasMany = array('Artifact');
	var $validate=array(
			'name'=>array(
				'required'=>true,
				'message'=>'Invalid email'
				)
		);
}
?>