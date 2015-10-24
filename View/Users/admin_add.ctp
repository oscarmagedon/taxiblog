<div class="ui-state-error ui-corner-all">
    <span class="ui-icon ui-icon-alert"></span>
    <span>
        <strong>ERROR:</strong> 
        <span class="error-text">Sample ui-state-error style.</span>
    </span>
</div>
<?php
echo $this->Form->create('User');

echo $this->Form->input('name'); 

echo $this->Form->input('username');

echo $this->Form->input('password');

echo $this->Form->input('reppsswd',array(
    'type' => 'password', 'label' => 'Conf. Psw.', 'div' => 'input required'
));

echo $this->Form->end();
?>
<script>
$( function () {
    
    $('#UserAdminAddForm').submit(function (){
        
        var errorText = '';
        
        if ( $('#UserPassword').val() !== $('#UserReppsswd').val() ) {
            errorText = 'Ambos Passwords deben ser iguales.';
        }
        
        if ( $('#UserPassword').val() === '' ) {
            errorText = 'Password es obligatorio.';
        }
        
        if ( $('#UserUsername').val() === '' ) {
            errorText = 'Usuario es obligatorio.';
        }
        
        if ( $('#UserName').val() === '' ) {
            errorText = 'Nombre es obligatorio.';
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
