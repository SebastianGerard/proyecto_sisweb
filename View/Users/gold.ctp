<?php
	$this->layout = 'login';
?>
<!DOCTYPE html>
<?php
echo $this->Form->create('User');
?>
<div class="row">
	<div class="col-lg-3">
		<br><br><br><br><br>
		<div class="row" align="center">
			<img class="img-circle" style="width: 180px; height: 180px;" src="/proyecto_sisweb/webroot/img/pikachugold.jpg">
		</div>
	</div>
	<div class="col-lg-6">
		<div class="users form">
			<div class="well">
				<div class="row">
					<textarea class="form-control" rows="15" cols="30" placeholder="Why do you want to be a gold user?" id="description" name="description"></textarea>
				</div>
				<br>
				<div class="row" align="center">
					<input class="btn btn-primary" type="submit" id="send_request_button" name= "send_request_button"/>
				</div>
			</div>
			
		</div>
	</div>
	<div class="col-lg-3">
		<br><br><br><br><br>
		<div class="row" align="center">
			<img style="width: 200; height: 200px;" src="/proyecto_sisweb/webroot/img/20off.jpg">
		</div>
	</div>
</div>
</form>