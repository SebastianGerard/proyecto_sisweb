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
if($user['users']['rol']!='Admin')
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
echo $this->Form->input('code',array('class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
echo $this->Form->input('type',array('options'=>array('simple'=>'Simple','double'=>'Double','presidential'=>'presidential'),'class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
echo $this->Form->input('price',array('class'=>'form-control','onkeypress'=>'validate(event)','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
echo $this->Form->input('capacity',array('class'=>'form-control','onkeypress'=>'validate(event)','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));


?>
				 
<br>

<input type='submit' value="Register" class = 'btn btn-primary'/>
</fieldset>
</form>
</div>
</div>
</div>