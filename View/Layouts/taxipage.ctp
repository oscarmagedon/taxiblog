<!DOCTYPE html>
<html>
<head>
	<title>
		Compre Un TAXI :: Su negocio.
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('cake.based','jquery-ui','taxipage',
            'slick','slick-theme'
            )); //,'taxiblog'

        echo $this->Html->script(array('jquery-2.1.1.min','jquery-ui.min',
            //'jq-taxiblog',
            'slick.min'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
    <header>
        <div class='header-links'>
            <div class="client-link">
                <?php
                echo $this->Html->link('CLIENTES', array(
                                    'controller' => 'users',
                                    'action'     => 'login'
                    ));
                ?>
            </div>
            <div class="langs-select">ESPANOL</div>
        </div>
        <div class='header-logo'>
            
        </div>
        <div class='header-menu'>
            <ul>        
            <?php
                echo "<li>" . $this->Html->link('INICIO', array(
                                    'action'     => 'home')) ."</li>";

                echo "<li>" . $this->Html->link('NOSOTROS', array(
                                'action'     => 'about')) ."</li>";

                echo "<li>" . $this->Html->link('SERVICIOS', array(
                                'action'     => 'services')) ."</li>";

                echo "<li>" . $this->Html->link('CONTACTO', array(
                                'action'     => 'services')) ."</li>";

                echo "<li>" . $this->Html->link('PREGUNTAS', array(
                                'action'     => 'services')) ."</li>";

            ?>
        </ul>    
        </div>
    </header>
    <section>

        <?php echo $this->Session->flash(); ?>
        <?php echo $this->Session->flash('auth'); ?>

        <?php echo $this->fetch('content'); ?>
    </section>
    <footer>
        Powered by @oscarmagedon and @lusecita420
    </footer>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
