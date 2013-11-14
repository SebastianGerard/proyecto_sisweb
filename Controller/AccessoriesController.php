<?php
class AccessoriesController extends AppController {
public function index() {

	}
public function register()
{
			
	if($this->request->is('post'))
        {
        	
			$a=$this->request->data['Accessory']['image'];
     		$tmp_name = $a['tmp_name'];
        	$this->request->data['Accessory']['image']=$this->setImage($tmp_name);
			
	        $this->Accessory->create();
            $this->Accessory->set($this->data);
            if($this->Accessory->save($this->request->data))
            { 
                $this->Session->setFlash(__('Accessorie saved'));
              //  $this->redirect(array('action'=>'index'));
            }
        
        }
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