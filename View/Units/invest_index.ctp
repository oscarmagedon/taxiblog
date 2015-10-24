
<h2>Mis Unidades Moviles</h2>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>MODELO</th>
        <th>LICENCIA</th>
    </tr>    
    <?php
    foreach ($units as $unit) :
    ?>
        <tr>
            <td><?php echo $unit['Unit']['id'] ?></td>
            <td><?php echo $unit['Unit']['title'] ?></td>
            <td><?php echo $unit['Unit']['model'] ?></td>
            <td><?php echo $unit['Unit']['license'] ?></td>
            
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