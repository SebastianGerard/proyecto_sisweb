<script>
function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]/;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
</script>

<?php
$this->layout = 'login';
$user = $this->Session->read('User');

if($user!=null && $user['users']['rol']!='Admin')
$this->redirect('/proyecto_sisweb');

?>



<?php
echo $this->Form->create('Room');
?>

<div class="row">
          <div class="col-lg-3">
          </div>
          <div class="col-lg-6">
            <div class="well">
            <legend>POKE user register</legend>
 <form class="bs-example form-horizontal">
<fieldset>
	
<?php
  if($this->Form->isFieldError('code')) 
      {
      echo '<div class="col-lg-4"></div>';
      echo '<div class="form-group has-error  ">';
      echo     '<label class="control-label" for="inputError">'. $this->Form->error("code").'</label>';
      }
      else
         echo '<div class="form-group">';  
echo $this->Form->input('code',array('errorMessage'=>false,'class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
echo '</div>';

echo $this->Form->input('type',array('options'=>array('simple'=>'Simple','double'=>'Double','presidential'=>'presidential'),'class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
if($this->Form->isFieldError('price')) 
      {
      echo '<div class="col-lg-4"></div>';
      echo '<div class="form-group has-error  ">';
      echo     '<label class="control-label" for="inputError">'. $this->Form->error("price").'</label>';
      }
      else
         echo '<div class="form-group">';
echo $this->Form->input('price',array('errorMessage'=>false,'class'=>'form-control','onkeypress'=>'validate(event)','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
echo '</div>';

if($this->Form->isFieldError('capacity')) 
      {
      echo '<div class="col-lg-4"></div>';
      echo '<div class="form-group has-error  ">';
      echo     '<label class="control-label" for="inputError">'. $this->Form->error("capacity").'</label>';
      }
      else
         echo '<div class="form-group">';
echo $this->Form->input('capacity',array('errorMessage'=>false,'class'=>'form-control','onkeypress'=>'validate(event)','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
echo '</div>';


?>
				 
<br>

<input type='submit' value="Register" class = 'btn btn-primary'/>
</fieldset>
</form>
</div>
</div>
</div>