<?php
$this->layout = 'login';
$user = $this->Session->read('User');
if($user!=null && $user['users']['rol']!='Admin')
$this->redirect('/proyecto_sisweb');
?>
<script>
function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
  

}
</script>
.
<div class="users form">
	<div class="col-lg-3">
	</div>
	<div class="col-lg-7">
		<div class="well">
			<legend>Register a new service:</legend>
			<div class="row">
					<?php 
						echo $this->Form->create('Service');
						if($this->Form->isFieldError('name')) 
					      {
					      echo '<div class="col-lg-4"></div>';
					      echo '<div class="form-group has-error row " align="left">';
					      echo     '<label class="control-label" for="inputError">'. $this->Form->error("name").'</label>';
					      }
					      else
					         echo '<div class="form-group">';  
      
						echo $this->Form->input('name',array('errorMessage' => false,'class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('align'=>'right','class'=>'col-lg-3 control-label','align'=>'right','between'=>'<div class="form-group">','after'=>'div')));
						echo '</div>';

						if($this->Form->isFieldError('detail')) 
					      {
					      echo '<div class="col-lg-4"></div>';
					      echo '<div class="form-group has-error row " align="left">';
					      echo     '<label class="control-label" for="inputError">'. $this->Form->error("detail").'</label>';
					      }
					      else
					         echo '<div class="form-group">';  
						echo $this->Form->input('detail',array('errorMessage' => false,'type'=>'text','class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('align'=>'right','class'=>'col-lg-3 control-label','align'=>'right','between'=>'<div class="form-group">','after'=>'div')));
						echo '</div>';

						if($this->Form->isFieldError('amount')) 
					      {
					      echo '<div class="col-lg-4"></div>';
					      echo '<div class="form-group has-error row " align="left">';
					      echo     '<label class="control-label" for="inputError">'. $this->Form->error("amount").'</label>';
					      }
					      else
					         echo '<div class="form-group">';  
						echo $this->Form->input('amount',array('errorMessage' => false,'type'=>'text','class'=>'form-control','onkeypress'=>'validate(event)','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('align'=>'right','class'=>'col-lg-3 control-label','align'=>'right','between'=>'<div class="form-group">','after'=>'div')));
						echo '</div>';
					?>
					<div class="col-lg-3" align="right"><b>Date: </b></div>
					<div class="col-lg-8">
						<input id="datePicker" class="form-control" type="date" name="date" value>
					</div>
				
					<div align="center">
						<input type='submit' value="Register" class = 'btn btn-primary'/>
					</div>
				
			</div>
		</div>
	</div>
</div>

<script>
var now = new Date();
var day = ("0" + now.getDate()).slice(-2);
var month = ("0" + (now.getMonth() + 1)).slice(-2);
var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
$('#datePicker').val(today);
</script>