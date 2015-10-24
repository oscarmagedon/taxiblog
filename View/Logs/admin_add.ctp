<style>
    form{
        width: 700px;
    }
    .log-unit{
        float: left;
        clear:none;
    }  
    .log-unit select {
        clear:both;
    }
    .log-title{
        float: left;
        clear: none;
    }
</style>

<?php
echo $this->Form->create('Log');

echo $this->Form->input('unit_id',array('label'=>'Unidad', 
    'div' => 'input select required log-unit'));

echo $this->Form->input('title', array('label' => 'Titulo', 
    'div' => 'input text log-title'));

echo $this->Form->input('content',array('label' => 'Descripcion','rows' => 4,
    'div' => 'input textarea log-descr'));

echo $this->Form->end('Guardar');
?>