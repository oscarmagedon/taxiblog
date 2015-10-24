<h2>Edit User</h2>

<?php

echo $this->Form->create('User');

echo $this->Form->input('id');

echo $this->Form->input('name');

echo $this->Form->input('username');

echo $this->Form->input('password');

echo $this->Form->input('enable');

echo $this->Form->end('EDIT');
?>