<?php
$this->layout = "login";
?>
<div class="container row">
    
        <div class="col-lg-2">
        </div>
        <div class="col-lg-4">
            <div class="well">
                <legend><?php echo $user['User']['name']." ".$user['User']['lastname']." (".$user['User']['username'].")";?></legend>
                <div class="row">
                    <div class="col-lg-4">
                        <?php
                            $email = $user['User']['email'];
                            $size = 100;
                            $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) .  "?s=" . $size."&d=mm";
                            echo '<img src="'.$grav_url.'" alt="" />';
                        ?>
                    </div>
                    <div class="col-lg-8">
                        <p>Address:<?php echo $user['User']['address'];?></p>
                        <p><?php echo $user['User']['email'];?></p>
                        <p><?php echo $user['User']['city'];?> - <?php echo $user['User']['country'];?></p>
                        <p>Phone: <?php echo $user['User']['phone'];?></p>
                        <p>Cellphone: <?php echo $user['User']['cellphone'];?></p>
                    </div>
                </div>
                <?php
                    $userSession = $this->Session->read('User');
                    if($userSession['users']['rol']=='Admin' && $user['User']['rol']!='Admin' )
                    {
                ?>
                <div class="row" align="center">
                    <?php echo $this->Html->link("Register new service",
            array('controller' => 'services', 'action' => 'add', $user['User']['id'])); ?>
                </div>
                <?php } ?>


                <div class="row" align="right">
                    <?php 
                        $userSession = $this->Session->read('User');
                        if($user['User']['username'] == $userSession['users']['username'])
                        {
                            echo $this->Html->link("Edit",
                            array('controller' => 'users', 'action' => 'edit', $user['User']['id']));
                        }
                    ?>
                </div>
                
            </div>
        </div>

        <div class="col-lg-4">
                <div class="row">
                      <?php
                    $userSession = $this->Session->read('User');
                    if( $user['User']['rol']!='Admin' )
                    {
                       ?>
         
                    <table class="table table-condensed table-striped table-hover">
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
                    <?php } 
                        if($userSession['users']['rol']=='Admin' && $user['User']['rol']=='Admin')
                    {
                        echo "<table class='table table-condensed table-striped table-hover'>";
                            echo "<tr>";
                                echo "<th> Username </th>";
                                echo "<th colspan=3> Reason </th>";
                            echo "</tr>";
                            
                            
                            foreach ($user_requests as $key=>$user_request) {
                                echo "<tr>";
                                echo "<td>".$user_request['users']['username']."</td>";
                                echo "<td>".$user_request['gold_requests']['description']."</td>";
                                echo "<th><a href='/proyecto_sisweb/users/accept/".$user_request['users']['id']."'>Accept</a></th>";
                                echo "<th><a href='/proyecto_sisweb/users/deny/".$user_request['users']['id']."'>Deny</a></th>";
                                echo "</tr>";
                            }
                            echo "</table>";
                    }
                    ?>
                </div>
                

        </div>
               <?php
                    $userSession = $this->Session->read('User');
                    if($userSession['users']['rol']=='Admin' && $user['User']['rol']!='Admin' )
                    {
                ?>
         
        <div class="col-lg-2">
                <button class="btn btn-primary">
                    <?php 
                        echo "<a href='/proyecto_sisweb/bills/index/".$user['User']['id']."' target='_blank'>";
                    
                        echo    "<img  src='/proyecto_sisweb/webroot/img/print.png' width='30'>";
                        echo "</a>"
                    ?>
                    
                </button>
        </div>
               <?php } ?>
         

</div>