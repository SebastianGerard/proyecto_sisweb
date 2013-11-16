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

         <link rel="stylesheet" href="https://d396qusza40orc.cloudfront.net/startup%2Fcode%2Fsocial-buttons.css">
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
				header('Location: /proyecto_sisweb/pages/home_login');
				exit();
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
         
            <li><a href="/proyecto_sisweb/users/register">Register</a></li>
          </ul>
            <ul class="nav navbar-nav navbar-right">
               <li class="active"><a  data-toggle="modal" href="#login">Log In</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
		</div>
		<div id="content">
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


<?php 	echo $this->Form->create('User',array('action'=>'login'));?>
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    	 <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                              <h4 class="modal-title">LogIn</h4>
                          </div>
                          
                          	<h1>Ingreso al poke-sistema</h1>

						<html>
							<body>
							<div class="users form">
									<?php 
										echo $this->Form->input('username',array('class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
										echo $this->Form->input('password',array('type'=>'password','class'=>'form-control','between' => '<div class="col-lg-8">','after'=>'</div>','label'=>array('class'=>'col-lg-4 control-label','between'=>'<div class="form-group">','after'=>'div')));
									?>
									
							</div>

							</body>
						</html>

                          	<div class="modal-footer">
							<input type='submit' value="Login" class = 'btn btn-primary'/>
                            <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                            
                            </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
              </form>'






</html>
