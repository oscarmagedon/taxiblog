<div class="ui-state-error ui-corner-all">
    <span class="ui-icon ui-icon-alert"></span>
    <span>
        <strong>ERROR:</strong> 
        <span class="error-text">Sample ui-state-error style.</span>
    </span>
</div>
    
<?php

echo $this->Form->create('User',array('action' => 'passwd'));

echo $this->Form->input('id');

echo $this->Form->input('password');

echo $this->Form->input('reppsswd',array(
    'type' => 'password', 'label' => 'Conf. Psw.', 'div' => 'input required'
));

echo $this->Form->end();
?>
<script>
$( function () {
    
    $('#UserAdminPasswdForm').submit(function (){
        
        var errorText = '';
        
        if ( $('#UserPassword').val() !== $('#UserReppsswd').val() ) {
            errorText = 'Ambos Passwords deben ser iguales.';
        }
        
        if ( $('#UserPassword').val() === '' ) {
            errorText = 'Password es obligatorio.';
        }
        
        
        if ( errorText !== '') {
        
            $('.ui-state-error .error-text').html(errorText);
            
            $('.ui-state-error').show(500);
            
            setTimeout(function(){
                $('.ui-state-error').hide(500);
                
            }, 2000);
            
            return false;
            
        }
        
    });
    
});
</script>