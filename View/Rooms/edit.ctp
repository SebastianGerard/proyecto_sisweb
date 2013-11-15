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
echo $this->Form->create('Room');
?>
<div class="row">
          <div class="col-lg-6">
            <div class="well">
 <form class="bs-example form-horizontal">
<fieldset>
	
<?php
echo $this->Form->input('code',array('class'=>'form-control','value'=>$data['Room']['code'],'between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
echo $this->Form->input('type',array('type'=>'text','value'=>$data['Room']['type'],'class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
echo $this->Form->input('price',array('class'=>'form-control','value'=>$data['Room']['price'],'onkeypress'=>'validate(event)','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
echo $this->Form->input('capacity',array('class'=>'form-control','value'=>$data['Room']['capacity'],'onkeypress'=>'validate(event)','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));



?>
				 
<br>

<input type='submit' value="Update" class = 'btn btn-primary'/>
</fieldset>
</form>
</div>
</div>
</div>