<?php
class Accessory extends AppModel {
public $hasMany = array('Artifact');
	var $validate=array(
			'name'=>array(
				'rule'=>'alphaNumeric',
				'required'=>true,
				'message'=>'only alpha-numeric name'
				)
		);

}
?>