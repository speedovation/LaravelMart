<script>
    
    $( document ).ready(function() {
        
        $('select').select2({
            placeholder: 'Search {!! $title!!}',
            minimumInputLength: 0,
            tags: true,
            ajax: {
                url: '{!! $url !!}',
                dataType: 'json',
                data: function (params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, page) {
                    // parse the results into the format expected by Select2.
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data
                    return {
                        results: data
                    };
                },
                cache: true
            }
            
        });
        
        
    });
    
</script>
