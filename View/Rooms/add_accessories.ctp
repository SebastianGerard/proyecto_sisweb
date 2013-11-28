<?php
$this->layout = 'login';
$user = $this->Session->read('User');
if($user['users']['rol']!='Admin')
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
function test()
{
  return confirm("are you sure you want delete this image?");
}
</script>

<?php
echo $this->Form->create('Artifact');
?>
<div class="row">
          <div class="col-lg-3">
          </div>
          <div class="col-lg-6">
            <div class="well">
 <form class="bs-example form-horizontal">
<fieldset>
	<legend>Add/Remove accessories</legend>
<?php
echo $this->Form->input('code',array('readonly'=>'true','value'=>$data['room']['Room']['code'],'class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
echo $this->Form->input('type',array('readonly'=>'true','value'=>$data['room']['Room']['type'],'type'=>'text','class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
echo $this->Form->input('price',array('readonly'=>'true','value'=>$data['room']['Room']['price'],'class'=>'form-control','onkeypress'=>'validate(event)','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
echo $this->Form->input('capacity',array('readonly'=>'true','value'=>$data['room']['Room']['capacity'],'class'=>'form-control','onkeypress'=>'validate(event)','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
echo '</form>';
echo '<h4>My accessories</h4>';
foreach ($data['myAccessories'] as $myAccessory) {
	echo '<li><a data-toggle="modal" href="#accessory'.$myAccessory['Accessory']['id'].'" >'.$myAccessory['Accessory']['name'].'</a></li>';

	echo '<form class="form-horizontal" role="form" action="/proyecto_sisweb/rooms/editAccessory/'.$data['id'].'/'.$myAccessory['Accessory']['id'].'" method="post">
	<div class="modal fade" id="accessory'.$myAccessory['Accessory']['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    	 <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                              <h4 class="modal-title">Edit Accessory('.$myAccessory['Accessory']['name'].')</h4>
                          </div>
                          <table>
                          <tr>
                          <td>
                    		<img src="data:image/jpeg;base64,' . ($myAccessory['Accessory']['image']) . '" width=200 height=200>
                    		</td>
                    		<td>';
      echo $this->Form->input('amount',array('value'=>($myAccessory['Artifact']['amount']),'type'=>'text','class'=>'form-control','onkeypress'=>'validate(event)','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
                    		echo '</td>
                    	   </tr>
                    	  </table>
							<div class="modal-footer">
							<a data-toggle="modal" onClick="return test();" href="/proyecto_sisweb/rooms/deleteAccessory/'.$data['id'].'/'.$myAccessory['Accessory']['id'].'" class="btn btn-primary btn-md">Delete</a>
                            <input type="submit" value="Edit" class="btn btn-primary">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                            
                            </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
              </form>';
}
echo '<h4>Other accessories</h4>';
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


</fieldset>

</div>
</div>
</div>