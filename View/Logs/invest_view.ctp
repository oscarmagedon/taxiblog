<h2>Detalles de Novedad</h2>
<?php
//
echo "<h3>" . $log['Log']['title'] ."</h3>";

echo "<p>" . $log['Log']['content'] ."</p>";

?>
<h3><?php echo count($explore) ?> Archivos e imagenes:
<?php
echo $this->Html->link('Galeria', 
        array('action' => "viewgallery", $log['Log']['id']),
        array(
            'class' => 'open-modal', 
            'title' => 'Galeria del '. $log['Log']['title']));
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
</table>