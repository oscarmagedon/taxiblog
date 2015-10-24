<style>
    form{
        width: 500px;
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
<h2>Detalles de Novedad</h2>
<ul>
    <li>Libreria para abrir modal la galeria con todas las fotos cargadas
        tipo details con ajax layouts 
    </li>
    <li>
        En esta vista no van links, hay uno solo arriba de la lista que es para
        VER EN GALERIA modal
    </li>
</ul>
<?php
//
echo $this->Form->create('Log', array('action' => 'edit'));

echo $this->Form->input('id');

echo $this->Form->input('unit_id',array('label'=>'Unidad', 
    'div' => 'input select required log-unit'));

echo $this->Form->input('title', array('label' => 'Titulo', 
    'div' => 'input text log-title'));

echo $this->Form->input('content',array('label' => 'Descripcion','rows' => 4,
    'div' => 'input textarea log-descr'));

echo $this->Form->end('Guardar');

?>
<h3><?php echo count($explore) ?> Archivos e imagenes:
<?php
echo $this->Html->link('Galeria', 
        array('action' => "viewgallery", $this->data['Log']['id']),
        array(
            'class' => 'open-modal', 
            'title' => 'Galeria del '. $this->data['Log']['title']));
?>
</h3>
<table class='log-files'>
    <tr>
        <th>Tipo</th>
        <th>Nombre</th>
    </tr>
    <?php
    foreach ($explore as $file) {
        $fileParts = explode('.',$file);
    ?>
        <tr>
            <td>
                <?php 
                if ($fileParts[1] == 'pdf') {
                    echo $this->Html->image('icon-pdf.jpeg');
                } else {
                    echo $this->Html->image('icon-img.png');
                }
                  
                ?>
            </td>
            <td>
                <?php echo $fileParts[0] ?>
            </td>
            
        </tr>
        
    <?php
    }
    ?>
    <tr>
        <td colspan="3">
            <?php
            //
            echo $this->Form->create('Log', array('type' => 'file','action' => 'upfile'));

            echo $this->Form->input('id');
            
            echo $this->Form->input('fileup',array('label' => 'Agregar...','type' => 'file'));
            
            echo $this->Form->end('SUBIR');

            ?>
        </td>
    </tr>
</table>
<script>
$(function () {
    
});
    
    
</script>