<?php
$this->layout = 'login';
?>
<legend>Rooms</legend>
<table class="table table-condensed table-striped table-hover">
    <tr>
        <th>Code</th>
        <th>Type</th>
        <th>Price</th>
        <th>Capacity</th>
        
    </tr>

 
    <?php foreach ($rooms as $room): ?>
    <tr>
        <td><?php    echo $this->Html->link($room['Room']['code'] ,
array('controller' => 'rooms', 'action' => 'view', $room['Room']['id'])); ?>
      </td>
              <td><?php  echo $room['Room']['type']; ?></td>

        <td>
       <?php echo $room['Room']['price']; ?>
        </td>
        <td><?php echo $room['Room']['capacity']; ?></td>

    </tr>
    <?php endforeach; ?>
    <?php unset($room); ?>
</table>
 
