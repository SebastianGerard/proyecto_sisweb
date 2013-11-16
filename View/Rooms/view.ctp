<?php
$this->layout = 'login';
?>
<?php
echo $this->Form->create('RoomImage',array('enctype'=>'multipart/form-data'));
?>
<div class="row">
 <div class="col-lg-6">
  <div class="well">
 <form class="bs-example form-horizontal">
<fieldset>
	
<?php
echo $this->Form->input('code',array('readonly'=>'true','value'=>$data['room']['Room']['code'],'class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
echo $this->Form->input('type',array('readonly'=>'true','value'=>$data['room']['Room']['type'],'type'=>'text','class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
echo $this->Form->input('price',array('readonly'=>'true','value'=>$data['room']['Room']['price'],'class'=>'form-control','onkeypress'=>'validate(event)','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
echo $this->Form->input('capacity',array('readonly'=>'true','value'=>$data['room']['Room']['capacity'],'class'=>'form-control','onkeypress'=>'validate(event)','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));



echo $this->Html->link("add/remove image","add/".$data['id']);
echo "<br>";
echo $this->Html->link("add/remove accessories","addAccessories/".$data['id']);
echo "<br>";

echo '<h4>Images</h4>';

 foreach ($data['images'] as $image)
 {
	echo  '<a data-toggle="modal" href="#room'.$image['RoomImage']['id'].'" ><img src="data:image/jpeg;base64,' . ($image['RoomImage']['image']) . '" width="100" height="100"></a>';
	echo '<div class="modal fade" id="room'.$image['RoomImage']['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    		<img src="data:image/jpeg;base64,' . ($image['RoomImage']['image']) . '" width=600 height=500>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->';
 }
echo '<h4>Accessories</h4>';
foreach ($data['accessories'] as $accessory) {
  echo '<li><a data-toggle="modal" href="#accessory'.$accessory['Accessory']['id'].'" >'.$accessory['Accessory']['name'].'</a></li>';
  echo '<form class="form-horizontal" role="form" action="/proyecto_sisweb/rooms/newAccessory/'.$data['id'].'/'.$accessory['Accessory']['id'].'" method="post">
  <div class="modal fade" id="accessory'.$accessory['Accessory']['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                       <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                              <h4 class="modal-title">'.$accessory['Accessory']['name'].'</h4>
                          </div>
                          <table>
                          <tr>
                          <td>
                        <img src="data:image/jpeg;base64,' . ($accessory['Accessory']['image']) . '" width=200 height=200>
                        </td>
                        <td>';
                    echo 'Amount   '.$accessory['Artifact']['amount']; 
                  echo '</td>
                         </tr>
                        </table>
              <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-dismiss="modal">Exit</button>
                            </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
              </form>';
}


?>
<br>
</fieldset>
</form>
</div>
</div>
</div>
