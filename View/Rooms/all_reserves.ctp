<?php
$this->layout = 'login';
$user = $this->Session->read('User');
if($user!=null && $user['users']['rol']!='Admin')
$this->redirect('/proyecto_sisweb');

?>
<div align="center">
<legend>Poke-reserves</legend>
</div>
<table class="table table-condensed table-striped table-hover">
    <tr>
        <th>User</th>
        <th>Room</th>
        <th>Start</th>
        <th>End</th>
 		    <th></th>  
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
        	<?php
          if(!$reservation['Reserve']['checkin'])
           echo $this->Html->link("remove","removeReserve/".$reservation['Reserve']['id'],array('onClick'=>'return confirm("are you sure you want delete this reservation");'));

            ?>
        </td>
        <td>

          <?php

           $actual=date("Y-m-d"); if(!$reservation['Reserve']['checkin'] && $actual>=$reservation['Reserve']['first_day'] && $actual<=$reservation['Reserve']['last_day'])  echo $this->Html->link("CheckIn","checkin/".$reservation['Reserve']['id'],array('onClick'=>'return confirm("are you sure you want checkin this user");'));
     
            ?>
        </td>
     
    </tr>
    <?php endforeach; ?>
</table>

