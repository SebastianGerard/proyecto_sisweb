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



<?php
echo $this->Form->create('User');
?>
	
<div class="row" style="padding:15px; width: auto;
 height: 500px;
 margin: auto;
 background-color: #e3e3e3;
 background: -moz-linear-gradient(top, #6699FF , #FFFFFF);
 background: -webkit-gradient(linear, 0 0, 0 100%, from(#6699FF),  to(#FFFFFF));">
  <div class="col-lg-8">
    <div class="row">
      <img src="../webroot/img/temp.png">
    </div>
    <div class="row">
      <img src="../webroot/img/pokemon.png" width="800">
    </div>
  </div>
  <div class="col-lg-4" align="right">
    <h1>Join us!</h1>
    <h4>Be a poke user now!</h4>
    <div class="row"  style="margin-bottom:10px">
      <?php
      echo $this->Form->input('name',array('class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));?>
    </div>
    <div class="row" style="margin-bottom:10px">
    <?php
    echo $this->Form->input('lastname',array('class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
    ?>
    </div>
    <div class="row" style="margin-bottom:10px">
      <?php if($this->Form->isFieldError('email')) 
      {
      echo '<div class="form-group has-error">';
      echo     '<label class="control-label" for="inputError">'. $this->Form->error("email").'</label>';
      }
      else
         echo '<div class="form-group">';
        
      ?>
    <?php
    echo $this->Form->input('email',array('errorMessage' => false,'id'=>'inputError','class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));?>
    </div>
    </div>
    <div class="row" style="margin-bottom:10px">
    <?php
    echo $this->Form->input('address',array('class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));?>
    </div>
    <div class="row" style="margin-bottom:10px">
    <?php
    echo $this->Form->input('country',array('class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));?>
    </div>
    <div class="row" style="margin-bottom:10px">
    <?php
    echo $this->Form->input('city',array('class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));?>
    </div>
    <div class="row" style="margin-bottom:10px">
    <?php
    echo $this->Form->input('phone',array('class'=>'form-control','onkeypress'=>'validate(event)','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));?>
    </div>
    <div class="row" style="margin-bottom:10px">
    <?php
    echo $this->Form->input('cellphone',array('class'=>'form-control','onkeypress'=>'validate(event)','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));?>
    </div>
    <div class="row" style="margin-bottom:10px">
    <?php
    echo $this->Form->input('username',array('class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));?>
    </div>
    <div class="row" style="margin-bottom:10px">
      <?php
      echo $this->Form->input('password',array('type'=>'password','class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));?>
      </div>
    <div class="row" style="margin-bottom:10px">
      <?php
      echo $this->Form->input('newpassword',array('type'=>'password','class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
      ?>
    </div>
    
  </div>
</div>

<div class="row">
<div class="col-lg-10" align="right">
<input type='submit' value="Register"  class = 'btn btn-primary'/>
</div>
<div class="col-lg-2">
</div>
</div>
</form>
<br>


