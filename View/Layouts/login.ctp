<?php
/**
 *
 * PHP 5
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */

?>
<!DOCTYPE html>

<html>
<head>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
	echo $this->Html->css('bootstrap.min');
	echo $this->Html->css('main');
	echo $this->Html->script('jquery-1.10.2.min');
	echo $this->Html->script('bootstrap.min');
	echo $this->Html->css('cake.generic');
	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');

	?>
</head>
<body>
<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
?>
	<?php 
	$user = $this->Session->read('User');
	if(!isset($user))
	{
			header('Location: /proyecto_sisweb/users/login');
			exit();
	}
	
	?>
	<div id="container">
		<div id="header">
			<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="/proyecto_sisweb/webroot/img/appbar.pokeball.png" width="18"/> Poke-Hotel</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
 			<?php if($user['users']['rol']=='Admin') {?>           
            <li><a href="/proyecto_sisweb/users">Users</a></li>
            <?php } ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Rooms <b class="caret"></b></a>
              <ul class="dropdown-menu">
              	<?php if($user['users']['rol']=='Admin') {?>           
                 <li><a href="/proyecto_sisweb/rooms/register">Register room</a></li>
                 <li><a href="/proyecto_sisweb/rooms/allReserves">All Reserves</a></li>
                  <?php } ?>
			      <li><a href="/proyecto_sisweb/rooms">View rooms</a></li>
			    
              </ul>
            </li>  
            <?php if($user['users']['rol']=='Admin') {?>           
            <li><a href="/proyecto_sisweb/accessories/register">Add accessories</a></li>
            <li class="dropdown">
            	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports <b class="caret"></b></a>
            	<ul class="dropdown-menu">
            		<li><a href="/proyecto_sisweb/rooms/reserveseport">Reserves report</a></li>
            		<li><a href="/proyecto_sisweb/services/report">Services report</a></li>

            	</ul>
            </li>
          	 <?php } ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          	
          	<?php 
          		if($user['users']['rol']=="Gold")
          		{

          			echo '<li style="background:#ffd700" >
		          						<a href="/proyecto_sisweb/users/view/'.$user['users']['id'].'">'
			          		          	.$user["users"]["name"].'</a>
		          		          		
	          		          	</li>';
	          		echo "<li style='background:#ffd700'><img src='/proyecto_sisweb/webroot/img/gold_logo.png' width='33'/></li>";
          		}
          		else
	          	{echo '<li class="active"><a href="/proyecto_sisweb/users/view/'.$user['users']['id'].'">'
	          		          	.$user["users"]["name"].'</a></li>';}
           ?>
            <li class="active"><a href="/proyecto_sisweb/users/logout">Log Out</a></li>
          </ul>


        </div><!--/.nav-collapse -->
      </div>
		</div>
		<div id="content" style="margin-bottom:300px;margin-top:75px">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
			<div id="footer" align="center" >
			<div class="row" style="padding: 50px;background-color: #000">
	 			
	 			<div class="col-lg-12">
	 				<div class="col-lg-6">
	 					<font color="2E9AFE"><img src="/proyecto_sisweb/webroot/img/cellphone.png" width="50"><h3>Call us 70-467-919</h3></font>
	 				</div>
	 				<div class="col-lg-6">
		 				<div class="row">
		 				<img src="/proyecto_sisweb/webroot/img/mail.png" width="50">
		 				</div>
	 					<div class="row">
		 				
							<font color="2E9AFE"><h3>
							Email us poke_hotel_ucb@gmail.com</h3></font>
		 				</div>
		 			</div>
	 			</div>
	 		</div>
	 		<div class="row" align="center" >
	 			<h3>You might have seen us in...</h3>
	 		</div>
	 		<div class="row" style="padding:15px;margin-bottom:30px">
	 			
 				<div class="col-lg-4">
 					<img src="/proyecto_sisweb/webroot/img/6.jpg" width="200">
 				</div>
 				<div class="col-lg-4">
					<img src="/proyecto_sisweb/webroot/img/8.jpg" width="200">
 				</div>
 				<div class="col-lg-4">
					<img src="/proyecto_sisweb/webroot/img/9.jpg" width="200">
 				</div>
	 			
	 		</div>
	 		
	 		<div class="row" style="padding: 50px;background-color: #000">
	 			<div class="col-lg-1">
	 			</div>
	 			<div class="col-lg-4" align="left">
	 				<font color="blue">© Poke-Hotel 2013 All rights reserved.</font>
	 			</div>
	 			<div class="col-lg-5" align="right">
	 				<a href="www.facebook.com">Facebook</a>
	 				<a href="www.twitter.com">Twitter</a>
	 			</div class="col-lg-2">
	 			<div>
	 				
	 			</div>
	 		</div>
    	</div>
	</div>
<?php echo $this->Js->writeBuffer(); ?>
</body>

</html>
