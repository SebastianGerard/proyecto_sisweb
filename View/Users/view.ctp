<?php
$this->layout = 'login'
?>
<h1>Name: <?php echo h($user['User']['name']); ?></h1>

<p><small>Lastname: <?php echo $user['User']['lastname']; ?></small></p>

<p>Address:<?php echo $user['User']['address'];?></p>

<?php echo $this->Html->link("Registrar servicio",
array('controller' => 'services', 'action' => 'add', $user['User']['id'])); ?>

<table border=2>
    <tr>
        <th>Name</th>
        <th>Detail</th>
        <th>Amount</th>
        <th>Date</th>
    </tr>
	<?php foreach ($services as $service): ?>
    <tr>
        <td><?php echo $service['Service']['name']; ?></td>
        <td><?php echo $service['Service']['detail']; ?></td>
        <td><?php echo $service['Service']['amount']; ?></td>
        <td><?php echo $service['Service']['date']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($service); ?>
</table>