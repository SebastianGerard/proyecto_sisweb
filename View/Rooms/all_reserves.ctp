<?php
$this->layout = 'login';
?>

<table class="table table-condensed table-striped table-hover">
    <tr>
        <th>User</th>
        <th>Room</th>
        <th>Start</th>
        <th>End</th>
 		<th></th>       
    </tr>

 
    <?php foreach ($reservations as $reservation): ?>
    <tr>
        <td>
        	<?php  echo $reservation['User']['username']; ?>
     	</td>
     	<td>
        	<?php  echo $reservation['Room']['code']; ?>
     	</td>
        
              <td><?php  echo $reservation['Reserve']['first_day']; ?></td>

        <td>
     	  <?php echo $reservation['Reserve']['last_day']; ?>
        </td>
        <td>
        	<?php echo $this->Html->link("remove","removeReserve/".$reservation['Reserve']['id']); ?>
        </td>
     
    </tr>
    <?php endforeach; ?>
</table>

