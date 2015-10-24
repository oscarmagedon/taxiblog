<h2>Usuarios</h2>

<p class='actions'>
    <?php echo $this->Html->link('Agregar Usuario',array('action' => 'add')) ?>
</p>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>USUARIO</th>
        <th>ROL</th>
        <th>CREADO</th>
        <th> - </th>
    </tr>    
    <?php
    foreach ($users as $user) :
    ?>
        <tr>
            <td><?php echo $user['User']['id'] ?></td>
            <td><?php echo $user['User']['name'] ?></td>
            <td><?php echo $user['User']['username'] ?></td>
            <td><?php echo $user['User']['role'] ?></td>
            <td><?php echo $user['User']['created'] ?></td>
            <td>
            <?php 
            echo $this->Html->link('Editar',array('action' => 'edit', $user['User']['id']));
            echo " - ";
            echo $this->Html->link('Desact.',array('action' => 'enable', $user['User']['id'])); 
            
            ?>
            </td>
        </tr>
    <?php 
    endforeach; 
    ?>
</table>

<?php
pr($users)
?>