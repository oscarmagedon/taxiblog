<h2>Novedades</h2>
<a class='add-new'
    href="<?php echo $this->Html->url(array('action' => 'add','admin' => true)) ?>"
        >Agregar Novedad</a>
<table>
    <tr>
        <th>ID</th>
        <th>Created</th>
        <th>Unidad</th>
        <th>Titulo</th>
        <th>Descrip.</th>
        <th>Editar</th>
        <th>Archivos</th>
    </tr>
    <?php
    foreach ($logs as $log) :
    ?>
        <tr>
            <td><?php echo $log['Log']['id'] ?></td>
            <td><?php echo $log['Log']['created'] ?></td>
            <td><?php echo $log['Unit']['title'] ?></td>
            <td><?php echo $log['Log']['title'] ?></td>
            <td><?php echo $log['Log']['content'] ?></td>
            <td>
                <button class="edit-adm modal-btn" 
                    href="<?php echo $this->Html->url(array('action' => 'edit', 
                                    $log['Log']['id'],'admin' => true)) ?>">
                    Editar</button>
            </td>
            <td>
                <button class="file-adm redir-btn" 
                    href="<?php echo $this->Html->url(array('action' => 'attached', 
                                    $log['Log']['id'],'admin' => true)) ?>">
                    Archivos</button>
            </td>
        </tr>
    
    <?php 
    endforeach;
    ?>
</table>

<script>
var $thisUrl = '<?php echo $this->Html->url(array('action' => 'index/')) ?>'; 

$(function () {
    /*
    $('#userId').change( function () {
       location  = $thisUrl + '/' + $(this).val();
    });
    */
    
    $('.add-new').button( { icons: { primary: "ui-icon-note" } } );
    
    $('.edit-adm').button( { 
        icons: { primary: "ui-icon-pencil" } , text: false } );

    $('.file-adm').button( { 
        icons: { primary: "ui-icon-folder-open" } , text: false } );
    
    $(".redir-btn").click( function (){
        location = $(this).attr('href');
    });
    
    $('.modal-button').click (function () {
        $mod = $(".modal-div");
        $mod.dialog( { title: $(this).text() } );
		$mod.load($(this).attr('href'));
		$mod.dialog('open');
    }); 
});
</script>