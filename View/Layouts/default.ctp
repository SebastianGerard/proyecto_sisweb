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
		if(isset($user))
		{
				//header('Location: /proyecto_sisweb/pages/home_login');
				//exit();
		}
	?>
	<div id="container">
		<div id="header">
			<div class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Poke-Hotel</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/proyecto_sisweb/users/login">Log In</a></li>
            <li><a href="/proyecto_sisweb/users/register">Register</a></li>
            <li><a href="/proyecto_sisweb/rooms/register">Register room</a></li>
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer" align="center">
 			<?php echo $this->Html->image('footer.jpg'); ?>
    	</div>
	</div>
<?php echo $this->Js->writeBuffer(); ?>
</body>

</html>
