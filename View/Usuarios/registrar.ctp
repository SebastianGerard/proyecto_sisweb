<h1>Registro de POKE-Usuario<h1>

<input type="text">fsds
<?php
echo $this->Form->create('Usuario');
echo $this->Form->input('nombre');
echo $this->Form->input('apellido');
echo $this->Form->input('correo');
echo $this->Form->input('direccion');
echo $this->Form->input('pais');
echo $this->Form->input('ciudad');
echo $this->Form->input('telefono');
echo $this->Form->input('celular');
echo $this->Form->end('Save Usuario');
?>