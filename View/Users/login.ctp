<div class="users form" style="width: 300px">
<h2>Iniciar Sesion</h2>

<?php 

echo $this->Form->create('User');        
        
echo $this->Form->input('username',array('label' => 'Usuario'));

echo $this->Form->input('password',array('label' => 'Password'));

echo $this->Form->end('ENTRAR'); 
?>

</div>

