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
      <?php if($this->Form->isFieldError('name')) 
      {
      echo '<div class="col-lg-4"></div>';
      echo '<div class="form-group has-error row " align="left">';
      echo     '<label class="control-label" for="inputError">'. $this->Form->error("name").'</label>';
      }
      else
         echo '<div class="form-group">';  
      ?>
      <?php
      echo $this->Form->input('name',array('errorMessage' => false,'class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array( 'align'=>'right','class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));?>
    </div>
  </div>
      
    <div class="row" style="margin-bottom:10px">
    <?php if($this->Form->isFieldError('lastname')) 
      {
      echo '<div class="col-lg-4"></div>';
      echo '<div class="form-group has-error row " align="left">';
      echo     '<label class="control-label" for="inputError">'. $this->Form->error("lastname").'</label>';
      }
      else
         echo '<div class="form-group">';  
      ?>
    <?php
    echo $this->Form->input('lastname',array('errorMessage' => false,'class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('align'=>'right','class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
    ?>
    </div>
     </div>
 
    <div class="row" style="margin-bottom:10px">
      <?php if($this->Form->isFieldError('email')) 
      {
      echo '<div class="col-lg-4"></div>';
      echo '<div class="form-group has-error row " align="left">';
      echo     '<label class="control-label" for="inputError">'. $this->Form->error("email").'</label>';
      }
      else
         echo '<div class="form-group">';  
      ?>
    <?php
    echo $this->Form->input('email',array('errorMessage' => false,'id'=>'inputError','class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('align'=>'right','class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));?>
    </div>
    </div>
    <div class="row" style="margin-bottom:10px">
      <?php if($this->Form->isFieldError('address')) 
      {
      echo '<div class="col-lg-4"></div>';
      echo '<div class="form-group has-error row " align="left">';
      echo     '<label class="control-label" for="inputError">'. $this->Form->error("address").'</label>';
      }
      else
         echo '<div class="form-group">';  
      ?>
  
    <?php
    echo $this->Form->input('address',array('errorMessage' => false,'class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('align'=>'right','class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));?>
    </div>
     </div>
 
    <div class="row" style="margin-bottom:10px">
      <?php if($this->Form->isFieldError('country')) 
      {
      echo '<div class="col-lg-4"></div>';
      echo '<div class="form-group has-error row " align="left">';
      echo     '<label class="control-label" for="inputError">'. $this->Form->error("country").'</label>';
      }
      else
         echo '<div class="form-group">';  
      ?>
  
    <?php
    echo $this->Form->input('country',array('errorMessage' => false,'class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('align'=>'right','class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));?>
    </div>
     </div>
 
    <div class="row" style="margin-bottom:10px">
      <?php if($this->Form->isFieldError('city')) 
      {
      echo '<div class="col-lg-4"></div>';
      echo '<div class="form-group has-error row " align="left">';
      echo     '<label class="control-label" for="inputError">'. $this->Form->error("city").'</label>';
      }
      else
         echo '<div class="form-group">';  
      ?>
  
    <?php
    echo $this->Form->input('city',array('errorMessage' => false,'class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('align'=>'right','class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));?>
    </div>
     </div>
 
    <div class="row" style="margin-bottom:10px">
    <?php if($this->Form->isFieldError('phone')) 
      {
      echo '<div class="col-lg-4"></div>';
      echo '<div class="form-group has-error row " align="left">';
      echo     '<label class="control-label" for="inputError">'. $this->Form->error("phone").'</label>';
      }
      else
         echo '<div class="form-group">';  
      ?>
  
    <?php
    echo $this->Form->input('phone',array('errorMessage' => false,'class'=>'form-control','onkeypress'=>'validate(event)','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('align'=>'right','class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));?>
    </div>
     </div>
 
    <div class="row" style="margin-bottom:10px">
    <?php if($this->Form->isFieldError('cellphone')) 
      {
      echo '<div class="col-lg-4"></div>';
      echo '<div class="form-group has-error row " align="left">';
      echo     '<label class="control-label" for="inputError">'. $this->Form->error("cellphone").'</label>';
      }
      else
         echo '<div class="form-group">';  
      ?>
  
    <?php
    echo $this->Form->input('cellphone',array('errorMessage' => false,'class'=>'form-control','onkeypress'=>'validate(event)','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('align'=>'right','class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));?>
    </div>
     </div>
 
    <div class="row" style="margin-bottom:10px">
    <?php if($this->Form->isFieldError('username')) 
      {
      echo '<div class="col-lg-4"></div>';
      echo '<div class="form-group has-error row " align="left">';
      echo     '<label class="control-label" for="inputError">'. $this->Form->error("username").'</label>';
      }
      else
         echo '<div class="form-group">';  
      ?>
  
    <?php
    echo $this->Form->input('username',array('errorMessage' => false,'class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('align'=>'right','class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));?>
    </div>
     </div>
 
    <div class="row" style="margin-bottom:10px">
        <?php if($this->Form->isFieldError('password')) 
      {
      echo '<div class="col-lg-4"></div>';
      echo '<div class="form-group has-error row " align="left">';
      echo     '<label class="control-label" for="inputError">'. $this->Form->error("password").'</label>';
      }
      else
         echo '<div class="form-group">';  
      ?>
  
      <?php
      echo $this->Form->input('password',array('errorMessage' => false,'type'=>'password','class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('align'=>'right','class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));?>
      </div>
       </div>
 
    <div class="row" style="margin-bottom:10px">
        <?php if($this->Form->isFieldError('newpassword')) 
      {
      echo '<div class="col-lg-4"></div>';
      echo '<div class="form-group has-error row " align="left">';
      echo     '<label class="control-label" for="inputError">'. $this->Form->error("newpassword").'</label>';
      }
      else
         echo '<div class="form-group">';  
      ?>
  
      <?php
      echo $this->Form->input('newpassword',array('errorMessage' => false,'type'=>'password','class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('align'=>'right','class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
      ?>
    </div>
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


