
<h2>Unidades Moviles</h2>

<?php
echo $this->Form->input('userId',array('options' => $users,
    'empty' => 'TODOS...','label' => 'Filtrar por usuario:', 'value' => $user));
?>

<button class='add-new modal-button'
    href="<?php echo $this->Html->url(array('action' => 'add','admin' => true)) ?>"
        >Agregar Unidad</button>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>USUARIO</th>
        <th>MODELO</th>
        <th>PLACA</th>
        <th>ACCIONES</th>
    </tr>    
    <?php
    foreach ($units as $unit) :
    ?>
        <tr>
            <td><?php echo $unit['Unit']['id'] ?></td>
            <td><?php echo $unit['Unit']['title'] ?></td>
            <td><?php echo $unit['User']['name'] ?></td>
            <td><?php echo $unit['Unit']['model'] ?></td>
            <td><?php echo $unit['Unit']['license'] ?></td>
            <td>
                <button class="edit-adm modal-button" 
                    href="<?php echo $this->Html->url(array('action' => 'edit',
                        $unit['Unit']['id'],'admin' => true)) ?>">
                    Editar</button>
            <?php 
            /*
            echo $this->Html->link('Editar',array('action' => 'edit', $unit['Unit']['id']));
            echo " - ";
            echo $this->Html->link('Borrar',array('action' => 'delete', $unit['Unit']['id'])); 
            */
            ?>
            </td>
        </tr>
    <?php 
    endforeach; 
    ?>
</table>
<style>
    .add-new {
        margin-top:20px;
    }
</style>
<script>
    var $thisUrl = '<?php echo $this->Html->url(array('action' => 'index/')) ?>'; 
$(function () {
    
    $('#userId').change( function () {
       location  = $thisUrl + '/' + $(this).val();
    });
    
    
    $('.add-new').button( { icons: { primary: "ui-icon-plus" } } );
    
    $('.edit-adm').button( { 
        icons: { primary: "ui-icon-pencil" } , text: false } );
    
    $('.modal-button').click (function () {
        $mod = $(".modal-div");
        $mod.dialog( { title: $(this).text() } );
		$mod.load($(this).attr('href'));
		$mod.dialog('open');
    }); 
});
</script>