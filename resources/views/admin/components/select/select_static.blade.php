<script>
    
    $( document ).ready(function() {
        
       // alert('{ !!$value! ! }' + "  |  " + '#{ ! ! $id ! ! }')
        $('#{!! $id !!}').selectize({
                    onInitialize: function(data) {
                       this.setValue('{!! $value !!}');
                    }
                });
        
        
    });
    
</script>
