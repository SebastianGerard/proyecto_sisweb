
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

echo $this->Html->link("add/remove image","add/".$data['id']);
echo "<br>";
echo $this->Html->link("add/remove accessories","addAccessories/".$data['id']);
echo "<br>";



 foreach ($data['images'] as $image)
 {
	echo  '<a data-toggle="modal" href="#room'.$image['RoomImage']['id'].'" ><img src="data:image/jpeg;base64,' . ($image['RoomImage']['image']) . '" width="100" height="100"></a>';
	echo '<div class="modal fade" id="room'.$image['RoomImage']['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    		<img src="data:image/jpeg;base64,' . ($image['RoomImage']['image']) . '" width=600 height=500>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->';
 }
?>
<br>
</fieldset>
</form>
</div>
</div>
</div>
