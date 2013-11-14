<?php
class AccessoryController extends AppController {
public function index() {

	}
public function register()
{
	if($this->request->is('post'))
        {
        	//$this->request->data['Accessory']['image']=$this->setImage($this->request->data['Accessory']['image']);
	
            $this->Accessory->create();
            $this->Accessory->set($this->data);
            if($this->Accessory->save($this->request->data))
            { 
                $this->Session->setFlash(__('Accessorie saved'));
                $this->redirect(array('action'=>'index'));
            }
        }
}
private function setImage($file)
{
$data=null;
$fp = fopen ($file, 'r');
if ($fp){
$data = fread ($fp, filesize ($file)); // cargo la imagen
fclose($fp);

// averiguo su tipo mime
$type_mime = 'image/jpeg';
$isize = imagesize ($archivo);
if ($isize)
$type_mime = $isize['mime'];

// La guardamos en la BD
$data = base64_encode ($data);
}
return $data;
}



}
?>