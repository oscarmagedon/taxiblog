<!DOCTYPE html>
<html>
<head>
	<title>
		TAXI BLOG ::
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('cake.based','jquery-ui','taxiblog'));

        echo $this->Html->script(array('jquery-2.1.1.min','jquery-ui.min','jq-taxiblog'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
    <header>
        <div class='head-letters'>
            Sistema Administrativo
            <?php
            if (!empty($userData)) {
                echo $userData['name'] . " en sesion. ". $this->Html->link('Salir', 
                    //array('controller' => 'users','action' => 'logout')
                    '/users/logout'
                    );
            }
            ?>
        </div>
    </header>
    <?php
    
    if (!empty($userData)) {
    
    ?>
    
    <div class="menu-admin">
        <ul>        
        <?php
                
        switch ($userData['role']) {
            case 'ROOT':
                echo "<li>" . $this->Html->link('Users', array(
                                'controller' => 'users',
                                'action'     => 'index',
                                'root'       => true)) ."</li>";

                break;

            case 'ADMIN':

                echo "<li>" . $this->Html->link('USUARIOS', array(
                                'controller' => 'users',
                                'action'     => 'index',
                                'admin'      => true)) ."</li>";

                echo "<li>" . $this->Html->link('UNIDADES', array(
                                'controller' => 'units',
                                'action'     => 'index',
                                'admin'      => true)) ."</li>";

                echo "<li>" . $this->Html->link('NOVEDADES', array(
                                'controller' => 'logs',
                                'action'     => 'index',
                                'admin'      => true)) ."</li>";

                break;

            case 'INVEST':

                echo "<li>" . $this->Html->link('MIS UNIDADES', array(
                                'controller' => 'units',
                                'action'     => 'index',
                                'invest'     => true)) ."</li>";

                echo "<li>" . $this->Html->link('MIS NOVEDADES', array(
                                'controller' => 'logs',
                                'action'     => 'index',
                                'invest'     => true)) ."</li>";


                break;

        }
        ?>
        </ul>
    </div>
    <?php
    }
    ?>
    <div id="content">

        <?php echo $this->Session->flash(); ?>
        <?php echo $this->Session->flash('auth'); ?>

        <?php echo $this->fetch('content'); ?>
    </div>
    <div id="footer">
        Powered by @oscarmagedon
    </div>
    <div class="modal-div">
        <?php echo $this->Html->image("loading.gif")?>
    </div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
