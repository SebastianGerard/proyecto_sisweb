<?php


class RoomsController extends AppController {
public function reservesReport()
{
        Controller::loadModel('User');
        $this->set('users', $this->User->query("select User.username,count(*) as cantidad from reserves as Reserve,users as User where User.id=Reserve.user_id group by User.id order by cantidad DESC LIMIT 10"));
}
public function index() {
    if($this->request->is('post'))
    {
            $from=$_POST['from'];
            if($from=="")
                $from=0;
            $to=$_POST['to'];
            if($to=="")
                $to=1000000;
            $capacity=$_POST['capacity'];
            if($capacity=="")
                $capacity=0;
            $type=$_POST['type'];
            if($type=="all")
                $type="";
            
            $rooms=$this->Room->find('all',array('conditions'=>"capacity>=".$capacity." and price>=".$from." and price<=".$to." and type LIKE '%$type%'"));
    }
    else
		$rooms= $this->Room->find('all');
        $this->set('rooms', $rooms);
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
                $this->redirect(array('action'=>'index'));
            }
        }
}
public function allReserves()
{
    Controller::loadModel('Reserve');
    $reservations= $this->Reserve->find('all');
         $this->set('reservations',$reservations );

}
public function removeReserve($id=null)
{
        Controller::loadModel('Reserve');
         $id=$this->Reserve->find('first',array('conditions'=>'Reserve.id='.$id));
        $this->Reserve->delete($id['Reserve']['id']);
        $this->Session->setFlash(__('Reserve deleted'));
 
        $this->redirect(array('action'=>'allReserves'));
}
public function reserve($id=null)
{

    Controller::loadModel('Reserve');
    Controller::loadModel('User');
    if($this->request->is('post'))
        {
            $user = $this->Session->read('User');
            $start=$_POST['start'];
            $end=$_POST['end'];
            
            if($start<=$end)
            {
                $collitions= $this->Reserve->find('all',array('conditions'=>"room_id=$id and ((STR_TO_DATE('$start',  '%Y-%m-%d' )>=first_day and STR_TO_DATE('$start',  '%Y-%m-%d' )<=last_day) or (STR_TO_DATE('$end',  '%Y-%m-%d' )>=first_day and STR_TO_DATE('$end',  '%Y-%m-%d' )<=last_day))"));
                $number=count($collitions);
                if($number==0)
                {
                    $this->request->data['Reserve']['first_day']=$start;
                    $this->request->data['Reserve']['last_day']=$end;
                    $this->request->data['Reserve']['user_id']=$user['users']['id'];
                    $this->request->data['Reserve']['room_id']=$id;
                    
                    $this->Reserve->set($this->data);
                    if($this->Reserve->save($this->request->data))
                    { 
                        $this->Session->setFlash(__('Reserve saved'));
                        $this->redirect(array('action'=>'index'));
                    }
                }
                else
                    $this->set('collitions',$collitions);
            }
            else
                $this->set('error','the end cannot be lower than start' );

            
         }
      

     $reservations= $this->Reserve->find('all',array('conditions'=>'room_id='.$id));
     $this->set('reservations',$reservations );
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
                $this->redirect(array('action'=>'index'));
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