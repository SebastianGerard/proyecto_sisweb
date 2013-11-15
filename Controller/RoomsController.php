<?php


class RoomsController extends AppController {
public function index() {
		$this->Room->recursive = 0;
        $this->set('rooms', $this->paginate());
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
public function edit($id=null)
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
            $this->request->data['Room']['id']=$id;
            $this->Room->set($this->data);
            if($this->Room->save($this->request->data))
            { 
                $this->Session->setFlash(__('Room saved'));
            }
        }
        $this->set('data', $room);
}
public function addAccessories($id=null)
{
Controller::loadModel('Accessory');
Controller::loadModel('Artifact');

		if (!$id) {
            throw new NotFoundException(__('Invalid Id'));
        }

        $room = $this->Room->findById($id);
        if (!$room) {
            throw new NotFoundException(__('Invalid Id'));
        }
        $my_accessories=$this->Accessory->Artifact->find('all',array('conditions'=>'Artifact.room_id='.$room['Room']['id']));
        $accessories=$this->Room->query("SELECT * FROM accessories as Accessory WHERE NOT EXISTS (select * from artifacts as Artifact where Accessory.id=Artifact.accessory_id and Artifact.room_id=".$room['Room']['id'].")");
        $data=array('room'=>$room,'id'=>$id,'accessories'=>$accessories,'myAccessories'=>$my_accessories);
        $this->set('data', $data);

}
public function newAccessory($roomId=null,$accessoryId=null)
{
    Controller::loadModel('Artifact');

    if($this->request->is('post'))
        {
    
                $this->request->data['Artifact']['room_id']=$roomId;
                $this->request->data['Artifact']['accessory_id']=$accessoryId;
                $this->Artifact->create();
                $this->Artifact->set($this->data);

                if($this->Artifact->save($this->request->data))
                { 
                    $this->Session->setFlash(__('Artifact saved'));

                     $this->redirect(array('action'=>'addAccessories/'.$roomId));
                }
        }

}
public function editAccessory($roomId=null,$accessoryId=null)
{
    Controller::loadModel('Artifact');

    if($this->request->is('post'))
        {
    
               $id= $this->Artifact->find('first',array('conditions'=>'room_id='.$roomId.' and accessory_id='.$accessoryId));
                $this->Artifact->id=$id;
                if($this->Artifact->saveField('amount',$this->request->data['Artifact']['amount']))
                { 
                    $this->Session->setFlash(__('Artifact saved'));

                     $this->redirect(array('action'=>'addAccessories/'.$roomId));
                }
        }

}
public function deleteAccessory($roomId=null,$accessoryId=null)
{
    Controller::loadModel('Artifact');

    
               $id= $this->Artifact->find('first',array('conditions'=>'room_id='.$roomId.' and accessory_id='.$accessoryId));
               
                $this->Artifact->delete($id['Artifact']['id']);
                 
                    $this->Session->setFlash(__('Artifact deleted'));

                     $this->redirect(array('action'=>'addAccessories/'.$roomId));
                
        

}
public function add($id=null)
{
Controller::loadModel('RoomImage');
	if (!$id) {
            throw new NotFoundException(__('Invalid Id'));
        }

        $room = $this->Room->findById($id);
        if (!$room) {
            throw new NotFoundException(__('Invalid Id'));
        }
	if($this->request->is('post'))
        {
        		
			$a=$this->request->data['RoomImage']['image'];
     		$tmp_name = $a['tmp_name'];
        	$this->request->data['RoomImage']['image']=$this->setImage($tmp_name);
        	if($this->request->data['RoomImage']['image']!=null)
        	{
				$this->request->data['RoomImage']['room_id']=$room['Room']['id'];
		        $this->RoomImage->create();
	            $this->RoomImage->set($this->data);

	            if($this->RoomImage->save($this->request->data))
	            { 
	                $this->Session->setFlash(__('Image saved'));

        
	              //  $this->redirect(array('action'=>'index'));
	            }
        	}
        
        }
        $images=($this->RoomImage->find('all',array('conditions'=>'RoomImage.room_id ='.$room['Room']['id'])));
		$data=array('room'=>$room,'id'=>$id,'images'=>$images);
        $this->set('data', $data);
}
public function deleteImage($idIm,$id)
{
Controller::loadModel('RoomImage');
$this->RoomImage->delete($idIm);
$this->redirect(array('action'=>'add/'.$id));

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
public function view($id=null)
{
    Controller::loadModel('Accessory');
Controller::loadModel('Artifact');

Controller::loadModel('RoomImage');
	if (!$id) {
            throw new NotFoundException(__('Invalid Id'));
        }

        $room = $this->Room->findById($id);
        if (!$room) {
            throw new NotFoundException(__('Invalid Id'));
        }
        $accessories=$this->Accessory->Artifact->find('all',array('conditions'=>'Artifact.room_id='.$room['Room']['id']));
        
        $images=($this->RoomImage->find('all',array('conditions'=>'RoomImage.room_id ='.$room['Room']['id'])));
		$data=array('room'=>$room,'id'=>$id,'images'=>$images,'accessories'=>$accessories);
        $this->set('data', $data);
}

}
?>