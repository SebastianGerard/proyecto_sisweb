
<?php
$this->layout = 'login';
$user = $this->Session->read('User');
if($user!=null && $user['users']['rol']!='Admin')
$this->redirect('/proyecto_sisweb');

?>
<script>
function test()
{
	return confirm("are you sure you want delete this image?");
}
</script>	
<?php

echo $this->Form->create('RoomImage',array('enctype'=>'multipart/form-data'));
?>
<div class="row">
<div class="col-lg-3">
</div>
 <div class="col-lg-6">
  <div class="well">
 <form class="bs-example form-horizontal">
<fieldset>
	<legend>Add/Remove picture</legend>
<?php
echo $this->Form->input('code',array('readonly'=>'true','value'=>$data['room']['Room']['code'],'class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
echo $this->Form->input('type',array('readonly'=>'true','value'=>$data['room']['Room']['type'],'type'=>'text','class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));

echo $this->Form->input('price',array('readonly'=>'true','value'=>$data['room']['Room']['price'],'class'=>'form-control','onkeypress'=>'validate(event)','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
echo $this->Form->input('capacity',array('readonly'=>'true','value'=>$data['room']['Room']['capacity'],'class'=>'form-control','onkeypress'=>'validate(event)','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));

echo $this->Form->input('image',array('type'=>'file','accept'=>'.jpg','class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
 foreach ($data['images'] as $image)
 {
	echo  '<a  href=/proyecto_sisweb/rooms/deleteImage/'.$image['RoomImage']['id'].'/'.$data['id'].' onClick="return test();"><img src="data:image/jpeg;base64,' . ($image['RoomImage']['image']) . '" width="100" height="100"></a>';
	
 }
?>
<br>

<input type='submit' value="Add" class = 'btn btn-primary'/>

</fieldset>
</form>
</div>
</div>
</div>
