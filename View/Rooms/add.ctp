
<?php
echo $this->Form->create('RoomImage',array('enctype'=>'multipart/form-data'));
?>
<div class="row">
 <div class="col-lg-6">
  <div class="well">
 <form class="bs-example form-horizontal">
<fieldset>
	
<?php

echo $this->Form->input('price',array('readonly'=>'true','value'=>$data['room']['Room']['price'],'class'=>'form-control','onkeypress'=>'validate(event)','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
echo $this->Form->input('capacity',array('readonly'=>'true','value'=>$data['room']['Room']['capacity'],'class'=>'form-control','onkeypress'=>'validate(event)','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
echo $this->Form->input('ubication',array('readonly'=>'true','value'=>$data['room']['Room']['ubication'],'class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));

echo $this->Form->input('type',array('readonly'=>'true','value'=>$data['room']['Room']['type'],'type'=>'text','options'=>array('simple'=>'Simple','double'=>'Double','presidential'=>'presidential'),'class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));

echo $this->Form->input('image',array('type'=>'file','class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
 foreach ($data['images'] as $image)
 {
echo  '<img src="data:image/jpeg;base64,' . ($image['RoomImage']['image']) . '" width="100" height="100">';

 }
?>
<br>

<input type='submit' value="Add" class = 'btn btn-primary'/>

</fieldset>
</form>
</div>
</div>
</div>