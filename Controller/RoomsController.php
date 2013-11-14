<?php

class RoomsController extends AppController {
public function index() {

	}
public function register()
{
	  if($this->request->is('post'))
        {
            $this->Room->create();
            $this->Room->set($this->data);
            if($this->Room->save($this->request->data))
            { 
                $this->Session->setFlash(__('Room saved'));
            }
        }
}
public function add($id)
{
	if (!$id) {
            throw new NotFoundException(__('Invalid Id'));
        }

        $room = $this->Room->findById($id);
        if (!$room) {
            throw new NotFoundException(__('Invalid Id'));
        }
	if($this->request->is('post'))
        {
        	Controller::loadModel('RoomImage');

			$a=$this->request->data['RoomImage']['image'];
     		$tmp_name = $a['tmp_name'];
        	$this->request->data['RoomImage']['image']=$this->setImage($tmp_name);
			$this->request->data['RoomImage']['room_id']=$room['Room']['id'];
	        $this->RoomImage->create();
            $this->RoomImage->set($this->data);
            if($this->RoomImage->save($this->request->data))
            { 
                $this->Session->setFlash(__('Image saved'));
              //  $this->redirect(array('action'=>'index'));
            }
        
        }
		
        $data=array('room'=>$room,'id'=>$id);
        $this->set('data', $data);
}

private function setImage($file)
{
$data=null;
if($file!=null)
{
$fp = fopen ($file, 'r');
if ($fp){
$data = fread ($fp, filesize ($file)); // cargo la imagen
fclose($fp);
$data = base64_encode ($data);
}
}
return $data;
}


}
?>