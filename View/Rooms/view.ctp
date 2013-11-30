<?php
$this->layout = 'login';
?>
<?php
echo $this->Form->create('RoomImage',array('enctype'=>'multipart/form-data'));
?>
<fieldset>
  <div align="center">
  	<legend>Room</legend>
  </div>

  <div class="row">
    <div class="col-lg-1">
    </div>
    <div class="col-lg-5">
      <div class="well">
        <div class="row">
          <div class="col-lg-6">
            Code:
          </div>
          <div class="col-lg-6">
            <?php echo $data['room']['Room']['code'];?>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            Type:
          </div>
          <div class="col-lg-6">
            <?php echo $data['room']['Room']['type'];?>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            Price:
          </div>
          <div class="col-lg-6">
            <?php echo $data['room']['Room']['price'];?>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            Capacity:
          </div>
          <div class="col-lg-6">
            <?php echo $data['room']['Room']['capacity'];?>
          </div>
        </div>
      </div>
      <div class="row">
        <?php $user = $this->Session->read('User');

        if($user['users']['rol']=='Admin')
        {
          echo "<ul type='circle'>";
            echo "<li>".$this->Html->link("add/remove image","add/".$data['id'])."</li>";
            echo "<li>".$this->Html->link("add/remove accessories","addAccessories/".$data['id'])."</li>";
          echo "</ul>";
         } 
          else
          {
            echo "<ul type='circle'>";
              echo "<li>".$this->Html->link("make a reservation","reserve/".$data['id'])."</li>";
            echo "</ul>";
          }
          ?>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="row">
        <div class="well">
          <?php echo '<h4>Images</h4>';

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
           } ?>
        </div>
      </div>
      <div class="row">
        <div class="well">
          <?php

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
        </div>
      </div>
    </div>
    <div class="col-lg-2">
    
    </div>
  </div>
</fieldset>
