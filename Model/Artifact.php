<?php
class Artifact extends AppModel {
public $belongsTo = array('Accessory','Room');
var $validate = array(
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
?>