<!-- File: /app/View/Posts/index.ctp -->
<?php
$this->layout = 'login'
?>
<h1>All services of client:</h1>
<table border=2>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Detail</th>
        <th>Amount</th>
        <th>Date</th>

    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($services as $service): ?>
    <tr>
        <td><?php echo $service['Service']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($service['Service']['name'],
array('controller' => 'services', 'action' => 'view', $service['Service']['id'])); ?>
        </td>
        <td><?php echo $service['Service']['detail']; ?></td>
        <td><?php echo $service['Service']['amount']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($service); ?>
</table>