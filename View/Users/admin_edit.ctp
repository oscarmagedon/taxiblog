<div class="ui-state-error ui-corner-all">
    <span class="ui-icon ui-icon-alert"></span>
    <span>
        <strong>ERROR:</strong> 
        <span class="error-text">Sample ui-state-error style.</span>
    </span>
</div>
<?php

echo $this->Form->create('User',array('action' => 'edit'));

echo $this->Form->input('id');

echo $this->Form->input('name');

echo $this->Form->input('username');

echo $this->Form->end();
?>
<script>
$( function () {
    
    $('#UserAdminEditForm').submit(function (){
        
        var errorText = '';
        
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