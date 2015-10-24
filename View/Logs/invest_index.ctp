<h2>Mis Novedades</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Created</th>
        <th>Unidad</th>
        <th>Titulo</th>
        <th>Descrip.</th>
        <th>Acciones</th>
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
                <button class="view-adm redir-btn" 
                    href="<?php echo $this->Html->url(array('action' => 'view', 
                                    $log['Log']['id'],'invest' => true)) ?>">
                    Ver</button>
            </td>
        </tr>
    
    <?php 
    endforeach;
    ?>
</table>

<script>
var $thisUrl = '<?php echo $this->Html->url(array('action' => 'index/')) ?>'; 

$(function () {
    
    $('.view-adm').button( { 
        icons: { primary: "ui-icon-search" } , text: false } );
    
    $(".redir-btn").click( function (){
        location = $(this).attr('href');
    });
});
</script>