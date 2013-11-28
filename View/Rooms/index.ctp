<script>
function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]/;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
</script>
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

 <form action="/proyecto_sisweb/rooms" method="post">
  From:<input type="text" name="from" id="from" onkeypress="return validate(event);">To:<input type="text" name="to" id="to" onkeypress="return validate(event);">Capacity:<input type="text" name="capacity" id="capacity" onkeypress="return validate(event);"> 
  Type:<select name="type" id="type">
   <option value="all">All</option>
  <option value="simple">Simple</option>
  <option value="double">Double</option>
  <option value="presidential">Presidential</option>
</select>
<input type="submit" value="Search">
  </form>
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
 
