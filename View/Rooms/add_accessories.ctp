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
echo $this->Form->create('Artifact');
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

foreach ($data['accessories'] as $accessory) {
	echo '<li><a data-toggle="modal" href="#accessory'.$accessory['Accessory']['id'].'" >'.$accessory['Accessory']['name'].'</a></li>';
	echo '<form class="form-horizontal" role="form" action="/proyecto_sisweb/rooms/newAccessory/'.$data['id'].'/'.$accessory['Accessory']['id'].'" method="post">
	<div class="modal fade" id="accessory'.$accessory['Accessory']['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    	 <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                              <h4 class="modal-title">Add Accessory('.$accessory['Accessory']['name'].')</h4>
                          </div>
                          <table>
                          <tr>
                          <td>
                    		<img src="data:image/jpeg;base64,' . ($accessory['Accessory']['image']) . '" width=200 height=200>
                    		</td>
                    		<td>';
      echo $this->Form->input('amount',array('type'=>'text','class'=>'form-control','onkeypress'=>'validate(event)','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
                    		echo '</td>
                    	   </tr>
                    	  </table>
							<div class="modal-footer">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                            <input type="submit" value="Add" class="btn btn-primary">
                            </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
              </form>';
}

?>
<br>

<input type='submit' value="Register" class = 'btn btn-primary'/>
</fieldset>
</form>
</div>
</div>
</div>