<?php
$this->layout = 'login';
if(isset($error))
  echo $error;
?>

<legend>Reservations</legend>

<table class="table table-condensed table-striped table-hover">
    <tr>
        <th>User</th>
        <th>Start</th>
        <th>End</th>
        
    </tr>

 
    <?php foreach ($reservations as $reservation): ?>
    <tr>
        <td>
        	<?php  echo $reservation['User']['username']; ?>
     	</td>
              <td><?php  echo $reservation['Reserve']['first_day']; ?></td>

        <td>
     	  <?php echo $reservation['Reserve']['last_day']; ?>
        </td>
     
    </tr>
    <?php endforeach; ?>
</table>
<?php
echo $this->Form->create('Reserve');
?>

<div class="row">
          <div class="col-lg-3">
          </div>
          <div class="col-lg-6">
            <div class="well">
            <legend>Reserve a Poke-Room</legend>
 <form class="bs-example form-horizontal">
<fieldset>
	
<div class="col-lg-8">
		<input id="start" class="form-control" type="date" name="start" value>
</div>
<div class="col-lg-8">
		<input id="end" class="form-control" type="date" name="end" value>
</div>
<div align="center">
	<input type='submit' value="Reserve" class = 'btn btn-primary'/>
</div>
</form>
<?php
if(isset($collitions))
{
  echo "exists collitions!";
?>
<table class="table table-condensed table-striped table-hover">
    <tr>
        <th>User</th>
        <th>Start</th>
        <th>End</th>
        
    </tr>

 
    <?php foreach ($collitions as $reservation): ?>
    <tr>
        <td>
          <?php  echo $reservation['User']['username']; ?>
      </td>
              <td><?php  echo $reservation['Reserve']['first_day']; ?></td>

        <td>
        <?php echo $reservation['Reserve']['last_day']; ?>
        </td>
     
    </tr>
    <?php endforeach; ?>
</table>
	<?php
}
?>
