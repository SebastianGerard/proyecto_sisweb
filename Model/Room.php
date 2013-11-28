<?php
class Room extends AppModel {
public $hasMany = array('RoomImage','Artifact','Reserve');
	var $validate=array(
			'code'=>array(
				'validate'=>array(
				'rule'=>'alphaNumeric',
				'required'=>true,
				'message'=>'Only alpha-numeric'
				),'unique' => array(
                        'rule' => 'isUnique',
                        'message' => 'This code is already taked'
                    )
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