<!-- File: /app/View/Posts/index.ctp -->
<?php
$this->layout = 'login';
$user = $this->Session->read('User');
if($user!=null && $user['users']['rol']!='Admin')
$this->redirect('/proyecto_sisweb');
?>
<?php
echo $this->Form->create('User');
?>
<div class="row">
        <div class="col-lg-3">
                
        </div>
        <div class="col-lg-4" align="right">
        <input class='form-control' type="text" name="buscartxt">
        </div>
        <div class="col-lg-5">
        <button type="submit" class="btn btn-primary" name="buscarbtn">
          Search
        </button>
        </div>
</div>
<div class="col-lg-3"></div>
<legend>All users</legend>
    <table class="table table-condensed table-striped table-hover">
        <tr>
            <th >Id</th>
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
</form>