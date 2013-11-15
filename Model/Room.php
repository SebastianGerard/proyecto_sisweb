<?php
class Room extends AppModel {
public $hasMany = array('RoomImage','Artifact');
	var $validate=array(
			'code'=>array(
				'rule'=>'alphaNumeric',
				'required'=>true,
				'message'=>'Only alpha-numeric'
				),
			'type'=>array(
				'rule'=>'alphaNumeric',
				'required'=>true,
				'message'=>'Only alpha-numeric'
				),
			'price'=>array(
				'rule'=>'numeric',
				'required'=>true,
				'message'=>'Only numbers'
				),
				'capacity'=>array(
				'rule'=>'Numeric',
				'required'=>true,
				'message'=>'Only numbers'
				)
		);
}
?>