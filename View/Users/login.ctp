<h1>Ingreso al poke-sistema</h1>

<html>
	<body>
	<div class="users form">

		<?php 
			echo $this->Form->create('User');
			echo $this->Form->input('username',array('class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
			echo $this->Form->input('password',array('type'=>'password','class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
		?>
		<input type='submit' value="Login" class = 'btn btn-primary'/>
		</form>
	</div>
	</body>
</html>