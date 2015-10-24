<h2>Add User</h2>

<?php

echo $this->Form->create('User');

echo $this->Form->input('name');

echo $this->Form->input('username');

echo $this->Form->input('password');

echo $this->Form->input('role'); //,array('options' => $roles)

echo $this->Form->end('EDIT');
?>