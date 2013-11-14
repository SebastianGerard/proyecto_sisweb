<?php
$this->layout = 'login'
?>
<h1>Name: <?php echo h($user['User']['name']); ?></h1>

<p><small>Lastname: <?php echo $user['User']['lastname']; ?></small></p>

<p>Address:<?php echo h($user['User']['address']); ?></p>