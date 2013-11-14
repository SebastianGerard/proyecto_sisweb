<!-- File: /app/View/Posts/index.ctp -->
<?php
$this->layout = 'login'
?>
<h1>All users</h1>
<table border=2>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Last name</th>
        <th>City</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($user['User']['name'],
array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?>
        </td>
        <td><?php echo $user['User']['lastname']; ?></td>
        <td><?php echo $user['User']['city']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($user); ?>
</table>