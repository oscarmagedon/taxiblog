<?php
echo $this->Form->create('Unit',array('action' => 'edit'));

echo $this->Form->input('id');

echo $this->Form->input('user_id',array('options' => $investors, 'label' => 'Usuario'));

echo $this->Form->input('title', array('label' => 'Titulo'));

echo $this->Form->input('license', array('label' => 'Licencia'));

echo $this->Form->input('model', array('label' => 'Modelo'));

echo $this->Form->end();
?>

