
<div class="users form">
	
	<?php 
		echo $this->Form->create('Service');
		echo $this->Form->input('name',array('class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
		echo $this->Form->input('detail',array('type'=>'text','class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
		echo $this->Form->input('amount',array('type'=>'text','class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
		
	?>
	Date: <input class="form-control" type="date" name="date">
	<input type='submit' value="Register" class = 'btn btn-primary'/>
	
	
</div>
