<h2>Usuarios</h2>

<button class='add-new modal-button' 
    href="<?php echo $this->Html->url(array('action' => 'add','admin' => true)) ?>">
    Agregar Inversor
</button>
<div class="pagination">
    <?php echo $this->Paginator->counter(
            'Pagina {:page} de {:pages}, mostrando {:current} registros de 
            {:count} totales, empezando en {:start}, terminando en {:end}' );
    ?>
</div>
<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>USUARIO</th>
        <th>ROL</th>
        <th>CREADO</th>
        <th>ACCIONES </th>
    </tr>    
    <?php
    foreach ($users as $user) :
    
        $activeCls = 'ena-adm';
        $activeTxt = 'Desactivar';
        $disabRow  = null;
        if ($user['User']['enable'] == 0) {
            $activeCls = 'dis-adm';
            $activeTxt = 'Activar';
            $disabRow  = " class='disable-row'";
        }
        
        ?>
        <tr<?php echo $disabRow ?>>
            <td><?php echo $user['User']['id'] ?></td>
            <td><?php echo $user['User']['name'] ?></td>
            <td><?php echo $user['User']['username'] ?></td>
            <td><?php echo $user['User']['role'] ?></td>
            <td><?php echo $user['User']['created'] ?></td>
            <td>
                <button class="edit-adm modal-button" 
                    href="<?php echo $this->Html->url(array('action' => 'edit',$user['User']['id'],'admin' => true)) ?>">
                    Editar</button>
                
                <button class="pass-adm modal-button" 
                    href="<?php echo $this->Html->url(array('action' => 'passwd',$user['User']['id'],'admin' => true)) ?>">
                    Cambiar Password</button>
                <?php
                if ($userData['id'] !== $user['User']['id']):
                ?>
                    <button class="enable-adm <?php echo $activeCls ?>" 
                            id="<?php echo $user['User']['id'] ?>">
                        <?php echo $activeTxt ?></button>       
                <?php
                endif;
                ?>
            </td>
        </tr>
    <?php 
    endforeach; 
    ?>
</table>
<p class="pagination">
    <?php
    // Shows the next and previous links
    echo $this->Paginator->prev(
      '« Previous',
      null,
      null,
      array('class' => 'disabled')
    );
    
    // Shows the page numbers
    echo $this->Paginator->numbers();

    
    echo $this->Paginator->next(
      'Next »',
      null,
      null,
      array('class' => 'disabled')
    );

    // prints X of Y, where X is current page and Y is number of pages
    //echo $this->Paginator->counter();
    ?>
</p>

<script>
var addUrl  = '<?php echo $this->Html->url(array('action' => 'add','admin' => true)) ?>',
    editUrl = '<?php echo $this->Html->url(array('action' => 'edit','admin' => true)) ?>',
    disUrl  = '<?php echo $this->Html->url(array('action' => 'disable','admin' => true)) ?>';

$( function () { 
    
    
    $('.edit-adm').button( { 
        icons: { primary: "ui-icon-pencil" } , text: false } );
        
    $('.pass-adm').button( { 
        icons: { primary: "ui-icon-key" } , text: false } );
    
    $('.ena-adm').button( { 
        icons: { primary: "ui-icon-locked" } , text: false } );
    
    $('.dis-adm').button( { 
        icons: { primary: "ui-icon-unlocked" } , text: false } );
    
    $('.add-new').button( { 
        
        icons: { primary: "ui-icon-person" } } );
    
    
    $('.modal-button').click (function () {
        $mod = $(".modal-div");
        $mod.dialog( { title: $(this).text() } );
		$mod.load($(this).attr('href'));
		$mod.dialog('open');
    });    
    
    $('.enable-adm').click(function () {
        var actVal = '';
        if ( $(this).hasClass('dis-adm') ) {
            actVal = '/1';    
        }
        
        location = disUrl + '/' + $(this).attr('id') + actVal;
    });
    
});
</script>
