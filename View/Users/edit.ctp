<h1>Edit Post</h1>

<?php
$this->layout = "login";
    echo $this->Form->create('User');
    echo $this->Form->input('name');
    echo $this->Form->input('lastname');
    echo $this->Form->input('address');
    echo $this->Form->input('country');
    echo $this->Form->input('city');
    echo $this->Form->input('phone');
    echo $this->Form->input('cellphone');
    echo $this->Form->input('NIT');
     echo $this->Form->input('id', array('type' => 'hidden'));
      echo $this->Form->input('password', array('type' => 'hidden'));
      echo $this->Form->input('rol', array('type' => 'hidden'));
      echo $this->Form->input('newpassword', array('type' => 'hidden'));
      echo $this->Form->input('username', array('type' => 'hidden'));
      echo $this->Form->input('email', array('type' => 'hidden'));
  ?>
  <input type='submit' value="Save data"  class = 'btn btn-primary'/>
  </form>
