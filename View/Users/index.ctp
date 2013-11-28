<!-- File: /app/View/Posts/index.ctp -->
<?php
$this->layout = 'login'
?>
<legend>All users</legend>
<table class="table table-condensed table-striped table-hover">
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Name</th>
        <th>Last name</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $this->Html->link($user['User']['id'],
array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?></td>
        <td><?php echo $user['User']['username']; ?></td>
        <td>
            <?php echo $user['User']['name']; ?>
        </td>
        <td><?php echo $user['User']['lastname']; ?></td>
        
    </tr>
    <?php endforeach; ?>
    <?php unset($user); ?>
</table>