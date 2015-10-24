<?php
if(!empty($userData)) {
    echo "<h2>Bienvenido, " . $userData['name'] . "</h2>";
} else {
    echo $this->Html->link('Ingresar','/users/login');
}
?>

<ul>
    <li>Falta crear una galeria dinamica. Con thumbnails y preview</li>
    <li>Detalles de iconos y apariencia</li>
    <li>Un text editor menu para los detalles del LOG</li>
    <li>Mejores matches usuario - log para saber de quien y cual unidad
    se esta hablando.</li>
</ul>
