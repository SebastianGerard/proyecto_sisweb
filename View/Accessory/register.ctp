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

<h1>Registro de POKE-Usuario</h1>

<?php
echo $this->Form->create('Accessory');
?>
<div class="row">
          <div class="col-lg-6">
            <div class="well">
 <form class="bs-example form-horizontal">
<fieldset>
	
<?php
echo $this->Form->input('name',array('class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
echo $this->Form->input('descrition',array('type'=>'textarea','class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));

echo $this->Form->input('image',array('type'=>'file','class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));

?>
				 
<br>

<input type='submit' value="Register" class = 'btn btn-primary'/>
</fieldset>
</form>
</div>
</div>
</div>