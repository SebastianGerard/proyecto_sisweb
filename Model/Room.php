<?php
class Room extends AppModel {
public $hasMany = array('RoomImage','Artifact');
}
?>