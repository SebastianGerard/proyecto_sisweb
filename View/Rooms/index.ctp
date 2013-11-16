<?php
$this->layout = 'login';
?>
<?php
$email = "ger.sal.jo@gkjkmail.com";
$size = 40;
$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) .  "?s=" . $size."&d=mm";
echo '<img src="'.$grav_url.'" alt="" />';
?>

<table border=2 align="center">
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
 
