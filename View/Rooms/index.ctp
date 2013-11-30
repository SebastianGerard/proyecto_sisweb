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
<div align="center">
<legend>Rooms</legend>
</div>
<br>
<table class="table table-condensed table-striped table-hover">
    <tr>
        <th>Code</th>
        <th>Type</th>
        <th>Price</th>
        <th>Capacity</th>
        
    </tr>

 <form action="/proyecto_sisweb/rooms" method="post">
 <div class="row">
    <div class="col-lg-3">
    From:<input placeholder="Minimun amount of money you want to spend" class="form-control" type="text" name="from" id="from" onkeypress="return validate(event);">
    </div>
    <div class="col-lg-3">
    To:<input placeholder="Maximun amount of money you want to spend" class="form-control" type="text" name="to" id="to" onkeypress="return validate(event);">
    </div>
    <div class="col-lg-3">
    Capacity:<input placeholder="Number of people" class="form-control" type="text" name="capacity" id="capacity" onkeypress="return validate(event);"> 
    </div>
    <div class="col-lg-2">
    Type:<select class="form-control" name="type" id="type">

         <option value="all">All</option>
        <option value="simple">Simple</option>
        <option value="double">Double</option>
        <option value="presidential">Presidential</option>
      </select>
    </div>
    <div class="col-lg-1">
    <br>
        <button class="btn btn-primary" type="submit" value="Search">
          <img src="/proyecto_sisweb/webroot/img/search.png"/>
        </button>
    </div>
</div>
<br>
<br>
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
 
